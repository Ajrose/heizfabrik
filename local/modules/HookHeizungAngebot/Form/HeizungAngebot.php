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

namespace HookHeizungAngebot\Form;

use HookHeizungAngebot\HookHeizungAngebot;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Constraints\NotBlank;
use Thelia\Core\Translation\Translator;
use Thelia\Form\BaseForm;

class HeizungAngebot extends BaseForm
{
    
    	private $formLabels ;
	
	public function getLabel($field,$choice = null){
		if($choice == null)
			return $this->formLabels[$field];
			else
				return $this->formLabels[$field.$choice];
	}
	
	private function setLabel($field,$choice,$label){
		Translator::getInstance()->trans($label);
		if($choice == null)
		{
			$this->formLabels[$field]= $label;
			return $this->formLabels[$field];
		}
		else {
			$this->formLabels[$field.$choice]= $label;
			return $this->formLabels[$field.$choice];
		}
	}
	
    
    protected function buildForm()
    {
         $formBuilder = $this->formBuilder
        
           
        ->add("firstname", "text", array(
         		"label" => Translator::getInstance()->trans("Vorname"),
         		"label_attr" => array(
         				"for" => "firstname",
         		)
         ))
        ->add("lastname", "text", array(
         		"label" => Translator::getInstance()->trans("Nachname"),
         		"label_attr" => array(
         				"for" => "lastname",
         		)
         ))
        ->add("email", "text", array(
         		"label" => Translator::getInstance()->trans("Email"),
         		"label_attr" => array(
         				"for" => "email",
         		)
         ))
         ->add("phone", "text", array(
         		"label" => Translator::getInstance()->trans("Telefon"),
         		"label_attr" => array(
         				"for" => "email",
         		)
         ))
        ->add("cellphone", "text", array(
         		"label" => Translator::getInstance()->trans("Mobil"),
         		"label_attr" => array(
         				"for" => "cellphone",
         		)
         ))
             
        ->add("plan_heizung", "choice", array(
         		"choices" => array (
         				1 => $this->setLabel("plan_heizung",1,"sofort "),
         				2 => $this->setLabel("plan_heizung",2,"In ca. 1-3 Monaten"),
         				3 => $this->setLabel("plan_heizung",3,"In ca. 3-6 Monaten "),
                        4 => $this->setLabel("plan_heizung",4,"In ca. 6-12 Monaten "),
         				5 => $this->setLabel("plan_heizung",5,"In mehr als ca. 12 Monaten")
         		),
         		"label" => Translator::getInstance()->trans("Wann Planen Sie Ihre neue Heizung?"),
         		"label_attr" => array(
         				"for" => "plan_heizung",
         		),
         		"data" => 1
         ))
        
        ->add("brennstoff_zukunft", "choice", array(
         		"choices" => array (
         				1 => $this->setLabel("brennstoff_zukunft",1,"Erdgas"),
         				2 => $this->setLabel("brennstoff_zukunft",2,"Heizöl"),
         				3 => $this->setLabel("brennstoff_zukunft",3,"Holz"),
                        4 => $this->setLabel("brennstoff_zukunft",4,"Wärmepumpe"),
         				5 => $this->setLabel("brennstoff_zukunft",5,"Sonstiges")
         		),
         		"label" => Translator::getInstance()->trans("Womit werden Sie in Zukunft heizen?"),
         		"label_attr" => array(
         				"for" => "brennstoff_zukunft",
         		),
         		"data" => 1
         ))
        
        ->add("gebaeudeart", "choice", array(
				"choices" => array (
						1 => $this->setLabel("gebaeudeart",1,"Einfamilienhaus"),
						2 => $this->setLabel("gebaeudeart",2,"Reihenhaus oder Doppelhaushälfte"),
						3 => $this->setLabel("gebaeudeart",3,"Mehrfamilienhaus mit Zentralheizung"),
                        4 => $this->setLabel("gebaeudeart",4,"Wohnung mit eigener Heizung")
				),
				"label" => Translator::getInstance()->trans("Um was für ein Gebäude handelt es sich?"),
				"label_attr" => array(
                    "for" => "gebaeudeart",
                ),
				"data" => 1
		))
        
        ->add("baujahr", "choice", array(
				"choices" => array (
						1 => $this->setLabel("baujahr",1,"Bis 1960"),
						2 => $this->setLabel("baujahr",2,"1961-1977"),
						3 => $this->setLabel("baujahr",3,"1978-1994"),
                        4 => $this->setLabel("baujahr",4,"Ab 1995")
				),
				"label" => Translator::getInstance()->trans("Wann wurde das Gebäude gebaut?"),
				"label_attr" => array(
                    "for" => "baujahr",
                ),
				"data" => 1
		))
             
        ->add("building_etage", "text", array(
         		"label" => Translator::getInstance()->trans("Wie viele Etagen hat Ihr Gebäude?"),
         		"label_attr" => array(
         				"for" => "building_etage",
         		)
         ))
             
       	->add("flaeche", "integer", array(
				"label" => Translator::getInstance()->trans("Wie groß ist die zu beheizende Fläche?"),
				"label_attr" => array(
						"for" => "flaeche"
				),
				"data" => 110
		))

        ->add("personen_anzahl", "integer", array(
				"label" => Translator::getInstance()->trans("Wie viele Personen leben im Haushalt?"),
				"label_attr" => array(
						"for" => "personen_anzahl",
				),
				"data" => 3
		))  
             
        ->add("wohnraumtemperatur", "choice", array(
				"choices" => array (
						1 => $this->setLabel("wohnraumtemperatur",1,"15"),
						2 => $this->setLabel("wohnraumtemperatur",2,"20"),
                        3 => $this->setLabel("wohnraumtemperatur",3,"22"),
						4 => $this->setLabel("wohnraumtemperatur",4,"mehr als 22")
				),
				"label" => Translator::getInstance()->trans("Wie hoch ist die Wohnraumtemperatur?"),
				"label_attr" => array(
                    "for" => "wohnraumtemperatur",
                ),
				"data" => 1
		))
             
        ->add("aussentemperatur", "choice", array(
				"choices" => array (
						1 => $this->setLabel("aussentemperatur",1,"-10C"),
						2 => $this->setLabel("aussentemperatur",2,"-14C/-12C"),
                        3 => $this->setLabel("aussentemperatur",3,"-18C/-16C"),
						4 => $this->setLabel("aussentemperatur",4,"kälter als -18C")
				),
				"label" => Translator::getInstance()->trans("Wie kalt kann bei ihnen im Winter die Außentemperatur werden?"),
				"label_attr" => array(
                    "for" => "aussentemperatur"
                ),
				"data" => 1
		))
             
        ->add("waermedaemmung", "choice", array(
				"choices" => array (
						1 => $this->setLabel("waermedaemmung",1,"Nicht"),
						2 => $this->setLabel("waermedaemmung",2,"Teilweise"),
						3 => $this->setLabel("waermedaemmung",3,"Erhöht")
				),
				"label" => Translator::getInstance()->trans("Ist eine Wärmedämmung vorhanden?"),
				"label_attr" => array(
                    "for" => "waermedaemmung"
                ),
				"data" => 1
		))   
             
        ->add("fenster", "choice", array(
				"choices" => array (
						1 => $this->setLabel("fenster",1,"Einfach verglast"),
						2 => $this->setLabel("fenster",2,"Doppelt verglast"),
						3 => $this->setLabel("fenster",3,"Isolierverglast")
				),
				"label" => Translator::getInstance()->trans("Wie sind Ihre Fenster verglast?"),
				"label_attr" => array(
                    "for" => "fenster",
                ),
				"data" => 1
		))
        ->add("dach_daemmung", "choice", array(
				"choices" => array (
						1 => $this->setLabel("dach_daemmung",1,"Ja"),
						2 => $this->setLabel("dach_daemmung",2,"Nein")
				),
				"label" => Translator::getInstance()->trans("Ist das Dach gedämmt?"),
				"label_attr" => array(
						"for" => "dach_daemmung",
				),
				"data" => 1
		))
             
        ->add("lage_des_gebaeudes", "choice", array(
				"choices" => array (
						1 => $this->setLabel("lage_des_gebaeudes",1,"Frei"),
						2 =>  $this->setLabel("lage_des_gebaeudes",2,"Normal")
				),
				"label" => Translator::getInstance()->trans("Lage des Gebäudes?"),
				"label_attr" => array(
                    "for" => "lage_des_gebaeudes",
                ),
				"data" => 1
		))
             
        ->add("windlage_des_gebaudes", "choice", array(
				"choices" => array (
						1 => $this->setLabel("windlage_des_gebaudes",1,"Windstark"),
						2 => $this->setLabel("windlage_des_gebaudes",2,"Windschwach")
				),
				"label" => Translator::getInstance()->trans("Windlage des Gebaudes"),
				"label_attr" => array(
                    "for" => "windlage_des_gebaudes",
                ),
				"data" => 1
		))
       
        ->add("lage", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Küche"),
						2 => Translator::getInstance()->trans("Vorraum"),
                        3 => Translator::getInstance()->trans("Sonstiges")
						
				),
				"label" => Translator::getInstance()->trans("In welchem Raum soll die Therme installiert werden?"),
				"label_attr" => array(
                    "for" => "lage",
                ),
				"data" => 1
		))
             
        ->add("anzahl_aussenwaende", "choice", array(
				"choices" => array (
						1 => $this->setLabel("anzahl_aussenwaende",1,"1 Wand"),
						2 => $this->setLabel("anzahl_aussenwaende",2,"2 Wände"),
						3 => $this->setLabel("anzahl_aussenwaende",3,"Mehr als 3 Wände")
				),
				"label" => Translator::getInstance()->trans("Wie viel ist die Anzahl der Außenwände?"),
				"label_attr" => array(
                    "for" => "anzahl_aussenwaende",
                ),
				"data" => 1
		))
             
         ->add("abgasfuehrung", "choice", array(
				"choices" => array (
						1 => $this->setLabel("abgasfuehrung",1,"Aussen am Haus"),
						2 => $this->setLabel("abgasfuehrung",2,"Im Kamin"),
						3 => $this->setLabel("abgasfuehrung",3,"Direkt durch das Dach"),
                        4 => $this->setLabel("abgasfuehrung",4,"Ist noch ein zweites Gerät im Kamin eingebunden")
				),
				"label" => Translator::getInstance()->trans("Wie verläuft die Abgasführung heute?"),
				"label_attr" => array(
                    "for" => "abgasfuehrung"
                ),
				"data" => 1
		))

             
        ->add("thermoregulator", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Ja"),
						2 => Translator::getInstance()->trans("Nein")
						
				),
				"label" => Translator::getInstance()->trans("Wird es einen Thermoregulator geben oder nicht?"),
				"label_attr" => array(
                    "for" => "lage",
                ),
				"data" => 1
		))
        ->add("marke", "text", array(
         		"label" => Translator::getInstance()->trans("Welche Marke von Thermen hätten Sie gerne"),
         		"label_attr" => array(
         				"for" => "marke",
         		)
         ))
             
        ->add("radiatortyp", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Alumin"),
						2 => Translator::getInstance()->trans("Edelstahl"),
						3 => Translator::getInstance()->trans("Integrierbare Konvektoren"),
                        3 => Translator::getInstance()->trans("Designer Heizkörper"),
                        4 => Translator::getInstance()->trans("Bodenkonvektoren")
				),
				"label" => Translator::getInstance()->trans("Welchen Heizkörpertyp hätten Sie gerne?"),
				"label_attr" => array(
                    "for" => "radiatortyp",
                ),
				"data" => 1
		))
             
         ->add("heizkoerpermarke", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Buderus"),
						2 => Translator::getInstance()->trans("Giese"),
                        3=> Translator::getInstance()->trans("Heimeier"),
                        4=> Translator::getInstance()->trans("HSK"),
                        5=> Translator::getInstance()->trans("Kermi"),
						6 => Translator::getInstance()->trans("Sonstige")
				),
				"label" => Translator::getInstance()->trans("Wie hätten Sie Ihren Heizkörper gerne installiert?"),
				"label_attr" => array(
                    "for" => "heizkoerpermarke",
                ),
				"data" => 1
		))
             
        ->add("anschlussarten", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("In der Wand"),
						2 => Translator::getInstance()->trans("An der Wand")
                        
				),
				"label" => Translator::getInstance()->trans("Wie hätten Sie Ihren Heizkörper gerne installiert??"),
				"label_attr" => array(
                    "for" => "anschlussarten",
                ),
				"data" => 1
		))
             
        ->add("waermepumpe", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("ja"),
						2 => Translator::getInstance()->trans("nein")
                        
				),
				"label" => Translator::getInstance()->trans("Haben Sie früher eine Wärmepumpe gehabt?"),
				"label_attr" => array(
                    "for" => "waermepumpe",
                ),
				"data" => 1
		))


                    
        ->add("ausgaenge", "text", array(
         		"label" => Translator::getInstance()->trans("Wie viele Wasserausgänge soll es geben?"),
         		"label_attr" => array(
         				"for" => "ausgaenge",
         		)
         )) 
             
        ->add("roehrenheizkoerper", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("ja"),
						2 => Translator::getInstance()->trans("nein")
                        
				),
				"label" => Translator::getInstance()->trans("Möchten Sie noch einen Röhrenheizkörper haben?"),
				"label_attr" => array(
                    "for" => "roehrenheizkoerper",
                ),
				"data" => 1
		))
             
        ->add("fittings", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Pressfitting"),
						2 => Translator::getInstance()->trans("Steckfitting"),
                        3 => Translator::getInstance()->trans("Polypropylen"),
                        
				),
				"label" => Translator::getInstance()->trans("Röhre und Fittings?"),
				"label_attr" => array(
                    "for" => "fittings",
                ),
				"data" => 1
		))
             
        ->add("roehremarke", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Buderus"),
						2 => Translator::getInstance()->trans("Boffi"),
                        3 => Translator::getInstance()->trans("Bette"),
                        4 => Translator::getInstance()->trans("Decor Walter"),
                        5 => Translator::getInstance()->trans("Dornbracht")
                        
				),
				"label" => Translator::getInstance()->trans("Marke der Röhre?"),
				"label_attr" => array(
                    "for" => "fittings",
                ),
				"data" => 1
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
        return "heizungangebot";
    }
}
