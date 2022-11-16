<?php include_once 'header.php';?>

<h1>Заказы</h1>

<form>
	<?= Form::routeInputs("order", "insert") ?>
    <input class="btn btn-success" type="submit" value="Добавить" />
</form>

<table class="table table-bordered">
	<tr>
		<th>Номер</th>
		<th>Клиент</th>
		<th>Статус</th>
		<th>Тип устройства</th>
		<th>Устройство</th>
		<th>Цена</th>
		<th>Внесенная оплата</th>
		<th>Дата создания</th>
		<th>Действия</th>
	</tr>
    <?php foreach ($data as $item) { ?>
    	<tr>
    		<td><?= htmlentities($item["id"]) ?></td>
    		<td><?= htmlentities($item["client_surname"]) . " " . htmlentities($item["client_name"]) . " " . htmlentities($item["client_middlename"]) ?> </td>
    		<td><?= htmlentities($item["status_name"]) ?></td>
    		<td><?= htmlentities($item["device_type_name"]) ?></td>
    		<td><?= htmlentities($item["device"]) ?></td>
    		<td><?= htmlentities($item["price"]) ?></td>
    		<td><?= htmlentities($item["payment"]) ?></td>
    		<td><?= htmlentities($item["create_date"]) ?></td>
    		<td>
    			<form class="action_form">
    				<?= Form::routeInputs("order", "show") ?>
    				<button type="submit" class="btn btn-outline-success"><i class="bi-eye"></i></button>
    				<input type="hidden" name="id" value='<?= $item["id"] ?>' />
    			</form>
    			<form class="action_form">
    				<?= Form::routeInputs("order", "update") ?>
    				<button type="submit" class="btn btn-outline-success"><i class="bi-pencil"></i></button>
    				<input type="hidden" name="id" value='<?= $item["id"] ?>' />
    			</form>
    			<form class="action_form">
    				<?= Form::routeInputs("order", "delete") ?>
    				<button type="submit" onclick="return confirm('Вы уверены?');" class="btn btn-outline-danger"><i class="bi-x-lg"></i></button>
    				<input type="hidden" name="id" value='<?= $item["id"] ?>' />
    			</form>
    		</td>
    	</tr>
    <?php } ?>

</table>

</body>
</html>

