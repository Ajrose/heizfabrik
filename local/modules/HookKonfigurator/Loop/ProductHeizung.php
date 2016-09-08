<?php
namespace HookKonfigurator\Loop;

use Propel\Runtime\ActiveQuery\Criteria;
use Thelia\Core\Template\Element\BaseI18nLoop;
use Thelia\Core\Template\Element\LoopResult;
use Thelia\Core\Template\Element\LoopResultRow;
use Thelia\Core\Template\Element\PropelSearchLoopInterface;
use Thelia\Core\Template\Element\SearchLoopInterface;
use Thelia\Core\Template\Loop\Argument\Argument;
use Thelia\Core\Template\Loop\Argument\ArgumentCollection;
use Thelia\Log\Tlog;
use Thelia\Model\ProductQuery;
use HookKonfigurator\Model\HfproductsQuery;
use Thelia\Model\Product;
use Thelia\Model\ProductI18n;
use Thelia\Model\ProductImage;
use Thelia\Model\Brand;
use HookKonfigurator\Model\VendorsQuery;
use HookKonfigurator\Model\Vendors;
use HookKonfigurator\Model\Hfproducts;
use Thelia\Model\BrandI18nQuery;
use Thelia\Model\ProductDocument;
use Thelia\Model\ProductDocumentI18n;
use HookKonfigurator\Model\ProductHeizung as ModelProductHeizung;
use Propel\Runtime\ActiveQuery\Join;
use HookKonfigurator\Model\Map\ProductHeizungTableMap;
use Thelia\Model\Map\ProductTableMap;
use HookKonfigurator\Model\Konfiguratoreinstellung;
use HookKonfigurator\Model\Montage;
use HookKonfigurator\Model\ConstraintsQuery;
use HookKonfigurator\Model\MontageConstraints;
use HookKonfigurator\Model\Constraints;
use HookKonfigurator\Model\Map\ProductHeizungMontageTableMap;
use HookKonfigurator\Model\MontageQuery;
use Thelia\Model\Map\SaleTableMap;
use Thelia\Model\Map\ProductSaleElementsTableMap;
use Thelia\Model\Map\ProductPriceTableMap;
use Thelia\Model\CurrencyQuery;
use HookKonfigurator\Model\HeizungkonfiguratorUserdaten;
use Symfony\Component\HttpFoundation\FileBag;
use HookKonfigurator\Model\HeizungkonfiguratorImage;

/**
 *
 * ProductHeizung loop
 *
 * Class ProductHeizung
 *
 * @package HookKonfigurator\Loop
 * @author Emanuel Plopu <emanuel.plopu@sepa.at>
 */
class ProductHeizung extends BaseI18nLoop implements PropelSearchLoopInterface, SearchLoopInterface {
	protected $timestampable = true;
	protected $versionable = true;
	
	/**
	 *
	 * @return ArgumentCollection
	 */
	protected function getArgDefinitions() {
		return new ArgumentCollection ( 
				Argument::createFloatTypeArgument ( 'power' ),
				Argument::createIntTypeArgument('currency'));
	}
	public function getSearchIn() {
		return [ 
				"ref",
				"title" 
		];
	}
	
