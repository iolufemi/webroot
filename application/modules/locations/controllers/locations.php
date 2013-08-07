<?php

class Locations extends MX_Controller
{

function __construct() {
parent::__construct();
}

function index(){
    $this->alllocations();
}

function get($order_by){
$this->load->model('mdl_locations');
$query = $this->mdl_locations->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_locations');
$query = $this->mdl_locations->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id){
$this->load->model('mdl_locations');
$query = $this->mdl_locations->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_locations');
$query = $this->mdl_locations->get_where_custom($col, $value);
return $query;
}

function get_where_like($field,$key){
$this->load->model('mdl_locations');
$query = $this->mdl_locations->get_where_like($field,$key);
return $query;
}


function _insert($data){
$this->load->model('mdl_locations');
$this->mdl_locations->_insert($data);
}

function _update($id, $data){
$this->load->model('mdl_locations');
$this->mdl_locations->_update($id, $data);
}

function _delete($id){
$this->load->model('mdl_locations');
$this->mdl_locations->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_locations');
$count = $this->mdl_locations->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_locations');
$max_id = $this->mdl_locations->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_locations');
$query = $this->mdl_locations->_custom_query($mysql_query);
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
    
    if(isset($data['location'])){
        if(isset($data['id'])){
            $this->_update($data['id'],$data);
            redirect('locations');
        }else{
        $count = $this->count_where('location',$data['location']);
        if($count > 0){
        $data['alert_type'] = 'error';
        $data['alert_message'] = 'Stop! This location already exist.';
        }else{
        $this->_insert($data);
        $data['alert_type'] = 'success';
        $data['alert_message'] = 'This new location has been added.';
        unset($data['location']);
        }
        }
    }
    if(is_numeric($id)){
        $query = $this->read_by_id($id);
        foreach($query->result() as $row){
            $data['id'] = $row->id;
            $data['location'] = $row->location;
        }
    }
    
    $data['pagetitle'] = "Add New Location";
    $this->load->module('template');
    $this->template->buildview(array('createLocation'),$data);
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

function alllocations(){
    $offset = $this->uri->segment(3);
    if(!$offset){
        $offset = 0;
    }
    $alllocations = $this->read_all();
    $data['query'] = $this->read_with_limit(100,$offset);
    $data['pagetitle'] = "All Locations";
    $this->load->module('template');
    $views = array('locations');
    $config['base_url'] = base_url('locations/alllocations/');
    $config['total_rows'] = count($alllocations->result('array'));
    $config['per_page'] = 100;     
    $this->pagination->initialize($config);     
    $data['pagination'] = $this->pagination->create_links();
    $this->template->buildview($views,$data);
}

function delete(){
    $id = $this->uri->segment(3);
    $this->_delete($id);
    redirect('locations');
}



}

?>