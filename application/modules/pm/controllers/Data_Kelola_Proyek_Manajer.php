<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_Kelola_Proyek_Manajer extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Proyek_Manajer');
		$this->load->model('M_Data_Proyek_Manajer');
		//load helper
		$this->load->helper('access');
		$this->load->helper('Proyek_Manajer');
		check_access();
		//data user yang login
		$this->user_login_data    = $this->M_Proyek_Manajer->get_user_login_data();
	}

	public function index()
	{
		$data['title']            = 'Data Proyek PM';
		$data['user_login_data']  = $this->user_login_data;
		$data['proyekku'] = $this->db->select('*')
									->from('tbl_proyek')
									->join('tbl_matakuliah', 'tbl_matakuliah.id_matakuliah=tbl_proyek.matakuliah_id')
									->join('tbl_pengguna', 'tbl_pengguna.id_pengguna=tbl_proyek.pengguna_id_manajer_proyek')
									->order_by('id_proyek','DESC')
									->where('pengguna_id_manajer_proyek',$data['user_login_data']['id_pengguna'])
									->get()->result();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_pm/v_data_proyek_manajer',$data);
		$this->load->view('layouts/footer');
	}

	public function kelola_proyek_pm($id)
	{
		$data['title']            = 'Kelola Proyek PM';
		$data['user_login_data']  = $this->user_login_data;
		$data['proyek'] = $this->db->select('*')
		->from('tbl_proyek')
		->join('tbl_matakuliah', 'tbl_matakuliah.id_matakuliah=tbl_proyek.matakuliah_id')
		->join('tbl_ruangan', 'tbl_matakuliah.ruang_id=tbl_ruangan.id_ruang')
		->where('tbl_proyek.pengguna_id_manajer_proyek',$data['user_login_data']['id_pengguna'])
		->where('tbl_proyek.id_proyek',$id)
		->get()->row();
		$data['proyekku1'] =  $this->db->select('*')
									->from('tbl_rpp')
									->join('tbl_proyek', 'tbl_rpp.proyek_id=tbl_proyek.id_proyek')
									->where('tbl_rpp.proyek_id',$id)
									->get()->result();
		$data['rppku'] = 	 $this->db->select('*')
									->from('tbl_monitoring')
									->join('tbl_rpp', 'tbl_monitoring.rpp_id=tbl_rpp.id_rpp')
									->where('tbl_monitoring.monitoring_status', "Selesai")
									->where('tbl_rpp.proyek_id',$id)
									->get()->result();
		$data['proyekku2'] = $this->db->select('*')
										->from('tbl_proyek')
										->join('tbl_pengguna', 'tbl_pengguna.id_pengguna=tbl_proyek.pengguna_id_manajer_proyek')
										->where('tbl_proyek.id_proyek',$id)
										->get()->result();
		$data['proyekku3'] = $this->db->select('*')
										->from('tbl_proyek')
										->join('tbl_pengguna', 'tbl_pengguna.id_pengguna=tbl_proyek.pengguna_id_cpo')
										->where('tbl_proyek.id_proyek',$id)
										->get()->result();
		$data['proyekku4'] = $this->db->select('*')
										->from('tbl_proyek')
										->join('tbl_mahasiswa', 'tbl_mahasiswa.proyek_id=tbl_proyek.id_proyek')
										->join('tbl_prodi', 'tbl_mahasiswa.prodi_id=tbl_prodi.id_prodi')
										->where('tbl_mahasiswa.proyek_id',$id)
										->get()->result();
		$data['proyekku5'] = $this->db->select('*')
										->from('tbl_mahasiswa')
										->join('tbl_proyek', 'tbl_mahasiswa.proyek_id=tbl_proyek.id_proyek')
										->join('tbl_prodi', 'tbl_mahasiswa.prodi_id=tbl_prodi.id_prodi')
										->get()->result();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_pm/v_data_proyek_kelola',$data);
		$this->load->view('layouts/footer');
	}

	public function ajukan_rpp($id)
	{
		$data['title']            = 'Ajukan RPP';
		$data['user_login_data']  = $this->user_login_data;
		$data['proyek']           = $this->M_Data_Proyek_Manajer->tampil($id)->row();
		$data['rppku'] = $this->db->select('*')
									->from('tbl_rpp')
									->where('tbl_rpp.proyek_id',$id)
									->get()->result();
									
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_pm/v_data_diajukan_rpp',$data);
		$this->load->view('layouts/footer');
	}

		public function lihat_rpp($id)
	{
		$data['title']            = 'Lihat RPP';
		$data['user_login_data']  = $this->user_login_data;
		$data['proyek']           = $this->M_Data_Proyek_Manajer->tampil($id)->row();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_pm/v_data_lihat_rpp',$data);
		$this->load->view('layouts/footer');
	}
	public function data_monitoring($id)
	{
		$data['title']            = 'Data Monitoring';
		$data['user_login_data']  = $this->user_login_data;
		$data['proyek']           = $this->M_Data_Proyek_Manajer->tampil($id)->row();
		$data['rppku'] = $this->db->select('*')
									->from('tbl_rpp')
									->join('tbl_monitoring', 'tbl_rpp.id_rpp=tbl_monitoring.rpp_id')
									->where('tbl_rpp.proyek_id',$id)
									->get()->result();
		$data['proyekku'] = $this->db->select('*')
									->from('tbl_rpp')
									->join('tbl_proyek', 'tbl_rpp.proyek_id=tbl_proyek.id_proyek')
									->where('tbl_rpp.proyek_id',$id)
									->get()->result();
		$data['bobot'] = $this->db->select('*')
										->from('tbl_monitoring')
										->join('tbl_rpp', 'tbl_monitoring.rpp_id=tbl_rpp.id_rpp')
										->where('tbl_monitoring.monitoring_status', "Selesai")
										->where('tbl_rpp.proyek_id',$id)
										->get()->result();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_pm/v_data_monitoring',$data);
		$this->load->view('layouts/footer');
	}
	public function data_qc($id)
	{
		$data['title']            = 'Data Quality Control';
		$data['user_login_data']  = $this->user_login_data;
		$data['proyek']           = $this->M_Data_Proyek_Manajer->tampil($id)->row();
		$data['qc'] = $this->db->select('*')
								->from('tbl_quality_control')
								->where('proyek_id',$id						)
								->get()->result();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_pm/v_data_qc',$data);
		$this->load->view('layouts/footer');
	}
	public function add_ajukan()
	{ 
		$id                       = $this->input->post('id_proyek');
		$harga = $this->input->post('rpp_biaya_proyek');
		$data = [
			'proyek_id' 	=> $this->input->post('id_proyek'),
			'rpp_sponsor' 	=> $this->input->post('rpp_sponsor'),
			'rpp_biaya_proyek' 	=> preg_replace('/[Rp. ]/','',$harga),
			'rpp_klien' 	=> $this->input->post('rpp_klien'),
			'rpp_waktu' 	=> $this->input->post('rpp_waktu'),
			'rpp_status' 	=> 'Belum ada',
			'rpp_komentar' 	=> 'Belum ada'
		];
		$this->db->insert("tbl_rpp",$data);
		$this->session->set_flashdata('success','RPP berhasil diajukan');
		redirect('pm/ajukan-rpp/'.$id);
	}
