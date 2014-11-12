<ul class="nav nav-pills" role="tablist">
    <li role="presentation" <?= !$filter_type ? "class='active'" : "";  ?>>
        <?=
            $this->Html->link("<span class='glyphicon glyphicon-list-alt'></span> すべての投稿 ( $all_count )",[
                'action' => 'posts',
            ],[
                'escape' => false,
            ]);
        ?>
    </li>
    <li role="presentation" <?= $filter_type == 'public' ? "class='active'" : "";  ?>>
        <?=
            $this->Html->link("<span class='glyphicon glyphicon-globe'></span> 公開済みの記事 ( $public_count )",[
                'action' => 'posts',
                '?' => [
                    'type' => 'public'
                ]
            ],[
                'escape' => false,
            ]);
        ?>
    </li>
    <li role="presentation" <?= $filter_type == 'draft' ? "class='active'" : "";  ?>>
        <?=
            $this->Html->link("<span class='glyphicon glyphicon-eye-close'></span> 下書きの記事 ( $draft_count )",[
                'action' => 'posts',
                '?' => [
                    'type' => 'draft'
                ]
            ],[
                'escape' => false,
            ]);
        ?>
    </li>
</ul>
