<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Users
 * User class that handles all basic user operation. depends on the role class and the status class
 * @package   
 * @author Olanipekun Olufemi
 * @copyright Olanipekun Olufemi
 * @version 2013
 * @access public
 */
class Users extends MX_Controller
{
    
/**
 * Users::__construct()
 * 
 * @return
 */
function __construct(){
parent::__construct();
}

/**
 * Users::index()
 * 
 * @return
 */
function index(){
   $this->allusers();
}

/**
 * Users::get()
 * 
 * @param mixed $order_by
 * @return
 */
function get($order_by){
$this->load->model('mdl_users');
$query = $this->mdl_users->get($order_by);
return $query;
}

/**
 * Users::get_with_limit()
 * 
 * @param mixed $limit
 * @param mixed $offset
 * @param mixed $order_by
 * @return
 */
function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_users');
$query = $this->mdl_users->get_with_limit($limit, $offset, $order_by);
return $query;
}

/**
 * Users::get_where()
 * 
 * @param mixed $id
 * @return
 */
function get_where($id){
$this->load->model('mdl_users');
$query = $this->mdl_users->get_where($id);
return $query;
}

/**
 * Users::get_where_like()
 * 
 * @param mixed $field
 * @param mixed $key
 * @return
 */
function get_where_like($field,$key){
$this->load->model('mdl_users');
$query = $this->mdl_users->get_where_like($field,$key);
return $query;
}

/**
 * Users::get_where_custom()
 * 
 * @param mixed $col
 * @param mixed $value
 * @return
 */
function get_where_custom($col, $value){
$this->load->model('mdl_users');
$query = $this->mdl_users->get_where_custom($col, $value);
return $query;
}

/**
 * Users::_insert()
 * 
 * @param mixed $data
 * @return
 */
function _insert($data){
$this->load->model('mdl_users');
$this->mdl_users->_insert($data);
}

/**
 * Users::_update()
 * 
 * @param mixed $id
 * @param mixed $data
 * @return
 */
function _update($id, $data){
$this->load->model('mdl_users');
$this->mdl_users->_update($id, $data);
}

/**
 * Users::_delete()
 * 
 * @param mixed $id
 * @return
 */
function _delete($id){
$this->load->model('mdl_users');
$this->mdl_users->_delete($id);
}

/**
 * Users::count_where()
 * 
 * @param mixed $column
 * @param mixed $value
 * @return
 */
function count_where($column, $value) {
$this->load->model('mdl_users');
$count = $this->mdl_users->count_where($column, $value);
return $count;
}

/**
 * Users::get_max()
 * 
 * @return
 */
function get_max() {
$this->load->model('mdl_users');
$max_id = $this->mdl_users->get_max();
return $max_id;
}

/**
 * Users::_custom_query()
 * 
 * @param mixed $mysql_query
 * @return
 */
function _custom_query($mysql_query) {
$this->load->model('mdl_users');
$query = $this->mdl_users->_custom_query($mysql_query);
return $query;
}

/**
 * Users::admin_login_submit()
 * Processes the login process
 * @return boolean
 */
