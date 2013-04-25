<?php 
/**
 * This is the admin index file.
 * 
 * */
 
 /**
  * Include the smarty library
  * */
include('../system/smarty/Smarty.class.php');

/**
 * Call new smarty object
 * */
$smarty = new Smarty;

/**
 * Include the Header 
 * */
include('controller/header.php');
/**
 * Call each page file as needed.
 * Use get variables to call the pages
 * */
include('controller/login.php');

/**
 * Include the footer
 * */
include('controller/footer.php');
?>