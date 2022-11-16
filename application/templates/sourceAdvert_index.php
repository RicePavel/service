<?php include_once 'header.php';?>

<h1>Рекламные источники</h1>

<form>
	<?= Form::routeInputs("sourceAdvert", "insert") ?>
    <input type="submit" value="Добавить" />
</form>

<table>
	<tr>
		<th>Название</th>
		<th></th>
		<th></th>
	</tr>
    <?php foreach ($list as $item) { ?>
    	<tr>
    		<td><?= htmlentities($item["name"]) ?></td>
    		<td>
    			<form>
    				<?= Form::routeInputs("sourceAdvert", "update") ?>
    				<input type="submit" value="Изменить"><input type="hidden" name="id" value='<?= $item["id"] ?>' />
    			</form>
    		</td>
    		<td>
    			<form>
    				<?= Form::routeInputs("sourceAdvert", "delete") ?>
    				<input type="submit" value="Удалить"><input type="hidden" name="id" value='<?= $item["id"] ?>' />
    			</form>
    		</td>
    	</tr>
    <?php } ?>

</table>

