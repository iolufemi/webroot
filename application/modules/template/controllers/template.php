<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends MX_Controller {

    /**
     * i use This function to render the needed template views for a page
     * */ 
  function buildview($views,$data = ""){
    $this->admin_header($data);
    foreach($views as $view){
        $this->$view($data);
    }
    $this->admin_footer($data);
    return true;
}   
  //load the admin homepage view
	public function admin_home($data = "")
	{
		$this->load->view('admin/users/admin_home');
	}
    //load the admin login view
    function admin_login($data = ""){
        $this->load->view('admin/users/admin_login',$data);
    }
    //load the admin header view
    function admin_header($data = ""){
        $this->load->view('admin/users/admin_header',$data);
    }
    //load the admin footer view
    function admin_footer($data = ""){
        $this->load->view('admin/users/admin_footer',$data);
    }
    //load the registration form view
    function registration_form($data = ""){
        $this->load->view('admin/users/registration_form',$data);
    }
    
    function addroles($data = ""){
        $this->load->view('admin/roles/add-roles',$data);
        }
    }

?>