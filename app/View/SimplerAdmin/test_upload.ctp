
<?= 
	$this->Form->create('Img',[
		'type' => 'file'
	]);
?>

<?php
	echo $this->Form->input(false, array(
		'type' => 'file',
		'label' => '画像を選択'
	));
?>

<?= 
	$this->Form->submit('送信',[
		'class' => 'btn btn-primary'
	]);
?>

<?= $this->Form->end();?>
