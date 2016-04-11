<?php

namespace HookKonfigurator\Hook;

use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Hook\BaseHook;

class Front extends BaseHook{

    public function onMainHeadBottom(HookRenderEvent $event)
    {
        $content = $this->addCSS('assets/css/styles.css');
        $event->add($content);
		//$content = $this->addJS('asssets/js/script.js');
		//$event->add($content);
		}

    public function onMainNavbarSecondary(HookRenderEvent $event)
    {
        $content = $this->render("main-navbar-secondary.html");
        $event->add($content);
    }

    public function onMiniKonfigurator(HookRenderEvent $event)
    {
        $content = $this->render('mini-konfigurator.html',array('power'=> 30));
        $event->add($content);
    }
}
