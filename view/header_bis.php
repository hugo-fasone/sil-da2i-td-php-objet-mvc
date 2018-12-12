<!DOCTYPE html>
<html>
<head>
    <title>OH HI MARK!</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
$url = $_SERVER['REQUEST_URI'];
if (!strpos($url,'index.php'))
    echo '<a href="index.php">Index</a>';
?>
