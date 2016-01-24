<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Supervisor_tr_model extends CI_Model {

    protected $table_name = 'supervisor_tr';
    protected $sup_id;
    public $emp_id;
    public $supervisor_id;
    protected $isdelete;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model() {
        $this->sup_id = $this->input->post('sup_id');
        $this->emp_id = $this->input->post('emp_id');
        $this->supervisor_id = $this->input->post('supervisor_id');
        $this->isdelete = 0;
    }

    public function save() {
        $this->set_Input_to_model();
        $result = FALSE;
        $state = !empty($this->sup_id) && isset($this->sup_id);
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
        $this->sup_id = num_param_url_decode($this->sup_id);
        if ($this->sup_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('sup_id' => $this->sup_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->sup_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->sup_id = num_param_url_decode($this->sup_id);
        if ($this->sup_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('sup_id' => $this->sup_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->sup_id = num_param_url_decode($this->sup_id);
        if ($this->sup_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('sup_id' => $this->sup_id));
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

    function find_id($sup_id) {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0, 'sup_id' => $sup_id));
        return $query->row_array();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }

}

