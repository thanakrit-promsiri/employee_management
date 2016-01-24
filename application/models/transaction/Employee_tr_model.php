<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Employee_tr_model extends CI_Model {

    protected $table_name = 'employee_tr';
    protected $table_department = 'department_tr';
    protected $emp_id;
    public $company_id;
    public $dep_id;
    public $position_id;
    public $emp_code;
    public $pfname;
    public $fname_th;
    public $lname_th;
    public $fname_en;
    public $lname_en;
    public $nickname;
    public $email;
    public $passwd;
    public $gender;
    public $mobile;
    public $cityzen_id;
    public $birthday;
    public $blood;
    public $image;
    public $hire_date;
    public $resign_date;
    public $isresign;
    protected $isdelete;

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    private function set_Input_to_model($data = array()) {
        $this->emp_id           =       trim($this->input->post('emp_id'));
        $this->company_id       =       num_param_url_decode(trim($this->input->post('company_id')));
        $this->dep_id           =       num_param_url_decode(trim($this->input->post('dep_id')));
        $this->position_id      =       num_param_url_decode(trim($this->input->post('position_id')));
        $this->emp_code         =       trim($this->input->post('emp_code'));
        $this->pfname           =       trim($this->input->post('pfname'));
        $this->fname_th         =       trim($this->input->post('fname_th'));
        $this->lname_th         =       trim($this->input->post('lname_th'));
        $this->fname_en         =       trim($this->input->post('fname_en'));
        $this->lname_en         =       trim($this->input->post('lname_en'));
        $this->nickname         =       trim($this->input->post('nickname'));
        $this->email            =       trim($this->input->post('email'));
        $this->passwd           =       sha1(trim($this->input->post('passwd')));
        $this->gender           =       trim($this->input->post('gender'));
        $this->mobile           =       trim($this->input->post('mobile'));
        $this->cityzen_id       =       trim($this->input->post('cityzen_id'));
        $this->birthday         =       trim($this->input->post('birthday'));
        $this->blood            =       trim($this->input->post('blood'));
        $this->image            =       (count($data) == 0)?'':trim($data['img']);
        $this->hire_date        =       trim($this->input->post('hire_date'));
        $this->resign_date      =       NULL;
        $this->isresign         =       0;
        $this->isdelete         =       0;
    }

    public function save($data) {
        $this->set_Input_to_model($data);
        $result = FALSE;
        $state = !empty($this->emp_id) && isset($this->emp_id);
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
        $this->emp_id = num_param_url_decode($this->emp_id);
        if ($this->emp_id) {
            $this->db->trans_start();
            $this->db->update($this->table_name, $this, array('emp_id' => $this->emp_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
            if ($result) {
                $result = $this->emp_id;
            }
        }
        return $result;
    }

    public function delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->emp_id = num_param_url_decode($this->emp_id);
        if ($this->emp_id) {
            $this->db->trans_start();
            $this->db->delete($this->table_name, array('emp_id' => $this->emp_id));
            $this->db->trans_complete();
            $result = $this->db->trans_status();
        }
        return $result;
    }

    public function update_delete() {
        $result = FALSE;
        $this->set_Input_to_model();
        $this->emp_id = num_param_url_decode($this->emp_id);
        if ($this->emp_id) {
            $this->isdelete = 1;
            $this->db->trans_start();
            $this->db->update($this->table_name,array('isdelete' => $this->isdelete), array('emp_id' => $this->emp_id));
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
        $this->db->select('*');
        $this->db->from('employee_tr');
        $this->db->join('department_tr', 'department_tr.dep_id = employee_tr.dep_id');
        $this->db->join('position_ms','position_ms.position_id = employee_tr.position_id');
        $this->db->where('employee_tr.isdelete', 0);
        $query = $this->db->get();
        return $query->result();
    }

    function find_one_address($emp_id) {
        $sql = "SELECT
                a.addr_id addr_id2,
                a.district district2,
                a.subdistrict subdistrict2,
                a.addr_detail addr_detail2,
                a.tel tel2,
                a.post_code post_code2,
                a.country country2,
                a.latitude latitude2,
                a.logitude logitude2,
                p.province_name province_name2,
                p.province_id province_id2
            FROM
            employee_tr e
            INNER JOIN employee_address_tr ed ON ed.emp_id = e.emp_id
            INNER JOIN address_tr a ON a.addr_id = ed.addr_id
            INNER JOIN province_ms p ON p.province_id = a.province_id
            WHERE e.emp_id = $emp_id AND ed.addr_type = 2 AND a.isdelete = 0";
        $query = $this->db->query($sql);
        $data = $query->result();
        return (array)$data[0];
    }

    function find_id($emp_id) {
        $this->db->select('*');
        $this->db->from('employee_tr');
        $this->db->join('department_tr', 'department_tr.dep_id = employee_tr.dep_id');
        $this->db->join('company_ms','company_ms.company_id = employee_tr.company_id');
        $this->db->join('position_ms','position_ms.position_id = employee_tr.position_id');
        $this->db->join('employee_address_tr', 'employee_address_tr.emp_id = employee_tr.emp_id');
        $this->db->join('address_tr','address_tr.addr_id = employee_address_tr.addr_id');
        $this->db->join('province_ms','province_ms.province_id = address_tr.province_id');
        $this->db->where('employee_tr.emp_id', $emp_id);
        $this->db->where('employee_tr.isdelete', 0);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_object_array() {
        return get_object_vars($this);
    }

}

