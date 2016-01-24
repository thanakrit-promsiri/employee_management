<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Url_list_ms_model extends CI_Model {

    protected $table_name = 'url_list_ms';
    protected $url_id;
    public $url;
    protected $isdelete;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model() {
        $this->url_id = $this->input->post('url_id');
        $this->url = $this->input->post('url');
        $this->isdelete = 0;
    }

    public function save() {
        $this->set_Input_to_model();
        $result = FALSE;
        $state = !empty($this->url_id) && isset($this->url_id);
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
        $this->url_id = num_param_url_decode($this->url_id);
        if ($this->url_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('url_id' => $this->url_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->url_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->url_id = num_param_url_decode($this->url_id);
        if ($this->url_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('url_id' => $this->url_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->url_id = num_param_url_decode($this->url_id);
        if ($this->url_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('url_id' => $this->url_id));
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

    function find_id($url_id) {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0, 'url_id' => $url_id));
        return $query->row_array();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }

}

