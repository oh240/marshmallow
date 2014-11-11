<?php
App::uses('AppModel', 'Model');
/**
 * Archive Model
 *
 */
class Archive extends AppModel 
{
	function getCountId($release_date)
	{
		$year = date('Y', $release_date);
		$month = date('m', $release_date);

		$current_archive = $this->find('first',[
			'conditions' => [
				'Archive.year' => $year,
				'Archive.month' => $month
			],
			'fields' => [
				'id',
				'count'
			]
		]);

		if ($current_archive){
			return $current_archive;
		}

		return false;
	}

}
