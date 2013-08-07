<?php

class Categories extends MX_Controller
{

function __construct() {
parent::__construct();
}

function get($order_by){
$this->load->model('mdl_categories');
$query = $this->mdl_categories->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_categories');
$query = $this->mdl_categories->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id){
$this->load->model('mdl_categories');
$query = $this->mdl_categories->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_categories');
$query = $this->mdl_categories->get_where_custom($col, $value);
return $query;
}

function get_where_like($field,$key){
$this->load->model('mdl_categories');
$query = $this->mdl_categories->get_where_like($field,$key);
return $query;
}


function _insert($data){
$this->load->model('mdl_categories');
$this->mdl_categories->_insert($data);
}

function _update($id, $data){
$this->load->model('mdl_categories');
$this->mdl_categories->_update($id, $data);
}

function _delete($id){
$this->load->model('mdl_categories');
$this->mdl_categories->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_categories');
$count = $this->mdl_categories->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_categories');
$max_id = $this->mdl_categories->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_categories');
$query = $this->mdl_categories->_custom_query($mysql_query);
return $query;
}

}

?>