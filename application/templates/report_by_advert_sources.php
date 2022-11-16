<?php include_once 'header.php';?>

<h1>Отчет по клиентам, в зависимости от источника привлечения</h1>

<form>
	<?= Form::routeInputs("report", "ByAdvertSources") ?>
	Дата начала:
	<input type="date" name="date_start" value='<?= $_REQUEST['date_start'] ?>'> &nbsp;&nbsp;&nbsp;&nbsp;
	Дата завершения:
	<input type="date" name="date_end" value='<?= $_REQUEST['date_end'] ?>'> &nbsp;&nbsp;&nbsp;&nbsp;
	<input class="btn btn-success" type="submit" name="Получить отчет">
</form>

<table class="table table-bordered table_catalog">
	<tr>
		<th>Рекламный источник</th>
		<th>Количество созданных клиентов</th>
	</tr>
	<?php foreach ($data as $row) { ?>
	<tr>
		<td><?= (empty($row['advert_source_name'])) ? '--' : htmlentities($row['advert_source_name']) ?></td>
		<td><?= htmlentities($row['client_count']) ?></td>
	</tr>
	<?php } ?>
</table>

</body>
</html>