
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hrd extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		is_logg_in();

		$this->load->model('m_det_lowongan');
		$this->load->model('paket_model');
		$this->load->model('soal_model');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('hrd/index', $data);
		$this->load->view('templates/footer');
	}

	public function create_job()
	{
		$data['title'] = 'Create Job';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['lwngan'] = $this->db->get('lowongan')->result_array();

		$this->form_validation->set_rules('tgl_awal', 'Start Date', 'required');
		$this->form_validation->set_rules('tgl_akhir', 'End Date', 'required');
		$this->form_validation->set_rules('nama_lowongan', 'Job Name', 'required');
		$this->form_validation->set_rules('posisi', 'Position', 'required');
		$this->form_validation->set_rules('pendidikan', 'Education', 'required');
		$this->form_validation->set_rules('height', 'Height', 'required');
		$this->form_validation->set_rules('age_min', 'Age Min', 'required');
		$this->form_validation->set_rules('age_max', 'Age Max', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('hrd/create_job/index', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'tgl_awal_pembuatan' => $this->input->post('tgl_awal'),
				'tgl_akhir_pembuatan' => $this->input->post('tgl_akhir'),
				'nama_lowongan' => $this->input->post('nama_lowongan'),
				'posisi' => $this->input->post('posisi'),
				'pendidikan' => $this->input->post('pendidikan'),
				'jenis_kelamin' => $this->input->post('gridRadios'),
				'umur_min' => $this->input->post('age_min'),
				'umur_max' => $this->input->post('age_max'),
				'tinggi_badan' => $this->input->post('height')
			];


			$this->db->insert('lowongan', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New create job added !</div>');
				redirect('hrd/create_job');
		}
		
	}

	public function register_list()
	{
		$data['title'] = 'Registration List';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('User_model', 'role');
		$data['register'] = $this->role->getUser();

		$data['role'] = $this->db->get('user')->result_array();


		$this->form_validation->set_rules('gridRadios', 'Approve or Reject ?', 'required');

			if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('hrd/registrasi_list', $data);
				$this->load->view('templates/footer');
			} else {
			// approve registerlist
			$email = $this->input->post('email');
			$status = $this->input->post('gridRadios');

			if ($status == "aktif") {
				$this->db->set('status', $status);
				$this->db->where('email', $email);
				$this->db->update('user');

				$this->_sendEmailApprove();

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Your profil !</div>');
				redirect('hrd/register_list');


			}else{
				$this->db->set('status', $status);
				$this->db->where('email', $email);
				$this->db->update('user');

				$this->_sendEmailRejected();

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Your reject !</div>');
				redirect('hrd/register_list');
			}
		}
	}

	private function _sendEmailApprove()
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
		// $this->email->to('wendyrusdi27@gmail.com');
		$this->email->subject('Account Registration Approved');
		$this->email->message('Thank you for registering. Your account is active and please login. Good luck');

		if ($this->email->send()) {
			return true;
		}else {
			echo $this->email->print_debugger();
			die;
		}

	}

	private function _sendEmailRejected()
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
		// $this->email->to('wendyrusdi27@gmail.com');
		$this->email->subject('Registration Declined');
		$this->email->message('Thank you for registering. Sorry, we reject your account because the registration has been closed');

		if ($this->email->send()) {
			return true;
		}else {
			echo $this->email->print_debugger();
			die;
		}

	}


	public function employee_data()
	{
		$data['title'] = 'Prospective Employee Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// $data['lwngan'] = $this->db->get('lowongan')->result_array();

		$this->load->model('M_det_lowongan', 'info');
		$data['lwngan'] = $this->info->get_det_data_lowongan();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('hrd/data-lowongan', $data);
		$this->load->view('templates/footer');
	}

	public function detail_employee_data($idLowongn=null)
	{
		$data['title'] = 'Prospective Employee Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// $data['lwngan'] = $this->db->get('lowongan')->result_array();

		$this->load->model('M_det_lowongan', 'info');
		$data['lwongan'] = $this->info->get_det_data_pelamar($idLowongn);



		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('hrd/detail-data-lowongan', $data);
		$this->load->view('templates/footer');
	}

	public function detail_pelamar($iduser)
	{
		$data['title'] = 'Prospective Employee Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data1['user'] = $this->db->get_where('user', ['id' => $iduser])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('hrd/detail_pelamar', $data1);
		$this->load->view('templates/footer');
	}

	public function exam()
	{
		$data['title'] = 'Exam Questions';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('paket_model', 'pkt');
		$data['lwngan'] = $this->pkt->View();

		$this->form_validation->set_rules('package', 'matter package', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('hrd/paket', $data);
			$this->load->view('templates/footer');
		}else{

			$this->db->insert('t_paket', ['paket' => $this->input->post('package')]);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New maetter package added !</div>');
				redirect('hrd/exam');
		}
		
	}

	public function delete_paket($kode)
	{
		

		$hasil = $this->paket_model->Hapus('t_paket',array('id_paket' => $kode));
		if($hasil == 1){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Maetter package deleted !</div>');
				redirect('hrd/exam');
		}
		else{
			echo "mohon periksa kembali";
		}
	}

	public function update_paket()
	{
		$paket = $this->input->post('id_pkt');
		$data = $this->input->post('paketname');
	
        $this->paket_model->Rubah($paket, $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Maetter package Updateded !</div>');
				redirect('hrd/exam');
	}
	
	public function soal()
	{
		$data['title'] = 'Exam Questions';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// $this->load->model('soal_model', 's');
		// $data['lwngan'] = $this->s->View();

		$this->load->model('paket_model', 'pkt');
		$data['soal_paket'] = $this->pkt->View();


		$data['lwngan'] = $this->db->get('t_soal')->result_array();

		$this->form_validation->set_rules('sp', 'Package', 'required');
		// $this->form_validation->set_rules('Soal', 'Questions', 'required');
		// $this->form_validation->set_rules('answerA', 'Answer A', 'required');
		// $this->form_validation->set_rules('answerB', 'Answer B', 'required');
		// $this->form_validation->set_rules('answerC', 'Answer C', 'required');
		// $this->form_validation->set_rules('answerD', 'Answer D', 'required');
		// $this->form_validation->set_rules('answerE', 'Answer E', 'required');
		// $this->form_validation->set_rules('key', 'Key', 'required');
		// $this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('hrd/v_soal', $data);
			$this->load->view('templates/footer');
		}else{

			// $this->db->insert('t_soal', ['paket' => $this->input->post('sp')]);

			$data = [
				'id_paket' => $this->input->post('sp'),
				'soal' => $this->input->post('Soal'),
				'a' => $this->input->post('answerA'),
				'b' => $this->input->post('answerB'),
				'c' => $this->input->post('answerC'),
				'd' => $this->input->post('answerD'),
				'e' => $this->input->post('answerE'),
				'kunci' => $this->input->post('key'),
				'status' => $this->input->post('status'),
			];

			$this->db->insert('t_soal', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New questions added !</div>');
				redirect('hrd/soal');
			
		}

			
	}
		

	public function delete_soal($kode)
	{
		

		$hasil = $this->paket_model->Hapus('t_soal',array('id_soal' => $kode));
		if($hasil == 1){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Questions deleted !</div>');
				redirect('hrd/soal');
		}
		else{
			echo "mohon periksa kembali";
		}
	}
}