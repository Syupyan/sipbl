<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_Ruangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
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
		$data['title']					= 'Data Ruang';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan']		= $this->M_Admin->get_all_unread_pesan("count");
		$data['ruangan']				= $this->db->select('*')
													->from('tbl_ruangan')
													->order_by('id_ruang', 'DESC')
													->get()->result();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_master/master_ruangan',$data);	
		$this->load->view('layouts/footer');	
	}
	// fungsi menambah data ruang
	public function add_ruang()
	{

		$data = [
			'ruangan_nama' 			=> htmlentities($this->input->post('ruangan_nama',TRUE)),
			'ruangan_fasilitas' 			=> $this->input->post('ruangan_fasilitas',TRUE),
			'nama_gedung' 			=> htmlentities($this->input->post('nama_gedung'))
		];
		$this->M_Master_Ruangan->create($data);
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('admin/master-ruangan');
	}
	//  fungsi menampilkan data ruang melalui js
	public function show_ruang($id)
	{
	 	$data = $this->M_Master_Ruangan->get_ruang($id)->row_array();
	 	echo json_encode($data);
	}
	//  fungsi merubah ruang
	public function update_ruang()
	{
		// meng array data
		$data = [
			'ruangan_nama' 			=> htmlentities($this->input->post('ruangan_nama',TRUE)),
			'ruangan_fasilitas' 			=> $this->input->post('ruangan_fasilitas',TRUE),
			'nama_gedung' 			=> htmlentities($this->input->post('nama_gedung'))
		];
		// menyimpan id data
		$id_Prodi = $this->input->post('id_ruang'); 
		// query builder update data dengan memanggil fungsi model
		$this->M_Master_Ruangan->update($id_Prodi,$data);
		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('admin/master-ruangan'); 
	}
	// fungsi menghapus ruang
	public function delete_ruang($id)
	{
		$this->M_Master_Ruangan->delete($id);
		$error = $this->db->error();
		if($error['code'] != 0)
		{
			$this->session->set_flashdata('error','Data gagal dihapus');
			redirect('admin/master-ruangan');
		} else {
			$this->session->set_flashdata('success','Data berhasil dihapus');
			redirect('admin/master-ruangan');
		}
	}


}

/* End of file Master_Prodi.php */
/* Location: ./application/modules/admin/controllers/Master_Prodi.php */