<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Image_progress_daily_report_tr_model extends CI_Model {

    protected $table_name = 'image_progress_daily_report_tr';
    protected $image_id;
    public $progress_id;
    public $image_path;
    protected $isdelete;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model() {
        $this->image_id = $this->input->post('image_id');
        $this->progress_id = $this->input->post('progress_id');
        $this->image_path = $this->input->post('image_path');
        $this->isdelete = 0;
    }

    public function save() {
        $this->set_Input_to_model();
        $result = FALSE;
        $state = !empty($this->image_id) && isset($this->image_id);
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
        $this->image_id = num_param_url_decode($this->image_id);
        if ($this->image_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('image_id' => $this->image_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->image_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->image_id = num_param_url_decode($this->image_id);
        if ($this->image_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('image_id' => $this->image_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->image_id = num_param_url_decode($this->image_id);
        if ($this->image_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('image_id' => $this->image_id));
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

    function find_id($image_id) {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0, 'image_id' => $image_id));
        return $query->row_array();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }

}

