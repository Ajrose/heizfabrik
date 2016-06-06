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
	public static $choice_project_art = "projekt-art",$choice_oel_gas = "oel-gas", $choice_arbeit_art = "arbeit-art",
	$choice_zugaenglichkeit = "zugaenglichkeit", $choice_zeit = "zeit", $choice_anmerkungen = "anmerkungen";
	
	private function addChoice($field_name,$key,$value){
		$value = Translator::getInstance()->trans($value);
		$this->choices[$field_name.$key] = $value; 
		return $value;
	}
	
    protected function buildForm()
    {	
     $translator = Translator::getInstance();
     
     $oel_gas = array (
						1 => $translator->trans("Öl"),
						2 => $translator->trans("Gas"));
     
     
     
         $formBuilder = $this->formBuilder
         ->add($this->choice_project_art, "choice", array(
         		"choices" => array (
         				1 =>addChoice($this->choice_project_art,1,"Klimaanlage"),
         				2 =>addChoice($this->choice_project_art,2,"Kessel oder Boiler"),
         				3 =>addChoice($this->choice_project_art,3,"Elektrische Wandheizung"),
         				4 =>addChoice($this->choice_project_art,4,"Andere Heizung, Lüftung oder Klimaanlage")),
         		
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
				"choices" => array (
						1 =>addChoice($this->choice_oel_gas,1,"Öl"),
						2 =>addChoice($this->choice_oel_gas,2,"Gas")
				),
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
         				1 => addChoice($this->choice_arbeit_art,1,"Reparatur oder Wartung"),
         				2 => addChoice($this->choice_arbeit_art,2,"Ersatz"),
         				3 => addChoice($this->choice_arbeit_art,3,"Erstmalige Montage"),
         				4 => addChoice($this->choice_arbeit_art,4,"Andere")
         		),
         		"label" => Translator::getInstance()->trans("arbeit-art"),
         		"label_attr" => array(
         				"for" => "arbeit-art",
         		),
         		"data" => "Ersatz"
         ))
		->add("zugaenglichkeit", "choice", array(
				"choices" => array (
						1 => addChoice($this->choice_zugaenglichkeit,1,"Ja"),
						2 => addChoice($this->choice_zugaenglichkeit,2,"Nein")
						
				),
				"label" => Translator::getInstance()->trans("zugaenglichkeit"),
				"label_attr" => array(
                    "for" => "zugaenglichkeit",
                ),
				"data" => "Ja"
		))
		->add("zeit", "choice", array(
				"choices" => array (  
						1 => addChoice($this->choice_zeit,1,"So früh wie möglich"),
						2 => addChoice($this->choice_zeit,2,"Vor einem bestimmten Datum"),
						3 => addChoice($this->choice_zeit,3,"Ich bin flexibel")
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
