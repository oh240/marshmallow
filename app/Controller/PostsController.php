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

	public $uses = ['Post','Setting'];

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow();
		$setting = $this->Setting->find('all');

		$this->theme = $setting[2]['Setting']['value'];
		$this->layout = 'theme';

		Configure::write('debug', 0);
		$recent_posts = $this->Post->findByRecentArticles();
		$this->set(compact('recent_posts'));
	}

	/**
	 *
	 *
	 */
	public function index()
	{
		$this->Paginator->settings = [
			'conditions' => [
				'Post.published' => 1
			],
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
