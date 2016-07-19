<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Catalogs Controller
 *
 * @property \App\Model\Table\CatalogsTable $Catalogs
 */
class HomeController extends AppController
{

    public $paginate = [
        'limit' => 1
    ];

    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }


    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->set('title', '');
        $this->viewBuilder()->layout('default.home');
        $this->loadModel('Subjects');
        $subjects = $this->Subjects->generate();

        $this->set('subjects', $subjects);
    }

   /**
     * start method
     *
     * @return void
     */
    public function start() {
        if (!is_weixin()) {
            echo header("Content-type: text/html; charset=utf-8"); 
            echo "请使用微信客户端打开！";
            exit;
        }
        $this->set('title', '');
        $this->viewBuilder()->layout('default.home');
        $this->loadModel('Subjects');
        $subjects = $this->Subjects->generate();

        $this->set('subjects', $subjects);
    }

    /**
     * gene method
     * 生成试卷
     * @return void
     */
    public function gene() {
        $this->autoRender = false;
        $this->loadModel('Subjects');
        $subjects = $this->Subjects->generate();               
        echo json_encode(compact('subjects'));

    }

    /**
     * exam method
     * 考试
     * @return void
     */
    public function exam() {
        $this->viewBuilder()->layout('default.home');
        $this->loadModel('Subjects');
        $this->set('subjects', array());
    }

    /**
     * done method
     * 查看答案
     * @return void
     */
    public function done() {
        $this->viewBuilder()->layout('default.home');
    }

    
}
