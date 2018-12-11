<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Person</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php

getBlock('view/infospersonne.php',array($data['person']->getPersonById(), $data['person']->getPictureByPerson(), $data['person']->getPersonFilmo()));
//getBlock('filmo.php');?>
</body>
</html>