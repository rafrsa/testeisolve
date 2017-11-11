<?php

class Profiles_model extends CI_Model {

    public function getAllProfiles(){
        $this->db = $this->load->database('default', TRUE);

        $query = $this->db->get("tb_profile");
        return $query->result_array();
    }
}