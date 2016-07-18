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

namespace HookCalendar\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Thelia\Tools\URL;
use Thelia\Controller\Front\BaseFrontController;
use Thelia\Core\HttpFoundation\JsonResponse;
use Thelia\Core\HttpFoundation\Request;

/**
 * Class CalendarController
 * @package HookCalendar\Controller
 * @author manuel raynaud <mraynaud@openstudio.fr>
 */
class CalendarController extends BaseFrontController
{

    public function getAppointments(Request $request){
    	//TODO sequence diagramm with the operations starting from konfigurator form and ending to the response products
    	if ($request->isXmlHttpRequest ()) {
    		//$view = $request->get ( 'ajax-view', "includes/konfigurator-suggestions" );
    		//$request->attributes->set ( '_view', $view );
    		return new JsonResponse ( array ('stuff' => 'more stuff') );
    	}
    	else
    	{
    		//TODO redirect to the service category
    		return new JsonResponse ( array ('stuff' => 'more stuff') ); // $productsQuerry->__toString()
    	}
    }
    
    public function saveAppointmentChoices(Request $request){
    	
    }
    
    public function getAppointmentsForWeek($week,$year){
    	$stringTime = strtotime($year.'W'.$week);
    	$monthDayFromWeek = explode(" ",date('n d',$stringTime));
    	$month = $monthDayFromWeek[0];
    	$firstDay = $monthDayFromWeek[1];
    	
    	mktime( 7, 0, 0, $month, $firstDay, $year);
    	
    	$available_times = array(
    			"d1" => array(
    					"nr" => 18,
    					"type" => 3,
    					"ts" => array(
    					array("type" => "6","display" =>"07<sub>00</sub>-09<sub>00</sub>", "start" => "07:00", "start_ts" => mktime(  7,  0, 0, $month, $firstDay, $year), "end" => "09:00", "end_ts" => mktime( 9, 0, 0, $month, $firstDay, $year), "employee_id" => "2"),
    					array("type" => "6", "start" => "09:30", "start_ts" => mktime(  9, 30, 0, $month, $firstDay, $year), "end" => "11:30", "end_ts" => mktime( 11, 30, 0, $month, $firstDay, $year), "employee_id" => "2"),
    					array("type" => "6", "start" => "12:00", "start_ts" => mktime( 12,  0, 0, $month, $firstDay, $year), "end" => "14:00", "end_ts" => mktime( 14, 0, 0, $month, $firstDay, $year), "employee_id" => "2"),
    					array("type" => "6", "start" => "14:30", "start_ts" => mktime( 14, 30, 0, $month, $firstDay, $year), "end" => "16:30", "end_ts" => mktime( 16, 30, 0, $month, $firstDay, $year), "employee_id" => "2"),
    					array("type" => "6", "start" => "17:00", "start_ts" => mktime( 17,  0, 0, $month, $firstDay, $year), "end" => "19:00", "end_ts" => mktime( 19, 0, 0, $month, $firstDay, $year), "employee_id" => "2"))),
    			"d2" =>  array(
    					"nr" => 19,
    					"type" => 5,
    					"ts" => array(
    					array("type" => "1", "start" => "07:00", "start_ts" => mktime(  7,  0, 0, $month, $firstDay+1, $year), "end" => "09:00", "end_ts" => mktime( 9, 0, 0, $month, $firstDay+1, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "09:30", "start_ts" => mktime(  9, 30, 0, $month, $firstDay+1, $year), "end" => "11:30", "end_ts" => mktime( 11, 30, 0, $month, $firstDay+1, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "12:00", "start_ts" => mktime( 12,  0, 0, $month, $firstDay+1, $year), "end" => "14:00", "end_ts" => mktime( 14, 0, 0, $month, $firstDay+1, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "14:30", "start_ts" => mktime( 14, 30, 0, $month, $firstDay+1, $year), "end" => "16:30", "end_ts" => mktime( 16, 30, 0, $month, $firstDay+1, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "17:00", "start_ts" => mktime( 17,  0, 0, $month, $firstDay+1, $year), "end" => "19:00", "end_ts" => mktime( 19, 0, 0, $month, $firstDay+1, $year), "employee_id" => "2"))),
    			"d3" =>  array(
    					"nr" => 20,
    					"type" => 5,
    					"ts" => array(
    					array("type" => "1", "start" => "07:00", "start_ts" => mktime(  7,  0, 0, $month, $firstDay+2, $year), "end" => "09:00", "end_ts" => mktime( 9, 0, 0, $month, $firstDay+2, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "09:30", "start_ts" => mktime(  9, 30, 0, $month, $firstDay+2, $year), "end" => "11:30", "end_ts" => mktime( 11, 30, 0, $month, $firstDay+2, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "12:00", "start_ts" => mktime( 12,  0, 0, $month, $firstDay+2, $year), "end" => "14:00", "end_ts" => mktime( 14, 0, 0, $month, $firstDay+2, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "14:30", "start_ts" => mktime( 14, 30, 0, $month, $firstDay+2, $year), "end" => "16:30", "end_ts" => mktime( 16, 30, 0, $month, $firstDay+2, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "17:00", "start_ts" => mktime( 17,  0, 0, $month, $firstDay+2, $year), "end" => "19:00", "end_ts" => mktime( 19, 0, 0, $month, $firstDay+2, $year), "employee_id" => "2"))),
    			"d4" =>  array(
    					"nr" => 21,
    					"type" => 5,
    					"ts" => array(
    					array("type" => "1", "start" => "07:00", "start_ts" => mktime(  7,  0, 0, $month, $firstDay+3, $year), "end" => "09:00", "end_ts" => mktime( 9, 0, 0, $month, $firstDay+3, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "09:30", "start_ts" => mktime(  9, 30, 0, $month, $firstDay+3, $year), "end" => "11:30", "end_ts" => mktime( 11, 30, 0, $month, $firstDay+3, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "12:00", "start_ts" => mktime( 12,  0, 0, $month, $firstDay+3, $year), "end" => "14:00", "end_ts" => mktime( 14, 0, 0, $month, $firstDay+3, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "14:30", "start_ts" => mktime( 14, 30, 0, $month, $firstDay+3, $year), "end" => "16:30", "end_ts" => mktime( 16, 30, 0, $month, $firstDay+3, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "17:00", "start_ts" => mktime( 17,  0, 0, $month, $firstDay+3, $year), "end" => "19:00", "end_ts" => mktime( 19, 0, 0, $month, $firstDay+3, $year), "employee_id" => "2"))),
    			"d5" =>  array(
    					"nr" => 22,
    					"type" => 5,
    					"ts" => array(
    					array("type" => "1", "start" => "07:00", "start_ts" => mktime(  7,  0, 0, $month, $firstDay+4, $year), "end" => "09:00", "end_ts" => mktime( 9, 0, 0, $month, $firstDay+4, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "09:30", "start_ts" => mktime(  9, 30, 0, $month, $firstDay+4, $year), "end" => "11:30", "end_ts" => mktime( 11, 30, 0, $month, $firstDay+4, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "12:00", "start_ts" => mktime( 12,  0, 0, $month, $firstDay+4, $year), "end" => "14:00", "end_ts" => mktime( 14, 0, 0, $month, $firstDay+4, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "14:30", "start_ts" => mktime( 14, 30, 0, $month, $firstDay+4, $year), "end" => "16:30", "end_ts" => mktime( 16, 30, 0, $month, $firstDay+4, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "17:00", "start_ts" => mktime( 17,  0, 0, $month, $firstDay+4, $year), "end" => "19:00", "end_ts" => mktime( 19, 0, 0, $month, $firstDay+4, $year), "employee_id" => "2"))),
    			"d6" =>  array(
    					"nr" => 23,
    					"type" => 4,
    					"ts" => array(
    					array("type" => "2", "start" => "07:00", "start_ts" => mktime(  7,  0, 0, $month, $firstDay+5, $year), "end" => "09:00", "end_ts" => mktime( 9, 0, 0, $month, $firstDay+5, $year), "employee_id" => "2"),
    					array("type" => "2", "start" => "09:30", "start_ts" => mktime(  9, 30, 0, $month, $firstDay+5, $year), "end" => "11:30", "end_ts" => mktime( 11, 30, 0, $month, $firstDay+5, $year), "employee_id" => "2"),
    					array("type" => "2", "start" => "12:00", "start_ts" => mktime( 12,  0, 0, $month, $firstDay+5, $year), "end" => "14:00", "end_ts" => mktime( 14, 0, 0, $month, $firstDay+5, $year), "employee_id" => "2"),
    					array("type" => "2", "start" => "14:30", "start_ts" => mktime( 14, 30, 0, $month, $firstDay+5, $year), "end" => "16:30", "end_ts" => mktime( 16, 30, 0, $month, $firstDay+5, $year), "employee_id" => "2"),
    					array("type" => "2", "start" => "17:00", "start_ts" => mktime( 17,  0, 0, $month, $firstDay+5, $year), "end" => "19:00", "end_ts" => mktime( 19, 0, 0, $month, $firstDay+5, $year), "employee_id" => "2"))),
    			"d7" =>  array(
    					"nr" => 24,
    					"type" => 4,
    					"ts" => array(
    					array("type" => "5", "start" => "07:00", "start_ts" => mktime(  7,  0, 0, $month, $firstDay+6, $year), "end" => "09:00", "end_ts" => mktime( 9, 0, 0, $month, $firstDay+6, $year), "employee_id" => "2"),
    					array("type" => "5", "start" => "09:30", "start_ts" => mktime(  9, 30, 0, $month, $firstDay+6, $year), "end" => "11:30", "end_ts" => mktime( 11, 30, 0, $month, $firstDay+6, $year), "employee_id" => "2"),
    					array("type" => "5", "start" => "12:00", "start_ts" => mktime( 12,  0, 0, $month, $firstDay+6, $year), "end" => "14:00", "end_ts" => mktime( 14, 0, 0, $month, $firstDay+6, $year), "employee_id" => "2"),
    					array("type" => "5", "start" => "14:30", "start_ts" => mktime( 14, 30, 0, $month, $firstDay+6, $year), "end" => "16:30", "end_ts" => mktime( 16, 30, 0, $month, $firstDay+6, $year), "employee_id" => "2"),
    					array("type" => "5", "start" => "17:00", "start_ts" => mktime( 17,  0, 0, $month, $firstDay+6, $year), "end" => "19:00", "end_ts" => mktime( 19, 0, 0, $month, $firstDay+6, $year), "employee_id" => "2"))));
    					//timeslot 1 available 2 booked 3 selected 4 booked_by_user 5 not_available 6 past_time_slot
						//day 1 past 2 select 3 today 4 inactive
    	return $available_times;
    }


    protected function redirectToConfigurationPage()
    {
        return RedirectResponse::create(URL::getInstance()->absoluteUrl('/admin/module/Carousel'));
    }
    
    
}