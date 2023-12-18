<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Access_Manager extends CI_Model {

	public function create($data=[])
	{
		$this->db->insert("tbl_akses_menu",$data);
	}
	
	public function get_access($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_akses_menu",["id_akses_menu" => $id]);
		}else{
			return $this->db->get("tbl_akses_menu");
		}
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_akses_menu",$id);
		return $this->db->update("tbl_akses_menu",$data);
	}

	public function delete($id)
	{
		$this->db->delete("tbl_akses_menu",["id_akses_menu" => $id]);
	}

	public function clear()
	{
		return $this->db->empty_table('tbl_akses_menu');
	}	

}

/* End of file M_Access_Manager.php */
/* Location: ./application/modules/admin/models/M_Access_Manager.php */