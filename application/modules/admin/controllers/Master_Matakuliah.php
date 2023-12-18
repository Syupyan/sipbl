<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_Matakuliah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		$this->load->model('M_Master_Prodi');
		$this->load->model('M_Master_Matakuliah');
		$this->load->model('M_Master_Ruangan');
		$this->load->model('M_Tools_Admin');
		//load helper
		$this->load->helper('admin');
		//mengecek apakah dia melakukan login , dan apa levelnya nya , lalu ditempatkan sesuai hak aksesnya
		$this->load->helper('access');
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function index()
	{
		$data['title']					= 'Mata Kuliah';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan']		= $this->M_Admin->get_all_unread_pesan("count");
		// menampilkan data mata kuliah
		$data['matakuliah']				= $this->db->select('*')
													->from('tbl_matakuliah')
													->join('tbl_prodi', 'tbl_matakuliah.prodi_id=tbl_prodi.id_prodi')
													->join('tbl_ruangan', 'tbl_matakuliah.ruang_id=tbl_ruangan.id_ruang')
													->order_by('tbl_matakuliah.id_matakuliah','DESC')
													->where('tbl_matakuliah.prodi_id',$data['user_login_data']['prodi_id'])
													->get()->result_array();	
		// menampilkan data prodi
		$data['get_prodi']				=  $this->db->select('*')
													->from('tbl_prodi')
													->where('id_prodi',$data['user_login_data']['prodi_id'])
													->get()->result_array();	
		// menampilkan data ruang
		$data['get_ruang']				=  $this->db->get('tbl_ruangan')->result_array();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_master/master_matakuliah',$data);	
		$this->load->view('layouts/footer');	
	}

	// menambahkan data mata kuliah
	public function add_matakuliah_nama()
	{
		$data = [
			'matakuliah_nama' 			=> htmlentities($this->input->post('matakuliah_nama',TRUE)),
			'matakuliah_sks' 					=> htmlentities($this->input->post('matakuliah_sks')),
			'matakuliah_tahunajaran' 			=> htmlentities($this->input->post('matakuliah_tahunajaran')),
			'matakuliah_semester' 			=> htmlentities($this->input->post('matakuliah_semester')),
			'prodi_id' 			=> htmlentities($this->input->post('prodi_id')),
			'ruang_id' 			=> htmlentities($this->input->post('ruang_id'))
		];
		$this->M_Master_Matakuliah->create($data);
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('admin/master-matakuliah');
	}
	// menampilkan data mata kuliah untuk edit melalui ajax
	public function show_matakuliah_nama($id)
	{
	 	$data = $this->M_Master_Matakuliah->get_matakuliah($id)->row_array();
	 	echo json_encode($data);
	}
	// fungsi mengubah data mata kuliah
	public function update_matakuliah_nama()
	{
		$data = [
			'matakuliah_nama' 			=> htmlentities($this->input->post('matakuliah_nama',TRUE)),
			'matakuliah_sks' 					=> htmlentities($this->input->post('matakuliah_sks')),
			'matakuliah_tahunajaran' 			=> htmlentities($this->input->post('matakuliah_tahunajaran')),
			'matakuliah_semester' 			=> htmlentities($this->input->post('matakuliah_semester')),
			'prodi_id' 			=> htmlentities($this->input->post('prodi_id')),
			'ruang_id' 			=> htmlentities($this->input->post('ruang_id'))
		];
		$id_matakuliah_nama = $this->input->post('id_matakuliah'); 
		$this->M_Master_Matakuliah->update($id_matakuliah_nama,$data);
		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('admin/master-matakuliah');
	}
	// fungsi menghapus mata kuliah
	public function delete_matakuliah_nama($id)
	{
		$this->M_Master_Matakuliah->delete($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/master-matakuliah');
	}


}

/* End of file Master_matakuliah_nama.php */
/* Location: ./application/modules/admin/controllers/Master_matakuliah_nama.php */