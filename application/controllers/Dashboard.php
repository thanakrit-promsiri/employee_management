<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->dashboard();
    }

    public function dashboard() {
        $this->template->render_admin_template($this);
    }

}
