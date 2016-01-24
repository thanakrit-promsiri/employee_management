<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Role_ms_model extends CI_Model {

    protected $table_name = 'role_ms';
    protected $role_id;
    public $role_name;
    protected $isdelete;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model() {
        $this->role_id = $this->input->post('role_id');
        $this->role_name = $this->input->post('role_name');
        $this->isdelete = 0;
    }

    public function save() {
        $this->set_Input_to_model();
        $result = FALSE;
        $state = !empty($this->role_id) && isset($this->role_id);
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
        $this->role_id = num_param_url_decode($this->role_id);
        if ($this->role_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('role_id' => $this->role_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->role_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->role_id = num_param_url_decode($this->role_id);
        if ($this->role_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('role_id' => $this->role_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->role_id = num_param_url_decode($this->role_id);
        if ($this->role_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('role_id' => $this->role_id));
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

    function find_id($role_id) {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0, 'role_id' => $role_id));
        return $query->row_array();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }

}

