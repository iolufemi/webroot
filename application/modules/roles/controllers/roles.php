<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Roles
 * 
 * @package   
 * @author Olanipekun Olufemi  
 * @copyright Olanipekun Olufemi 
 * @version 2013
 * @access public
 */
class Roles extends MX_Controller
{

/**
 * Roles::__construct()
 * 
 * @return
 */
function __construct() {
parent::__construct();
}

/**
 * Roles::index()
 * 
 * @return
 */
function index(){
    $this->read_all_ui();
}

/**
 * Roles::get()
 * 
 * @param mixed $order_by
 * @return
 */
function get($order_by){
$this->load->model('mdl_roles');
$query = $this->mdl_roles->get($order_by);
return $query;
}

/**
 * Roles::get_with_limit()
 * 
 * @param mixed $limit
 * @param mixed $offset
 * @param mixed $order_by
 * @return
 */
function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_roles');
$query = $this->mdl_roles->get_with_limit($limit, $offset, $order_by);
return $query;
}

/**
 * Roles::get_where()
 * 
 * @param mixed $id
 * @return
 */
function get_where($id){
$this->load->model('mdl_roles');
$query = $this->mdl_roles->get_where($id);
return $query;
}

/**
 * Roles::get_where_custom()
 * 
 * @param mixed $col
 * @param mixed $value
 * @return
 */
function get_where_custom($col, $value) {
$this->load->model('mdl_roles');
$query = $this->mdl_roles->get_where_custom($col, $value);
return $query;
}

/**
 * Roles::_insert()
 * 
 * @param mixed $data
 * @return
 */
function _insert($data){
$this->load->model('mdl_roles');
$this->mdl_roles->_insert($data);
}

/**
 * Roles::_update()
 * 
 * @param mixed $id
 * @param mixed $data
 * @return
 */
function _update($id, $data){
$this->load->model('mdl_roles');
$this->mdl_roles->_update($id, $data);
}

/**
 * Roles::_delete()
 * 
 * @param mixed $id
 * @return
 */
function _delete($id){
$this->load->model('mdl_roles');
$this->mdl_roles->_delete($id);
}

/**
 * Roles::count_where()
 * 
 * @param mixed $column
 * @param mixed $value
 * @return
 */
function count_where($column, $value) {
$this->load->model('mdl_roles');
$count = $this->mdl_roles->count_where($column, $value);
return $count;
}

/**
 * Roles::get_max()
 * 
 * @return
 */
function get_max() {
$this->load->model('mdl_roles');
$max_id = $this->mdl_roles->get_max();
return $max_id;
}

/**
 * Roles::_custom_query()
 * 
 * @param mixed $mysql_query
 * @return
 */
function _custom_query($mysql_query) {
$this->load->model('mdl_roles');
$query = $this->mdl_roles->_custom_query($mysql_query);
return $query;
}

/*
* My Stuff
*/

//CRUD Read 
/**
 * Roles::read()
 * 
 * @param mixed $id
 * @return
 */
function read($id){
    $data = $this->get_where($id);
    return $data;
}

//CRUD Read All
/**
 * Roles::read_all()
 * 
 * @return
 */
function read_all(){
    $result = $this->get('id');
    return $result;
}

/**
 * Roles::read_all_ui()
 * 
 * @return
 */
function read_all_ui(){
    
    $data['query'] = $this->read_all();
    $data['pagetitle'] = 'Roles';
    $this->load->module('template');
    $this->template->buildview(array('roles'),$data);
}

// get all data in the form fields
/**
 * Roles::get_form_data()
 * 
 * @return
 */
function get_form_data(){
    $data = $this->input->post();
    return $data;
}

//CRUD create and update processor
/**
 * Roles::submit()
 * 
 * @return
 */
function submit(){
    $data = $this->get_form_data();
    if(empty($data['id']) || !isset($data['id'])){
    //lets check if the role already exists
    $check = $this->count_where('role',$data['role']);
    if($check > 0){
        $data['alert_type'] = 'error';
        $data['alert_message'] = 'This role already exist';
        $data['pagetitle'] = 'Error! This role already exist';
        $this->load->module('template');
        $this->template->buildview(array('addroles'),$data);
    }else{
        $this->_insert($data);
        unset($data);
        redirect('roles/read_all_ui');
    }
    
    }else{
        if(isset($data['id'])){
        $this->_update($data['id'],$data);
        unset($data);
        redirect('roles/read_all_ui');
        }
    }
    
}

//CRUD Create
/**
 * Roles::create()
 * 
 * @return
 */
function create(){
    $id = $this->uri->segment(3);
    if(is_numeric($id)){
       $query = $this->get_where($id);
       foreach($query->result() as $col){
        $data['id'] = $col->id;
        $data['role']  = $col->role;
        $data['description'] = $col->description;
       }
    }
    $data['pagetitle'] = 'Add Role';
    $this->load->module('template');
    $this->template->buildview(array('addroles'),$data);
}

//CRUD Delete
/**
 * Roles::delete()
 * 
 * @return
 */
function delete(){
    $id = $this->uri->segment(3);
    $this->_delete($id);
    redirect('roles/read_all_ui');
}


}

?>