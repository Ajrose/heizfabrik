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
use Thelia\Log\Tlog;

class CustomServices extends BaseForm
{
	private $choices = array();
	
	private function addChoice($field_name,$key,$value){
		$value = Translator::getInstance()->trans($value);
		$this->choices[$field_name.$key] = $value; 
		return $value;
	}
	
    protected function buildForm()
    {
    	
    	
     $translator = Translator::getInstance();
     $project_art = array (
         				1 => $translator->trans("Klimaanlage"),
         				2 => $translator->trans("Kessel oder Boiler"),
         				3 => $translator->trans("Elektrische Wandheizung"),
         				4 => $translator->trans("Andere Heizung, Lüftung oder Klimaanlage"));
     
     $oel_gas = array (
						1 => $translator->trans("Öl"),
						2 => $translator->trans("Gas"));
     
     
     
         $formBuilder = $this->formBuilder
         ->add("projekt-art", "choice", array(
         		"choices" => $project_art,
         		"choice_label" => function ($value, $key, $index){
         			return "label".$index;
         		},
         		"label" => $translator->trans("projekt-art"),
         		"label_attr" => array(
         				"for" => "projekt-art",
         		),
         		"data" => 1
         ))
             ->add("oel-gas", "choice", array(
				"choices" => $oel_gas,
				"label" => $translator->trans("oel-gas"),
				"label_attr" => array(
                    "for" => "oel-gas",
                ),
				"data" => "2"
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
						"So frÃ¼h wie mÃ¶glich" => Translator::getInstance()->trans("So frÃ¼h wie mÃ¶glich"),
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
		;
    }

    public function getName()
    {
        return "customservices";
    }

    public function getChoiceLabel($choice,$value)
    {
    	return "customservices2";
    }
}
