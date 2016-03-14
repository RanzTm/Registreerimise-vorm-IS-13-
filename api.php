<?php
date_default_timezone_set("Europe/Tallinn");
  
function save_API($item) {
    $username = $item["username"];
    $password = $item["password"];
    $first_name = $item["first_name"];
    $last_name = $item["last_name"];
	$gender = $item["gender"];
	$description = $item["description"];
    $id = file_get_contents("key.txt");
	$times = time();
	$data = json_decode(file_get_contents("andmed.json"), 2);
	$data[] = array(
		"id" => $id,
		"username" => $username,
		"password" => $password,
		"first_name" => $first_name,
		"last_name" => $last_name,
		"gender" => $gender,
		"description" => $description,
		"times" => $times);
	file_put_contents("andmed.json", json_encode($data, JSON_PRETTY_PRINT));
	$id = $id+1;
	file_put_contents("key.txt", $id);
	 
	return true;
}
function user_API($key) {
	$item = json_decode(file_get_contents("andmed.json"), true);
	$item = $item[$key];
	$item["times"] = strftime("%d/%m/%Y %H:%M", $item["times"]);
	return $item;
	
}
function edit_API($item) {
	$id = $item["id"];
    $username = $item["username"];
    $password = $item["password"];
    $first_name = $item["first_name"];
    $last_name = $item["last_name"];
	$gender = $item["gender"];
	$description = $item["description"];
	
	$id = intval($id);
	$times = time();
	$data = json_decode(file_get_contents("andmed.json"), true);
	$data[$id] = array(
		"id" => $id,
		"username" => $username,
		"password" => $password,
		"first_name" => $first_name,
		"last_name" => $last_name,
		"gender" => $gender,
		"description" => $description,
		"times" => $times);
	file_put_contents("andmed.json", json_encode($data, JSON_PRETTY_PRINT));
	return true;
}
function remove_API($id) {
	$array1 = json_decode(file_get_contents("andmed.json"), true);
	$array2 = $array1[$id];
	$id_nr = intval($array2["id"]);
	unset($array1[$id_nr]);
	file_put_contents("andmed.json", json_encode($array1));
	
}
function list_API() {
	$items = json_decode(file_get_contents("andmed.json"), 2);
	if(is_array($items)) {
		foreach($items as $key => $item)
		
	return $items;
	}
}
	
?>
