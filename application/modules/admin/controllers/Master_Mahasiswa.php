<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_Mahasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->library('form_validation');
		$this->load->model('M_Admin');
		$this->load->model('M_Master_Mahasiswa');
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
		$data['title']					= 'Data Mahasiswa';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan']		= $this->M_Admin->get_all_unread_pesan("count");
		$data['mahasiswa']				= $this->db->select('*')
										->from('tbl_mahasiswa')
										->join('tbl_prodi', 'tbl_mahasiswa.prodi_id=tbl_prodi.id_prodi')
										->where('tbl_mahasiswa.prodi_id',$data['user_login_data']['prodi_id'])
										->order_by('tbl_mahasiswa.id_mahasiswa','DESC')
										->get()->result_array();
		$data['get_prodi']				=  $this->db->select('*')
										->from('tbl_prodi')
										->where('id_prodi',$data['user_login_data']['prodi_id'])
										->get()->result_array();	
									
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_master/master_mahasiswa',$data);	
		$this->load->view('layouts/footer');	
	}

	public function add_mahasiswa()
	{
		master_mahasiswa();
		$data = [
			'mahasiswa_nama' 			=> htmlentities($this->input->post('mahasiswa_nama',TRUE)),
			'mahasiswa_nim' 	=> htmlentities($this->input->post('mahasiswa_nim',TRUE)),
			'mahasiswa_tanggallahir' 	=> htmlentities($this->input->post('mahasiswa_tanggallahir',TRUE)),
			'mahasiswa_alamat' 	=> htmlentities($this->input->post('mahasiswa_alamat')),
			'prodi_id' 	=> htmlentities($this->input->post('prodi_id')),
			'mahasiswa_jk' 	=> htmlentities($this->input->post('mahasiswa_jk')),
			'proyek_id' 	=> 0,

			

			
		];
		$this->M_Master_Mahasiswa->create($data);
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('admin/master-Mahasiswa');
	}

	public function show_mahasiswa($id)
	{
	 	$data = $this->M_Master_Mahasiswa->get_mahasiswa($id)->row_array();
	 	echo json_encode($data);
	}

	public function update_mahasiswa()
	{

		$data = [
			'mahasiswa_nama' 			=> htmlentities($this->input->post('mahasiswa_nama',TRUE)),
			'mahasiswa_nim' 	=> htmlentities($this->input->post('mahasiswa_nim',TRUE)),
			'mahasiswa_tanggallahir' 	=> htmlentities($this->input->post('mahasiswa_tanggallahir')),
			'mahasiswa_jk' 	=> htmlentities($this->input->post('mahasiswa_jk')),
			'mahasiswa_alamat' 	=> htmlentities($this->input->post('mahasiswa_alamat')),
			'prodi_id' 	=> htmlentities($this->input->post('prodi_id'))
		];
		$id_Prodi = $this->input->post('id_mahasiswa'); 
		$this->M_Master_Mahasiswa->update($id_Prodi,$data);
		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('admin/master-mahasiswa'); 
	}

	public function delete_mahasiswa($id)
	{
		$this->M_Master_Mahasiswa->delete($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/master-mahasiswa');
	}
    

}

/* End of file Master_Prodi.php */
/* Location: ./application/modules/admin/controllers/Master_Prodi.php */