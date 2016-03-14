<?php
require_once("api.php");
$item = user_API($_GET["key"]);
?>


<html lang="en">
<head>
	<title>Andmete muutmise vorm</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>
<body>
	<div class="container">
	<h4>Kasutaja registreerimise vorm</h4>
	<form class="form-horizontal" role="form" method="post" action="form.php" enctype="multipart/form-data">

	
		<div class="form-group">
			<label class="control-label col-sm-2" for="usr">Kasutajanimi:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="usr" name="username" placeholder="kasutaja" value="<?=$item["username"]?>">
			</div>
		</div>

		
		<div class="form-group">
			<label class="control-label col-sm-2" for="pwd">Kasutaja salasõna:</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" id="pwd" name="password" placeholder="salasõna" value="<?=$item["password"]?>">
			</div>
		</div>

		
		<div class="form-group">
			<label class="control-label col-sm-2" for="fname">Eesnimi:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="fname" name="first_name" placeholder="nimi" value="<?=$item["first_name"]?>">
			</div>
		</div>

		
		<div class="form-group">
			<label class="control-label col-sm-2" for="lname">Perekonnanimi:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="lname" name="last_name" placeholder="Perenimi" value="<?=$item["last_name"]?>">
			</div>
		</div>

		
		<div class="form-group">
			<label class="control-label col-sm-2" for="gender">Sugu:</label>
			<div class="col-sm-10">
				<input type="radio" id="gender" name="gender" value="Mees">Mees
			</div>
		</div>
		
		
		<div class="form-group">
			<label class="control-label col-sm-2" for="gender"></label>
			<div class="col-sm-10">
				<input type="radio" id="gender" name="gender" value="Naine">Naine
			</div>
		</div>

		
		<div class="form-group">
			<label class="control-label col-sm-2" for="description">Kommentaar:</label>
			<div class="col-sm-10">
				<textarea class="form-control" rows="5" id="description" name="description" value="<?=$item["description"]?>"></textarea>
			</div>
		</div>


		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="hidden" id="kontroll" name="kontroll" value=1>
				<button type="submit" class="btn btn-default">Saada</button>
				
			</div>
		</div>
		
	</form>
	</div>
</body>
</html>
