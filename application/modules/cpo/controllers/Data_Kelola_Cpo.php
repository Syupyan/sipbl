<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_Kelola_Cpo extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Cpo');
		$this->load->model('M_Data_Cpo');
		//load helper
		$this->load->helper('access');
		$this->load->helper('Cpo');
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Cpo->get_user_login_data();
	}

	public function index()
	{
		$data['title']            = 'Data Proyek CPO';
		$data['user_login_data']  = $this->user_login_data;
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_cpo/v_data_cpo',$data);
		$this->load->view('layouts/footer');
	}

	public function kelola_proyek_cpo($id)
	{
		$data['title']            = 'Kelola Proyek CPO';
		$data['user_login_data']  = $this->user_login_data;
		$data['proyek'] = $this->db->select('*')
		->from('tbl_proyek')
		->join('tbl_matakuliah', 'tbl_matakuliah.id_matakuliah=tbl_proyek.matakuliah_id')
		->join('tbl_ruangan', 'tbl_matakuliah.ruang_id=tbl_ruangan.id_ruang')
		->where('tbl_proyek.pengguna_id_cpo',$data['user_login_data']['id_pengguna'])
		->where('tbl_proyek.id_proyek',$id)
		->get()->row();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_cpo/v_data_proyek_kelola',$data);
		$this->load->view('layouts/footer');
	}

	public function add_qc()
	{
		$nm = $this->input->post('qc_status');
		$result = array();
		foreach($nm AS $key => $val){
		 $result[] = array(
			'proyek_id' 	=> $_POST['id_proyek'][$key],
			'qc_status' 	=> $_POST['qc_status'][$key],
			'qc_catatan' 	=> $_POST['qc_catatan'][$key],
			'qc_kesesuaian_rencana' 	=> $_POST['qc_kesesuaian_rencana'][$key],

		 );
		}            
		
		$test= $this->db->insert_batch('tbl_quality_control', $result); // 
		$this->session->set_flashdata('success','Quality Controll berhasil ditambahkan');
		return redirect($_SERVER['HTTP_REFERER']);
}

		public function lihat_rpp($id)
	{
		$data['title']            = 'Lihat RPP';
		$data['user_login_data']  = $this->user_login_data;
		$data['proyek']           = $this->M_Data_Cpo->tampil($id)->row();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_cpo/v_data_lihat_rpp',$data);
		$this->load->view('layouts/footer');
	}
	public function data_monitoring($id)
	{
		$data['title']            = 'Data Monitoring';
		$data['user_login_data']  = $this->user_login_data;
		$data['proyek']           = $this->M_Data_Cpo->tampil($id)->row();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_cpo/v_data_monitoring',$data);
		$this->load->view('layouts/footer');
	}
	public function data_qc($id)
	{
		$data['title']            = 'Data Quality Control';
		$data['user_login_data']  = $this->user_login_data;
		$data['proyek']           = $this->M_Data_Cpo->tampil($id)->row();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_cpo/v_data_qc',$data);
		$this->load->view('layouts/footer');
	}

	public function edit_mt()
	{
		$id                       = $this->input->post('id_proyek');
		$data = [
			'monitoring_komentar' 	=> $this->input->post('monitoring_komentar'),
		];
		$id_mt                    = $this->input->post('id_monitoring');
		$this->M_Data_Cpo->update_mt($id_mt,$data);
		$this->session->set_flashdata('success','komentar monitoring berhasil ditambah');
		redirect('cpo/data-monitoring/'.$id);
	}

	public function cpo_rpp()
	{
		$id                       = $this->input->post('id_proyek');
		$data = [

			'rpp_komentar' 	=> $this->input->post('rpp_komentar'),
			'rpp_status' 	=> $this->input->post('rpp_status')

		];
		$id_rpp                   = $this->input->post('id_rpp');
		$this->M_Data_Cpo->update($id_rpp,$data);
		$this->session->set_flashdata('success','Komentar dan Status berhasil dikirim');
		redirect('cpo/lihat-rpp/'.$id);
	}

	
}

/* End of file Master_Pengumuman.php */
/* Location: ./application/modules/admin/controllers/Master_Pengumuman.php */