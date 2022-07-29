<?php

namespace Drupal\gherkin\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * @FieldFormatter(
 *      id = "gherkin_default_formatter",
 *      module = "gherkin",
 *      label = @Translation("Gherkin"),
 *      field_types = {
 *          "gherkin_script"
 *      }
 * )
 */

 class GherkinDefaultFormatter extends FormatterBase{
    
    public function viewElements(FieldItemListInterface $items, $langcode) {
        $elements = [];
        foreach ($items as $delta => $item) {
            // Render each element as markup.
            $element[$delta] = ['#markup' => $item->value];
          }
    
        return $elements;
      }
 }