function admin_login_submit(){
    $data = $this->get_form_data();
    $username = @$data['username'];
    $password = $this->makeHash(@$data['password']);
    //check for cookie
    $sweetcookie = $this->input->cookie('tll_token');
    $sessiondata = $this->session->all_userdata();

    
    if(@$sessiondata['token']){
        $getval = $this->get_where_custom('verificationcode',$sessiondata['token']);
        foreach($getval->result() as $getvals){
        $password = $getvals->password;
        $username = $getvals->username;
        $email = $getvals->email;
        $role = $getvals->role;
        $id = $getvals->id;
        $status = $getvals->status;
        }
        $usercheck = $this->count_where('username',$username);
        $passcheck = $this->count_where('password',$password);
        $token = $this->makeHash($username.$email);
    }elseif(@$sweetcookie){
        $getval = $this->get_where_custom('verificationcode',$sweetcookie);
        //$getvals = $getval->result();
        foreach($getval->result() as $getvals){
        $password = $getvals->password;
        $username = $getvals->username;
        $email = $getvals->email;
        $role = $getvals->role;
        $id = $getvals->id;
        $status = $getvals->status;
        }
        $usercheck = $this->count_where('username',$username);
        $passcheck = $this->count_where('password',$password);
        $token = $this->makeHash($username.$email);
    }elseif(empty($sessiondata['token']) && empty($sweetcookie)){
    $usercheck = $this->count_where('username',$username);
    $passcheck = $this->count_where('password',$password);
     // get the email from database
    $useremail = $this->get_where_custom('username',$username);
    foreach($useremail->result() as $theemail){
    $email = $theemail->email;
    $role = $theemail->role;
    $id = $theemail->id;
    $status = $theemail->status;
    }
    $token = $this->makeHash($username.@$email);
    }
    
    if($usercheck > 0 && $passcheck > 0){
        $this->load->module('status');
        $status_ = $this->status->read($status);
        foreach($status_->result() as $row_){
            $allow = $row_->allow;
        }
        if($allow == 1){
        $this->session->set_userdata('token',$token);
        $this->session->set_userdata('role',$role);
       $this->session->set_userdata('user_id',$id);
        $this->session->set_userdata('username',$username);
        /*redirect('users/admin_dashboard');*/
        if(isset($data['rememberme']) || @$data['rememberme'] == "rememberme"){
        //cookie active for one week
        $this->input->set_cookie('token',$token,'604800');
        }
        return true;
        }
        if($allow == 2){
        redirect('users/suspendedUser');
        return false;
        }else{
            redirect('users/sendVerificationCode');
            return false;
        }
        
    
        
        /*$data['alert_type'] = 'success';
        $data['alert_message'] = 'You have successfully logged in';
        $this->load->module('template');
        $views = array('admin_login');
        $data['pagetitle'] = "You have successfully logged in";
        $this->template->buildview($views,$data);*/
    }else{
        /*$data['alert_type'] = 'error';
        $data['alert_message'] = 'Stop! Wrong Username or Password';
        $this->load->module('template');
        $views = array('admin_login');
        $data['pagetitle'] = "Error, Please Try Again | Admin Login";
        $this->template->buildview($views,$data,false);*/
        return false;
        
    }
    
}

/**
 * Users::suspendedUser()
 * Generates the view to suspend a user
 * @return 
 */
function suspendedUser(){
    $data['pagetitle'] = "Your account has been suspended";
        $data['alert_type'] = 'warning';
        $data['alert_message'] = 'Your account has been suspended';
        $this->load->module('template');
        $this->template->admin_header($data);
        $this->template->suspendedUser($data);
        $this->template->admin_footer($data);
        
}

// get all data in the form fields
/**
 * Users::get_form_data()
 * Gets all submited form post data as an array
 * @return array
 */
function get_form_data(){
    $data = $this->input->post();
    return $data;
}

//display the admin login page
/*function admin_login(){
    $data['pagetitle'] = "Admin Login";
    $this->load->module('template');
    $views = array('admin_login');
    $this->template->buildview($views,$data,false);
}*/


// display the registration page
/**
 * Users::register()
 * Generates the registration form view
 * @return
 */
function register(){
    $id = $this->uri->segment(3);
    
    if(is_numeric($id)){
        $data['pagetitle'] = "Update User";
        $data['id'] = $id;
        $query = $this->read($id);
        foreach($query->result() as $row){
            $data['username'] = $row->username;
            $data['firstname'] = $row->firstname;
            $data['lastname'] = $row->lastname;
            $data['sex'] = $row->sex;
            $data['email'] = $row->email;
            $data['phone'] = $row->phone;
            $data['address'] = $row->address;
            $data['role'] = $row->role;
        }
    }else{
        $data['pagetitle'] = "Register";
    }
    $this->load->module('template');
    /*$views = array('registration_form');
    $this->template->buildview($views,$data);*/
        
    $this->template->admin_header($data);
    if(!$this->admin_login_submit()){
        
    }else{
        $this->template->admin_menu($data);
    }
    $this->template->registration_form($data);
    $this->template->admin_footer($data);
}

 // process the submited registration details(Create and Update))
