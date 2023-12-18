<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Master_Pengguna extends CI_Model {

	public function create($data=[])
	{
		return $this->db->insert("tbl_pengguna",$data);
	}
	
	public function get_user($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_pengguna",["id_pengguna" => $id]);
		}
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_pengguna",$id);
		return $this->db->update("tbl_pengguna",$data);
	}

	public function delete($id)
	{
		return $this->db->delete("tbl_pengguna",["id_pengguna" => $id]);
	}

}

/* End of file M_Master_Pengguna.php */
/* Location: ./application/modules/admin/models/M_Master_Pengguna.php */