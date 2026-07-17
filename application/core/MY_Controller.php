<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY_Controller
 *
 * Central base controller for application controllers.
 * This is the safe CodeIgniter extension point used instead of editing
 * system/core/Controller.php.
 *
 * It provides centralized flash message handling so controllers can call
 * set_flash_message() / set_error_message() and avoid duplicate flashdata states.
 */
class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    protected function clear_flash_messages() {
        $this->session->unset_userdata(array(
            'error_message',
            'flash_message'
        ));
    }

    protected function set_flash_message($message) {
        $this->clear_flash_messages();
        $this->session->set_flashdata('flash_message', $message);
    }

    protected function set_error_message($message) {
        $this->clear_flash_messages();
        $this->session->set_flashdata('error_message', $message);
    }
}