/**
 * Users::registration_submit()
 * Process the registration data
 * @return
 */
function registration_submit(){
    $data = $this->get_form_data();
    $password = $this->makeHash($data['password']);
    unset($data['password']);
     $data['password'] = $password;
     $data['verificationcode'] = $this->makeHash($data['username'].$data['email']);
     $address = trim($data['address']);
     unset($data['address']);
     $data['address'] = $address;
    unset($data['password2']);
    if(isset($data['id']) || @$data['id'] != ""){
        $this->_update($data['id'],$data);
        redirect('users');
    }else{
        $countuser = $this->count_where('username',$data['username']);
        $countemail = $this->count_where('email',$data['email']);
        if($countemail > 0 || $countuser > 0){
            $data['pagetitle'] = "Warninng! This Username or Email has been taken";
            $data['alert_type'] = 'warning';
            $data['alert_message'] = 'Warninng! This Username or Email has been taken';
            $this->load->module('template');
           /* $views = array('registration_form');
            $this->template->buildview($views,$data);*/
            
            $this->template->admin_header($data);
            $this->template->registration_form($data);
            $this->template->admin_footer($data);
        }else{
            $this->_insert($data);
        $data['pagetitle'] = "Success! You have been registered";
        $data['alert_type'] = 'success';
        $data['alert_message'] = 'Success! You have been registered<br />Please, Check your email to activate.';
        
        // send Email Verification email
        $this->email->from('your@example.com', 'Your Name');
        $this->email->to($data['email']); 
        
        $this->email->subject('Please, Verify Your Registration On Our Website');
        $this->email->message('Please, Click on the link to continue. '.base_url('users/verify/'.$data['verificationcode'].'').'');	
        
        $this->email->send();
        redirect('users');
                }
    }
    
}



/**
 * Users::verify()
 * Generates the verification view 
 * @return
 */
function verify()
{
    $this->session->sess_destroy();
    delete_cookie('token');
    $data['status'] = '2';
    $thecode = $this->uri->segment(3);
    $check = $this->count_where('verificationcode',$thecode);
    if($check > 0)
    {
      $query = $this->get_where_custom('verificationcode',$thecode);
    foreach($query->result() as $result)
    {
        $this->_update($result->id,$data);
    } 
    $data['pagetitle'] = "Congratulations! Your account has been verified";
        $data['alert_type'] = 'success';
        $data['alert_message'] = 'Your account has been verified!<br />Click <a href="'.base_url('users').'">here</a> to login.';
        $this->load->module('template');
        $this->template->admin_header($data);
        $this->template->verificationPage($data);
        $this->template->admin_footer($data); 
    }
    else
    {
         $data['pagetitle'] = "Sorry! Your verification code is incorrect!";
        $data['alert_type'] = 'error';
        $data['alert_message'] = 'Your verification code is incorrect!<br />Click <a href="'.base_url('users/sendVerificationCode').'">here to get the correct code.';
        $this->load->module('template');
        $this->template->admin_header($data);
        $this->template->verificationPage($data);
        $this->template->admin_footer($data);
    }
    
   
}

/**
 * Users::sendVerificationCode()
 * Let user request for his/her verification code.
 * @return
 */
