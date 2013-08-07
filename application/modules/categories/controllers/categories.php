<?php

class Categories extends MX_Controller
{

function __construct() {
parent::__construct();
}

function index(){
    $this->allcategories();
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


function get_form_data(){
    $data = $this->input->post();
    return $data;
}
// Create and Update
function create(){
    $id = $this->uri->segment(3);
    $data = $this->get_form_data();
    
    if(isset($data['category'])){
        if(isset($data['id'])){
            $this->_update($data['id'],$data);
            redirect('categories');
        }else{
        $count = $this->count_where('category',$data['category']);
        if($count > 0){
        $data['alert_type'] = 'error';
        $data['alert_message'] = 'Stop! This category already exist.';
        }else{
        $this->_insert($data);
        $data['alert_type'] = 'success';
        $data['alert_message'] = 'This new category has been added.';
        unset($data['category']);
        }
        }
    }
    if(is_numeric($id)){
        $query = $this->read_by_id($id);
        foreach($query->result() as $row){
            $data['id'] = $row->id;
            $data['category'] = $row->category;
        }
    }
    
    $data['pagetitle'] = "Add New Category";
    $this->load->module('template');
    $this->template->buildview(array('createcategory'),$data);
}


function read_by_id($id){
    $query = $this->get_where($id);
    return $query;
}

function read_with_limit($limit,$offset){
    $result = $this->get_with_limit($limit,$offset,'id');
    return $result;
}

function read_all(){
    $query = $this->get('id');
    return $query;
}

function allcategories(){
    $offset = $this->uri->segment(3);
    if(!$offset){
        $offset = 0;
    }
    $allcategories = $this->read_all();
    $data['query'] = $this->read_with_limit(100,$offset);
    $data['pagetitle'] = "All Categories";
    $this->load->module('template');
    $views = array('categories');
    $config['base_url'] = base_url('categories/allcategories/');
    $config['total_rows'] = count($allcategories->result('array'));
    $config['per_page'] = 100;     
    $this->pagination->initialize($config);     
    $data['pagination'] = $this->pagination->create_links();
    $this->template->buildview($views,$data);
}

function delete(){
    $id = $this->uri->segment(3);
    $this->_delete($id);
    redirect('categories');
}




}

?>