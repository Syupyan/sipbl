<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengusul extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->library('form_validation');
		$this->load->model('M_Pengusul');	
		//load helper
		// $this->load->helper('pengusul');
		$this->load->helper('access');
		// memqnggil helper pengusul
		$this->load->helper('Pengusul');
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Pengusul->get_user_login_data();
	}

	public function index()
	{
		// ini fungsinya untuk judul tampilan usulan, digunakan agar sidebar bisa aktif
		$data['title']					= 'Data Usulan Saya';
		// ini fungsinya untuk mengetahui apakah user tersebut login atau belum, maupun data yg di loginkan sesuai
		// atau tidak dengan database tbl_pengguna
		$data['user_login_data'] 		= $this->user_login_data;
		// ini query builder untuk menampilkan proyek dari si pengusul
		$data['proyekku']				= $this->db->select('*')
													->from('tbl_proyek')
													->join('tbl_matakuliah', 'tbl_matakuliah.id_matakuliah=tbl_proyek.matakuliah_id')
													->join('tbl_pengguna', 'tbl_pengguna.id_pengguna=tbl_proyek.pengguna_id_pengusul')
													// dimana ketika yg login sama dengan atribut pengguna_id_pengusul di proyek tersebut
													// maka datanya akan ditampilkan itu saja
													->where('pengguna_id_pengusul',$data['user_login_data']['id_pengguna'])
													->get()->result();
		########### ============= ##############

		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_pengusul/v_usulan_saya',$data);
		$this->load->view('layouts/footer');
	}

	public function ajukan_proyek()
	{
		$data['title']				= 'Ajukan Proyek';
		$data['user_login_data'] 	= $this->user_login_data;
		$data['get_matkul']				= $this->db->select('*')
													->from('tbl_matakuliah')
													->where('prodi_id',$data['user_login_data']['prodi_id'])
													->get()->result_array();
		########### ============= ##############
		// validasi pada form
		ajukan_proyek_validation();
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('layouts/header',$data);
			$this->load->view('layouts/navbar',$data);
			$this->load->view('layouts/sidebar',$data);
			$this->load->view('v_pengusul/v_ajukan_proyek',$data);
			$this->load->view('layouts/footer');	
		}else{
			//  upload file pdf
		$config['upload_path']          = './asset/file/pdf_proyek/';
		// pembatasan file yang di upload
		$config['allowed_types']        = 'pdf';
		// pembatasan ukuran file yang di upload
		$config['max_size']             = 3000;
		$config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
		// jika file tidak didukung
		if ( ! $this->upload->do_upload('proyek_file'))
		{
			$this->session->set_flashdata('Error', 'File tidak didukung !');
			redirect('pengusul/ajukan-proyek');
		}
		// jika file didukung
		else
		{
			//  array di variabel data usulan
			$data_usulan = [
				'proyek_nama'	 	=> htmlspecialchars($this->input->post('proyek_nama',TRUE)),
				'proyek_deskripsi' 	=> $this->input->post('proyek_deskripsi',TRUE),
				'proyek_kompetensi' => htmlspecialchars($this->input->post('proyek_kompetensi',TRUE)),
				'proyek_pemilik' 	=>$data['user_login_data']['nama'],
				'status_pesan' 	=> 0,
				'pengguna_id_pengusul' => $data['user_login_data']['id_pengguna'],
				'pengguna_id_reviewer' => 0,
				'pengguna_id_manajer_proyek' => 0,
				'pengguna_id_cpo' => 0,
				'proyek_status' => 'Menunggu menetapkan Mahasiswa dan Reviewer',
				'matakuliah_id' => htmlspecialchars($this->input->post('matakuliah_id')),
				'proyek_pengajuan' => htmlspecialchars($this->input->post('proyek_pengajuan')),
				'proyek_penyelesaian' => htmlspecialchars($this->input->post('proyek_penyelesaian')),
				'proyek_komentar' => 'Belum ada komentar',
				'proyek_file' => $this->upload->data("file_name")
			];
			// insert data usulan ke database
			$this->db->insert('tbl_proyek',$data_usulan);
			$this->session->set_flashdata('success', 'Usulan Proyek berhasil dibuat');
			// akan ke direxct ke halaman ajukan proyek
			redirect('pengusul/ajukan-proyek');
		}

		}
	}
	public function revisi()
	{
		// validasi pada form
		usulan_proyek_validation();
		if ($this->form_validation->run()==FALSE) {
		$config['upload_path']          = './asset/file/pdf_proyek/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 3000;
		$config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('proyek_file'))
		{
			$this->session->set_flashdata('Error', 'File tidak didukung !');
			redirect('pengusul');
		}else{
		$data = [
			'proyek_nama'	 	=> htmlspecialchars($this->input->post('proyek_nama',TRUE)),
			'proyek_deskripsi' 	=> $this->input->post('proyek_deskripsi'),
			'proyek_file' => $this->upload->data("file_name"),
			'proyek_kompetensi' => htmlspecialchars($this->input->post('proyek_kompetensi',TRUE)),
			'matakuliah_id' => htmlspecialchars($this->input->post('matakuliah_id')),
			'proyek_status' => 'Menunggu Tinjauan Proyek',
			'proyek_penyelesaian' => htmlspecialchars($this->input->post('proyek_penyelesaian'))
		];
		// mengambil id proyek, karena memilih row id proyek
		$id_mtk = $this->input->post('id_proyek'); 
		$this->M_Pengusul->update($id_mtk,$data);
		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('pengusul');
		}
	}
	}

	public function deleteusulan($id)
	{
		// id proyek diambil dari url
		$this->M_Pengusul->delete($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('pengusul');
	}

	public function reset_mr()
	{

		
		$id_mahasiswa = $this->input->post('id_mahasiswa');;
		$mahasiswa = count($id_mahasiswa);
		$m = $this->input->post('proyek_id');

		for($i=0; $i<$mahasiswa; $i++){

				$this->db->set('proyek_id', 0);
				$this->db->where('id_mahasiswa', $id_mahasiswa[$i]);
			
				$this->db->update('tbl_mahasiswa');
	}
	$data = [
		'pengguna_id_reviewer' 		=> 0,
		'proyek_status' => 'Menunggu menetapkan Mahasiswa dan Reviewer'

	]; 
	$this->M_Pengusul->update($m,$data);
	$this->session->set_flashdata('success','Berhasil Reset');
	redirect('pengusul');
}


}

/* End of file pengusul.php */
/* Location: ./application/modules/pengusul/controllers/pengusul.php */