<?php
	print '<a href="users.php">Tagasi registreeritud kasutajate lehe peale!</a>';
	require_once('api.php');
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	$userData = api_user_read($_GET['id']);
?>


<html lang="en">
<head>
	<?php include('bt.php'); ?>
	<title>Andmete muutmise vorm</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">

</head>
<body>
	<div class="container">
	<h2>Kasutaja andmete muutmine</h2>
	<form class="form-horizontal" role="form" method="post" action="form.php?id=<?php print $userData["id"]; ?>" enctype="multipart/form-data">

	
		<div class="form-group">
			<label class="control-label col-sm-2" for="usr">Kasutajanimi:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="usr" name="username" value="<?php print $userData["username"]; ?>" placeholder="Kasutajanimi">
			</div>
		</div>

		
		<div class="form-group">
			<label class="control-label col-sm-2" for="pwd">Salasõna:</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" id="pwd" name="password" value="<?php print $userData["password"]; ?>" placeholder="salasõna">
			</div>
		</div>

		
		<div class="form-group">
			<label class="control-label col-sm-2" for="fname">Eesnimi:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="fname" name="first_name" value="<?php print $userData["first_name"]; ?>" placeholder="Eesnimi">
			</div>
		</div>

		
		<div class="form-group">
			<label class="control-label col-sm-2" for="lname">Perekonnanimi:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="lname" name="last_name" value="<?php print $userData["last_name"]; ?>" placeholder="Perenimi">
			</div>
		</div>

		
		<div class="form-group">
			<label class="control-label col-sm-2" for="gender">Sugu:</label>
			<div class="col-sm-10">
				<input type="radio" id="gender" name="gender" <?php print ($userData["gender"] == "Mees" ? "checked" : ""); ?> required>Mees
			</div>
		</div>
		
		
		<div class="form-group">
			<label class="control-label col-sm-2" for="gender"></label>
			<div class="col-sm-10">
				<input type="radio" id="gender" name="gender" <?php print ($userData["gender"] == "Naine" ? "checked" : ""); ?> required>Naine
			</div>
		</div>

		
		<div class="form-group">
			<label class="control-label col-sm-2" for="description">Info:</label>
			<div class="col-sm-10">
				<textarea class="form-control" rows="5" id="description" name="description"><?php print $userData["description"]; ?></textarea>
			</div>
		</div>

		
		<div class="form-group">
			<label class="control-label col-sm-2" for="pic"></label>
			<div class="col-sm-10">
				<img src="<?php print $userData["profile_pic"]; ?>" height="150" width="150">
				<input type="file" name="profile_pic" accept="image/*" id="pic">
			</div>
		</div>

		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Saada</button>
			</div>
		</div>
		
	</form>
	</div>
</body>
</html>
