<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
  function buildview($views,$data = ""){
    $this->admin_header($data);
    foreach($views as $view){
        $this->$view($data);
    }
    $this->admin_footer($data);
    return true;
}   
  
	public function admin_home($data = "")
	{
		$this->load->view('admin_home');
	}
    
    function admin_login($data = ""){
        $this->load->view('admin_login',$data);
    }
    
    function admin_header($data = ""){
        $this->load->view('admin_header',$data);
    }
    
    function admin_footer($data = ""){
        $this->load->view('admin_footer',$data);
    }
    
    function registration_form($data = ""){
        $this->load->view('registration_form',$data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */