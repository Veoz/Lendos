<?php


namespace Drupal\lendos\Form;


use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class Remove extends FormBase {
  public function getFormId() {
    return 'remove_lendos';
  }

  /**
   * @param   array                                 $form
   * @param   \Drupal\Core\Form\FormStateInterface  $form_state
   * @param   int                                   $id
   *
   * @return array
   */
  public function buildForm(array $form, FormStateInterface $form_state, $id = 0) {
// create button for delete comment by id
    $query = \Drupal::database()->select('a_lendos', 'n');
    $query->fields('n', ['id']);
    $query->condition('id', $id, '=');
    $result = $query->execute()->fetchAll();


    foreach ($result as $value) {
      $edit = [
        'id' => $value->id,
      ];
    }
    $form_state->set('Comment_id', $edit['id']);


    $form['actions']['submit'] = [
      '#type'  => 'submit',
      '#name'  => 'submit',
      '#value' => 'Видалити',
    ];
    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  /**
   * @param   array                                 $form
   * @param   \Drupal\Core\Form\FormStateInterface  $form_state
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $id = $form_state->get('Comment_id');
    $query = \Drupal::database()->delete('a_lendos');
    $query->condition('id', $id , '=');
    $query->execute();
    $form_state->setRedirect('lendos.first_page');
  }
}
