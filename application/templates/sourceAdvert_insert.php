<?php include_once 'header.php';?>

<h1>Добавить рекламный источник</h1>

<form method="POST" class="form_with_fields" >
	<?= Form::routeInputs("sourceAdvert", "insert") ?>
	
	<div class="mb-3">
		<label class="form-label">Название:</label>
		<input class="form-control" type="text" name="name" required value='<?= $_REQUEST['name']?>'>
	</div>
	
	<input class="btn btn-success" type="submit" name="send_form" value="Добавить" />
</form>

</body>
</html>