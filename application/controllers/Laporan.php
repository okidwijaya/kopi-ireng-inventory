<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MyModel');
    }

    public function cetakDataPenjualan()
    {
        $no = 1;
        $data = $this->MyModel->getDataPenjualan()->result();
        $pdf = new FPDF('l', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'Hasil Data Penjualan Kopi Ireng', 0, 0, 'C');
        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 10, 'No', 1, 0, "C");
        $pdf->Cell(25, 10, 'Nama Produk', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Kode Produk', 1, 0, 'C');
        $pdf->Cell(15, 10, 'Quantity', 1, 0, 'C');
        $pdf->Cell(20, 10, 'Harga', 1, 0, 'C');
        $pdf->Cell(25, 10, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(120, 10, 'Keterangan', 1, 0, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Ln();
        foreach ($data as $row) {
            $pdf->Cell(20, 10, $no++, 1, 0, "C");
            $pdf->Cell(25, 10, $row->nm_produk, 1, 0, 'C');
            $pdf->Cell(50, 10, $row->kode_produk, 1, 0, 'C');
            $pdf->Cell(15, 10, $row->qty, 1, 0, 'C');
            $pdf->Cell(20, 10, $row->harga, 1, 0, 'C');
            $pdf->Cell(25, 10, $row->tanggal, 1, 0, 'C');
            $pdf->Cell(120, 10, $row->keterangan, 1, 0, 'C');
            $pdf->Ln();
        }
        $pdf->Output();
    }

    public function cetakDataProduk()
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

    public function cetakDataBahan()
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
        $this->load->view('laporan/index', $data);
    }
}
