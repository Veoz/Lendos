<?php


namespace Drupal\lendos\Controller;


class Edit {

  /**
   * @param   int  $id
   *
   * @return array
   */
  public function edit($id = 0){
    //build form for edits comment
    $edit_lendos = \Drupal::formBuilder()->getform('Drupal\lendos\Form\Add', $id);
    //return theme for edits comment.
    return array(
      '#theme' => 'lendos_edit_theme',
      '#edit_lendos' => $edit_lendos,

    );
  }

}
