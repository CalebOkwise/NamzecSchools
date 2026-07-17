<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Systemsetting extends MY_Controller { 

    function __construct() {
        parent::__construct();
        		$this->load->database();							// load database library
        		$this->load->library('session');					//Load library for session
    }


/**default functin, redirects to login page if no admin logged in yet***/
    public function index() {
        	if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        	if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'admin/dashboard', 'refresh');
    }

   

   /************** Manage system setings  ********************/
	function system_settings($param1 = '', $param2 = '', $param3 = '') 
	{
    if ($this->session->userdata('admin_login') != 1)
    redirect(base_url() . 'login', 'refresh');


        if ($param1 == 'do_update') {
           
        $this->crud_model->update_settings();

        $this->set_flash_message( get_phrase('Data Updated'));
        redirect(base_url(). 'systemsetting/system_settings', 'refresh');
    }

    if ($param1 == 'upload_logo') 
	{
       $this->crud_model->system_logo();
       $this->set_flash_message( get_phrase('settings_updated'));
       redirect(base_url() . 'systemsetting/system_settings', 'refresh');
    }


    if ($param1 == 'themeSettings') 
	{
        $this->crud_model->update_theme();
        $this->set_flash_message( get_phrase('Theme Selected'));
        redirect(base_url() . 'systemsetting/system_settings', 'refresh');
    }


    $page_data['page_name'] = 'system_settings';
    $page_data['page_title'] = get_phrase('system_settings');
    $page_data['settings'] = $this->db->get('settings')->result_array();
    $this->load->view('backend/index', $page_data);
    }
	


	
	
}
