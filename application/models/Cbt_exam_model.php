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
     * Get published CBT exams for a class with subject details.
     * @param int $class_id The class ID
     * @return array Published CBT exams
     */
    function get_published_exams_by_class($class_id){
        $this->db->select('cbt_exams.*, subject.name as subject_name, class.name as class_name');
        $this->db->from('cbt_exams');
        $this->db->join('subject', 'subject.subject_id = cbt_exams.subject_id', 'left');
        $this->db->join('class', 'class.class_id = cbt_exams.class_id', 'left');
        $this->db->where('cbt_exams.class_id', $class_id);
        $this->db->where('cbt_exams.status', 'published');
        $this->db->order_by('cbt_exams.start_at', 'ASC');
        return $this->db->get()->result_array();
    }

    /**
     * Get one published CBT exam for a class with subject details.
     * @param int $exam_id The exam ID
     * @param int $class_id The class ID
     * @return array The published exam
     */
    function get_published_exam_for_class($exam_id, $class_id){
        $this->db->select('cbt_exams.*, subject.name as subject_name, class.name as class_name');
        $this->db->from('cbt_exams');
        $this->db->join('subject', 'subject.subject_id = cbt_exams.subject_id', 'left');
        $this->db->join('class', 'class.class_id = cbt_exams.class_id', 'left');
        $this->db->where('cbt_exams.id', $exam_id);
        $this->db->where('cbt_exams.class_id', $class_id);
        $this->db->where('cbt_exams.status', 'published');
        return $this->db->get()->row_array();
    }
    /**
     * Get all questions for an exam.
     * @param int $exam_id The exam ID
     * @return array The exam questions
     */
    function get_questions_by_exam($exam_id){
        $this->db->where('exam_id', $exam_id);
        $this->db->order_by('id', 'ASC');
        return $this->db->get('cbt_questions')->result_array();
    }

    /**
     * Get MCQ options for a question.
     * @param int $question_id The question ID
     * @return array The MCQ options
     */
    function get_mcq_options($question_id){
        $this->db->where('question_id', $question_id);
        $this->db->order_by('position', 'ASC');
        return $this->db->get('mcq_options')->result_array();
    }

    /**
     * Get fill-in-the-blank answer for a question.
     * @param int $question_id The question ID
     * @return array|null The answer record or null
     */
    function get_fill_blank_answer($question_id){
        $this->db->where('question_id', $question_id);
        return $this->db->get('answers')->row_array();
    }

    /**
     * Update exam publication status.
     * @param int $exam_id The exam ID
     * @param string $status Either draft or published
     */
    function publish_exam($exam_id, $status = 'published'){
        $this->db->where('id', $exam_id);
        $this->db->update('cbt_exams', array('status' => $status));
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
     * Save CBT questions for an exam.
     * @param int $exam_id The exam ID
     * @return int Number of saved questions
     */
    function save_questions($exam_id){
        $question_texts   = $this->input->post('question_text');
        $question_types   = $this->input->post('question_type');
        $correct_answers  = $this->input->post('correct_answer');
        $blank_answers    = $this->input->post('blank_answer');
        $option_a         = $this->input->post('option_a');
        $option_b         = $this->input->post('option_b');
        $option_c         = $this->input->post('option_c');
        $option_d         = $this->input->post('option_d');
        $saved_count = 0;

        if (!is_array($question_texts)) {
            return 0;
        }

        foreach ($question_texts as $question_key => $question_text) {
            $question_text = trim($question_text);

            if ($question_text === '') {
                continue;
            }

            $question_type = isset($question_types[$question_key]) ? $question_types[$question_key] : 'mcq';
            if ($question_type == 'multiple_choice') {
                $question_type = 'mcq';
            }

            if (!in_array($question_type, array('mcq', 'fill_blank'))) {
                continue;
            }

            $question_data = array(
                'exam_id'       => $exam_id,
                'question_text' => html_escape($question_text),
                'question_type' => $question_type,
                'marks'         => 2
            );

            $this->db->insert('cbt_questions', $question_data);
            $question_id = $this->db->insert_id();

            if ($question_type === 'mcq') {
                $options = array(
                    'A' => isset($option_a[$question_key]) ? trim($option_a[$question_key]) : '',
                    'B' => isset($option_b[$question_key]) ? trim($option_b[$question_key]) : '',
                    'C' => isset($option_c[$question_key]) ? trim($option_c[$question_key]) : '',
                    'D' => isset($option_d[$question_key]) ? trim($option_d[$question_key]) : ''
                );
                $selected_answer = isset($correct_answers[$question_key]) ? $correct_answers[$question_key] : '';
                $position = 1;

                foreach ($options as $label => $option_text_value) {
                    if ($option_text_value === '') {
                        $position++;
                        continue;
                    }

                    $this->db->insert('mcq_options', array(
                        'question_id' => $question_id,
                        'option_text' => html_escape($option_text_value),
                        'is_correct'  => ($selected_answer === $label) ? 1 : 0,
                        'label'       => $label,
                        'position'    => $position
                    ));
                    $position++;
                }
            }

            if ($question_type === 'fill_blank') {
                $blank_answer = isset($blank_answers[$question_key]) ? trim($blank_answers[$question_key]) : '';
                if ($blank_answer !== '') {
                    $this->db->insert('answers', array(
                        'question_id'    => $question_id,
                        'correct_answer' => html_escape($blank_answer)
                    ));
                }
            }

            $saved_count++;
        }

        return $saved_count;
    }
    /**
     * Delete a question that belongs to a specific exam.
     * @param int $exam_id The exam ID
     * @param int $question_id The question ID
     * @return bool Whether a question was deleted
     */
    function delete_question($exam_id, $question_id){
        $question = $this->db->get_where('cbt_questions', array(
            'id'      => $question_id,
            'exam_id' => $exam_id
        ))->row_array();

        if (empty($question)) {
            return false;
        }

        $this->db->where('question_id', $question_id);
        $this->db->delete('mcq_options');

        $this->db->where('question_id', $question_id);
        $this->db->delete('answers');

        $this->db->where('id', $question_id);
        $this->db->where('exam_id', $exam_id);
        $this->db->delete('cbt_questions');

        return ($this->db->affected_rows() > 0);
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


