<?php getBlock('view/header_bis.php') ?>
<div class="inli">
    <h2>Films</h2>
    <ul>
        <?php

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

        echo ' <div class="inli">
                <h2>Création</h2><ul>';
        echo '    <li><a href="creaPerson.php">Créer une personne</a></li>';
        echo '    <li><a href="creaFilm.php">Créer un film</a></li>';
        echo '    </ul></div>';


        ?>

</body>
</html>