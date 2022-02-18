<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bahan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MyModel');
    }

    public function cetakData()
    {
        $no = 1;
        $data = $this->MyModel->getDataBahan()->result();
        $pdf = new FPDF('l', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'Hasil Data Bahan Baku Kopi Ireng', 0, 0, 'C');
        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 10, 'No', 1, 0, "C");
        $pdf->Cell(40, 10, 'Nama Bahan', 1, 0, 'C');
        $pdf->Cell(15, 10, 'Jumlah', 1, 0, 'C');
        $pdf->Cell(20, 10, 'Harga', 1, 0, 'C');
        $pdf->Cell(25, 10, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(120, 10, 'Keterangan', 1, 0, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Ln();
        foreach ($data as $row) {
            $pdf->Cell(20, 10, $no++, 1, 0, "C");
            $pdf->Cell(40, 10, $row->nm_bhn, 1, 0, 'C');
            $pdf->Cell(15, 10, $row->jumlah, 1, 0, 'C');
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
            $data['pemb_bhn'] = $this->MyModel->getAllBahan()->result();
            $this->load->view('auth/header', $data);
            $this->load->view('bahan/index', $data);
            $this->load->view('auth/footer', $data);
        }
    }

    function tambah()
    {
        $data = array(
            'nm_bhn' => $this->input->post('nm_bhn'),
            'jumlah' => $this->input->post('jumlah'),
            'harga' => $this->input->post('harga'),
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
        );
        $this->MyModel->tambahbhn($data);
        echo $this->session->set_flashdata('tambah', '<strong>Data Berhasil Di Tambahkan...!!!</strong>');
        redirect("bahan/index");
    }

    //method hapus
    function hapus()
    {
        $id = $this->uri->segment(3);
        $this->MyModel->deleteDataBhn($id);
        echo $this->session->set_flashdata('alert', '<strong>Data Berhasil Di Hapus!!!</strong>');
        redirect("bahan/index");
    }
}
