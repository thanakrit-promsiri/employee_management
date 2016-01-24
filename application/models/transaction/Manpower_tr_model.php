<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Manpower_tr_model extends CI_Model {

    protected $table_name = 'manpower_tr';
    protected $man_id;
    public $progress_id;
    public $detail;
    public $man_amount;
    protected $isdelete;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model() {
        $this->man_id = $this->input->post('man_id');
        $this->progress_id = $this->input->post('progress_id');
        $this->detail = $this->input->post('detail');
        $this->man_amount = $this->input->post('man_amount');
        $this->isdelete = 0;
    }

    public function save() {
        $this->set_Input_to_model();
        $result = FALSE;
        $state = !empty($this->man_id) && isset($this->man_id);
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
        $this->man_id = num_param_url_decode($this->man_id);
        if ($this->man_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('man_id' => $this->man_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->man_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->man_id = num_param_url_decode($this->man_id);
        if ($this->man_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('man_id' => $this->man_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->man_id = num_param_url_decode($this->man_id);
        if ($this->man_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('man_id' => $this->man_id));
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

    function find_id($man_id) {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0, 'man_id' => $man_id));
        return $query->row_array();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }

}

