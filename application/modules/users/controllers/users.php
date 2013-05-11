<?php

class Users extends MX_Controller
{
    

function __construct() {
parent::__construct();
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

function get_where_custom($col, $value) {
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

function admin_login_submit(){
    $data = $this->get_form_data();
    $username = $data['username'];
    $password = md5($data['password']);
    $usercheck = $this->count_where('username',$username);
    $passcheck = $this->count_where('password',$password);
    if($usercheck > 0 && $passcheck > 0){
        session_start();
        session_name('toletlagos');
        $_SESSION['user_token'] = base64_encode($username);
        redirect('users/admin_dashboard');
    }else{
        $data['alert_type'] = 'error';
        $data['alert_message'] = 'Stop! Wrong Username or Password';
        $this->load->module('template');
        $views = array('admin_login');
        $data['pagetitle'] = "Error, Please Try Again | Admin Login";
        $this->template->buildview($views,$data);
        
    }
    
}

function get_form_data(){
    $data = $this->input->post();
    return $data;
}

function admin_login(){
    $data['pagetitle'] = "Admin Login";
    $this->load->module('template');
    $views = array('admin_login');
    $this->template->buildview($views,$data);
}



function register(){
    $data['pagetitle'] = "Register";
    $this->load->module('template');
    $views = array('registration_form');
    $this->template->buildview($views,$data);
}
// TODO: I stopped here and will continue later.
 // TODO: Do the validation
function registration_submit(){
    $this->form_validation->set_rules('title', 'Title', 'required|min_length[3]|xss_clean');
}

}

?>