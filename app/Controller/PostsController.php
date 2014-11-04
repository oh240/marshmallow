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
		$setting = $this->Setting->find('first');
		$this->theme = 'SampleTheme';
		$this->layout = 'theme';
		Configure::write('debug', 2);
		$recent_posts = $this->Post->findByRecentArticles();
		$this->set(compact('recent_posts','setting'));
	}

	/**
	 *
	 *
	 */
	public function index()
	{
		$setting = $this->Setting->find('first');
		$this->set('title_for_layout',$setting['Setting']['site_name']);
		$this->set('meta_keyword','デフォルトのキーワード');
		$this->set('meta_description','デフォルトのディスクリプション');
		$this->Paginator->settings = [
			'conditions' => [
				'Post.published' => 1
			],
            'order' => 'Post.release_date DESC',
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

		if (!$post){
			throw new NotFoundException("404");
		}

		$this->set('title_for_layout',$post['Post']['title']);
		$this->set('meta_keyword',$post['Post']['title']);
		$this->set('meta_description',$post['Post']['title']);

		$this->set(compact('post'));
	}

}
