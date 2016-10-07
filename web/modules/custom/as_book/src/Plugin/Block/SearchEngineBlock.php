<?php

namespace Drupal\as_book\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'SearchEngineBlock' block.
 *
 * @Block(
 *  id = "search_engine_block",
 *  admin_label = @Translation("Search engine block"),
 * )
 */
class SearchEngineBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('\Drupal\as_book\Form\SearchEngineForm');
    $build = [];
    $build['search_engine_block']= $form ;

    return $build;
  }

}
