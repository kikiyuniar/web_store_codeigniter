<?php 

class Dashboard_admin extends CI_Controller{
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
		$data['total_brg'] 			= $this->model_barang->hitug_jumlah_brg();
		$data['total_ivc'] 			= $this->model_barang->hitug_jumlah_ivc();
		$data['total_brg_keluar']	= $this->model_barang_keluar->hitug_jumlah_brg_keluar();
		$data['total_kategori']		= $this->model_kategori->hitug_jumlah_kategori();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('templates_admin/footer');
	}
}