<?php

namespace KlimaKonfigurator\Hook;

use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Hook\BaseHook;

class Front extends BaseHook{

    public function onMainHeadBottom(HookRenderEvent $event)
    {
        $content = $this->addCSS('assets/css/styles.css');
        $event->add($content);
		}

    public function onMainNavbarPrimary(HookRenderEvent $event)
    {
    	$content = $this->render('main-navbar-primary.html');
    	$event->add($content);
    }
}
