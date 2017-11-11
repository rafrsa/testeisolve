<?php

class Login extends CI_Controller{

    public $layout = 'login';
    public $title = 'Teste ISolve';
    public $css = array('login');
    public $js = array('login');

    public function index()
    {
        $this->load->view('login/view_login');
    }

    public function userValidate()
    {
        $this->load->model("Login_model");

        $email = $this->input->post("email");
        $pass = $this->input->post("pass");

        $user = $this->Login_model->getUser($email);

        if($user){
            if($user[0]['user_password'] == md5($pass)){

                $session['user_id']       = $user[0]['user_id'];
                $session['user_email']    = $user[0]['user_email'];
                $session['user_fullname'] = $user[0]['user_fullname'];
                $session['user_profile']  = $user[0]['user_profile'];
                $this->session->set_userdata($session);

                print(1); // Usuário e senha corretos.
            }
            else{
                print(3); // Senha incorreta.
            }
        }
        else{
            print(2); // Não existe usuário cadastrado.
        }

        die();
    }
}