function sendVerificationCode(){
    $data = $this->get_form_data();
    $submitedemail = $data['email'];
    if(isset($submitedemail) && strlen($submitedemail) > 0){
         $query_ = $this->get_where_custom('email',$submitedemail);
        foreach($query_->result() as $row_){
            $verificationcode_ = $row_->verificationcode;
        }
        redirect('users/sendVerificationCode/'.$verificationcode_.'');
    }
    $code = $this->uri->segment(3);
    
    if (isset($code) && strlen($code) > 0){
        $query = $this->get_where_custom('verificationcode',$code);
        foreach($query->result() as $row){
            $verificationcode = $row->verificationcode;
            $email = $row->email;
        }
        // send Email Verification email
        $this->email->from('your@example.com', 'Your Name');
        $this->email->to($email); 
        
        $this->email->subject('Please, Verify Your Registration On Our Website');
        $this->email->message('Please, Click on the link to continue. '.base_url('users/verify/'.$verificationcode.'').'');	
        
        $this->email->send();
        
        $data['pagetitle'] = "Your verification code has been sent to your email address!";
        $data['alert_type'] = 'success';
        $data['alert_message'] = 'Please, Check your email for the verification code.';
        $this->load->module('template');
        $this->template->admin_header($data);
        $this->template->verificationSent($data);
        $this->template->admin_footer($data);
        
    }else{
        $data['pagetitle'] = "Enter your email address.";
        $this->load->module('template');
        $this->template->admin_header($data);
        $this->template->verificationForm($data);
        $this->template->admin_footer($data);
    }
    
}


//CRUD Read 
/**
 * Users::read()
 * get user data by id form db
 * @param mixed $id
 * @return object
 */
function read($id){
    $data = $this->get_where($id);
    return $data;
}

//CRUD Read All
/**
 * Users::read_all()
 * get all user data from db
 * @return object
 */
function read_all($limit,$offset){
    $result = $this->get_with_limit($limit,$offset,'id');
    return $result;
}

function all(){
    $query = $this->get('id');
    return $query;
}

/**
 * Users::allusers()
 * generates all user view
 * @return
 */
function allusers(){
    $offset = $this->uri->segment(3);
    if(!$offset){
        $offset = 0;
    }
    $allusers = $this->all();
    $data['query'] = $this->read_all(100,$offset);
    $data['pagetitle'] = "Users";
    $this->load->module('template');
    $views = array('users');
    $config['base_url'] = base_url('users/allusers/');
    $config['total_rows'] = count($allusers->result('array'));
    $config['per_page'] = 100;     
    $this->pagination->initialize($config);     
    $data['pagination'] = $this->pagination->create_links();
    $this->template->buildview($views,$data);
}

/**
 * Users::search()
 * searches for a user in the db and generates the view
 * @return
 */
function search(){
    $data = $this->get_form_data();
    $data['query'] = $this->get_where_like('username',$data['search']);
    $data['pagetitle'] = "Users";
    $this->load->module('template');
    $views = array('users');
    $this->template->buildview($views,$data);
}

function searchemail(){
    $data = $this->get_form_data();
    $data['query'] = $this->get_where_like('email',$data['email']);
    $data['pagetitle'] = "Users";
    $this->load->module('template');
    $views = array('users');
    $this->template->buildview($views,$data);
}

/**
 * Users::delete()
 * deletes a user
 * @return
 */
function delete(){
    $id = $this->uri->segment(3);
    $this->_delete($id);
    redirect('users');
}

/**
 * Users::logout()
 * logout a user
 * @return
 */
function logout(){
    $this->session->sess_destroy();
    delete_cookie('token');
    redirect('users');
}

/**
 * Users::makeHash()
 * generate a secure hash string from a sring and a salt
 * @param mixed $data
 * @param string $salt
 * @return string
 */
function makeHash($data, $salt = "hjdf794DHNJ347rm)&^GejsrkD216/*a"){
    
    /* Really? I think this is a little crazy, but not too crazy though..  */
    
    $secString = "";
    $hashData = do_hash($data);
    $hashSalt = do_hash($salt);
    $secString .= $hashData;
    $secString .= $hashSalt;
    $secString .= $hashData;
    
    $hash = do_hash($secString);
    $secHash = do_hash($hash);
    $token = do_hash($secHash);
   // echo $token."<br />";
    return $token;
    
}

