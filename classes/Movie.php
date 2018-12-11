<?php
/**
 * Created by PhpStorm.
 * User: f16008040
 * Date: 14/11/2018
 * Time: 09:18
 */


class Movie
{
    private $id;
    private $title;
    private $releaseDate;
    private $synopsis;
    private $rating;

    /**
     * Movie constructor.
     * @param $id
     * @param $title
     * @param $releaseDate
     * @param $synopsis
     * @param $rating
     */
    public function __construct($id)
    {
        $this->id = $id;
        $data = $this->getBaseInfo($id);
        $this->title = $data['title'];
        $this->releaseDate = $data['releaseDate'];
        $this->synopsis = $data['synopsis'];
        $this->rating = $data['rating'];
    }

    function getBaseInfo($idMovie){

        $BD = $GLOBALS['BD'];

        $query = 'SELECT `id`, `title`,`releaseDate`,`synopsis`,`rating`
          FROM `movie` WHERE id = :id';
        $BD->prepare($query);
        $queryParam = [':id' => $this->id];
        $BD->query($queryParam);
        $array = $BD->fetch();
        return $array;

    }

    function getPersonByFilm(){


        $BD = $GLOBALS['BD'];

        $query = 'SELECT `id`, `lastname`,`firstname`,`birthDate`,`biography`, `role` 
              FROM `person` JOIN `movieHasPerson` ON person.id=movieHasPerson.idPerson
              WHERE `idMovie` = :id';
        $BD->prepare($query);
        $queryParam = [':id' => $this->id];
        $BD->query($queryParam);
        $array = $BD->fetch();
        return $array;

    }

    static function getAllMovies(){

        $BD = $GLOBALS['BD'];

        $query = 'SELECT `id`, `title`,`releaseDate`,`synopsis`,`rating`
              FROM `movie` ';
        $BD->prepare($query);
        $queryParam = [];
        $BD->query($queryParam);
        $array = $BD->fetch();
        return $array;
    }


    function getFilmById(){

        $BD = $GLOBALS['BD'];

        $query = 'SELECT `title`,`releaseDate`,`synopsis`,`rating` FROM `movie` WHERE `id` = :id';
        $BD->prepare($query);
        $queryParam = [':id' => $this->id];
        $BD->query($queryParam);
        $array = $BD->fetch();
        return $array;
    }


    function getPictureByFilm(){

        $BD = $GLOBALS['BD'];

        $query = 'SELECT `path`,`legend`,`type`
              FROM `picture` JOIN `movieHasPicture` ON picture.id=movieHasPicture.idPicture
              WHERE `idMovie` = :id';
        $BD->prepare($query);
        $queryParam = [':id' => $this->id];
        $BD->query($queryParam);
        $array = $BD->fetch();
        return $array;
    }
}