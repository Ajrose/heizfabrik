<?php

namespace HookCalendar\Hook;

use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Hook\BaseHook;
use Thelia\Log\Tlog;
use HookCalendar\Controller\CalendarController;

class Front extends BaseHook{

    public function onMainHeadBottom(HookRenderEvent $event)
    {
         $content = $this->addCSS("assets/css/calendar.css");
         //$event->add($this->mark($this->addCSS("assets/css/styles.css")));
         $event->add($content);
		//$content = $this->addJS('asssets/js/script.js');
		//$event->add($content);
	}
		
    public function onProductServiceBottom(HookRenderEvent $event)
    {
    	$log = Tlog::getInstance();
    	
    	$initial_appointments = new CalendarController();
    	
    	$log->error("hookcalendar front service ".implode(" ",$event->getArguments()));
    	
    	$event->add($this->addJS('assets/js/calendar.js'));
    	
    	$initial_appointments->getDaysForMonth($event->getArgument("month"),$event->getArgument("year"));
        $content = $this->render('calendar.html',
            array(
                "service_id"        => $event->getArgument("service"),
                "week_available" => $initial_appointments->getAppointmentsForWeek($event->getArgument("month"),$event->getArgument("year"))
            ));
        $event->add($content);
    }
}
