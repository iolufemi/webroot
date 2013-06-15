<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends MX_Controller {


    function __construct(){
        parent::__construct();
        
    }
    /**
     * i use This function to render the needed template views for a page
     * */ 
  function buildview($views,$data = "",$menu = true){
    $this->load->module('users');
        $status = $this->users->admin_login_submit();
        if(!$status){
            redirect('users/admin_login');
        }
    $this->admin_header($data);
    if(!$menu){
        
    }else{
        $this->admin_menu($data);
    }
    
    foreach($views as $view){
        $this->$view($data);
    }
    $this->admin_footer($data);
    return true;
}   

  function buildaview($views,$data = "",$menu = true){
    $this->admin_header($data);
    if(!$menu){
        
    }else{
        $this->admin_menu($data);
    }
    
    foreach($views as $view){
        $this->$view($data);
    }
    $this->admin_footer($data);
    return true;
} 
  //load the admin homepage view
	public function admin_home($data = "")
	{
		$this->load->view('admin/common/admin_home');
	}
    //load the admin login view
    function admin_login($data = ""){
        $this->load->view('admin/users/admin_login',$data);
    }
    //load the admin header view
    function admin_header($data = ""){
        $this->load->view('admin/common/admin_header',$data);
    }
    //load the admin footer view
    function admin_footer($data = ""){
        $this->load->view('admin/common/admin_footer',$data);
    }
    //load the registration form view
    function registration_form($data = ""){
        $this->load->view('admin/users/registration_form',$data);
    }
    
    function addroles($data = ""){
        $this->load->view('admin/roles/add-roles',$data);
        }
        
    function roles($data = ""){
        $this->load->view('admin/roles/roles',$data);
    }
    
    function users($data = ""){
        $this->load->view('admin/users/users',$data);
    }
    
    function users_dashboard($data = ""){
        $this->load->view('admin/users/users_dashboard',$data);
    }
    
    function admin_menu($data = ""){
        $this->load->view('admin/common/admin_menu',$data);
    }
    
    }

?>