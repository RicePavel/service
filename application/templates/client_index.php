<?php include_once 'header.php';?>
<h1>Клиенты</h1>

<?php if ($error) { ?>
	<div><?= $error ?></div>
<?php } ?>

<form>
	<?= Form::routeInputs("client", "insert") ?>
    <input class="btn btn-success" type="submit" value="Добавить" />
</form>
<table class="table table-bordered">
	<tr>
		<th>Фамилия</th>
		<th>Имя</th>
		<th>Отчество</th>
		<th>Телефон</th>
		<th>Рекламный источник</th>
		<th>Дата добавления</th>
		<th>Действия</th>
	</tr>
    <?php foreach ($data as $item) { ?>
    	<tr>
    		<td><?= htmlentities($item["surname"]) ?></td>
    		<td><?= htmlentities($item["name"]) ?></td>
    		<td><?= htmlentities($item["middlename"]) ?></td>
    		<td><?= htmlentities($item["phone"]) ?></td>
    		<td><?= htmlentities($item["source_advert_name"]) ?></td>
    		<td><?= htmlentities(Format::dateFromMysqlToShort($item["create_date"])) ?></td>
    		<td>
    			<form class="action_form" >
    				<?= Form::routeInputs("client", "show") ?>
    				<input type="hidden" name="id" value='<?= $item["id"] ?>' />
    				<button type="submit" class="btn btn-outline-success"><i class="bi-eye"></i></button>
    			</form>
    			<form class="action_form">
    				<?= Form::routeInputs("client", "update") ?>
    				<button type="submit" class="btn btn-outline-success"><i class="bi-pencil"></i></button>
    				<input type="hidden" name="id" value='<?= $item["id"] ?>' />
    			</form>
    			<form class="action_form">
    				<?= Form::routeInputs("client", "delete") ?>
    				<button onclick="return confirm('Вы уверены?');" type="submit" class="btn btn-outline-danger"><i class="bi-x-lg"></i></button>
    				<input type="hidden" name="id" value='<?= $item["id"] ?>' />
    			</form>
    		</td>
    	</tr>
    <?php } ?>
</table>



	</body>
</html>