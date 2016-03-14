<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>


<body>
<div class="collapse navbar-collapse" id="bs-navbar-collapse">
	<ul class="nav navbar-nav">
		<li><a href="form.html">Registreerimis vorm</a></li>
	</ul>
</div>

<div class="container">
<table align="left" cellpadding="5" rowspan="5">
    <tr>
        <th>Username</th>
        <th>user</th>
		<th>Edit</th>
		<th>Remove</th>
    </tr>
	<?php
	require_once("api.php");
	$items = list_API();
	
	foreach ((array) $items as $key => $item) {
		if ($item != NULL){
	?>
			<tr>
				<td><?=$item["username"]?></td>
				<td><a href="user.php?key=<?=$key?>"><?="user"?></a></td>
				<td><a href="edit.php?key=<?=$key?>"><?="edit"?></a></td>
				<td><a href="delete.php?key=<?=$key?>"><?="remove"?></a></td>
			</tr>
			<?php
		}
	}
	?>
</table>
</div>
</body>
</html>
