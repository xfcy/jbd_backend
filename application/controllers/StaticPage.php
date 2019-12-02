<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Ramsey\Uuid\Uuid;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class StaticPage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->model('Location_model', 'location');
        $result = $this->location->getByWhere("`longitude` <> '' and `latitude` <> ''");
        $data = ['locations' => $result, 'nav' => 'home'];
		$this->load->view('index', $data);
	}

	public function about_project() {

        $this->load->view('_common/header', ['nav' => 'project', 'hasMap' => false]);
        $this->load->view('_common/search_lite');
        $this->load->view('about/project');
        $this->load->view('_common/footer');

    }

    public function about_website() {

        $this->load->view('_common/header', ['nav' => 'website', 'hasMap' => false]);
        $this->load->view('_common/search_lite');
        $this->load->view('about/website');
        $this->load->view('_common/footer');
    }
/*
	public function user() {
        $uuid = getUuidWithoutDash();
        echo $uuid . '<br>';

        $pwd = password_hash('admin123', PASSWORD_DEFAULT);
        echo $pwd . '<br>';

        $this->load->database();
        $time = time();
        $isAdmin = 1;
        $sql = "INSERT INTO jbd_user (uuid, name, email, password, is_admin, create_time) VALUES ('{$uuid}', 'admin', 'admin@jingbiandao.com','{$pwd}', {$isAdmin}, {$time})";
        $res = $this->db->query($sql);
        var_dump($res);
    }

    public function import() {

	    $poet = [];
	    $poet_id = 209;
	    $poetry = [];
	    $poetry_id = 457;
	    $location = [];
	    $location_id = 1;

	    $this->load->model('Poet_model', 'poet');
	    $this->load->model('Location_model', 'location');
	    $poet_in_table = $this->poet->getAll();
	    foreach ($poet_in_table as $k => $v) {
            $poet_in_table[md5($v['name'])] = $v;
            unset($poet_in_table[$k]);
        }

	    $file = 'C:\\Users\\xfcyp\\OneDrive\\Documents\\by_date\\201911\\京汴道\\表2.xlsx';
	    $reader = ReaderEntityFactory::createXLSXReader();
	    $reader->open($file);

//        echo '<pre>';
	    foreach ($reader->getSheetIterator() as $sheet) {

	        foreach ($sheet->getRowIterator() as $row) {

	            $item = $row->toArray();
	            if ($item[0] == '作者') {
	                continue;
                }

	            $poet_name = trim($item[0]);
	            $poet_md5 = md5($poet_name);
	            $pp = [];
	            if (isset($poet_in_table[$poet_md5])) {
	                $pp = $poet_in_table[$poet_md5];
                } else if (isset($poet[$poet_md5])) {
	                $pp = $poet[$poet_md5];

                } else {
                    $poet[$poet_md5] = [
                        'id' => $poet_id++,
                        'uuid' => getUuidWithoutDash(),
                        'name' => $poet_name,
                        'desc' => trim($item[3]),
                        'create_time' => time()
                    ];
                    $pp = $poet[$poet_md5];
                }

//	            $location_name = trim($item[2]);
//                $location_md5 = md5($location_name);
//                if (!isset($location[$location_md5])) {
//                    $location[$location_md5] = [
//                        'id' => $location_id++,
//                        'uuid' => getUuidWithoutDash(),
//                        'name' => $location_name,
//                        'desc' => '',
//                        'create_time' => time()
//                    ];
//                }

                $year = '-1';
                $res = preg_match('/(\d+)/', $item[4], $match);
                if ($res) {
                    $year = $match[0];
                }
                $p = [
                    'id' => $poetry_id++,
                    'uuid' => getUuidWithoutDash(),
                    'name' => mb_str_replace(['《', '》'], '', trim($item[2])),
                    'poet_id' => $pp['id'],
                    'location_id' => $item[1],
                    'year_int' => $year,
                    'year_text' => trim($item[4]),
                    'content_src' => preg_replace('/\s/', '', trim($item[7])),
                    'content_html' => preg_replace('/\s/', '<br>', trim($item[7])),
                    'desc' => trim($item[6]),
                    'background' => trim($item[5]),
                    'create_time' => time()
                ];

//                echo '<pre>';
//                var_dump($item);
//                var_dump($p);
//                echo '</pre>';
                $poetry[] = $p;


            }
        }
        echo '<pre>';
//        var_dump($poetry, $poet);

        $this->load->database();
        $res1 = $this->db->insert_batch('poet', $poet);
        $res2 = $this->db->insert_batch('poetry', $poetry);
        var_dump($res1, $res2);


    }
    */
}
