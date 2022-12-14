<?php include_once 'header.php';?>

<h1>Заказ</h1>

<div>
    <form class="action_form" >
        <?= Form::routeInputs("order", "update") ?>
        <input class="btn btn-success" type="submit" value="Изменить"><input type="hidden" name="id" value='<?= $order["id"] ?>' />
    </form>		
    <form>
    	<?= Form::routeInputs("order", "delete") ?>
    	<input onclick="return confirm('Вы уверены?');" class="btn btn-danger" type="submit" value="Удалить"><input type="hidden" name="id" value='<?= $order["id"] ?>' />
    </form>
</div>

<div>
	<b>Статус:</b> <br/> <?= htmlentities($order['status_name']) ?> <br/><br/>
	<b>Клиент:</b> <br/> <?= htmlentities($order['client_name'] . " " . $order['client_surname'] . " " . $order['client_middlename']) ?> <br/><br/>
	<b>Тип устройства:</b> <br/> <?= htmlentities($order['device_type_name']) ?> <br/><br/>
	<b>Название устройства:</b> <br/> <?= htmlentities($order['device']) ?> <br/><br/>
	<b>Комментарий:</b><br/> <?= htmlentities($order['comment']) ?> <br/><br/>
	<b>Цена:</b><br/> <?= htmlentities($order['price']) ?> <br/><br/>
	<b>Внесенная оплата:</b><br/> <?= htmlentities($order['payment']) ?> <br/><br/>
	<b>Дата добавления:</b> <br/> <?= htmlentities(Format::dateFromMysqlToShort($order["create_date"])) ?> <br/><br/>
</div>
	
</body>
</html>