<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 */
class PostsController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow();
	}

	public function index()
	{
	
	}

	public function view($id) 
	{
	
	}
}
