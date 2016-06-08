<?php

namespace Front\Controller;

use Front\Front;
use Propel\Runtime\Exception\PropelException;
use Symfony\Component\HttpFoundation\Request;
use Thelia\Controller\Front\BaseFrontController;
use Thelia\Core\Event\Cart\CartEvent;
use Thelia\Core\Event\Order\OrderEvent;
use Thelia\Core\Event\TheliaEvents;
use Thelia\Form\Definition\FrontForm;
use Thelia\Form\Exception\FormValidationException;
use Symfony\Component\HttpFoundation\JsonResponse;
use HookKonfigurator\Model\Products;
use Thelia\Log\Tlog;
use Thelia\Model\OrderPostage;
use Thelia\Model\AddressQuery;
use Thelia\Form\CartAdd;

class KonfiguratorController extends BaseFrontController {
	
	public function suggestionsAction(Request $request) {

		//TODO sequence diagramm with the operations starting from konfigurator form and ending to the response products
		if ($request->isXmlHttpRequest ()) {
			$view = $request->get ( 'ajax-view', "includes/konfigurator-suggestions" );
			$request->attributes->set ( '_view', $view );
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
	
	protected function addServiceToCart($id,$product_sale_id,Request $request){
		$log = Tlog::getInstance ();
		$log->debug ( "-- addservices " );
		
		$message = null;

		
		try {
			$cartEvent = $this->getCartEvent();
			$cartEvent->setProduct($id);
			$cartEvent->setAppend(1);
			$cartEvent->setProductSaleElementsId($product_sale_id);
			$cartEvent->setQuantity(1);
			
			$sp_start_ts = $request->request->get('sp_start_ts_'.$id);
			$sp_end_ts   = $request->request->get('sp_end_ts_'.$id);
			$sp_date     = $request->request->get('sp_start_ts_'.$id);

			if(count($sp_start_ts)>0){
				$cartEvent->setSpStartTs($sp_start_ts);
				//$log->debug ("sp_start_ts ".implode(" ",$sp_start_ts));
			}
			
			if(count($sp_end_ts)>0){
				$cartEvent->setSpStartTs($sp_end_ts);
				//$log->debug ("sp_end_ts ".$cartEvent->getProduct() );
			}
			
			if(count($sp_date)>0){
				$cartEvent->setSpStartTs($sp_date);
				//$log->debug ( "sp_start_ts ".$cartEvent->getProduct() );
			}
			
			$this->getDispatcher()->dispatch(TheliaEvents::CART_ADDITEM, $cartEvent);
		
			$this->afterModifyCart();
		
			if ($this->getRequest()->isXmlHttpRequest()) {
				$this->changeViewForAjax();
			}
		
		} catch (PropelException $e) {
			Tlog::getInstance()->error(sprintf("Failed to add item to cart with message : %s", $e->getMessage()));
			$message = $this->getTranslator()->trans(
					"Failed to add this article to your cart, please try again",
					[],
					Front::MESSAGE_DOMAIN
					);
		} catch (FormValidationException $e) {
			$message = $e->getMessage();
		}
		
		if ($message) {
			$cartAdd->setErrorMessage($message);
			$this->getParserContext()->addForm($cartAdd);
		}	
	}
	
	public function addProductWithServicesAction(Request $request) {
		//$request = $this->getRequest();
	//	$cartAdd = new CartAdd();
		$cartAdd = $this->getAddCartForm($request);
		
		$message = null;
		
		try {
			$form = $this->validateForm($cartAdd);
		
			$cartEvent = $this->getCartEvent();
			
			$cartEvent->bindForm($form);
		
			$log = Tlog::getInstance ();
		//	$log->debug ( "-- addservices ".$cartEvent->getProduct() );
			
			$this->getDispatcher()->dispatch(TheliaEvents::CART_ADDITEM, $cartEvent);
		
			$this->afterModifyCart();
		
		//	$log->debug ( "-- addservices ".$cartEvent->getProduct() );
			
			$service_ids = $request->request->get('service_id');
			if($service_ids != null){
				$service_product_sale_ids = $request->request->get('service_product_sale_id');
				$nr_services = count($service_ids);
				if($nr_services > 0)
					for ($i = 1; $i<=$nr_services; $i++){
					if($service_ids[$i]){	
						$log->debug ( "-- service_appointment ".$service_ids[$i]." ".(new JsonResponse($request->request->all())));
							//$sp_start_ts	." ".implode(" ",$sp_end_ts)." ".implode(" ",$sp_date));
						$this->addServiceToCart($service_ids[$i], $service_product_sale_ids[$i],$request);
					}
				};
			}
		
			if ($this->getRequest()->isXmlHttpRequest()) {
				$this->changeViewForAjax();
			} elseif (null !== $response = $this->generateSuccessRedirect($cartAdd)) {
				return $response;
			}
		
		} catch (PropelException $e) {
			Tlog::getInstance()->error(sprintf("Failed to add item to cart with message : %s", $e->getMessage()));
			$message = $this->getTranslator()->trans(
					"Failed to add this article to your cart, please try again",
					[],
					Front::MESSAGE_DOMAIN
					);
		} catch (FormValidationException $e) {
			$message = $e->getMessage();
		}
		
		if ($message) {
			$cartAdd->setErrorMessage($message);
			$this->getParserContext()->addForm($cartAdd);
		}
		}
		
		protected function changeViewForAjax()
		{
			// If Ajax Request
			if ($this->getRequest()->isXmlHttpRequest()) {
				$request = $this->getRequest();
		
				$view = $request->get('ajax-view', "includes/mini-cart");//konfigurator
				//$log = Tlog::getInstance();
				//$log->debug("carcontroller ".implode(" ", $request->attributes->all()));
				$request->attributes->set('_view', $view);
			}
		}

		/**
		 * @return \Thelia\Core\Event\Cart\CartEvent
		 */
		protected function getCartEvent()
		{
			$cart = $this->getSession()->getSessionCart($this->getDispatcher());
		
			return new CartEvent($cart);
		}
		
		/**
		 * Find the good way to construct the cart form
		 *
		 * @param  Request $request
		 * @return CartAdd
		 */
		private function getAddCartForm(Request $request)
		{
			if ($request->isMethod("post")) {
				$cartAdd = $this->createForm(FrontForm::CART_ADD);
			} else {
				$cartAdd = $this->createForm(
						FrontForm::CART_ADD,
						"form",
						array(),
						array(
								'csrf_protection'   => false,
						),
						$this->container
						);
			}
		
			return $cartAdd;
		}
		
		protected function afterModifyCart()
		{
			/* recalculate postage amount */
			$order = $this->getSession()->getOrder();
			if (null !== $order) {
				$deliveryModule = $order->getModuleRelatedByDeliveryModuleId();
				$deliveryAddress = AddressQuery::create()->findPk($order->getChoosenDeliveryAddress());
		
				if (null !== $deliveryModule && null !== $deliveryAddress) {
					$moduleInstance = $deliveryModule->getDeliveryModuleInstance($this->container);
		
					$orderEvent = new OrderEvent($order);
		
					try {
						$postage = OrderPostage::loadFromPostage(
								$moduleInstance->getPostage($deliveryAddress->getCountry())
								);
		
						$orderEvent->setPostage($postage->getAmount());
						$orderEvent->setPostageTax($postage->getAmountTax());
						$orderEvent->setPostageTaxRuleTitle($postage->getTaxRuleTitle());
		
						$this->getDispatcher()->dispatch(TheliaEvents::ORDER_SET_POSTAGE, $orderEvent);
					} catch (DeliveryException $ex) {
						// The postage has been chosen, but changes in the cart causes an exception.
						// Reset the postage data in the order
						$orderEvent->setDeliveryModule(0);
		
						$this->getDispatcher()->dispatch(TheliaEvents::ORDER_SET_DELIVERY_MODULE, $orderEvent);
					}
				}
			}
		}
	
}
