<?php

/*************************************************************************************/
/* This file is part of the Thelia package. */
/* */
/* Copyright (c) OpenStudio */
/* email : dev@thelia.net */
/* web : http://www.thelia.net */
/* */
/* For the full copyright and license information, please view the LICENSE.txt */
/* file that was distributed with this source code. */
/**
 * **********************************************************************************
 */
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
use Thelia\Model\Product;
use Propel\Runtime\ActiveQuery\Join;
use HookKonfigurator\Model\Map\ProductHeizungTableMap;
use Thelia\Model\Map\ProductTableMap;
use HookKonfigurator\Model\Konfiguratoreinstellung;
use HookKonfigurator\Model\Montage;
use HookKonfigurator\Model\Map\ProductHeizungMontageTableMap;
use HookKonfigurator\Model\MontageQuery;
use Thelia\Model\Map\SaleTableMap;
use Thelia\Model\Map\ProductSaleElementsTableMap;
use Thelia\Model\Map\ProductPriceTableMap;
use Thelia\Model\CurrencyQuery;

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

		/** @var \Thelia\Model\Product $product */
		foreach ( $loopResult->getResultDataCollection () as $product ) {
			
			$loopResultRow = new LoopResultRow ( $product );
			
            // Find previous and next product, in the default category.
            $default_category_id = $product->getDefaultCategoryId();

            $loopResultRow
                ->set("PRODUCT_SALE_ELEMENT", $product->getVirtualColumn('pse_id'))
                ->set("PSE_COUNT", $product->getVirtualColumn('pse_count'))
                ->set("QUANTITY", $product->getVirtualColumn('quantity'))
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
		$log->debug ( " innerjoinprod " .$product->getUrl ( $this->locale ) );
		$log->debug ( " URLpath " . implode ( "|", $product->getVirtualColumns () ) );
	//	$montage = MontageQuery::create()->findById($product->getVirtualColumn('montage_id'));
		
		$loopResultRow
		->set ( "ID", $product->getId () )
		->set ( "REF", $product->getRef () )
		->set ( "LOCALE", $this->locale )
		->set ( "URL", $product->getUrl ( $this->locale ) )
		->set ( "POSITION", $product->getPosition () )
		->set ( "VIRTUAL", $product->getVirtual () ? "1" : "0" )
		->set ( "VISIBLE", $product->getVisible () ? "1" : "0" )
		->set ( "TEMPLATE", $product->getTemplateId () )
		->set ( "DEFAULT_CATEGORY", $default_category_id )
		->set ( "TAX_RULE_ID", $product->getTaxRuleId () )
		->set ( "BRAND_ID", $product->getBrandId () ?: 0 )
		->set ( "TITLE", $product->getTitle () )// $product->getTitle())
		->set ( "BEST_TAXED_PRICE", $product->getProductSaleElementss () [0]->getProductPrices () [0]->getPrice () )
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

	
	public function buildModelCriteria() {
		//debug
		
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
		
		// there has to be some better way to convert request parameters into an entity
		$request = $this->request;
		$konfigurator = new Konfiguratoreinstellung ();
		$konfigurator->populateKonfiguratorFromRequest ( $request );
		$konfigurator->calculateWaermebedarf ();
		$waermebedarf = $konfigurator->calculateWaermebedarf () / 1000;
		header ( 'waermebedarf:' . $waermebedarf );
		
		// $log->debug("productsuggestionpower ".$waermebedarf." request ".$request->__toString()." waermebedarf ".$waermebedarf);
		
		
		
		
		
		$heizungJoin = new Join ();
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
		->condition ( 'power_larger_then', 'power >= ?', $waermebedarf - 1, \PDO::PARAM_INT )
		->condition ( 'power_smaller_then', 'power <= ?', $waermebedarf + 1, \PDO::PARAM_INT )
		->where ( array ('power_larger_then','power_smaller_then' ), Criteria::LOGICAL_AND ); // power_condition
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
		

		/*
		// First join sale_product table...
		$search
		->leftJoinSaleProduct('SaleProductPriceDisplay')
		;
		
		// ... then the sale table...
		$salesJoin = new Join();
		$salesJoin->addExplicitCondition(
				'SaleProductPriceDisplay',
				'SALE_ID',
				null,
				SaleTableMap::TABLE_NAME,
				'ID',
				'SalePriceDisplay'
				);
		$salesJoin->setJoinType(Criteria::LEFT_JOIN);
		
		$search
		->addJoinObject($salesJoin, 'SalePriceDisplay')
		->addJoinCondition('SalePriceDisplay', '`SalePriceDisplay`.`active` = 1');*/
		
		                            // $search->condition('power_interval', '`a`.power >= (?-1) AND `a`.power <= (?+1)',$waermebedarf);
		                            // $search->setJoinCondition('HeizungProductPower','power_interval');
		
		return $search;
	}
}
