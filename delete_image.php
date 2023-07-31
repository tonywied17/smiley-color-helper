<?php

header('Content-Type: application/json');



if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $imageToDelete = $_POST["image"];



  $dir = './smileys/';

  $filePath = $dir . $imageToDelete;



  if (file_exists($filePath)) {

    if (unlink($filePath)) {

      $response['success'] = true;

      $response['message'] = 'Image deleted successfully.';

    } else {

      $response['success'] = false;

      $response['error'] = 'Failed to delete image.';

    }

  } else {

    $response['success'] = false;

    $response['error'] = 'Image not found.';

  }



  echo json_encode($response);

}

?>

