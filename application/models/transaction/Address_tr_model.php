<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Address_tr_model extends CI_Model {

    protected $table_name = 'address_tr';
    protected $addr_id;
    public $province_id;
    public $district;
    public $subdistrict;
    public $post_code;
    public $addr_detail;
    public $tel;
    public $country;
    public $latitude;
    public $logitude;
    protected $isdelete;
    protected $isset_modal = FALSE;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model() {
        if(!$this->isset_modal) {
            $this->set_array_to_model($this->input->post());
        }
    }

    public function set_array_to_model($arr = array()) {
        $this->isset_modal = TRUE;
        $this->addr_id      =   num_param_url_decode($arr['addr_id']);
        $this->province_id  =   num_param_url_decode(trim($arr['province_id']));
        $this->district     =   trim($arr['district']);
        $this->subdistrict  =   trim($arr['subdistrict']);
        $this->post_code    =   trim($arr['post_code']);
        $this->addr_detail  =   trim($arr['addr_detail']);
        $this->tel          =   trim($arr['tel']);
        $this->country      =   trim($arr['country']);
        $this->latitude     =   trim($arr['latitude']);
        $this->logitude     =   trim($arr['logitude']);
        $this->isdelete     =   0;
    }

    public function save(){
        $this->set_Input_to_model();
        $result = FALSE;
        $state = !empty($this->addr_id) && isset($this->addr_id);
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
        $this->addr_id = num_param_url_decode($this->addr_id);
        if ($this->addr_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('addr_id' => $this->addr_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->addr_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->addr_id = num_param_url_decode($this->addr_id);
        if ($this->addr_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('addr_id' => $this->addr_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->addr_id = num_param_url_decode($this->addr_id);
        if ($this->addr_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('addr_id' => $this->addr_id));
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

    function find_id($addr_id) {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0, 'addr_id' => $addr_id));
        return $query->row_array();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }

}

