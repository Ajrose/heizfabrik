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

namespace HookKonfigurator\Form;

use HookKonfigurator\HookKonfigurator;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Constraints\NotBlank;
use Thelia\Core\Translation\Translator;
use Thelia\Form\BaseForm;

class HeizlastBerechnung extends BaseForm
{
    protected function buildForm()
    {
         $formBuilder = $this->formBuilder
         ->add("brennstoff_momentan", "choice", array(
         		"choices" => array (
         				1 => Translator::getInstance()->trans("Erdgas"),
         				2 => Translator::getInstance()->trans("Heizöl"),
         				3 => Translator::getInstance()->trans("Holz"),
                        4 => Translator::getInstance()->trans("Wärmepumpe"),
         				5 => Translator::getInstance()->trans("Sonstiges")
         		),
         		"label" => Translator::getInstance()->trans("Womit heizen Sie momentan?"),
         		"label_attr" => array(
         				"for" => "brennstoff_momentan",
         		),
         		"data" => 1
         ))
         ->add("brennstoff_zukunft", "choice", array(
         		"choices" => array (
         				1 => Translator::getInstance()->trans("Erdgas"),
         				2 => Translator::getInstance()->trans("Heizöl"),
         				3 => Translator::getInstance()->trans("Holz"),
                        4 => Translator::getInstance()->trans("Wärmepumpe"),
         				5 => Translator::getInstance()->trans("Sonstiges")
         		),
         		"label" => Translator::getInstance()->trans("Womit werden Sie in Zukunft heizen?"),
         		"label_attr" => array(
         				"for" => "brennstoff_zukunft",
         		),
         		"data" => 1
         ))
		->add("gebaeudeart", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Einfamilienhaus"),
						2 => Translator::getInstance()->trans("Reihenhaus oder Doppelhaushälfte "),
						3 => Translator::getInstance()->trans("Mehrfamilienhaus mit Zentralheizung"),
                        4 => Translator::getInstance()->trans("Wohnung mit eigener Heizung")
				),
				"label" => Translator::getInstance()->trans("Um was für ein Gebäude handelt es sich?"),
				"label_attr" => array(
                    "for" => "gebaeudeart",
                ),
				"data" => 1
		))
             
        ->add("bestehendes_geraet_mit_warmwasser", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Durchlauf "),
						2 => Translator::getInstance()->trans("Kleinen Speicher bis 50l"),
						3 => Translator::getInstance()->trans("Speicher größer 50l")
				),
				"label" => Translator::getInstance()->trans("Ist das bestehende Gerät mit Warmwasser?"),
				"label_attr" => array(
                    "for" => "mitwarmwasser",
                ),
				"data" => 1
		))
		
		
        ->add("bestehendes_geraet_kw", "integer", array(
				"label" => Translator::getInstance()->trans("Wie viel KW hat das bestehende Gerät?"),
				"label_attr" => array(
						"for" => "kw",
				),
				"data" => 3
		))
		->add("baujahr", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Bis 1960"),
						2 => Translator::getInstance()->trans("1961-1977"),
						3 => Translator::getInstance()->trans("1978-1994"),
                        4 => Translator::getInstance()->trans("Ab 1995")
				),
				"label" => Translator::getInstance()->trans("Wann wurde das Gebäude gebaut?"),
				"label_attr" => array(
                    "for" => "baujahr",
                ),
				"data" => 1
		))
		->add("personen_anzahl", "integer", array(
				"label" => Translator::getInstance()->trans("Wie viele Personen leben im Haushalt?"),
				"label_attr" => array(
						"for" => "personen_anzahl",
				),
				"data" => 3
		))
             
       ->add("etagen", "integer", array(
				"label" => Translator::getInstance()->trans("Wie viele Etagen hat Ihre Gebäude?"),
				"label_attr" => array(
						"for" => "etagen",
				),
				"data" => 2
		))
             
             
		->add("flaeche", "integer", array(
				"label" => Translator::getInstance()->trans("Wie groß ist die zu beheizende Fläche?"),
				"label_attr" => array(
						"for" => "flaeche"
				),
				"data" => 110
		))
		->add("lage_des_gebaeudes", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Frei"),
						2 => Translator::getInstance()->trans("Normal")
				),
				"label" => Translator::getInstance()->trans("Lage des Gebäudes?"),
				"label_attr" => array(
                    "for" => "lage_des_gebaeudes",
                ),
				"data" => 1
		))
		->add("windlage_des_gebaudes", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Windstark"),
						2 => Translator::getInstance()->trans("Windschwach")
				),
				"label" => Translator::getInstance()->trans("Windlage des Gebaudes"),
				"label_attr" => array(
                    "for" => "windlage_des_gebaudes",
                ),
				"data" => 1
		))
		/*
		->add("lage_des_raumes", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("1. Etag"),
						2 => Translator::getInstance()->trans("2. Etage"),
						3 => Translator::getInstance()->trans("3.-4 Etage")
				),
				"label" => Translator::getInstance()->trans("In welcher Etage befinden sich die Räume?"),
				"label_attr" => array(
                    "for" => "lage_des_raumes",
                ),
				"data" => 1
		))
		*/
		->add("anzahl_aussenwaende", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("1 Wand"),
						2 => Translator::getInstance()->trans("2 Wände"),
						3 => Translator::getInstance()->trans("mehr als 3 Wände")
				),
				"label" => Translator::getInstance()->trans("Wie viel ist die Anzahl der Außenwände?"),
				"label_attr" => array(
                    "for" => "anzahl_aussenwaende",
                ),
				"data" => 1
		))
		->add("fenster", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Einfach verglast"),
						2 => Translator::getInstance()->trans("Doppelt verglast"),
						3 => Translator::getInstance()->trans("Isolierverglast")
				),
				"label" => Translator::getInstance()->trans("Wie sind Ihre Fenster verglast?"),
				"label_attr" => array(
                    "for" => "fenster",
                ),
				"data" => 1
		))
		/*
		->add("verglaste_flaeche", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Gross"),
						2 => Translator::getInstance()->trans("Mittel"),
						3 => Translator::getInstance()->trans("Klein")
				),
				"label" => Translator::getInstance()->trans("Wie groß sind Ihre Fensterflächen?"),
				"label_attr" => array(
                    "for" => "verglaste_flaeche",
                ),
				"data" => 1
		))
		*/
         
		->add("dach_daemmung", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Ja"),
						2 => Translator::getInstance()->trans("Nein")
				),
				"label" => Translator::getInstance()->trans("Ist das Dach gedämmt?"),
				"label_attr" => array(
						"for" => "dach_daemmung",
				),
				"data" => 1
		))
		->add("wohnraumtemperatur", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("15"),
						2 => Translator::getInstance()->trans("20"),
                        3 => Translator::getInstance()->trans("22"),
						4 => Translator::getInstance()->trans("mehr als 22")
				),
				"label" => Translator::getInstance()->trans("Wie hoch ist die Wohnraumtemperatur?"),
				"label_attr" => array(
                    "for" => "wohnraumtemperatur",
                ),
				"data" => 1
		))
		->add("aussentemperatur", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("-10C"),
						2 => Translator::getInstance()->trans("-14C/-12C"),
                        3 => Translator::getInstance()->trans("-18C/-16C"),
						4 => Translator::getInstance()->trans("kälter als -18C")
				),
				"label" => Translator::getInstance()->trans("Wie kalt kann bei ihnen im Winter die Außentemperatur werden?"),
				"label_attr" => array(
                    "for" => "aussentemperatur"
                ),
				"data" => 1
		))
		->add("waermedaemmung", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Nicht"),
						2 => Translator::getInstance()->trans("Teilweise"),
						3 => Translator::getInstance()->trans("Erhöht")
				),
				"label" => Translator::getInstance()->trans("Ist eine Wärmedämmung vorhanden?"),
				"label_attr" => array(
                    "for" => "waermedaemmung"
                ),
				"data" => 1
		))
             
             
         /* slide 7 */    
        
        ->add("abgasfuehrung", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Aussen am Haus "),
						2 => Translator::getInstance()->trans("Im Kamin "),
						3 => Translator::getInstance()->trans("Direkt durch das Dach"),
                        4 => Translator::getInstance()->trans("Ist noch ein zweites Gerät im Kamin eingebunden")
				),
				"label" => Translator::getInstance()->trans("Wie verläuft die Abgasführung heute?"),
				"label_attr" => array(
                    "for" => "abgasfuehrung"
                ),
				"data" => 1
		))

             
        ->add("waermeabgabe", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Heizkörper"),
						2 => Translator::getInstance()->trans("Fußbodenheizung"),
						3 => Translator::getInstance()->trans("Heizkörper und Fußbodenheizung "),
                        4 => Translator::getInstance()->trans("Sonstiges ")
				),
				"label" => Translator::getInstance()->trans("Wie erfolgt die Wärmeabgabe?"),
				"label_attr" => array(
                    "for" => "waermeabgabe"
                ),
				"data" => 1
		))
             
        ->add("duschwasser", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Ja"),
						2 => Translator::getInstance()->trans("Nein")

				),
				"label" => Translator::getInstance()->trans("Wird Duschwasser mit der Heizung erwärmt? "),
				"label_attr" => array(
                    "for" => "duschwasser"
                ),
				"data" => 1
		))
             
                          
        ->add("wasserabfluss", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Ja"),
						2 => Translator::getInstance()->trans("Nein")

				),
				"label" => Translator::getInstance()->trans("Ist ein Wasserabfluss unter der Heizung vorhanden? "),
				"label_attr" => array(
                    "for" => "duschwasser"
                ),
				"data" => 1
		))
             
        ->add("warmwasserversorgung", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Ja"),
						2 => Translator::getInstance()->trans("Nein")

				),
				"label" => Translator::getInstance()->trans("Soll die Warmwasserversorgung über die Heizung erfolgen? "),
				"label_attr" => array(
                    "for" => "warmwasserversorgung"
                ),
				"data" => 2
		))
             
                          
        ->add("warmwasserversorgung-extra", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Warmwasserspeicher"),
						2 => Translator::getInstance()->trans("Kombigerät / Durchlauferhitzer"),
                        3 => Translator::getInstance()->trans("Sonstige"),
                    

				),
				"label" => Translator::getInstance()->trans("Wie wollen Sie die Warmwasserversorgung haben mit einem?"),
				"label_attr" => array(
                    "for" => "warmwasserversorgung"
                ),
				"data" => 1
		))
             
        ->add("warmwasserversorgung-extra-waermepumpe", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Warmwasserspeicher"),
                        2 => Translator::getInstance()->trans("Sonstige")
                    

				),
				"label" => Translator::getInstance()->trans("Wie wollen Sie die Warmwasserversorgung haben mit einem?"),
				"label_attr" => array(
                    "for" => "warmwasserversorgung"
                ),
				"data" => 1
		))
             
             
		->add("anmerkungen", "text", array(
		"label" => Translator::getInstance()->trans("Anmerkungen zu Ihrer Heizung"),
		"label_attr" => array(
                    "for" => "anmerkungen"
                )/*,
		"disabled" => true*/
		))
		;
    }

    public function getName()
    {
        return "konfigurator";
    }
}
