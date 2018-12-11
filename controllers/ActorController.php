<?php
/**
 * Created by PhpStorm.
 * User: f16008040
 * Date: 11/12/2018
 * Time: 08:58
 */



class ActorController{
    static function display(){
        $idPerson = $_GET['person'];
        $person = new Actor($idPerson);
        getBlock('view/ActorView.php',array('person'=>$person));
    }
}