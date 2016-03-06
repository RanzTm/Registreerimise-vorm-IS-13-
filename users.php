<?php
	print '<a href="form.html">Tagasi kasutaja registeerimise vormi lehe peale!</a>';
	include('./bt.php');
	require_once('api.php');
?>


<html lang="en">
<head>
    <title>Registreeritud kasutajad</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">	
</head>


<body>
	<div class="container">
	<div class="list-group col-sm-4 col-md-offset-4">
    <h2>Registreeritud kasutajad</h2>
			
<?php
$users = api_user_list();
foreach ($users as $user) {
	print '			
	<div class="list-group-item">
		<a href="user.php?id=' . $user["id"] . '">
			<span class=""></span>
			' . $user["username"] . ' 
		</a>
				
	<span class="pull-right">							
		<a href="edit.php?id=' . $user["id"] . '">
			<button class="btn btn-primary">
			<span class="glyphicon glyphicon-wrench"></span>
				</button>
		</a>
		
		<a href="delete.php?id=' . $user["id"] . '">
			<button class="btn btn-info">
			<span class="glyphicon glyphicon-remove-circle"></span>
				</button>
		</a>
	</span>
	</div>
	';
}
?>

	</div>
    </div>
</body>
</html>
