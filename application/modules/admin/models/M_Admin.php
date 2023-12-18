<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Admin extends CI_Model {

	//get data user jika user login
	public function get_user_login_data()
	{
		return $this->db->get_where("tbl_pengguna",["id_pengguna" => $this->session->userdata("id_pengguna")])->row_array();
	}

	public function count_table_data($table)
	{
		return $this->db->count_all($table);
	}

	public function get_all_unread_pesan($option=NULL)
	{

		if ($option=="count") {
			return $this->db->get_where("tbl_proyek",["status_pesan" => 0])->num_rows();
		}else{
			return $this->db->order_by("proyek_nama",'DESC')
						->where("status_pesan",0)
						->get("tbl_proyek",5)->result_array();
		}
	}

	public function get_pesan($id=NULL)
	{
		if ($id) {
			$this->db->get_where("tbl_proyek",["id_proyek" => $id]);
		}else{
			return $this->db->get("tbl_proyek",["id_proyek" => $id]);
		}
	}

	public function create($table,$data=[])
	{
		return $this->db->insert($table,$data);
	}	
	public function update($id,$data=[])
	{
		$this->db->where("id_menu",$id);
		return $this->db->update("tbl_menu",$data);
	}

	public function get_menu($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_menu",["id_menu" => $id]);
		}else{
			$this->db->select('*');
			$this->db->from('tbl_menu');
			$this->db->where('id_menu !=', 9);
			$this->db->where('id_menu !=', 1);
			$query = $this->db->get();
			return $query;
		}
	}
	
}

/* End of file M_Admin.php */
/* Location: ./application/modules/admin/models/M_Admin.php */