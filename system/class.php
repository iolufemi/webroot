<?php 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include('config.php');
include('ps_pagination.php');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * toLetLagos
 * 
 * This class is for an online propety advertisement website.
 * Feel free to use and modify.
 * 
 * Needs config.php which contains the database connection variables and ps_pagination.php for pagination.
 *
 * 
 * @package toletlagos
 * @author Olanipekun Israel Olufemi
 * @copyright 2012
 * @version 1.0
 * @access public
 * @link http://facebook.com/olanipekun.i.olufemi
 */
 
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
class toLetLagos{
    
    //TODO: function reportUser
    //TODO: function errorMessage

var $con;
var $location;
var $sort = "DESC";
var $userid;


/**
 * toLetLagos::__construct()
 * initials the class
 * @param mixed $userid1
 * @return void
 */
function __construct(){
if(empty($_SESSION['userid'])){
    session_name('toletlagos');
    $_SESSION['userid'] = 0;
    $_SESSION['email'] = "Guest";
    $_SESSION['usertype'] = 0;
}
$this->userid = $_SESSION['userid'];
}


/**
 * toLetLagos::getUserid()
 * userid
 * @return int 
 */
function getUserid(){
    return $this->userid;
}


 
/**
 * toLetLagos::checkLogin()
 * 
 * Check if a any user is already logged in
 * 
 * @return boolean
 */
function checkLogin(){
    if ($this->userid <= 0){
        return 0;
    }else{
        return 1;
    }
}

/**
 * toLetLagos::getUseridFUN()
 * returns userid from for a given email
 * @param mixed $username
 * @return int
 */
function getUseridFUN($email){
    $query = "SELECT `user_id` FROM `users` WHERE `email` = '".$email."'";
    $send = mysql_query($query);
    $result = mysql_fetch_array($send);
    return $result;
}

/**
 * toLetLagos::getUseridFE()
 * Alias of toLetLagos::getUseridFUN()
 * returns userid from for a given email
 * @param mixed $email
 * @return int
 */
function getUseridFE($email){
    $result = toLetLagos::getUseridFUN($email);
    return $result;
}

/**
 * toLetLagos::getUsername()
 * returns the username from the database
 * @return String
 */
function getUsername(){
    $query = "SELECT `username` FROM `users` WHERE `user_id` = '".$this->userid."'";
    $send = mysql_query($query);
    $result = mysql_fetch_row($send);
    return $result;
}

/**
 * toLetLagos::getEmail()
 * Alias of toLetLagos::getUsername()
 * returns the username from the database
 * @return String
 */
function getEmail(){
    $result = toLetLagos::getUsername();
    return $result;
}

/**
 * toLetLagos::connect()
 * connects to the mysql database
 * @return void
 */
function connect(){
    global $host,$username,$password,$database;
	$this->con = mysql_connect($host,$username,$password);
	if(!$this->con){
		die('Cannot connect to server at the moment');
	}else{
		mysql_select_db($database);
	}
}


/**
 * toLetLagos::disconnect()
 * disconnects from the mysql database
 * @return void
 */
function disconnect(){
	mysql_close($this->con);
}

/**
 * toLetLagos::post()
 * updates a post to the database
 * @param mixed $houseType
 * @param mixed $houseDescription
 * @param mixed $price
 * @param mixed $totalPrice
 * @param mixed $houseAddress
 * @param mixed $location
 * @param mixed $categry
* @return boolean
 */
function post($houseType,$houseDescription,$price,$totalPrice,$houseAddress,$location,$categry){
    $query = "INSERT INTO `users`(`houseType`,`houseDescription`,`price`,`totalPrice`,`houseAddress`,`user_id`,`location`,`category`) VALUES('".$houseType."','".$houseDescription."','".$price."','".$totalPrice."','".$houseAddress."','".$this->userid."','".$location."','".$categry."')";
    $send = mysql_query($query);
    if(!$send){
        $sta = 0;
        echo("Action Failed please contact administrator ".mysql_error()."");
        return $sta;
    }else{
        $sta = 1;
        return $sta;
    }
    
}

/**
 * toLetLagos::viewAllHouses()
 * returns all propertys as an array
 * @return array
 */
function viewAllHouses(){
    $query = "SELECT * FROM `house`";
    $query .= " ORDER BY `house_id` ".$this->sort."";
    $page = new PS_Pagination($query,10,5,"");
    $run = $page->paginate();
    $result = mysql_fetch_array($run);
    return $result;
   
}


/**
 * toLetLagos::search()
 * searchs with the given parameters
 * @param mixed $keyword
 * @param mixed $location
 * @param mixed $category
 * @param mixed $pricerange
 * @return array
 */
function search($keyword,$location,$category,$pricerange){
  //  $query = "SELECT * FROM `houses` WHERE `location` = '".$location."' AND `category` = '".$category."' AND `priceRange` = '".$pricerange."' AND `description` LIKE '%".$keyword."%'";
    $query = "SELECT * FROM `houses`";
    if(isset($location) || isset($category) || isset($pricerange) || isset($keyword)){
        $query .= " WHERE";
    }
    if(isset($location)){
        $query .= " `location` = '".$location."'";
    }
    if(isset($category)){
        if(isset($location)){
           $query .= " AND"; 
        }
        
        $query .= " `category` = '".$category."'";
    }
    if(isset($pricerange)){
        if(isset($category)){
           $query .= " AND"; 
        }
        $query .= " `priceRange` = '".$pricerange."'";
    }
    if(isset($keyword)){
        if(isset($pricerange)){
           $query .= " AND"; 
        }
        $query .= " `description` LIKE '%".$keyword."%'";
    }
    
    $query .= " ORDER BY `house_id` ".$this->sort."";
    $send = mysql_query($query);
    $result = mysql_fetch_array($send);
    return $result;
}

/**
 * toLetLagos::viewDetails()
 * returns array
 * @param mixed $post_id
 * @return array
 */
function viewDetails($post_id){
    $query = "SELECT * FROM `houses` WHERE `house_id` = '".$post_id."'";
    $send = mysql_query($query);
    $result = mysql_fetch_array($send);
    return $result;
}

/**
 * toLetLagos::veiwHousesByUser()
 * Gets list of houses posted by the user from the database.
 * @param mixed $userid
 * @return array
 */
function veiwHousesByUser($userid){
    $query = "SELECT * FROM `houses` WHERE `user_id` = '".$userid."'";
    $query .= " ORDER BY `house_id` ".$this->sort."";
    $send = mysql_query($query);
    $result = mysql_fetch_array($send);
    return $result;
}


/**
 * toLetLagos::signIn()
 *  used for authentication and sets the session variables.
 * @param mixed $email
 * @param mixed $password
 * @return boolean
 */
function signIn($email,$password){
    $query = "SELECT * FROM `users` WHERE `email` = '".$email."' AND `secretCode` = '".$password."'";
    $send = mysql_query($query);
    $num = mysql_num_rows($send);
    $result = mysql_fetch_array($send);
    $userid = toLetLagos::getUseridFUN($email);
    $_SESSION['email'] = $email;
    $_SESSION['userid'] = $userid;
    $_SESSION['usertype'] = $result['userType'];
    if($num = 0){
        $sta = 0;
        return $sta;
    }else{
        $sta = 1;
        return $sta;
    }
}

/**
 * toLetLagos::logIn()
 * Allias for toLetLagos::signIn()
 * used for authentication and sets the session variables.
 * @param mixed $email
 * @param mixed $password
 * @return boolean
 */
function logIn($email,$password){
    $result = toLetLagos::signIn($email,$password);
    return $result;
}

/**
 * toLetLagos::signUp()
 * use to add new user to the database.
 * @param mixed $firstName
 * @param mixed $lastName
 * @param mixed $companyName
 * @param mixed $companyAddress
 * @param mixed $phoneNumber
 * @param mixed $email
 * @param mixed $secretCode1
 * @return boolean
 */
function signUp($firstName,$lastName,$companyName,$companyAddress,$phoneNumber,$email,$secretCode1){
    $emailVerificationCode = md5($firstName.$lastName.$secretCode);
    $secretCode = md5($secretCode1);
    $query = "INSERT INTO `users`(`firstName`,`lastName`,`companyName`,`companyAddress`,`phoneNumber`,`email`,`secretCode`,`emailVerificationCode`) VALUES ('".$firstName."','".$lastName."','".$companyName."','".$companyAddress."','".$phoneNumber."','".$email."','".$secretCode."','".$emailVerificationCode."')";
    $send = mysql_query($query);
    if(!$send){
        $sta = 0;
        return $sta;
    }else{
        $sta = 1;
        return $sta;
    }
}

/**
 * toLetLagos::register()
 * Alias for toLetLagos::signUp()
 *  use to add new user to the database.
 * @param mixed $firstName
 * @param mixed $lastName
 * @param mixed $companyName
 * @param mixed $companyAddress
 * @param mixed $phoneNumber
 * @param mixed $email
 * @param mixed $secretCode1
 * @return boolean
 */
function register($firstName,$lastName,$companyName,$companyAddress,$phoneNumber,$email,$secretCode1){
    $result = toLetLagos::signUp($firstName,$lastName,$companyName,$companyAddress,$phoneNumber,$email,$secretCode1);
    return $result;
}

/**
 * toLetLagos::signOut()
 * Distroys all session variables
 * @return void
 */
function signOut(){
    session_unset();
    session_unregister('toletlagos');
    session_destroy();
    header("location:index.php");
    
}

/**
 * toLetLagos::notification()
 * 
 * This function displays notifications
 * insert the message to be displayed and the type of message to be displayed.
 * message type can be info, success, error, warning. the default is info.
 * 
 * @param mixed $message
 * @param mixed $type
 * @return boolean
 */
function notification($message, $type='info'){
    switch($type){
        case 'info':
        $header = "Information";
        $class = "info";
        break;
        
        case 'success':
        $header = "Success!";
        $class = "success";
        break;
        
        case 'warning':
        $header = "Warning!";
        $class = "warning";
        break;
        
        case 'error':
        $header = "Error!";
        $class = "error";
        break;
        
        default:
        $header = "Information";
        $class = "info";
        break;
        
    }
    
    echo('<div class="message '.$class.'">
                                <h5>'.$header.'</h5>
                                <p>
                                    '.$message.'
                                </p>
                            </div>');
                            return 1;
}

/**
 * toLetLagos::warning()
 * 
 * Displays a warning
 * 
 * @param mixed $message
 * @return boolean
 */
function warning($message){
    $this->notification($message,"warning");
    return 1;
}

/**
 * toLetLagos::info()
 * 
 * Displays an information
 * 
 * @param mixed $message
 * @return boolean
 */
function info($message){
    $this->notification($message,"info");
    return 1;
}

/**
 * toLetLagos::success()
 * 
 * Displays a success message
 * 
 * @param mixed $message
 * @return boolean
 */
function success($message){
    $this->notification($message,"success");
    return 1;
}

/**
 * toLetLagos::error()
 * 
 * Displays an error
 * 
 * @param mixed $message
 * @return
 */
function error($message){
    $this->notification($message,"error");
    return 1;
}

/**
 * toLetLagos::logOut()
 * Alias for toLetLagos::signOut()
 * Distroys all session variables
 * @return void
 */
function logOut(){
    toLetLagos::signOut();
}



function reportUser($userid,$reason){
    $query = "UPDATE `users` SET `report` = 'report + 1' WHERE `id` = '".$userid."';
                INSERT into `reports`(`reportingUser`,`reportedUser`,`reason`) VALUES('".$this->userid."','".$userid."','".$reason."')";
    $send = mysql_query($query);
}

function uploadLogo($filename,$filesize,$filetmplc,$filetype){
    if ($filename == ""){
		return $status = 0;
		}
	if ($filesize > 1048576){
		//echo ("File Too Large!!!");
		return $status = 0;
				}
				else {
					if (file_exists("../img/logos/".$filename."")){
						//echo ("File Already Exists on Server!!!");
						return $status = 0;
						}
						else {
							$move = move_uploaded_file($filetmplc, "../uploadimgs/".$filename."");
							if ($move){
								//echo ("Your File Have Been Uploaded!!");
								
								return $status = 1;
								}
								else {
									//echo("Critical Error Occured!<br />Upload Failed!!<br />\"Make Sure the File Size is Below 1Mb\"");
									return $status = 0;
									}
							}
					
					}
    
}

function saveImageLocation($type,$filename){
    $userId = $this->userid;
}

//////////////////////////////////////////////ADMIN PANEL CODES////////////////////////////////////////////////////

function postAd($position,$filename,$filesize,$filetmplc,$filetype){
    
    if ($filename == ""){
		return $status = 0;
		}
	if ($filesize > 1048576){
		//echo ("File Too Large!!!");
		return $status = 0;
				}
				else {
					if (file_exists("../img/logos/".$filename."")){
						//echo ("File Already Exists on Server!!!");
						return $status = 0;
						}
						else {
							$move = move_uploaded_file($filetmplc, "../uploadimgs/".$filename."");
							if ($move){
								//echo ("Your File Have Been Uploaded!!");
								
								return $status = 1;
								}
								else {
									//echo("Critical Error Occured!<br />Upload Failed!!<br />\"Make Sure the File Size is Below 1Mb\"");
									return $status = 0;
									}
							}
					
					}
    
}

function setVIPUsers(){
    
}

function setVIPUser($userid){
    
}

function setVerifiedUsers(){
    
}

function blockUser(){
    
}

function blockUsers(){
    
}

function activateUser(){
    
}

function activateUsers(){
    
}

function unblockUser(){
    
}

function unblockUsers(){
    
}

function addUser(){
    
}

function updateMetaTags(){
    
}

function veiwAllUsers(){
    
}


}

?>