<?php include_once 'header.php';?>

<h1>Отчет по заказам, группировка по типам устройств</h1>

<form>
	<?= Form::routeInputs("report", "ByDeviceTypes") ?>
	Дата начала:
	<input type="date" name="date_start" value='<?= $_REQUEST['date_start'] ?>'> &nbsp;&nbsp;&nbsp;&nbsp;
	Дата завершения:
	<input type="date" name="date_end" value='<?= $_REQUEST['date_end'] ?>'> &nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" name="Получить отчет">
</form>

<table>
	<tr>
		<th>Тип устройства</th>
		<th>Количество заказов</th>
		<th>Сумма цен</th>
		<th>Сумма внесенных платежей</th>
	</tr>
	<?php foreach ($data as $row) { ?>
	<tr>
		<th><?= (empty($row['device_type_name'])) ? '--' : htmlentities($row['device_type_name']) ?></th>
		<th><?= htmlentities($row['count_orders']) ?></th>
		<th><?= htmlentities($row['sum_price']) ?></th>
		<th><?= htmlentities($row['sum_payment']) ?></th>
	</tr>
	<?php } ?>
</table>