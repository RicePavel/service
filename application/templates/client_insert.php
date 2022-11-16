<?php include_once 'header.php';?>

<h1>Добавить клиента</h1>

<?= View::errorMessage($error) ?>

<form method="POST">
	<?= Form::routeInputs("client", "insert") ?>
	Фамилия*:<br/>
	<input type="text" required name="surname" value='<?= $_REQUEST['surname']?>'><br/><br/>
	Имя*:<br/>
	<input type="text" required name="name" value='<?= $_REQUEST['name']?>'><br/><br/>
	Отчество:<br/>
	<input type="text" name="middlename" value='<?= $_REQUEST['middlename']?>'><br/><br/>
	Телефон:<br/>
	<input type="text" name="phone" value='<?= $_REQUEST['phone']?>'><br/><br/>
	Рекламный источник:<br/>
	<select name="source_advert_id">
		<option value="" >--</option>
		<?php foreach ($sourceList as $source) { ?>
			<option value="<?= $source['id'] ?>"><?= $source['name'] ?></option>
		<?php } ?>
	</select><br/><br/>
	<input type="submit" name="send_form" value="Добавить" />
</form>