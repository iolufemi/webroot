<?php

class Propertyimages extends MX_Controller
{

function __construct() {
parent::__construct();
}

function get($order_by){
$this->load->model('mdl_propertyimages');
$query = $this->mdl_propertyimages->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_propertyimages');
$query = $this->mdl_propertyimages->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id){
$this->load->model('mdl_propertyimages');
$query = $this->mdl_propertyimages->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_propertyimages');
$query = $this->mdl_propertyimages->get_where_custom($col, $value);
return $query;
}

function get_where_like($field,$key){
$this->load->model('mdl_propertyimages');
$query = $this->mdl_propertyimages->get_where_like($field,$key);
return $query;
}


function _insert($data){
$this->load->model('mdl_propertyimages');
$this->mdl_propertyimages->_insert($data);
}

function _update($id, $data){
$this->load->model('mdl_propertyimages');
$this->mdl_propertyimages->_update($id, $data);
}

function _delete($id){
$this->load->model('mdl_propertyimages');
$this->mdl_propertyimages->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_propertyimages');
$count = $this->mdl_propertyimages->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_propertyimages');
$max_id = $this->mdl_propertyimages->get_max();
return $max_id;
}

function _update_where($col,$col_val, $data){
    $this->load->model('mdl_propertyimages');
    $this->mdl_propertyimages->_update_where($col,$col_val, $data);
}

function _custom_query($mysql_query) {
$this->load->model('mdl_propertyimages');
$query = $this->mdl_propertyimages->_custom_query($mysql_query);
return $query;
}

function create($filename,$tag,$ismain = false){
    if($ismain){
        $data['ismain'] = 1;
    }
    $data['image'] = $filename;
    $data['tag'] = $tag;
    $data['user_id'] = $this->session->userdata('user_id');
    $this->_insert($data);
}

function update($filename,$tag){
    $data['image'] = $filename;
    $data['user_id'] = $this->session->userdata('user_id');
    $this->_update_where('tag',$tag,$data);   
}

function delete($id){
    $this->delete($id);
}

function read($tag){
   $query = $this->get_where_custom('tag',$tag);
   return $query;
}

}

?>