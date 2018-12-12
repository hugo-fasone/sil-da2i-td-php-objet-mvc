<header>
    <nav>

        <a href="director.php?person=<?php
        foreach ($data as $pls){
            if ($pls['role'] == 'director')
                echo $pls['id'];

        } ?>">Réal</a>
    </nav>
</header>