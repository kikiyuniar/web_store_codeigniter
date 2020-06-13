<?php 

class Model_barang_keluar extends CI_Model{
	public function tampil_data($limit, $start)
	{
		$this->db->select('tb_pesanan.id_invoice, tb_pesanan.id_brg, tb_pesanan.nama_brg, tb_pesanan.jumlah, tb_invoice.tgl_pesan');
	    $this->db->from('tb_pesanan');
	    $this->db->join('tb_invoice','tb_invoice.id=tb_pesanan.id_invoice');
	    $this->db->order_by('tb_pesanan.id');
	    $this->db->limit($limit, $start);
		$query = $this->db->get();
	    return $query->result();
	}

	public function countAllData()
	{
		return $this->db->get('tb_pesanan')->num_rows();
	}

	public function hitug_jumlah_brg_keluar()
	{
		$hitung = $this->db->get('tb_pesanan');
		if($hitung->num_rows() > 0){
			return $hitung->num_rows();
		} else {
			return 0;
		}
	}
}