	/**
	 *
	 * @param ProductQuery $search        	
	 * @param
	 *        	$searchTerm
	 * @param
	 *        	$searchIn
	 * @param
	 *        	$searchCriteria
	 */
	public function doSearch(&$search, $searchTerm, $searchIn, $searchCriteria) {
		$search->_and ();
		foreach ( $searchIn as $index => $searchInElement ) {
			if ($index > 0) {
				$search->_or ();
			}
			switch ($searchInElement) {
				case "ref" :
					$search->filterByRef ( $searchTerm, $searchCriteria );
					break;
				case "title" :
					$search->where ( "CASE WHEN NOT ISNULL(`requested_locale_i18n`.ID) THEN `requested_locale_i18n`.`TITLE` ELSE `default_locale_i18n`.`TITLE` END " . $searchCriteria . " ?", $searchTerm, \PDO::PARAM_STR );
					break;
			}
		}
	}
	public function parseResults(LoopResult $loopResult) {
		// $complex = $this->getComplex();
		
		// if (true === $complex) {
		// return $this->parseComplexResults($loopResult);
		// } else {
		// return $loopResult;
		return $this->parseSimpleResults ( $loopResult );
		// }
	}
	public function parseSimpleResults(LoopResult $loopResult) {
		$log = Tlog::getInstance ();
		$log->debug ( "loop result number " . count ( $loopResult->getResultDataCollection () ) );
		
		/** @var \Thelia\Core\Security\SecurityContext $securityContext */
		$securityContext = $this->container->get ( 'thelia.securityContext' );

		$taxCountry = $this->container->get('thelia.taxEngine')->getDeliveryCountry();
		
		/** @var \Thelia\Model\Product $product */
		foreach ( $loopResult->getResultDataCollection () as $product ) {
			
			$loopResultRow = new LoopResultRow ( $product );
			
            // Find previous and next product, in the default category.
            $default_category_id = $product->getDefaultCategoryId();
            
            $price = $product->getProductSaleElementss () [0]->getProductPrices () [0]->getPrice ();//should be this -> $product->getVirtualColumn('price')
            	
            if ($securityContext->hasCustomerUser() && $securityContext->getCustomerUser()->getDiscount() > 0) {
            	$price = $price * (1-($securityContext->getCustomerUser()->getDiscount()/100));
            }
            	
            try {
            	$taxedPrice = $product->getTaxedPrice(
            			$taxCountry,
            			$price
            			);
            } catch (TaxEngineException $e) {
            	$taxedPrice = null;
            }
            

            $loopResultRow
                ->set("PRODUCT_SALE_ELEMENT", $product->getVirtualColumn('pse_id'))
                ->set("PSE_COUNT", $product->getVirtualColumn('pse_count'))
                ->set("QUANTITY", $product->getVirtualColumn('quantity'))
                ->set("PRICE", $price)
                ->set("PRICE_TAX", $taxedPrice - $price)
                ->set("TAXED_PRICE", $taxedPrice)
                ->set("BEST_TAXED_PRICE",  $taxedPrice)
            ;
           //   	$log->debug ( "prod ".$product->getId()." pse count ".$product->getVirtualColumn('pse_count')." quantity ".$product->getVirtualColumn('quantity'));
			$this->addOutputFields ( $loopResultRow, $product );
			
			$loopResult->addRow ( $this->associateValues ( $loopResultRow, $product, $default_category_id ) );
		}
		
		return $loopResult;
	}
	
