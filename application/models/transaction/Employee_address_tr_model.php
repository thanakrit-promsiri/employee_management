<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Employee_address_tr_model extends CI_Model {

    protected $table_name = 'employee_address_tr';
    protected $emp_addr_id;
    public $emp_id;
    public $addr_id;
    public $addr_type;
    protected $isdelete;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model($data = '') {
        $this->emp_addr_id  =   $this->input->post('emp_addr_id');
        $this->emp_id       =   trim($data['emp_id']);
        $this->addr_id      =   num_param_url_decode(trim($data['addr_id']));
        $this->addr_type    =   trim($data['type']);
        $this->isdelete     =   0;
    }

    public function save($data) {
        $this->set_Input_to_model($data);
        $result = FALSE;
        $state = !empty($this->emp_addr_id) && isset($this->emp_addr_id);
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
        $this->emp_addr_id = num_param_url_decode($this->emp_addr_id);
        if ($this->emp_addr_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('emp_addr_id' => $this->emp_addr_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->emp_addr_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->emp_addr_id = num_param_url_decode($this->emp_addr_id);
        if ($this->emp_addr_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('emp_addr_id' => $this->emp_addr_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->emp_addr_id = num_param_url_decode($this->emp_addr_id);
        if ($this->emp_addr_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('emp_addr_id' => $this->emp_addr_id));
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

    function find_id($emp_addr_id) {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0, 'emp_addr_id' => $emp_addr_id));
        return $query->row_array();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }

}

