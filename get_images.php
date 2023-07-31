
<?php

header('Content-Type: application/json');



$dir = './smileys/';

$files = scandir($dir);

$imageFiles = array_filter($files, function($file) {

    return pathinfo($file, PATHINFO_EXTENSION) === 'png';

});



echo json_encode(array_values($imageFiles));

?>

