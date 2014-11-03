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
		$this->set('title_for_layout','Sample Blog');
		$this->set('meta_keyword','デフォルトのキーワード');
		$this->set('meta_description','デフォルトのディスクリプション');
		$this->Paginator->settings = [
			'conditions' => [
				'Post.published' => 1
			],
            'order' => 'Post.created DESC',
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

		$this->set('title_for_layout',$post['Post']['title']);
		$this->set('meta_keyword',$post['Post']['title']);
		$this->set('meta_description',$post['Post']['title']);

		$this->set(compact('post'));
	}

}
