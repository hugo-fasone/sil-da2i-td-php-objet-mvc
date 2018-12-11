<?php
class HomeController {
    static function display(){
        $movies = Movie::getAllMovies();
        $acteurs = Actor::getAllActors();
        $reals = Director::getAllDirectors();
        getBlock('view/HomeView.php',array('movies' => $movies,'acteurs' => $acteurs,'reals' => $reals));
    }
}

