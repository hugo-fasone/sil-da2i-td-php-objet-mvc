<?php
/**
 * Created by PhpStorm.
 * User: f16008040
 * Date: 14/11/2018
 * Time: 09:18
 */
include_once 'Person.php';

class Director extends Person
{
    public function __construct($id)
    {
        parent::__construct($id);
    }

    public function getBaseInfo($idPerson)
    {
        return parent::getBaseInfo($idPerson); // TODO: Change the autogenerated stub
    }

    function getPersonById()
    {
        return parent::getPersonById(); // TODO: Change the autogenerated stub
    }

    function getPictureByPerson()
    {
        return parent::getPictureByPerson(); // TODO: Change the autogenerated stub
    }

    function getPersonFilmo()
    {
        return parent::getPersonFilmo(); // TODO: Change the autogenerated stub
    }


    static function getAllDirectors(){


        $BD = $GLOBALS['BD'];

        $query = 'SELECT DISTINCT `id`, `lastname`,`firstname`,`birthDate`,`biography`, `role` 
              FROM `person` JOIN `movieHasPerson` ON person.id=movieHasPerson.idPerson
              WHERE role=\'director\'';

        $BD->prepare($query);
        $queryParam = [];
        $BD->query($queryParam);
        $array = $BD->fetch();
        return $array;
    }


}