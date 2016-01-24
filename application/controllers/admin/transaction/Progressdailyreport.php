<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Progressdailyreport extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('transaction/progress_daily_report_tr_model');
        $this->load->model('master/Type_progress_ms_model', 'type_progress_ms_model');
        $this->load->model('master/Weather_ms_model', 'weather_ms_model');
        $this->load->model('master/Project_ms_model', 'project_ms_model');
        $this->load->model('transaction/Time_sheet_tr_model', 'time_sheet_tr_model');
    }

    public function index() {
        $this->retrieve_all();
    }

    protected function form($data) {
    	$this->template->append_css('poonnut-style.css');
    	$this->template->append_javascript('admin/transaction/progressdailyreport/progressdailyreport_form_javascript');
    	
        $this->template->append_page_section('admin/transaction/progressdailyreport/progressdailyreport_form');
        
        $this->template->render_admin_template($this, $data);
    }

    public function create_form() {
        $data = $this->progress_daily_report_tr_model->get_object_array();
        $data['project_list'] =  $this->project_ms_model->find_all();
        $data['type_progress_list'] = $this->type_progress_ms_model->find_all();
        $data['weather_list'] = $this->weather_ms_model->find_all();
       
       
        $data['action'] = 'action_insert';
        $this->form($data);
    }

    public function modify_form($progress_id = '') {
        $id = num_param_url_decode($progress_id);
        if ($id) {
            $data = $this->progress_daily_report_tr_model->find_id($id);
            $data['action'] = 'action_update';
            $this->form($data);
        } else {
            not_found_error();
        }
    }

    public function save() {
        $status_id = $this->progress_daily_report_tr_model->save();
        if ($status_id) {
            echo $status_id;
            redirect(admin_tr_site('progressdailyreport/retrieve/' . num_param_url_encode($status_id) . '/success'));
        } else {
            redirect(admin_tr_site('progressdailyreport/action_error'));
        }
    }

    public function action_error() {
        $data['url_back'] = admin_tr_site('progressdailyreport');
        $data['error_message'] = 'action_error';
        $this->template->append_page_section('block/error_block');
        $this->template->render_admin_template($this, $data);
    }

    public function remove() {
        $status = $this->progress_daily_report_tr_model->update_delete();
        if ($status) {
            $data['url_back'] = admin_tr_site('progressdailyreport');
            $data['succes_message'] = 'delete_success';
            $this->template->append_page_section('block/success_block');
            $this->template->render_admin_template($this, $data);
        } else {
            redirect(admin_tr_site('progressdailyreport/action_error'));
        }
    }

    public function retrieve($progress_id = '', $save_success = 'none') {
        $id = num_param_url_decode($progress_id);
        if ($id) {
            $data = $this->progress_daily_report_tr_model->find_id($id);
            $data['save_success'] = $save_success;
            $this->template->append_page_section('admin/transaction/progressdailyreport/progressdailyreport_show');
            $this->template->render_admin_template($this, $data);
        } else {
            not_found_error();
        }
    }

    public function retrieve_all() {
        $data['progressdailyreport_list'] = $this->progress_daily_report_tr_model->find_all();
        $this->template->append_page_section('admin/transaction/progressdailyreport/progressdailyreport_show_all');
        $this->template->append_javascript('admin/transaction/progressdailyreport/progressdailyreport_show_all_javascript');
        $this->template->render_admin_template($this, $data);
    }

}
