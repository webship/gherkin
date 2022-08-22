<?php

namespace Drupal\gherkin\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * @FieldWidget(
 *      id = "gherkin_default_widget",
 *      module = "gherkin",
 *      label = @Translation("Gherkin Script"),
 *      field_types = {
 *          "gherkin_script"
 *      }
 * )
 */

class GherkinDefaultwidget extends widgetBase   {
 
    public static function defaultSettings() {

        return [
        'size' => 15,
        'theme' => 'dark'
        ] + parent::defaultSettings();
    }

    public function settingsForm(array $form, FormStateInterface $form_state) {
        $element['size'] = [
          '#type' => 'number',
          '#title' => $this->t('Script area size:'),
          '#default_value' => $this->getSetting('size'),
          '#required' => TRUE,
          '#min' => 1,
        ];

        $config = \Drupal::config('gherkin.settings');

        $element['theme'] = [
            '#type' => 'select',
            '#title' => $this->t('Theme'),
            '#options' => $config->get('theme_list'),
            '#attributes' => [
            // 'style' => 'width: 150px;',
            ],
            '#default_value' => $this->getSetting('theme'),
        ];
        return $element;
      }

      public function settingsSummary() {
        $summary = [];
      
        $summary[] = $this->t('Script area size: @size', array('@size' => $this->getSetting('size')));
        $summary[] = $this->t('Theme: @theme', array('@theme' => $this->getSetting('theme')));
      
        return $summary;
      }
      
    public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $value = isset($items[$delta]->value) ? $items[$delta]->value : '';

    $AreaTheme = $this->getSetting('theme');
    
    // $behat_ui_steps_link = new Url('behat_ui.behat_dl');
    //   $form['behat_ui_new_scenario']['behat_ui_steps_link'] = [
    //     '#type' => 'markup',
    //     '#markup' => '<a class="button use-ajax"
    //           data-dialog-options="{&quot;width&quot;:500}" 
    //           data-dialog-renderer="off_canvas" 
    //           data-dialog-type="dialog"
    //           href="' . $this->currentRequest->getSchemeAndHttpHost() . $behat_ui_steps_link->toString() . '" >' . $this->t('Check available steps') . '</a>',
    //   ];

    $element['gherkin_feature_code'] = [
      '#id' => 'gherkin_feature_code',
      '#type' => 'textarea',
      '#Title' => $this->t('Gherkin Script:'),
      '#rows' => $this->getSetting('size'),
      '#resizable' => TRUE,
      '#attributes' => [
          'class' => [$AreaTheme],
          ],
      '#default_value' => $this->getFeature(),
    ];

    $element['gherkin_feature_code']['free_text_ace_editor'] = [
      '#type' => 'markup',
      '#markup' => '<div id="free_text_ace_editor">' . $this->getFeature() . '</div>',
    ];

    $element['#attached']['library'][] = 'gherkin/style';
    $element['#attached']['library'][] = 'gherkin/ace-editor';
    
    return ['value' => $element];
  }

  public function getFeature($feature_name = 'default.feature') {
    // $config = $this->configFactory->getEditable('gherkin.settings');

    // $behat_ui_behat_config_path = $config->get('behat_ui_behat_config_path');
    // $behat_ui_behat_features_path = $config->get('behat_ui_behat_features_path');

    // $default_feature_path = $behat_ui_behat_config_path . '/' . $behat_ui_behat_features_path . '/' . $feature_name;

    // if (file_exists($default_feature_path)) {
    //   return file_get_contents($default_feature_path);
    // }
    // else {
      return '
        Feature: Website requeirment: Website home page.
          As a visitor to the website 
          I want to navigate to the home page
          So that I will be able to see all homepage content

          @javascript @init @check
          Scenario: check the welcome message at the homepage
            Given I am an anonymous user
            When I go to the homepage
            Then I should see "No front page content has been created yet."
      ';
    // }

  }
}