<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Master_Ruangan extends CI_Model {

	public function create($data=[])
	{
		return $this->db->insert("tbl_ruangan",$data);
	}
	
	public function get_ruang($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_ruangan",["id_ruang" => $id]);
		}
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_ruang",$id);
		return $this->db->update("tbl_ruangan",$data);
	}

	public function delete($id=NULL)
	{
		return $this->db->delete("tbl_ruangan",["id_ruang" => $id]);
	}


}

/* End of file M_Master_Prodi.php */
/* Location: ./application/modules/admin/models/M_Master_Prodi.php */