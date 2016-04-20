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

/**
 *
 * Services loop
 *
 * Class ProductHeizung
 *
 * @package HookKonfigurator\Loop
 * @author Emanuel Plopu <emanuel.plopu@sepa.at>
 */
class Service extends BaseI18nLoop implements PropelSearchLoopInterface, SearchLoopInterface {
	protected $timestampable = true;
	protected $versionable = true;
	
	/**
	 *
	 * @return ArgumentCollection
	 */
	protected function getArgDefinitions() {
		return new ArgumentCollection ( 
				Argument::createFloatTypeArgument ( 'power' ),
				Argument::createIntListTypeArgument('id'));
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
		$log->debug ( "serviceloop result number " . count ( $loopResult->getResultDataCollection () ) );
		
		/** @var \Thelia\Core\Security\SecurityContext $securityContext */
		$securityContext = $this->container->get ( 'thelia.securityContext' );
		$i = 0;
		/** @var \Thelia\Model\Product $product */
		foreach ( $loopResult->getResultDataCollection () as $product ) {
			$log->debug ( "serviceloop product " . $product->__toString() );
			$loopResultRow = new LoopResultRow ( $product );
			
			$log->debug ( "serviceloop pse_id " . $product->getVirtualColumn('pse_id')." product_id ".$product->getId() );
			
			$loopResultRow
			->set("SERVICE_SALE_ELEMENT", $product->getVirtualColumn('pse_id'))
			->set("SERVICE_PSE_COUNT", $product->getVirtualColumn('pse_count'))
			->set("SERVICE_QUANTITY", $product->getVirtualColumn('quantity'))
			;
			
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
		
		$loopResultRow
		->set ( "SERVICE_ID", $product->getId() )
		->set ( "SERVICE_REF", $product->getRef () )
		->set ( "SERVICE_LOCALE", $this->locale )
		->set ( "SERVICE_URL", $product->getUrl ( $this->locale ) )
		->set ( "SERVICE_POSITION", $product->getPosition () )
		->set ( "SERVICE_VIRTUAL", $product->getVirtual () ? "1" : "0" )
		->set ( "SERVICE_VISIBLE", $product->getVisible () ? "1" : "0" )
		->set ( "SERVICE_TEMPLATE", $product->getTemplateId () )
		->set ( "SERVICE_DEFAULT_CATEGORY", $default_category_id )
		->set ( "SERVICE_TAX_RULE_ID", $product->getTaxRuleId () )
		->set ( "SERVICE_BRAND_ID", $product->getBrandId () ?: 0 )
		->set ( "SERVICE_TITLE", $product->getTitle () )// $product->getTitle())
		->set ( "SERVICE_BEST_TAXED_PRICE", $product->getProductSaleElementss () [0]->getProductPrices () [0]->getPrice () )
		//->set ( "CHAPO",  ) // $product->getProductI18ns()[0]->getChapo())
		->set ( "SERVICE_DESCRIPTION", $product->getDescription())
		;
		
		return $loopResultRow;
	}


	
	public function buildModelCriteria() {
		
		$log = Tlog::getInstance ();
		$log->debug("parametersfromloop ");
		/*$argcol = $this->getArgDefinitions();
		$argcol->rewind();
		$args_text = "";
		$args_text = $args_text.$argcol->current()->name." ".$argcol->current()->getValue();
		$argcol->next();
		$args_text = $args_text.$argcol->current()->name." ".$argcol->current()->getValue();
		$argcol->next();
		$args_text = $args_text.$argcol->current()->name." ".$argcol->current()->getValue();
		$argcol->next();
		$args_text = $args_text.$argcol->current()->name." ".$argcol->current()->getValue();
		$argcol->next();
		$args_text = $args_text.$argcol->current()->name." ".$argcol->current()->getValue();
		$argcol->next();
		$args_text = $args_text.$argcol->current()->name." ".$argcol->current()->getValue();
		$argcol->next();*/
		//this->getArgDefinitions()->current()->name." m ".$this->getArgDefinitions()->current()->getRawValue());
		$search = ProductQuery::create ();
		
		$search->innerJoinProductSaleElements('pse');
		$search->addJoinCondition('pse', '`pse`.IS_DEFAULT=1');
		
		$search->innerJoinProductSaleElements('pse_count');
		
		$search->withColumn('`pse`.ID', 'pse_id');
		$search->withColumn('`pse`.QUANTITY', 'quantity');
		$search->withColumn('COUNT(`pse_count`.ID)', 'pse_count');
		
		$search->groupBy(ProductTableMap::ID);
		
		$search
		->condition ( 'power_larger_then', 'product.id >= ?', "250", \PDO::PARAM_INT )
		->condition ( 'power_smaller_then', 'product.id <= ?', 260, \PDO::PARAM_INT )
		->where ( array ('power_larger_then','power_smaller_then' ), Criteria::LOGICAL_AND );
		
		
		
		
	//	where('b.Title = ?', 'foo');
/*		$heizungJoin = new Join ();
		$heizungJoin->addExplicitCondition ( ProductTableMap::TABLE_NAME, 'ID', null, ProductHeizungTableMap::TABLE_NAME, 'PRODUCT_ID', 'hz' );
		$heizungJoin->setJoinType ( Criteria::LEFT_JOIN );
		
		$search
		->addJoinObject ( $heizungJoin, 'HeizungProduct' )
		->withColumn ( '`hz`.grade', 'grade' )
		->withColumn ( '`hz`.power', 'power' )
		->withColumn ( '`hz`.energy_efficiency', 'energy_efficiency' )
		->withColumn ( '`hz`.priority', 'priority' )
		->withColumn ( '`hz`.warm_water', 'warm_water' )
		->withColumn ( '`hz`.energy_carrier', 'energy_carrier' )
		->withColumn ( '`hz`.storage_capacity', 'storage_capacity' )
		->condition ( 'same_product_id', 'product.id = `hz`.product_id' )
		->setJoinCondition ( 'HeizungProduct', 'same_product_id' )
		->condition ( 'power_larger_then', 'power >= ?', 25 - 1, \PDO::PARAM_INT )
		->condition ( 'power_smaller_then', 'power <= ?', 25 + 1, \PDO::PARAM_INT )
		->where ( array ('power_larger_then','power_smaller_then' ), Criteria::LOGICAL_AND ); // power_condition
		/*
		$servicesJoin = new Join();
		$servicesJoin->addExplicitCondition ( ProductTableMap::TABLE_NAME, 'ID', null, ProductHeizungMontageTableMap::TABLE_NAME, 'PRODUCT_HEIZUNG_ID', 'hzm' );
		$servicesJoin->setJoinType ( Criteria::LEFT_JOIN );
		
		$search
		->addJoinObject ( $servicesJoin, 'HeizungProductMontage' )
		->withColumn ( '`hzm`.montage_id', 'montage_id' )
		->condition ( 'same_heizung_id', 'product.id = `hzm`.product_heizung_id' )
		->setJoinCondition ( 'HeizungProductMontage', 'same_heizung_id' );*/
		
		// $search->condition('power_interval', '`a`.power >= (?-1) AND `a`.power <= (?+1)',$waermebedarf);
		// $search->setJoinCondition('HeizungProductPower','power_interval');
		
		/*
		$heizungJoin = new Join ();
		$heizungJoin->addExplicitCondition ( ProductTableMap::TABLE_NAME, 'ID', null, ProductHeizungMontageTableMap::TABLE_NAME, 'PRODUCT_HEIZUNG_ID', 'hz' );
		$heizungJoin->setJoinType ( Criteria::LEFT_JOIN );
		
		$search
		->addJoinObject ( $heizungJoin, 'ProductMontageId' )
		->withColumn ( '`hz`.montage_id', 'montage_id' )
		->condition ( 'same_product_id', 'product.id = `hz`.product_heizung_id' )
		->setJoinCondition ( 'ProductMontageId', 'same_product_id' );
		//->where ('`hz`.montage_id >= ?', 250); // power_condition
/*
		$servicesJoin = new Join();
		$servicesJoin->addExplicitCondition ( ProductTableMap::TABLE_NAME, 'ID', null, ProductHeizungMontageTableMap::TABLE_NAME, 'PRODUCT_HEIZUNG_ID', 'hzm' );
		$servicesJoin->setJoinType ( Criteria::LEFT_JOIN );
		
		$search
		->addJoinObject ( $servicesJoin, 'HeizungProductMontage' )
		->withColumn ( '`hzm`.montage_id', 'montage_id' )
		->condition ( 'same_heizung_id', 'product.id = `hzm`.product_heizung_id' )
		->setJoinCondition ( 'HeizungProductMontage', 'same_heizung_id' );*/
		
		                            // $search->condition('power_interval', '`a`.power >= (?-1) AND `a`.power <= (?+1)',$waermebedarf);
		                            // $search->setJoinCondition('HeizungProductPower','power_interval');
		
		return $search;
	}
}
