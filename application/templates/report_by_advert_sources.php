<?php include_once 'header.php';?>

<h1>Отчет по клиентам, в зависимости от источника привлечения</h1>

<form>
	<?= Form::routeInputs("report", "ByAdvertSources") ?>
	Дата начала:
	<input type="date" name="date_start" value='<?= $_REQUEST['date_start'] ?>'> &nbsp;&nbsp;&nbsp;&nbsp;
	Дата завершения:
	<input type="date" name="date_end" value='<?= $_REQUEST['date_end'] ?>'> &nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" name="Получить отчет">
</form>

<table>
	<tr>
		<th>Рекламный источник</th>
		<th>Количество созданных клиентов</th>
	</tr>
	<?php foreach ($data as $row) { ?>
	<tr>
		<th><?= (empty($row['advert_source_name'])) ? '--' : htmlentities($row['advert_source_name']) ?></th>
		<th><?= htmlentities($row['client_count']) ?></th>
	</tr>
	<?php } ?>
</table>