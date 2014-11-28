
<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class SplHelper extends Helper {

    public $helpers = ['Markdown.Markdown','Html'];

	public function date_format($datetime)
	{
		$format = 'Y/n/j H:i';
		return date($format,strtotime($datetime));
	}

	public function Ellipsis($string, $limit = 100)
	{
        $string = $this->Markdown->transform($string);
        $remove_tags_string = strip_tags($string);

        $tmp = mb_substr($remove_tags_string,0,$limit);

        if (mb_strlen($remove_tags_string) > $limit) {
            $tmp.=' ...';
        }

        return h($tmp);
	}

    public function echoPost($content)
    {
        $content = $this->Markdown->transform($content);
        $content = nl2br($content);
        return "<div id='spl_content_area'>{$content}</div>";
    }

    public function archiveLink($archive)
    {
        $link_text = "{$archive['Archive']['year']} / {$archive['Archive']['month']} ({$archive['Archive']['count']})";
        $text = $this->Html->link($link_text,[
            'controller' => '/',
            '?' => [
                'month' => $archive['Archive']['year'] . $archive['Archive']['month']
            ]
        ]);

        return $text;
    }

    public function previewLink($data)
    {
        if ($data['Post']['published']){
            return $this->Html->link('記事を確認する',[
                'controller' => 'posts',
                'action' => 'view',
                'id' => $data['Post']['id']
            ],[
                'class' => 'btn btn-success btn-sm post-form-preview-button fl-l',
                'role' => 'button',
                'target' => '_blink'
            ]);
        }

        return false;
    }

}
