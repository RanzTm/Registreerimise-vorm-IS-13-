<?php
require_once("api.php");
$item = user_API($_GET["key"]);
remove_API($item);
?>

<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <form role="form" action="index.php" method="get"><br><br>
  
  <p><b>Õpilane on eemaldatud!</b></p>
  
  <button type="submit" class="btn btn-default">Tagasi</button>
  </form>
</div>
</body>
</html>
