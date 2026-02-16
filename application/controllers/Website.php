<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Website extends CI_Controller { 

            function __construct() {
                parent::__construct();
                        $this->load->database();
                        $this->load->library('session');	
             	
            }

            public function about() {
            $this->load->view('frontend/about');
            }

            public function teachers() {
            $this->load->view('frontend/teacher');
            }

            public function contact() {
            $this->load->view('frontend/contact');
            }

            public function index() {
            $page_data['page_name'] = 'index';
            $page_data['page_title'] = 'Home Page';
            $this->load->view('frontend/index', $page_data); 

            }

}

?>