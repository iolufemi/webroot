<?php 

include('../system/smarty/Smarty.class.php');
include('language/english.php');

$smarty = new Smarty;

include('controller/header.php');
include('controller/login.php');
include('controller/footer.php');

?>