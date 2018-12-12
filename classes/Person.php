<?php
/**
 * Created by PhpStorm.
 * User: f16008040
 * Date: 14/11/2018
 * Time: 09:18
 */

require_once 'BD.php';
class Person
{
    private $id;
    private $lastname;
    private $firstname;
    private $birthDate;
    private $biography;

    /**
     * Person constructor.
     * @param $id
     * @param $lastname
     * @param $firstname
     * @param $birthDate
     * @param $biography
     */
    public function __construct($id)
    {
        $this->id = $id;
        $data = $this->getBaseInfo($id);
        $this->lastname = $data['lastname'];
        $this->firstname = $data['firstname'];
        $this->birthDate = $data['birthDate'];
        $this->biography = $data['biography'];
    }

    public function getBaseInfo($idPerson){

        $BD = $GLOBALS['BD'];

        $query = 'SELECT `id`, `lastname`,`firstname`,`birthDate`,`biography`
              FROM `person` WHERE id = :id';
        $BD->prepare($query);
        $queryParam = [':id' => $idPerson];
        $BD->query($queryParam);
        $array = $BD->fetch();
        return $array;
    }

    static function getAllPerson(){

        $BD = $GLOBALS['BD'];

        $query = 'SELECT `id`, `lastname`,`firstname`,`birthDate`,`biography`
              FROM `person`';
        $BD->prepare($query);
        $queryParam = [];
        $BD->query($queryParam);
        $array = $BD->fetch();
        return $array;
    }


    function getPersonById(){


        $BD = $GLOBALS['BD'];

        $query = 'SELECT `id`, `lastname`,`firstname`,`birthDate`,`biography` FROM `person` WHERE `id` = :id';
        $BD->prepare($query);
        $queryParam = [':id' => $this->id];
        $BD->query($queryParam);
        $array = $BD->fetch()[0];
        return $array;
    }



    function getPictureByPerson(){


        $BD = $GLOBALS['BD'];

        $query = 'SELECT `legend`,`path`
              FROM `picture` JOIN `personHasPicture` ON picture.id=personHasPicture.idPicture
              WHERE `idPerson` = :id';
        $BD->prepare($query);
        $queryParam = [':id' => $this->id];
        $BD->query($queryParam);
        $array = $BD->fetch()[0];
        return $array;
    }

    function getPersonFilmo(){
        $BD = $GLOBALS['BD'];

        $query = 'SELECT `id`, `title`
              FROM  `movieHasPerson` JOIN `movie` ON movieHasPerson.idMovie=movie.id
              WHERE `idPerson` = :id';
        $BD->prepare($query);
        $queryParam = [':id' => $this->id];
        $BD->query($queryParam);
        $array = $BD->fetch();
        return $array;
    }

    static function insert($lastname,$firstname,$birthDate,$biography,$target_file){
        $BD = $GLOBALS['BD'];
        $query = 'INSERT INTO person (lastname, firstname, birthDate, biography) VALUES (:lastname, :firstname, :birthDate, :biography)';
        $BD->prepare($query);
        $queryParam = [':lastname' => $lastname,':firstname' => $firstname, ':birthDate' => $birthDate, ':biography' => $biography];
        $BD->query($queryParam);

        $idPerson = $BD->lastInsertId();

        $query = 'INSERT INTO picture (path, legend) VALUES (:path, :legend)';
        $BD->prepare($query);
        $queryParam = [':path' => $target_file,':legend' => $firstname . ' ' . $lastname];
        $BD->query($queryParam);

        $id = $BD->lastInsertId();

        $query = 'INSERT INTO personHasPicture (idPerson, idPicture) VALUES (:idPerson, :idPicture)';
        $BD->prepare($query);
        $queryParam = [':idPerson' => $idPerson,':idPicture' => $id];
        $BD->query($queryParam);
    }
}