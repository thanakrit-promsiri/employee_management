<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Employee extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('transaction/employee_tr_model');
        $this->load->model('transaction/address_tr_model');
        $this->load->model('master/company_ms_model');
        $this->load->model('transaction/department_tr_model');
        $this->load->model('master/position_ms_model');
        $this->load->model('master/province_ms_model');
        $this->load->model('transaction/employee_address_tr_model');
    }

    public function index() {
        $this->retrieve_all();
    }

    protected function form($data) {
        $this->template->append_css('poonnut-style.css');
        $this->template->append_css('jasny/jasny.css');
        $this->template->append_js('jasny/jasny.js');
        $this->template->append_javascript('admin/transaction/employee/employee_show_all_javascript');
        $this->template->append_page_section('admin/transaction/employee/employee_form');
        $this->template->render_admin_template($this, $data);
    }

    public function create_form() {
        $this->template->append_js('validate.js');
        $data = $this->employee_tr_model->get_object_array();
        $data = array_merge($data,$this->address_tr_model->get_object_array());
        $data = array_merge($data,$this->setDataToArray());
        $data['action'] = 'action_insert';
        $this->form($data);
    }

    public function modify_form($emp_id = '') {
        $id = num_param_url_decode($emp_id);
        if ($id) {
            $this->template->append_js('validate.js');
            $data = $this->employee_tr_model->find_id($id);
            $data = array_merge($data,$this->setDataToArray());
            $one_address = $this->employee_tr_model->find_one_address($id);
            $data = array_merge($data,$one_address);
            $data['action'] = 'action_update';
            $this->form($data);
        } else {
            not_found_error();
        }
    }

    public function save() {
        $upload = $_FILES; //print_r($upload);  echo $upload['userfile]['size']; exit();
        $post_data = $this->input->post();
        $data = array('img' => $post_data['image_path']);
        if($upload['userfile']['size'] > 0) {
            if ($this->verifyImageFormate($upload)) {
                $folder = date("Ymd");
                $directory = "inc/upload/images/$folder";
                $path = $directory;
                $this->filename = $this->input->post('userfile');
                $this->makeDirectory($directory);
                $this->do_upload($path);
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
                $data = array('img' => $folder . "/" . $file_name);
            }
        }
        $status_id = $this->employee_tr_model->save($data);

        //insert address
        $duplicate_address = $this->input->post('duplicate');
        if($duplicate_address == 'on'){
            //save current address
            $address_id = $this->address_tr_model->save();
            $address_id = ($post_data['addr_id'] == '')?$address_id:$post_data['addr_id'];
            $address_id = num_param_url_encode($address_id);
            //save address to type 1
            $data = array('emp_id' => $status_id, 'addr_id' => $address_id,'type' => 1);
            $this->employee_address_tr_model->save($data);

            //save address to type 2
            $data = array('emp_id' => $status_id, 'addr_id' => $address_id,'type' => 2);
            $this->employee_address_tr_model->save($data);
        }else{
            $address_id = $this->address_tr_model->save();
            $address_id = ($post_data['addr_id'] == '')? num_param_url_encode($address_id) : $post_data['addr_id'];
            $data = array('emp_id' => $status_id, 'addr_id' => $address_id,'type' => 1);
            $this->employee_address_tr_model->save($data);

            $this->address_tr_model->set_array_to_model($this->setDataPostToArray($post_data));

            if($post_data['addr_id2'] == '') {
                $address_id = $this->address_tr_model->insert();
                $address_id = num_param_url_encode($address_id);
            }else{
                $address_id = $post_data['addr_id2'];
            }

            $data = array('emp_id' => $status_id, 'addr_id' => $address_id,'type' => 2);
            $this->employee_address_tr_model->save($data);
        }

        if ($status_id) {
            echo $status_id;
            redirect(admin_tr_site('employee/retrieve/' . num_param_url_encode($status_id) . '/success'));
        } else {
            redirect(admin_tr_site('employee/action_error'));
        }
    }

    public function action_error() {
        $data['url_back'] = admin_tr_site('employee');
        $data['error_message'] = 'action_error';
        $this->template->append_page_section('block/error_block');
        $this->template->render_admin_template($this, $data);
    }

    public function remove() {
        $status = $this->employee_tr_model->update_delete();
        if ($status) {
            $data['url_back'] = admin_tr_site('employee');
            $data['succes_message'] = 'delete_success';
            $this->template->append_page_section('block/success_block');
            $this->template->render_admin_template($this, $data);
        } else {
            redirect(admin_tr_site('employee/action_error'));
        }
    }

    public function retrieve($emp_id = '', $save_success = 'none') {
        $id = num_param_url_decode($emp_id);
        if ($id) {
            $data = $this->employee_tr_model->find_id($id);
            $one_address = $this->employee_tr_model->find_one_address($id);
            $data = array_merge($data,$one_address);
            $data['save_success'] = $save_success;
            $this->template->append_page_section('admin/transaction/employee/employee_show');
            $this->template->render_admin_template($this, $data);
        } else {
            not_found_error();
        }
    }

    public function retrieve_all() {
        $data['employee_list']  =   $this->employee_tr_model->find_all();
        $this->template->append_page_section('admin/transaction/employee/employee_show_all');
        $this->template->append_javascript('admin/transaction/employee/employee_show_all_javascript');
        $this->template->render_admin_template($this, $data);
    }


    public function do_upload($path) {
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000000';
        $config['max_width'] = '600';
        $config['max_height'] = '700';
        $new_name = date("His");
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        try{
            if (!$this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors());
                //$this->load->view('admin/transaction/employee/employee_form', $error);
            }
        }catch (Exception $e) {
            echo "limite size";

        }
    }

    public function verifyImageFormate($arrayOfImage){
        //limit image size 2 MB
        return $arrayOfImage['userfile']['size'] <= 2000000; //Byte
    }

    public function makeDirectory($directory){
        if (!file_exists($directory)) {
            mkdir($directory, 0700);
        }
    }

    public function setDataPostToArray($data){
        return array(
            'province_id'   =>  $data['physical_province_id'],
            'district'      =>  $data['physical_district'],
            'subdistrict'   =>  $data['physical_subdistrict'],
            'post_code'     =>  $data['physical_post_code'],
            'addr_detail'   =>  $data['physical_addr_detail'],
            'tel'           =>  $data['physical_tel'],
            'country'       =>  $data['physical_country'],
            'latitude'      =>  $data['physical_latitude'],
            'logitude'      =>  $data['physical_logitude']
        );
    }

    public function setDataToArray(){
        $data['company_list']   =   $this->company_ms_model->find_all();
        $data['department_list'] = $this->department_tr_model->find_all();
        $data['position_list'] = $this->position_ms_model->get_all_use_in_employee();
        $data['province_list'] = $this->province_ms_model->find_all();
        return $data;
    }

}
