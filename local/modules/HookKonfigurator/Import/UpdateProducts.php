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

/**
 * Class UpdateProducts
 * @package HookKonfigurator\Import
 * @author Emanuel Plopu <emanuel.plopu@sepa.at>
 */
class UpdateProducts extends AbstractImport
{
	public $scraper,$productQuerry;
	
	
	protected $mandatoryColumns = [
			'extern_id'
	];
	
	public function importData(array $data)
	{
		if($this->scraper == null)
		{
			$this->scraper = new HookScraperController();
			$this->scraper->init();
			$this->scraper->login(1);
			$this->productQuerry = ProductQuery::create();
		}
		
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
			
    		$product_id = $this->productQuerry->findByExternId($data["extern_id"]);

    		
    		
    		
    		$this->importedRows++;
    		
		return " product: ".get_class($product_id)." preis:".$preis;
	}

}
