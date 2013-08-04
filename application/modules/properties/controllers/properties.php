<?php

class Properties extends MX_Controller
{

function __construct() {
parent::__construct();
}

function get($order_by){
$this->load->model('mdl_properties');
$query = $this->mdl_properties->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_properties');
$query = $this->mdl_properties->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id){
$this->load->model('mdl_properties');
$query = $this->mdl_properties->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_properties');
$query = $this->mdl_properties->get_where_custom($col, $value);
return $query;
}

function get_where_like($field,$key){
$this->load->model('mdl_properties');
$query = $this->mdl_properties->get_where_like($field,$key);
return $query;
}


function _insert($data){
$this->load->model('mdl_properties');
$this->mdl_properties->_insert($data);
}

function _update($id, $data){
$this->load->model('mdl_properties');
$this->mdl_properties->_update($id, $data);
}

function _delete($id){
$this->load->model('mdl_properties');
$this->mdl_properties->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_properties');
$count = $this->mdl_properties->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_properties');
$max_id = $this->mdl_properties->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_properties');
$query = $this->mdl_properties->_custom_query($mysql_query);
return $query;
}

//Let's start cruds here

function create(){
    $this->load->module('template');
    
    $this->template->buildview(array('createProperty'));
}

function read(){
    
}

function readOne(){
    
}

function update(){
    
}

function delete(){
    
}

function search(){
    
}

}

?>