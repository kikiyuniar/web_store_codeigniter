<?php 

class Model_kategori extends CI_Model{
	public function tampil_data()
	{
		return $this->db->get('tb_kategori')->result();
	}

	public function tambah_kategori($data, $table)
	{
		$this->db->insert($table,$data);
	}

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	// ======================================

	public function data_elektronik()
	{
		return $this->db->get_where("tb_barang", array('kategori' => 'elektronik'));
	}

	public function data_pakaian_pria()
	{
		return $this->db->get_where("tb_barang", array('kategori' => 'pakaian laki-laki'));

	}

	public function data_pakaian_wanita()
	{
		return $this->db->get_where("tb_barang", array('kategori' => 'pakaian wanita'));

	}

	public function data_pakaian_anak_anak()
	{
		return $this->db->get_where("tb_barang", array('kategori' => 'pakaian anak-anak'));

	}

	public function data_peralatan_olahraga()
	{
		return $this->db->get_where("tb_barang", array('kategori' => 'peralatan olahraga'));

	}

		public function hitug_jumlah_kategori()
	{
		$query = $this->db->get('tb_kategori');
		if($query->num_rows() > 0){
			return $query->num_rows();
		} else {
			return 0;
		}
	}
}