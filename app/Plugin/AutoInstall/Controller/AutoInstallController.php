<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 2014/11/08
 * Time: 0:39
 */

App::uses('File', 'Utility');

/**
 *
 *
 */
class AutoInstallController extends AutoInstallAppController
{
    public $name = 'AutoInstall';

    public $uses = ['User', 'Post', 'Setting'];

    public $components = [
        'Auth',
    ];

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    /**
     * ファイルの権限修正・作成
     */
    public function index()
    {
        //tmp以下のファイルが存在しない場合は作成する。

        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;

            $db_check = $this->_dbcheck($data);
            //DBに接続
            if ($db_check) {
                //database.phpを作成 / 挙動が変わってしまうので書き込みは要検討
                copy(APP . 'Config' . DS . 'database.php.default', APP . 'Config' . DS . 'database.php');

                //database.phpの内容を投げられた内容に修正する。
                $file = new File(APP . 'Config' . DS . 'database.php');
                $config_file = $file->read();
                $config_file = str_replace('{insert_host}', $data['Db']['host'], $config_file);
                $config_file = str_replace('{insert_database_name}', $data['Db']['database_name'], $config_file);
                $config_file = str_replace('{insert_user_name}', $data['Db']['user_name'], $config_file);
                $config_file = str_replace('{insert_user_password}', $data['Db']['user_password'], $config_file);

                //テストファイルを保存
                file_put_contents(APP . 'Config' . DS . 'database.php', $config_file);

                //各テーブルを作成する。
                App::import('Model', 'ConnectionManager');
                $db = ConnectionManager::getDataSource('default');

                if ($db->isConnected()){
                    $this->_runInitSql($db);
                    $this->redirect(['action' => 'set_user']);
                } else {
                    $this->Session->setFlash('接続に失敗しました。入力項目を確認して下さい。','Flash/error');
                }

            } else {
                // 接続失敗したらfalseを返す。
                return false;
            }
        }
    }

    private function _runInitSql($db)
    {
        $query_data = file_get_contents( APP . 'Config' . DS .'Sql' . DS .'init.sql');

        $query_data = explode(';', $query_data);

        foreach ($query_data as $sql_query) {
            if (trim($sql_query) != ''){
                $db->query($sql_query);
            }
        }

        Cache::clear(false, '_cake_model_');
    }

    private function _dbcheck($data)
    {
        //勝手に例外が投げられるので、こっちで用意したいエラーにしたい気もする。
        $dbh = new PDO("mysql:host={$data['Db']['host']};dbname={$data['Db']['database_name']}", $data['Db']['user_name'], $data['Db']['user_password']);
        try {
            return true;
        } catch (PDOException $e) {
            //print "エラー:". $e->getMessage(). "<br>";
        }
    }

    /**
     * ユーザーの初期設定
     */
    public function set_user()
    {
        if ($this->request->is('post')) {
            $this->_initData($this->request->data);
            $this->redirect(['action' => 'completed']);
        }
    }

    private function _initData($data)
    {


        //初期データの投入
        $this->User->create();
        $this->User->save($data);

        $post_recode = [
            'Post' => [
                [
                    'title' => 'Hello World',
                    'body' => 'この記事を編集して、Simplerを本格的に開始しましょう。',
                    'published' => 1,
                    'created' => '2014-11-04 21:13:00',
                    'modified' => '2014-11-04 21:13:00',
                ]
            ],
        ];

        $this->Post->create();
        $this->Post->save($post_recode);

        $setting_record = [
            'Setting' => [
                [
                    'site_name' => 'Simpler Blog',
                    'theme_name' => 'Sample Theme',
                    'email' => 'exmaple@xxx.com'
                ],
            ]
        ];
        $this->Setting->create();
        $this->Setting->save($setting_record);
    }

    public function completed()
    {
        if($this->request->is('post')){

            App::uses('Folder','Utility');

            $this->folder = new Folder();
            $this->folder->delete( APP . DS . 'Plugin' . DS . 'AutoInstall');

            Cache::clear(false, '_cake_core_');
            $this->redirect([
                'plugin' => null,
                'controller' => 'simpleradmin',
                'action' => 'login'
            ]);
        }
    }

}
