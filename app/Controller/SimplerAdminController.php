<?php

App::uses('AppController', 'Controller');
/**
 * SimplerAdmin Controller
 *
 */
class SimplerAdminController extends AppController {

	public $uses = ['User','Post'];

    public $components = [
        'Paginator',
        'RequestHandler'
    ];

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
		$this->redirect([
			'action' => 'posts'
		]);
	}

    public function posts()
    {
        $this->Paginator->settings = [
            'order' => 'Post.created DESC',
            'limit' => 25,
        ];

        $posts = $this->paginate('Post');
        $this->set(compact('posts'));
    }

	public function add_post()
	{
        if ($this->request->is('post')){
            $this->Post->create();
            if(isset($this->params['data']['publish'])){
                $this->_publish_post($this->request->data);
            } else {
                $this->_draft_posts($this->request->data);
            }

            //投稿した編集ページにリダイレクトするように修正する
            $this->referer($this->referer());
        }

	}

    /**
     * 記事を公開するメソッド
     */
    private function _publish_post($data)
    {
        $data['Post']['published'] = true;
        if ($this->Post->save($data)){
            //下書き保存完了
            $this->Session->setFlash('記事の公開が完了しました','Flash/success');
        } else {
            //下書き保存失敗時
            $this->Session->setFlash('記事の公開が失敗しました。入力内容を確認して下さい。','Flash/error');
            //バリデーションでエラーに成ったらエラーを返す。
        }

    }

    /**
     * 下書き保存するメソッド
     */
    private function _draft_posts($data)
    {
        $data['Post']['published'] = false;
        if ($this->Post->save($data)){
            //下書き保存完了時
            $this->Session->setFlash('下書き保存を完了しました。','Flash/success');
        } else {
            //下書き保存失敗時
            $this->Session->setFlash('記事の下書き保存に失敗しました。入力内容を確認して下さい。','Flash/error');

        }

    }

    /**
     * 編集を行うメソッド
     * @param $id
     */
	public function edit_post($id = null)
	{
        if ($this->request->is('post') || $this->request->is('put')){
            $this->Post->id = $id;
            if(isset($this->params['data']['publish'])){
                $this->_publish_post($this->request->data);
            } else {
                $this->_draft_posts($this->request->data);
            }

            $this->redirect($this->referer());

        } else {

            $this->request->data = $this->Post->findById($id);
        }
	
	}

	public function post_delete($id = null)
	{
        if ($this->request->is('post')){

            $this->Post->id = $id;
            if($this->Post->delete()){
				$this->Session->setFlash('記事の削除が完了しました','Flash/success');
			} else {
				$this->Session->setFlash('記事の削除が完了しました','Flash/error');
			}

        }

		$this->redirect(['action' => 'posts']);
	}

    public function save_draft($id)
    {

    }

	public function setting()
	{
	
	}

}
