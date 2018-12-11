<?php
/**
 * Created by PhpStorm.
 * User: f16008040
 * Date: 11/12/2018
 * Time: 09:03
 */

require_once 'require.php';

$url = $_SERVER['REQUEST_URI'];

if (strpos($url,'index.php') !== false)
    HomeController::display();
elseif (strpos($url,'movie.php') !== false)
    MovieController::display();
elseif (strpos($url,'actor.php') !== false)
    ActorController::display();
elseif (strpos($url,'director.php') !== false)
    DirectorController::display();
elseif (strpos($url,'creaPerson.php') !== false)
    CreaActorController::display();
elseif (strpos($url,'inserPerson.php') !== false)
    CreaActorController::save();
elseif (strpos($url,'creaFilm.php') !== false)
    CreaFilmController::display();