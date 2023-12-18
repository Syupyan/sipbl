<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Master_Prodi extends CI_Model {

	public function create($data=[])
	{
		return $this->db->insert("tbl_prodi",$data);
	}
	
	public function get_prodi($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_prodi",["id_Prodi" => $id]);
		}
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_Prodi",$id);
		return $this->db->update("tbl_prodi",$data);
	}

	public function delete($id=NULL)
	{
		return $this->db->delete("tbl_prodi",["id_prodi" => $id]);
	}

}

/* End of file M_Master_Prodi.php */
/* Location: ./application/modules/admin/models/M_Master_Prodi.php */