<?php
namespace HookKonfigurator\Import;

use Thelia\Core\FileFormat\Formatting\FormatterData;
use Thelia\Core\FileFormat\FormatType;
use Thelia\ImportExport\Import\ImportHandler;
use Thelia\Model\ProductSaleElementsQuery;
use Thelia\Log\Tlog;
use Thelia\Model\ProductQuery;
use HookKonfigurator\Model\ConstraintsQuery;
use Thelia\Model\ProductI18n;
use Thelia\Model\Product;
use HookKonfigurator\Model\Montage;
use HookKonfigurator\Model\MontageConstraints;
use HookKonfigurator\Model\Constraints;
use Thelia\Model\ProductImage;
use Thelia\ImportExport\Import\AbstractImport;
use HookScraper\Controller\HookScraperController;
use Thelia\Model\ProductPriceQuery;
use Thelia\Model\ProductPrice;

/**
 * Class UpdateProducts
 * @package HookKonfigurator\Import
 * @author Emanuel Plopu <emanuel.plopu@sepa.at>
 */
class UpdateProducts extends AbstractImport
{
	public $scraper,$productQuerry,$priceQuerry,$productSaleElementQuerry,$log;
	/** @var Tlog $log */
	protected static $logger;
	
	protected $mandatoryColumns = [
			'EXTERN_ID','BRAND_ID','CATEGORY_ID'
	];
	
	public function importData(array $data)
	{
		$errors = null;
		if($this->scraper == null)
		{
			$this->scraper = new HookScraperController();
			$this->scraper->init();
			$this->scraper->login(1);
			$this->log = Tlog::getInstance ();
		//	$this->productQuerry = ProductQuery::create();
		//	$this->priceQuerry = ProductPriceQuery::create();
		//	$this->productSaleElementQuerry = ProductSaleElementsQuery::create();
		}
		else{
		//	$this->productQuerry->clear();
		//	$this->priceQuerry->clear();
		//	$this->productSaleElementQuerry->clear();
		}
		
		try {
			$this->scraper->scrapeImportedProduct($data["EXTERN_ID"], $data["BRAND_ID"], $data["CATEGORY_ID"]);
			$this->getLogger()->error($data["EXTERN_ID"].",".$data["BRAND_ID"].",".$data["CATEGORY_ID"]);
		} catch (Exception $e) {
			$this->getLogger()->error(" problem processing GC_ID ".$data["EXTERN_ID"].",".$data["BRAND_ID"].",".$data["CATEGORY_ID"]." message ".$e);
		}
	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		/*
		$responsePage =$this->scraper->getResults($data["extern_id"]);

		
		$page = str_replace("\u003cbr /\u003e"," ",$responsePage);
		$jsonResponse = json_decode($page, true);
		$d = $jsonResponse["d"];

		$rows = $d["rows"];
		$product = array_pop($rows);
		
    		$preis = 0;
    		$preisField = $product["Bruttopreis"];
    		$preisEnd = strpos($preisField,".00");
    		if($preisEnd>0)
    			$preis = substr($preisField,0,$preisEnd);
    		
    		$preis = substr_replace($preis, ".", strlen($preis)-2, 0);
			
    		$product_id = $this->productQuerry->findOneByExternId($data["extern_id"]);
    		$product_sale = "";
    		if($product_id != null){
    			$product_sale = $this->productSaleElementQuerry->findOneByProductId($product_id->getId());
    				if($product_sale != null){
    					$product_price = $this->priceQuerry->findOneByProductSaleElementsId($product_sale->getId());
    					if($product_price != null){
    					$product_price->setListenPrice($preis);
    					$product_price->save();
    					}
    					else
    						$errors =" ".$data["extern_id"]." preis ".$preis." price doesn't exist";
    				}
    				else 
    					$errors =" ".$data["extern_id"]." preis ".$preis." pse doesn't exist";
    				$errors =" ".$data["extern_id"]." preis ".$preis;
    		}
    		else
    			$errors =" ".$data["extern_id"]." preis ".$preis." not found in db";

    		
    		*/
    		$this->importedRows++;
		return $errors;
	}
	
	public function getLogger()
	{
		if (self::$logger == null) {
			self::$logger = Tlog::getNewInstance();
	
			$logFilePath = THELIA_LOG_DIR . DS . "log-product_importer.txt";
	
			self::$logger->setPrefix("#LEVEL: #DATE #HOUR: ");
			self::$logger->setDestinations("\\Thelia\\Log\\Destination\\TlogDestinationRotatingFile");
			self::$logger->setConfig("\\Thelia\\Log\\Destination\\TlogDestinationRotatingFile", 0, $logFilePath);
			self::$logger->setLevel(Tlog::ERROR);
		}
		return self::$logger;
	}

}
