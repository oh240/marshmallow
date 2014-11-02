<?php

App::uses('AppController', 'Controller');
/**
 * SimplerAdmin Controller
 *
 */
class SimplerAdminController extends AppController {

	public $uses = ['User','Post'];

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('user_add');

        $this->layout = 'simpleradmin';
	}

	public function user_add()
	{

		if ($this->request->is('post')){
			$this->User->create();

			if ($this->User->save($this->request->data)){

			}

			$this->redirect([
				'controller' => 'simpleradmin',
				'action' => 'login'
			]);
		}

	}

	public function login()
	{

		if ($this->Auth->login()){

			$this->redirect([
				'action' => 'index'
			]);

		}

	}

	public function logout()
	{
		if ($this->Auth->logout()){

			$this->redirect([
				'action' => 'login'
			]);
		}
	}

	public function index() 
	{

	}

    public function posts()
    {

    }

	public function add_posts()
	{

	}

    /**
     * 記事を公開するメソッド
     */
    public function publish_post()
    {
        if ($this->request->is('post')){

        }
    }

    /**
     * 下書き保存するメソッド
     */
    public function draft_posts()
    {

        if ($this->request->is('post')){

        }

    }

    /**
     * 編集を行うメソッド
     * @param $id
     */
	public function edit_posts($id)
	{
	
	}

	public function delete_posts()
	{

	}

    public function save_draft($id)
    {

    }

}
