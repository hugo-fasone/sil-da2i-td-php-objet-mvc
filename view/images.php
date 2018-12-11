<section class="imagesfilm">
    <p>Images du film</p>
<?php
foreach ($data as $jpp){
    if ($jpp['type'] == 'gallery'){
        echo '<figure>
            <img src="'.$jpp['path'].'">
            <figcaption>'. $jpp['legend'] .'</figcaption>
        </figure>';
    }
}
?>
</section>