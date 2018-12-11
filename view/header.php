<header>
    <nav>
        <a href="index.php">Index</a>
        <a href="director.php?person=<?php
        foreach ($data as $pls){
            if ($pls['role'] == 'director')
                echo $pls['id'];

        } ?>">Réal</a>
    </nav>
</header>