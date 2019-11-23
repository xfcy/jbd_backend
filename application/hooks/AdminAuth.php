<?php

class AdminAuth {

    public function check() {

        $ci = &get_instance();

        $uri = uri_string();
        if (
            (strpos($uri, 'admin') !== 0) ||
            (strpos($uri, 'login') !== FALSE) ||
            (strpos($uri, 'doLogin') !== FALSE)
        ) {
            return;
        }

        $token = get_cookie('__TOKEN__', TRUE);
        $token = $ci->encryption->decrypt(base64_decode($token));

        $ci->load->model('User_model', 'user');
        $user = $ci->user->getOneByUuid($token);
        if (empty($user)) {
            $currentURL = base64_encode(current_url());
            redirect('/admin/user/login?return=' . $currentURL, 'location', 302);
            return;
        }

    }
}