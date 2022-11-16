<?php include_once 'header.php';?>

<h1>Добавить заказ</h1>

<?= View::errorMessage($error) ?>

<form method="POST" class="form_with_fields">
	<?= Form::routeInputs("order", "insert") ?>
	
	<div class="mb-3">
    	<label class="form-label">Статус:</label>
    	<select class="form-select" name="status">
    		<?php foreach ($statuses as $key => $value) { ?>
    			<option value="<?= $key ?>"><?= $value ?></option>
    		<?php } ?>
    	</select>
	</div>
	
	<div class="mb-3">
    	<label class="form-label">Клиент:</label>
    	<select class="form-select" name="client_id">
    		<?php foreach ($clients as $client) { ?>
    			<option value="<?= $client['id'] ?>"><?= $client['surname'] . " " . $client['name'] . " " . $client['middlename'] ?></option>
    		<?php } ?>
    	</select>
	</div>
	
	<div class="mb-3">
    	<label class="form-label">Тип устройства:</label>
    	<select class="form-select" name="device_type_id">
    		<option value="">--</option>
    		<?php foreach ($deviceTypes as $type) { ?>
    			<option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
    		<?php } ?>
    	</select>
	</div>
	
	<div class="mb-3">
    	<label class="form-label">Название устройства:</label>
    	<input class="form-control" type="text" name="device" value='<?= $_REQUEST['device']?>'>
	</div>
	
	<div class="mb-3">
    	<label class="form-label">Комментарий:</label>
    	<textarea class="form-control" name="comment"></textarea>
	</div>
	
	<div class="mb-3">
    	<label class="form-label">Цена:</label>
    	<input class="form-control" type="number" name="price" value='<?= $_REQUEST['price']?>'>
	</div>
	
	<div class="mb-3">
    	<label class="form-label">Внесенная оплата:</label>
    	<input class="form-control" type="number" name="payment" value='<?= $_REQUEST['payment']?>'>
	</div>
	
	<input class="btn btn-success" type="submit" name="send_form" value="Добавить" />
</form>

</body>
</html>