<?php
/**
 * @file
 * Contains \Drupal\training\Form\QuestionForm.
 */

namespace Drupal\training\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class QuestionForm extends FormBase {

    /**
     * {@inheritdoc}.
     */
    public function getFormId() {
        return 'question_form';
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
        drupal_set_message($this->t('Your question was @question', array('@question' => $form_state->getValue('question'))));
    }

}
