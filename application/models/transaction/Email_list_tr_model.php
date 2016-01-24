<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Email_list_tr_model extends CI_Model {

    protected $table_name = 'email_list_tr';
    protected $email_id;
    public $leave_id;
    public $emp_id;
    protected $isdelete;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model() {
        $this->email_id = $this->input->post('email_id');
        $this->leave_id = $this->input->post('leave_id');
        $this->emp_id = $this->input->post('emp_id');
        $this->isdelete = 0;
    }

    public function save() {
        $this->set_Input_to_model();
        $result = FALSE;
        $state = !empty($this->email_id) && isset($this->email_id);
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
        $this->email_id = num_param_url_decode($this->email_id);
        if ($this->email_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('email_id' => $this->email_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->email_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->email_id = num_param_url_decode($this->email_id);
        if ($this->email_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('email_id' => $this->email_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->email_id = num_param_url_decode($this->email_id);
        if ($this->email_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('email_id' => $this->email_id));
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

    function find_id($email_id) {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0, 'email_id' => $email_id));
        return $query->row_array();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }

}

