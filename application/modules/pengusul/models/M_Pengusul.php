<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Pengusul extends CI_Model {

	//get data user jika user login
	public function get_user_login_data()
	{
		return $this->db->get_where("tbl_pengguna",["id_pengguna" => $this->session->userdata("id_pengguna")])->row_array();
	}

	public function get_usulan($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_proyek",["id_proyek" => $id]);
		}else{
			$this->db->select('*');
			$this->db->from('tbl_proyek');
			$this->db->where('pengguna_id_pengusul',0);
			$query = $this->db->get();
			return $query;
		}
	}

		public function upload($path,$allowed_types)
	{
		$config['upload_path']   = './asset/'.$path;
		$config['allowed_types'] = $allowed_types;
		$config['detect_mime']   = TRUE;
		$config['mod_mime_fix']  = TRUE;
		$this->load->library('upload',$config);
		if ($this->upload->do_upload('file')) {
			return $this->upload->data('file_name');
		}else{
			echo $this->upload->display_errors();
		}
	}

	
		public function count_table_data($table)
		{
			return $this->db->count_all($table);
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
			$this->db->where("id_proyek",$id);
			return $this->db->update("tbl_proyek",$data);
		}
	
		public function get_menu($id=NULL)
		{
			if ($id) {
				return $this->db->get_where("tbl_menu",["id_menu" => $id]);
			}else{
				$this->db->select('*');
				$this->db->from('tbl_menu');
				$query = $this->db->get();
				return $query;
			}
		}
		//  delete data
	public function delete($id)
	{
		// dimana id proyek dipilih
		$this->db->where("id_proyek",$id);
		// disitu file yang dihapus
		return $this->db->delete("tbl_proyek");
	}
	

}

/* End of file M_pengusul.php */
/* Location: ./application/modules/pengusul/models/M_pengusul.php */