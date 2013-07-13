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
        
        $data['alert_type'] = 'warning';
        $data['alert_message'] = 'Please, Login First';
        $data['pagetitle'] = "Warning, Please Login | Admin Login";
        $this->admin_header($data);
        $this->admin_login($data);
    }else{
        $this->admin_header($data);
        if(!$menu){
        
    }else{
        $this->admin_menu($data);
    } 
    foreach($views as $view){
        $this->$view($data);
    }
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
    
    function addstatus($data = ""){
        $this->load->view('admin/status/add-status',$data);
        }
        
    function status($data = ""){
        $this->load->view('admin/status/status',$data);
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
    
    function verificationPage($data = ""){
        $this->load->view('admin/users/verification_page',$data);
    }
    
    function verificationSent($data = ""){
        $this->load->view('admin/users/verification_sent',$data);
    }
    
    function verificationForm($data = ""){
        $this->load->view('admin/users/verification_form',$data);
    }
    
    function passwordResetSent($data = ""){
        $this->load->view('admin/users/password_reset_sent',$data);
    }
    
    function passwordResetForm($data = ""){
        $this->load->view('admin/users/password_reset_form',$data);
    }
    
    }

?>