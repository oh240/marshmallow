<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 2014/11/08
 * Time: 0:39
 */

App::uses('File','Utility');

class AutoInstallController extends AutoInstallAppController
{
    public $name = 'AutoInstall';

    public $uses = [];

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
                    //copy(APP . 'Config' . DS . 'database.php.default', APP . 'Config' . DS . 'database.php');

                    //database.phpの内容を投げられた内容に修正する。
                    $file = new File(APP . 'Config' . DS . 'database.php.default');
                    $config_file = $file->read();
                    $config_file = str_replace('{insert_host}',$data['Db']['host'],$config_file);
                    $config_file = str_replace('{insert_database_name}',$data['Db']['database_name'],$config_file);
                    $config_file = str_replace('{insert_user_name}',$data['Db']['user_name'],$config_file);
                    $config_file = str_replace('{insert_user_password}',$data['Db']['user_password'],$config_file);

                    //テストファイルを保存
                    file_put_contents(APP. 'Config' . DS . 'database.php.test',$config_file);

    //                $this->redirect([
    //                    'controller' => 'auto_install',
    //                    'action' => 'set_user',
    //                    'plugin' => 'auto_install'
    //                ]);

            } else {
                // 接続失敗したらfalseを返す。
                return false;
            }
        }
    }

    private function _dbcheck($data)
    {
        //勝手に例外が投げられるので、こっちで用意したいエラーにしたい気もする。
        $dbh = new PDO("mysql:host={$data['Db']['host']};dbname={$data['Db']['database_name']}",$data['Db']['user_name'],$data['Db']['user_password']);
        debug($dbh);
        try {
            return true;
        } catch(PDOException $e) {
            //print "エラー:". $e->getMessage(). "<br>";
        }
    }

    /**
     * データベース・各テーブルの作成
     */
    public function db()
    {

        //渡された設定で接続できなければ接続を中断して、バリデーションエラーを出力する。

        //接続できたら、database.phpを作成する。

    }

    /**
     * ユーザーの初期設定
     */
    public function set_user()
    {
        if ($this->request->is('post')){
            //初期データの投入

            //処理成功時に完了画面を表示する
        }
    }

}
