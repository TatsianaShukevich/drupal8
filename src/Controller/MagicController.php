<?php
/**
 * @file
 * Contains \Drupal\magic_ball\Controller\MagicController.
 */

namespace Drupal\magic_ball\Controller;

use Drupal\Core\Controller\ControllerBase;

use Drupal\Core\Form\FormBuilderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\magic_ball\Event\MagicPageLoadEvent;
use Drupal\magic_ball\Event\MagicEvents;


class MagicController extends ControllerBase {

    /**
     * The form builder.
     *
     * @var \Drupal\Core\Form\FormBuilderInterface
     */
    protected $formBuilder;
    
    protected $eventDispatcher;
    
    protected $config;

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

        $config = $this->config('magic_ball.settings');
        $user = $this->currentUser();

        $e = new MagicPageLoadEvent($config, $user);
        
        $this->eventDispatcher->dispatch(MagicEvents::PAGE_LOAD, $e);
        $form = $this->formBuilder->getForm('\Drupal\magic_ball\Form\MagicQuestionForm');

        $output = array(
            'question_form' => array(
                'form' => $form,

            ),
            'message' => array(
                '#markup' => 'Hi!'
            )
        );

        return $output;

    }

    public function showConfigurationPage() {

        $config = $this->config('magic_ball.settings');

        $phrases = $config->getRawData();
        $phrases_markup = '';

        foreach ($phrases['magic_ball'] as $key_phrase => $phrase) {
            if ($key_phrase == 'magicHelloPhrase') continue;

            $phrases_markup .= "[$key_phrase] => " . $phrase . '</br>';
        }

        $form = $this->formBuilder->getForm('\Drupal\magic_ball\Form\MagicConfigForm');

        $output = array(
            'header_phrase' => array(
                '#markup' => '<h2>List of phrases</h2>',
            ),
            'list_phrases' => array(
                '#markup' => $phrases_markup,
            ),
            'add_message' => array(
                '#markup' => '<h2>Add new phrase</h2>',
            ),
            'question_form' => array(
                'form' => $form,
            ),
        );

        return $output;

    }

}
