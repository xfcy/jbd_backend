<?php

class Poetry extends MY_Controller {

    public function index($page = 1) {

        empty($page) && $page = 1;

        $this->load->model('Poetry_model', 'poetry');
        $result = $this->poetry->getPage([], $page, 50);
        $data = [
            'hasMap' => false,
            'poetrys' => $this->_get_poetry_info($result['data']),
            'page' => $result['page'],
            'pages' => $result['pages'],
            'nav' => 'poetry'
        ];

        $this->load->view('_common/header', $data);
        $this->load->view('_common/search_lite');
        $this->load->view('poetry/list');
        $this->load->view('_common/footer');
    }

    public function show($uuid) {
        if (empty($uuid)) {

            $this->goto404();
            return;
        }

        $this->load->model('Poetry_model', 'poetry');
        $result = $this->poetry->getByUuid($uuid);
        if (empty($result)) {
            $this->goto404();
            return;
        }

        $res = $this->_get_poetry_info([$result], true);
        $poetry = $res[0];

        $data = ['poetry' => $poetry, 'hasMap' => false, 'nav' => 'poetry'];
        $this->load->view('_common/header', $data);
        $this->load->view('_common/search_lite');
        $this->load->view('poetry/show');
        $this->load->view('_common/footer');
    }

    private function _get_poetry_info($poetrys, $need_location = false) {
        $poet_ids = array_column($poetrys, 'poet_id');
        $this->load->model('Poet_model', 'poet');
        $poets = $this->poet->getByIdBatch($poet_ids, 'id');

        if ($need_location) {
            $this->load->model('Location_model', 'location');
            $location_ids = array_column($poetrys, 'location_id');
            $locations = $this->location->getByIdBatch($location_ids, 'id');
        }

        $result = [];
        foreach ($poetrys as $p) {
            $p['poet'] = isset($poets[$p['poet_id']]) ? $poets[$p['poet_id']]['name'] : '作者未详';
            $p['poet_url'] = isset($poets[$p['poet_id']]) ? site_url("/poet/show/{$poets[$p['poet_id']]['uuid']}") : '';
            $p['poet_desc'] = isset($poets[$p['poet_id']]) ? $poets[$p['poet_id']]['desc'] : '作者未详';
            $need_location && $p['location'] = isset($locations[$p['location_id']]) ? $locations[$p['location_id']]['name'] : '地点未详';
            $need_location && $p['location_url'] = isset($locations[$p['location_id']]) ? site_url('/location/show/' . $locations[$p['location_id']]['uuid']) : '';
            $result[] = $p;
        }

        return $result;
    }
}