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
             
             
             
         ->add($this->setField("projekt_art"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Küche&Bad"),
                        3 => $this->setLabel(3,"Rohre, Kanalisation und Klärgrube"),
                        4 => $this->setLabel(4,"Warmwasser"),
                        5 => $this->setLabel(5,"Andere Installationen")
         		),
         		"label" => Translator::getInstance()->trans("Um welche Art von Projekt handelt es sich?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
           
       //Kitchen or Bathroom
             
        ->add($this->setField("bad-projekt-geraet"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Toiletten"),
                        3 => $this->setLabel(3,"Dusche oder Badewanne"),
                        4 => $this->setLabel(4,"Waschbecken oder Armaturen"),
                        5 => $this->setLabel(5,"Sanitär Geräte"),
                        6 => $this->setLabel(6,"Andere Küchen - oder Bad Arbeit")
         		),
         		"label" => Translator::getInstance()->trans("Welchen Bereich umfasst Ihr Projekt?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
                          
        ->add($this->setField("bad-arbeit-typ"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Reparatur"),
                        3 => $this->setLabel(3,"Ersatz")
         		),
         		"label" => Translator::getInstance()->trans("Was muss getan werden?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
         ->add($this->setField("bad-arbeit-typ-voll"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Reparatur"),
                        3 => $this->setLabel(3,"Ersatz"),
                        4 => $this->setLabel(4,"Erstmalige Montage"),
                        5 => $this->setLabel(5,"Andere"),
         		),
         		"label" => Translator::getInstance()->trans("Was muss getan werden"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
        ->add($this->setField("toilet-repair"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Toilette spült nicht"),
                        3 => $this->setLabel(3,"Toilette läuft"),
                        4 => $this->setLabel(4,"Undichter Toilettentank"),
                        5 => $this->setLabel(5,"Toilette ist verstopft"),
                        6 => $this->setLabel(6,"Andere")
                    
         		),
         		"label" => Translator::getInstance()->trans("Wo liegt das Problem?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
        ->add($this->setField("shower-repair"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Defekter Duschkopf"),
                        3 => $this->setLabel(3,"Undichter Abfluss"),
                        4 => $this->setLabel(4,"Reparatur Duschgehäuse "),
                        5 => $this->setLabel(5,"Wassertemperatur Probleme"),
                        6 => $this->setLabel(6,"Verstopfter Abfluss"),
                        7 => $this->setLabel(7,"Andere")
                    
         		),
         		"label" => Translator::getInstance()->trans("Wo liegt das Problem?"),
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
                        7 => $this->setLabel(7,"Clogged faucet"),
                        8 => $this->setLabel(8,"Other")
                    
         		),
         		"label" => Translator::getInstance()->trans("Wo liegt das Problem?"),
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
         		"label" => Translator::getInstance()->trans("Werden Sie das Ersatzgerät zur Verfügung stellen?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
             
        //Pipe, Sewer or Septic
             
        
         ->add($this->setField("pipe-projekt-geraet"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Rohre, Kanalisation und Klärgrube"),
                        3 => $this->setLabel(3,"Sump pump"),
                        4 => $this->setLabel(4,"Sewer"),
                        5 => $this->setLabel(5,"Septic system"),
                        6 => $this->setLabel(6,"Other pipe or sewer project")
         		),
         		"label" => Translator::getInstance()->trans("Um welche Art von Projekt handelt es sich?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
             
             
        //Water heater
             
        
            ->add($this->setField("water-heater-arbeit-typ"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Reparatur"),
                        3 => $this->setLabel(3,"Ersatz"),
                        4 => $this->setLabel(4,"Andere")
         		),
         		"label" => Translator::getInstance()->trans("Was muss getan werden?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))

       ->add($this->setField("baujahr"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Bis 1960"),
                        3 => $this->setLabel(3,"1960-1980"),
                        4 => $this->setLabel(4,"1981-2000"),
                        5 => $this->setLabel(5,"Nach 2000")
         		),
         		"label" => Translator::getInstance()->trans("In welchem Jahr wurde Ihr Haus gebaut?"),
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
         		"label" => Translator::getInstance()->trans("Wie groß ist Ihr Haus?"),
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
         		"label" => Translator::getInstance()->trans("Wie viele Badezimmer gibt es in Ihrem Haus?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
        ->add($this->setField("pipe-material"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"CPVC"),
                        3 => $this->setLabel(3,"CPVC"),
                        4 => $this->setLabel(4,"Polybuten"),
                        5 => $this->setLabel(5,"Verzinkt"),
                        6 => $this->setLabel(6,"PEX"),
                        7 => $this->setLabel(7,"andere"),
                    
         		),
         		"label" => Translator::getInstance()->trans("Aus welchem Material sind die aktuellen Rohre?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
        ->add($this->setField("water-heater-location"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"niedriger Keller"),
                        3 => $this->setLabel(3,"Keller"),
                        4 => $this->setLabel(4,"In der Nähe der Garage"),
                        5 => $this->setLabel(5,"Im Erdgeschoss"),
                        6 => $this->setLabel(6,"2.Stockwerk"),
                        7 => $this->setLabel(7,"3.Stockwerk"),
                        8 => $this->setLabel(8,"Höher als 1 Stockwerk, mit Aufzug"),
                        9 => $this->setLabel(9,"Dachboden"),
                        10 => $this->setLabel(10,"Andere"),
                    
         		),
         		"label" => Translator::getInstance()->trans("Wo befindet sich Ihr Warmwasserbereiter?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
         ->add($this->setField("water-heater-age"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"von 0 bis 5 Jahren"),
                        3 => $this->setLabel(3,"von 5 bis 10 Jahren"),
                        4 => $this->setLabel(4,"von 10 bis 20 Jahren"),
                        5 => $this->setLabel(5,"Mehr 20 Jahre"),
                        6 => $this->setLabel(6,"Ich bin nicht sicher")
                    
         		),
         		"label" => Translator::getInstance()->trans("Wie alt ist Ihr Warmwasserbereiter?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
        ->add($this->setField("supply-water-heater"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Ja"),
                        3 => $this->setLabel(3,"Nein, ich habe schon einen neuen Warmwasserbereiter.")                   
         		),
         		"label" => Translator::getInstance()->trans("Möchten Sie, dass der Installateur einen neuen Warmwasserbereiter mitbringt?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
        ->add($this->setField("water-heater-type"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Elektro-tank"),
                        3 => $this->setLabel(3,"Erdgastank"), 
                        4 => $this->setLabel(4,"LP Gastank"),
                        5 => $this->setLabel(5,"Hybrid-Elektro-Behälter"),
                        6 => $this->setLabel(6,"Tankless water heater"),
                        7 => $this->setLabel(7,"Solarwassererhitzer"),
         		),
         		"label" => Translator::getInstance()->trans("Welchen Warmwasserbereiter hätten Sie gerne?"),
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
                        5 => $this->setLabel(5,"Mehr als 50 gallon"),
                        6 => $this->setLabel(6,"andere")
         		),
         		"label" => Translator::getInstance()->trans("Welche Kapazität soll der Warmwasserbereiter mitbringen?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
            
             
             
        //Plumbing appliances
             
        ->add($this->setField("plumbing-appliance-type"), "choice", array(
         		"choices" => array (
                        1 => $this->setLabel(1,"Bitte wählen"),
                        2 => $this->setLabel(2,"Geschirrspüler"),
                        3 => $this->setLabel(3,"Müllentsorung"), 
                        4 => $this->setLabel(4,"Kühlschrank"),
                        5 => $this->setLabel(5,"Waschmaschine"),
                        6 => $this->setLabel(6,"Warmwasserbereiter"),
                        7 => $this->setLabel(7,"andere")
         		),
         		"label" => Translator::getInstance()->trans("Welches Gerät muss repariert werden?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		),
         		"data" => 1
         ))
             
             
             
             

       ->add($this->setField("marke"), "choice", array(
         		"label" => Translator::getInstance()->trans("Welche Marke oder welches Modell wollen Sie?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		)
         ))
        
      ->add($this->setField("anzahl"), "choice", array(
         		"label" => Translator::getInstance()->trans("Wie viele Geräte benötigt das Service?"),
         		"label_attr" => array(
         				"for" => $this->currentField,
         		)
         ))
		
			->add($this->setField("anmerkungen"), "choice", array(
		"label" => Translator::getInstance()->trans("Anmerkungen"),
		"label_attr" => array(
                    "for" => $this->currentField,
                )/*,
		"disabled" => true*/
		))
        ->add($this->setField("firstname"), "choice", array(
		"label" => Translator::getInstance()->trans("Vorname"),
		"label_attr" => array(
                    "for" => $this->currentField,
                )/*,
		"disabled" => true*/
		))
        ->add($this->setField("lastname"), "choice", array(
		"label" => Translator::getInstance()->trans("Nachname"),
		"label_attr" => array(
                    "for" => $this->currentField,
                )/*,
		"disabled" => true*/
		))
		->add($this->setField("email"), "choice", array(
		"label" => Translator::getInstance()->trans("Email"),
		"label_attr" => array(
                    "for" => $this->currentField,
                )/*,
		"disabled" => true*/
		))
        ->add($this->setField("phone"), "choice", array(
		"label" => Translator::getInstance()->trans("Telefon"),
		"label_attr" => array(
                    "for" => $this->currentField,
                )/*,
		"disabled" => true*/
		))
             
    ->add($this->setField("cellphone"), "choice", array(
		"label" => Translator::getInstance()->trans("Mobil"),
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
