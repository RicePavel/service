<?php include_once 'header.php';?>
<h1>Клиенты</h1>

<?php if ($error) { ?>
	<div><?= $error ?></div>
<?php } ?>

<form>
	<?= Form::routeInputs("client", "insert") ?>
    <input type="submit" value="Добавить" />
</form>
<table>
	<tr>
		<th>Фамилия</th>
		<th>Имя</th>
		<th>Отчество</th>
		<th>Телефон</th>
		<th>Рекламный источник</th>
		<th>Дата добавления</th>
		<th></th>
		<th></th>
		<th></th>
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
    			<form>
    				<?= Form::routeInputs("client", "show") ?>
    				<input type="submit" value="Просмотр"><input type="hidden" name="id" value='<?= $item["id"] ?>' />
    			</form>
    		</td>
    		<td>
    			<form>
    				<?= Form::routeInputs("client", "update") ?>
    				<input type="submit" value="Изменить"><input type="hidden" name="id" value='<?= $item["id"] ?>' />
    			</form>
    		</td>
    		<td>
    			<form>
    				<?= Form::routeInputs("client", "delete") ?>
    				<input type="submit" value="Удалить"><input type="hidden" name="id" value='<?= $item["id"] ?>' />
    			</form>
    		</td>
    	</tr>
    <?php } ?>
</table>