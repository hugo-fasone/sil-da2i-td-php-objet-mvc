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

        $BD = $GLOBALS['BD'];
        $query = 'INSERT INTO person (lastname, firstname, birthDate, biography) VALUES (:lastname, :firstname, :birthDate, :biography)';
        $BD->prepare($query);
        $queryParam = [':lastname' => $lastname,':firstname' => $firstname, ':birthDate' => $birthDate, ':biography' => $biography];
        $BD->query($queryParam);

        getBlock('view/HomeView.php?success=1');
    }

    static function display(){
        getBlock('view/CreaActorView.php');
    }
}