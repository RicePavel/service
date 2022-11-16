<?php include_once 'header.php';?>

<h1>Обновить клиента</h1>

<?= View::errorMessage($error) ?>

<form method="POST">
	<?= Form::routeInputs("client", "update") ?>
	Фамилия*:<br/>
	<input type="text" required name="surname" value='<?= $row['surname']?>'><br/><br/>
	Имя*:<br/>
	<input type="text" required name="name" value='<?= $row['name']?>'><br/><br/>
	Отчество:<br/>
	<input type="text" name="middlename" value='<?= $row['middlename']?>'><br/><br/>
	Телефон:<br/>
	<input type="text" name="phone" value='<?= $row['phone']?>'><br/><br/>
	Рекламный источник:<br/>
	<select name="source_advert_id">
		<option value="" >--</option>
		<?php foreach ($sourceList as $source) { ?>
			<option <?= ($source['id'] == $row['source_advert_id']) ? 'selected' : '' ?> value="<?= $source['id'] ?>"><?= $source['name'] ?></option>
		<?php } ?>
	</select><br/><br/>
	
	
	<input type="hidden" name="id" value='<?= $row['id']?>'>
	<input type="submit" name="send_form" value="Обновить" />
</form>
