<?php

namespace HookCalendar\Hook;

use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Hook\BaseHook;
use Thelia\Log\Tlog;

class Front extends BaseHook{

    public function onMainHeadBottom(HookRenderEvent $event)
    {
        // $content = $this->addCSS('assets/css/styles.css');
        // $event->add($content);
		//$content = $this->addJS('asssets/js/script.js');
		//$event->add($content);
	}
		
    public function onProductserviceBottom(HookRenderEvent $event)
    {
    	
    	$log = Tlog::getInstance()->error("hookcalendar fron service ".implode(" ",$event->getArguments()));
        $content = $this->render('calendar.html');
        $event->add($content);
    }
    
}
