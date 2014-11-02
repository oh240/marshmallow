<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 */
class PostsController extends AppController {

    public $components = [
        'Paginator',
        'RequestHandler'
    ];

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow();
		$this->theme = 'SampleTheme';
		$this->layout = 'theme';
		Configure::write('debug', 0);
	}

	/**
	 *
	 *
	 */
	public function index()
	{
        $this->Paginator->settings = [
            'order' => 'Post.created DESC',
            //'limit' => 10,
        ];

        $posts = $this->paginate('Post');
        $this->set(compact('posts'));
	}

	/**
	 *
	 *
	 */
	public function view($id) 
	{
		$post = $this->Post->findByArticleId($id);
		$this->set(compact('post'));
	}

}
