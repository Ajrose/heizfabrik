<?php
/*************************************************************************************/
/*                                                                                   */
/*      Thelia	                                                                     */
/*      AUTHOR: ANI JALAVYAN /AJ                                                                         */
/*      Copyright (c) OpenStudio                                                     */
/*      email : info@thelia.net                                                      */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      This program is free software; you can redistribute it and/or modify         */
/*      it under the terms of the GNU General Public License as published by         */
/*      the Free Software Foundation; either version 3 of the License                */
/*                                                                                   */
/*      This program is distributed in the hope that it will be useful,              */
/*      but WITHOUT ANY WARRANTY; without even the implied warranty of               */
/*      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the                */
/*      GNU General Public License for more details.                                 */
/*                                                                                   */
/*      You should have received a copy of the GNU General Public License            */
/*	    along with this program. If not, see <http://www.gnu.org/licenses/>.         */
/*                                                                                   */
/*************************************************************************************/

namespace Front\Controller;

use Thelia\Controller\Front\BaseFrontController;
use HookKlimaAngebot\Form\KlimaAngebot;
use Thelia\Form\Definition\FrontForm;
use Thelia\Form\Exception\FormValidationException;
use Thelia\Log\Tlog;
use Thelia\Model\ConfigQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\FileBag;
/**
 * Class ContactController
 * @package Thelia\Controller\Front
 * @author Ani Jalavyan <ani.jalavyan@sepa.at>
 */
class HeizungsKonfiguratorPersonalDataController extends BaseFrontController
{
    /**
     * send contact message
     */
}
