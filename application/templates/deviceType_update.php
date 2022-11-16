<?php include_once 'header.php';?>

<h1>Изменить тип устройства</h1>

<form method="POST">
	<?= Form::routeInputs("DeviceType", "update") ?>
	
	Название:<br/>
	<input type="text" name="name" required value='<?= $item['name']?>'><br/><br/>
	
	<input type="hidden" name="id" value='<?= $item['id']?>'>
	<input type="submit" name="send_form" value="Обновить" />
</form>