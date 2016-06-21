<?php

/**
 * @file
 * Contains Drupal\training\EventSubscriber\MagicSubscriber.
 */

namespace Drupal\training\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\training\Event\MagicEvents;

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