<?php

class Users_model extends CI_Model {

    public function getAll($limit = null, $offset = null){
        $this->db = $this->load->database('default', TRUE);

        $this->db->order_by("user_id", "ASC");

        if($limit)
            $this->db->limit($limit,$offset);

        $this->db->join("tb_profile", 'tb_profile.profile_id = tb_user.user_profile');

        $query = $this->db->get("tb_user");
        return $query->result();
    }

    public function totalUsers()
    {
        return $this->db->count_all("tb_user");
    }

    public function getUser($user_id){

        $this->db = $this->load->database('default', TRUE);

        $this->db->join("tb_profile", 'tb_profile.profile_id = tb_user.user_profile');

        $this->db->where('user_id', $user_id);
        $query = $this->db->get("tb_user");
        return $query->result_array();
    }

    public function delete($user_id){
        $this->db = $this->load->database('default', TRUE);

        $this->db->where('user_id', $user_id);
        return $this->db->delete('tb_user');
    }

    public function insert($data){
        $this->db = $this->load->database('default', TRUE);

        return $this->db->insert('tb_user', $data);
    }

    public function update($userID, $data){
        $this->db = $this->load->database('default', TRUE);

        $this->db->where('user_id', $userID);
        return $this->db->update('tb_user', $data);
    }
}