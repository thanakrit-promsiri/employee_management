<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Employee_in_project_tr_model extends CI_Model {

    protected $table_name = 'employee_in_project_tr';
    protected $man_project_id;
    public $project_id;
    public $emp_id;
    public $position_id;
    public $start_date;
    public $end_date;
    protected $isdelete;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model() {
        $this->man_project_id = $this->input->post('man_project_id');
        $this->project_id = $this->input->post('project_id');
        $this->emp_id = $this->input->post('emp_id');
        $this->position_id = $this->input->post('position_id');
        $this->start_date = $this->input->post('start_date');
        $this->end_date = $this->input->post('end_date');
        $this->isdelete = 0;
    }

    public function save() {
        $this->set_Input_to_model();
        $result = FALSE;
        $state = !empty($this->man_project_id) && isset($this->man_project_id);
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
        $this->man_project_id = num_param_url_decode($this->man_project_id);
        if ($this->man_project_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('man_project_id' => $this->man_project_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->man_project_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->man_project_id = num_param_url_decode($this->man_project_id);
        if ($this->man_project_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('man_project_id' => $this->man_project_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->man_project_id = num_param_url_decode($this->man_project_id);
        if ($this->man_project_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('man_project_id' => $this->man_project_id));
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

    function find_id($man_project_id) {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0, 'man_project_id' => $man_project_id));
        return $query->row_array();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }

}

