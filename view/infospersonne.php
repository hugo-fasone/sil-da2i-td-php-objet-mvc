<?php

echo '<h1>'. $data[0]['firstname'] . ' ' . $data[0]['lastname'] . '</h1>
<figure>
    <img src="'. $data[1]['path'] .'">
    <figcaption>'. $data[1]['legend'] .'</figcaption>
</figure>
<time datetime="'. $data[0]['birthDate'] .'"> '. $data[0]['birthDate'] .' </time>
<h2>Biographie</h2>
<p>'. $data[0]['biography'] .'</p>';
echo '<h2>Filmographie</h2>';

if (!is_array($data[2][0])){
    echo '<a href="movie.php?id='.$data[2]['id'].'">'.$data[2]['title'].'</a>';
} else{
    foreach ($data[2] as $pls){

        echo '<a href="movie.php?id='.$pls['id'].'">'.$pls['title'].'</a><br>';
    }
}
//echo '<a href="movie.php?id='.$data[2]['id'].'">'.$data[2]['title'].'</a>';



?>
