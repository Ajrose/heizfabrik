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

namespace HookKlimaAngebot\Form;

use HookKlimaAngebot\HookKlimaAngebot;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Constraints\NotBlank;
use Thelia\Core\Translation\Translator;
use Thelia\Form\BaseForm;

class KlimaAngebot extends BaseForm
{
    protected function buildForm()
    {
         $formBuilder = $this->formBuilder
        
           
        ->add("firstname", "text", array(
         		"label" => Translator::getInstance()->trans("firstname"),
         		"label_attr" => array(
         				"for" => "firstname",
         		)
         ))
        ->add("lastname", "text", array(
         		"label" => Translator::getInstance()->trans("lastname"),
         		"label_attr" => array(
         				"for" => "lastname",
         		)
         ))
        ->add("email", "text", array(
         		"label" => Translator::getInstance()->trans("email"),
         		"label_attr" => array(
         				"for" => "email",
         		)
         ))
         ->add("phone", "text", array(
         		"label" => Translator::getInstance()->trans("phone"),
         		"label_attr" => array(
         				"for" => "email",
         		)
         ))
        ->add("cellphone", "text", array(
         		"label" => Translator::getInstance()->trans("cellphone"),
         		"label_attr" => array(
         				"for" => "cellphone",
         		)
         ))
             
        ->add("building-etage", "text", array(
         		"label" => Translator::getInstance()->trans("building-etage"),
         		"label_attr" => array(
         				"for" => "building-etage",
         		)
         ))
          ->add("etage", "text", array(
         		"label" => Translator::getInstance()->trans("etage"),
         		"label_attr" => array(
         				"for" => "etage",
         		)
         ))

		 ->add("image_upload", "file", array(
		"label" => Translator::getInstance()->trans("upload"),
		"label_attr" => array(
                    "for" => "upload"
                )
            
            /*,
		"disabled" => true*/
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
        return "klimaangebot";
    }
}