/**
 * Users::lostPassword()
 * let user request for a new password
 * @return
 */
function lostPassword(){
    $data = $this->get_form_data();
    $submitedemail = $data['email'];
    if(isset($submitedemail) && strlen($submitedemail) > 0){
        $query_ = $this->get_where_custom('email',$submitedemail);
        foreach($query_->result() as $row_){
            $verificationcode_ = $row_->verificationcode;
        }
        redirect('users/lostPassword/'.$verificationcode_.'');
    }
    $code = $this->uri->segment(3);
    
    if (isset($code) && strlen($code) > 0){
        $query = $this->get_where_custom('verificationcode',$code);
        foreach($query->result() as $row){
            $verificationcode = $row->verificationcode;
            $email = $row->email;
        }
        // send Email Verification email
        $this->email->from('your@example.com', 'Your Name');
        $this->email->to($email); 
        
        $this->email->subject('Password Reset');
        $this->email->message('Please, Click on the link to reset your password. '.base_url('users/newPassword/'.$verificationcode.'').'');	
        
        $this->email->send();
        
        $data['pagetitle'] = "A password reset link has been sent to your email address!";
        $data['alert_type'] = 'success';
        $data['alert_message'] = 'Please, Check your email for the Password Reset Link.';
        $this->load->module('template');
        $this->template->admin_header($data);
        $this->template->passwordResetSent($data);
        $this->template->admin_footer($data);
        
    }else{
        $data['pagetitle'] = "Enter your email address.";
        $this->load->module('template');
        $this->template->admin_header($data);
        $this->template->passwordResetForm($data);
        $this->template->admin_footer($data);
    }
}

/**
 * Users::newPassword()
 * generates a new password and sends it to the user
 * @return
 */
function newPassword(){
    $code = $this->uri->segment(3);
    if (isset($code) && strlen($code) > 0){
        $query = $this->get_where_custom('verificationcode',$code);
        foreach($query->result() as $row){
            $user_id = $row->id;
            $email = $row->email;
            $username = $row->username;
        }
        $newpassword = random_string();
        echo $newpassword;
        $newpasswordhash = $this->makeHash($newpassword);
        $data['password'] = $newpasswordhash;
        $this->_update($user_id,$data);
        $this->email->from('your@example.com', 'Your Name');
        $this->email->to($email); 
        
        $this->email->subject('Here is your new password');
        $this->email->message('Please, login with this new details \n Username: '.$username.' \n '.$newpassword.'' );	
        
        $this->email->send();
        
        $data['pagetitle'] = "A password reset link has been sent to your email address!";
        $data['alert_type'] = 'success';
        $data['alert_message'] = 'Please, Check your email for new password.';
        $this->load->module('template');
        $this->template->admin_header($data);
        $this->template->passwordResetSent($data);
        $this->template->admin_footer($data);
        //redirect('users/register/'.$user_id.'');
    }else{
        redirect('users');
    }
}

/**
 * Users::updateUserStatus()
 * generates view for changing a user status
 * @return
 */
function updateUserStatus(){
    $data['id'] = $this->uri->segment(3);
    $data['status'] = $this->uri->segment(4);
    $data_ = $this->get_form_data();
    if(@$data_['statusupdate'] == 'update'){  
        unset($data_['statusupdate']);
        unset($data);
        $data = $data_;
       
    $query = $this->_update($data['id'],$data);
    redirect('users');
    }else{
        $data['pagetitle'] = "Update User Status";
    
        $this->load->module('template');
        $this->template->admin_header($data);
        $this->template->updateUserStatus($data);
        $this->template->admin_footer($data);
    }
}

