<?php

class Poetry extends MY_Controller {


    public function index() {

        $this->load->view('admin/_common/header');
        $this->load->view('admin/poetry/list');
        $this->load->view('admin/_common/footer');
    }
}