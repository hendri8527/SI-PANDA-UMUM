<?php


class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ga_model');
    }


    public function index()
    {
        $this->loginMe();
    }

   

    public function loginMe()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required|max_length[128]|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');

        if ($this->form_validation->run() == FALSE) {
            // $this->index();
            echo validation_errors();
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $result = $this->ga_model->loginMe($username, $password);

            if (count($result) > 0) {
                foreach ($result as $res) {
                    $sessionArray = array(
                        'userId' => $res->userId,
                        'role' => $res->roleId,
                        'roleText' => $res->role,
                        'name' => $res->name,
                        'isLoggedIn' => TRUE
                    );

                    $this->session->set_userdata($sessionArray);

                    redirect('/dashboard');
                }
            } else {
                $this->session->set_flashdata('error', 'Username or password mismatch');

                redirect("/");
            }
        }
    }
}
