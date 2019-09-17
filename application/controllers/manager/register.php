<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends Member_Controller {
	private $kode_menu = 'register';
	private $kelompok = 'peserta';
	private $url = 'manager/register';
	
    function __construct(){
		parent:: __construct();
		$this->load->model('cbt_user_grup_model');
		$this->load->model('cbt_tesgrup_model');

		$this->load->model('register_model');

		$this->load->library('form_validation');

		parent::cek_akses($this->kode_menu);
	}
	
    public function index(){
        $data['kode_menu'] = $this->kode_menu;
        $data['url'] = $this->url;
        
        $data['regist'] = $this->db->get('user1')->result_array();

        $this->template->display_admin($this->kelompok.'/peserta_register_view', 'Data Registrasi', $data);
    }

   public function register_list()
	{

		// $this->form_validation->set_rules('regist_keputusan', 'Setujui atau Tidak ?', 'required|strip_tags');

		 // if($this->form_validation->run() == false){
            $dataID = $this->input->post('id_regist');
            $status = $this->input->post('regist_keputusan');

	

			if ($status == "Aktif") {
				$this->db->set('status', $status);
				$this->db->where('id', $dataID);
				$this->db->update('user1');

				// $this->_sendEmailApprove();

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Data Telah Disetujui !</div>');
				redirect('manager/register');


			}else if ($status == "Tidak Aktif") {
				$this->db->set('status', $status);
				$this->db->where('id', $dataID);
				$this->db->update('user1');

				// $this->_sendEmailRejected();

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Data Registrasi Di Tolak !</div>');
				redirect('manager/register');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Anda belum menentukan pilihan !</div>');
				redirect('manager/register');
			}
		
	}

	public function hapus_data_register()
	{

		$dataID = $this->input->post('id_regist');
        $status = $this->input->post('status');

			if ($status == "Tidak Aktif") {
				// $this->db->set('status', $status);
				$this->db->where('id', $dataID);
				$this->db->delete('user1');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Data Telah Dihapus !</div>');
				redirect('manager/register');


			}else if ($status == "Aktif") {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Data tidak bisa di hapus karena akun pelamar masih aktif !</div>');
				redirect('manager/register');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Anda belum menentukan pilihan !</div>');
				redirect('manager/register');
			}
	}
}
