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
             
        ->add("building_etage", "text", array(
         		"label" => Translator::getInstance()->trans("Wie viele Stöcke hat das Gebäude?"),
         		"label_attr" => array(
         				"for" => "building_etage",
         		)
         ))
             
        ->add("etage", "text", array(
         		"label" => Translator::getInstance()->trans("In welchem Stock befindet sich die Wohnung"),
         		"label_attr" => array(
         				"for" => "etage",
         		)
         ))
        ->add("gebaeudeart", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Einzelhaus"),
						2 => Translator::getInstance()->trans("Panel"),
						3 => Translator::getInstance()->trans("Stein")
				),
				"label" => Translator::getInstance()->trans("Art des Gebäudes"),
				"label_attr" => array(
                    "for" => "gebaeudeart",
                ),
				"data" => 1
		))
             
        ->add("heizboden", "choice", array(
				"choices" => array (
						1 => Translator::getInstance()->trans("Ja"),
						2 => Translator::getInstance()->trans("Nein")
						
				),
				"label" => Translator::getInstance()->trans("Werden Sie eine Fußbodenheizung haben?"),
				"label_attr" => array(
                    "for" => "heizboden",
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
