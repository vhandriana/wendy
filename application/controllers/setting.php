<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// is_logg_in();

		$this->load->model('M_det_lowongan');
	}

	public function index()
	{
		// $data['title'] = 'My Profile';
		// $data['user'] = $this->db->get_where('user1', ['email' => $this->session->userdata('email')])->row_array();

		// $this->load->model('M_det_lowongan', 'info');
		// $idUser2= $this->info->get_iduser2($iduser1)->row()->user2_id;

		// $data['user2'] = $this->info->get_det_data_login_ujian($idUser2);

		// $this->load->view('templates/header', $data);
		// $this->load->view('templates/sidebar', $data);
		// $this->load->view('templates/topbar', $data);
		// $this->load->view('setting/My_profile', $data);
		// $this->load->view('templates/footer');		
	}	

	public function tampil_profile($uid)
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('user1', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('M_det_lowongan', 'info');
		$idUser2= $this->info->get_iduser2($uid)->row()->user2_id;

		$data['user2'] = $this->info->get_det_data_login_ujian($idUser2);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('setting/My_profile', $data);
		$this->load->view('templates/footer');		
	}

	public function edit_profil()
	{
		$data['title'] = 'Change Photo Profile';
		$data['user'] = $this->db->get_where('user1', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('setting/edit_profile', $data);
			$this->load->view('templates/footer');
		}else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			// cek jika ada gambar diupload
			$upload_image = $_FILES['image']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/images/profile/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {

					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/images/profile/' . $old_image); 
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
					$this->db->where('email', $email);
					$this->db->update('user');
				}else {
					echo $this->upload->display_errors();
				}

			}

			// $this->db->set('name', $name);
			

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
	 		Your profile has been updated !</div>');
	 		redirect('setting/edit_profil');
		}
	}
	

	public function change_password()
	{
		$data['title'] = 'Change Password';
		$data['user'] = $this->db->get_where('user1', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');

		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[5]|matches[new_password2]');

		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[5]|matches[new_password1]');



		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('setting/change_password', $data);
			$this->load->view('templates/footer');	
		}else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Wrong current password !</div>');
				redirect('user/change_password');
			}else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					New password cannot be the same as current password !</div>');
					redirect('user/change_password');
				}else {
					// password sudah ok
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Password change successesfully !</div>');
					redirect('setting/change_password');
				}
			}
		}
	}
}