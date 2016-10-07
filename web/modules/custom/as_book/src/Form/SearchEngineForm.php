<?php
namespace Drupal\core\ajax
namespace Drupal\as_book\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SearchEngineForm.
 *
 * @package Drupal\as_book\Form
 */
class SearchEngineForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'search_engine_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    //kint($form_state);
    $form['search'] = [
      '#type' => 'search',
      '#title' => $this->t('search'),
      '#ajax' => array(
        'callback' => 'Drupal\as_book\Form\SearchEngineForm::ajaxSearchCallback', // call bac whit namespace and class name and function
        'event' => 'keyup', // evenment javacript mouseover- mouse out .....
        'progess'=> array(
            'type'=> 'throbber',
            'message'=> 'loading....',
        ),
      ),
    ];

    $form['submit'] = [

    ];

    $form['submit'] = [
        '#type' => 'submit',
        '#value' => t('Search'),
    ];

    return $form;
  }


  public function ajaxSearchCallback(array $form, FormStateInterface $form_state){

    $keyword = $form_state->getValue('search');

    $query = \Drupal::entityQuery('node');
    $query->condition('type', 'as_book');
    $query->condition('status', 1);
    $query->condition('title', $_GET['keyword'],'CONTAINS');
    $query->sort('created', 'DESC');
    $query->range(0, 10);
    $result = $query->execute();

    $nodes = \Drupal\node\Entity\Node::loadMultiple($result);

    $books = [];
    foreach ($nodes as $node) {
      $books[] = node_view($node, 'teaser');
    }

    $renderable = [
      '#theme'=> 'book_listing',
      'books'=> $book,
    ]

    //return [
    //  '#theme' => 'book_listing',
    //  'books' => $books,
    //];

    $response = new AjaxResponse();
    $htmlCommand  = new HtmlCommand('div.region.region-content', $);
    return $response;

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
    $routeName = 'as_book.default_controller_searchEngine';
    $routePAram = [
      'keyword' => $form_state->getvalue('search'),
    ];
    $form_state->setRedirect($routeName, $routePAram);


    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
        drupal_set_message($key . ': ' . $value);
    }

  }

}
