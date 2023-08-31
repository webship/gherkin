<?php

namespace Drupal\gherkin\Plugin\media\Source;

use Drupal\Core\Entity\Display\EntityViewDisplayInterface;
use Drupal\media\MediaTypeInterface;
use Drupal\media\MediaSourceBase;

/**
 * Media source wrapping around link media entity fields.
 *
 * @see \Drupal\file\FileInterface
 *
 * @MediaSource(
 *   id = "gherkin",
 *   label = @Translation("Gherkin Script"),
 *   description = @Translation("Use gherkin script for reusable media."),
 *   allowed_field_types = {"text_long"}
 * )
 */
class GherkinScript extends MediaSourceBase {

  /**
   * {@inheritdoc}
   */
  public function getMetadataAttributes() {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function createSourceField(MediaTypeInterface $type) {
    return parent::createSourceField($type)->set('label', 'Gherkin Script');
  }

  /**
   * {@inheritdoc}
   */
  public function prepareViewDisplay(MediaTypeInterface $type, EntityViewDisplayInterface $display) {
    $display->setComponent($this->getSourceFieldDefinition($type)->getName(), [
      'type' => 'text_long',
      'label' => 'hidden',
    ]);
  }

}
