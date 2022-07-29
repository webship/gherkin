<?php

namespace Drupal\gherkin\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
/**
 * @FieldWidget(
 *      id = "gherkin_default_widget",
 *      module = "gherkin",
 *      label = @Translation("Gherkin default"),
 *      field_types = {
 *          "gherkin_script"
 *      }
 * )
 */

class GherkinDefaultwidget extends widgetBase{
     /**
   * {@inheritdoc}
   */

    public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $value = isset($items[$delta]->value) ? $items[$delta]->value : '';
    $element += [
        '#type' => 'text_format',
        '#format' => 'full_html',
        '#default_value' => $value,
      ];
 
    return ['value' => $element];
  }
}