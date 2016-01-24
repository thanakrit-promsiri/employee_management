<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Roleurllist extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('transaction/role_url_list_tr_model');
    }

    public function index() {
        $this->retrieve_all();
    }

    protected function form($data) {
        $this->template->append_page_section('admin/transaction/roleurllist/roleurllist_form');
        $this->template->render_admin_template($this, $data);
    }

    public function create_form() {
        $data = $this->role_url_list_tr_model->get_object_array();
        $data['action'] = 'action_insert';
        $this->form($data);
    }

    public function modify_form($role_url_list = '') {
        $id = num_param_url_decode($role_url_list);
        if ($id) {
            $data = $this->role_url_list_tr_model->find_id($id);
            $data['action'] = 'action_update';
            $this->form($data);
        } else {
            not_found_error();
        }
    }

    public function save() {
        $status_id = $this->role_url_list_tr_model->save();
        if ($status_id) {
            echo $status_id;
            redirect(admin_tr_site('roleurllist/retrieve/' . num_param_url_encode($status_id) . '/success'));
        } else {
            redirect(admin_tr_site('roleurllist/action_error'));
        }
    }

    public function action_error() {
        $data['url_back'] = admin_tr_site('roleurllist');
        $data['error_message'] = 'action_error';
        $this->template->append_page_section('block/error_block');
        $this->template->render_admin_template($this, $data);
    }

    public function remove() {
        $status = $this->role_url_list_tr_model->update_delete();
        if ($status) {
            $data['url_back'] = admin_tr_site('roleurllist');
            $data['succes_message'] = 'delete_success';
            $this->template->append_page_section('block/success_block');
            $this->template->render_admin_template($this, $data);
        } else {
            redirect(admin_tr_site('roleurllist/action_error'));
        }
    }

    public function retrieve($role_url_list = '', $save_success = 'none') {
        $id = num_param_url_decode($role_url_list);
        if ($id) {
            $data = $this->role_url_list_tr_model->find_id($id);
            $data['save_success'] = $save_success;
            $this->template->append_page_section('admin/transaction/roleurllist/roleurllist_show');
            $this->template->render_admin_template($this, $data);
        } else {
            not_found_error();
        }
    }

    public function retrieve_all() {
        $data['roleurllist_list'] = $this->role_url_list_tr_model->find_all();
        $this->template->append_page_section('admin/transaction/roleurllist/roleurllist_show_all');
        $this->template->append_javascript('admin/transaction/roleurllist/roleurllist_show_all_javascript');
        $this->template->render_admin_template($this, $data);
    }

}
