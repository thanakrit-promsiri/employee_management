<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Job_title_ms_model extends CI_Model {

    protected $table_name = 'job_title_ms';
    protected $job_title_id;
    public $job_title_name;
    public $job_description;
    protected $isdelete;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model() {
        $this->job_title_id = $this->input->post('job_title_id');
        $this->job_title_name = $this->input->post('job_title_name');
        $this->job_description = $this->input->post('job_description');
        $this->isdelete = 0;
    }

    public function save() {
        $this->set_Input_to_model();
        $result = FALSE;
        $state = !empty($this->job_title_id) && isset($this->job_title_id);
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
        $this->job_title_id = num_param_url_decode($this->job_title_id);
        if ($this->job_title_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('job_title_id' => $this->job_title_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->job_title_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->job_title_id = num_param_url_decode($this->job_title_id);
        if ($this->job_title_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('job_title_id' => $this->job_title_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->job_title_id = num_param_url_decode($this->job_title_id);
        if ($this->job_title_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('job_title_id' => $this->job_title_id));
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

    function find_id($job_title_id) {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0, 'job_title_id' => $job_title_id));
        return $query->row_array();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }

}

