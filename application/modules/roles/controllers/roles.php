<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Roles extends MX_Controller
{

function __construct() {
parent::__construct();
}

function get($order_by){
$this->load->model('mdl_roles');
$query = $this->mdl_roles->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_roles');
$query = $this->mdl_roles->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id){
$this->load->model('mdl_roles');
$query = $this->mdl_roles->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_roles');
$query = $this->mdl_roles->get_where_custom($col, $value);
return $query;
}

function _insert($data){
$this->load->model('mdl_roles');
$this->mdl_roles->_insert($data);
}

function _update($id, $data){
$this->load->model('mdl_roles');
$this->mdl_roles->_update($id, $data);
}

function _delete($id){
$this->load->model('mdl_roles');
$this->mdl_roles->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_roles');
$count = $this->mdl_roles->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_roles');
$max_id = $this->mdl_roles->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_roles');
$query = $this->mdl_roles->_custom_query($mysql_query);
return $query;
}

/*
* My Stuff
*/

//CRUD Read 
function read($id){
    $data = $this->get_where($id);
    return $data;
}

//CRUD Read All
function read_all(){
    $data = $this->get('id');
    return $data;
}

function read_all_ui(){
    
}

// get all data in the form fields
function get_form_data(){
    $data = $this->input->post();
    return $data;
}

//CRUD create processor
function submit(){
    $data = $this->get_form_data();
    //lets check if the role already exists
    $check = $this->count_where('role',$data['role']);
    if($check > 0){
        $data['alert_type'] = 'error';
        $data['alert_message'] = 'This role already exist';
        $data['pagetitle'] = 'Error! This role already exist';
        $this->load->module('template');
        $this->template->buildview(array('addroles'),$data);
    }else{
        $this->_insert($role);
        unset($data['role']);
        $data['alert_type'] = 'success';
        $data['alert_message'] = 'Role Added';
        $data['pagetitle'] = 'Success! Role Added';
        $this->load->module('template');
        $this->template->buildview(array('addroles'),$data);
    }
    
}

//CRUD Create
function create(){
    $data['pagetitle'] = 'Add Role';
    $this->load->module('template');
    $this->template->buildview(array('addroles'),$data);
}

//CRUD Update
function update($id){
    
}


}

?>