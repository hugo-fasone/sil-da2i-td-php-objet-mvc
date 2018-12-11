<!DOCTYPE html>
<html>
<head>
    <title>Le Film</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
    <?php



    getBlock('view/header.php',$data['movie']->getPersonByFilm()); ?>
    <main>
        <aside>
            <div class="testinline real">
                <p class="decal">Réalisé par :</p>

                <?php

                foreach ($data['movie']->getPersonByFilm() as $oui) {
                    if ($oui['role'] == 'director'){
                        getBlock('view/cadrepersonne.php',$oui);
                    }
                }

                ?>
            </div>
            <div class="testinline actors">
                <p class="decal">Acteurs principaux :</p>
                <?php
                $i = 2;
                foreach ($data['movie']->getPersonByFilm() as $item) {
                    if ($item['role'] == 'actor'){
                        if ($i%2 == 0){
                            echo '<div class="inli">';
                            getBlock('view/cadrepersonne.php',$item);

                        } else{
                            getBlock('view/cadrepersonne.php',$item);
                            echo '</div>';
                        }
                        ++$i;
                    }
                }

                ?>
            </div>
        </aside>

        <?php
        $movie = new Movie($_GET['id']);

        getBlock('view/infosfilm.php',array($data['movie']->getFilmById(), $data['movie']->getPersonByFilm(),$data['movie']->getPictureByFilm()));
        getBlock('view/images.php',$data['movie']->getPictureByFilm());
        ?>


    </main>
    <?php getBlock('view/footer.php');?>
</div>
</body>
</html>