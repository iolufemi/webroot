<?php

class Favoriteproperties extends MX_Controller
{

function __construct() {
parent::__construct();
}

function get($order_by){
$this->load->model('mdl_favoriteproperties');
$query = $this->mdl_favoriteproperties->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_favoriteproperties');
$query = $this->mdl_favoriteproperties->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id){
$this->load->model('mdl_favoriteproperties');
$query = $this->mdl_favoriteproperties->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_favoriteproperties');
$query = $this->mdl_favoriteproperties->get_where_custom($col, $value);
return $query;
}

function get_where_like($field,$key){
$this->load->model('mdl_favoriteproperties');
$query = $this->mdl_favoriteproperties->get_where_like($field,$key);
return $query;
}


function _insert($data){
$this->load->model('mdl_favoriteproperties');
$this->mdl_favoriteproperties->_insert($data);
}

function _update($id, $data){
$this->load->model('mdl_favoriteproperties');
$this->mdl_favoriteproperties->_update($id, $data);
}

function _delete($id){
$this->load->model('mdl_favoriteproperties');
$this->mdl_favoriteproperties->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_favoriteproperties');
$count = $this->mdl_favoriteproperties->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_favoriteproperties');
$max_id = $this->mdl_favoriteproperties->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_favoriteproperties');
$query = $this->mdl_favoriteproperties->_custom_query($mysql_query);
return $query;
}

}

?>