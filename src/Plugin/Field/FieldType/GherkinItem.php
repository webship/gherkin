<?php

namespace Drupal\gherkin\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * @FieldType(
 *      id = "gherkin_script",
 *      module = "gherkin",
 *      label = @Translation("Gherkin Script"),
 *      default_formatter = "gherkin_default_formatter",
 *      default_widget = "gherkin_default_widget"
 * )
 */

class GherkinItem extends FieldItemBase {
    
     /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'value' => [
          'type' => 'text',
          'size' => 'medium',
          'not null' => FALSE,
        ],
      ],
    ];
  }
  
    public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition){
        $properties['value'] = DataDefinition::create('string')
            ->setLabel(t('Gherkin Script'));
    }

  
}