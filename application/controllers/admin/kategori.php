<?php 

class Kategori extends CI_Controller{
	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('role_id') != '1')
		{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Anda Belum Login!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['judul'] 				= 'Store - Admin';
		$this->load->helper('string');
		$data['kategori'] 			= $this->model_kategori->tampil_data();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/kategori',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_kategori()
	{
		$id_kategori	= $this->input->post('id_kategori');
		$nama_kategori	= $this->input->post('nama_kategori');

		$data = array(
			'id_kategori'		=> $id_kategori,
			'nama_kategori'	=> $nama_kategori
		);

		$this->model_kategori->tambah_kategori($data,'tb_kategori');
		redirect('admin/kategori/index');
	}

	public function hapus($id)
	{
		$where = array('id' => $id);
		$this->model_kategori->hapus_data($where, 'tb_kategori');
		redirect('admin/kategori/index');
	}
}