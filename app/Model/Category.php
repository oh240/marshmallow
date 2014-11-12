<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Post $Post
 */
class Category extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
//	public $hasMany = array(
//		'Post' => array(
//			'className' => 'Post',
//			'foreignKey' => 'category_id',
//			'dependent' => false,
//			'conditions' => '',
//			'fields' => '',
//			'order' => '',
//			'limit' => '',
//			'offset' => '',
//			'exclusive' => '',
//			'finderQuery' => '',
//			'counterQuery' => ''
//		)
//	);

    function returnSelectLists()
    {

        $categories = $this->find('all',[
            'fields' => [
                'id',
                'name',
            ]
        ]);

        $category_list[] = [
            'name' => '未選択',
            'value' => 0,
        ];

        foreach ($categories as $category) {

            $category_list[] = [
                'name' => $category['Category']['name'],
                'value' => $category['Category']['id']
            ];
        }

        return $category_list;
    }

}
