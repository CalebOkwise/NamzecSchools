<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cbt_exam_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }

    /**
     * Save a new CBT exam to the cbt_exams table
     * @return int The ID of the newly created exam
     */
    function save_exam(){
        $exam_data = array(
            'title'               => html_escape($this->input->post('exam_title')),
            'class_id'            => html_escape($this->input->post('class_id')),
            'subject_id'          => html_escape($this->input->post('subject_id')),
            'duration_minutes'    => html_escape($this->input->post('duration')),
            'instructions'        => html_escape($this->input->post('instructions')),
            'start_at'            => html_escape($this->input->post('start_datetime')),
            'end_at'              => html_escape($this->input->post('end_datetime')),
            'status'              => 'draft'
        );

        // Insert the exam and get the inserted ID
        $this->db->insert('cbt_exams', $exam_data);
        $exam_id = $this->db->insert_id();

        return $exam_id;
    }

    /**
     * Get exam by ID
     * @param int $exam_id The exam ID
     * @return array The exam data
     */
    function get_exam($exam_id){
        $this->db->where('id', $exam_id);
        return $this->db->get('cbt_exams')->row_array();
    }

    /**
     * Update an exam
     * @param int $exam_id The exam ID
     */
    function update_exam($exam_id){
        $exam_data = array(
            'title'               => html_escape($this->input->post('exam_title')),
            'class_id'            => html_escape($this->input->post('class_id')),
            'subject_id'          => html_escape($this->input->post('subject_id')),
            'duration_minutes'    => html_escape($this->input->post('duration')),
            'instructions'        => html_escape($this->input->post('instructions')),
            'start_at'            => html_escape($this->input->post('start_datetime')),
            'end_at'              => html_escape($this->input->post('end_datetime'))
        );

        $this->db->where('id', $exam_id);
        $this->db->update('cbt_exams', $exam_data);
    }

    /**
     * Delete an exam
     * @param int $exam_id The exam ID
     */
    function delete_exam($exam_id){
        $this->db->where('id', $exam_id);
        $this->db->delete('cbt_exams');
    }

    /**
     * Get all exams with optional filters
     * @param int $class_id Optional class filter
     * @param int $subject_id Optional subject filter
     * @return array Array of exams
     */
    function get_all_exams($class_id = null, $subject_id = null){
        if($class_id){
            $this->db->where('class_id', $class_id);
        }
        if($subject_id){
            $this->db->where('subject_id', $subject_id);
        }
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('cbt_exams')->result_array();
    }

    /**
     * Get all exams with class and subject names
     * @return array Array of exams with joined data
     */
    function get_all_exams_with_details(){
        $this->db->select('cbt_exams.*, class.name as class_name, subject.name as subject_name');
        $this->db->from('cbt_exams');
        $this->db->join('class', 'class.class_id = cbt_exams.class_id');
        $this->db->join('subject', 'subject.subject_id = cbt_exams.subject_id');
        $this->db->order_by('cbt_exams.created_at', 'DESC');
        return $this->db->get()->result_array();
    }
	
}
