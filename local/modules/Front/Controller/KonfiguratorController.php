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
use Symfony\Component\HttpFoundation\FileBag;
use Thelia\Model\ConfigQuery;
use HookKonfigurator\Model\HeizungkonfiguratorUserdaten;
use HookKonfigurator\Model\HeizungkonfiguratorImage;
use HookKonfigurator\Model\HeizungkonfiguratorUserdatenQuery;
use HookKonfigurator\Form\PersonalData;

class KonfiguratorController extends BaseFrontController {
    
        public function sendMail(Request $request)
    {
        $log = Tlog::getInstance();
        
        
        $heizungskonfigurator_userdata = $this->getSession()->get ( 'heizungkonfiguratoruserdaten');
        
        $konfiguratorDaten = HeizungkonfiguratorUserdatenQuery::create()->findById($heizungskonfigurator_userdata)[0];
        
        //$log->error(" heizungskonfiguratorsendmail ".$konfiguratorDaten);
        
        //$konfiguratorDaten = new HeizungkonfiguratorUserdaten();
        $heizungskonfiguratorForm = $this->createForm("konfigurator.heizlast.berechnung");
        
        $brennstoffMomentan = $konfiguratorDaten->getBrennstoffMomentan();
        $brennstoffMomentan = $heizungskonfiguratorForm->getLabel("brennstoff_momentan",$brennstoffMomentan);
        
        $brennstoffZukunft = $konfiguratorDaten->getBrennstoffZukunft();
        $brennstoffZukunft = $heizungskonfiguratorForm->getLabel("brennstoff_zukunft",$brennstoffZukunft);
        
        $gebaeudeArt = $konfiguratorDaten->getGebaeudeart();
        $gebaeudeArt = $heizungskonfiguratorForm->getLabel("gebaeudeart",$gebaeudeArt);
        
        $personenAnzahl = $konfiguratorDaten->getPersonenAnzahl();
        //$personenAnzahl = $heizungskonfiguratorForm->getLabel("personen_anzahl",null);
        
        $baujahr = $konfiguratorDaten->getBaujahr();
        $baujahr = $heizungskonfiguratorForm->getLabel("baujahr",$baujahr);
        
        $gebaeudelage = $konfiguratorDaten->getGebaeudelage();
        $gebaeudelage = $heizungskonfiguratorForm->getLabel("lage_des_gebaeudes",$gebaeudelage);
        
        $windlage = $konfiguratorDaten->getWindlage();
        $windlage = $heizungskonfiguratorForm->getLabel("windlage_des_gebaudes",$windlage);
        
        $anzahlAussenwaende = $konfiguratorDaten->getAnzahlAussenwaende();
        $anzahlAussenwaende = $heizungskonfiguratorForm->getLabel("anzahl_aussenwaende",$anzahlAussenwaende);
        
        $verglasteFenster = $konfiguratorDaten->getVerglasteFenster();
        $verglasteFenster = $heizungskonfiguratorForm->getLabel("fenster",$verglasteFenster);
        
        $wohnraumtemperatur = $konfiguratorDaten->getWohnraumtemperatur();
        $wohnraumtemperatur = $heizungskonfiguratorForm->getLabel("wohnraumtemperatur",$wohnraumtemperatur);
        
        $aussentemperatur = $konfiguratorDaten->getAussentemperatur();
        $aussentemperatur = $heizungskonfiguratorForm->getLabel("aussentemperatur",$aussentemperatur);
        
        $waermedaemmung = $konfiguratorDaten->getWaermedaemmung();
        $waermedaemmung = $heizungskonfiguratorForm->getLabel("waermedaemmung",$waermedaemmung);
        
        $heizflaeche = $konfiguratorDaten->getHeizflaeche();
        //$heizflaeche = $heizungskonfiguratorForm->getLabel("flaeche",$heizflaeche);
        
        $anmerkungen = $konfiguratorDaten->getAnmerkungen();
        //$anmerkungen = $heizungskonfiguratorForm->getLabel("anmerkungen",$anmerkungen);
        
        $etagen = $konfiguratorDaten->getEtagen();
        //$etagen = $heizungskonfiguratorForm->getLabel("", $etagen);
        
        $abgasfuehrung = $konfiguratorDaten->getAbgasfuehrung();
        $abgasfuehrung = $heizungskonfiguratorForm->getLabel("abgasfuehrung",$abgasfuehrung);
        
        $waermeabgabe = $konfiguratorDaten->getWaermeabgabe();
        $waermeabgabe = $heizungskonfiguratorForm->getLabel("waermeabgabe",$waermeabgabe);
        
        $duschwasser = $konfiguratorDaten->getDuschwasser();
        $duschwasser = $heizungskonfiguratorForm->getLabel("duschwasser",$duschwasser);
        
        $dachDaemmung = $konfiguratorDaten->getDachDaemmung();
        $dachDaemmung = $heizungskonfiguratorForm->getLabel("dach_daemmung",$dachDaemmung);
        
        $wasserabfluss = $konfiguratorDaten->getWasserabfluss();
        $wasserabfluss = $heizungskonfiguratorForm->getLabel("wasserabfluss",$wasserabfluss);
        
        $warmwasserversorgung = $konfiguratorDaten->getWarmwasserversorgung();
        $warmwasserversorgung = $heizungskonfiguratorForm->getLabel("warmwasserversorgung",$warmwasserversorgung);
        
        $warmwasserversorgungExtra = $konfiguratorDaten->getWarmwasserversorgungExtra();
        $warmwasserversorgungExtra = $heizungskonfiguratorForm->getLabel("warmwasserversorgung-extra",$warmwasserversorgungExtra);
        
        $warmwasserversorgungExtraWaermepumpe = $konfiguratorDaten->getWarmwasserversorgungExtraWaermepumpe();
        $warmwasserversorgungExtraWaermepumpe = $heizungskonfiguratorForm->getLabel("warmwasserversorgung-extra-waermepumpe",$warmwasserversorgungExtraWaermepumpe);
        
     	//$contactForm = $this->createForm("konfigurator.personal.data");
        //$contactForm = new PersonalData();

        $subject = "Heizungskonfigurator neue Anfrage ";
        $emailTest = "angebote@hausfabrik.at";
        $firstname = $this->getRequest()->get('konfiguratorpersonaldata')['firstname'];
        $lastname =  $this->getRequest()->get('konfiguratorpersonaldata')['lastname'];
        $phone =  $this->getRequest()->get('konfiguratorpersonaldata')['phone'];
        $cellphone = $this->getRequest()->get('konfiguratorpersonaldata')['cellphone'];
        $email = $this->getRequest()->get('konfiguratorpersonaldata')['email'];
        //$building_etage = $this->getRequest()->get('konfiguratorpersonaldata')['building_etage'];
        //$etage = $this->getRequest()->get('konfiguratorpersonaldata')['etage'];
        //§gebaeudeart = $this->getRequest()->get('klimaangebot')['gebaeudeart'];
        //§marke = $this->getRequest()->get('klimaangebot')['marke'];
        //§geraetetyp = $this->getRequest()->get('klimaangebot')['geraetetyp'];
        //§distance = $this->getRequest()->get('klimaangebot')['distance'];
        
        $files = new FileBag();
        $files = $this->getRequest()->files;
        
        //$headers  = 'MIME-Version: 1.0' . "\r\n";
        //$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
        $storeName="Hausfabrik";
        $contactEmail="angebote@hausfabrik.at";
        $instance = \Swift_Message::newInstance()
        ->addTo($emailTest, $storeName)
        ->addFrom($contactEmail, $storeName)
        ->setSubject($subject)
        ->setContentType("text/html");
        
       // $image_upload_name = implode(" ",$files->keys());
        //$image_upload = new UploadedFile();
        
        $imagesHTML = "";
        $new_image_path = THELIA_ROOT .ConfigQuery::read('images_library_path')."/imani";
        
        foreach ($files->get("file") as $image){
        	if($image != null){
        		$new_image_name = $image->getClientOriginalName();
        		$image->move($new_image_path ,$new_image_name);
        		$image_full_path = $new_image_path."/".$new_image_name;
        		$imagesHTML.= '<img src="'.$image.'">"';
        	}else 
        		$image_full_path = "no_image";
        	
        	if($image_full_path != "no_image")$instance->attach(\Swift_Attachment::fromPath($new_image_path."/".$new_image_name));
        }
        	//Bilder<img src=".$image_upload.">"
        
       // $image_upload = $files->get("file")["image_upload"];
		if($imagesHTML != "")$imagesHTML = "Bilder ".$imagesHTML;
        $message = "Vorname:".$firstname.
        "<br>Nachname:".$lastname.
        "<br>Telefon: ".$phone.
        "<br>Mobil: ".$cellphone.
        "<br>Email: ".$email.
        "<br>Womit heizen Sie momentan? ".$brennstoffMomentan.
        "<br>Womit werden Sie in Zukunft heizen? ".$brennstoffZukunft.
        "<br>Um was für ein Gebäude handelt es sich? ".$gebaeudeArt.
        "<br>Wie viele Personen leben im Haushalt? ".$personenAnzahl.
        "<br>Wann wurde das Gebäude gebaut? ".$baujahr.
        "<br>Lage des Gebäudes? ". $gebaeudelage.
        "<br>Windlage des Gebäudes? ". $windlage.
        "<br>Wie viel ist die Anzahl der Außenwände? ". $anzahlAussenwaende.
        "<br>Wie sind Ihre Fenster verglast? ". $verglasteFenster.
        "<br>Wie hoch ist die Wohnraumtemperatur? ". $wohnraumtemperatur.
        "<br>Wie kalt kann bei ihnen im Winter die Außentemperatur werden? ". $aussentemperatur.
        "<br>Ist eine Wärmedämmung vorhanden? ".  $waermedaemmung.
        "<br>Wie viele Etagen hat Ihr Gebäude? ".$etagen.
        "<br>Ist das Dach gedämmt?".$dachDaemmung.
        "<br>Wie verläuft die Abgasführung heute? ".$abgasfuehrung.
        "<br>Wie erfolgt die Wärmeabgabe?".$waermeabgabe.
        "<br>Wird Duschwasser mit der Heizung erwärmt? ".$duschwasser.
        "<br>Ist ein Wasserabfluss unter der Heizung vorhanden? ".$wasserabfluss.
        "<br>Soll die Warmwasserversorgung über die Heizung erfolgen? ".$warmwasserversorgung.
        "<br>Wie wollen Sie die Warmwasserversorgung haben mit einem? ".$warmwasserversorgungExtra.
        "<br>Wie wollen Sie die Warmwasserversorgung haben mit einem? ".$warmwasserversorgungExtraWaermepumpe.
        "<br>Anmerkungen zu Ihrer Heizung ".$anmerkungen.
        "<br>Wie groß ist die zu beheizende Fläche? ".  $heizflaeche.
        "<br>".$imagesHTML;
        
			$log->error(sprintf('message : %s', $message));
            $htmlMessage = "<p>$message</p>";

            $instance->setBody($message, 'text/plain')
            ->setBody($htmlMessage, 'text/html');
            
            try {
                $this->getMailer()->send($instance);
            } catch (\Exception $ex) {
                $log->error(sprintf('message : %s', $ex->getMessage()));
            }

           return $this->generateRedirectFromRoute('klima.angebot.success');
    }
    
