<?php
App::uses('AppModel', 'Model');

/**
 * Setting Model
 *
 */
class Setting extends AppModel
{

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'site_name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'サイト名は必ず入力してください',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'theme_name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'テーマは必ず指定してください。',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'email' => array(
            'Email' => array(
                'rule' => array('email'),
                'message' => '正しいメールアドレスを入力してください。',
                'allowEmpty' => true,
                'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );
}
