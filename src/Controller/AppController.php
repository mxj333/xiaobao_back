<?php
namespace App\Controller;

class AppController extends \Cake\Controller\Controller {

    use \Crud\Controller\ControllerTrait;

    public function beforeFilter(\Cake\Event\Event $event) {
        $this->Crud->mapAction('index', 'Crud.Index');
    }

  public $components = [
    'Crud.Crud' => [
      'actions' => [
        'Crud.Index',
        'Crud.Add',
        'Crud.Edit',
        'Crud.View',
        'Crud.Delete'
      ]
    ]
  ];
}