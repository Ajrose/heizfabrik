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

namespace KlimaKonfigurator\Form;

use KlimaKonfigurator\KlimaKonfigurator;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Constraints\NotBlank;
use Thelia\Core\Translation\Translator;
use Thelia\Form\BaseForm;

class KlimaBerechnung extends BaseForm
{
    protected function buildForm()
    {
         $formBuilder = $this->formBuilder
             
     		->add("grundflaeche", "integer", array(
				"label" => Translator::getInstance()->trans("FlÃ¤che"),
				"label_attr" => array(
						"for" => "flaeche"
				),
				"data" => 110
		))
             
            ->add("raumhoehe", "integer", array(
				"label" => Translator::getInstance()->trans("FlÃ¤che"),
				"label_attr" => array(
						"for" => "flaeche"
				),
				"data" => 3
		))
            ->add("fenster", "integer", array(
				"label" => Translator::getInstance()->trans("FlÃ¤che"),
				"label_attr" => array(
						"for" => "flaeche"
				),
				"data" => 2
		))
             
        ->add("decke", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Nicht klimatisierter Raum"),
						2 => Translator::getInstance()->trans("Dachboden"),
                        3 => Translator::getInstance()->trans("Isoliertes Flachdach")
				),
				"label" => Translator::getInstance()->trans("dach_daemmung"),
				"label_attr" => array(
						"for" => "dach_daemmung",
				),
				"data" => 1
		))
             
         ->add("personen", "integer", array(
				"label" => Translator::getInstance()->trans("FlÃ¤che"),
				"label_attr" => array(
						"for" => "flaeche"
				),
				"data" => 1
		))
             
        ->add("zusaetzliche-waerme", "integer", array(
				"label" => Translator::getInstance()->trans("FlÃ¤che"),
				"label_attr" => array(
						"for" => "flaeche"
				),
				"data" => 200
		))
         ->add("wegstrecke", "integer", array(
				"label" => Translator::getInstance()->trans("FlÃ¤che"),
				"label_attr" => array(
						"for" => "flaeche"
				),
				"data" => 2
		))
         ->add("kondensatablauf", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Gefälle"),
						2 => Translator::getInstance()->trans("Pumpe")
				),
				"label" => Translator::getInstance()->trans("Pumpe"),
				"label_attr" => array(
						"for" => "Pumpe",
				),
				"data" => 1
		))      
 
		->add("montage-aussenteil", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Wandmontage mittels Konsole"),
						2 => Translator::getInstance()->trans("Bodenmontage mittels Standfuß"),
						3 => Translator::getInstance()->trans("Bodenmontagekonsole aus Gummi kurz"),
                        4 => Translator::getInstance()->trans("Bodenmontagekonsole aus Gummi lang"),
				),
				"label" => Translator::getInstance()->trans("montage-aussenteil"),
				"label_attr" => array(
                    "for" => "montage-aussenteil",
                ),
				"data" => 1
		))
		->add("stromanschluss", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Stromanschluss ist Bauseits vorhanden"),
						2 => Translator::getInstance()->trans("Stromanschluss ist herzustellen")
						
				),
				"label" => Translator::getInstance()->trans("stromanschluss"),
				"label_attr" => array(
                    "for" => "stromanschluss",
                ),
				"data" => 1
		))


		->add("lage_des_gebaeudes", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Frei"),
						2 => Translator::getInstance()->trans("Normal")
				),
				"label" => Translator::getInstance()->trans("Lage des gebÃ¤udes"),
				"label_attr" => array(
                    "for" => "lage_des_gebaeudes",
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
        return "klimakonfigurator";
    }
}
