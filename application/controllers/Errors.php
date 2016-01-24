<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        show_404();
    }
    
    public function not_found_error() {
        $data['url_back'] = site_url('dashboard/');
        $data['error_message'] = 'page_not_found';
        $this->template->append_page_section('block/error_block');
        $this->template->render_admin_template($this, $data);
    }

}
