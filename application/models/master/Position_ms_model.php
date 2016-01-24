<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Position_ms_model extends CI_Model {

    protected $table_name = 'position_ms';
    protected $position_id;
    public $position_name;
    public $type;
    protected $isdelete;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model() {
        $this->position_id = $this->input->post('position_id');
        $this->position_name = $this->input->post('position_name');
        $this->type = $this->input->post('type');
        $this->isdelete = 0;
    }

    public function save() {
        $this->set_Input_to_model();
        $result = FALSE;
        $state = !empty($this->position_id) && isset($this->position_id);
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
        $this->position_id = num_param_url_decode($this->position_id);
        if ($this->position_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('position_id' => $this->position_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->position_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->position_id = num_param_url_decode($this->position_id);
        if ($this->position_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('position_id' => $this->position_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->position_id = num_param_url_decode($this->position_id);
        if ($this->position_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('position_id' => $this->position_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function get_all() {
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get_all_use_in_employee() {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0,'type' => '1'));
        return $query->result();
    }

    function find_all() {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0));
        return $query->result();
    }

    function find_id($position_id) {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0, 'position_id' => $position_id));
        return $query->row_array();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }

}

