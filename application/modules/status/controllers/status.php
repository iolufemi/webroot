<?php
// TODO: Start Working on This.
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Status
 * 
 * @package   
 * @author Olanipekun Olufemi  
 * @copyright Olanipekun Olufemi
 * @version 2013
 * @access public
 */
class Status extends MX_Controller
{

/**
 * Status::__construct()
 * 
 * @return
 */
function __construct() {
parent::__construct();
}

/**
 * Status::index()
 * 
 * @return
 */
function index(){
    $this->read_all_ui();
}

/**
 * Status::get()
 * 
 * @param mixed $order_by
 * @return
 */
function get($order_by){
$this->load->model('mdl_status');
$query = $this->mdl_status->get($order_by);
return $query;
}

/**
 * Status::get_with_limit()
 * 
 * @param mixed $limit
 * @param mixed $offset
 * @param mixed $order_by
 * @return
 */
function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_status');
$query = $this->mdl_status->get_with_limit($limit, $offset, $order_by);
return $query;
}

/**
 * Status::get_where()
 * 
 * @param mixed $id
 * @return
 */
function get_where($id){
$this->load->model('mdl_status');
$query = $this->mdl_status->get_where($id);
return $query;
}

/**
 * Status::get_where_custom()
 * 
 * @param mixed $col
 * @param mixed $value
 * @return
 */
function get_where_custom($col, $value) {
$this->load->model('mdl_status');
$query = $this->mdl_status->get_where_custom($col, $value);
return $query;
}

/**
 * Status::_insert()
 * 
 * @param mixed $data
 * @return
 */
function _insert($data){
$this->load->model('mdl_status');
$this->mdl_status->_insert($data);
}

/**
 * Status::_update()
 * 
 * @param mixed $id
 * @param mixed $data
 * @return
 */
function _update($id, $data){
$this->load->model('mdl_status');
$this->mdl_status->_update($id, $data);
}

/**
 * Status::_delete()
 * 
 * @param mixed $id
 * @return
 */
function _delete($id){
$this->load->model('mdl_status');
$this->mdl_status->_delete($id);
}

/**
 * Status::count_where()
 * 
 * @param mixed $column
 * @param mixed $value
 * @return
 */
function count_where($column, $value) {
$this->load->model('mdl_status');
$count = $this->mdl_status->count_where($column, $value);
return $count;
}

/**
 * Status::get_max()
 * 
 * @return
 */
function get_max() {
$this->load->model('mdl_status');
$max_id = $this->mdl_status->get_max();
return $max_id;
}

/**
 * Status::_custom_query()
 * 
 * @param mixed $mysql_query
 * @return
 */
function _custom_query($mysql_query) {
$this->load->model('mdl_status');
$query = $this->mdl_status->_custom_query($mysql_query);
return $query;
}

/*
* My Stuff
*/

//CRUD Read 
/**
 * Status::read()
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
 * Status::read_all()
 * 
 * @return
 */
function read_all(){
    $result = $this->get('id');
    return $result;
}

/**
 * Status::read_all_ui()
 * 
 * @return
 */
function read_all_ui(){
    
    $data['query'] = $this->read_all();
    $data['pagetitle'] = 'User Status';
    $this->load->module('template');
    $this->template->buildview(array('status'),$data);
}

// get all data in the form fields
/**
 * Status::get_form_data()
 * 
 * @return
 */
function get_form_data(){
    $data = $this->input->post();
    return $data;
}

//CRUD create and update processor
/**
 * Status::submit()
 * 
 * @return
 */
function submit(){
    $data = $this->get_form_data();
    if(empty($data['id']) || !isset($data['id'])){
    //lets check if the status already exists
    $check = $this->count_where('status',$data['status']);
    if($check > 0){
        $data['alert_type'] = 'error';
        $data['alert_message'] = 'This status already exist';
        $data['pagetitle'] = 'Error! This status already exist';
        $this->load->module('template');
        $this->template->buildview(array('addstatus'),$data);
    }else{
        $this->_insert($data);
        unset($data);
        redirect('status/read_all_ui');
    }
    
    }else{
        if(isset($data['id'])){
        $this->_update($data['id'],$data);
        unset($data);
        redirect('status/read_all_ui');
        }
    }
    
}

//CRUD Create
/**
 * Status::create()
 * 
 * @return
 */
function create(){
    $id = $this->uri->segment(3);
    if(is_numeric($id)){
       $query = $this->get_where($id);
       foreach($query->result() as $col){
        $data['id'] = $col->id;
        $data['status']  = $col->status;
        $data['description'] = $col->description;
       }
    }
    $data['pagetitle'] = 'Add Status';
    $this->load->module('template');
    $this->template->buildview(array('addstatus'),$data);
}

//CRUD Delete
/**
 * Status::delete()
 * 
 * @return
 */
function delete(){
    $id = $this->uri->segment(3);
    $this->_delete($id);
    redirect('status/read_all_ui');
}

}

?>