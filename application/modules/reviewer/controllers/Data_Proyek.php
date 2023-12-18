<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_Proyek extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Reviewer');
		$this->load->model('M_Data_Proyek');
		//load helper
		$this->load->helper('access');
		$this->load->helper('reviewer');
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Reviewer->get_user_login_data();
	}

	public function index()
	{
		$data['title']					= 'Data Seluruh Usulan';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['data'] = $this->M_Data_Proyek->tampil()->result();
		$data['proyekku1']				= $this->db->select('*')
													->from('tbl_proyek')
													->join('tbl_matakuliah', 'tbl_matakuliah.id_matakuliah=tbl_proyek.matakuliah_id')
													->join('tbl_pengguna', 'tbl_pengguna.id_pengguna=tbl_proyek.pengguna_id_reviewer')
													->order_by('id_proyek','DESC')
													->where('pengguna_id_reviewer',$data['user_login_data']['id_pengguna'])
													->where('proyek_status','Menunggu Tinjauan Proyek')
													->get()->result();
		$data['proyekku2']				= $this->db->select('*')
													->from('tbl_proyek')
													->join('tbl_matakuliah', 'tbl_matakuliah.id_matakuliah=tbl_proyek.matakuliah_id')
													->join('tbl_pengguna', 'tbl_pengguna.id_pengguna=tbl_proyek.pengguna_id_reviewer')
													->where('pengguna_id_reviewer',$data['user_login_data']['id_pengguna'])
													->where('proyek_status','Menunggu Tinjauan Proyek')
													->get()->result();
		$data['dosenku']				= $this->db->select('*')
        											->from('tbl_pengguna')
        											->join('tbl_akses_menu', 'tbl_akses_menu.id_pengguna=tbl_pengguna.id_pengguna')
        											->where('tbl_akses_menu.menu_id',7)
        											->where('prodi_id',$data['user_login_data']['prodi_id'])
        											->get()->result_array();
		$data['dosenku1']				= $this->db->select('*')
        											->from('tbl_pengguna')
        											->join('tbl_akses_menu', 'tbl_akses_menu.id_pengguna=tbl_pengguna.id_pengguna')
        											->where('tbl_akses_menu.menu_id',8)
        											->where('prodi_id',$data['user_login_data']['prodi_id'])
        											->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_reviewer/v_data_proyek',$data);
		$this->load->view('layouts/footer');
	}

	// fungsi tampil proyek diterima
	public function proyek_diterima()
	{
		$data['title']					= 'Usulan Diterima';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['proyekku']				=  $this->db->select('*')
												->from('tbl_proyek')
												->join('tbl_matakuliah', 'tbl_matakuliah.id_matakuliah=tbl_proyek.matakuliah_id')
												->join('tbl_pengguna', 'tbl_pengguna.id_pengguna=tbl_proyek.pengguna_id_reviewer')
												->order_by('id_proyek','DESC')
												->where('pengguna_id_reviewer',$data['user_login_data']['id_pengguna'])
												->where('proyek_status','Diterima oleh Reviewer')
												->get()->result();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_reviewer/v_data_proyek_diterima',$data);
		$this->load->view('layouts/footer');
	}

	// fungsi proyek data ditolak
	public function proyek_ditolak()
	{
		$data['title']					= 'Usulan Ditolak';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['proyekku']				= $this->db->select('*')
													->from('tbl_proyek')
													->join('tbl_matakuliah', 'tbl_matakuliah.id_matakuliah=tbl_proyek.matakuliah_id')
													->join('tbl_pengguna', 'tbl_pengguna.id_pengguna=tbl_proyek.pengguna_id_reviewer')
													->order_by('id_proyek','DESC')
													->where('pengguna_id_reviewer',$data['user_login_data']['id_pengguna'])
													->where('proyek_status','Ditolak oleh Reviewer')
													->get()->result();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_reviewer/v_data_proyek_ditolak',$data);
		$this->load->view('layouts/footer');
	}
	// menampilkan data proyek
	public function show_usulan($id)
	{
	 	$data = $this->M_Data_Proyek->get_usulan($id)->row_array();
	 	echo json_encode($data);
	} 

	// fungsi update usulan proyek pada segi komentar dan status serta pemilihan cpo dan pm
	public function update_usulan()
	{
		$id_proyek=$this->input->post('id_proyek');
		$per = $this->input->post('proyek_status');
		if($per == "Ditolak oleh Reviewer"){
			$data = [
				'proyek_status' 		=> htmlentities($this->input->post('proyek_status')),
				'proyek_komentar' 		=> $this->input->post('proyek_komentar')
			]; 
			$this->M_Data_Proyek->update($id_proyek,$data);
			$this->session->set_flashdata('success','Data berhasil diubah');
			redirect('reviewer'); 
		}elseif($per == "Diterima oleh Reviewer"){
		$data = [
			'pengguna_id_manajer_proyek' 		=> $this->input->post('pengguna_id_manajer_proyek'),
			'pengguna_id_cpo' 		=> $this->input->post('pengguna_id_cpo'),
			'proyek_status' 		=> htmlentities($this->input->post('proyek_status')),
			'proyek_komentar' 		=> $this->input->post('proyek_komentar')
		]; 
		$this->M_Data_Proyek->update($id_proyek,$data);
		$this->session->set_flashdata('success','Status Proyek dan Komentar berhasil dikirim !');
		redirect('reviewer'); 
		}
	}

}

/* End of file Master_Pengumuman.php */
/* Location: ./application/modules/admin/controllers/Master_Pengumuman.php */