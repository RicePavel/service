<?php include_once 'header.php';?>

<h1>Клиент</h1>

<form>
    <?= Form::routeInputs("client", "update") ?>
    <input type="submit" value="Изменить"><input type="hidden" name="id" value='<?= $client["id"] ?>' />
</form>
<form>
	<?= Form::routeInputs("client", "delete") ?>
	<input type="submit" value="Удалить"><input type="hidden" name="id" value='<?= $client["id"] ?>' />
</form>

	<b>Фамилия:</b> <br/> <?= htmlentities($client['surname']) ?> <br/><br/>
	<b>Имя:</b> <br/> <?= htmlentities($client['name']) ?> <br/><br/>
	<b>Отчество:</b> <br/> <?= htmlentities($client['middlename']) ?> <br/><br/>
	<b>Телефон:</b> <br/> <?= htmlentities($client['phone']) ?> <br/><br/>
	<b>Рекламный источник:</b> <br/> <?= htmlentities($client['source_advert_name']) ?> <br/><br/>
	<b>Дата добавления:</b> <br/> <?= htmlentities(Format::dateFromMysqlToShort($client["create_date"])) ?> <br/><br/>

<h1>Заказы клиента</h1>

<table>
	<tr>
		<th>Номер</th>
		<th>Статус</th>
		<th>Тип устройства</th>
		<th>Устройство</th>
		<th>Цена</th>
		<th>Внесенная оплата</th>
		<th></th>
		<th></th>
		<th></th>
	</tr>
    <?php foreach ($orders as $item) { ?>
    	<tr>
    		<td><?= htmlentities($item["id"]) ?></td>
    		<td><?= htmlentities($item["status_name"]) ?></td>
    		<td><?= htmlentities($item["device_type_name"]) ?></td>
    		<td><?= htmlentities($item["device"]) ?></td>
    		<td><?= htmlentities($item["price"]) ?></td>
    		<td><?= htmlentities($item["payment"]) ?></td>
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