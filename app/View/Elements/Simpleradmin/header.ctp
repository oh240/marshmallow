<?php if ($this->Session->check('Auth.User.id')) :?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Simpler</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
				<li>
					<?= 
						$this->Html->link('ブログに戻る',[
							'controller' => '/'
						]);
					?>
				</li>
				<li>
					<?= 
						$this->Html->link('設定',[
							'action' => 'setting'
						]);
					?>
				</li>
				<li>
					<?= 
						$this->Html->link('ログアウト',[
							'action' => 'logout'
						]);
					?>
				</li>
            </ul>
        </div>
    </div>
</nav>
<?php endif;?>
