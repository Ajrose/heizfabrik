<?php
/*************************************************************************************/
/*      This file is part of the Thelia package.                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

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
use Propel\Runtime\ActiveQuery\Criterion\AbstractCriterion;
use HookKonfigurator\Model\ProductHeizungQuery;


/**
 *
 * ProductHeizung loop
 *
 * Class ProductHeizung
 * @package HookKonfigurator\Loop
 * @author Emanuel Plopu <emanuel.plopu@sepa.at>
 */
class ProductHeizung extends BaseI18nLoop implements PropelSearchLoopInterface, SearchLoopInterface
{
    protected $timestampable = true;
    protected $versionable = true;

    /**
     * @return ArgumentCollection
     */
    protected function getArgDefinitions()
    {
        return new ArgumentCollection(
		    Argument::createFloatTypeArgument('power')
        );
    }

    public function getSearchIn()
    {
        return [
            "ref",
            "title",
        ];
    }

    /**
     * @param ProductQuery $search
     * @param $searchTerm
     * @param $searchIn
     * @param $searchCriteria
     */
    public function doSearch(&$search, $searchTerm, $searchIn, $searchCriteria)
    {
        $search->_and();
        foreach ($searchIn as $index => $searchInElement) {
            if ($index > 0) {
                $search->_or();
            }
            switch ($searchInElement) {
                case "ref":
                    $search->filterByRef($searchTerm, $searchCriteria);
                    break;
                case "title":
                    $search->where("CASE WHEN NOT ISNULL(`requested_locale_i18n`.ID) THEN `requested_locale_i18n`.`TITLE` ELSE `default_locale_i18n`.`TITLE` END ".$searchCriteria." ?", $searchTerm, \PDO::PARAM_STR);
                    break;
            }
        }
    }

    public function parseResults(LoopResult $loopResult)
    {
    //    $complex = $this->getComplex();

      //  if (true === $complex) {
       //     return $this->parseComplexResults($loopResult);
        //} else {
		//	return $loopResult;
		
            return $this->parseSimpleResults($loopResult);
        //}
    }

    public function parseSimpleResults(LoopResult $loopResult)
    {
    	
    	$log = Tlog::getInstance();
    	$log->debug("loop result number ".count($loopResult->getResultDataCollection()));
    	
    	
        /** @var \Thelia\Core\Security\SecurityContext $securityContext */
        $securityContext = $this->container->get('thelia.securityContext');
		$i = 0;
        /** @var \Thelia\Model\Product $product */
        foreach ($loopResult->getResultDataCollection() as $product) {
        	
        	
            $loopResultRow = new LoopResultRow($product);

/*
            $loopResultRow
            ->set("BEST_TAXED_PRICE", $i)
            ;
            $i+=1;*/

            $this->addOutputFields($loopResultRow, $product);

            $loopResult->addRow($this->associateValues($loopResultRow, $product, $default_category_id));
        }

        return $loopResult;
    }

    /**
     * @param  LoopResultRow         $loopResultRow the current result row
     * @param  \Thelia\Model\Product $product
     * @param $default_category_id
     * @return mixed
     */
    private function associateValues($loopResultRow, $product, $default_category_id)
    {
    	$log = Tlog::getInstance();
    	$log->debug(" innerjoinprod ".implode("|",$product->getVirtualColumns()));
        $loopResultRow
            ->set("ID", $product->getId())
            ->set("REF", $product->getRef())
            ->set("LOCALE", $this->locale)
            ->set("URL", $product->getUrl($this->locale))
            ->set("POSITION", $product->getPosition())
            ->set("VIRTUAL", $product->getVirtual() ? "1" : "0")
            ->set("VISIBLE", $product->getVisible() ? "1" : "0")
            ->set("TEMPLATE", $product->getTemplateId())
            ->set("DEFAULT_CATEGORY", $default_category_id)
            ->set("TAX_RULE_ID", $product->getTaxRuleId())
            ->set("BRAND_ID", $product->getBrandId() ?: 0)
            ->set("TITLE",$product->getTitle())//$product->getTitle())
            ->set("BEST_TAXED_PRICE", $product->getProductSaleElementss()[0]->getProductPrices()[0]->getPrice())
            ->set("CHAPO",$product->getVirtualColumn('power'))//$product->getProductI18ns()[0]->getChapo())
            ->set("QUANTITY", 20)
        ;

        return $loopResultRow;
    }
    
