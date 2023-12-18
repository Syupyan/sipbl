<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Master_Matakuliah extends CI_Model {

	public function create($data=[])
	{
		return $this->db->insert("tbl_matakuliah",$data);
	}
	
	public function get_matakuliah($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_matakuliah",["id_matakuliah" => $id]);
		}
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_matakuliah",$id);
		return $this->db->update("tbl_matakuliah",$data);
	}

	public function delete($id=NULL)
	{
		return $this->db->delete("tbl_matakuliah",["id_matakuliah" => $id]);
	}

}

/* End of file M_Master_Matakuliah.php */
/* Location: ./application/modules/admin/models/M_Master_Matakuliah.php */