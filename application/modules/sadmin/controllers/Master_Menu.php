<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_Menu extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		$this->load->model('M_Master_Menu');
		//load helper
		$this->load->helper('admin');
		$this->load->helper('access');
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function index()
	{
		$data['title']					= 'Menu Sidebar';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan']		= $this->M_Admin->get_all_unread_pesan("count");
		$data['total_user']				= $this->M_Admin->count_table_data("tbl_pengguna");
		$data['menu']					= $this->M_Master_Menu->get_menu()->result_array();
		$data['get_menu']				= $this->db->select('*')
													->from('tbl_menu')
													->where('id_menu !=',1)
													->where('id_menu !=',9)
													->where('id_menu !=',10)
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_master/master_menu',$data);
		$this->load->view('layouts/footer');
	}

	public function add_menu()
	{
		$data = [
			'pengguna_menu_title' 		=> htmlentities($this->input->post('pengguna_menu_title',TRUE)),
			'pengguna_menu_icon' 		=> htmlentities($this->input->post('pengguna_menu_icon',TRUE)),
			'pengguna_menu_url' 		=> htmlentities($this->input->post('pengguna_menu_url',TRUE)),
			'pengguna_menu_status' 	=> $this->input->post('pengguna_menu_status'),
			'menu_id' 				=> $this->input->post('menu_id')
		];	
		$this->M_Master_Menu->create($data);
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('sadmin/master-menu');
	}

	public function show_menu($id)
	{
		$data = $this->M_Master_Menu->get_menu($id)->row_array();
		echo json_encode($data);
	}

	public function update_menu()
	{
		$data = [
			'pengguna_menu_title' 		=> htmlentities($this->input->post('pengguna_menu_title',TRUE)),
			'pengguna_menu_icon' 		=> htmlentities($this->input->post('pengguna_menu_icon',TRUE)),
			'pengguna_menu_url' 		=> htmlentities($this->input->post('pengguna_menu_url',TRUE)),
			'pengguna_menu_status'	=> $this->input->post('pengguna_menu_status'),
			'menu_id'				=> $this->input->post('menu_id')
		]; 
		$this->M_Master_Menu->update($this->input->post('id_pengguna_menu'),$data);
		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('sadmin/master-menu'); 
	}

	public function delete_menu($id)
	{
		$this->M_Master_Menu->delete($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('sadmin/master-menu');
	}

	public function switch_access_menu()
	{
		$id_pengguna_menu=$this->input->get('id_pengguna_menu');
		$is_active=$this->input->get('is_active');
		if ($is_active==1) {
			$this->M_Master_Menu->update($id_pengguna_menu,['pengguna_menu_status' => 0]);
			$this->session->set_flashdata('success','Akses berhasil dinonaktifkan');	
		}else{
			$this->M_Master_Menu->update($id_pengguna_menu,['pengguna_menu_status' => 1]);
			$this->session->set_flashdata('success','Akses berhasil diaktifkan');
		}
	}


}

/* End of file Master_Menu.php */
/* Location: ./application/modules/admin/controllers/Master_Menu.php */