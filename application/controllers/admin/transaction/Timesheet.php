<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Timesheet extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('transaction/time_sheet_tr_model');
    }

    public function index() {
        $this->retrieve_all();
    }

    protected function form($data) {
        $this->template->append_page_section('admin/transaction/timesheet/timesheet_form');
        $this->template->render_admin_template($this, $data);
    }

    public function create_form() {
        $data = $this->time_sheet_tr_model->get_object_array();
        $data['action'] = 'action_insert';
        $this->form($data);
    }

    public function modify_form($time_sheet_id = '') {
        $id = num_param_url_decode($time_sheet_id);
        if ($id) {
            $data = $this->time_sheet_tr_model->find_id($id);
            $data['action'] = 'action_update';
            $this->form($data);
        } else {
            not_found_error();
        }
    }

    public function save() {
        $status_id = $this->time_sheet_tr_model->save();
        if ($status_id) {
            echo $status_id;
            redirect(admin_tr_site('timesheet/retrieve/' . num_param_url_encode($status_id) . '/success'));
        } else {
            redirect(admin_tr_site('timesheet/action_error'));
        }
    }

    public function action_error() {
        $data['url_back'] = admin_tr_site('timesheet');
        $data['error_message'] = 'action_error';
        $this->template->append_page_section('block/error_block');
        $this->template->render_admin_template($this, $data);
    }

    public function remove() {
        $status = $this->time_sheet_tr_model->update_delete();
        if ($status) {
            $data['url_back'] = admin_tr_site('timesheet');
            $data['succes_message'] = 'delete_success';
            $this->template->append_page_section('block/success_block');
            $this->template->render_admin_template($this, $data);
        } else {
            redirect(admin_tr_site('timesheet/action_error'));
        }
    }

    public function retrieve($time_sheet_id = '', $save_success = 'none') {
        $id = num_param_url_decode($time_sheet_id);
        if ($id) {
            $data = $this->time_sheet_tr_model->find_id($id);
            $data['save_success'] = $save_success;
            $this->template->append_page_section('admin/transaction/timesheet/timesheet_show');
            $this->template->render_admin_template($this, $data);
        } else {
            not_found_error();
        }
    }

    public function retrieve_all() {
        $data['timesheet_list'] = $this->time_sheet_tr_model->find_all();
        $this->template->append_page_section('admin/transaction/timesheet/timesheet_show_all');
        $this->template->append_javascript('admin/transaction/timesheet/timesheet_show_all_javascript');
        $this->template->render_admin_template($this, $data);
    }
    
    public function find_by_progress_daily_report(){
//     	echo $this->input->post('project_id') . '<br/>';
//     	echo $this->input->post('start_date');
    	$data['timesheet_list'] = $this->time_sheet_tr_model->find_for_progress_dail_report();
//     	 $this->append_page_section('admin/transaction/timesheet/timesheet_progress_daily_report');
//     	$this->template->render_admin_template($this, $data);
		$this->load->view('admin/transaction/timesheet/timesheet_progress_daily_report',$data);
    }

}
