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
         				2 => Translator::getInstance()->trans("Erdöl"),
         				3 => Translator::getInstance()->trans("Flüssiggas"),
         				4 => Translator::getInstance()->trans("Sonstiges")
         		),
         		"label" => Translator::getInstance()->trans("brennstoff_momentan"),
         		"label_attr" => array(
         				"for" => "brennstoff_momentan",
         		),
         		"data" => 1
         ))
         ->add("brennstoff_zukunft", "choice", array(
         		"choices" => array (
         				1 => Translator::getInstance()->trans("Erdgas"),
         				2 => Translator::getInstance()->trans("Erdöl"),
         				3 => Translator::getInstance()->trans("Flüssiggas"),
         				4 => Translator::getInstance()->trans("Sonstiges")
         		),
         		"label" => Translator::getInstance()->trans("brennstoff_zukunft"),
         		"label_attr" => array(
         				"for" => "brennstoff_zukunft",
         		),
         		"data" => 1
         ))
		->add("gebaeudeart", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Einzelhaus"),
						2 => Translator::getInstance()->trans("Reihenhaus"),
						3 => Translator::getInstance()->trans("Mehrfamilienhaus")
				),
				"label" => Translator::getInstance()->trans("gebaeudeart"),
				"label_attr" => array(
                    "for" => "gebaeudeart",
                ),
				"data" => 1
		))
		->add("baujahr", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Bis 1960"),
						2 => Translator::getInstance()->trans("1966-1977"),
						3 => Translator::getInstance()->trans("Ab 1978")
				),
				"label" => Translator::getInstance()->trans("Baujahr"),
				"label_attr" => array(
                    "for" => "baujahr",
                ),
				"data" => 1
		))
		->add("personen_anzahl", "integer", array(
				"label" => Translator::getInstance()->trans("personen_anzahl"),
				"label_attr" => array(
						"for" => "personen_anzahl",
				),
				"data" => 3
		))
		->add("flaeche", "integer", array(
				"label" => Translator::getInstance()->trans("Fläche"),
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
				"label" => Translator::getInstance()->trans("Lage des gebaeudes"),
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
		->add("lage_des_raumes", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("1 Etage"),
						2 => Translator::getInstance()->trans("2 Etagen"),
						3 => Translator::getInstance()->trans("3-4 Etagen")
				),
				"label" => Translator::getInstance()->trans("Lage des Räumes"),
				"label_attr" => array(
                    "for" => "lage_des_raumes",
                ),
				"data" => 1
		))
		->add("anzahl_aussenwaende", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("3-4 Wände"),
						2 => Translator::getInstance()->trans("2 Wände"),
						3 => Translator::getInstance()->trans("1 Wand")
				),
				"label" => Translator::getInstance()->trans("Anzahl Außenwände"),
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
				"label" => Translator::getInstance()->trans("Fenster"),
				"label_attr" => array(
                    "for" => "fenster",
                ),
				"data" => 1
		))
		->add("verglaste_flaeche", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Gross"),
						2 => Translator::getInstance()->trans("Mittel"),
						3 => Translator::getInstance()->trans("Klein")
				),
				"label" => Translator::getInstance()->trans("Verglaste Fläche"),
				"label_attr" => array(
                    "for" => "verglaste_flaeche",
                ),
				"data" => 1
		))
		->add("dach_daemmung", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Ja"),
						2 => Translator::getInstance()->trans("Nein")
				),
				"label" => Translator::getInstance()->trans("dach_daemmung"),
				"label_attr" => array(
						"for" => "dach_daemmung",
				),
				"data" => 1
		))
		->add("wohnraumtemperatur", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("22"),
						2 => Translator::getInstance()->trans("20"),
						3 => Translator::getInstance()->trans("15")
				),
				"label" => Translator::getInstance()->trans("Wohneaum temperatur"),
				"label_attr" => array(
                    "for" => "wohnraumtemperatur",
                ),
				"data" => 1
		))
		->add("aussentemperatur", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("-18C/-16C"),
						2 => Translator::getInstance()->trans("-14C/-12C"),
						3 => Translator::getInstance()->trans("-10C")
				),
				"label" => Translator::getInstance()->trans("Außentemperatur"),
				"label_attr" => array(
                    "for" => "aussentemperatur"
                ),
				"data" => 1
		))
		->add("waermedaemmung", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Nicht"),
						2 => Translator::getInstance()->trans("Teilweise"),
						3 => Translator::getInstance()->trans("Erhoeht")
				),
				"label" => Translator::getInstance()->trans("Wärmedämung"),
				"label_attr" => array(
                    "for" => "waermedaemmung"
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
		;
    }

    public function getName()
    {
        return "konfigurator";
    }
}
