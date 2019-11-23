<?php

class User_model extends MY_Model {


    private static $table = 'user';

    public function getOneByEmail($email = null) {

        if (empty($email)) {
            return null;
        }

        $this->db->from(self::$table)->where('email', $email)->limit(1);
        $result = $this->db->get()->result_array();

        if (count($result)) {
            return $result[0];
        }

        return null;


    }

    public function getOneByUuid($uuid = null) {

        if (empty($uuid)) {
            return null;
        }

        $this->db->from(self::$table)->where('uuid', $uuid)->limit(1);
        $result = $this->db->get()->result_array();

        if (count($result)) {
            return $result[0];
        }

        return null;


    }
}