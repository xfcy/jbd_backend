<?php

class Search extends MY_Controller {


    public function __construct() {

        parent::__construct();
    }

    public function index() {

        $type = $this->get_param('type', 2);

        switch ($type) {
            case 1:
                $this->_exact();
                break;
            case 2:
            default:
                $this->_fuzzy();
                break;
        }

    }

    private function _exact() {

        // 说是精确查找，其实也得加 % 变成模糊搜索
        $keyword = $this->get_param_from_query_string('keyword');
        if (empty($keyword)) {
            redirect(site_url('/'));
            return;
        }

        $fields = '*';
        $where = "`name` LIKE '%{$keyword}%' OR `content_src` LIKE '%{$keyword}%'";
        $this->load->model('Poetry_model', 'poetry');
        $result = $this->poetry->search($fields, $where);
        $count = count($result);

        $data = [
            'type' => 1,
            'keyword' => $keyword,
            'hasMap' => false
        ];

        switch ($count) {

            case 0:
                // 404
                $this->_show_404($data);
                break;
            case 1:
                // 古诗页
                $poetry = $result[0];

                $poet_id = $poetry['poet_id'];
                $this->load->model('Poet_model', 'poet');
                $poet = $this->poet->getById($poet_id);
                if ($poet == NULL) {
                    $poet = [
                        'name' => '无',
                        'desc' => '无'
                    ];
                }

                $location_id = $poetry['location_id'];
                $this->load->model('Location_model', 'location');
                $location = $this->location->getById($location_id);
                if ($location == NULL) {
                    $location = [
                        'name' => '不详'
                    ];
                }

                $data['poetry'] = $poetry;
                $data['poet'] = $poet;
                $data['location'] = $location;

                $this->load->view('_common/header', $data);
                $this->load->view('_common/search_lite');
                $this->load->view('search/poetry_single');
                $this->load->view('_common/footer');

                break;
            default:
                // 列表页
                $this->_show_poetry_list($result, $data);

                break;
        }

        return ;
    }

    private function _fuzzy() {

        $keyword = $this->get_param_from_query_string('keyword');
        if (empty($keyword)) {
            redirect(site_url('/'));
            return;
        }

        $data = [
            'type' => 2,
            'keyword' => $keyword,
            'hasMap' => false
        ];

        if (is_numeric($keyword)) {
            // 数字，搜精确年份
            $fields = '*';
            $where = ['year_int' => (int) $keyword];

            $this->load->model('Poetry_model', 'poetry');
            $result = $this->poetry->search($fields, $where);

            if (count($result) == 0) {
                // 没有，显示 404
                var_dump(1);
                $this->_show_404($data);
            } else {
                // 有，显示列表
                $this->_show_poetry_list($result, $data);
            }


        } else {
            // 看看是不是诗人
            $this->load->model('Poet_model', 'poet');
            $poet = $this->poet->getByWhere("`name` LIKE '%{$keyword}%'");
            $data['poets'] = $poet == NULL ? [] : $poet;
            $data['poet_count'] = count($data['poets']);

            // 看看是不是地点
            $this->load->model('Location_model', 'location');
            $location = $this->location->getByWhere("`name` LIKE '%{$keyword}%'");
            $data['locations'] = $location == NULL ? [] : $location;
            $data['location_count'] = count($data['locations']);
            $data['location_count'] > 0 && $data['hasMap'] = TRUE;

            // 其他地点
            $where = '1 = 1';
            if ($data['location_count'] > 0) {
                $location_ids = array_column($location, 'id');
                $str_ids = join(',', $location_ids);
                $where = "`id` NOT IN ({$str_ids})";
            }
            $other_location = $this->location->getByWhere($where);
            $data['other_locations'] = $other_location == NULL ? [] : $other_location;
            $data['other_location_count'] = count($data['other_locations']);
            $data['other_location_count'] > 0 && $data['hasMap'] = TRUE;


            // 上面都不是，那就模糊搜诗歌
            $this->load->model('Poetry_model', 'poetry');
            $poetry = $this->poetry->getByWhere("`name` LIKE '%{$keyword}%' OR `content_src` LIKE '%{$keyword}%'");
            $data['poetrys'] = $poetry == NULL ? [] : $poetry;
            $data['poetry_count'] = count($data['poetrys']);
            if ($data['poetry_count'] > 0) {
                $data['poetrys'] = $this->_get_poetry_data($poetry);
            }



            $this->load->view('_common/header', $data);
            $this->load->view('_common/search_lite');
            $this->load->view('search/all');
            $this->load->view('_common/footer');
        }

        return ;
    }

    private function _show_404($data) {
        $this->load->view('_common/header', $data);
        $this->load->view('_common/search_lite');
        $this->load->view('search/404');
        $this->load->view('_common/footer');
    }

    private function _show_poetry_list($result, $data) {

        $data['poetrys'] = $this->_get_poetry_data($result);
        $this->load->view('_common/header', $data);
        $this->load->view('_common/search_lite');
        $this->load->view('search/poetry_list');
        $this->load->view('_common/footer');
    }

    private function _get_poetry_data($result) {


        $poet_id = array_column($result, 'poet_id');
        $this->load->model('Poet_model', 'poet');
        $poets = $this->poet->getByIdBatch($poet_id, 'id');

        $location_id = array_column($result, 'location_id');
        $this->load->model('Location_model', 'location');
        $locations = $this->location->getByIdBatch($location_id, 'id');

        $poetrys = [];
        foreach ($result as $row) {

            $p = [
                'name' => $row['name'],
                'poet' => $poets[$row['poet_id']]['name'],
                'year' => $row['year_int'],
                'location' => isset($locations[$row['location_id']]) ? $locations[$row['location_id']]['name'] : '地点未详',
                'content' => $row['content_src']
            ];
            $poetrys[] = $p;
        }

        return $poetrys;
    }

    public function test() {
        $this->load->model('Location_model', 'location');
        $result = $this->location->getByWhere("(longitude <> '' and latitude <> '') and (longitude <> '109.033297' and latitude <> '34.275736')");

        $data = ['hasMap' => true, 'locations' => $result];
//        var_dump($data);
        $this->load->view('_common/header', $data);
        $this->load->view('_common/search_lite');
        $this->load->view('search/alllocation');
        $this->load->view('_common/footer');
    }
}