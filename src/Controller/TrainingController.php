<?php
/**
 * @file
 * Contains \Drupal\training\Controller\TrainingController.
 */

namespace Drupal\training\Controller;

use Drupal\Core\Controller\ControllerBase;

class TrainingController extends ControllerBase {
    /**
     * {@inheritdoc}
     */
    
    public function showAnswer() {
        return array(
          "#markup" => "Go ahead!"  
        );
    }
}
