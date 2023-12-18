<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		//load helper
		$this->load->helper('admin');
		$this->load->helper('access');
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function index()
	{
		$data['title']					= 'Dashboard';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan']		= $this->M_Admin->get_all_unread_pesan("count");
		$data['total_user']				= $this->M_Admin->count_table_data("tbl_pengguna", "");
		$data['total_matkul']				= $this->M_Admin->count_table_data("tbl_matakuliah");
		$data['total_mahasiswa']				= $this->M_Admin->count_table_data("tbl_mahasiswa");
		$data['total_ruangan']				= $this->M_Admin->count_table_data("tbl_ruangan");
		$data['total_proyek']				= $this->M_Admin->count_table_data("tbl_proyek");
		$data['total_prodi']				= $this->M_Admin->count_table_data("tbl_prodi");
		$data['total_menu']				= $this->M_Admin->count_table_data("tbl_menu");
		$data['total_monitoring']				= $this->M_Admin->count_table_data("tbl_monitoring");
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_admin/index',$data);
		$this->load->view('layouts/footer');
	}

}
