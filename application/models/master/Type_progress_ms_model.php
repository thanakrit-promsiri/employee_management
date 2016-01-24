<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Type_progress_ms_model extends CI_Model {

    protected $table_name = 'type_progress_ms';
    protected $type_progress_id;
    public $progress_name;
    protected $isdelete;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model() {
        $this->type_progress_id = $this->input->post('type_progress_id');
        $this->progress_name = $this->input->post('progress_name');
        $this->isdelete = 0;
    }

    public function save() {
        $this->set_Input_to_model();
        $result = FALSE;
        $state = !empty($this->type_progress_id) && isset($this->type_progress_id);
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
        $this->type_progress_id = num_param_url_decode($this->type_progress_id);
        if ($this->type_progress_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('type_progress_id' => $this->type_progress_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->type_progress_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->type_progress_id = num_param_url_decode($this->type_progress_id);
        if ($this->type_progress_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('type_progress_id' => $this->type_progress_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->type_progress_id = num_param_url_decode($this->type_progress_id);
        if ($this->type_progress_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('type_progress_id' => $this->type_progress_id));
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

    function find_id($type_progress_id) {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0, 'type_progress_id' => $type_progress_id));
        return $query->row_array();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }

}

