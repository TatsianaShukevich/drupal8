<?php

/**
 * @file
 * Contains Drupal\magic_ball\EventSubscriber\MagicSubscriber.
 */

namespace Drupal\magic_ball\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\magic_ball\Event\MagicEvents;

class MagicSubscriber implements EventSubscriberInterface {

    static function getSubscribedEvents() {
        $events[MagicEvents::PAGE_LOAD][] = array('onMagicPageLoad', 0);    
        return $events;
    }

    public function onMagicPageLoad($event) {

        $userName = $event->getUserName();
        $magicHelloPhrase = $event->getMagicHelloPhrase();
        drupal_set_message($magicHelloPhrase . ', ' . $userName);
    }

}