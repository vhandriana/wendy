<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_det_lowongan');


	}

	public function index()
	{
		// $L = $this->input->post('nama_lowongan');
		// $lowongan = $this->db->get_where('lowongan', ['nama_lowongan' => $L])->row_array();

		$data['title'] = 'Sistem Penerimaan Karyawan';
		$data['user'] = $this->db->get_where('user1', ['email' => $this->session->userdata('email')])->row_array();
		$data['lwngan'] = $this->db->get('lowongan')->result_array();
	


		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/index', $data);
			$this->load->view('templates/auth_footer', $data);
		}else {
			// validasi sukses
			$this -> _login();
		}
		
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user1', ['email'=> $email])->row_array();
		
		// jika user ada
		if ($user) {
			// user aktif
			if ($user['is_active'] == 1 && $user['status'] == "Aktif") {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id'],
						'id' => $user['id']
					];
					$this->session->set_userdata($data);

					if ($user['role_id'] == 1) {
						redirect('admin');
					}else if ($user['role_id'] == 2) {
						redirect('user');	
					}else {
						redirect('hrd');
					}
					
					
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password !</div>');
					redirect('auth#login');
				}

			}else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This Email has not been activated !</div>');
				redirect('auth#login');
			}

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered !</div>');
			redirect('auth#login');
		}
	}

	public function register()
	{

		if ($this->session->userdata('email')) {
			redirect('user');
		}


		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user1.email]',[
			'is_unique' => 'This email has already registered !'
		]);

		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
			'matches' => 'Password dont match !',
			'min_length' => 'Password too short !'
		]);

		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[5]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'User Registrasi';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/register');
			$this->load->view('templates/auth_footer');	
		}else{

			$email = $this->input->post('email', true);
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($email),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), 
					PASSWORD_DEFAULT),
				// 'password' => md5($this->input->post('password1', true)),
				'role_id' => 2,
				'is_active' => 0,
				'date_create' => time() 
			];

			// siapkan token
			$token =  base64_encode(openssl_random_pseudo_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];

			$this->db->insert('user1', $data);
			$this->db->insert('user_token', $user_token);

			// kirim email
			$this -> _sendEmail($token, 'verify');
			// end kirim email

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			  Congratulation ! your account has been created. Please activated your account</div>');
			redirect('auth#login');
		}
		
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => 'daeserekrutmen@gmail.com',
			'smtp_pass' => 'abankwendy',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"

		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		

		$this->email->from('daeserekrutmen@gmail.com', 'PT. daese garmin');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Verify the account you registered');
			$this->email->message('Click this link to verification your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/reset_password?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}
		

		if ($this->email->send()) {
			return true;
		}else {
			echo $this->email->print_debugger();
			die;
		}

	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user1', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				if ($user_token) {
					if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
						$this->db->set('is_active', 1);
						$this->db->where('email', $email);
						$this->db->update('user1');

						$this->db->delete('user_token', ['email' => $email]);

						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						'. $email .' Thank you for registering. Please wait for your registration approval process from PT Daese Garmin</div>');
						redirect('auth#login');
					}else {
						$this->db->delete('user1', ['email' => $email]);
						$this->db->delete('user_token', ['email' => $email]);

						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Account activation failed ! Wrong expired</div>');
						redirect('auth#login');
					}
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Account activation failed ! Wrong token</div>');
				redirect('auth#login');
			}
		}else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Account activation failed ! Wrong email</div>');
			redirect('auth#login');
		}

	}

	

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		You have been logged out !</div>');
		redirect('auth#login');
	}

	public function bloked()
	{
		$this->load->view('auth/block');

	}


	public function forgotPassword()
	{
		$this->form_validation->set_rules('email', 'Emali', 'trim|required|valid_email');


		if($this->form_validation->run() == false) {
			$data['title'] = 'Forgot Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/forgot-password');
			$this->load->view('templates/auth_footer');
		}else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('user1', ['email' => $email, 'is_active' => 1])->row_array();

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);
				$this-> _sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Please check your email to reset password !</div>');
				redirect('auth/forgotPassword');

			}else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Email is not registered or activated !</div>');
				redirect('auth/forgotPassword');
			}

		}
		
	}

	public function reset_password()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user1', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();


			}else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Reset password failed. Wrong token ! !</div>');
				redirect('auth/forgotPassword');
			}

		}else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Reset password failed. Wrong email ! !</div>');
				redirect('auth/forgotPassword');
		}
	}

	public function changePassword()
	{
if (!$this->session->userdata('reset_email')) {
	redirect('auth/#login');
}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[5]|matches[password1]');


		if($this->form_validation->run() == false) {
		$data['title'] = 'change Password';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/change-password');
		$this->load->view('templates/auth_footer');
		}else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user1');
		
			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			 Password has been change. Please login again ! !</div>');
			redirect('auth#login');
		}
	}


	public function detail_lowongan($idLowongan)
	{
		// $data['lwngan'] = $this->db->get('lowongan')->row_array();

		// // $data['lowongan'] = $this->m_detail->tampil_detail();

		$data['title'] = 'Detail Job vacancy';

		$baru['lwngan'] = $this->m_det_lowongan->get_data_lowongan($idLowongan);
		
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/detail_lowongan', $baru);
		//$this->load->view('templates/footer');
		
	}

	public function job_Profile_sales()
	{
		// $data['lwngan'] = $this->db->get('lowongan')->row_array();

		// // $data['lowongan'] = $this->m_detail->tampil_detail();

		$data['title'] = 'Sales and Marketing';

		// $baru['lwngan'] = $this->m_det_lowongan->get_data_lowongan($idLowongan);
		
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/jobProfile/sales');
		//$this->load->view('templates/footer');
		
	}

	public function job_Profile_pch()
	{
		// $data['lwngan'] = $this->db->get('lowongan')->row_array();

		// // $data['lowongan'] = $this->m_detail->tampil_detail();

		$data['title'] = 'Purchasing';

		// $baru['lwngan'] = $this->m_det_lowongan->get_data_lowongan($idLowongan);
		
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/jobProfile/pch');
		//$this->load->view('templates/footer');
		
	}

	public function job_Profile_ExpImp()
	{
		// $data['lwngan'] = $this->db->get('lowongan')->row_array();

		// // $data['lowongan'] = $this->m_detail->tampil_detail();

		$data['title'] = 'Export Import';

		// $baru['lwngan'] = $this->m_det_lowongan->get_data_lowongan($idLowongan);
		
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/jobProfile/export_import');
		//$this->load->view('templates/footer');
		
	}

	public function job_Profile_Itsupport()
	{
		// $data['lwngan'] = $this->db->get('lowongan')->row_array();

		// // $data['lowongan'] = $this->m_detail->tampil_detail();

		$data['title'] = 'IT Support';

		// $baru['lwngan'] = $this->m_det_lowongan->get_data_lowongan($idLowongan);
		
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/jobProfile/itSupport');
		//$this->load->view('templates/footer');
		
	}

	public function job_Profile_accounting()
	{
		// $data['lwngan'] = $this->db->get('lowongan')->row_array();

		// // $data['lowongan'] = $this->m_detail->tampil_detail();

		$data['title'] = 'Staff Accounting';

		// $baru['lwngan'] = $this->m_det_lowongan->get_data_lowongan($idLowongan);
		
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/jobProfile/accounting');
		//$this->load->view('templates/footer');
		
	}

	public function job_Profile_sekretaris()
	{
		// $data['lwngan'] = $this->db->get('lowongan')->row_array();

		// // $data['lowongan'] = $this->m_detail->tampil_detail();

		$data['title'] = 'Sekretaris';

		// $baru['lwngan'] = $this->m_det_lowongan->get_data_lowongan($idLowongan);
		
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/jobProfile/sekretaris');
		//$this->load->view('templates/footer');
		
	}
}

