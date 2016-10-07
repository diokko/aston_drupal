<?php

namespace Drupal\as_book\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class BookReservationForm.
 *
 * @package Drupal\as_book\Form
 */
class BookReservationForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'book_reservation_form';
  }

  /**
   * va construire un form, pour l'afficher en html
   * $form : renderable_array
   * *for_state : etat du formulaire (post/get like). Objet
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {


    kint($form_state);

    kint($form);

    $user = \Drupal\entity::currentUser();

    $form['book_id'] = [
      '#type' => 'hidden',
      '#title' => $this->t('book_id'),
    ];
    $form['user_id'] = [
      '#type' => 'hidden',
      '#title' => $this->t('user_id'),
    ];

    $form['submit'] = [
        '#type' => 'submit',
        '#value' => t('Book me !'),
    ];

    return $form;
  }

  /**
    * validation du form
    * {@inheritdoc}
    */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * recuperation du form
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
        drupal_set_message($key . ': ' . $value);
    }

  }

}
