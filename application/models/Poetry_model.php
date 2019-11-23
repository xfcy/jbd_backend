<?php

class Poetry_model extends MY_Model {


    protected $table = 'poetry';


    public function search($fields, $where) {

        $query = $this->db->select($fields)
                    ->from($this->table)
                    ->where($where)
                    ->get();

        return $query->result_array();

    }
}