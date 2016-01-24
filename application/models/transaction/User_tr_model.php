<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class User_tr_model extends CI_Model {

    protected $table_name = 'user_tr';
    protected $user_id;
    public $employee_emp_id;
    public $username;
    public $email;
    public $password;
    public $create_time;
    protected $isdelete;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model() {
        $this->user_id = $this->input->post('user_id');
        $this->employee_emp_id = $this->input->post('employee_emp_id');
        $this->username = $this->input->post('username');
        $this->email = $this->input->post('email');
        $this->password = $this->input->post('password');
        $this->create_time = $this->input->post('create_time');
        $this->isdelete = 0;
    }

    public function save() {
        $this->set_Input_to_model();
        $result = FALSE;
        $state = !empty($this->user_id) && isset($this->user_id);
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
        $this->user_id = num_param_url_decode($this->user_id);
        if ($this->user_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('user_id' => $this->user_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->user_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->user_id = num_param_url_decode($this->user_id);
        if ($this->user_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('user_id' => $this->user_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->user_id = num_param_url_decode($this->user_id);
        if ($this->user_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('user_id' => $this->user_id));
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

    function find_id($user_id) {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0, 'user_id' => $user_id));
        return $query->row_array();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }

}

