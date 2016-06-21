<?php
/**
 * @file
 * Contains \Drupal\training\Controller\TrainingController.
 */

namespace Drupal\training\Controller;

use Drupal\Core\Controller\ControllerBase;

use Drupal\Core\Form\FormBuilderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\training\Event\MagicPageLoadEvent;
use Drupal\training\Event\MagicEvents;


class TrainingController extends ControllerBase {

    /**
     * The form builder.
     *
     * @var \Drupal\Core\Form\FormBuilderInterface
     */
    protected $formBuilder;
    
    protected $eventDispatcher;

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container) {
        return new static(
            $container->get('form_builder'),
            $container->get('event_dispatcher')
        );
    }

    /**
     * Constructs an AdminController object.
     *
     * @param \Drupal\Core\Form\FormBuilderInterface $form_builder
     *   The form builder.
     */
    public function __construct(FormBuilderInterface $form_builder, $event_dispatcher) {
        $this->formBuilder = $form_builder;
        $this->eventDispatcher = $event_dispatcher;
    }

    /**
     * {@inheritdoc}
     */

    public function showForm() {

        $config = $this->config('training.settings');
        $user = $this->currentUser();

        $e = new MagicPageLoadEvent($config, $user);
        
        $this->eventDispatcher->dispatch(MagicEvents::PAGE_LOAD, $e);       
        
        return $this->formBuilder->getForm('\Drupal\training\Form\MagicQuestionForm');

    }

}
