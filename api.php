<?php
date_default_timezone_set("Europe/Tallinn");
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// CREATE //
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function api_user_create($userData) {
    $username = $userData["username"];
    $password = $userData["password"];
    $first_name = $userData["first_name"];
    $last_name = $userData["last_name"];
    $gender = $userData["gender"];
    $description = $userData["description"];
    $profile_pic = $userData["profile_pic"];	
	$date = $userData["date"];
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if (!empty($username && $password && $first_name && $last_name && $gender && $description )) { 
        $homePath = "./kasutajad";
        $dirArray = glob($homePath . "/*", GLOB_ONLYDIR);
		
        if (count($dirArray) != 0) {
            $currentMax = "";
            foreach ($dirArray as $value) {
			if (basename($value) > $currentMax)
                {
				$currentMax = basename($value);
                }
            }
            $user_id = $currentMax + 1;
        }
		
        else {
            $user_id = 1;
        }
	$userPath = "$homePath/$user_id";
	$imgPath = "$userPath/profile.jpg";
	$dataPath = "$userPath/data.json";
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if (!is_dir($userPath)) {
	$old = umask(0);
	mkdir($userPath, 0770, true);
	umask($old);
	}
	
	if (is_writable($userPath)) {
		if (!empty($profile_pic)) {
			move_uploaded_file($profile_pic, $imgPath);
            }
			
			$timestamp = strtotime(str_replace('/', '-', $date));
            if ($timestamp === false) {
                $timestamp = "";
            }
	
            $file = fopen($dataPath, "w");
            $data[] = array(
			"id" => $user_id,
			"username" => $username,
			"password" => $password,
			"first_name" => $first_name,
			"last_name" => $last_name,
			"gender" => $gender,
			"description" => $description,
			"profile_pic" => $imgPath);
		fwrite($file, json_encode($data));
		fclose($file);
        return true;
        }
        return false;
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// USER_LIST //
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function api_user_list() {
    $path = './kasutajad/*';
    $userList = [];
    $i = 0;
	
    foreach (glob($path, GLOB_ONLYDIR) as $dirPath) {
        $dataPath = "$dirPath/data.json";
        $json = file_get_contents($dataPath);
        $userData = json_decode($json, true);
        $userList[$i] = $userData[0];
        $i++;
    }
    return $userList;
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// READ //
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function api_user_read($user_id) {
    $dataPath = "./kasutajad/$user_id/data.json";
    $json = file_get_contents($dataPath);
    $userData = json_decode($json, true);
    $userData[0]["date"] = strftime("%d/%m/%Y %H:%M", $userData[0]["date"]);
    return $userData[0];
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// UPDATE //
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function api_user_update($userData) {
    $user_id = $userData["id"];
    $username = $userData["username"];
    $password = $userData["password"];
    $first_name = $userData["first_name"];
    $last_name = $userData["last_name"];
    $gender = $userData["gender"];
    $description = $userData["description"];
    $profile_pic = $userData["profile_pic"];
	$date = $userData["date"];
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if ((!empty($user_id) || $user_id == 0) && !empty($username && $password && $first_name && $last_name && $gender && $description )) { 
        $userPath = "./kasutajad/$user_id";
        $imgPath = "$userPath/profile.jpg";
        $dataPath = "$userPath/data.json";
		
        if (is_writable($userPath)) {
            if (!empty($profile_pic)) {
			move_uploaded_file($profile_pic, $imgPath);
            }
			
			$timestamp = strtotime(str_replace('/', '-', $date));
			if ($timestamp === false) {
			$timestamp = "";
			}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $file = fopen($dataPath, "w");
            $data[] = array(
                "id" => $user_id,
                "username" => $username,
                "password" => $password,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "gender" => $gender,
                "description" => $description,
                "profile_pic" => $imgPath);
            fwrite($file, json_encode($data));
            fclose($file);
        return true;
        }
        return false;
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// DELETE //
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function api_user_delete($user_id) {
    $path = "./kasutajad/$user_id";
    if (is_dir($path)) {
        $files = glob($path . '/*');
        foreach ($files as $file) {
		is_dir($file) ? api_user_delete($file) : unlink($file);
        }
        rmdir($path);
	return true;
    }
    return false;
}
?>
