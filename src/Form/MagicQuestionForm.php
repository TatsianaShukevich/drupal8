<?php
/**
 * @file
 * Contains \Drupal\magic_ball\Form\MagicQuestionForm.
 */


namespace Drupal\magic_ball\Form;


use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class MagicQuestionForm extends FormBase {

    protected $answerService;

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container) {
        return new static(
            $container->get('magic_ball.answer_service')
        );
    }

    /**
     * Constructs an AdminController object.
     *
     * @param \Drupal\Core\Form\FormBuilderInterface $form_builder
     *   The form builder.
     */
    public function __construct($answerService) {
        $this->answerService = $answerService;
    }

    /**
     * {@inheritdoc}.
     */
    public function getFormId() {
        return 'magic_form';
    }

    /**
     * {@inheritdoc}.
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['question'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Type your question here please')
        );
        $form['ask'] = array(
            '#type' => 'submit',
            '#value' => $this->t('Ask'),
        );

        return $form;
    }

    /**
     * {@inheritdoc}.
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $this->answerService->getAnswer();
        //drupal_set_message($this->t('Your question was @question', array('@question' => $form_state->getValue('question'))));
    }

}