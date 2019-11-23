<?php

class Location_model extends MY_Model {



    protected $table = 'location';

//    public function getByIdBatch($location_ids, $field_as_key = NULL) {
//
//        $query = $this->db->select('*')
//            ->from($this->table)
//            ->where_in('id', $location_ids)
//            ->get();
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
}