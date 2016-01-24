<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Project extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('master/project_ms_model');
        $this->load->model('transaction/Address_tr_model','address_tr_model');
        $this->load->model('master/Province_ms_model','province_ms_model');
    }

    public function index() {
        $this->retrieve_all();
    }

    protected function form($data) {
        $this->template->append_page_section('admin/master/project/project_form');
         $this->template->append_javascript('admin/master/project/project_form_javascript');
        $this->template->render_admin_template($this, $data);
    }

    public function create_form() {
        $data = $this->project_ms_model->get_object_array();
        $data['province_list'] = $this->province_ms_model->find_all_orderBy();
        $data['district'] = NULL;
        $data['subdistrict'] = NULL;
        $data['post_code'] = NULL;
        $data['addr_detail'] = NULL;
        $data['tel'] = NULL;
        $data['country'] = NULL;
        $data['latitude'] = NULL;
        $data['logitude'] = NULL;
        $data['action'] = 'action_insert';
        $this->form($data);
    }

    public function modify_form($project_id = '') {
        $id = num_param_url_decode($project_id);
        if ($id) {
            $data = $this->project_ms_model->find_id_join_address($id);
            $data['province_list'] = $this->province_ms_model->find_all_orderBy();
            $data['action'] = 'action_update';
            $this->form($data);
        } else {
            not_found_error();
        }
    }

    public function save() {
    	$status_id = $this->address_tr_model->save();
    	$this->project_ms_model->setAddr_id($status_id);
        $status_id = $this->project_ms_model->save();
        if ($status_id) {
            echo $status_id;
            redirect(admin_ms_site('project/retrieve/' . num_param_url_encode($status_id) . '/success'));
        } else {
            redirect(admin_ms_site('project/action_error'));
        }
    }

    public function action_error() {
        $data['url_back'] = admin_ms_site('project');
        $data['error_message'] = 'action_error';
        $this->template->append_page_section('block/error_block');
        $this->template->render_admin_template($this, $data);
    }

    public function remove() {
        $status = $this->project_ms_model->update_delete();
        if ($status) {
            $data['url_back'] = admin_ms_site('project');
            $data['succes_message'] = 'delete_success';
            $this->template->append_page_section('block/success_block');
            $this->template->render_admin_template($this, $data);
        } else {
            redirect(admin_ms_site('project/action_error'));
        }
    }

    public function retrieve($project_id = '', $save_success = 'none') {
        $id = num_param_url_decode($project_id);
        if ($id) {
            $data = $this->project_ms_model->find_id_join_address($id);
            $data['save_success'] = $save_success;
            $this->template->append_page_section('admin/master/project/project_show');
            $this->template->render_admin_template($this, $data);
        } else {
            not_found_error();
        }
    }

    public function retrieve_all() {
//         $data['project_list'] = $this->project_ms_model->find_all();
        $data['project_list'] = $this->project_ms_model->find_all_join_address();
        $this->template->append_page_section('admin/master/project/project_show_all');
        $this->template->append_javascript('admin/master/project/project_show_all_javascript');
        $this->template->render_admin_template($this, $data);
    }

}
