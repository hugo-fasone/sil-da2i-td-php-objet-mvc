<!DOCTYPE html>
<html>
<head>
    <title>Le Film</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="inli"><h2>Films</h2><ul>
        <?php

        if (isset($_GET['success']) && $_GET['success'] == 1)
            echo '<p>La personne est bien enregistrée</p>';

        foreach ($data['movies'] as $movie){
            echo '<li><a href="movie.php?id='.$movie['id'].'">'. $movie['title'] .'</a></li>';
        }
        echo '</ul></div><div class="inli"><h2>Acteurs</h2><ul>';

        foreach ($data['acteurs'] as $person){
            echo '<li><a href="actor.php?person='.$person['id'].'">'. $person['firstname'] . ' ' . $person['lastname'] .'</a></li>';
        }

        echo '</ul></div><div class="inli"><h2>Réalisateurs</h2><ul class="inli">';

        foreach ($data['reals'] as $person){
            echo '<li><a href="director.php?person='.$person['id'].'">'. $person['firstname'] . ' ' . $person['lastname'] .'</a></li>';
        }
        echo '</ul></div>';

        echo '<h2>Création</h2>
                <div class="inli">';
        echo '    <a href="creaPerson.php">Créer une personne</a><br>';
        echo '    <a href="creaFilm.php">Créer un film</a>';
        echo '    </div>';


        ?>

</body>
</html>