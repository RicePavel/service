<?php include_once 'header.php';?>

<h1>Добавить тип устройства</h1>

<form method="POST">
	<?= Form::routeInputs("DeviceType", "insert") ?>
	Название:<br/>
	<input type="text" name="name" required value='<?= $_REQUEST['name']?>'><br/><br/>
	<input type="submit" name="send_form" value="Добавить" />
</form>