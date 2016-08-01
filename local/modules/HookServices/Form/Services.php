<?php
/*************************************************************************************/
/*   
AUTHOR: ANI JALAVYAN /AJ

This file is part of the Thelia package.                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace HookServices\Form;

use HookServices\HookServices;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Constraints\NotBlank;
use Thelia\Core\Translation\Translator;
use Thelia\Form\BaseForm;

class Services extends BaseForm
{
    private $formLabels, $currentField ;
	
	public function getLabel($field,$choice = null){
		if($choice == null)
			return $this->formLabels[$field];
			else
				return $this->formLabels[$field.$choice];
	}
	
	private function setLabel($choice,$label){
		Translator::getInstance()->trans($label);
		if($choice == null)
		{
			$this->formLabels[$this->currentField]= $label;
			return $this->formLabels[$this->currentField];
		}
		else {
			$this->formLabels[$this->currentField.$choice]= $label;
			return $this->formLabels[$this->currentField.$choice];
		}
	}
    
    private function setField($field){
		$this->currentField = $field;
        return $this->currentField;
	}

    
    protected function buildForm()
    {
         $formBuilder = $this->formBuilder
             
             
             
         ->add($this->setField("projekt-art"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Kitchen or Bathroom"),
                        3 => $this->setLabel(3,"Pipe, Sewer or Septic"),
                        4 => $this->setLabel(4,"Water Heater"),
                        5 => $this->setLabel(5,"other Plumbing")
         		),
         		"label" => Translator::getInstance()->trans("Welche Art von Projekt haben Sie?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
           
       //Kitchen or Bathroom
             
        ->add($this->setField("bad-projekt-geraet"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Toilets"),
                        3 => $this->setLabel(3,"Shower or bathtub"),
                        4 => $this->setLabel(4,"Sink or faucets"),
                        5 => $this->setLabel(5,"Plumbing appliances"),
                        6 => $this->setLabel(6,"other kitchen or bathroom work")
         		),
         		"label" => Translator::getInstance()->trans("What does your project involve?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
                          
        ->add($this->setField("bad-arbeit-typ"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Repair"),
                        3 => $this->setLabel(3,"Replacement")
         		),
         		"label" => Translator::getInstance()->trans("What type of work needs to be done?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
         ->add($this->setField("bad-arbeit-typ-voll"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Repair"),
                        3 => $this->setLabel(3,"Replacement"),
                        4 => $this->setLabel(4,"First time maintenance"),
                        5 => $this->setLabel(5,"Other"),
         		),
         		"label" => Translator::getInstance()->trans("What type of work needs to be done?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
        ->add($this->setField("toilet-repair"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Toilet won't flush"),
                        3 => $this->setLabel(3,"Toilet is running"),
                        4 => $this->setLabel(4,"Toilet tank is leaking"),
                        5 => $this->setLabel(5,"Toilet is clogged"),
                        6 => $this->setLabel(6,"Other")
                    
         		),
         		"label" => Translator::getInstance()->trans("What seems to be the issue?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
        ->add($this->setField("shower-repair"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Broke shower head"),
                        3 => $this->setLabel(3,"Repair shower enclosure"),
                        4 => $this->setLabel(4,"Leaking drain"),
                        5 => $this->setLabel(5,"Water temp issues"),
                        6 => $this->setLabel(6,"Clogged drain"),
                        7 => $this->setLabel(7,"Other")
                    
         		),
         		"label" => Translator::getInstance()->trans("What seems to be the issue?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
         ->add($this->setField("sink-repair"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Leaking faucet"),
                        3 => $this->setLabel(3,"Broken faucet"),
                        4 => $this->setLabel(4,"Loose faucet"),
                        5 => $this->setLabel(5,"Clogged faucet"),
                        6 => $this->setLabel(6,"Noisy faucet"),
                        7 => $this->setLabel(6,"Clogged faucet"),
                        8 => $this->setLabel(7,"Other")
                    
         		),
         		"label" => Translator::getInstance()->trans("What seems to be the issue?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
        ->add($this->setField("bad-ersatz-unit"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Ja"),
                        2 => $this->setLabel(2,"Nein")
         		),
         		"label" => Translator::getInstance()->trans("Will you be providing the replacement unit(s)?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
             
        //Pipe, Sewer or Septic
             
        
         ->add($this->setField("pipe-projekt-geraet"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Pipe repair or installation"),
                        3 => $this->setLabel(3,"Sump pump"),
                        4 => $this->setLabel(4,"Sewer"),
                        5 => $this->setLabel(5,"Septic system"),
                        6 => $this->setLabel(6,"Other pipe or sewer project")
         		),
         		"label" => Translator::getInstance()->trans("What's your project?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
             
             
        //Water heater
             
        
            ->add($this->setField("water-heater-arbeit-typ"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Repair"),
                        3 => $this->setLabel(3,"Replacement"),
                        4 => $this->setLabel(4,"Other")
         		),
         		"label" => Translator::getInstance()->trans("What type of work needs to be done?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
         ->add($this->setField("water-heater-marke"), "choice", array(
         		"label" => Translator::getInstance()->trans("What brand and/or model do you want?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		)
         ))
             
       ->add($this->setField("baujahr"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Bis 1960"),
                        3 => $this->setLabel(3,"1960-1980"),
                        4 => $this->setLabel(3,"1981-2000"),
                        5 => $this->setLabel(3,"Nach 2000")
         		),
         		"label" => Translator::getInstance()->trans("What year was your home built?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
        
          ->add($this->setField("hausgroesse"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"1001-2000 m2"),
                        3 => $this->setLabel(3,"2001-3000 m2"),
                        4 => $this->setLabel(4,"3001-4000 m2"),
                        5 => $this->setLabel(5,"4001-5000 m2"),
                        6 => $this->setLabel(6,"mehr als 5000 m2"),
                    
         		),
         		"label" => Translator::getInstance()->trans("How large is your home?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
        
         ->add($this->setField("badezimmer-anzahl"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"1"),
                        3 => $this->setLabel(3,"2"),
                        4 => $this->setLabel(4,"3"),
                        5 => $this->setLabel(5,"4"),
                        6 => $this->setLabel(6,"5 oder mehr"),
                    
         		),
         		"label" => Translator::getInstance()->trans("How many bathrooms in your home?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
        ->add($this->setField("pipe-material"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"CPVC"),
                        3 => $this->setLabel(3,"Polybutylene (gray pipe)"),
                        4 => $this->setLabel(4,"Galvanized"),
                        5 => $this->setLabel(5,"PEX"),
                        6 => $this->setLabel(6,"other"),
                    
         		),
         		"label" => Translator::getInstance()->trans("Current pipe material?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
        ->add($this->setField("water-heater-location"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Crawl space"),
                        3 => $this->setLabel(3,"Basement"),
                        4 => $this->setLabel(4,"In or near garage"),
                        5 => $this->setLabel(5,"First floor"),
                        6 => $this->setLabel(6,"Second floor"),
                        7 => $this->setLabel(7,"Third floor"),
                        8 => $this->setLabel(8,"More than one floor with elevator"),
                        9 => $this->setLabel(9,"Attic"),
                        10 => $this->setLabel(10,"Other"),
                    
         		),
         		"label" => Translator::getInstance()->trans("Where is your water heater located?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
         ->add($this->setField("water-heater-age"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"between 0-5 years"),
                        3 => $this->setLabel(3,"between 5-10 years"),
                        4 => $this->setLabel(5,"between 10-20 years"),
                        5 => $this->setLabel(6,"Over 20"),
                        6 => $this->setLabel(7,"Ich bin nicht sicher")
                    
         		),
         		"label" => Translator::getInstance()->trans("How old is your current water heater?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
        ->add($this->setField("supply-water-heater"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Yes"),
                        3 => $this->setLabel(3,"No, I have a new water heater already")                   
         		),
         		"label" => Translator::getInstance()->trans("Do you want the pro to supply the new water heater?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
        ->add($this->setField("water-heater-type"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Electric tank"),
                        3 => $this->setLabel(3,"Neutral gas tank"), 
                        4 => $this->setLabel(4,"LP gas tank"),
                        5 => $this->setLabel(5,"Hybrid electric tank"),
                        6 => $this->setLabel(6,"Tankless water heater"),
                        7 => $this->setLabel(7,"Solar water heater"),
         		),
         		"label" => Translator::getInstance()->trans("What type of new water heater would do you want?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
        ->add($this->setField("water-heater-capacity"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"28-30 gallon"),
                        3 => $this->setLabel(3,"38-40 gallon"), 
                        4 => $this->setLabel(4,"47-50 gallon"),
                        5 => $this->setLabel(5,"Over 50 gallon"),
                        6 => $this->setLabel(6,"Other")
         		),
         		"label" => Translator::getInstance()->trans("What capacity water heater do you want?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
            
             
             
        //Plumbing appliances
             
        ->add($this->setField("plumbing-appliance-type"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Dischwascher"),
                        3 => $this->setLabel(3,"Garbage disposal"), 
                        4 => $this->setLabel(4,"Refrigerator"),
                        5 => $this->setLabel(5,"Wasching machine"),
                        6 => $this->setLabel(6,"Water heater"),
                        7 => $this->setLabel(7,"Other")
         		),
         		"label" => Translator::getInstance()->trans("What type of appliance(s) does your project involve?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
             
             
             

       ->add($this->setField("marke"), "choice", array(
         		"label" => Translator::getInstance()->trans("What brand and/or model do you want?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		)
         ))
        
      ->add($this->setField("anzahl"), "choice", array(
         		"label" => Translator::getInstance()->trans("How many items?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		)
         ))
		
		
		->add($this->setField("anmerkungen"), "choice", array(
		"label" => Translator::getInstance()->trans("anmerkungen"),
		"label_attr" => array(
                    "for" => $this->currentField,
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
        return "services";
    }
}
