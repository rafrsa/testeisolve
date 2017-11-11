<?php

class Users extends CI_Controller{

    public $layout = 'default';
    public $title = 'Teste ISolve';
    public $css = array();
    public $js = array('login','user');

    public function index(){
        $this->load->model("Users_model");

        $config = array(
            'base_url' => base_url('users/p'),
            'per_page' => 10,
            'num_links' => 3,
            'uri_segment' => 3,
            'total_rows' => $this->Users_model->totalUsers(),
            'full_tag_open' => '<ul class="pagination">',
            'full_tag_close' => '</ul>',
            'first_link' => false,
            'last_link' => false,
            'first_tag_open' => '<li>',
            'first_tag_close' => '</li>',
            'prev_link' => "Anterior",
            'prev_tag_open' => '<li class="prev">',
            'prev_tag_close' => '</li>',
            'next_link' => "Próxima",
            'next_tag_open' => '<li class="next">',
            'next_tag_close' => '</li>',
            'last_tag_open' => '<li>',
            'last_tag_close' => '</li>',
            'cur_tag_open' => '<li class="active"><a href="#">',
            'cur_tag_close' => '</a></li>',
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>'
        );

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $offset = $this->uri->segment(3) ? $this->uri->segment(3) : 0;

        $data['list'] = $this->Users_model->getAll($config['per_page'], $offset);

        $this->load->view("users/view_userList", $data);
    }

    public function newUser()
    {
        $this->load->model("Profiles_model");

        $data['profiles'] = $this->Profiles_model->getAllProfiles();
        $data['edit'] = 0;

        $this->load->view("users/view_manageUser", $data);
    }

    public function editUser($user_id)
    {
        $this->load->model("Profiles_model");
        $this->load->model("Users_model");

        $data['user'] = $this->Users_model->getUser($user_id);

        $data['profiles'] = $this->Profiles_model->getAllProfiles();
        $data['edit'] = 1;

        $this->load->view("users/view_manageUser", $data);
    }

    public function viewUser($user_id)
    {
        $this->load->model("Users_model");

        $data['user'] = $this->Users_model->getUser($user_id);
        $data['edit'] = 3;

        $this->load->view("users/view_manageUser", $data);
    }

    public function deleteUser(){
        $this->load->model("Users_model");

        $user_id = $this->input->post("user_id", TRUE);

        $result = $this->Users_model->delete($user_id);

        print($result);
        die();
    }

    public function insertUser()
    {
        $this->load->model("Users_model");

        $data['user_fullname']   = $this->input->post("txtFullname", TRUE);
        $data['user_email']      = $this->input->post("txtEmail", TRUE);
        $data['user_birth_date'] = $this->input->post("txtDatePicker", TRUE);
        $data['user_profile']    = $this->input->post("txtProfile", TRUE);
        $data['user_password']   = md5($this->input->post("txtPass", TRUE));

        $result = $this->Users_model->insert($data);

        print($result);
        die();
    }

    public function updateUser()
    {
        $this->load->model("Users_model");

        $data['user_fullname']   = $this->input->post("txtFullname", TRUE);
        $data['user_email']      = $this->input->post("txtEmail", TRUE);
        $data['user_birth_date'] = $this->input->post("txtDatePicker", TRUE);
        $data['user_profile']    = $this->input->post("txtProfile", TRUE);
        $passOld                 = $this->input->post("passOld", TRUE);
        $userID                  = $this->input->post("userID", TRUE);

        if($passOld != $this->input->post("txtPass", TRUE))
            $data['user_password'] = md5($this->input->post("txtPass", TRUE));

        $result = $this->Users_model->update($userID, $data);

        print($result);
        die();
    }
}