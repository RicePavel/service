<?php include_once 'header.php';?>

<h1>Добавить рекламный источник</h1>

<form method="POST">
	<?= Form::routeInputs("sourceAdvert", "insert") ?>
	Название:<br/>
	<input type="text" name="name" required value='<?= $_REQUEST['name']?>'><br/><br/>
	<input type="submit" name="send_form" value="Добавить" />
</form>