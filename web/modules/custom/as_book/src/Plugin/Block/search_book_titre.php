<?php

namespace Drupal\as_book\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'search_book_titre' block.
 *
 * @Block(
 *  id = "searc book",
 *  admin_label = @Translation("searchBookTitre"),
 * )
 */
class search_book_titre extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['searc book']['#markup'] = 'Implement search_book_titre.';
    return $build;
  }

}
