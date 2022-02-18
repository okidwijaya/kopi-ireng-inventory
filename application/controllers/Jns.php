<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jns extends CI_Controller
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
            $data['jns_produk'] = $this->MyModel->getAll()->result();
            $data['jns_produk'] = $this->MyModel->getKodeProduk()->result();
            $this->load->view('auth/header', $data);
            $this->load->view('jns/index', $data);
            $this->load->view('auth/footer', $data);
        }
    }

    public function tambah()
    {
        $data = [
            'kd_jns' => $this->input->post('kode_produk'),
            'nama_produk' => $this->input->post('nama_produk')
        ];

        $this->MyModel->addKodeProduk($data);
        redirect('jns/index');
    }

    //method hapus
    function hapus()
    {
        $id = $this->uri->segment(3);
        $this->MyModel->deleteDataProduk($id);
        echo $this->session->set_flashdata('alert', '<strong>Data Berhasil Di Hapus!!!</strong>');
        redirect("jns/index");
    }
}
