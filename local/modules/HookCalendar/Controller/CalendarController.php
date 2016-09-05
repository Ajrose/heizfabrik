<?php
namespace HookCalendar\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Thelia\Tools\URL;
use Thelia\Controller\Front\BaseFrontController;
use Thelia\Core\HttpFoundation\JsonResponse;
use Thelia\Core\HttpFoundation\Request;
use Thelia\Log\Tlog;
/**
 * Class CalendarController
 * @package HookCalendar\Controller
 * @author emanuel plopu <emanuel.plopu@sepa.at>
 */
class CalendarController extends BaseFrontController
{
	private $daySeconds = 86400;

    public function getDaysFromMonthRequest(Request $request){
    	//TODO sequence diagramm with the operations starting from konfigurator form and ending to the response products
    	if ($request->isXmlHttpRequest ()) {
    		//$view = $request->get ( 'ajax-view', "includes/konfigurator-suggestions" );
    		//$request->attributes->set ( '_view', $view );
    		$direction =$request->get('direction');
    			$month =date('m', time());
    			$year = date('Y', time());
    			$correctMonthIncrement = array();
    		if($direction == "next")
    			$correctMonthIncrement = $this->adjustDate($month+1, $year);
    		
    		if($direction == "prev")
    			$correctMonthIncrement = $this->adjustDate($month, $year);
    		
    		$month = $correctMonthIncrement[0];
    		$year  = $correctMonthIncrement[1];
    		$content =$this->render('days_table',
    		array("month_days_array" => $this->getDaysForMonth($month, $year)));
    		//TODO redirect to the service category
    		return $content; 
    	}
    	else
    	{
    		//TODO redirect to the service category
    		return new JsonResponse ( array ('stuff' => 'more stuff') ); // $productsQuerry->__toString()
    	}
    }
    
    public function getTimeslotsFromDayRequest(Request $request){
    	if ($request->isXmlHttpRequest ()) {
    	$start_ts = $request->get("start_ts");
    	//$stop_ts  = $request->get("stop_ts");
    	
    	$content =$this->render('hours_table',
    			array("day_hours_array" => $this->getAppointmentsForDay(date('d', $start_ts), date('m', $start_ts), date('Y', $start_ts))));
    	
    	return $content;
    	}
    	else
    	{
    		//TODO redirect to the service category
    		return new JsonResponse ( array ('stuff' => 'more stuff') ); // $productsQuerry->__toString()
    	}
    }
    
    public function saveAppointmentChoices(Request $request){
    	
    }
    /* 27 28 29 30  1  2  3
     *  4  5  6  7  8  9 10
     * 11 12 13 14 15 16 17
     * 18 19 20 21 22 23 24
     * 25 26 27 28 29 30 31
     * */
    public function getDaysForMonth($month,$year){

    	//$time = strtotime("monday ".$year."-".$month);
    	$startingDate = mktime(0,0,0, $month, "1", $year);
    	$endingDate = mktime(0,0,0, $month, date('t',$startingDate), $year);
    	$firstWeekNumber = (int)date('W',$startingDate);
    	$lastWeekNumber  = (int)date('W',$endingDate);
    	$monthStructure = array();
    	
    	for($i=$firstWeekNumber;$i<=$lastWeekNumber;$i++)
    		$monthStructure["w".($i-$firstWeekNumber+1)] = $this->getDaysForWeek($i, $year);
    	return $monthStructure;//$monthStructure;
    }
    
