<?php getBlock('view/header_bis.php') ?>
<form action="inserFilm.php" method="post" enctype="multipart/form-data">
    <label>Titre du film : </label><input type="text" name="title"><br>
    <label>Date de sortie : </label><input type="date" name="releaseDate"><br>
    <label>Synopsis : </label><input type="text" name="synopsis"><br>
    <label>Poster </label><input type="file" name="fileToUpload" id="fileToUpload"><br>
    <label>Réalisateur :</label>
    <select name="director">

        <?php
        echo '<option value=""></option>';
        foreach ($data['persons'] as $person){
            echo '<option value="'.$person['id'].'">'.$person['firstname']. ' '. $person['lastname'].'</option>';
        }

        ?>
    </select><br>
    <?php
    $i = 1;
    while ($i<5){

        echo '<label>Acteur n°'.$i.'</label>';
        echo '<select name="actor'.$i.'">';
        echo '<option value=""></option>';
        foreach ($data['persons'] as $person){
            echo '<option value="'.$person['id'].'">'.$person['firstname']. ' '. $person['lastname'].'</option>';
        }

        echo '</select>';
        ++$i;

    }


    ?>


    <input type="submit" name="Valider">
</form>