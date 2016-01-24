<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Company_holidays_ms_model extends CI_Model {

    protected $table_name = 'company_holidays_ms';
    protected $holiday_id;
    public $holiday_date;
    public $holiday_th;
    protected $isdelete;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model() {
        $this->holiday_id = $this->input->post('holiday_id');
        $this->holiday_date = $this->input->post('holiday_date');
        $this->holiday_th = $this->input->post('holiday_th');
        $this->isdelete = 0;
    }

    public function save() {
        $this->set_Input_to_model();
        $result = FALSE;
        $state = !empty($this->holiday_id) && isset($this->holiday_id);
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
        $this->holiday_id = num_param_url_decode($this->holiday_id);
        if ($this->holiday_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('holiday_id' => $this->holiday_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->holiday_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->holiday_id = num_param_url_decode($this->holiday_id);
        if ($this->holiday_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('holiday_id' => $this->holiday_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->holiday_id = num_param_url_decode($this->holiday_id);
        if ($this->holiday_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('holiday_id' => $this->holiday_id));
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

    function find_id($holiday_id) {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0, 'holiday_id' => $holiday_id));
        return $query->row_array();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }

}

