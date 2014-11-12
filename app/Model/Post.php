<?php
App::uses('AppModel', 'Model');

/**
 * Post Model
 *
 * @property Category $Category
 */
class Post extends AppModel
{

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array();

    public $belongsTo = [
        'Category' => [
            'counterCache' => [
                'count' => [
                    'Post.published' => 1,
                ],
            ],
        ]
    ];

    function findByArticleId($id = null)
    {
        return $this->find('first', [
            'conditions' => [
                'id' => $id,
                'published' => 1
            ]
        ]);
    }

    function findByRecentArticles()
    {
        return $this->find('all', [
            'conditions' => [
                'published' => 1
            ],
            'limit' => 5,
            'order' => [
                'Post.created DESC',
            ]
        ]);
    }

    /**
     * 余計な記号を取り除いて、月別の検索ができるようにする。
     * @param $date
     * @return mixed
     */
    function dateTrimSymbole($date)
    {
        $date = str_replace(['-', '/'], '', $date);
        return $date;
    }

    //アーカイブデータのために月別の集計を計測します。
    function countDatePosts($archive)
    {
        $count = $this->find('count', [
            'conditions' => [
                'Post.published' => 1,
                'DATE_FORMAT(release_date,"%Y%m")' => $archive['Archive']['year'] . $archive['Archive']['month']
            ],
            'callbacks' => false,
        ]);

        return $count;
    }

    function returnFilterType($filter_query)
    {
        switch ($filter_query){
            case 'draft':
                return false;

            case 'public':
                return true;

            default:
                return false;
        }
    }
}
