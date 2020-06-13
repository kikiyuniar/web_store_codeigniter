<?php

class Data_barang extends CI_Controller
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
		// ambil data search
		// if($this->input->post('submit'))
		// {
		// 	$data['keyword'] = $this->input->post('keyword');
		// } else {
		// 	$data['keyword'] = null;
		// }


		//config
		$config['base_url']			= 'http://localhost/web_store_codeigniter/admin/data_barang/index';
		$config['total_rows']		= $this->model_barang->countAllData();
		$config['per_page']		= 5;

		//initialize
		$this->pagination->initialize($config);
		$data['start']				= $this->uri->segment(4);

		$data['barang'] = $this->model_barang->getData($config['per_page'], $data['start'])->result();

		$data['pagination'] = $this->pagination->create_links();

		// menghitung jumlah total barang
		$data['total_brg'] 			= $this->model_barang->hitug_jumlah_brg();
		$data['kategori'] 			= $this->model_kategori->tampil_data();
		$data['judul'] 				= 'Store - Admin';
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_barang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_aksi()
	{
		$nama_brg	= $this->input->post('nama_brg');
		$keterangan	= $this->input->post('keterangan');
		$kategori	= $this->input->post('kategori');
		$harga		= $this->input->post('harga');
		$stok		= $this->input->post('stok');
		$gambar		= $_FILES['gambar']['name'];
		if ($gambar = '') {
		} else {
			$config['upload_path'] = './uploads';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				echo "Gambar gagal di upload";
			} else {
				$gambar = $this->upload->data('file_name');
			}
		}

		$data = array(
			'nama_brg'		=> $nama_brg,
			'keterangan'	=> $keterangan,
			'kategori'		=> $kategori,
			'harga'			=> $harga,
			'stok'			=> $stok,
			'gambar'		=> $gambar
		);

		$this->model_barang->tambah_barang($data, 'tb_barang');
		redirect('admin/data_barang/index');
	}

	public function edit($id)
	{
		$where = array('id_brg' => $id);
		$data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result();
		$data['judul'] 				= 'Store - Admin';
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_barang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function update()
	{
		$id 			= $this->input->post('id_brg');
		$nama_brg 		= $this->input->post('nama_brg');
		$keterangan 	= $this->input->post('keterangan');
		$kategori 		= $this->input->post('kategori');
		$harga 			= $this->input->post('harga');
		$stok 			= $this->input->post('stok');

		$data = array(
			'nama_brg'		=> $nama_brg,
			'keterangan'	=> $keterangan,
			'kategori'		=> $kategori,
			'harga'			=> $harga,
			'stok'			=> $stok
		);

		$where = array(
			'id_brg' => $id
		);

		$this->model_barang->update_data($where, $data, 'tb_barang');
		redirect('admin/data_barang/index');
	}

	public function hapus($id)
	{
		$where = array('id_brg' => $id);
		$this->model_barang->hapus_data($where, 'tb_barang');
		redirect('admin/data_barang/index');
	}

	public function detail_barang($id_brg)
	{
		$data['judul'] 		= 'Store - Admin';
		$data['barang'] 	= $this->model_barang->detail_brg($id_brg);
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_barang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function pdf()
	{
		$this->load->library('dompdf_gen');

		$data['barang'] = $this->model_barang->tampil_data('tb_barang')->result();

		$this->load->view('admin/laporan_pdf', $data);

		$paper_size 	= 'A4';
		$orientation	= 'potrait';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan_Data_Barang.pdf", array('Attachment' => 0));
		redirect('admin/data_barang/index');
	}

	public function search()
	{
		$data['judul'] 				= 'Store - Admin';
		$config['base_url']			= 'http://localhost/web_store_codeigniter/admin/data_barang/index';
		$keyword = $this->input->post('keyword');
		$this->db->like('nama_brg', $keyword);
		$this->db->from('tb_barang');
		$config['total_rows']		= $this->db->count_all_results();
		$config['per_page']		= 5;

		//initialize
		$this->pagination->initialize($config);
		$data['start']				= $this->uri->segment(4);

		$data['barang'] = $this->model_barang->getData($config['per_page'], $data['start'])->result();

		$data['pagination'] = $this->pagination->create_links();

		$data['total_brg'] 			= $this->model_barang->hitug_jumlah_brg();

		$data['barang'] = $this->model_barang->get_keyword($keyword);

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_barang', $data);
		$this->load->view('templates_admin/footer');

		// ambil data search
		// if($this->input->post('submit'))
		// {
		// 	echo ; $this->input->post('keyword');

		// }
	}
}
