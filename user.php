<?php
require_once("api.php");
$item = user_API($_GET["key"]);
?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<meta charset="utf-8">
	
</head>
  <div class="user">
    <div class="col-name">Eesnimi:<?=$item['first_name']?></div>
	<div class="col-name">Perekonnanimi:<?=$item['last_name']?></div>
    <div class="col-username">Kasutajanimi:<?=$item['username']?></div>
    <div class="col-passwd">Kasutaja salasõna:<?=$item['password']?></div>
		<div class="col-name">Sugu:<?=$item['gender']?></div>
			<div class="col-name">Kirjeldus:<?=$item['description']?></div>
    <div class="col-info">Aeg: <?=$item['times']?></div>
  </div>
