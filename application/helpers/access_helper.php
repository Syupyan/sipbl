<?php 

function check_access()
{
	$ci = get_instance();
	$id_pengguna = $ci->session->userdata('id_pengguna');
	if (!$id_pengguna) {
		redirect('login');
	}else{
		$menu = strtoupper($ci->uri->segment(1));
		$query_menu = $ci->db->get_where('tbl_menu',['menu' => $menu])->row_array();
		$menu_id = $query_menu['id_menu'];
		$query_access = $ci->db->get_where('tbl_akses_menu',['id_pengguna' => $id_pengguna,'menu_id' => $menu_id]);
		if ($query_access->num_rows()>0) {
			return TRUE;
		}else{
			redirect('not-found');
		}
	}
}
function check_access1()
{
	$ci = get_instance();
	$id_pengguna = $ci->session->userdata('id_pengguna');
	if (!$id_pengguna) {
		redirect('login');
	}
}


function role_active($id_pengguna,$menu_id)
{
	$ci=get_instance();
	$query_role = $ci->db->get_where("tbl_akses_menu",
									["id_pengguna" => $id_pengguna,"menu_id" => $menu_id]);
	if ($query_role->num_rows()>0) {
		return "checked=checked";
	}
}