// buatkan fungsi
	// buatkan fungsi tambah tbl_alat_bahan
	public function add_alat_bahan()
	{
		$id                       = $this->input->post('id_proyek');
		$harga = $this->input->post('ab_harga');
		$data = [
			'rpp_id' 	=> $this->input->post('rpp_id'),
			'ab_nama' 	=> $this->input->post('ab_nama'),
			'ab_jumlah' 	=> $this->input->post('ab_jumlah'),
			'ab_unit' 	=> $this->input->post('ab_unit'),
			'ab_harga' 	=> preg_replace('/[Rp. ]/','',$harga),
			'ab_total' 	=> $this->input->post('ab_total')
		];
		$this->db->insert("tbl_alat_bahan",$data);
		$this->session->set_flashdata('success','Alat dan Bahan berhasil ditambahkan');
		redirect('pm/ajukan-rpp/'.$id);
	}
	// buatkan fungsi tambah tbl_monitoring
	public function add_monitoring()
	{
		$data = [
			'id_monitoring' 					=> $this->input->post('id_monitoring'),
			'rpp_id' 						=> $this->input->post('rpp_id'),
			'monitoring_bobot' 					=> $this->input->post('monitoring_bobot'),
			'monitoring_tahapan_pengerjaan' 	=> $this->input->post('monitoring_tahapan_pengerjaan'),
			'monitoring_tanggal_pelaksanaan' 	=> $this->input->post('monitoring_tanggal_pelaksanaan'),
			'monitoring_tanggal_penyelesaian' 	=> $this->input->post('monitoring_tanggal_penyelesaian'),
			'monitoring_komentar' 				=> '',
			'monitoring_status' 				=> 'Belum ada'
		];
		$this->db->insert("tbl_monitoring",$data);
		$this->session->set_flashdata('success','Monitoring berhasil ditambahkan');
		return redirect($_SERVER['HTTP_REFERER']);
	}
   // buatkan fungsi edit tbl_alat_bahan
	public function edit_alat_bahan()
	{
		$id                       = $this->input->post('id_proyek');
		$data = [
			'ab_nama' 	=> $this->input->post('ab_nama'),
			'ab_jumlah' 	=> $this->input->post('ab_jumlah'),
			'ab_unit' 	=> $this->input->post('ab_unit'),
			'ab_harga' 	=> $this->input->post('ab_harga'),
			'ab_total' 	=> $this->input->post('ab_total')
		];
		$id_ab                    = $this->input->post('id_ab');
		$this->M_Data_Proyek_Manajer->update_alat_bahan($id_ab,$data);
		$this->session->set_flashdata('success','Alat dan Bahan berhasil diubah');
		redirect('pm/ajukan-rpp/'.$id);
	}

	public function edit_mt()
	{
		$id                       = $this->input->post('id_proyek');
		$data = [
			'monitoring_status' 	=> $this->input->post('monitoring_status')
		];
		$id_mt                    = $this->input->post('id_monitoring');
		$this->M_Data_Proyek_Manajer->update_mt($id_mt,$data);
		$this->session->set_flashdata('success','monitoring berhasil diubah');
		redirect('pm/data-monitoring/'.$id);
	}
	public function revisi_rpp()
	{
		$id                       = $this->input->post('id_proyek');
		$data = [

			'rpp_sponsor' 	=> $this->input->post('rpp_sponsor'),
			'rpp_biaya_proyek' 	=> $this->input->post('rpp_biaya_proyek'),
			'rpp_klien' 	=> $this->input->post('rpp_klien'),
			'rpp_status' 	=> 'belum ada',
			'rpp_komentar' 	=> 'belum ada'

		];
		$id_rpp  = $this->input->post('id_rpp');
		$this->M_Data_Proyek_Manajer->update($id_rpp,$data);
		$this->session->set_flashdata('success','Data berhasil direvisi');
		redirect('pm/lihat-rpp/'.$id);
	}

	public function show_alat_bahan($id)
	{
	 	$data                    = $this->M_Data_Proyek_Manajer->get_alat_bahan($id)->row_array();
	 	echo json_encode($data);
	}

	public function delete_alat($id)
	{
		$idp                      = $this->input->post('id_proyek');
		$this->M_Data_Proyek_Manajer->delete_alat($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		return redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function delete_mt($id)
	{
		$idp                      = $this->input->post('id_monitoring');
		$this->M_Data_Proyek_Manajer->delete_mt($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		return redirect($_SERVER['HTTP_REFERER']);
	}

	public function pdf($id)
	{
		$data['user_login_data']  = $this->user_login_data;
		$data['proyek'] = $this->db->select('*')
		->from('tbl_proyek')
		->join('tbl_matakuliah', 'tbl_matakuliah.id_matakuliah=tbl_proyek.matakuliah_id')
		->where('tbl_proyek.pengguna_id_manajer_proyek',$data['user_login_data']['id_pengguna'])
		->where('tbl_proyek.id_proyek',$id)
		->get()->row();
		$this->load->view('v_pm/pdf',$data);
	}
	
}

/* End of file Master_Pengumuman.php */
/* Location: ./application/modules/admin/controllers/Master_Pengumuman.php */