<?php include_once 'header.php';?>

<h1>Изменить заказ</h1>

<?= View::errorMessage($error) ?>

<form method="POST">
	<?= Form::routeInputs("order", "update") ?>
	
	Статус:<br/>
	<select name="status">
		<?php foreach ($statuses as $key => $value) { ?>
			<option <?= ($key == $order['status']) ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
		<?php } ?>
	</select><br/><br/>
	
	Клиент:<br/>
	<select name="client_id">
		<?php foreach ($clients as $client) { ?>
			<option <?= ($client['id'] == $order['client_id']) ? 'selected' : '' ?> value="<?= $client['id'] ?>"><?= $client['surname'] . " " . $client['name'] . " " . $client['middlename'] ?></option>
		<?php } ?>
	</select><br/><br/>
	
	Тип устройства:<br/>
	<select name="device_type_id">
		<option value="">--</option>
		<?php foreach ($deviceTypes as $type) { ?>
			<option <?= ($type['id'] == $order['device_type_id']) ? 'selected' : '' ?> value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
		<?php } ?>
	</select><br/><br/>
	
	Название устройства:<br/>
	<input type="text" name="device" value='<?= $order['device']?>'><br/><br/>
	Комментарий:<br/>
	<textarea name="comment"><?= $order['comment'] ?></textarea><br/><br/>
	Цена:<br/>
	<input type="number" name="price" value='<?= $order['price']?>'><br/><br/>
	Внесенная оплата:<br/>
	<input type="number" name="payment" value='<?= $order['payment'] ?>'><br/><br/>
	
	<input type="hidden" name="id" value='<?= $order['id']?>'>
	<input type="submit" name="send_form" value="Обновить" />
</form>