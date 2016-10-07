<?php

namespace Drupal\as_book\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SearchBook.
 *
 * @package Drupal\as_book\Form
 */
class SearchBook extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'search_book';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    // $form['submit'] = [
    //     '#type' => 'submit',
    //     '#value' => t('Submit'),
    // ];
    // $form['search'] = [
    //     '#type' => 'search',
    //     '#title'=> 'find your book!!',
    // ]
    //
    // return $form;
  }

  /**
    * {@inheritdoc}
    */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
        drupal_set_message($key . ': ' . $value);
    }

  }

}
