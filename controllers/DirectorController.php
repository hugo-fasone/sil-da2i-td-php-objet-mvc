<?php
/**
 * Created by PhpStorm.
 * User: f16008040
 * Date: 11/12/2018
 * Time: 08:58
 */


class DirectorController{
    static function display(){
        $idPerson = $_GET['person'];
        $person = new Director($idPerson);
        getBlock('view/DirectorView.php',array('person' => $person));
    }
}