<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// is_logg_in();

		$this->load->model('soal_model');
		$this->load->model('M_det_lowongan');

		$this->load->model('cbt_konfigurasi_model');
		$this->load->library('access_tes');
		$this->load->library('user_agent');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		// $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user'] = $this->db->get_where('user1', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');		
	}

	public function vacancy()
	{
		$data['title'] = 'Vacancy';
		$data['user'] = $this->db->get_where('user1', ['email' => $this->session->userdata('email')])->row_array();

		$data['lwngan'] = $this->db->get('lowongan')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/lowongan', $data);
		$this->load->view('templates/footer');		
	}

	public function view_loker($idLowongan)
	{
		$data['title'] = 'View Vacancy';
		$data['user'] = $this->db->get_where('user1', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('M_det_lowongan', 'info');
		$data['lwngan'] = $this->info->get_data_lowongan($idLowongan);


		

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/view-loker', $data);
		$this->load->view('templates/footer');		
	}			


	public function form_lamar($idLowongan=null)
	{
		$data['title'] = 'Edit biodata';
		$data['user'] = $this->db->get_where('user1', ['email' => $this->session->userdata('email')])->row_array();


		$this->load->model('M_det_lowongan', 'info');
		$data['lwngan'] = $this->info->get_data_lowongan($idLowongan);


		$data_id['det_lwngan'] = $this->db->get('detail_lowongan')->row_array();

		$data_login = $this->db->get('user2')->row_array();



		$this->form_validation->set_rules('gender', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('phone', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('birth', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('dateBirth', 'Date birth', 'required|trim');
		$this->form_validation->set_rules('age', 'Age', 'required|trim|numeric');
		$this->form_validation->set_rules('height', 'Height', 'required|trim|numeric');
		$this->form_validation->set_rules('weight', 'Weight', 'required|trim|numeric');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
		$this->form_validation->set_rules('university', 'University', 'required|trim');
		$this->form_validation->set_rules('pendidikan', 'Education Level', 'required|trim');
		$this->form_validation->set_rules('StudyProgram', 'Study Program', 'required|trim');
		$this->form_validation->set_rules('graduation', 'Graduation Year', 'required|trim');
		$this->form_validation->set_rules('diploma', 'Diploma Value', 'required|trim');
		$this->form_validation->set_rules('company', 'Company Name', 'required|trim');
		$this->form_validation->set_rules('position', 'Position', 'required|trim');
		$this->form_validation->set_rules('lengthWork', 'Length Work', 'required|trim|numeric');

		$this->form_validation->set_rules('Examusername', 'Username', 'required|trim|is_unique[user2.user_name]', [
			'is_unique' => 'This Username has already !'
		]);
		$this->form_validation->set_rules('Exampassword', 'Password', 'required|trim|is_unique[user2.user_password]', [
			'is_unique' => 'This Password has already !'
		]);


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/form-lamar', $data);
			$this->load->view('templates/footer');
		}else {
			
			
			$data_login = [
				'user_lowongan_id' => $this->input->post('id_lwngn'),
				'user_name' => $this->input->post('Examusername'),
				'user_password' => $this->input->post('Exampassword'),
				'user_firstname' => $this->input->post('name')
			];

			$this->db->insert('user2', $data_login);

			$namaLogin = $this->input->post('Examusername');
			$result = " SELECT user_id FROM user2 WHERE user_name = '$namaLogin' ";
			$iduser2 = $result;

			$email = $this->input->post('email');
			$gender = $this->input->post('gender');
			$phone_number = $this->input->post('phone');
			$tmpt_lahir = $this->input->post('birth');
			$tgl_lahir = $this->input->post('dateBirth');
			$umur = $this->input->post('age');
			$tinggi_bdn = $this->input->post('height');
			$berat_bdn = $this->input->post('weight');
			$status_nkh = $this->input->post('status');
			$alamat = $this->input->post('address');
			$universitas = $this->input->post('university');
			$jenjang = $this->input->post('pendidikan');
			$jurusan = $this->input->post('StudyProgram');
			$tahun_lulus = $this->input->post('graduation');
			$nilai_ijazah = $this->input->post('diploma');
			$nama_perusahaan = $this->input->post('company');
			$posisi = $this->input->post('position');
			$lama_kerja = $this->input->post('lengthWork');



			// cek jika ada gambar diupload
			$upload_file = $_FILES['fileInput'];


			if ($upload_file) {
				$config1['allowed_types'] = 'pdf';
				$config1['max_size']     = '2048';
				$config1['upload_path'] = './assets/images/profile/berkas/';

				$this->load->library('upload', $config1);

				if ($this->upload->do_upload('fileInput')) {
					$new_file = $this->upload->data('file_name');
					$this->db->set('berkas_lamaran', $new_file);
				}else {
					echo $this->upload->display_errors();
				}

			}
		

			$this->db->set('gender', $gender);
			$this->db->set('phone_number', $phone_number);
			$this->db->set('tmpt_lahir', $tmpt_lahir);
			$this->db->set('tgl_lahir', $tgl_lahir);
			$this->db->set('umur', $umur);
			$this->db->set('tinggi_bdn', $tinggi_bdn);
			$this->db->set('berat_bdn', $berat_bdn);
			$this->db->set('status_nkh', $status_nkh);
			$this->db->set('alamat', $alamat);
			$this->db->set('universitas', $universitas);
			$this->db->set('jenjang', $jenjang);
			$this->db->set('jurusan', $jurusan);
			$this->db->set('tahun_lulus', $tahun_lulus);
			$this->db->set('nilai_ijazah', $nilai_ijazah);
			$this->db->set('nama_perusahaan', $nama_perusahaan);
			$this->db->set('posisi', $posisi);
			$this->db->set('lama_kerja', $lama_kerja);
			$this->db->set('user2_id', $iduser2);
			$this->db->where('email', $email);
			$this->db->update('user1');


			$data_id = [
				'id_lowongan' => $this->input->post('id_lwngn'),
				'id_user' => $this->input->post('id_user')
			];

			$this->db->insert('detail_lowongan', $data_id);
			

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
	 		Your profile has been updated !</div>');
	 		redirect('setting/tampil_profile');
		}
	}

	public function ujian()
	{
		$data['title'] = 'Exam Questions';
		$data['user'] = $this->db->get_where('user1', ['email' => $this->session->userdata('email')])->row_array();

	
					
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar', $data);
					$this->load->view('templates/topbar', $data);
					$this->load->view('user/v_dashboard_exam', $data);
					$this->load->view('templates/footer', $data);	
					
    }
        	

	


	public function take_exam($id = 0){		

		
    	$soal = $this->soal_model->Ambil("where t_soal.status = 'Show' order by RAND()");
    	$data1['user'] = $this->db->get_where('user1', ['email' => $this->session->userdata('email')])->row_array();
    	        
        $data = array(
			"soal" => $soal->result_array(),
			"total_soal" =>$soal->num_rows(),
			"id_jawaban" => $id,
		);


        $this->load->view('templates/auth_header', $data);
			$this->load->view('user/v_take_exam', $data1);
			$this->load->view('templates/auth_footer', $data);     
    }

	public function gagal()
	{
		$data['title'] = 'Exam Questions';
		$data['user'] = $this->db->get_where('user1', ['email' => $this->session->userdata('email')])->row_array();

		// $this->load->model('soal_model', 'pkt');
		// $data['dataSoal'] = $this->pkt->data_soal();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/gagal', $data);
		$this->load->view('templates/footer');		
		
	}	


}