<?php
	print '<a href="./users.php">Edasi registreeritud kasutajate lehe peale!</a>';
	require_once('api.php');
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$userData = array(
	"username" => $_POST["username"],
    "password" => $_POST["password"],
    "first_name" => $_POST["first_name"],
    "last_name" => $_POST["last_name"],
    "gender" => $_POST["gender"],
    "description" => $_POST["description"],
    "profile_pic" => $_FILES["profile_pic"]["tmp_name"]
);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$result = "";
if (!isset($_GET["id"])) {
    if (api_user_create($userData)) {
    $result = "Kasutaja on registeeritud!";
    }
else {
    $result = "Ebaõnnestus registeerimine!";
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else {
    $userData["id"] = $_GET["id"];
    if (api_user_update($userData)) {
    $result = "Kasutaja andmed on uuendatud!";
    }
else {
	$result = "Andmete uuendamisel on tekkinud viga!";
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
print '
<div class="container" style="text-align: center">
<h4>' . $result . '</h4>
</div>';
?>
