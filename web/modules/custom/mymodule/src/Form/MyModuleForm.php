<?php

declare(strict_types = 1);


namespace Drupal\mymodule\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class MyModuleForm extends FormBase
{

  protected AccountProxyInterface $currentUser;

  public function __construct(AccountProxyInterface $account_proxy)
  {
    $this->currentUser = $account_proxy;
  }

  public static function create(ContainerInterface $container): MyModuleForm|static
  {
    return new static(
      $container->get('current_user')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string
  {
    return 'mymodule_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array
  {
    $form['mymodule_name'] = [
      '#type'     => 'textfield',
      '#title'    => t('Enter Name:'),
      '#required' => true,
    ];
    $form['mymodule_rollno'] = [
      '#type'     => 'textfield',
      '#title'    => t('Enter Enrollment Number:'),
      '#required' => true,
    ];
    $form['mymodule_mail'] = [
      '#type'     => 'email',
      '#title'    => t('Enter Email ID:'),
      '#required' => true,
    ];
    $form['mymodule_phone'] = [
      '#type'  => 'tel',
      '#title' => t('Enter Contact Number'),
    ];
    $form['mymodule_dob'] = [
      '#type'     => 'date',
      '#title'    => t('Enter DOB:'),
      '#required' => true,
    ];
    $form['mymodule_gender'] = [
      '#type'    => 'select',
      '#title'   => ('Select Item:'),
      '#options' => [
        'Male'   => t('Item 1'),
        'Female' => t('Item 2'),
        'Other'  => t('Item 3'),
      ],
    ];

    $form['mymodule_message'] = [
      '#type'          => 'textarea',
      '#title'         => $this->t('Message'),
      '#required'      => true,
      '#default_value' => $this->currentUser->getAccountName(),
    ];

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type'        => 'submit',
      '#value'       => $this->t('Send'),
      '#button_type' => 'primary',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void
  {
    if (strlen($form_state->getValue('mymodule_rollno')) < 8) {
      $form_state->setErrorByName('mymodule_rollno', $this->t('Please enter a valid Enrollment Number'));
    }
    if (strlen($form_state->getValue('mymodule_phone')) < 10) {
      $form_state->setErrorByName('mymodule_phone', $this->t('Please enter a valid Contact Number'));
    }
    if (mb_strlen($form_state->getValue('mymodule_message')) < 10) {
      $form_state->setErrorByName('name', $this->t('Message should be at least 10 characters.'));
    }
  }

  public function submitForm(array &$form, FormStateInterface $form_state): void
  {
    \Drupal::messenger()->addMessage(t("Data Registration Done!!The message has been sent. Registered Values are:"));
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addMessage($key . ': ' . $value);
    }
  }
}
