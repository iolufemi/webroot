<?php
/**
 * Include the language file
 * Note: This can be changed to any suitable language file for another language.
 * */
include('language/english/footer.php');

$smarty->assign('footer_link',$footer_link);
$smarty->assign('footer',$footer);
$smarty->display('../templates/footer.tpl');

 ?>