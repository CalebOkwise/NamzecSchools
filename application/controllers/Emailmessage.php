
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Emailmessage extends MY_Controller { 

    function __construct() {
        parent::__construct();
        		$this->load->database();
                $this->load->library('session');	
                $this->load->model('send_email_message_model');	
    }


    function sendEmailMessage($param1 = null, $param2 = null, $param3 = null){
        if($param1 == 'create'){
            $this->send_email_message_model->sendMessageEmail();
            $this->set_flash_message( get_phrase('Email sent successfully'));
            redirect(base_url(). 'emailmessage/sendEmailMessage', 'refresh');
        }

        $page_data['page_name']     = 'sendEmailMessage';
        $page_data['page_title']    = get_phrase('Send Multiple Emails');
        $this->load->view('backend/index', $page_data);
    }



}