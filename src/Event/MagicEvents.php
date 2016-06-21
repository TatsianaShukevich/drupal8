<?php
/**
 * @file
 * Contains \Drupal\training\Event\MagicEvents.
 */

namespace Drupal\training\Event;

/**
 * Defines events for the magic question.
 *
 * @see \Drupal\training\Event\MagicPageLoadEvent
 */

final class MagicEvents {
    /**
     * Name of the event when Magic page is loaded.
     *
     * This event allows modules to perform an action whenever the Magic Page is loaded. The event listener method
     * receives a \Drupal\migrate\Event\MigrateMapSaveEvent instance.
     *
     * @Event
     *
     * @see \Drupal\training\Event\MagicPageLoadEvent
     *
     * @var string
     */
    const PAGE_LOAD = 'magic.page_load';
    
}