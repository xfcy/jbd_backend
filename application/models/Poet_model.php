<?php

class Poet_model extends MY_Model {




    protected $table = 'poet';

//    public function getByIdBatch($ids, $field_as_key = NULL) {
//
//        $query = $this->db->select('*')->from($this->table)->where_in('id', $ids)->get();
//        $result = $query->result_array();
//        $data = [];
//        if ($field_as_key) {
//            foreach ($result as $row) {
//                $data[$row[$field_as_key]] = $row;
//            }
//        } else {
//            $data = $result;
//        }
//
//        return $data;
//
//    }

//    public function getById($id) {
//
//        $query = $this->db->select('*')
//            ->from($this->table)
//            ->where('id', $id)
//            ->limit(1)
//            ->get();
//        $result = $query->result_array();
//        return isset($result[0]) ? $result[0] : NULL;
//    }
}