<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 2014/11/08
 * Time: 0:39
 */

class AutoInstallController extends AutoInstallAppController
{
    public $name = 'AutoInstall';

    public $uses = [];

    public function beforeFilter()
    {
        parent::beforeFilter();
    }

    /**
     * ファイルの権限修正・作成
     */
    public function file()
    {

    }

    /**
     * データベース・各テーブルの作成
     */
    public function db()
    {

    }

    /**
     * ユーザーの初期設定
     */
    public function setuser()
    {


    }

    /**
     * 終了後の画面
     */
    public function completed()
    {

    }
}