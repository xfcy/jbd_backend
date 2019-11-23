<?php

class MY_Controller extends CI_Controller {

    protected $params;

    protected $get;
    protected $post;

    public function __construct() {

        parent::__construct();

        if (ENVIRONMENT != 'production') {
            $this->output->enable_profiler(TRUE);
        }

        $this->get = $this->input->get();
        $this->post = $this->input->post();
    }

    protected function get_param($name, $default = null) {

        return isset($this->get[$name]) ? $this->get[$name] :
                (isset($this->post[$name]) ? $this->post[$name] :
                    $default);

    }

    protected function get_param_from_query_string($name, $default = null) {

        return isset($this->get[$name]) ? $this->get[$name] : $default;

    }

    protected function get_param_from_post($name, $default = null) {

        return isset($this->post[$name]) ? $this->post[$name] : $default;

    }

    protected function goto404($data = []) {
        $this->load->view('_common/header', $data);
        $this->load->view('_common/search_lite');
        $this->load->view('search/404');
        $this->load->view('_common/footer');
    }
}