    public function import_brand_names_from_sht_vendors(){
    	$vendors = VendorsQuery::create()->find();
    	
    	if($vendors != null && count($vendors)>0){
    		foreach ($vendors as $vendor){
    			$brand = new Brand();
    			$brand->setTitle($vendor->getName());
    			$brand->setVisible(1);
    			$brand->setCreatedAt(date("Y-m-d H:i:s"));
    			$brand->setUpdatedAt(date("Y-m-d H:i:s"));
    			$brand->save();
    		}
    	}
    }
    
    public function import_product_heizung_from_hfproducts(){
    	$log = Tlog::getInstance();
    	$log->debug("-- heizung product import ".$this->getPower());
    	
    	$hfProductsQuerry  = HfproductsQuery::create();
    	$brandI18nQuerry = BrandI18nQuery::create();
		$productQuerry = ProductQuery::create();
    	$vendorsQuerry = VendorsQuery::create();

    	$currentDate = date("Y-m-d H:i:s");
//$brand->
//create($defaultCategoryId, $basePrice, $priceCurrencyId, $taxRuleId, $baseWeight, $baseQuantity = 0)
//categories sht -> thelia

//$product_thelia->delete();
//$productQuerry->findById(32)->delete();
/*
    	$product_thelia = new Product();
    	$insertReturn = $productQuerry->doInsert($product_thelia);
    	$log->debug(" insert test ".$insertReturn->__toString());
    	$productQuerry->doDelete($insertReturn);*/
    	
    	$hfproducts = $hfProductsQuerry->find();
    	$i = 0;
    	$limit = 60;
    	if($hfproducts != null && count($hfproducts)>0)
    		foreach ($hfproducts as $hfproduct){
    		$productQuerry->clear();
    		$productExists =count($productQuerry->findByRef($hfproduct->getProductNumber()));
    			
    		if($i < $limit)
    		if($productExists==0)//product_numbers must be unique
    		{
    			$log->debug($hfproduct->__toString());
    			$hfCategory = 1;//heizung
    			
    			switch($hfproduct->getTypeId()){
    				case 1:;break;//not relevant ?
    				case 2: $hfCategory = 3;break;//combi
    				case 3: $hfCategory = 1;break;//heizung
    				case 4: $hfCategory = 2;break;//warmwasser
    				case 5: $hfCategory = 5;break;//solarthermie
    				case 6: $hfCategory = 4;break;//warmwasserspeicher
    				case 9: $hfCategory = 8;break;//raumtemperaturregler
    				case 10: $hfCategory = 6;break;//solarpumpe
    				case 11: $hfCategory = 7;break;//wärmepumpe
    			}
    			$product_thelia = new Product();
    			$product_thelia->setRef($hfproduct->getProductNumber());//must be unique
    			$product_thelia->setVisible(1);
    			// brand/vendor
    			$vendorsQuerry->clear();
    			$vendor_result =$vendorsQuerry->findById($hfproduct->getVendorId());
    			if(!empty(vendor_result)){
    				$brandI18nQuerry->clear();
    				$brand = $brandI18nQuerry->findByTitle($vendor_result[0]->getName());
    				$product_thelia->setBrandId($brand[0]->getId());
    			}
    			//$product_thelia->setTitle($hfproduct->getName());
    			$product_thelia->setCreatedAt($currentDate);
    			$product_thelia->setUpdatedAt($currentDate);
    			$product_thelia->setVersion(1);
    			$product_thelia->setVersionCreatedAt($currentDate);
    			$product_thelia->setVersionCreatedBy("importer.1");
    			$generated_price = rand(5,50)*100;
    			$product_thelia->create($hfCategory, $generated_price, 1, 1, 'NULL',20);

    			//product description
    			$productI18n = new ProductI18n();
    			$productI18n->setProduct($product_thelia);
    			$productI18n->setLocale("en_US");
    			$productI18n->setTitle($hfproduct->getName());
    			$productI18n->setDescription($hfproduct->getShtText1()." ".$hfproduct->getShtText2());
    			$productI18n->setChapo(" summary of ".$hfproduct->getName());
    			$productI18n->setPostscriptum(" features of ".$hfproduct->getName());
    			$productI18n->save();
    			
    			$product_thelia->addProductI18n($productI18n);	
    			
    			//product image
    			$image_path = 'C:\Development\programs\xampp\htdocs\thelia\local\media\images\product\\';
    			$image_name = 'PROD_'.$hfproduct->getProductNumber().'.jpg';
    			file_put_contents($image_path.$image_name, file_get_contents($hfproduct->getImage()));
    			
    			$product_image = new ProductImage();
    			$product_image->setProduct($product_thelia);
    			$product_image->setVisible(1);
    			$product_image->setCreatedAt($currentDate);
    			$product_image->setUpdatedAt($currentDate);
    			$product_image->setFile($image_name);
    			$product_image->save();
    			
    			$product_thelia->addProductImage($product_image);
    			
    			//product specification document
    			$document_path = 'C:\Development\programs\xampp\htdocs\thelia\local\media\documents\product\\';
    			$specification_origin_name =  $hfproduct->getSpecificationName();
    			$specification_name = 'SPECS_'.$specification_origin_name;
    			$specification_origin = 'http://eek.fts.at/files/specifications/';
    			file_put_contents($document_path.$specification_name, file_get_contents($specification_origin.$specification_origin_name));
    			
    			$product_specification = new ProductDocument();
    			$product_specification->setProduct($product_thelia);
    			$product_specification->setVisible(1);
    			$product_specification->setCreatedAt($currentDate);
    			$product_specification->setUpdatedAt($currentDate);
    			$product_specification->setFile($specification_name);
    			$product_specification->save();

    			$productLabelI18n= new ProductDocumentI18n();
    			$productLabelI18n->setLocale("en_US");
    			$productLabelI18n->setTitle($specification_name);
    			$productLabelI18n->setProductDocument($product_specification);
    			$productLabelI18n->save();
    			
    			$product_thelia->addProductDocument($product_specification);
    			
    			//product label document
    			$document_path = 'C:\Development\programs\xampp\htdocs\thelia\local\media\documents\product\\';
    			$label_origin_name =  $hfproduct->getLabelName();
    			$label_name = 'LABEL_'.$label_origin_name;
    			$label_origin = 'http://eek.fts.at/files/labels/';
    			file_put_contents($document_path.$label_name, file_get_contents($label_origin.$label_origin_name));
    			 
    			$product_label = new ProductDocument();
    			$product_label->setProduct($product_thelia);
    			$product_label->setVisible(1);
    			$product_label->setCreatedAt($currentDate);
    			$product_label->setUpdatedAt($currentDate);
    			$product_label->setFile($label_name);
    			$product_label->save();
    			
    			$productLabelI18n= new ProductDocumentI18n();
    			$productLabelI18n->setLocale("en_US");
    			$productLabelI18n->setTitle($label_name);
    			$productLabelI18n->setProductDocument($product_label);
    			$productLabelI18n->save();

    			$product_thelia->addProductDocument($product_specification);
    			//$hfproduct = new Hfproducts();
    			//product heizfabrik specific details
    			
    			$product_heizung = new ModelProductHeizung();
    			$product_heizung->setProductId($product_thelia->getId());
    			$product_heizung->setGrade($hfproduct->getGrade());
    			$product_heizung->setPower($hfproduct->getSpaceHeaterPower());
    			$product_heizung->setEnergyEfficiency($hfproduct->getSpaceHeaterEfficiency());
    			 
    			if(empty($hfproduct->getWaterHeaterEnergyClass()))
    				$product_heizung->setWarmWater(0);
    			else $product_heizung->setWarmWater(1);
    			$product_heizung->setStorageCapacity($hfproduct->getStorageVolume());
    			
    			$product_heizung->save();
    			
    			
    			$log->debug("theliaproduct ".$product_thelia->__toString());
    		}
    		else $log->debug("hfproduct.importer.1 reference_number ".$hfproduct->getProductNumber()." is used by another product");
    		$i += 1;
    	}
    }

