<?php
session_start();

if( isset($_POST['upload']) ){

	$folder_name = $_POST['folder_name'];
	$file_name   = $_FILES['image']['name'];
	$file_temp   = $_FILES['image']['tmp_name'];
	$allowed     = ['jpg', 'jpeg', 'png'];
	$ext         = pathinfo($file_name, PATHINFO_EXTENSION);

	if( empty($folder_name) || empty($file_name)  || !in_array($ext, $allowed) ){
		if( empty($folder_name) ){
			$_SESSION['folder_name_err'] = 'Folder name field is required.';
		}

		if( empty($file_name) ){
			$_SESSION['image_err'] = 'Image field is required.';
		}else{
			if( !in_array($ext, $allowed) ){
				$_SESSION['image_err'] = 'Only Image Allowed to Upload.';
			}
		}
		header('location: ' . $_SERVER['HTTP_REFERER']);
	}else{
		if( !file_exists($folder_name) ){
			mkdir($folder_name, 0777, true);
		}
		$new_file_name = uniqid(time()) . $file_name;
		move_uploaded_file($file_temp, $folder_name.'/'.$new_file_name);
		header('location: ' . $_SERVER['HTTP_REFERER']);
	}
}

?>







