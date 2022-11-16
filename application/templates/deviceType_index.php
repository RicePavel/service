<?php include_once 'header.php';?>

<h1>Типы устройств</h1>

<form>
	<?= Form::routeInputs("deviceType", "insert") ?>
    <input class="btn btn-success" type="submit" value="Добавить" />
</form>

<table class="table table-bordered table_catalog">
	<tr>
		<th>Название</th>
		<th>Действия</th>
	</tr>
    <?php foreach ($list as $item) { ?>
    	<tr>
    		<td><?= htmlentities($item["name"]) ?></td>
    		<td>
    			<form class="action_form">
    				<?= Form::routeInputs("deviceType", "update") ?>
    				<button type="submit" class="btn btn-outline-success"><i class="bi-pencil"></i></button>
    				<input type="hidden" name="id" value='<?= $item["id"] ?>' />
    			</form>
    			<form class="action_form">
    				<?= Form::routeInputs("deviceType", "delete") ?>
    				<button onclick="return confirm('Вы уверены?');" type="submit" class="btn btn-outline-danger"><i class="bi-x-lg"></i></button>
    				<input type="hidden" name="id" value='<?= $item["id"] ?>' />
    			</form>
    		</td>
    	</tr>
    <?php } ?>

</table>

</body>
</html>
