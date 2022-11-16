<?php include_once 'header.php';?>

<h1>Добавить клиента</h1>

<?= View::errorMessage($error) ?>

<form method="POST" class="form_with_fields">
	<?= Form::routeInputs("client", "insert") ?>
	
	<div class="mb-3">
		<label class="form-label">Фамилия*:</label>
		<input class="form-control" type="text" required name="surname" value='<?= $_REQUEST['surname']?>'>
	</div>
	
	<div class="mb-3">
		<label class="form-label">Имя*:</label>
		<input class="form-control" type="text" required name="name" value='<?= $_REQUEST['name']?>'>
	</div>
	
	<div class="mb-3">
		<label class="form-label">Отчество:</label>
		<input class="form-control" type="text" name="middlename" value='<?= $_REQUEST['middlename']?>'>
	</div>
	
	<div class="mb-3">
		<label class="form-label">Телефон:</label>
		<input class="form-control" type="text" name="phone" value='<?= $_REQUEST['phone']?>'>
	</div>
	
	<div class="mb-3">
		<label class="form-label">Рекламный источник:</label>
		<select class="form-select" name="source_advert_id">
			<option value="" >--</option>
			<?php foreach ($sourceList as $source) { ?>
				<option value="<?= $source['id'] ?>"><?= $source['name'] ?></option>
			<?php } ?>
		</select>
	</div>
	
	<input class="btn btn-success" type="submit" name="send_form" value="Добавить" />
</form>

</body>
</html>