	/**
	 *
	 * @param LoopResultRow $loopResultRow
	 *        	the current result row
	 * @param \Thelia\Model\Product $product        	
	 * @param
	 *        	$default_category_id
	 * @return mixed
	 */
	private function associateValues($loopResultRow, $product, $default_category_id) {
		$log = Tlog::getInstance ();
		//$log->debug ( " innerjoinprod " .$product->getUrl ( $this->locale ) );
		//$log->debug ( " URLpath " . implode ( "|", $product->getVirtualColumns () ) );
	//	$montage = MontageQuery::create()->findById($product->getVirtualColumn('montage_id'));
		
		$loopResultRow
		->set ( "ID", $product->getId () )
		->set ( "REF", $product->getRef () )
		->set ( "LOCALE", "de_DE" )
		->set ( "URL", $product->getUrl ( "de_DE" ) )
		->set ( "POSITION", $product->getPosition () )
		->set ( "VIRTUAL", $product->getVirtual () ? "1" : "0" )
		->set ( "VISIBLE", $product->getVisible () ? "1" : "0" )
		->set ( "TEMPLATE", $product->getTemplateId () )
		->set ( "DEFAULT_CATEGORY", $default_category_id )
		->set ( "TAX_RULE_ID", $product->getTaxRuleId () )
		->set ( "BRAND_ID", $product->getBrandId () ?: 0 )
		->set ( "TITLE", $product->getTitle () )// $product->getTitle())
		//->set ( "BEST_TAXED_PRICE", $product->getProductSaleElementss () [0]->getProductPrices () [0]->getPrice ()*1.2 )
		//->set ( "CHAPO",  ) // $product->getProductI18ns()[0]->getChapo())
		->set ( "DESCRIPTION", $product->getDescription())
		->set ( "POWER", $product->getVirtualColumn ( 'power' ) )
		->set ( "GRADE", $product->getVirtualColumn ( 'grade' ))
		->set ( "WARMWATER", $product->getVirtualColumn ( 'warm_water' )? "Yes" : "No")
		->set ( "MONTAGE", 250)//$product->getVirtualColumn('montage_id'))
		->set ( "MONTAGETEXT", "asdas")//$montage->__toString())
		;

		return $loopResultRow;
	}
	public function import_brand_names_from_sht_vendors() {
		$vendors = VendorsQuery::create ()->find ();
		
		if ($vendors != null && count ( $vendors ) > 0) {
			foreach ( $vendors as $vendor ) {
				$brand = new Brand ();
				$brand->setTitle ( $vendor->getName () );
				$brand->setVisible ( 1 );
				$brand->setCreatedAt ( date ( "Y-m-d H:i:s" ) );
				$brand->setUpdatedAt ( date ( "Y-m-d H:i:s" ) );
				$brand->save ();
			}
		}
	}
	public function import_montage_from_csv() {
		$log = Tlog::getInstance ();
		$log->debug ( "-- heizung montage import " . $this->getPower () );
		
		$productQuerry = ProductQuery::create ();
		$constraintsQuerry = ConstraintsQuery::create ();
		
		$currentDate = date ( "Y-m-d H:i:s" );
		$serviceCategoryId = 12;
		
		$montageFileName = "C:\Development\programs\\xampp\htdocs\heizfabrik\local\modules\HookKonfigurator\import\montage.csv";
		try {
			$log->debug ( "import file location " . $montageFileName );
			$montageFile = new \SplFileObject ( $montageFileName );
			$montageFile->setFlags ( \SplFileObject::READ_CSV );
			$montageFile->setCsvControl ( ";" );
		} catch ( RuntimeException $e ) {
			printf ( "Error openning csv: %s\n", $e->getMessage () );
		}
		
		while ( ! $montageFile->eof () && ($row = $montageFile->fgetcsv ()) && $row [0] !== null ) {
			// id ref name description type price quantity unit extra_quantity_price constraints_values constraints_names currency duration
			
			$log->debug ( " importing_montage " . implode ( ",", $row ) );
			list ( $id, $ref, $name, $description, $type, $price, $quantity, $unit, $extra_quantity_price, $constraintsValues, $constraintsNames, $currency, $duration ) = $row;
			//excel saves csv as ansi, we need utf8
			$ref = utf8_encode($ref);
			$name = utf8_encode($name);
			$description = utf8_encode($description);
			$type = utf8_encode($type);
			$unit = utf8_encode($unit);
			$constraintsNames = utf8_encode($constraintsNames);
			$log->debug ( " importing_montage encode " . $constraintsNames );
			//change "," to "."
			$price = str_replace(",", ".", $price);
			$extra_quantity_price = str_replace(",", ".", $extra_quantity_price);
			
			if (is_numeric ( $id )) { // skip column names
				$productQuerry->clear ();
				$productExists = count ( $productQuerry->findByRef ( $ref ) );
				
				if ($productExists == 0) // product_numbers must be unique
{
					$productThelia = new Product ();
					$productThelia->setRef ( $ref ); // must be unique
					$productThelia->setVisible ( 1 );
					
					// $productThelia->setTitle($hfproduct->getName());
					$productThelia->setCreatedAt ( $currentDate );
					$productThelia->setUpdatedAt ( $currentDate );
					$productThelia->setVersion ( 1 );
					$productThelia->setVersionCreatedAt ( $currentDate );
					$productThelia->setVersionCreatedBy ( "importer.1" );
					$productThelia->create ( $serviceCategoryId, $price, 1, 1, 'NULL', 20 );
					
					// product description
					$productI18n = new ProductI18n ();
					$productI18n->setProduct ( $productThelia );
					$productI18n->setLocale ( "en_US" );
					$productI18n->setTitle ( $name );
					$productI18n->setDescription ( " Beschreibung von " . $description );
					$productI18n->setChapo ( " Zusammenfassung von " . $name );
					$productI18n->setPostscriptum ( " Merkmalen von " . $name );
					$productI18n->save ();
					
					$productThelia->addProductI18n ( $productI18n );
					
					$product_montage = new Montage ();
					$product_montage->setId ( $productThelia->getId () );
					$product_montage->setType ( $type );
					if(is_numeric($quantity))
					$product_montage->setQuantity ( $quantity );
					$product_montage->setUnit ( $unit );
					if(is_numeric($extra_quantity_price))
					$product_montage->setExtraQuantityPrice ( $extra_quantity_price );
					$product_montage->setDuration ( $duration );
					$log->debug ( "montageerror " . $product_montage->__toString () );
					$product_montage->save ();
					
					$constraintsNamesArray = explode ( ";", $constraintsNames );
					$constraintsValuesArray = explode ( ";", $constraintsValues );

					for($i = 0; $i < sizeof ( $constraintsNamesArray ); $i ++){

						if ($constraintsNamesArray [$i] != "null") {
							
							$montageConstraint = new MontageConstraints ();
							$montageConstraint->setMontageId ( $product_montage->getId () );
							$montageConstraint->setConstraintValue ( $constraintsValuesArray [$i] );

							$constraintsQuerry->clear ();
							$constraints_result = $constraintsQuerry->findByName ( $constraintsNamesArray [$i] );
							if(count($constraints_result)>0){ // old constraint
								$log->debug(" found ".count($constraints_result));
								$montageConstraint->setConstraintsId ( $constraints_result [0]->getId () );
							}
							else { // new constraint
								$constraint = new Constraints ();
								$constraint->setName ( $constraintsNamesArray [$i] );
								$constraint->setDescription ( " description of constraint " . $constraintsNamesArray [$i] );
								$log->debug(" constraintobj ".$constraint->__toString());
								$constraint->save ();
								$montageConstraint->setConstraintsId ( $constraint->getId () );
							}
							$montageConstraint->save();
						}
						else
					$log->debug ( " ref number already in the database '" . $ref . "'" );
					}
			}}else
					$log->debug ( " montage_id is not a number '" . $id . "'" );
		}
		
		// $log->debug("first_line_import_montage ".)
	}
	public function import_product_heizung_from_hfproducts() {
		$log = Tlog::getInstance ();
		$log->debug ( "-- heizung_product_import " );
		
		$hfProductsQuerry = HfproductsQuery::create ();
		$brandI18nQuerry = BrandI18nQuery::create ();
		$productQuerry = ProductQuery::create ();
		$vendorsQuerry = VendorsQuery::create ();
		
		$currentDate = date ( "Y-m-d H:i:s" );
		// $brand->
		// create($defaultCategoryId, $basePrice, $priceCurrencyId, $taxRuleId, $baseWeight, $baseQuantity = 0)
		// categories sht -> thelia
		
		// $productThelia->delete();
		// $productQuerry->findById(32)->delete();
		/*
		 * $productThelia = new Product();
		 * $insertReturn = $productQuerry->doInsert($productThelia);
		 * $log->debug(" insert test ".$insertReturn->__toString());
		 * $productQuerry->doDelete($insertReturn);
		 */
		
		$hfproducts = $hfProductsQuerry->find ();
		$i = 0;
		$limit = 10000;
		if ($hfproducts != null && count ( $hfproducts ) > 0)
			foreach ( $hfproducts as $hfproduct ) {
				$productQuerry->clear ();
				$productExists = count ( $productQuerry->findByRef ( $hfproduct->getProductNumber () ) );
				
				if ($i> -1 && $i < $limit)
					if ($productExists == 0) // product_numbers must be unique
{
						$log->debug ( $hfproduct->__toString () );
						$hfCategory = 1; // heizung
						
						switch ($hfproduct->getTypeId ()) {
							case 1 :
								;
								break; // not relevant ?
							case 2 :
								$hfCategory = 3;
								break; // combi
							case 3 :
								$hfCategory = 1;
								break; // heizung
							case 4 :
								$hfCategory = 2;
								break; // warmwasser
							case 5 :
								$hfCategory = 5;
								break; // solarthermie
							case 6 :
								$hfCategory = 4;
								break; // warmwasserspeicher
							case 9 :
								$hfCategory = 8;
								break; // raumtemperaturregler
							case 10 :
								$hfCategory = 6;
								break; // solarpumpe
							case 11 :
								$hfCategory = 7;
								break; // w�rmepumpe
						}
						$productThelia = new Product ();
						$productThelia->setRef ( $hfproduct->getProductNumber () ); // must be unique
						$productThelia->setVisible ( 1 );
						// brand/vendor
						$vendorsQuerry->clear ();
						$vendor_result = $vendorsQuerry->findById ( $hfproduct->getVendorId () );
						if (! empty ( vendor_result )) {
							$brandI18nQuerry->clear ();
							$brand = $brandI18nQuerry->findByTitle ( $vendor_result [0]->getName () );
							$productThelia->setBrandId ( $brand [0]->getId () );
						}
						// $productThelia->setTitle($hfproduct->getName());
						$productThelia->setCreatedAt ( $currentDate );
						$productThelia->setUpdatedAt ( $currentDate );
						$productThelia->setVersion ( 1 );
						$productThelia->setVersionCreatedAt ( $currentDate );
						$productThelia->setVersionCreatedBy ( "importer.1" );
						$generated_price = rand ( 5, 50 ) * 100;
						$productThelia->create ( $hfCategory, $generated_price, 1, 1, 'NULL', 20 );
						
						// product description
						$productI18n = new ProductI18n ();
						$productI18n->setProduct ( $productThelia );
						$productI18n->setLocale ( "en_US" );
						$productI18n->setTitle ( $hfproduct->getName () );
						$productI18n->setDescription ( $hfproduct->getShtText1 () . " " . $hfproduct->getShtText2 () );
						$productI18n->setChapo ( " summary of " . $hfproduct->getName () );
						$productI18n->setPostscriptum ( " features of " . $hfproduct->getName () );
						$productI18n->save ();
						
						$productThelia->addProductI18n ( $productI18n );
						
						$product_image_url = $hfproduct->getImage ();
						if($product_image_url){
						// product image
						$image_path = 'C:\Development\programs\xampp\htdocs\heizfabrik\local\media\images\product\\';
						$image_name = 'PROD_' . preg_replace("/[^a-zA-Z0-9.]/", "", $hfproduct->getProductNumber ()) . '.jpg';
						
						try{
							$image_from_server =@file_get_contents ( $product_image_url );
						}
						catch (Exception $e) {
							$log->debug ("ProductImageException :".$e->getMessage());
						}
						
						if($image_from_server){
						file_put_contents ( $image_path . $image_name, $image_from_server );
						
						$product_image = new ProductImage ();
						$product_image->setProduct ( $productThelia );
						$product_image->setVisible ( 1 );
						$product_image->setCreatedAt ( $currentDate );
						$product_image->setUpdatedAt ( $currentDate );
						$product_image->setFile ( $image_name );
						$product_image->save ();
						
						$productThelia->addProductImage ( $product_image );
						}

						
						}
						
						$specification_origin_name = $hfproduct->getSpecificationName ();
						if($specification_origin_name){
						// product specification document
						$document_path = 'C:\Development\programs\xampp\htdocs\heizfabrik\local\media\documents\product\\';
						
						$specification_name = 'SPECS_' . $specification_origin_name;
						$specification_origin = 'http://eek.fts.at/files/specifications/';
						
						try{
						$specification_from_server = @file_get_contents ( $specification_origin . $specification_origin_name ) ;	
						}
						catch (Exception $e) {
							$log->debug ("ProductSpecificationException :".$e->getMessage());
						}
						
						if($specification_from_server){
						file_put_contents ( $document_path . $specification_name, $specification_from_server);	
						
						$product_specification = new ProductDocument ();
						$product_specification->setProduct ( $productThelia );
						$product_specification->setVisible ( 1 );
						$product_specification->setCreatedAt ( $currentDate );
						$product_specification->setUpdatedAt ( $currentDate );
						$product_specification->setFile ( $specification_name );
						$product_specification->save ();
						
						$productLabelI18n = new ProductDocumentI18n ();
						$productLabelI18n->setLocale ( "en_US" );
						$productLabelI18n->setTitle ( $specification_name );
						$productLabelI18n->setProductDocument ( $product_specification );
						$productLabelI18n->save ();
						
						$productThelia->addProductDocument ( $product_specification );
						} 

						
						}
						
						$label_origin_name = $hfproduct->getLabelName ();
						if($label_origin_name){
						// product label document
						$document_path = 'C:\Development\programs\xampp\htdocs\heizfabrik\local\media\documents\product\\';
						$label_name = 'LABEL_' . $label_origin_name;
						$label_origin = 'http://eek.fts.at/files/labels/';
						
						try{
						$label_from_server = @file_get_contents ( $label_origin . $label_origin_name );
						}
						catch (Exception $e) {
							$log->debug ("ProductLabelException :".$e->getMessage());
						}
						
						if($label_from_server)
						{
						file_put_contents ( $document_path . $label_name, $label_from_server );
						
						$product_label = new ProductDocument ();
						$product_label->setProduct ( $productThelia );
						$product_label->setVisible ( 1 );
						$product_label->setCreatedAt ( $currentDate );
						$product_label->setUpdatedAt ( $currentDate );
						$product_label->setFile ( $label_name );
						$product_label->save ();
						
						$productLabelI18n = new ProductDocumentI18n ();
						$productLabelI18n->setLocale ( "en_US" );
						$productLabelI18n->setTitle ( $label_name );
						$productLabelI18n->setProductDocument ( $product_label );
						$productLabelI18n->save ();
						
						$productThelia->addProductDocument ( $product_label );
						}
						}
						
						$product_heizung = new ModelProductHeizung ();
						$product_heizung->setProductId ( $productThelia->getId () );
						$product_heizung->setGrade ( $hfproduct->getGrade () );
						$product_heizung->setPower ( $hfproduct->getSpaceHeaterPower () );
						$product_heizung->setEnergyEfficiency ( $hfproduct->getSpaceHeaterEfficiency () );
						
						if (empty ( $hfproduct->getWaterHeaterEnergyClass () ))
							$product_heizung->setWarmWater ( 0 );
						else
							$product_heizung->setWarmWater ( 1 );
						$product_heizung->setStorageCapacity ( $hfproduct->getStorageVolume () );
						
						$product_heizung->save ();
						
						$log->debug ( "theliaproduct " . $productThelia->__toString () );
						sleep(1);
					} else
						$log->debug ( "hfproduct.importer.1 reference_number " . $hfproduct->getProductNumber () . " is used by another product" );
				$i += 1;

			}
	}
	
