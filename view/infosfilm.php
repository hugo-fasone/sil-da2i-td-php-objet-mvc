<section>
    <figure class="figureaffiche">
        <img class="affiche" src="<?php

        foreach ($data[2] as $img){
            if ($img['type'] == 'poster'){
                echo $img['path'];
            }
        }

        ?>">
    </figure>
    <div class="test">
        <h1><?php echo $data[0]['title']?></h1>
        <time datetime="<?php echo $data[0]['releaseDate'] ?>"> <?php echo $data[0]['releaseDate'] ?> </time>
        <p>Note : <meter value="<?php echo $data[0]['rating'] ?>" min="0" max="5"><?php echo $data[0]['rating'] ?></meter></p>
        <p>Acteurs principaux :</p>
        <?php

            foreach ($data[1] as $tamerelapute){
                if ($tamerelapute['role'] == 'actor')
                    echo '<a href="'. 'actor.php?person=' .$tamerelapute['id'] .'">' . $tamerelapute['firstname'] . ' ' . $tamerelapute['lastname'] .'</a>, ';
            }
        ?>
    </div>
</section>

<section>
    <p>Synopsis :</p>
    <p><?php echo $data[0]['synopsis'] ?></p>
</section>
