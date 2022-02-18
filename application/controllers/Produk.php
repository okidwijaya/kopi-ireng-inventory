<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MyModel');
    }

    public function cetakData()
    {
        $no = 1;
        $data = $this->MyModel->getAll()->result();
        $pdf = new FPDF('l', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'Hasil Data Produk Kopi Ireng', 0, 0, 'C');
        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 10, 'No', 1, 0, "C");
        $pdf->Cell(25, 10, 'Kode Produk', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Nama Produk', 1, 0, 'C');
        $pdf->Cell(15, 10, 'Stok', 1, 0, 'C');
        $pdf->Cell(20, 10, 'Harga', 1, 0, 'C');
        $pdf->Cell(25, 10, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(120, 10, 'Keterangan', 1, 0, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Ln();
        foreach ($data as $row) {
            $pdf->Cell(20, 10, $no++, 1, 0, "C");
            $pdf->Cell(25, 10, $row->kd_jns, 1, 0, 'C');
            $pdf->Cell(50, 10, $row->nama_produk, 1, 0, 'C');
            $pdf->Cell(15, 10, $row->stok, 1, 0, 'C');
            $pdf->Cell(20, 10, $row->harga, 1, 0, 'C');
            $pdf->Cell(25, 10, $row->tanggal, 1, 0, 'C');
            $pdf->Cell(120, 10, $row->keterangan, 1, 0, 'C');
            $pdf->Ln();
        }
        $pdf->Output();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' =>
            $this->session->userdata('email')]
        )->row_array();

        if ($this->form_validation->run() == false) {
            $data['produk'] = $this->MyModel->getAll()->result();
            $data['jns_produk'] = $this->MyModel->getKodeProduk()->result();
            $this->load->view('auth/header', $data);
            $this->load->view('produk/index', $data);
            $this->load->view('auth/footer', $data);
        }
    }


    function tambah()
    {
        $data = array(
            'id_jns' => $this->input->post('kd_jns'),
            'stok' => $this->input->post('stok'),
            'harga' => $this->input->post('harga'),
            'tanggal' => $this->input->post('tanggal'),
            // 'keterangan' => $this->input->post('keterangan'),
        );
        $this->MyModel->tambah($data);
        echo $this->session->set_flashdata('tambah', '<strong>Data Berhasil Di Tambahkan...!!!</strong>');
        redirect("produk");
    }

    //method hapus
    function hapus()
    {
        $id = $this->uri->segment(3);
        $this->MyModel->deleteData($id);
        echo $this->session->set_flashdata('alert', '<strong>Data Berhasil Di Hapus...!!!</strong>');
        redirect("produk/index");
    }
}
