<?php


namespace Drupal\lendos\Controller;


class Remove {

  /**
   * @param   int  $id
   *
   * @return array
   */
  public function remove($id = 0){
    //take id of comment
    //build form for remove comment
    $remove_lendos = \Drupal::formBuilder()->getform('Drupal\lendos\Form\Remove', $id);
    // return theme and form for remove
    return array(
      '#theme' => 'lendos_remove_theme',
      '#remove_lendos' => $remove_lendos,
    );

  }

}
