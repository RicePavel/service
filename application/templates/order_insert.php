<?php include_once 'header.php';?>

<h1>Добавить заказ</h1>

<?= View::errorMessage($error) ?>

<form method="POST">
	<?= Form::routeInputs("order", "insert") ?>
	
	Статус:<br/>
	<select name="status">
		<?php foreach ($statuses as $key => $value) { ?>
			<option value="<?= $key ?>"><?= $value ?></option>
		<?php } ?>
	</select><br/><br/>
	
	Клиент:<br/>
	<select name="client_id">
		<?php foreach ($clients as $client) { ?>
			<option value="<?= $client['id'] ?>"><?= $client['surname'] . " " . $client['name'] . " " . $client['middlename'] ?></option>
		<?php } ?>
	</select><br/><br/>
	
	Тип устройства:<br/>
	<select name="device_type_id">
		<option value="">--</option>
		<?php foreach ($deviceTypes as $type) { ?>
			<option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
		<?php } ?>
	</select><br/><br/>
	
	Название устройства:<br/>
	<input type="text" name="device" value='<?= $_REQUEST['device']?>'><br/><br/>
	Комментарий:<br/>
	<textarea name="comment"></textarea><br/><br/>
	Цена:<br/>
	<input type="number" name="price" value='<?= $_REQUEST['price']?>'><br/><br/>
	Внесенная оплата:<br/>
	<input type="number" name="payment" value='<?= $_REQUEST['payment']?>'><br/><br/>
	
	<input type="submit" name="send_form" value="Добавить" />
</form>