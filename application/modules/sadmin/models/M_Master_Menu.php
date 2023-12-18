<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Master_Menu extends CI_Model {

	public function create($data=[])
	{
		$this->db->insert("tbl_pengguna_menu",$data);
	}
	
	public function get_menu($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_pengguna_menu",["id_pengguna_menu" => $id]);
		}else{
			$this->db->select('*');
			$this->db->from('tbl_pengguna_menu');
			$this->db->join('tbl_menu', 'tbl_pengguna_menu.menu_id = tbl_menu.id_menu');
			$this->db->where('id_menu !=', 9);
			$this->db->where('id_menu !=', 1);
			$query = $this->db->get();
			return $query;
		}
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_pengguna_menu",$id);
		return $this->db->update("tbl_pengguna_menu",$data);
	}

	public function delete($id)
	{
		$this->db->delete("tbl_pengguna_menu",["id_pengguna_menu" => $id]);
	}

}

/* End of file M_Master_Menu.php */
/* Location: ./application/modules/admin/models/M_Master_Menu.php */