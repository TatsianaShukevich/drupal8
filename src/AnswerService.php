<?php
/**
 * @file
 * Contains \Drupal\training\AnswerService.
 */

namespace Drupal\training;

use Drupal\Core\Config;
//use Drupal\Core\Config\Context\ContextInterface;

use Symfony\Component\DependencyInjection\ContainerInterface;

class AnswerService {
    
    protected $config;
    
    public function __construct() {
        $this->config = \Drupal::config('training.settings');
        //$this->config = $config;
    }


    
    public  function  getAnswer() {
        drupal_set_message($this->config->get('training.yes'));
    }
    
}