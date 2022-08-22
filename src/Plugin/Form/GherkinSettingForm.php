<?php

/**
 * @file
 * Contains Drupal\gherkin\Form\GherkinSettingForm.
 */

 namespace Drupal\gherkin\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class GherkinSettingForm extends ConfigFormBase {

    /**
    * {@inheritdoc}
    */
    public function getFormId() {
        return 'gherkin_setting_form';
    }

    /**
    * {@inheritdoc}
    */
    public function buildForm(array $form, FormStateInterface $form_state) {

        $config = $this->config('gherkin.settings');
        $form = parent::buildForm($form, $form_state);

        $form['theme'] = [
            '#type' => 'select',
            '#title' => $this->t('Theme'),
            '#options' => $config->get('theme_list'),
            '#attributes' => [
            'style' => 'width: 150px;',
            ],
            '#default_value' => $config->get('theme'),
        ];

        return $form;
    }

    /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

    }
    
    /**
    * {@inheritdoc}
    */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $config = $this->config('gherkin.settings');
        $config->set('gherkin.theme', $form_state->getValue('theme'));
        $config->save();
        return parent::submitForm($form, $form_state);
    }

    /**
    * {@inheritdoc}
    */
    protected function getEditableConfigNames() {
        return [
        'gherkin.settings',
        ];
    }

    
}