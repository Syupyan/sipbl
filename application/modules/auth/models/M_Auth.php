<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Auth extends CI_Model {


	public function login()
	{
		$email 		= $this->input->post("email");
		$password 	= $this->input->post("password");
		$user = $this->db->get_where("tbl_pengguna",["email" => $email])->row_array();
		
		if ($user) {
			if (password_verify($password, $user['password'])) {
				if ($user['pengguna_status']==1) {
					$data_session = [
						"id_pengguna" => $user["id_pengguna"]
					];
					$user_data = $this->db->select('*')
					->from('tbl_pengguna')
					->get()->result_array();
					foreach($user_data as $userku){
						$this->session->set_userdata($data_session);
						if ($user['id_pengguna'] == $userku['id_pengguna']) {
							redirect('user');
						}
					}
				}else{
					$this->session->set_flashdata('warning','Akun anda belum di aktif');
					redirect('login');	
				}			
			}else{
				$this->session->set_flashdata('error','Password salah atau Email tidak ditemukan');
				redirect('login');	
			}
		}else{
			$this->session->set_flashdata('error','Password salah atau Email tidak ditemukan');
			redirect('login');	
		}
	}

}

/* End of file M_Auth.php */
/* Location: ./application/modules/auth/models/M_Auth.php */