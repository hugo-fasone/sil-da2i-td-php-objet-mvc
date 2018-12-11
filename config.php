<?php
/**
 * Created by PhpStorm.
 * User: f16008040
 * Date: 10/12/2018
 * Time: 14:53
 */

require 'classes/BD.php';

global $BD;
$BD = new BD();
$host = 'mysql-hugofasone.alwaysdata.net';
$dbname = 'hugofasone_devdyn';
$username = '131384';
$password = 'DBPassword';
$BD->connect($host,$dbname,$username,$password);