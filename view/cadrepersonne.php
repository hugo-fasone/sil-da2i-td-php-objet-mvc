<?php
$person = new Person($data['id']);
$picture = $person->getPictureByPerson();
?>
<figure>
    <img src="<?php echo $picture['path'] ?>">
    <figcaption><?php echo $data['firstname'].' '.$data['lastname']?></figcaption>
</figure>
