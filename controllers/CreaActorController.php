<?php

class CreaActorController{
    static function save(){
        if (isset($_POST['firstname']))
            $firstname = $_POST['firstname'];
        else
            $firstname = NULL;

        if (isset($_POST['lastname']))
            $lastname = $_POST['lastname'];
        else
            $lastname = NULL;

        if (isset($_POST['birthDate']))
            $birthDate = $_POST['birthDate'];
        else
            $birthDate = NULL;

        //if (isset($_POST['firstname']))
        //    $firstname = $_POST['firstname'];
        //else
        //    $firstname = NULL;

        if (isset($_POST['biography']))
            $biography = $_POST['biography'];
        else
            $biography = NULL;

        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        Person::insert($lastname,$firstname,$birthDate,$biography,$target_file);

        header('Location: index.php');
    }

    static function display(){
        getBlock('view/CreaActorView.php');
    }
}