<?php
/**
 * @file
 * Contains \Drupal\magic_ball\AnswerService.
 */

namespace Drupal\magic_ball;

use Drupal\Core\Config;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AnswerService {
    
    protected $config;
    
    public function __construct() {
        $this->config = \Drupal::config('magic_ball.settings');
        //$this->config = $config;
    }


    
    public  function  getAnswer() {
        drupal_set_message($this->config->get('magic_ball.yes'));
    }
    
}