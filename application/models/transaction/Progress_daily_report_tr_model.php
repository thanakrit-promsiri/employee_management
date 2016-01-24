<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Progress_daily_report_tr_model extends CI_Model {

    protected $table_name = 'progress_daily_report_tr';
    protected $progress_id;
    public $emp_id;
    public $project_id;
    public $type_progress_id;
    public $weather_id;
    public $weather_time;
    public $progress_date;
    public $work_detail_today;
    public $work_detail_tomorrow;
    public $barriers;
    public $solutions;
    protected $isdelete;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model() {
        $this->progress_id = $this->input->post('progress_id');
        $this->emp_id = $this->input->post('emp_id');
        $this->project_id = $this->input->post('project_id');
        $this->type_progress_id = $this->input->post('type_progress_id');
        $this->weather_id = $this->input->post('weather_id');
        $this->weather_time = $this->input->post('weather_time');
        $this->progress_date = $this->input->post('progress_date');
        $this->work_detail_today = $this->input->post('work_detail_today');
        $this->work_detail_tomorrow = $this->input->post('work_detail_tomorrow');
        $this->barriers = $this->input->post('barriers');
        $this->solutions = $this->input->post('solutions');
        $this->isdelete = 0;
    }

    public function save() {
        $this->set_Input_to_model();
        $result = FALSE;
        $state = !empty($this->progress_id) && isset($this->progress_id);
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
        $this->progress_id = num_param_url_decode($this->progress_id);
        if ($this->progress_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('progress_id' => $this->progress_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->progress_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->progress_id = num_param_url_decode($this->progress_id);
        if ($this->progress_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('progress_id' => $this->progress_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->progress_id = num_param_url_decode($this->progress_id);
        if ($this->progress_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('progress_id' => $this->progress_id));
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

    function find_id($progress_id) {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0, 'progress_id' => $progress_id));
        return $query->row_array();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }

}

