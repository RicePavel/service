<?php include_once 'header.php';?>

<h1>Заказы</h1>

<form>
	<?= Form::routeInputs("order", "insert") ?>
    <input type="submit" value="Добавить" />
</form>

<table>
	<tr>
		<th>Номер</th>
		<th>Клиент</th>
		<th>Статус</th>
		<th>Тип устройства</th>
		<th>Устройство</th>
		<th>Цена</th>
		<th>Внесенная оплата</th>
		<th>Дата создания</th>
		<th></th>
		<th></th>
		<th></th>
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
    			<form>
    				<?= Form::routeInputs("order", "show") ?>
    				<input type="submit" value="Просмотр"><input type="hidden" name="id" value='<?= $item["id"] ?>' />
    			</form>
    		</td>
    		<td>
    			<form>
    				<?= Form::routeInputs("order", "update") ?>
    				<input type="submit" value="Изменить"><input type="hidden" name="id" value='<?= $item["id"] ?>' />
    			</form>
    		</td>
    		<td>
    			<form>
    				<?= Form::routeInputs("order", "delete") ?>
    				<input type="submit" value="Удалить"><input type="hidden" name="id" value='<?= $item["id"] ?>' />
    			</form>
    		</td>
    	</tr>
    <?php } ?>

</table>

