<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Team_member_model extends CI_Model {

    protected $table_name = 'team_member';
    protected $team_member_id;
    public $team_id;
    public $emp_id;
    public $team_leader;
    public $team_approve;
    protected $isdelete;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model() {
        $this->team_member_id = $this->input->post('team_member_id');
        $this->team_id = $this->input->post('team_id');
        $this->emp_id = $this->input->post('emp_id');
        $this->team_leader = $this->input->post('team_leader');
        $this->team_approve = $this->input->post('team_approve');
        $this->isdelete = 0;
    }

    public function save() {
        $this->set_Input_to_model();
        $result = FALSE;
        $state = !empty($this->team_member_id) && isset($this->team_member_id);
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
        $this->team_member_id = num_param_url_decode($this->team_member_id);
        if ($this->team_member_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('team_member_id' => $this->team_member_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->team_member_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->team_member_id = num_param_url_decode($this->team_member_id);
        if ($this->team_member_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('team_member_id' => $this->team_member_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->team_member_id = num_param_url_decode($this->team_member_id);
        if ($this->team_member_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('team_member_id' => $this->team_member_id));
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

    function find_id($team_member_id) {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0, 'team_member_id' => $team_member_id));
        return $query->row_array();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }

}

