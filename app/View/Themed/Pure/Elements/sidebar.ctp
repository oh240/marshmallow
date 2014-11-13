<div class="sidebar pure-u-1 pure-u-md-1-4">
    <div class="header">
        <img class="site_img" src="https://graph.facebook.com/v2.0/296296863875710/picture?width=256&amp;height=256" alt="mainimage">
        <h1 class="brand-title">
            <?= $setting['Setting']['site_name'];?>
        </h1>
        <nav class="nav">
            <ul class="nav-list">
                <li class="nav-item">
                    <a class="pure-button" href="http://purecss.io">Twitter</a>
                </li>
                <li class="nav-item">
                    <a class="pure-button" href="http://yuilibrary.com">Github</a>
                </li>
            </ul>
        </nav>
        <ul class="sidebar_lists">
            <li>php</li>
            <li>html</li>
            <li>others</li>
            <li>ログイン</li>
            <li>
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