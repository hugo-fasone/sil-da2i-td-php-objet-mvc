<?php
/**
 * Created by PhpStorm.
 * User: f16008040
 * Date: 11/12/2018
 * Time: 08:57
 */

class MovieController{
    static function display(){
        $movie = new Movie($_GET['id']);
        getBlock('view/MovieView.php',array('movie' => $movie));
    }
}