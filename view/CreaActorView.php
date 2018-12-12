<?php getBlock('view/header_bis.php') ?>
<form action="inserPerson.php" method="post" enctype="multipart/form-data">
    <label>Prénom : </label><input type="text" name="firstname"><br>
    <label>Nom : </label><input type="text" name="lastname"><br>
    <label>Date de naissance :</label><input type="date" name="birthDate"><br>
    <label>Biographie :</label><input type="text" name="biography"><br>
    <label>Image </label><input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" name="Valider">
</form>