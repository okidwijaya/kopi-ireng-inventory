<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MyModel');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' =>
            $this->session->userdata('email')]
        )->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/header', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('auth/footer', $data);
        }

        $data = array(
            'produk' => $this->MyModel->count('produk'),
            'penjualan' => $this->MyModel->count('penjualan'),
            'bahan baku' => $this->MyModel->count('pemb_bhn'),
        );
    }
}
