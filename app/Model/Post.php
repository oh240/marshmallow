<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 * @property Category $Category
 */
class Post extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(

	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	//

	function afterFind($results, $primary = false)
	{
		foreach ($results as $result){
			$result['Post']['body'] = nl2br($result['Post']['body']);
		}
		return $results;
	}

	function findByArticleId($id = null)
	{
		return $this->find('first',[
			'conditions' => [
				'id' => $id,
				'published' => 1
			]
		]);
	}
}
