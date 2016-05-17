<?php
/*************************************************************************************/
/*      This file is part of the Thelia package.                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace HookCustomServices\Form;

use HookCustomServices\HookCustomServices;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Constraints\NotBlank;
use Thelia\Core\Translation\Translator;
use Thelia\Form\BaseForm;

class CustomServices extends BaseForm
{
    protected function buildForm()
    {
         $formBuilder = $this->formBuilder
         ->add("projekt-art", "choice", array(
         		"choices" => array (
                       
         				"Klimaanlage" => Translator::getInstance()->trans("Klimaanlage"),
         				"Kessel oder Boiler" => Translator::getInstance()->trans("Kessel oder Boiler"),
         				"Elektrische Wandheizung" => Translator::getInstance()->trans("Elektrische Wandheizung"),
         				"Andere Heizung, Lüftung oder Klimaanlage" => Translator::getInstance()->trans("Andere Heizung, Lüftung oder Klimaanlage")
         		),
         		"label" => Translator::getInstance()->trans("projekt-art"),
         		"label_attr" => array(
         				"for" => "projekt-art",
         		),
         		"data" => 1
         ))
             ->add("oel-gas", "choice", array(
				"choices" => array (
						"Öl" => Translator::getInstance()->trans("Öl"),
						"Gas" => Translator::getInstance()->trans("Gas")
				),
				"label" => Translator::getInstance()->trans("oel-gas"),
				"label_attr" => array(
                    "for" => "oel-gas",
                ),
				"data" => "Gas"
		))
        ->add("marke", "text", array(
         		"label" => Translator::getInstance()->trans("marke"),
         		"label_attr" => array(
         				"for" => "marke",
         		)
         ))
         ->add("arbeit-art", "choice", array(
         		"choices" => array (
         				"Reparatur oder Wartung" => Translator::getInstance()->trans("Reparatur oder Wartung"),
         				"Ersatz" => Translator::getInstance()->trans("Ersatz"),
         				"Erstmalige Montage" => Translator::getInstance()->trans("Erstmalige Montage"),
         				"Andere" => Translator::getInstance()->trans("Andere")
         		),
         		"label" => Translator::getInstance()->trans("arbeit-art"),
         		"label_attr" => array(
         				"for" => "arbeit-art",
         		),
         		"data" => "Ersatz"
         ))
		->add("zugaenglichkeit", "choice", array(
				"choices" => array (
						"Ja" => Translator::getInstance()->trans("Ja"),
						"Nein" => Translator::getInstance()->trans("Nein")
						
				),
				"label" => Translator::getInstance()->trans("zugaenglichkeit"),
				"label_attr" => array(
                    "for" => "zugaenglichkeit",
                ),
				"data" => "Ja"
		))
		->add("zeit", "choice", array(
				"choices" => array (
						"So früh wie möglich" => Translator::getInstance()->trans("So früh wie möglich"),
						"Vor einem bestimmten Datum" => Translator::getInstance()->trans("Vor einem bestimmten Datum"),
						"Ich bin flexibel" => Translator::getInstance()->trans("Ich bin flexibel")
				),
				"label" => Translator::getInstance()->trans("Zeit"),
				"label_attr" => array(
                    "for" => "zeit",
                ),
				"data" => "Ich bin flexibel"
		))
		
		
		
		->add("anmerkungen", "text", array(
		"label" => Translator::getInstance()->trans("anmerkungen"),
		"label_attr" => array(
                    "for" => "anmerkungen"
                )/*,
		"disabled" => true*/
		))
             

        ->add("image_upload", "file", array(
		"label" => Translator::getInstance()->trans("upload"),
		"label_attr" => array(
                    "for" => "upload"
                )
            
            /*,
		"disabled" => true*/
		))
             
        ->setAttribute("enctype", "multipart/form-data")
             
		;
    }

    public function getName()
    {
        return "customservices";
    }
}
