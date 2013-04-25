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
 * Include the project class
 * */
 include('../system/class.php');

/**
 * Call new smarty object
 * */
$smarty = new Smarty;

/**
 * Call new toletlagos object
 * */
 $toletlagos = new toLetLagos;
 
 #lets check login status
 $loginStatus = $toletlagos->checkLogin();

/**
 * Include the Header 
 * */
include('controller/header.php');
/**
 * Call each page file as needed.
 * Use get variables to call the pages
 * */
 
 /**
  * Grab the get variable
  * */
  @$getVar = $_GET['page'];
  
  #what happens of their is no get variable
  
  if(empty($getVar) || $getVar == ''){
    
    switch($loginStatus){
        case 1:
        include('controller/home.php');
        break;
        
        case 0:
        include('controller/login.php');
        break;
        
        default:
        include('controller/login.php');
        break;
        
    }
    
  }else{
    $filePath = "controller/$getVar.php";
    if (!file_exists($filePath)){
       $toletlagos->warning("The requested page does not exist.<br />Contact Administrator.");
       
       switch($loginStatus){
        case 1:
        include('controller/home.php');
        break;
        
        case 0:
        include('controller/login.php');
        break;
        
        default:
        include('controller/login.php');
        break;
        
    }
    
    }else{
        include($filePath);
         }
  }


/**
 * Include the footer
 * */
include('controller/footer.php');
?>