    	public function personalData(Request $request) {
		//if ($request->isXmlHttpRequest ()) {
			$view = $request->get ( 'ajax-view', "includes/heizungskonfigurator-personal-data" );
			
			//TODO check if it exists
			$currentCustomer = $this->getSecurityContext()->getCustomerUser();
			if($currentCustomer == null)
				$currentCustomer	= 0;//$this->getCurrentRequest()->getSession()->getId();
				else $currentCustomer = $currentCustomer->getId();
				$log = Tlog::getInstance ();
				$log->error(" create userdatenquery ".$currentCustomer);				
				
				$userdata = new HeizungkonfiguratorUserdaten();
				$userdata //->setBrennstoffMomentan($request->request->get('konfigurator')['brennstoff_momentan'])
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
				->setDachDaemmung($request->request->get('konfigurator')['dach_daemmung'])
				->setWasserabfluss($request->request->get('konfigurator')['wasserabfluss'])
				->setWarmwasserversorgung($request->request->get('konfigurator')['warmwasserversorgung'])
				->setWarmwasserversorgungExtra($request->request->get('konfigurator')['warmwasserversorgung-extra'])
				->setWarmwasserversorgungExtraWaermepumpe($request->request->get('konfigurator')['warmwasserversorgung-extra-waermepumpe'])		
				->setEtagen($request->request->get('konfigurator')['etagen'])
				->setCreatedAt(date ( "Y-m-d H:i:s" ))
				->setUserId($currentCustomer)
				->setVersion("1.0")
				->save();
				
				//$log->error(" create userdatenquery ".$userdata);
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
			
			$this->getSession()->set ( 'heizungkonfiguratoruserdaten', $userdata->getId());
			$request->attributes->set ( '_view', $view );
	}
	
