<?php
/**
 * @file
 * Contains \Drupal\magic_ball\Event\MagicPageLoadEvent.
 */

namespace Drupal\magic_ball\Event;

use Symfony\Component\EventDispatcher\Event;
use Drupal\Core\Config\Config;
use Drupal\Core\Session\AccountInterface;


class MagicPageLoadEvent extends Event {
    
    private $config;
    protected $user;
    protected $magicHelloPhrase;
    


    /**
     * Constructor.
     *
     * @param Config $config
     * @param AccountInterface $user
     */
    public function __construct(Config $config, AccountInterface $user) {
        $this->config = $config;
        $this->user = $user;
        
    }
    
    /**
     * Getter for the config object.
     *
     * @return string
     */

    public function getUserName() {
        return $this->user->getDisplayName();
    }

    /**
     * Getter for the config object.
     *
     * @return string
     */

    public function getMagicHelloPhrase() {
        return $this->config->get('magic_ball.magicHelloPhrase');
    }
}