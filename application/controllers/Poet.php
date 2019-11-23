<?php

class Poet extends MY_Controller {

    public function index() {

        $this->load->model('Poet_model', 'poet');
        $result = $this->poet->getAll();
        $data = [
            'hasMap' => false,
            'poets' => $result,
            'nav' => 'poet'
        ];

        $this->load->view('_common/header', $data);
        $this->load->view('_common/search_lite');
        $this->load->view('poet/list');
        $this->load->view('_common/footer');
    }

    public function show($uuid) {
        if (empty($uuid)) {

            $this->goto404();
            return;
        }

        $this->load->model('Poet_model', 'poet');
        $result = $this->poet->getByUuid($uuid);
        if (empty($result)) {
            $this->goto404();
            return;
        }

        $poet = $result;


        $this->load->model('Poetry_model', 'poetry');
        $poetrys = $this->poetry->getByWhere(['poet_id' => $poet['id']], ['limit' => 6]);
        (count($poetrys) > 0) && $poetrys = $this->_get_poetry_info($poetrys, $poet['name']);

//        $other_locations = $this->location->getByWhere("`id` <> {$location['id']}");

        $data = ['poet' => $poet, 'poetrys' => $poetrys, 'hasMap' => false, 'nav' => 'poet'];
        $this->load->view('_common/header', $data);
        $this->load->view('_common/search_lite');
        $this->load->view('poet/show');
        $this->load->view('_common/footer');
    }

    private function _get_poetry_info($poetrys, $poet_name) {
        $location_ids = array_column($poetrys, 'location_id');
        $this->load->model('Location_model', 'location');
        $locations = $this->location->getByIdBatch($location_ids, 'id');

        $result = [];
        foreach ($poetrys as $p) {
            $p['poet'] = $poet_name;
            $p['location'] = isset($locations[$p['location_id']]) ? $locations[$p['location_id']]['name'] : '地点未详';
            $result[] = $p;
        }

        return $result;
    }


}