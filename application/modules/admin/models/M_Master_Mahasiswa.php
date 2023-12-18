<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Master_Mahasiswa extends CI_Model {

	public function create($data=[])
	{
		return $this->db->insert("tbl_mahasiswa",$data);
	}
	
	public function get_mahasiswa($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_mahasiswa",["id_mahasiswa" => $id]);
		}
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_mahasiswa",$id);
		return $this->db->update("tbl_mahasiswa",$data);
	}

	public function delete($id=NULL)
	{
		return $this->db->delete("tbl_mahasiswa",["id_mahasiswa" => $id]);
	}


}

/* End of file M_Master_Prodi.php */
/* Location: ./application/modules/admin/models/M_Master_Prodi.php */