    /*
    array('week' => '31', 'year' => '2016', 'weekStartTime' => '1470002400', 'weekDate' => '01-08-2016', 
    		array(
    		'w1' => array(
    				'd1', array('nr' => '01', 'type' => '3', 'start_ts' => '1470027600', 'stop_ts' => '1470063600'), 
    				'd2', array('nr' => '02', 'type' => '3', 'start_ts' => '1470114000', 'stop_ts' => '1470150000'), 
    				'd3', array('nr' => '03', 'type' => '3', 'start_ts' => '1470200400', 'stop_ts' => '1470236400'), 
    				'd4', array('nr' => '04', 'type' => '3', 'start_ts' => '1470286800', 'stop_ts' => '1470322800'), 
    				'd5', array('nr' => '05', 'type' => '3', 'start_ts' => '1470373200', 'stop_ts' => '1470409200'), 
    				'd6', array('nr' => '06', 'type' => '3', 'start_ts' => '1470459600', 'stop_ts' => '1470495600'), 
    				'd7', array('nr' => '07', 'type' => '3', 'start_ts' => '1470546000', 'stop_ts' => '1470582000'))
    				),
    		'w2' => array(
    				'd8', array('nr' => '01', 'type' => '3', 'start_ts' => '1470027600', 'stop_ts' => '1470063600'), 
    				'd9', array('nr' => '02', 'type' => '3', 'start_ts' => '1470114000', 'stop_ts' => '1470150000'), 
    				'd10', array('nr' => '03', 'type' => '3', 'start_ts' => '1470200400', 'stop_ts' => '1470236400'), 
    				'd11', array('nr' => '04', 'type' => '3', 'start_ts' => '1470286800', 'stop_ts' => '1470322800'), 
    				'd12', array('nr' => '05', 'type' => '3', 'start_ts' => '1470373200', 'stop_ts' => '1470409200'), 
    				'd13', array('nr' => '06', 'type' => '3', 'start_ts' => '1470459600', 'stop_ts' => '1470495600'), 
    				'd14', array('nr' => '07', 'type' => '3', 'start_ts' => '1470546000', 'stop_ts' => '1470582000'))
    				),
    */
    private function isDayAvailable($current_day,$todayTimestamp){
    	//past days
    	if($current_day < $todayTimestamp)
    		return 1;
    	else if($current_day == $todayTimestamp)
    			return 3;
    	return 5;
    	// weekends
    }
    
    public function getDaysForWeek($week,$year){
    	$weekStartTime = strtotime($year.'W'.$week);
    	$weekDate = date('d-m-Y', $weekStartTime);

    	$todayTime = time();
    	$todayTimestamp  =  mktime( 0, 0, 0, date('m', $todayTime), date('d', $todayTime), date('Y', $todayTime));
    	$log = Tlog::getInstance();
    	
    	$weekStructure = array();
    	for($i = 0;$i<7;$i++){
    		$dayTimestamp = $weekStartTime+$i*$this->daySeconds;
    		$dayDate  = date('d', $dayTimestamp);
    		$dayMonth = date('m', $dayTimestamp);
    		$dayYear  = date('Y', $dayTimestamp);
    		
    		////day 1 past 2 select 3 today 4 inactive 5 available
    		$weekDay = array("nr" => $dayDate, 
    				  "type" => $this->isDayAvailable($dayTimestamp, $todayTimestamp),
    				  "start_ts" => mktime(   7, 0, 0, $dayMonth, $dayDate, $dayYear),
    				  "stop_ts"  => mktime(  17, 0, 0, $dayMonth, $dayDate, $dayYear));
    		$weekStructure["d".($i+1)] = $weekDay;
    			
    			$log->error(implode(' ',$weekDay));
    	}
    	return $weekStructure;
    }
    
    public function getAppointmentsForDay($day,$month,$year){
    	return array(	"nr" => $day,
    					"type" => 3,
    					"ts" => array(
    					array("type" => "1", "start" => "07:00", "start_ts" => mktime(  7,  0, 0, $month, $day, $year), "end" => "09:00", "end_ts" => mktime(  9,  0, 0, $month, $day, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "09:00", "start_ts" => mktime(  9,  0, 0, $month, $day, $year), "end" => "11:00", "end_ts" => mktime( 11,  0, 0, $month, $day, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "11:00", "start_ts" => mktime( 11,  0, 0, $month, $day, $year), "end" => "13:00", "end_ts" => mktime( 13,  0, 0, $month, $day, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "13:00", "start_ts" => mktime( 13,  0, 0, $month, $day, $year), "end" => "15:00", "end_ts" => mktime( 15,  0, 0, $month, $day, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "15:00", "start_ts" => mktime( 15,  0, 0, $month, $day, $year), "end" => "17:00", "end_ts" => mktime( 17,  0, 0, $month, $day, $year), "employee_id" => "2"),
    					array("type" => "1", "start" => "17:00", "start_ts" => mktime( 17,  0, 0, $month, $day, $year), "end" => "19:00", "end_ts" => mktime( 19,  0, 0, $month, $day, $year), "employee_id" => "2")
    	));
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
    
    static private function adjustDate($month, $year)
    {
    	$arr = array();
    	$arr[0] = $month;
    	$arr[1] = $year;
    
    	while ($arr[0] > 12)
    	{
    		$arr[0] -= 12;
    		$arr[1]++;
    	}
    
    	while ($arr[0] <= 0)
    	{
    		$arr[0] += 12;
    		$arr[1]--;
    	}
    
    	return $arr;
    }


    protected function redirectToConfigurationPage()
    {
        return RedirectResponse::create(URL::getInstance()->absoluteUrl('/admin/module/Carousel'));
    }
    
    
}