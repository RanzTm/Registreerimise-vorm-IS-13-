<?php
require_once('api.php');

print '<a href="users.php">Edasi!</a>';
$result = "";

	if (api_user_delete($_GET["id"])) {
		$result = "Kasutaja on kustutatud!";
	}
	
	else {
		$result = "Kasutaja kustutamisel tekkis viga!!";
	}
print '

<div class="container" style="text-align: center">
<h3>' . $result . '</h3>
</div>';
?>
