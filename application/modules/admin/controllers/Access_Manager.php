<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Access_Manager extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		$this->load->model('M_Access_Manager');
		//load helper
		$this->load->helper('admin');
		$this->load->helper('access');
		//mengecek apakah dia melakukan login , dan apa levelnya nya , lalu ditempatkan sesuai hak aksesnya
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function role_access($id_pengguna)
	{
		$data['title']					= 'Role Access';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan']		= $this->M_Admin->get_all_unread_pesan("count");
		$data['all_menu']			    = $this->db->select('*')
													->from('tbl_menu')
													->where('id_menu !=', 1)
													->where('id_menu !=', 9)
													->where('id_menu !=', 10)
													->get()->result_array();
		$data['role']					= $this->db->get_where("tbl_pengguna",["id_pengguna" => $id_pengguna])->row_array();
										
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_admin/detail_access_manager',$data);
		$this->load->view('layouts/footer');
	}

	public function change_access()
	{
		$id_pengguna=$this->input->get('id_pengguna');
		$menu_id=$this->input->get('menu_id');
		$check_access = $this->db->get_where("tbl_akses_menu",["id_pengguna" => $id_pengguna,"menu_id" => $menu_id]);
		if ($check_access->num_rows()>0) {
			$this->db->where("id_pengguna",$id_pengguna);
			$this->db->where("menu_id",$menu_id);
			$this->db->delete("tbl_akses_menu");
			$this->session->set_flashdata("warning","akses dinonaktifkan");
		}else{
			$data_access_menu = [
				"id_pengguna" => $id_pengguna,
				"menu_id" => $menu_id
			];
			$this->db->insert("tbl_akses_menu",$data_access_menu);
			$this->session->set_flashdata("success","akses diaktifkan");
		}
	}

}

/* End of file Access_Manager.php */
/* Location: ./application/modules/admin/controllers/Access_Manager.php */