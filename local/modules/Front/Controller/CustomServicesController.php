<?php
/*************************************************************************************/
/*                                                                                   */
/*      Thelia	                                                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : info@thelia.net                                                      */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      This program is free software; you can redistribute it and/or modify         */
/*      it under the terms of the GNU General Public License as published by         */
/*      the Free Software Foundation; either version 3 of the License                */
/*                                                                                   */
/*      This program is distributed in the hope that it will be useful,              */
/*      but WITHOUT ANY WARRANTY; without even the implied warranty of               */
/*      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the                */
/*      GNU General Public License for more details.                                 */
/*                                                                                   */
/*      You should have received a copy of the GNU General Public License            */
/*	    along with this program. If not, see <http://www.gnu.org/licenses/>.         */
/*                                                                                   */
/*************************************************************************************/

namespace Front\Controller;

use Thelia\Controller\Front\BaseFrontController;
use HookCustomServices\Form\CustomServices;
use Thelia\Form\Definition\FrontForm;
use Thelia\Form\Exception\FormValidationException;
use Thelia\Log\Tlog;
use Thelia\Model\ConfigQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * Class ContactController
 * @package Thelia\Controller\Front
 * @author Manuel Raynaud <manu@raynaud.io>
 */
class CustomServicesController extends BaseFrontController
{
    /**
     * send contact message
     */
    public function sendAction()
    {
        $log = Tlog::getInstance();
        $contactForm = $this->createForm("custom.services");
        $form = $this->validateForm($contactForm);
        $subject = "Individuelle Services Anfrage";
        $emailTest = "ani.jalavyan@sepa.at";
        $project_art = $this->getRequest()->get('customservices')['projekt-art'];
        $marke =  $this->getRequest()->get('customservices')['marke'];
        $oel_gas =  $this->getRequest()->get('customservices')['oel-gas'];
        $arbeit_art =  $this->getRequest()->get('customservices')['arbeit-art'];
        $zugaenglichkeit =  $this->getRequest()->get('customservices')['zugaenglichkeit'];
        $zeit =  $this->getRequest()->get('customservices')['zeit'];
        $anmerkungen =  $this->getRequest()->get('customservices')['anmerkungen'];
     //   $image_upload =  $this->getRequest()->get('customservices')['image_upload'];

        $message = "Welche Art von Projekt haben Sie?:".$project_art."<br>Welche Marke und / oder Modell?:".$marke."<br>Ist Ihr System von Öl oder Gas?".$oel_gas."<br>Welche Art von Arbeit brauchen Sie?".$arbeit_art."<br>Ist Ihr Gerät gut zugänglich?".$zugaenglichkeit."<br>Wann benötigen Sie den Service?".$zeit."<br>Anmerkungen?".$anmerkungen."<br>Bilder?";//.$image_upload;
      
        
$log->error(sprintf('message : %s', $message));
            $htmlMessage = "<p>$message</p>";
$storeName="Hausfabrik";
$contactEmail="ani.jalavyan@sepa.at";
            $instance = \Swift_Message::newInstance()
                ->addTo($emailTest, $storeName)
                ->addFrom($contactEmail, $storeName)
                ->setSubject($subject)
                ->setBody($message, 'text/plain')
                ->setBody($htmlMessage, 'text/html')
            ;

            try {
                $this->getMailer()->send($instance);
                
            } catch (\Exception $ex) {
               
                $log->error(sprintf('message : %s', $ex->getMessage()));
            }


            return new JsonResponse ();



    }
}
