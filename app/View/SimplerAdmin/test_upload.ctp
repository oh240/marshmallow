
<?= 
	$this->Form->create(false,[
		'type' => 'file',
		'id' => 'UploadImg'
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
