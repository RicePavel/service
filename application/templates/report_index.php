<?php include_once 'header.php';?>

<h1>Очеты</h1>

<div><a href="<?= Link::getUrl("report", "byAdvertSources") ?>">Клиенты, по рекламным источникам</a></div><br/>
<div><a href="<?= Link::getUrl("report", "byDeviceTypes") ?>">Заказы, по типам устройств</a></div>

</body>
</html>