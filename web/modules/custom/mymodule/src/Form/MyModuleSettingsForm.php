<?php

declare(strict_types = 1);


namespace Drupal\mymodule\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * @method t(string $string)
 * @method config(string $string)
 */
class MyModuleSettingsForm extends ConfigFormBase
{

  /**
   * {}
   */
  public function getFormId(): string
  {
    return 'mymodule_mymodule_settings';
  }

  /**
   * {}
   */
  protected function getEditableConfigNames(): array
  {
    return ['mymodule.settings'];
  }

  /**
   * {}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array
  {
    $form['example'] = [
      '#type'          => 'textfield',
      '#title'         => $this->t('Example'),
      '#default_value' => $this->config('mymodule.settings')->get('example'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void
  {
    if ($form_state->getValue('example') !== 'example') {
      $form_state->setErrorByName('example', $this->t('The value is not correct.'));
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void
  {
    $this->config('mymodule.settings')
      ->set('example', $form_state->getValue('example'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
