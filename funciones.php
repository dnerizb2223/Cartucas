<?php

function uploadImages(){

    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES['imgCarta']['name']);
    //$image = $target_file;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES['imgCarta']['size']);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES['imgCarta']['tmp_name'] , $target_file)) {
            //echo "The file ". htmlspecialchars( basename( $_FILES['imgCarta']['name'])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    return $target_file;
}

?>