	public function buildModelCriteria() {
		// $this->import_product_heizung_from_hfproducts();
		//$this->import_montage_from_csv ();
		//debug
		$log = Tlog::getInstance ();
		 
		$request = $this->getCurrentRequest();
		
		$currentCustomer = $this->securityContext->getCustomerUser();
		if($currentCustomer == null)
			$currentCustomer	= 0;//$this->getCurrentRequest()->getSession()->getId();
			else $currentCustomer = $currentCustomer->getId();
		
			$log->error(" create userdatenquery ".$currentCustomer);
			 
				$userdata = new HeizungkonfiguratorUserdaten();
				$userdata->setBrennstoffMomentan($request->request->get('konfigurator')['brennstoff_momentan'])
				->setBrennstoffZukunft($request->request->get('konfigurator')['brennstoff_zukunft'])
				->setGebaeudeart($request->request->get('konfigurator')['gebaeudeart'])
				->setPersonenAnzahl($request->request->get('konfigurator')['personen_anzahl'])
		//		->setBestehendeGeraetWarmwasser($request->request->get('konfigurator')['bestehendes_geraet_mit_warmwasser'])
		//		->setBestehendeGeraetKw($request->request->get('konfigurator')['bestehendes_geraet_kw'])
				->setBaujahr($request->request->get('konfigurator')['baujahr'])
				->setGebaeudelage($request->request->get('konfigurator')['lage_des_gebaeudes'])
				->setWindlage($request->request->get('konfigurator')['windlage_des_gebaudes'])
				->setAnzahlAussenwaende($request->request->get('konfigurator')['anzahl_aussenwaende'])
				->setVerglasteFenster($request->request->get('konfigurator')['fenster'])
				->setWohnraumtemperatur($request->request->get('konfigurator')['wohnraumtemperatur'])
				->setAussentemperatur($request->request->get('konfigurator')['aussentemperatur'])
				->setWaermedaemmung($request->request->get('konfigurator')['waermedaemmung'])
				->setHeizflaeche($request->request->get('konfigurator')['flaeche'])
				->setAnmerkungen($request->request->get('konfigurator')['anmerkungen'])
				->setAbgasfuehrung($request->request->get('konfigurator')['abgasfuehrung'])
				->setWaermeabgabe($request->request->get('konfigurator')['waermeabgabe'])
				->setDuschwasser($request->request->get('konfigurator')['duschwasser'])
				->setWasserabfluss($request->request->get('konfigurator')['wasserabfluss'])
				->setDachDaemmung($request->request->get('konfigurator')['dach_daemmung'])
				->setWarmwasserversorgung($request->request->get('konfigurator')['warmwasserversorgung'])
				->setWarmwasserversorgungExtra($request->request->get('konfigurator')['warmwasserversorgung-extra'])
				->setWarmwasserversorgungExtraWaermepumpe($request->request->get('konfigurator')['warmwasserversorgung-extra-waermepumpe'])				
				->setCreatedAt(date ( "Y-m-d H:i:s" ))
				->setUserId($currentCustomer)
				->setVersion("1.0")
				->save();	
		
			$log->error(" create userdatenquery ".$userdata);
			//get images
			$files = new FileBag();
			$files = $request->files;
			 
			$media_dir = explode("local",dirname(__FILE__));
			$media_dir = $media_dir[0]."local".DIRECTORY_SEPARATOR."media".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."heizungskonfiguratorimages";
			 
			$image_save_path = $media_dir .DIRECTORY_SEPARATOR;
		
			$log->error(" userdatenquery ".dirname(__FILE__)." ".$image_save_path." ");
		
			$i = 0;
			if($files->get("file")!=NULL)
				foreach ($files->get("file") as $image){
					if($image != null){
						$new_image_name = $image->getClientOriginalName();
						$image->move( $image_save_path ,$new_image_name);
		
						$newImage = new HeizungkonfiguratorImage();
						$newImage->setHeizungkonfiguratorUserdaten($userdata)
						->setFile($new_image_name)
						->setVisible(1)
						->setPosition($i)
						->setCreatedAt(date ( "Y-m-d H:i:s" ))
						->setUpdatedAt(date ( "Y-m-d H:i:s" ))
						->save();
						$i++;
						$userdata->addHeizungkonfiguratorImage($newImage);
					}
					 
					 
			}
		
			$log->error(" create userdatenquery ".$newImage);
		
		// there has to be some better way to convert request parameters into an entity
		$request = $this->request;
		$konfigurator = new Konfiguratoreinstellung ();
		$konfigurator->populateKonfiguratorFromRequest ( $request );
		$waermebedarf = $konfigurator->calculateWaermebedarf () / 1000;
		header ( 'waermebedarf:' . $waermebedarf );
		
		
		$log = Tlog::getInstance ();
		$log->debug(" building modelCriteria for ".ProductHeizungTableMap::TABLE_NAME." ".$this->request->attributes->get('category_id'));
		//$this->request->attributes->get('category_id')
		$search = ProductQuery::create ();
		/*
		//product sale element
		$currencyId = $this->getCurrency();
		if (null !== $currencyId) {
			$currency = CurrencyQuery::create()->findOneById($currencyId);
			if (null === $currency) {
				throw new \InvalidArgumentException('Cannot find currency id: `' . $currency . '` in product_sale_elements loop');
			}
		} else {
			$currency = $this->request->getSession()->getCurrency();
		}*/
		
		$search->innerJoinProductSaleElements('pse');
		$search->addJoinCondition('pse', '`pse`.IS_DEFAULT=1');
		
		$search->innerJoinProductSaleElements('pse_count');
		
		$search->withColumn('`pse`.ID', 'pse_id');
		$search->withColumn('`pse`.QUANTITY', 'quantity');
		$search->withColumn('COUNT(`pse_count`.ID)', 'pse_count');
		
		$search->groupBy(ProductTableMap::ID);
		
		// $log->debug("productsuggestionpower ".$waermebedarf." request ".$request->__toString()." waermebedarf ".$waermebedarf);
		
		$heizungJoin = new Join ();
		$heizungJoin->addExplicitCondition ( ProductTableMap::TABLE_NAME, 'ID', null, ProductHeizungTableMap::TABLE_NAME, 'PRODUCT_ID', 'hz' );
		$heizungJoin->setJoinType ( Criteria::LEFT_JOIN );

		$brennstoff = $konfigurator->getBrennstoffZukunft();
		if($brennstoff == 4)$brennstoff == 99;//no products
		
		
		$warm_water = $request->request->get('konfigurator')['warmwasserversorgung'];
		
		if($warm_water == 1)
          $warm_water = $request->request->get('konfigurator')['warmwasserversorgung-extra'];
		else $warm_water = 0;
          $log->error(" warm_water ".$warm_water." ws ".$request->request->get('konfigurator')['warmwasserversorgung']);
		$search
		->addJoinObject ( $heizungJoin, 'HeizungProduct' )
		->withColumn ( '`hz`.grade', 'grade' )
		->withColumn ( '`hz`.power', 'power' )
		->withColumn ( '`hz`.energy_efficiency', 'energy_efficiency' )
		->withColumn ( '`hz`.priority', 'priority' )
		->withColumn ( '`hz`.warm_water', 'warm_water' )
		->withColumn ( '`hz`.energy_carrier', 'energy_carrier' )
		->withColumn ( '`hz`.storage_capacity', 'storage_capacity' )
		->condition  ( 'same_product_id', 'product.id = `hz`.product_id' )
		->setJoinCondition ( 'HeizungProduct', 'same_product_id' )
		->condition ( 'power_larger_then', 'power >= ?', $waermebedarf - 2, \PDO::PARAM_INT )
		//->condition ( 'power_smaller_then', 'power <= ?', $waermebedarf + 4, \PDO::PARAM_INT )
		->condition ( 'warmwasserversorgung', 'warm_water = ?', $warm_water, \PDO::PARAM_INT );
		
		/*if($brennstoff>4)
			$search
			->condition('brennstoff_zukunft', 'energy_carrier > ?',$brennstoff,\PDO::PARAM_STR)
			->where ( array ('power_larger_then','brennstoff_zukunft','warmwasserversorgung' ), Criteria::LOGICAL_AND ); // power_condition
		else */
			$search->condition('brennstoff_zukunft', 'energy_carrier = ?',$brennstoff,\PDO::PARAM_INT);
//			if($warm_water >0)
				$search->where ( array ('power_larger_then','brennstoff_zukunft','warmwasserversorgung' ), Criteria::LOGICAL_AND );			
		//if ($visible !== Type\BooleanOrBothType::ANY) {
			$search->filterByVisible(1);
		//}
/*
		$servicesJoin = new Join();
		$servicesJoin->addExplicitCondition ( ProductTableMap::TABLE_NAME, 'ID', null, ProductHeizungMontageTableMap::TABLE_NAME, 'PRODUCT_HEIZUNG_ID', 'hzm' );
		$servicesJoin->setJoinType ( Criteria::LEFT_JOIN );
		
		$search
		->addJoinObject ( $servicesJoin, 'HeizungProductMontage' )
		->withColumn ( '`hzm`.montage_id', 'montage_id' )
		->condition ( 'same_heizung_id', 'product.id = `hzm`.product_heizung_id' )
		->setJoinCondition ( 'HeizungProductMontage', 'same_heizung_id' );
		*/
			
		/*
		$priceJoin = new Join();
		$priceJoin->addExplicitCondition(ProductSaleElementsTableMap::TABLE_NAME, 'ID', 'pse', ProductPriceTableMap::TABLE_NAME, 'PRODUCT_SALE_ELEMENTS_ID', 'price');
		$priceJoin->setJoinType(Criteria::LEFT_JOIN);
		
		$search->addJoinObject($priceJoin, 'price_join')
		->addJoinCondition('price_join', '`price`.`currency_id` = ?', $currency->getId(), null, \PDO::PARAM_INT);
		*/
		return $search;
	}
}
