<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim',
            'required',
            'valid_email'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim',
            'required'
        );

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login page';
            $this->load->view('auth/login', $data);
        } else {
            echo
                $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        (password_verify($password, $user['password']));
        if ($user['is_active'] == 1) {
            $data = [
                'email' => $user['email'],
                'role_id' => $user['role_id']
            ];
            $this->session->set_userdata($data);
            redirect('dashboard/index');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger"
            role="alert">
            password salah!
            </div>'
            );
        }
    }



    public function registration()
    {
        $this->form_validation->set_rules(
            'name',
            'Name',
            'required',
            'trim'
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required',
            'trim',
            'valid_email',
            'is_unique[user.email]',
            ['is_unique' => 'emaile wes di enggo']
        );
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required',
            'trim',
            'min_length[3]matches[password2]',
            [
                'matches' => 'password dont match!',
                'min_lenght' => 'password too short!'
            ]
        );
        $this->form_validation->set_rules(
            'password2',
            'Password',
            'required',
            'trim',
            'min_length[3]matches[password1]'
        );


        if ($this->form_validation->run() == false) {
            $this->load->view('auth/registration');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-sucsess" role="alert">
            selamat akun ada telah jadi.
            Tolong login</div>'
            );
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger"
        role="alert">
        Kamu telah logout
        !</div>'
        );
        redirect('auth');
    }
}
