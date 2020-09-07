<?php

namespace Drupal\lendos\Controller;

use Drupal\Core\Controller\ControllerBase;

class Lendos extends ControllerBase {

  /**
   * @return array
   */
  public function get_all() {

    global $base_url;

    $lendos = [];

    // print all comments
    $query = \Drupal::database()->select('a_lendos', 'n');
    $query->fields('n', ['name', 'mail', 'tell', 'text', 'img','date_create','avatar','id']);
    $query->orderBy('date_create','DESC' );
    $result = $query->execute()->fetchAll();


    foreach ($result as $row) {
      array_push($lendos, [
        'id' => $row->id,
        'name' => $row->name,
        'text' => $row->text,
        'tell' => $row->tell,
        'mail' => $row->mail,
        'img'  => $row->img,
        'date' => $row->date_create,
        'avatar' => $row->avatar,
      ]);
    }
    //create transport array
    $data        = [
      'title'  => 'LENDOS',
      'lendos' => $lendos,
    ];
     //build form for adds comment
    $add_lendos = \Drupal::formBuilder()->getform('Drupal\lendos\Form\Add');
    // return theme and comments for print
    return [
      '#theme'       => 'lendos_theme',
      '#data'        => $data,
      '#base_url'    => $base_url,
      '#add_lendos' => $add_lendos,
    ];

  }
}


