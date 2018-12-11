<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Person</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<form action="inserPerson.php" method="post">
    <label>Prénom : </label><input type="text" name="firstname"><br>
    <label>Nom : </label><input type="text" name="lastname"><br>
    <label>Date de naissance :</label><input type="date" name="birthDate"><br>
    <label>Biographie</label><input type="text" name="biography"><br>
    <input type="submit" name="Valider">
</form>