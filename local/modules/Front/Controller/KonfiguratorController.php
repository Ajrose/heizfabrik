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
use Thelia\Log\Tlog;

class KonfiguratorController extends BaseFrontController {
	
	public function suggestionsAction(Request $request) {

		//TODO sequence diagramm with the operations starting from konfigurator form and ending to the response products
		if ($request->isXmlHttpRequest ()) {
			$view = $request->get ( 'ajax-view', "includes/konfigurator-suggestions" );
			$request->attributes->set ( '_view', $view );
			//$request->attributes->set ( 'category_id', 13 );
		//	header('waermebedarf:'.$waermebedarf);
			// ->getProductByPower(20,22)->find();//findByProductNumber('84112');
		}
		else 
		{	
		return new JsonResponse ( array ('stuff' => 'more stuff') ); // $productsQuerry->__toString()
		}
	}
	
	public function servicesAction(Request $request) {
		if ($request->isXmlHttpRequest ()) {
			$view = $request->get ( 'ajax-view', "includes/category-services" );
			
			$log = Tlog::getInstance ();
			$log->debug("servicesaction ". $request->get('category'));
			
			$request->attributes->set ( 'category', $request->request->get('category') );
			$request->attributes->set ( '_view', $view );
		}
		else
		{
			return new JsonResponse ( array ('service_stuff' => 'more_service_stuff') ); // $productsQuerry->__toString()
		}
	}
	
}
