<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_Usulan extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		$this->load->model('M_Master_Usulan');
		$this->load->model('M_Master_Mahasiswa');
		$this->load->model('M_Master_Pengguna');
		//load helper
		$this->load->helper('admin');
		$this->load->helper('access');
		//mengecek apakah dia melakukan login , dan apa levelnya nya , lalu ditempatkan sesuai hak aksesnya
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	// Ini untuk

	public function index()
	{
		$data['title']					= 'Data Usulan Proyek';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan']		= $this->M_Admin->get_all_unread_pesan("count");
		$data['usulan1']				= $this->db->select('*')
													->from('tbl_proyek')
													->join('tbl_matakuliah', 'tbl_proyek.matakuliah_id=tbl_matakuliah.id_matakuliah')
													->order_by('tbl_proyek.id_proyek','DESC')
													->where('tbl_proyek.pengguna_id_reviewer',0)
													->where('tbl_matakuliah.prodi_id',$data['user_login_data']['prodi_id'])
													->get()->result_array();
		$data['mahasiswa']				= $this->db->select('*')
        											->from('tbl_mahasiswa')
        											->where('proyek_id',0)
        											->where('prodi_id',$data['user_login_data']['prodi_id'])
        											->get()->result_array();
		$data['dosenku']				= $this->db->select('*')
        											->from('tbl_pengguna')
        											->join('tbl_akses_menu', 'tbl_akses_menu.id_pengguna=tbl_pengguna.id_pengguna')
        											->where('tbl_akses_menu.menu_id',5)
        											->where('prodi_id',$data['user_login_data']['prodi_id'])
        											->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_master/master_usulan',$data);
		$this->load->view('layouts/footer');
	}
	
	public function read_all_message()
	{
		$this->db->where('status_pesan',0)
				->set('status_pesan',1)
				->update('tbl_proyek');
		redirect('admin/master-usulan');
	}


	//tampilkan di modal edit
	public function show_usulan($id)
	{
	 	$data = $this->M_Master_Usulan->get_usulan($id)->row_array();
	 	echo json_encode($data);
	} 

	// fungsi tambah data mahasiswa dan reviewer
	//  dengan updata data proyek
	public function tambah_mr()
	{


		$id_mahasiswa = $this->input->post('id_mahasiswa');;
		$mahasiswa = count($id_mahasiswa);
		$m = $this->input->post('proyek_id');

		for($i=0; $i<$mahasiswa; $i++){

				$this->db->set('proyek_id', $m);
				$this->db->where('id_mahasiswa', $id_mahasiswa[$i]);
			
				$this->db->update('tbl_mahasiswa');
	}
	$data = [
		'pengguna_id_reviewer' 		=> htmlentities($this->input->post('id_pengguna',TRUE)),
		'proyek_status' 		=> 'Menunggu Tinjauan Proyek',
		'proyek_komentar' => 'Belum ada komentar'

	]; 
	$this->M_Master_Usulan->update($m,$data);
	$this->session->set_flashdata('success','Berhasil menetapkan Mahasiswa dan Reviewer');
	redirect('admin/master-usulan');
}

	

// hapus usulan
	public function delete_usulan($id)
	{
		$this->M_Master_Usulan->delete($id);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/master-usulan');
	}

}

/* End of file Master_usulan.php */
/* Location: ./application/modules/admin/controllers/Master_usulan.php */