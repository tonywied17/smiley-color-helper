<?php

$uploadDirectory = "./smileys/";

if (!is_dir($uploadDirectory)) {

  mkdir($uploadDirectory, 0755, true);

}



$response = array();



if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

  $tempPath = $_FILES['image']['tmp_name'];

  $fileName = $_FILES['image']['name'];



  $targetPath = $uploadDirectory . basename($fileName);



  if (move_uploaded_file($tempPath, $targetPath)) {

    $response['success'] = true;

    $response['fileName'] = $fileName;

  } else {

    $response['success'] = false;

    $response['error'] = "Error moving uploaded file.";

  }

} else {

  $response['success'] = false;

  $response['error'] = "No file uploaded or error occurred during upload.";

}



header('Content-Type: application/json');

echo json_encode($response);




?>