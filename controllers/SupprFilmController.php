<?php
/**
 * Created by PhpStorm.
 * User: f16008040
 * Date: 12/12/2018
 * Time: 16:45
 */

class SupprFilmController
{
    static function delete($id){
        Movie::delete($id);
        header('Location: index.php');
    }
}