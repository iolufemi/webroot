<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Template
 * Renders the view files
 * @package   
 * @author Olanipekun Olufemi
 * @copyright Olanipekun Olufemi
 * @version 2013
 * @access public
 */
class Template extends MX_Controller {


    /**
     * Template::__construct()
     * 
     * @return
     */
    function __construct(){
        parent::__construct();
        
    }

  /**
   * Template::buildview()
   * build the needed views for a page
   * @param array $views
   * @param string $data
   * @param bool $menu
   * @return
   */
  function buildview($views,$data = "",$menu = true,$accesslevel = 1){
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
    $access = $this->users->accessLocker($accesslevel);
    if($access){
    foreach($views as $view){
        $this->$view($data);
    }
    }
    }    
    $this->admin_footer($data);
    return true;
}   


  //load the admin homepage view
	/**
	 * Template::admin_home()
	 * this is the admin home view
	 * @param string $data
	 * @return
	 */
	public function admin_home($data = "")
	{
		$this->load->view('admin/common/admin_home');
	}
    //load the admin login view
    /**
     * Template::admin_login()
     * admin login view
     * @param string $data
     * @return
     */
    function admin_login($data = ""){
        $this->load->view('admin/users/admin_login',$data);
    }
    //load the admin header view
    /**
     * Template::admin_header()
     * the admin header
     * @param string $data
     * @return
     */
    function admin_header($data = ""){
        $this->load->view('admin/common/admin_header',$data);
    }
    //load the admin footer view
    /**
     * Template::admin_footer()
     * admin footer
     * @param string $data
     * @return
     */
    function admin_footer($data = ""){
        $this->load->view('admin/common/admin_footer',$data);
    }
    //load the registration form view
    /**
     * Template::registration_form()
     * the registration form
     * @param string $data
     * @return
     */
    function registration_form($data = ""){
        $this->load->view('admin/users/registration_form',$data);
    }
    
    /**
     * Template::addroles()
     * all roles view
     * @param string $data
     * @return
     */
    function addroles($data = ""){
        $this->load->view('admin/roles/add-roles',$data);
        }
        
    /**
     * Template::roles()
     * 
     * @param string $data
     * @return
     */
    function roles($data = ""){
        $this->load->view('admin/roles/roles',$data);
    }
    
    /**
     * Template::addstatus()
     * 
     * @param string $data
     * @return
     */
    function addstatus($data = ""){
        $this->load->view('admin/status/add-status',$data);
        }
        
    /**
     * Template::status()
     * 
     * @param string $data
     * @return
     */
    function status($data = ""){
        $this->load->view('admin/status/status',$data);
    }
    
    /**
     * Template::users()
     * 
     * @param string $data
     * @return
     */
    function users($data = ""){
        $this->load->view('admin/users/users',$data);
    }
    
    /**
     * Template::users_dashboard()
     * 
     * @param string $data
     * @return
     */
    function users_dashboard($data = ""){
        $this->load->view('admin/users/users_dashboard',$data);
    }
    
    /**
     * Template::admin_menu()
     * 
     * @param string $data
     * @return
     */
    function admin_menu($data = ""){
        $this->load->view('admin/common/admin_menu',$data);
    }
    
    /**
     * Template::verificationPage()
     * 
     * @param string $data
     * @return
     */
    function verificationPage($data = ""){
        $this->load->view('admin/users/verification_page',$data);
    }
    
    /**
     * Template::verificationSent()
     * 
     * @param string $data
     * @return
     */
    function verificationSent($data = ""){
        $this->load->view('admin/users/verification_sent',$data);
    }
    
    /**
     * Template::verificationForm()
     * 
     * @param string $data
     * @return
     */
    function verificationForm($data = ""){
        $this->load->view('admin/users/verification_form',$data);
    }
    
    /**
     * Template::passwordResetSent()
     * 
     * @param string $data
     * @return
     */
    function passwordResetSent($data = ""){
        $this->load->view('admin/users/password_reset_sent',$data);
    }
    
    /**
     * Template::passwordResetForm()
     * 
     * @param string $data
     * @return
     */
    function passwordResetForm($data = ""){
        $this->load->view('admin/users/password_reset_form',$data);
    }
    
    /**
     * Template::updateUserStatus()
     * 
     * @param string $data
     * @return
     */
    function updateUserStatus($data = ""){
        $this->load->view('admin/users/update_user_status',$data);
    }
    
    /**
     * Template::suspendedUser()
     * 
     * @param string $data
     * @return
     */
    function suspendedUser($data = ""){
        $this->load->view('admin/users/suspended',$data);
    }
    
    /**
     * Template::accessDenied()
     * 
     * @param string $data
     * @return
     */
    function accessDenied($data = ""){
        $this->load->view('admin/users/accessdenied',$data);
    }
    
    /**
     * Template::updateAvi()
     * 
     * @param string $data
     * @return
     */
    function updateAvi($data = ""){
        $this->load->view('admin/users/updateavi',$data);
    }
    
       /**
     * Template::updateUserRole()
     * 
     * @param string $data
     * @return
     */
    function updateUserRole($data = ""){
        $this->load->view('admin/users/update_user_role',$data);
    }
    
    }

?>