/**
 * Users::addAvi()
 * generates view to upload an avatar picture
 * @return
 */
function addAvi(){
    
    /*if(isset($data['userfile'])){*/
    $config['upload_path'] = './uploads/avatars';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']	= '1024';
    $config['file_name']	= $this->session->userdata('token');
    $config['overwrite']	= TRUE;
    $this->upload->initialize($config);
    $upload_ = $this->upload->do_upload();
    
    $error = $this->upload->display_errors();
    if($upload_){
        $query = $this->get_where_custom('verificationcode',$this->session->userdata('token'));
        foreach($query->result() as $row){
            $id = $row->id;
        }
        $upload_data = $this->upload->data();
        $fullpath = $upload_data['file_name'];
        $data['avatar'] = $fullpath;
        $this->_update($id,$data);
        redirect('users');
    }else{
        $data['alert_type'] = 'error';
        $data['alert_message'] = $error;
    }
   /* }*/
   $data['pagetitle'] = "Update Your Avatar";
    $this->load->module('template');
    $this->template->buildview(array('updateAvi'),$data);
}

/**
 * Users::getAvi()
 * gets the current user avatar
 * @param mixed $width
 * @param mixed $height
 * @return string
 */
function getAvi($width,$height){
    $query = $this->get_where_custom('verificationcode',$this->session->userdata('token'));
    foreach($query->result() as $row){
        $avi = $row->avatar;
    }
    if($avi){
    $urlarray = explode('.',$avi);
    $urlarray['0'] .= '_'.$width.'by'.$height.'';
    $aviurlnew = implode('.',$urlarray);
    
    $config['image_library'] = 'gd2';
    $config['source_image']	= 'uploads/avatars/'.$avi.'';//$aviurl;
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']	 = $width;
    $config['height']	= $height;
    $config['thumb_marker']	= '_'.$width.'by'.$height.'';
    
    $this->load->library('image_lib', $config); 
    
    $this->image_lib->resize();
    
    $aviurl = base_url('uploads/avatars/'.$aviurlnew.'');
    return $aviurl;
    }else{
        
        return false;
    }
}

/**
 * Users::theAvi()
 * generates html tag for the avatar image and echos it.
 * @return boolean
 */
function theAvi(){
    $aviurl = $this->getAvi(27,27);
    if(!$aviurl){
    echo '<img src="'.base_url('img/img-profile.jpg').'" class = "avi"  alt="Profile Pic" />';
    }else{
    echo '<img src="'.$aviurl.'" class = "avi"  alt="Profile Pic" />';
    }
    return true;
}

/**
 * Users::updateUserRole()
 * generates view for changing a user role
 * @return
 */
function updateUserRole(){
    $data['id'] = $this->uri->segment(3);
    $data['role'] = $this->uri->segment(4);
    $data_ = $this->get_form_data();
    if(@$data_['roleupdate'] == 'update'){  
        unset($data_['roleupdate']);
        unset($data);
        $data = $data_;
       
    $query = $this->_update($data['id'],$data);
    redirect('users');
    }else{
        $data['pagetitle'] = "Update User Role";
    
        $this->load->module('template');
        $this->template->admin_header($data);
        $this->template->updateUserRole($data);
        $this->template->admin_footer($data);
    }
}

/**
 * Users::accessLocker()
 * use 0 to accept all users and the respective role id for other users
 * @param mixed $role
 * @return boolean
 */
function accessLocker($role){
    $userrole = $this->session->userdata('role');
    if($role != $userrole){
        if($role == 0){
            return true;
        }elseif($userrole == 1){
            return true;
        }else{
        $data['alert_type'] = 'error';
        $data['alert_message'] = 'You do not have sufficient permission to access this page.<br /> Contact Administrator.';
        $this->load->module('template');
        $this->template->accessDenied($data);
        return false;
        }
    }else{
        return true;
    }
    
}

}

?>