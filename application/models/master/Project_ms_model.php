<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Project_ms_model extends CI_Model {

    protected $table_name = 'project_ms';
    protected $project_id;
    public $addr_id;
    public $project_name;
    public $start_date;
    public $end_date;
    public $detail;
    public $tel;
    protected $isdelete;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model() {
        $this->project_id = $this->input->post('project_id');
//         $this->addr_id = $this->input->post('addr_id');
        $this->project_name = $this->input->post('project_name');
        $this->start_date = $this->input->post('start_date');
        $this->end_date = $this->input->post('end_date');
        $this->detail = $this->input->post('detail');
        $this->tel = $this->input->post('tel');
        $this->isdelete = 0;
    }
    
    public function setAddr_id($addr_id){
    	$this->addr_id= $addr_id;
    }

    public function save() {
        $this->set_Input_to_model();
        $result = FALSE;
        $state = !empty($this->project_id) && isset($this->project_id);
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
        $this->project_id = num_param_url_decode($this->project_id);
        if ($this->project_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('project_id' => $this->project_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->project_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->project_id = num_param_url_decode($this->project_id);
        if ($this->project_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('project_id' => $this->project_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->project_id = num_param_url_decode($this->project_id);
        if ($this->project_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('project_id' => $this->project_id));
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

    function find_id($project_id) {
        $query = $this->db->get_where($this->table_name, array('isdelete' => 0, 'project_id' => $project_id));
        return $query->row_array();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }
    
    public function find_all_join_address(){
    	$arr = array('project_ms.project_id',
    			'project_ms.project_name',
    			'project_ms.addr_id',
    			'address_tr.subdistrict',
    			'address_tr.district',
    			'address_tr.post_code',
    			'address_tr.province_id',
    			'province_ms.province_name',
    			'project_ms.start_date',
    			'project_ms.end_date',
    			'project_ms.detail',
    			'project_ms.tel');

    	$query = $this->db->select($arr)
    						->join('address_tr','address_tr.addr_id = project_ms.addr_id', 'LEFT')
    						->join('province_ms','province_ms.province_id = address_tr.province_id', 'LEFT')
    						->where('project_ms.isdelete = ' , 0)
    						->order_by('project_ms.project_name','ASC')
    						->get('project_ms');
    	return $query->result();
    }
    
    public function find_id_join_address($project_id){
    	$arr = array('project_ms.project_id',
    			'project_ms.project_name',
    			'project_ms.addr_id',
    			'address_tr.subdistrict',
    			'address_tr.district',
    			'address_tr.post_code',
    			'address_tr.addr_detail',
    			'address_tr.country',
    			'address_tr.latitude',
    			'address_tr.logitude',
    			'address_tr.province_id',
    			'province_ms.province_name',
    			'project_ms.start_date',
    			'project_ms.end_date',
    			'project_ms.detail',
    			'project_ms.tel'); 

    	$query = $this->db->select($arr)
    	->join('address_tr','address_tr.addr_id = project_ms.addr_id', 'LEFT')
    	->join('province_ms','province_ms.province_id = address_tr.province_id', 'LEFT')
    	->get_where($this->table_name, array('project_ms.isdelete' => 0,'project_id' => $project_id));
    	return $query->row_array();
    }


    
}

