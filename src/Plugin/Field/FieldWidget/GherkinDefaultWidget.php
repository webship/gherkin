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
      
        return $element;
      }

      public function settingsSummary() {
        $summary = [];
      
        $summary[] = $this->t('Script area size: @size', array('@size' => $this->getSetting('size')));
      
        return $summary;
      }
      
    public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $value = isset($items[$delta]->value) ? $items[$delta]->value : '';

    $element[] = [
        '#type' => 'textarea',
        '#Title' => 'Gherkin Script',
        '#rows' => $this->getSetting('size'),
        '#resizable' => TRUE,
        '#default_value' => $value,
      ];
 
    return ['value' => $element];
  }
}