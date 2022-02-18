<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MyModel');
    }

    public function cetakData()
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

    public function getAllKodeJns()
    {
        $kd_jns = $this->input->post('kd_jns', true);
        $data = $this->MyModel->getAllByCategory($kd_jns)->result();
        echo json_encode($data);
    }

    public function getAllPenjualan()
    {
        $id = $this->input->post('id', true);
        $qty = $this->input->post("qty", true);
        $id_produk = $this->input->post("id_produk", true);
        $stok = $this->input->post('stok', true);
        $data = [
            'stok' => $stok + $qty
        ];
        $this->MyModel->updateStokProduk($id_produk, $data);
        $this->MyModel->deletePenjualan($id);
        redirect("penjualan");
        // $data = $this->MyModel->getAllPenjualanDanProduk($id)->result();
        // echo json_encode($data);
    }

    public function tambah()
    {
        $data = [
            'nm_produk' => $this->input->post('nama_produk'),
            'kode_produk' => $this->input->post('kd_jns'),
            'qty' => $this->input->post('jml'),
            'harga' => $this->input->post('totalHarga'),
            'tanggal' => $this->input->post('tanggal'),
            'keterangan_pemb' => $this->input->post('keterangan')
        ];

        $id = $this->input->post('id');
        $stok = $this->input->post('stok');
        $qty = $this->input->post('jml');

        $data_stok = [
            'stok' => $stok - $qty
        ];
        if ($qty > $stok) {
            $data['message'] = "Maaf Stok tidak Cukup";
        } else {
            $this->MyModel->updateStokById($id, $data_stok);
            $this->MyModel->addPenjualan($data);
        }
        redirect('penjualan/index');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' =>
            $this->session->userdata('email')]
        )->row_array();
        $data['produk'] = $this->MyModel->getAll()->result();
        // $data['penjualan'] = $this->MyModel->getAllPenjualan()->result();
        $data['penjualan'] = $this->MyModel->getDataPenjualan()->result();
        $this->load->view('auth/header', $data);
        $this->load->view('penjualan/index', $data);
        $this->load->view('auth/footer', $data);
    }
}
