<?php
  header("Access-Control-Allow-Origin: *");
 header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
 header("Access-Control-Allow-Headers: Content-Type, Authorization");

    if(isset($_FILES['file']['name'])){

    $filename = $_FILES['file']['name'];

    /* Location */

    $location = "upload/".$filename;

    /* Extension */

    $extension = pathinfo($location,PATHINFO_EXTENSION);

    $extension = strtolower($extension);

    /* Allowed file extensions */

    $allowed_extensions = array("jpg","jpeg","png");

    $response = array();

    $status = 0;

    /* Check file extension */

    if(in_array(strtolower($extension), $allowed_extensions)) {

    /* Upload file */

    if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){

    $status = 1;

    $response['path'] = $location;

    $response['extension'] = $extension;

    $response['name'] = $filename;  

    }

    }

    $response['status'] = $status;

    echo json_encode($response);

    exit;

    }

    echo 0;

?>
