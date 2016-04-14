<?php

namespace Front\Controller;

use Front\Front;
use Propel\Runtime\Exception\PropelException;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Thelia\Controller\Front\BaseFrontController;
use Thelia\Core\Event\Cart\CartEvent;
use Thelia\Core\Event\Order\OrderEvent;
use Thelia\Core\Event\TheliaEvents;
use Thelia\Form\Definition\FrontForm;
use Thelia\Form\Exception\FormValidationException;
use Thelia\Model\ProductQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Thelia\Tools\URL;
use HookKonfigurator\Model\Konfiguratoreinstellung;
use HookKonfigurator\Model\Products;
use HookKonfigurator\Model\HfproductsQuery;
use HookKonfigurator\Model\ProductHeizung;
use HookKonfigurator\Model\ProductHeizungQuery;
use Thelia\Core\Event\Cart\CartItemEvent;
use Thelia\Model\CartItem;
use HookKonfigurator\Model\MontageQuery;

class KonfiguratorController extends BaseFrontController {
	
	public function ajaxAction(Request $request) {

		//TODO sequence diagramm with the operations starting from konfigurator form and ending to the response products
		if ($request->isXmlHttpRequest ()) {
			$view = $request->get ( 'ajax-view', "includes/konfigurator_suggestions" );
			$request->attributes->set ( '_view', $view );
			
		//	header('waermebedarf:'.$waermebedarf);
			// ->getProductByPower(20,22)->find();//findByProductNumber('84112');
		} else {
			$html = "";
			/*
			 * foreach ($products as $product){
			 * $html.="<li id=\"product\">";
			 * $product_image = $product->getImage();
			 * if($product_image == null)$product_image = "http://placehold.it/100x160";
			 * $html.="<img src=\"".$product_image."\">";
			 * $html.="<ul><li><b>Name:</b> ".$product->getName()."</li>";
			 * $html.="<li><b>Space Heater Power:</b> ".$product->getSpaceHeaterPower()."</li>";
			 * $html.="<li><b>Grade:</b> ".$product->getGrade()."</li>";
			 * $html.="<li><b>Montage:</b> ".$product->getMontageId()."</li>";
			 * $html.="<li><b>Price:</b> ".$product->getPrice()."</li>";
			 * $html.="<li><a href=\"http://eek.fts.at/files/labels/".$product->getLabelName()."\" target=\"_blank\">Label</a></li>";
			 * $html.="<li><a href=\"http://eek.fts.at/files/specifications/".$product->getSpecificationName()."\" target=\"_blank\">Datenblatt</a></li>";
			 * $html.="</ul></li>";
			 *
			 * }
			 */
			//$montageQuerry = MontageQuery::create();
			//$found = $montageQuerry->findById(72);
			// "<a href=\"http://eek.fts.at/files/labels/".$product->getLabelName()."\" target=\"_blank\">Label</a>"
			
			// "<a href=\"http://eek.fts.at/files/specifications/".$product->getSpecificationName()."\" target=\"_blank\">Datenblatt</a>"
			
			/*
			 * return new JsonResponse(array('message' => 'Success!','waermebedarf' => $waermebedarf,
			 * 'product' => $html), 200);
			 */
			// $products = $this->getDoctrine ();
			// ,'product'=> $html,'size'=> sizeof($products),'product_heizung'=>$product_heizung->__toString(),'product_thelia'=>$product_thelia->__toString()
			return new JsonResponse ( array (
					'message' => 'Success!'
			) ); // $productsQuerry->__toString()
		}
	}
}
