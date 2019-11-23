<?php

class Location extends MY_Controller {



    public function index() {

        $this->load->model('Location_model', 'location');
        $result = $this->location->getByWhere("`longitude` <> '' and `latitude` <> ''");
        $data = [
            'hasMap' => true,
            'locations' => $result,
            'nav' => 'location'
        ];

        $this->load->view('_common/header', $data);
        $this->load->view('_common/search_lite');
        $this->load->view('location/list');
        $this->load->view('_common/footer');
    }

    public function show($uuid) {
        if (empty($uuid)) {

            $this->goto404();
            return;
        }

        $this->load->model('Location_model', 'location');
        $result = $this->location->getByWhere("`longitude` <> '' and `latitude` <> ''", [], 'uuid');
//        $result = $this->location->getByUuid($uuid);
        if (!isset($result[$uuid])) {
            $this->goto404();
            return;
        }
        $location = $result[$uuid];
        unset($result[$uuid]);
        $other_locations = $result;


        $this->load->model('Poetry_model', 'poetry');
        $poetrys = $this->poetry->getByWhere(['location_id' => $location['id']], ['limit' => 6]);
        (count($poetrys) > 0) && $poetrys = $this->_get_poetry_info($poetrys, $location['name']);

//        $other_locations = $this->location->getByWhere("`id` <> {$location['id']}");

        $data = ['location' => $location, 'poetrys' => $poetrys, 'hasMap' => true, 'other_locations' => $other_locations, 'nav' => 'location'];
        $this->load->view('_common/header', $data);
        $this->load->view('_common/search_lite');
        $this->load->view('location/show');
        $this->load->view('_common/footer');
    }

    private function _get_poetry_info($poetrys, $location_name) {
        $poet_ids = array_column($poetrys, 'poet_id');
        $this->load->model('Poet_model', 'poet');
        $poets = $this->poet->getByIdBatch($poet_ids, 'id');

        $result = [];
        foreach ($poetrys as $p) {
            $p['poet'] = isset($poets[$p['poet_id']]) ? $poets[$p['poet_id']]['name'] : '诗人未详';
            $p['location'] = $location_name;
            $result[] = $p;
        }

        return $result;
    }


}