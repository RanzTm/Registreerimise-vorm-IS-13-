<?php
require_once("api.php");
$kontroll = $_POST["kontroll"];
if ($kontroll == 0){
	$item = array(
	"id" => $_POST["id"],
	"username" => $_POST["username"],
	"password" => $_POST["password"],
	"first_name" => $_POST["first_name"],
	"last_name" => $_POST["last_name"],
	"gender" => $_POST["gender"],
	"description" => $_POST["description"],
	"kontroll" => $_POST["kontroll"]);
	
	save_API($item);
	}
else {
	$item = array(
	"id" => $_POST["id"],
	"username" => $_POST["username"],
	"password" => $_POST["password"],
	"first_name" => $_POST["first_name"],
	"last_name" => $_POST["last_name"],
	"gender" => $_POST["gender"],
	"description" => $_POST["description"],
	"kontroll" => $_POST["kontroll"]);
	
	edit_API($item);
	}
?>
<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<?php
if ($tuvasta == 0) {
  print '<div class="container">
           <form role="form" action="form.html" method="get"><br><br>
             <p><b>Lisatud</b></p>
             <button type="submit" class="btn btn-default">Tagasi</button>
           </form>
           </div>';
}
else {
  print '<div class="container">
           <form role="form" action="user.php" method="get"><br><br>
             <p><b>Muudetud!</b></p>
             <button type="submit" class="btn btn-default">Tagasi</button>
           </form>
         </div>';
}
?>
