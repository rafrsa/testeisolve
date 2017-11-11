<?php

class Login_model extends CI_Model {

    public function getUser($email){
        $this->db = $this->load->database('default', TRUE);

        $this->db->where("user_email", $email);

        $query = $this->db->get("tb_user");
        return $query->result_array();
    }
}