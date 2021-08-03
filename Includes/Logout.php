<?php 

session_start();

session_unset();

session_destroy();


header("Location:../signin.php?See You soon");


?>