<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Time_sheet_tr_model extends CI_Model {

    protected $table_name = 'time_sheet_tr';
    protected $time_sheet_id;
    public $emp_id;
    public $supervisor_approve_id;
    public $project_id;
    public $start_date;
    public $end_date;
    public $work;
    public $approve_status;
    public $comment;
    public $leave_id;
    public $time_stamp;
    protected $isdelete;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model() {
        $this->time_sheet_id = $this->input->post('time_sheet_id');
        $this->emp_id = $this->input->post('emp_id');
        $this->supervisor_approve_id = $this->input->post('supervisor_approve_id');
        $this->project_id = $this->input->post('project_id');
        $this->start_date = $this->input->post('start_date');
        $this->end_date = $this->input->post('end_date');
        $this->work = $this->input->post('work');
        $this->approve_status = $this->input->post('approve_status');
        $this->comment = $this->input->post('comment');
        $this->leave_id = $this->input->post('leave_id');
        $this->time_stamp = $this->input->post('time_stamp');
        $this->isdelete = 0;
    }

    public function save() {
        $this->set_Input_to_model();
        $result = FALSE;
        $state = !empty($this->time_sheet_id) && isset($this->time_sheet_id);
        if ($state) {
            $result = $this->update();
        } else {
            $result = $this->insert();
        }
        return $result;
    }

    public function insert() {
        $this->db->trans_start();
        $this->db->insert($this->table_name, $this);
        $id = $this->db->insert_id();
        $this->db->trans_complete();
        $result = $this->db->trans_status();
        if ($result) {
            $result = $id;
        }
        return $result;
    }

    public function update() {
        $result = FALSE;
        $this->time_sheet_id = num_param_url_decode($this->time_sheet_id);
        if ($this->time_sheet_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('time_sheet_id' => $this->time_sheet_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->time_sheet_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->time_sheet_id = num_param_url_decode($this->time_sheet_id);
        if ($this->time_sheet_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('time_sheet_id' => $this->time_sheet_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->time_sheet_id = num_param_url_decode($this->time_sheet_id);
        if ($this->time_sheet_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('time_sheet_id' => $this->time_sheet_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function get_all() {
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function find_all() {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0));
        return $query->result();
    }

    function find_id($time_sheet_id) {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0, 'time_sheet_id' => $time_sheet_id));
        return $query->row_array();
    }
    
    public function find_for_progress_dail_report(){
    	$this->set_Input_to_model();
    	$arr = array('employee_tr.emp_id',
    				 'employee_tr.emp_code',
    				 'employee_tr.fname_th',
    				 'employee_tr.lname_th',
    				 'time_sheet_tr.start_date',
    				 'time_sheet_tr.end_date',
    				 'time_sheet_tr.time_sheet_id',
    				 'time_sheet_tr.comment',
    				 'time_sheet_tr.approve_status'
    	);
    	
    	$query = $this->db->select($arr)
    					  ->join('employee_tr','employee_tr.emp_id = time_sheet_tr.emp_id', 'LEFT')
    					  ->where('time_sheet_tr.project_id',$this->project_id)
//     					  ->where('time_sheet_tr.start_date',$this->start_date)
    					  ->get($this->table_name);
    	return $query->result();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }

}

