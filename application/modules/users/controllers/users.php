<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MX_Controller
{
    
// To make my job easier, let me copy copy this.
function __construct(){
parent::__construct();
}
//this handles the module according to codeigniter
function index(){
   $this->allusers();
}

function get($order_by){
$this->load->model('mdl_users');
$query = $this->mdl_users->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_users');
$query = $this->mdl_users->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id){
$this->load->model('mdl_users');
$query = $this->mdl_users->get_where($id);
return $query;
}

function get_where_custom($col, $value){
$this->load->model('mdl_users');
$query = $this->mdl_users->get_where_custom($col, $value);
return $query;
}

function _insert($data){
$this->load->model('mdl_users');
$this->mdl_users->_insert($data);
}

function _update($id, $data){
$this->load->model('mdl_users');
$this->mdl_users->_update($id, $data);
}

function _delete($id){
$this->load->model('mdl_users');
$this->mdl_users->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_users');
$count = $this->mdl_users->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_users');
$max_id = $this->mdl_users->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_users');
$query = $this->mdl_users->_custom_query($mysql_query);
return $query;
}
// TODO: Add Cookie Support
// TODO: Add ability to login with session
// let's process the submited form data
function admin_login_submit(){
    $data = $this->get_form_data();
    $username = $data['username'];
    $password = md5($data['password']);
    //check for cookie
    $sweetcookie = $this->input->cookie('tll_token');
    $sessiondata = $this->session->all_userdata();
    //print_r($sessiondata);
    if(@strlen($sessiondata['token']) > 0){
        $getval = $this->get_where_custom('verificationcode',$sessiondata['token']);
        //$getvals = $getval->result();
        foreach($getval->result() as $getvals){
        $usercheck = $this->count_where('username',$getvals->username);
        $passcheck = $this->count_where('password',$getvals->password);
        $username = $getvals->username;
        $email = $getvals->email;
        $role = $getvals->role;
        $id = $getvals->id;
        }
    }else{
    if(strlen($sweetcookie) > 0){
        $getval = $this->get_where_custom('verificationcode',$sweetcookie);
        //$getvals = $getval->result();
        foreach($getval->result() as $getvals){
        $usercheck = $this->count_where('username',$getvals->username);
        $passcheck = $this->count_where('password',$getvals->password);
        $username = $getvals->username;
        $email = $getvals->email;
        $role = $getvals->role;
        $id = $getvals->id;
        }
    }else{
    $usercheck = $this->count_where('username',$username);
    $passcheck = $this->count_where('password',$password);
    }
    }
    // get the email from database
    $useremail = $this->get_where_custom('username',$username);
    //$theemail = $useremail->result();
    foreach($useremail->result() as $theemail){
    $token = md5($username.$theemail->email);
    $role = $theemail->role;
    $id = $theemail->id;
    }
    
    if(isset($data['rememberme']) || @$data['rememberme'] == "rememberme"){
        //cookie active for one week
        $this->input->set_cookie('token',$token,'604800');
        
    }
    if($usercheck > 0 && $passcheck > 0){
        $this->session->set_userdata('token',$token);
        $this->session->set_userdata('role',$role);
        $this->session->set_userdata('user_id',$id);
        $this->session->set_userdata('username',$username);
        /*redirect('users/admin_dashboard');*/
        return true;
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

// get all data in the form fields
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
function registration_submit(){
    $data = $this->get_form_data();
    $password = md5($data['password']);
    unset($data['password']);
     $data['password'] = $password;
     $data['verificationcode'] = md5($data['username'].$data['email']);
     $address = trim($data['address']);
     unset($data['address']);
     $data['address'] = $address;
    unset($data['password2']);
    if(isset($data['id']) || @$data['id'] != ""){
        $this->_update($data['id'],$data);
    }else{
        $countuser = $this->count_where('username',$data['username']);
        $countemail = $this->count_where('email',$data['email']);
        if($countemail > 0 || $countuser > 0){
            $data['pagetitle'] = "Warninng! This Username or Email has been taken";
            $data['alert_type'] = 'warning';
            $data['alert_message'] = 'Warninng! This Username or Email has been taken';
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
                }
    }
    $this->load->module('template');
   /* $views = array('registration_form');
    $this->template->buildview($views,$data);*/
    
    $this->template->admin_header($data);
    $this->template->registration_form($data);
    $this->template->admin_footer($data);
}

//The user verification function

function verify(){
    $data['status'] = '2';
    $thecode = $this->uri->segment(3);
    $query = $this->get_where_custom('verificationcode',$thecode);
    foreach($query->result() as $result){
        $this->_update($result->id,$data);
    }
    redirect('users');
    // TODO: continue  here
}


//CRUD Read 
function read($id){
    $data = $this->get_where($id);
    return $data;
}

//CRUD Read All
function read_all(){
    $result = $this->get('id');
    return $result;
}

function allusers(){
    $data['query'] = $this->read_all();
    $data['pagetitle'] = "Users";
    $this->load->module('template');
    $views = array('users');
    $this->template->buildview($views,$data);
}

function delete(){
    $id = $this->uri->segment(3);
    $this->_delete($id);
}

function logout(){
    $this->session->sess_destroy();
    delete_cookie('token');
    redirect('users');
}

}

?>