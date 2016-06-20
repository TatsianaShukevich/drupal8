<?php
/**
 * @file
 * Contains \Drupal\training\AnswerService.
 */

namespace Drupal\training;

use Drupal\Core\Config\ConfigFactory;
//use Drupal\Core\Config\Context\ContextInterface;

use Symfony\Component\DependencyInjection\ContainerInterface;

class AnswerService {
    
    protected $config;
    
    public function __construct() {
        $this->config = \Drupal::config('training.settings');
    }


    
    public  function  getAnswer() {
        
    }
    
}