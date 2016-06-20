<?php
/**
 * @file
 * Contains \Drupal\training\Form\ConfigForm.
 */

namespace Drupal\training\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ConfigForm extends ConfigFormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'config_form';
    }

    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames() {
        return [
            'training.settings',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $config = $this->config('training.settings');


        $form['yes'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Yes phrase'),
            '#default_value' => $config->get('training.yes'),
        );

        $form['no'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('No phrase'),
            '#default_value' => $config->get('training.no'),
        );
        $form['probably'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Probably phrase'),
            '#default_value' => $config->get('training.probably'),
        );
        $form['sure'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Sure phrase'),
            '#default_value' => $config->get('training.sure'),
        );
        $form['dont'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Dont phrase'),
           '#default_value' => $config->get('training.dont'),
        );

        return parent::buildForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
//        $config = $this->config('training.settings');
//        $old = $config->get('training');
//        $new_data =

        $this->config('training.settings')
            ->set('training.yes', $form_state->getValue('yes'))
            ->set('training.no', $form_state->getValue('no'))
            ->set('training.probably', $form_state->getValue('probably'))
            ->set('training.sure', $form_state->getValue('sure'))
            ->set('training.dont', $form_state->getValue('dont'))
            ->save();

        parent::submitForm($form, $form_state);
    }
}