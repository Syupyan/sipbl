<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Data_Direktur extends CI_Model {

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
	public function tampil1($id)
    {
		return $this->db->select('*')
		->from('tbl_proyek')
		->join('tbl_matakuliah', 'tbl_matakuliah.id_matakuliah=tbl_proyek.matakuliah_id')
		->get();
    }
//  buatkan fungsi tampilkan tbl_proyek dengan where
	public function tampil($id)
	{
	  $this->db->select('*');
	  $this->db->from("tbl_proyek");
	  $this->db->join('tbl_matakuliah', 'tbl_matakuliah.id_matakuliah=tbl_proyek.matakuliah_id');
	  $this->db->where("tbl_proyek.id_proyek", $id);
	  $query = $this->db->get();
	  return $query;
	}


   // buatkan fungsi update data tbl_alat_bahan
	public function update_alat_bahan($id,$data=[])
	{
		$this->db->where("id_ab",$id);
		return $this->db->update("tbl_alat_bahan",$data);
	}
	public function update_mt($id,$data=[])
	{
		$this->db->where("id_monitoring",$id);
		return $this->db->update("tbl_monitoring",$data);
	}
	public function update($id,$data=[])
	{
		$this->db->where("id_rpp",$id);
		return $this->db->update("tbl_rpp",$data);
	}

	public function delete_alat($id)
	{
		$this->db->delete("tbl_alat_bahan",["id_ab" => $id]);
	}
    
	public function get_alat_bahan($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_alat_bahan",["id_ab" => $id]);
		}
	}
	public function delete_mt($id)
	{
		return $this->db->delete("tbl_monitoring",["id_monitoring" => $id]);
	}
}

/* End of file M_Master_usulan.php */
/* Location: ./application/modules/admin/models/M_Master_usulan.php */