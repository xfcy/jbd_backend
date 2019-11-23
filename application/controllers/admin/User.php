<?php

class User extends MY_Controller {


    public function index() {
        echo '132<a href="/admin/user/exit">exit</a>';
    }

    public function login() {
        $url = $this->input->get('return', TRUE);
        $url = empty($url) ? base64_encode('/admin') : $url;
        $notice = $this->session->flashdata('notice');
        $this->load->view('admin/login', ['return' => $url, 'notice' => $notice]);
    }

    public function doLogin() {
        $params = $this->input->post();
        $email = $params['email'];
        $password = $params['password'];
        $remember = isset($params['remember']) ? $params['remember'] : 'off';
        $remember = $remember == 'on' ? TRUE : FALSE;
        $return = $params['return'];
        $url = base64_decode($return);

        $this->load->model('User_model', 'user');
        $user = $this->user->getOneByEmail($email);

        if ($user == null) {
            $this->_loginFailed($return);
        }

        if (!password_verify($password, $user['password'])) {
            $this->_loginFailed($return);
        }

        $this->_setLoginCookies($user['uuid'], $remember);
        redirect($url);
    }

    public function exit() {
        $this->_deleteLoginCookies();
        $this->session->set_flashdata('notice', '已退出后台系统。');
        redirect('/admin/user/login');
    }

    private function _loginFailed($return) {

        $this->session->set_flashdata('notice', '邮箱或密码错误！');
        redirect('/admin/user/login?return=' . $return);
    }

    private function _setLoginCookies($uuid, $remember) {
        $content = base64_encode($this->encryption->encrypt($uuid));
        $expire = time() + $remember ? 60 * 60 * 24 : 60 * 60 * 24 * 7;
        set_cookie('__TOKEN__', $content, $expire, '', '/', '', FALSE, TRUE);
    }

    private function _deleteLoginCookies() {
        delete_cookie('__TOKEN__');
    }
}
