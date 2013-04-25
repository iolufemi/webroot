<?php
/**
 * Include the language file
 * Note: This can be changed to any suitable language file for another language.
 * */
include('language/english/header.php');


$smarty->assign('title', $title);
$smarty->assign('username', $username);
$smarty->display('../templates/header.tpl');

 ?>