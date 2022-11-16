<?php include_once 'header.php';?>

<h1>Обновить клиента</h1>

<?= View::errorMessage($error) ?>

<form method="POST" class="form_with_fields">
	<?= Form::routeInputs("client", "update") ?>
	
	<div class="mb-3">
		<label class="form-label">Фамилия*:</label>
		<input class="form-control" type="text" required name="surname" value='<?= $row['surname']?>'>
	</div>
	
	<div class="mb-3">
		<label class="form-label">Имя*:</label>
		<input class="form-control" type="text" required name="name" value='<?= $row['name']?>'>
	</div>
	
	<div class="mb-3">
		<label class="form-label">Отчество:</label>
		<input class="form-control" type="text" name="middlename" value='<?= $row['middlename']?>'>
	</div>
	
	<div class="mb-3">
		<label class="form-label">Телефон:</label>
		<input class="form-control" type="text" name="phone" value='<?= $row['phone']?>'>
	</div>
	
	<div class="mb-3">
		<label class="form-label">Рекламный источник:</label>
		<select class="form-select" name="source_advert_id">
			<option value="" >--</option>
			<?php foreach ($sourceList as $source) { ?>
				<option <?= ($source['id'] == $row['source_advert_id']) ? 'selected' : '' ?> value="<?= $source['id'] ?>"><?= $source['name'] ?></option>
			<?php } ?>
		</select>
	</div>
	
	<input type="hidden" name="id" value='<?= $row['id']?>'>
	<input class="btn btn-success" type="submit" name="send_form" value="Обновить" />
</form>

</body>
</html>