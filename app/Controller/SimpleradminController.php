<?php

App::uses('AppController', 'Controller');
App::uses('File', 'Utility');

/**
 * SimplerAdmin Controller
 *
 */
class SimpleradminController extends AppController
{

    public $uses = ['User', 'Post', 'Setting', 'Img', 'Archive'];

    public $components = array(
        'Paginator',
        'RequestHandler'
    );

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('user_add');
        $this->layout = 'simpleradmin';
        $setting = $this->Setting->find('first');
        $this->set('title_for_layout', $setting['Setting']['site_name']);
    }

    public function user_add()
    {

        if ($this->request->is('post')) {
            $this->User->create();

            if ($this->User->save($this->request->data)) {

            }

            $this->redirect([
                'action' => 'login'
            ]);
        }

    }

    public function login()
    {
        $this->set('title_for_layout', 'Simpler管理ツール');
        $this->set('action_name', 'ログイン');
        if ($this->Auth->login()) {
            $this->redirect([
                'action' => 'index'
            ]);
        }

    }

    public function logout()
    {
        if ($this->Auth->logout()) {
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
        $this->set('action_name', '記事の一覧');

        $this->Paginator->settings = [
            'order' => 'Post.created DESC',
            'limit' => 25,
        ];

        $posts = $this->paginate('Post');
        $this->set(compact('posts'));
    }

    public function add_post()
    {
        $this->set('action_name', '記事の新規投稿');
        if ($this->request->is('post')) {
            $this->Post->create();
            if (isset($this->params['data']['publish'])) {
                $this->_publish_post($this->request->data);
            } else {
                $this->_draft_posts($this->request->data);
            }

            //投稿した編集ページにリダイレクトするように修正する
            $this->redirect([
                'action' => 'edit_post', 'id' => $this->Post->getLastInsertId()
            ]);
        }

    }

    /**
     * 記事を公開するメソッド
     */
    private function _publish_post($data)
    {
        $data['Post']['published'] = true;
        $release_date = time();
        $data['Post']['release_date'] = date('Y-m-d H:i:s', $release_date);
        $archive['Archive']['year'] = date('Y', $release_date);
        $archive['Archive']['month'] = date('m', $release_date);

        if ($this->Post->save($data)) {
            if ($update_archive = $this->Archive->getCountId($release_date)) {
                $this->Archive->id = $update_archive['Archive']['id'];
                $count = $this->Post->countDatePosts($archive);
                $this->Archive->saveField('count', $count);
            } else {
                $this->Archive->create();
                $archive['Archive']['count'] = 1;
                $this->Archive->save($archive);
            }

            $this->Session->setFlash('記事の公開が完了しました', 'Flash/success');

        } else {
            $this->Session->setFlash('記事の公開が失敗しました。入力内容を確認して下さい。', 'Flash/error');
        }

    }

    /**
     * 下書き保存するメソッド
     */
    private function _draft_posts($data)
    {
        $data['Post']['published'] = false;
        if ($this->Post->save($data)) {
            $this->Session->setFlash('下書き保存を完了しました。', 'Flash/success');
        } else {
            $this->Session->setFlash('記事の下書き保存に失敗しました。入力内容を確認して下さい。', 'Flash/error');
        }

    }

    /**
     * 編集を行うメソッド
     * @param $id
     */
    public function edit_post($id = null)
    {

        $this->set('action_name', '記事の編集');
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Post->id = $id;
            if (isset($this->params['data']['publish'])) {
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
        if ($this->request->is('post')) {

            $post = $this->Post->find('first', [
                'conditions' => [
                    'id' => $id
                ],
                'fields' => [
                    'release_date',
                ],
                'callbacks' => false,
            ]);

            $this->Post->id = $id;

            if ($this->Post->delete()) {

                $this->Post->cacheQueries = false;


                $release_date = strtotime($post['Post']['release_date']);
                $archive['Archive']['year'] = date('Y',$release_date);
                $archive['Archive']['month'] = date('m', $release_date);

                if ($update_archive = $this->Archive->getCountId($release_date)) {
                    $this->Archive->id = $update_archive['Archive']['id'];
                    $count = $this->Post->countDatePosts($archive);
                    $this->Archive->saveField('count', $count);
                }
                $this->Session->setFlash('記事の削除が完了しました', 'Flash/success');

            } else {
                $this->Session->setFlash('記事の削除が完了しました', 'Flash/error');
            }

        }

        $this->redirect(['action' => 'posts']);
    }

    public function setting()
    {
        $this->set('action_name', 'サイト設定');
        if ($this->request->is('post') || $this->request->is('put')) {

            $setting = $this->Setting->find('first', [
                'fields' => [
                    'id'
                ]
            ]);

            $this->Setting->id = $setting['Setting']['id'];

            if ($this->Setting->save($this->request->data)) {
                $this->Session->setFlash('設定の保存が完了しました。', 'Flash/success');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash('設定の保存が失敗しました。', 'Flash/error');
            }

        } else {
            $this->request->data = $this->Setting->find('first');
        }
    }

    public function ajax_img_load()
    {

        $this->autoRender = false;
        $this->autoLayout = false;

        if ($this->request->is('ajax')) {

            $imgs = $this->Img->find('all', [
                'fields' => [
                    'name'
                ],
                'limit' => 6
            ]);

            foreach ($imgs as $key => $img) {
                $imgs[$key]['Img']['name'] = FULL_BASE_URL . DS . 'files' . DS . $img['Img']['name'];
            }

            echo json_encode($imgs);
            exit;
        }
    }

    public function ajax_img_upload()
    {
        $this->autoRender = false;
        $this->autoLayout = false;

        if ($this->request->is('ajax')) {

            $mime_type = $this->Img->getMimeType($this->request->data['Img']['type']);
            $name = $this->Img->getUniqueId() . $mime_type;

            move_uploaded_file($this->request->data['Img']['tmp_name'], POSTIMAGES . $name);

            $this->Img->create();
            $img_db_data['Img']['name'] = $name;
            $img_db_data['Img']['size'] = $this->request->data['Img']['size'];

            if ($this->Img->save($img_db_data)) {
                //生成したファイル名を返す。
                echo json_encode(FULL_BASE_URL . DS . 'files' . DS . $img_db_data['Img']['name']);
            }
            exit;
        }
    }

}
