<?php include_once 'header.php';?>

<h1>Изменить тип устройства</h1>

<form method="POST" class="form_with_fields" >
	<?= Form::routeInputs("DeviceType", "update") ?>
	
	<div class="mb-3">
		<label class="form-label">Название:</label>
		<input class="form-control" type="text" name="name" required value='<?= $item['name']?>'>
	</div>
	
	<input type="hidden" name="id" value='<?= $item['id']?>'>
	<input class="btn btn-success" type="submit" name="send_form" value="Обновить" />
</form>

</body>
</html>