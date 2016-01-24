<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Template {

    public $page_title = '';
    public $js_file = array();
    public $css_file = array();
    public $page_section = array();
    public $javascript = array();
    protected $CI;

    public function __construct() {
        $this->CI = & get_instance();
        date_default_timezone_set('Asia/Bangkok');
    }

    public function render_admin_template(CI_Controller $controller, $data = array()) {
        $this->set_template($controller, "design/templates/admin_template", $data);
    }

    public function render_example_template(CI_Controller $controller, $data = array()) {
        $this->set_template($controller, "design/templates/example_template", $data);
    }

    public function set_template(CI_Controller $controller, $template_view_path, $data = array()) {
 
        $file_lang = array('alert','component','navmenu','employee','project','address','type_progress','weather','button','progress_daily_report','company');
        $controller->lang->load(array($file_lang), 'thai');
        $data['page_section'] = $this->page_section;
        $data['page_title'] = $this->page_title;
        $data['js_file'] = $this->js_file;
        $data['css_file'] = $this->css_file;
        $data['javascript'] = $this->javascript;
        $controller->parser->parse($template_view_path, $data);
    }

    public function append_page_section($section) {
        array_push($this->page_section, $section);
    }

    function set_page_section($page_section = array()) {
        $this->page_section = $page_section;
    }

    function set_page_title($page_title) {
        $this->page_title = $page_title;
    }

    public function append_js($jsfile) {
        array_push($this->js_file, $jsfile);
    }

    public function append_css($cssfile) {
        array_push($this->css_file, $cssfile);
    }

    public function append_javascript($javascript) {
        array_push($this->javascript, $javascript);
    }

    public function set_lang(CI_Controller $controller) {

        $language = trim($controller->session->userdata("LANGUAGE"));

        if ($language == "th") {
            $controller->lang->load('keyword', 'thai');
            $controller->session->set_userdata("LANGUAGE", "th");
        } elseif ($language == "en") {
            $controller->lang->load('keyword', 'english');
        } else {
            $controller->lang->load('keyword');
        }
    }

}
