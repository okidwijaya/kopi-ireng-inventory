<?php

class MyModel extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('jns_produk');
        $this->db->join('produk', 'produk.id_jns=jns_produk.kd_jns');
        return $query = $this->db->get();
        // return $this->db->get('produk');
    }

    public function getAllPenjualanDanProduk($id)
    {
        $this->db->select("*");
        $this->db->from("penjualan");
        $this->db->join("produk", 'produk.id_jns=penjualan.kode_produk');
        $this->db->where("penjualan.id_produk", $id);
        return $query = $this->db->get();
    }

    public function updateStokProduk($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update("produk", $data);
    }

    public function deletePenjualan($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete("penjualan");
    }
    public function getDataPenjualan()
    {
        $this->db->select("*");
        $this->db->from("penjualan");
        $this->db->join("produk", 'produk.id_jns=penjualan.kode_produk');
        return $query = $this->db->get();
    }
    public function getDataBahan()
    {
        $this->db->select("*");
        $this->db->from("pemb_bhn");
        return $query = $this->db->get();
    }

    public function updateStokById($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('produk', $data);
    }

    public function getAllPenjualan()
    {
        return $this->db->get('penjualan');
    }

    public function addPenjualan($data)
    {
        $this->db->insert('penjualan', $data);
    }

    public function getAllByCategory($kd_jns)
    {
        $this->db->select('*');
        $this->db->from('jns_produk');
        $this->db->join('produk', 'produk.id_jns=jns_produk.kd_jns');
        $this->db->where('jns_produk.kd_jns', $kd_jns);
        return $query = $this->db->get();
    }

    public function getKodeProduk()
    {
        return $this->db->get('jns_produk');
    }

    public function addKodeProduk($data)
    {
        $this->db->insert('jns_produk', $data);
    }

    function produk()
    {
        $q = $this->db->query("id_produk from produk");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return "P-" . $kd;
    }

    function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('produk');
    }

    public function tambah($data)
    {
        $this->db->insert('produk', $data);
    }

    //delete jns_produk
    function deleteDataProduk($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jns_produk');
    }

    public function getAllBahan()
    {
        return $this->db->get('pemb_bhn');
    }

    public function tambahbhn($data)
    {
        $this->db->insert('pemb_bhn', $data);
    }

    //funtion delete bhn
    function deleteDataBhn($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pemb_bhn');
    }


    //dashboard
    function count($table = '')
    {
        return $this->db->count_all($table);
    }
}
