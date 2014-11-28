<div class="sidebar pure-u-1 pure-u-md-1-4">
    <div class="header">
        <img class="site_img" src="https://graph.facebook.com/v2.0/296296863875710/picture?width=256&amp;height=256" alt="mainimage">
        <h1 class="brand-title">
            <?= $setting['Setting']['site_name'];?>
        </h1>
        <nav class="nav">

            <ul class="nav-list">
                <li class="nav-item">
                    <a class="pure-button" href="http://twitter.com/webuilder240com">Twitter</a>
                </li>
                <li class="nav-item">
                    <a class="pure-button" href="http://github.com/oh240">Github</a>
                </li>
            </ul>
        </nav>
        <ul class="sidebar_lists">
            <li class="sidebar_category_title">Category</li>
            <?php foreach ($sidebar_categories as $sidebar_category) :?>
                <li class="sidebar_lists_caterogy">
                    <?=
                        $this->Html->link($sidebar_category['Category']['name'],[
                            'action' => '/',
                            '?' => [
                                'cat' => $sidebar_category['Category']['id']
                            ]
                        ]);
                    ?>
                </li>
            <?php endforeach;?>
        </ul>

        <ul class="sidebar_lists">
            <li class="sidebar_category_title">Tools</li>

            <li class="sidebar_tools_login">
                <?=
                    $this->Html->link('ログインする',[
                        'controller' => 'simpleradmin',
                        'action' => 'login'
                    ]);
                ?>
            </li>
        </ul>
    </div>
</div>