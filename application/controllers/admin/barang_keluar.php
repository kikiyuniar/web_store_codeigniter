<?php

class Barang_keluar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('role_id') != '1') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
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
		//config
		$config['base_url']			= 'http://localhost/web_store_codeigniter/admin/barang_keluar/index';
		$config['total_rows']		= $this->model_barang_keluar->countAllData();
		$config['per_page']		= 5;

		//initialize
		$this->pagination->initialize($config);
		$data['start']				= $this->uri->segment(4);

		// $data['barang'] = $this->model_barang_keluar->getData($config['per_page'], $data['start'])->result();

		$data['pagination'] = $this->pagination->create_links();

		$data['judul'] 	 = 'Store - Admin';
		$data['pesanan'] = $this->model_barang_keluar->tampil_data($config['per_page'], $data['start']);
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/barang_keluar', $data);
		$this->load->view('templates_admin/footer');
	}
}
