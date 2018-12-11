<?php

class CreaFilmController {
    static function save(){

    }

    static function display(){
        $persons = Person::getAllPerson();
        getBlock('view/CreaFilmView.php',array('persons' => $persons));
    }
}