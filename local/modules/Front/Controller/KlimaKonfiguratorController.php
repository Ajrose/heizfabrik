<?php

namespace Front\Controller;

use Front\Front;
use Symfony\Component\HttpFoundation\Request;
use Thelia\Controller\Front\BaseFrontController;
use Symfony\Component\HttpFoundation\JsonResponse;

class KlimaKonfiguratorController extends BaseFrontController {
	
	public function suggestionsAction(Request $request) {

		//TODO sequence diagramm with the operations starting from konfigurator form and ending to the response products
		if ($request->isXmlHttpRequest ()) {
			$view = $request->get ( 'ajax-view', "includes/klimakonfigurator-suggestions" );
			$request->attributes->set ( '_view', $view );
		}
		else 
		{	
		return new JsonResponse ( array ('klimastuff' => 'more klimastuff') ); // $productsQuerry->__toString()
		}
	}

}
