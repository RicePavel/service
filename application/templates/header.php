<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<link rel="stylesheet" href="web/style.css" >

    <title>Система управления заказами</title>
	</head>
	<body>
	
    <ul class="nav">
    	<li class="nav-item" ><a class="nav-link" href="<?= Link::getUrl("client", "index")  ?>">Клиенты</a></li>
    	<li class="nav-item" ><a class="nav-link" href="<?= Link::getUrl("order", "index")  ?>">Заказы</a></li>
    	<li class="nav-item" ><a class="nav-link" href="<?= Link::getUrl("sourceAdvert", "index")  ?>">Рекламные источники</a></li>
    	<li class="nav-item" ><a class="nav-link" href="<?= Link::getUrl("deviceType", "index")  ?>">Типы устройств</a></li>
    	<li class="nav-item" ><a class="nav-link" href="<?= Link::getUrl("report", "index")  ?>">Отчеты</a></li>
    </ul>