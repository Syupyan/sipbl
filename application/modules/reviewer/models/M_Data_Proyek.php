<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Data_Proyek extends CI_Model {

	public function create($data=[])
	{
		$this->db->insert("tbl_akses_menu",$data);
	}
	
	public function get_usulan($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_proyek",["id_proyek" => $id]);
		}

	}
	public function tampil()
    {
        $this->db->select('*');
        $this->db->from('tbl_proyek');
        $query = $this->db->get();
        return $query;
    }

	public function detail($id)
	{
	  $this->db->select('*');
	  $this->db->from("post");
	  $this->db->where("kode_post", $id);
	  $query = $this->db->get();
	  return $query;
	}


	public function update($id,$data=[])
	{
		$this->db->where("id_proyek",$id);
		return $this->db->update("tbl_proyek",$data);
	}

	public function delete($id)
	{
		$this->db->delete("tbl_proyek",["id_proyek" => $id]);
	}

	public function clear()
	{
		return $this->db->empty_table('tbl_proyek');
	}

}

/* End of file M_Master_usulan.php */
/* Location: ./application/modules/admin/models/M_Master_usulan.php */