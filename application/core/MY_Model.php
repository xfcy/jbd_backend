<?php

class MY_Model extends CI_Model {

    protected $table;

    public function __construct() {

        parent::__construct();

        $this->load->database();
    }

    public function getAll() {
        $query = $this->db->select('*')
            ->from($this->table)
            ->get();
        $result = $query->result_array();
        return $result;
    }

    public function getByWhere($where, $other = [], $field_as_key = NULL) {
        $query = $this->db->select('*')
            ->from($this->table)
            ->where($where);
        if (isset($other['limit'])) {
            empty($other['offset']) && $other['offset'] = 0;
            $query = $query->limit($other['limit'], $other['offset']);
        }
        $query = $query->get();
        $result = $query->result_array();

        $data = $result;
        if (!empty($field_as_key)) {
            $data = [];

            foreach ($result as $row) {
                $data[$row[$field_as_key]] = $row;
            }
        }

        return $data;
    }

    public function getByUuid($uuid) {
        $query = $this->db->select('*')
            ->from($this->table)
            ->where('uuid', $uuid)
            ->limit(1)
            ->get();
        $result = $query->result_array();
        return isset($result[0]) ? $result[0] : NULL;
    }

    public function getById($id) {

        $query = $this->db->select('*')
            ->from($this->table)
            ->where('id', $id)
            ->limit(1)
            ->get();
        $result = $query->result_array();
        return isset($result[0]) ? $result[0] : NULL;
    }

    public function getByIdBatch($ids, $field_as_key = NULL) {

        $query = $this->db->select('*')->from($this->table)->where_in('id', $ids)->limit(count($ids))->get();
        $result = $query->result_array();
        $data = [];
        if ($field_as_key) {
            foreach ($result as $row) {
                $data[$row[$field_as_key]] = $row;
            }
        } else {
            $data = $result;
        }

        return $data;

    }

    public function getCount($where) {
        return $this->db->from($this->table)->where($where)->count_all_results();
    }

    public function getPage($where, $page, $page_size = 25, $field_as_key = NULL) {

        $other['limit'] = $page_size;
        $other['offset'] =  $page_size * ($page - 1);
        $data = $this->getByWhere($where, $other, $field_as_key);
        $count = $this->getCount($where);
        $pages = ceil($count / $page_size);

        return compact('page', 'page_size', 'pages', 'data');

    }

}