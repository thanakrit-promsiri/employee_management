<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Leave_tr_model extends CI_Model {

    protected $table_name = 'leave_tr';
    protected $leve_id;
    public $emp_id;
    public $type_leave_id;
    public $supervisor_id;
    public $begin_date;
    public $end_date;
    public $begin_time;
    public $end_time;
    public $description_issue;
    public $description_approve;
    public $approve_status;
    public $create_date;
    protected $isdelete;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model() {
        $this->leve_id = $this->input->post('leve_id');
        $this->emp_id = $this->input->post('emp_id');
        $this->type_leave_id = $this->input->post('type_leave_id');
        $this->supervisor_id = $this->input->post('supervisor_id');
        $this->begin_date = $this->input->post('begin_date');
        $this->end_date = $this->input->post('end_date');
        $this->begin_time = $this->input->post('begin_time');
        $this->end_time = $this->input->post('end_time');
        $this->description_issue = $this->input->post('description_issue');
        $this->description_approve = $this->input->post('description_approve');
        $this->approve_status = $this->input->post('approve_status');
        $this->create_date = $this->input->post('create_date');
        $this->isdelete = 0;
    }

    public function save() {
        $this->set_Input_to_model();
        $result = FALSE;
        $state = !empty($this->leve_id) && isset($this->leve_id);
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
        $this->leve_id = num_param_url_decode($this->leve_id);
        if ($this->leve_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('leve_id' => $this->leve_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->leve_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->leve_id = num_param_url_decode($this->leve_id);
        if ($this->leve_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('leve_id' => $this->leve_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->leve_id = num_param_url_decode($this->leve_id);
        if ($this->leve_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('leve_id' => $this->leve_id));
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

    function find_id($leve_id) {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0, 'leve_id' => $leve_id));
        return $query->row_array();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }

}

