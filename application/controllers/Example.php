<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends CI_Controller {

    public function index() {
        $this->template->append_js('morris.min.js');
        $this->template->append_js('morris-data.js');
        $this->template->append_page_section('example/index');
        $this->template->render_example_template($this);
    }

    public function blank() {

        $this->template->append_page_section('example/blank');
        $this->template->render_example_template($this);
    }

    public function buttons() {

        $this->template->append_page_section('example/buttons');
        $this->template->render_example_template($this);
    }

    public function flot() {
        $this->template->append_css('morris.css');
        $this->template->append_js('excanvas.min.js');
        $this->template->append_js('jquery.flot.js');
        $this->template->append_js('jquery.flot.pie.js');
        $this->template->append_js('jquery.flot.resize.js');
        $this->template->append_js('jquery.flot.time.js');
        $this->template->append_js('jquery.flot.tooltip.min.js');
        $this->template->append_js('flot-data.js');
        $this->template->append_page_section('example/flot');
        $this->template->render_example_template($this);
    }

    public function forms() {

        $this->template->append_page_section('example/forms');
        $this->template->render_example_template($this);
    }

    public function grid() {

        $this->template->append_page_section('example/grid');
        $this->template->render_example_template($this);
    }

    public function icons() {

        $this->template->append_page_section('example/icons');
        $this->template->render_example_template($this);
    }

    public function login() {

        $this->load->view('example/login');
    }

    public function morris() {

        $this->template->append_js('morris.min.js');
        $this->template->append_js('morris-data.js');
        $this->template->append_page_section('example/morris');
        $this->template->render_example_template($this);
    }

    public function notifications() {

        $this->template->append_page_section('example/notifications');
        $this->template->render_example_template($this);
    }

    public function panels_wells() {

        $this->template->append_page_section('example/panels_wells');
        $this->template->render_example_template($this);
    }

    public function tables() {
        $this->template->append_js('dataTables.bootstrap.min.js');
        $this->template->append_page_section('example/tables');
        $this->template->render_example_template($this);
    }

    public function typography() {

        $this->template->append_page_section('example/typography');
        $this->template->render_example_template($this);
    }

}
