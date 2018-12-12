<?php getBlock('view/header_bis.php') ?>

<?php

getBlock('view/infospersonne.php',array($data['person']->getPersonById(),$data['person']->getPictureByPerson(), $data['person']->getPersonFilmo()));
//getBlock('filmo.php');?>
</body>
</html>