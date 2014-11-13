<?php
App::uses('AppController', 'Controller');

/**
 * Posts Controller
 *
 */
class PostsController extends AppController
{

    public $components = [
        'Paginator',
        'RequestHandler'
    ];

    public $uses = ['Post', 'Setting','Archive'];
    public $helpers = ['Markdown.Markdown'];

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow();
        $setting = $this->Setting->find('first');
        $this->theme = 'SampleTheme';
        $this->layout = 'theme';
        $recent_posts = $this->Post->findByRecentArticles();

        $archives = $this->Archive->find('all',[
            'limit' => 5,
            'fields' => [
                'Archive.year',
                'Archive.month',
                'Archive.count'
            ]
        ]);

        $this->set(compact('recent_posts', 'setting', 'archives'));
        Configure::write('debug', 0);
    }

    /**
     * index action
     *
     * @return void
     */
    public function index()
    {
        $setting = $this->Setting->find('first');
        $this->set('title_for_layout', $setting['Setting']['site_name']);
        $this->set('meta_keyword', 'デフォルトのキーワード');
        $this->set('meta_description', 'デフォルトのディスクリプション');

        if (isset($this->request->query['month'])) {

            //月別のArchive
            $month = $this->Post->dateTrimSymbole($this->request->query['month']);

            $this->Paginator->settings = [
                'conditions' => [
                    'Post.published' => 1,
                    'DATE_FORMAT(Post.modified,"%Y%m")' => $month
                ],
                'order' => 'Post.release_date DESC',
                'limit' => 10,
            ];

        } else {

            $this->Paginator->settings = [
                'conditions' => [
                    'Post.published' => 1
                ],
                'order' => 'Post.release_date DESC',
                'limit' => 10,
            ];
        }

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

        if (!$post) {
            throw new NotFoundException("404");
        }

        $this->set('title_for_layout', $post['Post']['title']);
        $this->set('meta_keyword', $post['Post']['title']);
        $this->set('meta_description', $post['Post']['title']);

        $this->set(compact('post'));
    }

}
