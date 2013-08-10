<?php

class Properties extends MX_Controller
{

function __construct() {
parent::__construct();
}

function index(){
    $this->allproperties();
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

function get_where_custom_with_limit($col, $value, $limit, $offset, $order_by) {
$this->load->model('mdl_properties');
$query = $this->mdl_properties->get_where_custom_with_limit($col, $value, $limit, $offset, $order_by);
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

function get_form_data(){
    $data = $this->input->post();
    return $data;
}
// Create and Update
function create(){
    $id = $this->uri->segment(3);
    $data = $this->get_form_data();
    $data['user_id'] = $this->session->userdata('user_id');
    if(isset($data['name'])){
        //Let us now process the images
        $error = "Error for Main Picture: ";
        $data['mainpicture'] = $this->input->post('mainpicture');
        $data['otherpictures'] = $_FILES['otherpictures'];
        if(isset($data['mainpicture'])){
        $config['upload_path'] = './uploads/property_images';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']	= '2128';
        $config['file_name']	= $this->session->userdata('token')."_mainpicture_".$data['name']."_".random_string();
        $config['overwrite']	= TRUE;
        $this->upload->initialize($config);
        $upload_ = $this->upload->do_upload('mainpicture');
        $error .= $this->upload->display_errors();
        if($upload_){
            $upload_data = $this->upload->data();
            $fullpath = $upload_data['file_name'];
            $this->load->module('propertyimages');
            $this->propertyimages->create($fullpath,$data['name']);
        }
       }
       $error .= "<br /> Errors for Other Pictures: ";
       if(isset($data['otherpictures'])){
           $ct = count($data['otherpictures']['name']);
          $ctt = $ct - 1;
          $accepted = 'gif|jpg|png|jpeg';
          $accept = explode("|",$accepted);
         for($cttt = 0; $cttt <= $ctt; $cttt++){
         $split = explode('.',$data['otherpictures']['name'][$cttt]);
         foreach($accept as $key => $value){
            if($split[1] == $value){
                $pass = 1;
            }
         }
          if(!@$pass){
            $error .= "Wrong file type for ".$data['otherpictures']['name'][$cttt]."<br />";
          $e1 = 1;
          }elseif($data['otherpictures']['size'][$cttt] > 2000000){
            $error .= "File too large for ".$data['otherpictures']['name'][$cttt]."<br />";
          $e2 = 1;
          }else{
         $data['otherpictures']['name'][$cttt] = $this->session->userdata('token')."_otherpictures_".$data['name']."_".random_string().".".$split[1];
        $move = move_uploaded_file($data['otherpictures']['tmp_name'][$cttt],'./uploads/property_images/'.$data['otherpictures']['name'][$cttt].'');
        if($move){
            $this->load->module('propertyimages');
            $this->propertyimages->create($data['otherpictures']['name'][$cttt],$data['name']);
        }
        }
        
        }
       }
       unset($data['mainpicture']);
       unset($data['otherpictures']);
        //done with images
        if(isset($data['id'])){
            $this->_update($data['id'],$data);
          redirect('properties');
        }else{
        if($upload_){
        $this->_insert($data);
        
        if(isset($e1) || isset($e2)){
          $data['alert_type'] = 'warning';  
        }else{
            $data['alert_type'] = 'success';
        }
        $data['alert_message'] = 'This Property has been added.';
        if(isset($e1) || isset($e2)){
           $data['alert_message'] .= "<br />".$error; 
        }
        }else{
        $data['alert_type'] = 'error';
        $data['alert_message'] = 'This Property was not added.<br />'.$error.''; 
        }
        
        //redirect('properties');
        }
    }
    if(is_numeric($id)){
        $query = $this->read_by_id($id);
        foreach($query->result() as $row){
            $data['id'] = $row->id;
            $data['name'] = $row->name;
            $data['description'] = $row->description;
            $data['no_of_rooms'] = $row->no_of_rooms;
            $data['price'] = $row->price;
            $data['category'] = $row->category;
            $data['location'] = $row->location;
            $data['address'] = $row->address;
        }
    }
    
    $data['pagetitle'] = "Add Properties";
    $this->load->module('template');
    $this->template->buildview(array('createProperty'),$data);
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

function allproperties(){
    $offset = $this->uri->segment(3);
    if(!$offset){
        $offset = 0;
    }
    $allproperties = $this->read_all();
    $data['query'] = $this->read_with_limit(100,$offset);
    $data['pagetitle'] = "All Properties";
    $this->load->module('template');
    $views = array('properties');
    $config['base_url'] = base_url('properties/allproperties/');
    $config['total_rows'] = count($allproperties->result('array'));
    $config['per_page'] = 100;     
    $this->pagination->initialize($config);     
    $data['pagination'] = $this->pagination->create_links();
    $this->template->buildview($views,$data);
}

function delete(){
    $id = $this->uri->segment(3);
    $this->_delete($id);
    redirect('properties');
}

function search(){
    $data = $this->get_form_data();
    $data['query'] = $this->get_where_like('description',$data['search']);
    $data['pagetitle'] = "Search Result";
    $this->load->module('template');
    $views = array('properties');
    $this->template->buildview($views,$data);
}

function myproperties(){
    $offset = $this->uri->segment(3);
    if(!$offset){
        $offset = 0;
    }
    $allproperties = $this->get_where_custom('user_id',$this->session->userdata('user_id'));
    $data['query'] = $this->get_where_custom_with_limit('user_id',$this->session->userdata('user_id'),100,$offset,'id');
    $data['pagetitle'] = "My Properties";
    $this->load->module('template');
    $views = array('properties');
    $config['base_url'] = base_url('properties/myproperties/');
    $config['total_rows'] = count($allproperties->result('array'));
    $config['per_page'] = 100;     
    $this->pagination->initialize($config);     
    $data['pagination'] = $this->pagination->create_links();
    $this->template->buildview($views,$data);
}



}

?>