	public function suggestionsAction(Request $request) {

		if ($request->isXmlHttpRequest ()) {
			$view = $request->get ( 'ajax-view', "includes/konfigurator-suggestions" );
			$request->attributes->set ( '_view', $view );
		}
		else 
			return new JsonResponse ( array ('stuff' => 'more stuff') );//TODO redirect these request to a different page
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
			return new JsonResponse ( array ('service_stuff' => 'more_service_stuff') ); // $productsQuerry->__toString()
	}
	
	protected function addServiceToCart($id,$product_sale_id,$service_appointments,Request $request){
		$log = Tlog::getInstance ();
		$log->debug ( "-- addservices+appointments " );
		
		$message = null;
		try {
			$cartEvent = $this->getCartEvent();
			$cartEvent->setProduct($id);
			$cartEvent->setAppend(1);
			$cartEvent->setProductSaleElementsId($product_sale_id);
			$cartEvent->setQuantity(1);
			
			if($service_appointments){
				
				$log->error("end ts ".implode(" ",$service_appointments["ca_end_ts"]));
				$sp_start_ts = $service_appointments["ca_start_ts"];
				$sp_end_ts   = $service_appointments["ca_end_ts"];
				$sp_date     = array(
						($sp_start_ts[1] ?date('d', $sp_start_ts[1]) : ""),
						($sp_start_ts[2] ?date('d', $sp_start_ts[2]) : ""),
						($sp_start_ts[3] ?date('d', $sp_start_ts[3]) : ""));
			}

			if(count($sp_start_ts)>0)
				$cartEvent->setSpStartTs($sp_start_ts);
			
			if(count($sp_end_ts)>0)
				$cartEvent->setSpStartTs($sp_end_ts);
			
			if(count($sp_date)>0)
				$cartEvent->setSpStartTs($sp_date);
			
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
				
				
				if($nr_services > 0) //if we have at least a service
				{
				 	//get appointments
				 	$ca_end_ts = $request->request->get("ca_end_ts");
				 	$ca_start_ts = $request->request->get("ca_start_ts" );
				 	$ca_priority = $request->request->get("ca_priority");
				 	$ca_employee_id = $request->request->get("ca_employee_id");
					for ($i = 1; $i<=$nr_services; $i++){ //for each service
					if($service_ids[$i]){	
						//$log->debug ( "-- service_appointment ".$service_ids[$i]);//.(new JsonResponse($request->request->all())));
						if($ca_end_ts[$service_ids[$i]])
						$service_appointments = array("ca_end_ts" => $ca_end_ts[$service_ids[$i]],"ca_start_ts" => $ca_start_ts[$service_ids[$i]],"ca_priority" => $ca_priority[$service_ids[$i]], "ca_employee_id" => $ca_employee_id[$service_ids[$i]]);
						$this->addServiceToCart($service_ids[$i], $service_product_sale_ids[$i],$service_appointments,$request);
					}
				}
				}
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
