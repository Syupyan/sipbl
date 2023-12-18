<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_Prodi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		$this->load->model('M_Master_Prodi');
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
		$data['title']					= 'Prodi';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan']		= $this->M_Admin->get_all_unread_pesan("count");
		$data['prodi']					= $this->db->select('*')
													->from('tbl_prodi')
													->order_by('id_prodi','DESC')
													->where('id_prodi',$data['user_login_data']['prodi_id'])
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_master/master_prodi',$data);	
		$this->load->view('layouts/footer');	
	}

	public function add_Prodi()
	{
		$prodi_gambar = $this->M_Tools_Admin->upload_img('prodi');
		$this->M_Tools_Admin->resize_image('prodi/'.$prodi_gambar,'165','165');
		$data = [
			'prodi_nama' 			=> htmlentities($this->input->post('prodi_nama',TRUE)),
			'prodi_alias' 	=> htmlentities($this->input->post('prodi_alias',TRUE)),
			'prodi_deskripsi' 	=> htmlentities($this->input->post('prodi_deskripsi',TRUE)),
			'prodi_gambar' 			=> $prodi_gambar,
			'jurusan' 	=> $this->input->post('jurusan')
		];
		$this->M_Master_Prodi->create($data);
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('admin/master-prodi');
	}

	public function show_Prodi($id)
	{
	 	$data = $this->M_Master_Prodi->get_Prodi($id)->row_array();
	 	echo json_encode($data);
	}

	public function update_Prodi()
	{
		if (!empty($_FILES['file']['name'])) {
			$prodi_gambar = $this->M_Tools_Admin->upload_img('Prodi');
			$this->M_Tools_Admin->resize_image('Prodi/'.$prodi_gambar,'165','165');
			unlink(FCPATH.'./asset/img/prodi/'.$this->input->post('oldimage'));
		}else{
			$prodi_gambar = $this->input->post('oldimage');
		}
		$data = [
			'prodi_nama' 		=> $this->input->post('prodi_nama'),
			'prodi_alias' 	=> $this->input->post('prodi_alias'),
			'prodi_deskripsi' 	=> $this->input->post('prodi_deskripsi'),
			'prodi_gambar'			=> $prodi_gambar,
			'jurusan'	=> $this->input->post('jurusan')
		];
		$id_Prodi = $this->input->post('id_Prodi'); 
		$this->M_Master_Prodi->update($id_Prodi,$data);
		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('admin/master-prodi'); 
	}

	public function delete_Prodi($id)
	{
		//
		$this->M_Master_Prodi->delete($id);
		$error = $this->db->error();
		if($error['code'] != 0)
		{
			$this->session->set_flashdata('error','Data gagal dihapus');
			redirect('admin/master-prodi');
		} else {
			$Prodi = $this->M_Master_Prodi->get_Prodi($id)->row_array();
			unlink(FCPATH.'./asset/img/Prodi/'.$Prodi['prodi_gambar']);
			$this->session->set_flashdata('success','Data berhasil dihapus');
			redirect('admin/master-prodi');
		}
	}

}

/* End of file Master_Prodi.php */
/* Location: ./application/modules/admin/controllers/Master_Prodi.php */