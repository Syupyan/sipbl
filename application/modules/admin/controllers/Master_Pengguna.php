<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_Pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		// $this->load->model('Pesan_M');
		$this->load->model('M_Master_Pengguna');
		//load helper
		$this->load->helper('admin');
		$this->load->helper('access');
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function index()
	{
		$data['title']				= 'Pengguna';
		$data['user_login_data'] 	= $this->user_login_data;
		$data['count_unread_pesan']	= $this->M_Admin->get_all_unread_pesan("count");
		$data['get_prodi']				=  $this->db->select('*')
													->from('tbl_prodi')
													->where('id_prodi',$data['user_login_data']['prodi_id'])
													->get()->result_array();
		$data['pengguna']				=  $this->db->select('*')
													->from('tbl_pengguna')
													->where('prodi_id',$data['user_login_data']['prodi_id'])
													->get()->result_array();
		$data['proyekku']				=  $this->db->select('*')
													->from('tbl_proyek')
													->get()->result();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_master/master_pengguna',$data);	
		$this->load->view('layouts/footer');
	}

	public function add_user()
	{
		$data = [
			'nama' 	=> htmlentities($this->input->post('nama',TRUE)),
			'email' 	=> htmlentities($this->input->post('email',TRUE)),
			'password' 	=> password_hash($this->input->post('password',TRUE), PASSWORD_DEFAULT),
			'jk' 	=> 'Belum Diisi',
			'nik_nip' 	=> 0,
			'alamat' 	=> 'Belum Diisi',
			'foto_profil' => 'user.png',
			'jabatan' => 'Dosen',
			'id_pengguna' 	=> $this->input->post('id_pengguna'),
			'pengguna_status' => $this->input->post('pengguna_status'),
			'prodi_id' => $this->input->post('prodi_id')

		];	
		$this->M_Master_Pengguna->create($data);
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('admin/master-pengguna');
	}

	//tampilkan di modal edit
	public function show_user($id)
	{
	 	$data = $this->M_Master_Pengguna->get_user($id)->row_array();
	 	echo json_encode($data);
	} 

	public function update_user()
	{
		$id_pengguna=$this->input->post('id_pengguna');
		if (!empty($this->input->post('newpassword'))) {
			$password = password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT);
		}else{
			$password = $this->input->post('oldpassword');
		}
		$data = [
			'nama' 	=> htmlentities($this->input->post('nama')),
			'email' 	=> htmlentities($this->input->post('email')),
			'jk' 	=> 0,
			'nik_nip' 	=> 0,
			'alamat' 	=> 'Belum Diisi',
			'password' 	=> $password,
			'jabatan' => 'Dosen',
			'pengguna_status'	=> $this->input->post('pengguna_status'),
			'prodi_id' => $this->input->post('prodi_id')
		]; 
		$this->M_Master_Pengguna->update($id_pengguna,$data);
		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('admin/master-pengguna'); 
	}

	public function switch_access_user()
	{
		$id_pengguna=$this->input->get('id_pengguna');
		$pengguna_status=$this->input->get('pengguna_status');
		if ($pengguna_status==1) {
			$this->M_Master_Pengguna->update($id_pengguna,['pengguna_status' => 0]);
			$this->session->set_flashdata('success','Akses berhasil dinonaktifkan');	
		}else{
			$this->M_Master_Pengguna->update($id_pengguna,['pengguna_status' => 1]);
			$this->session->set_flashdata('success','Akses berhasil diaktifkan');
		}
	}

	public function delete_user($id)
	{
		$this->M_Master_Pengguna->delete($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/master-pengguna');
	}

}

/* End of file master_pengguna.php */
/* Location: ./application/modules/admin/controllers/master_pengguna.php */