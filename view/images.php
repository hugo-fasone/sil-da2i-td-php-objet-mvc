<section class="imagesfilm">
    <?php
    if (is_array($data[0])){
        echo '<p>Images du film</p>';
        foreach ($data as $jpp){
            if ($jpp['type'] == 'gallery'){
                echo '<figure>
                            <img src="'.$jpp['path'].'">
                            <figcaption>'. $jpp['legend'] .'</figcaption>
                    </figure>';
            }
        }
    }
?>
</section>