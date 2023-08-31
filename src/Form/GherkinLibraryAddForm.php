<?php

namespace Drupal\gherkin\Form;

use Drupal\Component\Utility\UrlHelper;
use Drupal\Core\Entity\Element\EntityAutocomplete;
use Drupal\Core\Form\FormBuilderInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\link\LinkItemInterface;
use Drupal\media\MediaTypeInterface;
use Drupal\media_library\Form\AddFormBase;

/**
 * Creates a form to add media entity link in Media Library.
 */
class GherkinLibraryAddForm extends AddFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'gherkin_media_library_add';
  }

  /**
   * {@inheritdoc}
   */
  protected function buildInputElement(array $form, FormStateInterface $form_state) {
    $media_type = $this->getMediaType($form_state);

    $form['container'] = [
      '#type' => 'container',
      '#title' => $this->t('Add @type', [
        '@type' => $media_type->label(),
      ]),
    ];
    $form['container']['feature'] = [
      '#type' => 'text_long',
      '#title' => $this->t('Feature'),
      '#required' => TRUE,
      '#element_validate' => [[static::class, 'validateUriElement']],
      '#feature_type' => $this->getSourceFieldDefinition($media_type)->getSetting('feature_type'),
    ];
    
    return $form;
   }

  /**
   * Returns the definition of the source field for a media type.
   *
   * @param \Drupal\media\MediaTypeInterface $media_type
   *   The media type to get the source definition for.
   *
   * @return \Drupal\Core\Field\FieldDefinitionInterface|null
   *   The field definition.
   */
  protected function getSourceFieldDefinition(MediaTypeInterface $media_type) {
    return $media_type->getSource()->getSourceFieldDefinition($media_type);
  }

}
