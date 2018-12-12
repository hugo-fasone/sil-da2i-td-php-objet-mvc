<?php

class CreaFilmController {
    static function save(){
        if (isset($_POST['title']) && !is_null($_POST['title']))
            $title = $_POST['title'];
        else
            $title = NULL;

        if (isset($_POST['releaseDate']) && !is_null($_POST['releaseDate']))
            $releaseDate = $_POST['releaseDate'];
        else
            $releaseDate = NULL;

        if (isset($_POST['synopsis']) && !is_null($_POST['synopsis']))
            $synopsis = $_POST['synopsis'];
        else
            $synopsis = NULL;

        if (isset($_POST['actor1']) && !is_null($_POST['actor1']))
            $actor1 = $_POST['actor1'];
        else
            $actor1 = NULL;

        if (isset($_POST['actor2']) && !is_null($_POST['actor2']))
            $actor2 = $_POST['actor2'];
        else
            $actor2 = NULL;

        if (isset($_POST['actor3']) && !is_null($_POST['actor3']))
            $actor3 = $_POST['actor3'];
        else
            $actor3 = NULL;

        if (isset($_POST['actor4']) && !is_null($_POST['actor4']))
            $actor4 = $_POST['actor4'];
        else
            $actor4 = NULL;

        if (isset($_POST['director']) && !is_null($_POST['director']))
            $director = $_POST['director'];
        else
            $director = NULL;



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



        $actors = array($actor1,$actor2,$actor3,$actor4);


        Movie::insert($title,$releaseDate,$synopsis,$director,$actors,$target_file);


        header('Location: index.php');

    }

    static function display(){
        $persons = Person::getAllPerson();
        getBlock('view/CreaFilmView.php',array('persons' => $persons));
    }
}