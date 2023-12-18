<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_Direktur extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Direktur');
		$this->load->model('M_Data_Direktur');
		//load helper
		$this->load->helper('access');
		$this->load->helper('Direktur');
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Direktur->get_user_login_data();
	}

	public function index()
	{
		$data['title']            = 'Data Proyek';
		$data['user_login_data']  = $this->user_login_data;
		$data['get_prodi']				=  $this->db->select('*')
													->from('tbl_prodi')
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_direktur/v_data_direktur',$data);
		$this->load->view('layouts/footer');
	}

	public function kelola_proyek_direktur($id)
	{
		$data['title']            = 'Kelola Proyek';
		$data['user_login_data']  = $this->user_login_data;
		$data['proyek'] = $this->db->select('*')
		->from('tbl_proyek')
		->join('tbl_matakuliah', 'tbl_matakuliah.id_matakuliah=tbl_proyek.matakuliah_id')
		->where('tbl_proyek.id_proyek',$id)
		->get()->row();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_direktur/v_data_proyek_kelola',$data);
		$this->load->view('layouts/footer');
	}

		public function lihat_rpp($id)
	{
		$data['title']            = 'Lihat RPP';
		$data['user_login_data']  = $this->user_login_data;
		$data['proyek']           = $this->M_Data_Direktur->tampil($id)->row();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_direktur/v_data_lihat_rpp',$data);
		$this->load->view('layouts/footer');
	}
	public function data_monitoring($id)
	{
		$data['title']            = 'Data Monitoring';
		$data['user_login_data']  = $this->user_login_data;
		$data['proyek']           = $this->M_Data_Direktur->tampil($id)->row();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_direktur/v_data_monitoring',$data);
		$this->load->view('layouts/footer');
	}
	public function data_qc($id)
	{
		$data['title']            = 'Data Quality Control';
		$data['user_login_data']  = $this->user_login_data;
		$data['proyek']           = $this->M_Data_Direktur->tampil($id)->row();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_direktur/v_data_qc',$data);
		$this->load->view('layouts/footer');
	}

	public function show_alat_bahan($id)
	{
	 	$data                    = $this->M_Data_Cpo->get_alat_bahan($id)->row_array();
	 	echo json_encode($data);
	}

	
}

/* End of file Master_Pengumuman.php */
/* Location: ./application/modules/admin/controllers/Master_Pengumuman.php */