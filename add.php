<?php
session_start();
include_once('connection.php');

if (isset($_POST['add'])) {
	$name = $_POST['name'];
	$category = $_POST['category'];
	$price = $_POST['price'];
	$image = $_POST['image'];
	$stock = $_POST['stock'];


	$nameFile = $_FILES['image']['name'];
	$typeFile = $_FILES['image']['type'];
	$tmpfile = $_FILES['image']['tmp_name'];

	//PROSES PUT OBJECT untuk FILE
	$c_put_object = curl_init();
	$headers = array("opc-multipart:true");
	curl_setopt($c_put_object, CURLOPT_URL, 'https://objectstorage.ap-sydney-1.oraclecloud.com/p/dKqBJVbaw67dT8HIB1V8ozwDNrMEU3I__Xqu72CKhJoWWQwLyptZj1Y7wZWL-q25/n/sdwpma8thrwk/b/elrahmaan-assets/o/' . $nameFile);
	curl_setopt($c_put_object, CURLOPT_CUSTOMREQUEST, "PUT");
	curl_setopt($c_put_object, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($c_put_object, CURLOPT_RETURNTRANSFER, TRUE);

	$output = curl_exec($c_put_object);

	$data = json_decode($output);

	$postfields = array(
		'uploaded_file' => file_get_contents($tmpfile)
	);

	//PROSES PUT FILE
	$c_put_file = curl_init();
	curl_setopt($c_put_file, CURLOPT_URL, 'https://objectstorage.ap-sydney-1.oraclecloud.com/p/dKqBJVbaw67dT8HIB1V8ozwDNrMEU3I__Xqu72CKhJoWWQwLyptZj1Y7wZWL-q25/n/sdwpma8thrwk/b/elrahmaan-assets/u/' . $nameFile . '/id/' . $data->uploadId . "/1");
	curl_setopt($c_put_file, CURLOPT_CUSTOMREQUEST, "PUT");
	curl_setopt($c_put_file, CURLOPT_POST, 1);
	curl_setopt($c_put_file, CURLOPT_POSTFIELDS, file_get_contents($tmpfile));
	curl_setopt($c_put_file, CURLOPT_HTTPHEADER, array('Content-Type: ' . $typeFile));
	curl_setopt($c_put_file, CURLOPT_RETURNTRANSFER, TRUE);

	$put_out = curl_exec($c_put_file);

	//PROSES POST FILE PADA OBJECT
	$c_post = curl_init();
	curl_setopt($c_post, CURLOPT_URL, 'https://objectstorage.ap-sydney-1.oraclecloud.com/p/dKqBJVbaw67dT8HIB1V8ozwDNrMEU3I__Xqu72CKhJoWWQwLyptZj1Y7wZWL-q25/n/sdwpma8thrwk/b/elrahmaan-assets/u/' . $nameFile . '/id/' . $data->uploadId . "/");
	curl_setopt($c_post, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($c_post, CURLOPT_POST, 1);

	$post_out = curl_exec($c_post);

	// CURL
	$image = "https://objectstorage.ap-sydney-1.oraclecloud.com/n/sdwpma8thrwk/b/elrahmaan-assets/o/" . $nameFile;
	$sql = "INSERT INTO products (name, category, price, image, stock) VALUES ('$name', '$category', '$price', '$image', '$stock')";
	//use for MySQLi OOP
	if ($conn->query($sql)) {
		$_SESSION['success'] = 'Produk Berhasil Ditambahkan';
	}
	///////////////

	//use for MySQLi Procedural
	// if(mysqli_query($conn, $sql)){
	// 	$_SESSION['success'] = 'Member added successfully';
	// }
	//////////////

	else {
		$_SESSION['error'] = 'Something went wrong while adding';
	}
} else {
	$_SESSION['error'] = 'Fill up add form first';
}

header('location: index.php');
