<?php
	print '<a href="users.php">Tagasi registreeritud kasutajate lehe peale!</a>';
	require_once ('api.php');
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	$userData = api_user_read($_GET['id']);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
print '
  <div class="user">
    <img class="img" src="'.$userData["profile_pic"].'" height="200" width="225">
    <div class="col-name">Eesnimi: '.$userData['first_name'].'</div>
	<div class="col-name">Perekonnanimi: '.$userData['last_name'].'
    <div class="col-username">Kasutajanimi: '.$userData['username'].'</div>
    <div class="col-passwd">Kasutaja salasõna: '.$userData['password'].'</div>
    <div class="col-sex">Sugu: '.$userData['gender'].'</div>
    <div class="col-info">Kommentaar: '.$userData['description'].'</div>
  </div>
';
?>
	