    public function buildModelCriteria()
    {
    	//$this->import_product_heizung_from_hfproducts();
        $search = ProductQuery::create();

        $log = Tlog::getInstance();
        
        // there has to be some better way to convert request parameters into an entity
        $request = $this->request;
        $konfigurator = new Konfiguratoreinstellung ();
        $konfigurator->populateKonfiguratorFromRequest ( $request );
        $konfigurator->calculateWaermebedarf ();
        $waermebedarf = $konfigurator->calculateWaermebedarf () / 1000;
        header('waermebedarf:'.$waermebedarf);
        
//$log->debug("productsuggestionpower ".$waermebedarf." request ".$request->__toString()." waermebedarf ".$waermebedarf);

        $heizungJoin = new Join();
        $heizungJoin->addExplicitCondition(
            ProductTableMap::TABLE_NAME,
            'ID',
            null,
            ProductHeizungTableMap::TABLE_NAME,
            'PRODUCT_ID',
            'a');
        $heizungJoin->setJoinType(Criteria::LEFT_JOIN);

        
     //   $heizung = new ProductHeizung();
     //   $heizung->getPower()
//ProductHeizungTableMap::PRODUCT_ID
        $search
        ->addJoinObject($heizungJoin, 'HeizungProductPower')
        ->withColumn('`a`.grade', 'grade')
        ->withColumn('`a`.power', 'power')
        ->withColumn('`a`.energy_efficiency', 'energy_efficiency')
        ->withColumn('`a`.priority', 'priority')
        ->withColumn('`a`.warm_water', 'warm_water')
        ->withColumn('`a`.energy_carrier', 'energy_carrier')
        ->withColumn('`a`.storage_capacity', 'storage_capacity')
        ->condition('power_larger_then','`a`.power >= (?-1)',$waermebedarf, \PDO::PARAM_INT)
        ->condition('power_smaller_then','`a`.power <= (?+1)',$waermebedarf, \PDO::PARAM_INT)
        ->combine(array('power_larger_then','power_smaller_then'),'and','power_condition')
        ->setJoinCondition('HeizungProductPower','power_condition');
        
        
        //->where('`a`.power >= (?-1) AND `a`.power <= (?+1)',$waermebedarf, \PDO::PARAM_INT)

        //->addc;
       // $search->condition('power_interval', '`a`.power >= (?-1) AND `a`.power <= (?+1)',$waermebedarf);
       // $search->setJoinCondition('HeizungProductPower','power_interval');
        
            //->withColumn($clause)
        
       // $log->debug("123search ".$search->get." 123searchb");
        
        
        /*
        Infers the ON clause from a relation name Uses the Propel table maps, based on the schema, 
        to guess the related columns Beware that the default JOIN operator is INNER JOIN, while 
        Criteria defaults to WHERE Examples:  $c->join('Book.Author'); => 
        $c->addJoin(BookTableMap::AUTHOR_ID, AuthorTableMap::ID, Criteria::INNER_JOIN);
        $c->join('Book.Author', Criteria::RIGHT_JOIN); => 
        $c->addJoin(BookTableMap::AUTHOR_ID, AuthorTableMap::ID, Criteria::RIGHT_JOIN);
        $c->join('Book.Author a', Criteria::RIGHT_JOIN); => $c->addAlias('a', AuthorTableMap::TABLE_NAME);
        => $c->addJoin(BookTableMap::AUTHOR_ID, 'a.ID', Criteria::RIGHT_JOIN);
        */
        
        return $search;
    }
}
