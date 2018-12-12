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
        $array = $BD->fetch()[0];
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

    static function insert($title,$releaseDate,$synopsis,$director,$actors,$target_file){
        $BD = $GLOBALS['BD'];
        $query = 'INSERT INTO movie (title, releaseDate, synopsis) VALUES (:title, :releaseDate, :synopsis)';
        $BD->prepare($query);
        $queryParam = [':title' => $title,':releaseDate' => $releaseDate, ':synopsis' => $synopsis];
        $BD->query($queryParam);

        $idMovie = $BD->lastInsertId();

        $query = 'INSERT INTO movieHasPerson (idMovie, idPerson, role) VALUES (:idMovie, :idPerson, :role)';

        $BD->prepare($query);
        $queryParam = [':idMovie' => $idMovie,':idPerson' => $director, ':role' => 'director'];
        $BD->query($queryParam);

        $BD->prepare($query);
        foreach ($actors as $actor){
            $queryParam = [':idMovie' => $idMovie,':idPerson' => $actor, ':role' => 'actor'];
            $BD->query($queryParam);
        }

        $query = 'INSERT INTO picture (path, legend) VALUES (:path, :legend)';
        $BD->prepare($query);
        $queryParam = [':path' => $target_file,':legend' => ''];
        $BD->query($queryParam);

        $id = $BD->lastInsertId();

        $query = 'INSERT INTO movieHasPicture (idMovie, idPicture, type) VALUES (:idMovie, :idPicture, :type)';
        $BD->prepare($query);
        $queryParam = [':idMovie' => $idMovie,':idPicture' => $id, ':type' => 'poster'];
        $BD->query($queryParam);
    }

    static function delete($id){
        $BD = $GLOBALS['BD'];
        $query = 'DELETE FROM movie WHERE id = :id';
        $BD->prepare($query);
        $queryParam = [':id' => $id];
        $BD->query($queryParam);

        $query = 'DELETE FROM movieHasPerson WHERE idMovie = :id';
        $BD->prepare($query);
        $BD->query($queryParam);

        $query = 'DELETE FROM movieHasPicture WHERE idMovie = :id';
        $BD->prepare($query);
        $BD->query($queryParam);
    }
}