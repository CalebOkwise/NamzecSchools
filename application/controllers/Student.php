<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Student extends MY_Controller { 

    function __construct() {
        parent::__construct();
        		$this->load->database();                                //Load Databse Class
                $this->load->library('session');					    //Load library for session
                $this->load->model('cbt_exam_model');
  
    }

     /*student dashboard code to redirect to student page if successfull login** */
     function dashboard() {
        if ($this->session->userdata('student_login') != 1) redirect(base_url(), 'refresh');
       	$page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('student Dashboard');
        $this->load->view('backend/index', $page_data);
    }
	/******************* / student dashboard code to redirect to student page if successfull login** */

    function manage_profile($param1 = null, $param2 = null, $param3 = null){
        if ($this->session->userdata('student_login') != 1) redirect(base_url(), 'refresh');
        if ($param1 == 'update') {
    
    
            $data['name']   =   $this->input->post('name');
            $data['email']  =   $this->input->post('email');
    
            $this->db->where('student_id', $this->session->userdata('student_id'));
            $this->db->update('student', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $this->session->userdata('student_id') . '.jpg');
            $this->set_flash_message( get_phrase('Info Updated'));
            redirect(base_url() . 'student/manage_profile', 'refresh');
           
        }
    
        if ($param1 == 'change_password') {
            $data['new_password']           =   sha1($this->input->post('new_password'));
            $data['confirm_new_password']   =   sha1($this->input->post('confirm_new_password'));
    
            if ($data['new_password'] == $data['confirm_new_password']) {
               
               $this->db->where('student_id', $this->session->userdata('student_id'));
               $this->db->update('student', array('password' => $data['new_password']));
               $this->set_flash_message( get_phrase('Password Changed'));
            }
    
            else{
                $this->set_error_message( get_phrase('Type the same password'));
            }
            redirect(base_url() . 'student/manage_profile', 'refresh');
        }
    
            $page_data['page_name']     = 'manage_profile';
            $page_data['page_title']    = get_phrase('Manage Profile');
            $page_data['edit_profile']  = $this->db->get_where('student', array('student_id' => $this->session->userdata('student_id')))->result_array();
            $this->load->view('backend/index', $page_data);
        }


        function subject (){

            $student_profile = $this->db->get_where('student', array('student_id' => $this->session->userdata('student_id')))->row();
            $select_student_class_id = $student_profile->class_id;

            $page_data['page_name']     = 'subject';
            $page_data['page_title']    = get_phrase('Class Subjects');
            $page_data['select_subject']  = $this->db->get_where('subject', array('class_id' => $select_student_class_id))->result_array();
            $this->load->view('backend/index', $page_data);
        }

        function teacher (){


            $student_profile = $this->db->get_where('student', array('student_id' => $this->session->userdata('student_id')))->row();
            $select_student_class_id = $student_profile->class_id;

            $return_teacher_id = $this->db->get_where('subject', array('class_id' => $select_student_class_id))->row()->teacher_id;


            $page_data['page_name']     = 'teacher';
            $page_data['page_title']    = get_phrase('Class Teachers');
            $page_data['select_teacher']  = $this->db->get_where('teacher', array('teacher_id' => $return_teacher_id))->result_array();
            $this->load->view('backend/index', $page_data);
        }

        function class_mate (){

            $student_profile = $this->db->get_where('student', array('student_id' => $this->session->userdata('student_id')))->row();
            $page_data['select_student_class_id']  = $student_profile->class_id;
            $page_data['page_name']     = 'class_mate';
            $page_data['page_title']    = get_phrase('Class Mate');
            $this->load->view('backend/index', $page_data);
        }

        function class_routine(){

            $student_profile = $this->db->get_where('student', array('student_id' => $this->session->userdata('student_id')))->row();
            $page_data['class_id']  = $student_profile->class_id;

            $page_data['page_name']     = 'class_routine';
            $page_data['page_title']    = get_phrase('Class Timetable');
            $this->load->view('backend/index', $page_data);


        }

        function invoice($param1 = null, $param2 = null, $param3 = null){

            if($param1 == 'make_payment'){

                $invoice_id = $this->input->post('invoice_id');
                $payment_email = $this->db->get_where('settings', array('type' => 'paypal_email'))->row();
                $select_invoice = $this->db->get_where('invoice', array('invoice_id' => $invoice_id))->row();

                // SENDING USER TO PAYPAL TERMINAL.
                $this->paypal->add_field('rm', 2);
                $this->paypal->add_field('no_note', 0);
                $this->paypal->add_field('item_name', $select_invoice->title);
                $this->paypal->add_field('amount', $select_invoice->due);
                $this->paypal->add_field('custom', $select_invoice->invoice_id);
                $this->paypal->add_field('business', $payment_email->description);
                $this->paypal->add_field('notify_url', base_url('invoice/paypal_ipn'));
                $this->paypal->add_field('cancel_return', base_url('invoice/paypal_cancel'));
                $this->paypal->add_field('return', site_url('invoice/paypal_success'));

                $this->paypal->submit_paypal_post();
                //submitting info to the paypal teminal
            }


            if($param1 == 'paypal_ipn'){
                if($this->paypal->validate_ipn() == true){
                        $ipn_response = '';
                        foreach ($_POST as $key => $value){
                            $value = urlencode(stripslashes($value));
                            $ipn_response .= "\n$key=$value";
                        }

                    $page_data['payment_details']   = $ipn_response;
                    $page_data['payment_timestamp'] = strtotime(date("m/d/Y"));
                    $page_data['payment_method']    = '1';
                    $page_data['status']            = 'paid';
                    $invoice_id                = $_POST['custom'];
                    $this->db->where('invoice_id', $invoice_id);
                    $this->db->update('invoice', $page_data);

                    $data2['method']       =   '1';
                    $data2['invoice_id']   =   $_POST['custom'];
                    $data2['timestamp']    =   strtotime(date("m/d/Y"));
                    $data2['payment_type'] =   'income';
                    $data2['title']        =   $this->db->get_where('invoice' , array('invoice_id' => $data2['invoice_id']))->row()->title;
                    $data2['description']  =   $this->db->get_where('invoice' , array('invoice_id' => $data2['invoice_id']))->row()->description;
                    $data2['student_id']   =   $this->db->get_where('invoice' , array('invoice_id' => $data2['invoice_id']))->row()->student_id;
                    $data2['amount']       =   $this->db->get_where('invoice' , array('invoice_id' => $data2['invoice_id']))->row()->amount;
                    $this->db->insert('payment' , $data2);

                }
            }

            if($param1 == 'paypal_cancel'){
                $this->set_error_message( get_phrase('Payment Cancelled'));
                redirect(base_url() . 'student/invoice', 'refresh');
                }
    
            if($param1 == 'paypal_success'){
                $this->set_flash_message( get_phrase('Payment Successful'));
                redirect(base_url() . 'student/invoice', 'refresh');
            }
           

            $student_profile = $this->db->get_where('student', array('student_id' => $this->session->userdata('student_id')))->row();
            $student_profile = $student_profile->student_id;

            $page_data['invoices']     = $this->db->get_where('invoice', array('student_id' => $student_profile))->result_array();
            $page_data['page_name']     = 'invoice';
            $page_data['page_title']    = get_phrase('All Invoices');
            $this->load->view('backend/index', $page_data);
        }

        function cbt(){
            if ($this->session->userdata('student_login') != 1) redirect(base_url(), 'refresh');

            $student_profile = $this->db->get_where('student', array('student_id' => $this->session->userdata('student_id')))->row();
            if (empty($student_profile)) {
                redirect(base_url(), 'refresh');
            }

            $page_data['page_name']     = 'cbt';
            $page_data['page_title']    = get_phrase('CBT Exams');
            $page_data['student_class_id'] = $student_profile->class_id;
            $page_data['cbt_exams']     = $this->cbt_exam_model->get_published_exams_by_class($student_profile->class_id);
            $this->load->view('backend/index', $page_data);
        }

        function take_cbt_exam($exam_id = null){
            if ($this->session->userdata('student_login') != 1) redirect(base_url(), 'refresh');

            $exam_id = intval($exam_id);
            $student_profile = $this->db->get_where('student', array('student_id' => $this->session->userdata('student_id')))->row();
            if (empty($student_profile) || $exam_id < 1) {
                $this->set_error_message( get_phrase('Exam not found'));
                redirect(base_url() . 'student/cbt', 'refresh');
            }

            $exam = $this->cbt_exam_model->get_published_exam_for_class($exam_id, $student_profile->class_id);
            if (empty($exam)) {
                $this->session->unset_userdata('error_message');
                $this->session->unset_userdata('flash_message');
                $this->set_error_message( get_phrase('Exam not found'));
                redirect(base_url() . 'student/cbt', 'refresh');
            }

            $now = time();
            if ($now < strtotime($exam['start_at']) || $now > strtotime($exam['end_at'])) {
                $this->set_error_message( get_phrase('This exam is not available at this time'));
                redirect(base_url() . 'student/cbt', 'refresh');
            }

            if ($this->cbt_exam_model->has_student_submitted_exam($exam_id, $student_profile->student_id)) {
                $this->set_error_message( get_phrase('You have already submitted this exam'));
                redirect(base_url() . 'student/cbt', 'refresh');
            }

            $questions = $this->cbt_exam_model->get_questions_by_exam($exam_id);
            foreach ($questions as $key => $question) {
                if ($question['question_type'] == 'mcq') {
                    $questions[$key]['options'] = $this->cbt_exam_model->get_mcq_options($question['id']);
                    $questions[$key]['blank_answer'] = null;
                    $questions[$key]['answer'] = null;
                } else {
                    $questions[$key]['options'] = array();
                    $questions[$key]['blank_answer'] = $this->cbt_exam_model->get_fill_blank_answer($question['id']);
                    $questions[$key]['answer'] = null;
                }
            }

            $page_data['page_name']     = 'take_cbt_exam';
            $page_data['page_title']    = get_phrase('Take CBT Exam');
            $page_data['exam']          = $exam;
            $page_data['questions']     = $questions;
            $this->load->view('backend/index', $page_data);
        }

        function submit_cbt_answers($exam_id = null){
            if ($this->session->userdata('student_login') != 1) redirect(base_url(), 'refresh');

            $exam_id = intval($exam_id);
            $student_id = $this->session->userdata('student_id');
            $student_profile = $this->db->get_where('student', array('student_id' => $student_id))->row();
            if (empty($student_profile) || $exam_id < 1) {
                $this->set_error_message( get_phrase('Exam not found'));
                redirect(base_url() . 'student/cbt', 'refresh');
            }

            $exam = $this->cbt_exam_model->get_published_exam_for_class($exam_id, $student_profile->class_id);
            if (empty($exam)) {
                $this->set_error_message( get_phrase('Exam not found'));
                redirect(base_url() . 'student/cbt', 'refresh');
            }

            $now = time();
            if ($now < strtotime($exam['start_at']) || $now > strtotime($exam['end_at'])) {
                $this->set_error_message( get_phrase('This exam is not available at this time'));
                redirect(base_url() . 'student/cbt', 'refresh');
            }

            if ($this->cbt_exam_model->has_student_submitted_exam($exam_id, $student_id)) {
                $this->set_error_message( get_phrase('You have already submitted this exam'));
                redirect(base_url() . 'student/cbt', 'refresh');
            }

            $submitted_answers = $this->input->post('answer');
            $saved = $this->cbt_exam_model->submit_student_answers($exam_id, $student_id, $submitted_answers);

            if ($saved) {
                $this->set_flash_message( get_phrase('Your answers have been submitted successfully'));
            } else {
                $this->set_error_message( get_phrase('Unable to save your answers. Please try again.'));
            }

            redirect(base_url() . 'student/cbt', 'refresh');
        }
        function payment_history(){

            $student_profile = $this->db->get_where('student', array('student_id' => $this->session->userdata('student_id')))->row();
            $student_profile = $student_profile->student_id;

            $page_data['invoices']     = $this->db->get_where('invoice', array('student_id' => $student_profile))->result_array();
            $page_data['page_name']     = 'payment_history';
            $page_data['page_title']    = get_phrase('Student History');
            $this->load->view('backend/index', $page_data);


        }



}