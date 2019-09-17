<?php 

class M_det_lowongan extends CI_Model
{
	
	public function get_data_lowongan($idLwg)
	{

		$query = "SELECT * FROM lowongan WHERE lowongan_id='$idLwg'";
		return $this->db->query($query)->row_array();
	}

	public function get_det_data_lowongan()
	{

		$query = "SELECT l.lowongan_id, l.nama_lowongan, l.posisi, COUNT(dl.id) AS jml FROM lowongan l
					LEFT JOIN detail_lowongan dl ON l.lowongan_id = dl.id_lowongan
					GROUP BY l.lowongan_id";
				return $this->db->query($query)->result_array();
	}

	public function get_det_data_pelamar($idLwg)
	{

		$query = "SELECT u.name, u.email, u.jenjang, u.gender, u.umur, u.tinggi_bdn, l.lowongan_id, l.nama_lowongan, dl.id_user
					FROM user1 u, detail_lowongan dl, lowongan l
					WHERE u.id = dl.id_user 
					AND l.lowongan_id = dl.id_lowongan 
					AND dl.id_lowongan = '$idLwg'";
					return $this->db->query($query)->result_array();
	}

	public function get_iduser2($idUser)
	{
		$this->db->select("user2_id")
                 ->where("id= '$idUser' ")
                 ->from("user1");
		
		return $this->db->get();
	}

	public function get_det_data_login_ujian($idUser)
	{

		$query = "SELECT * 
					FROM user2 
					WHERE user_id = '$idUser' ";
	
		return $this->db->query($query)->row_array();
	}

	
}


