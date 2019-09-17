<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftr_lowongan extends Member_Controller {
	private $kode_menu = 'peserta-group';
	private $kelompok = 'peserta';
	private $url = 'manager/daftr_lowongan';
	
    function __construct(){
		parent:: __construct();
		$this->load->model('cbt_user_grup_model');
		$this->load->model('cbt_tesgrup_model');

		parent::cek_akses($this->kode_menu);
	}
	
    public function index(){
        $data['kode_menu'] = $this->kode_menu;
        $data['url'] = $this->url;
        
        $this->template->display_admin($this->kelompok.'/peserta_group_view', 'Daftar Lowongan', $data);
    }

    function tambah(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('tambah-group', 'Posisi','required|strip_tags');
         $this->form_validation->set_rules('tambah-lowongan', 'Nama Lowongan','required|strip_tags');
          $this->form_validation->set_rules('tambah-pendidikan', 'Pendidikan','required|strip_tags');
           $this->form_validation->set_rules('tambah-jk', 'Jenis Kelamin','required|strip_tags');
            $this->form_validation->set_rules('tambah-umurMin', 'Minimal Umur','required|strip_tags');
             $this->form_validation->set_rules('tambah-umurMax', 'Maksimal Umur','required|strip_tags');
              $this->form_validation->set_rules('tambah-tb', 'Tinggi Badan','required|strip_tags');
        
        if($this->form_validation->run() == TRUE){
            $data['posisi'] = $this->input->post('tambah-group', true);
            $data['nama_lowongan'] = $this->input->post('tambah-lowongan', true);
            $data['pendidikan'] = $this->input->post('tambah-pendidikan', true);
            $data['jenis_kelamin'] = $this->input->post('tambah-jk', true);
            $data['umur_min'] = $this->input->post('tambah-umurMin', true);
            $data['umur_max'] = $this->input->post('tambah-umurMax', true);
            $data['tinggi_badan'] = $this->input->post('tambah-tb', true);

            if($this->cbt_user_grup_model->count_by_kolom('posisi', $data['posisi'])->row()->hasil>0){
                $status['status'] = 0;
                $status['pesan'] = 'Nama Group sudah terpakai !';
            }else{
				$this->cbt_user_grup_model->save($data);
                
                $status['status'] = 1;
                $status['pesan'] = 'Group berhasil disimpan ';
            }
        }else{
            $status['status'] = 0;
            $status['pesan'] = validation_errors();
        }
        
        echo json_encode($status);
    }
    
    function get_by_id($id=null){
    	$data['data'] = 0;
		if(!empty($id)){
			$query = $this->cbt_user_grup_model->get_by_kolom('lowongan_id', $id);
			if($query->num_rows()>0){
				$query = $query->row();
				$data['data'] = 1;
				$data['id'] = $query->lowongan_id;
				$data['group'] = $query->posisi;
			}
		}
		echo json_encode($data);
    }

    function edit(){
        $this->load->library('form_validation');
        
		$this->form_validation->set_rules('edit-id', 'ID','required|strip_tags');
		$this->form_validation->set_rules('edit-group', 'Nama Group','required|strip_tags');
        $this->form_validation->set_rules('edit-pilihan', 'Pilihan','required|strip_tags');
        $this->form_validation->set_rules('edit-group-asli', 'Nama Group','required|strip_tags');
        
        if($this->form_validation->run() == TRUE){
            $pilihan = $this->input->post('edit-pilihan', true);
            $id = $this->input->post('edit-id', true);
            
            if($pilihan=='hapus'){//hapus
            	if($this->cbt_tesgrup_model->count_by_kolom('tstgrp_grup_id', $id)->row()->hasil>0){
            		$status['status'] = 0;
					$status['pesan'] = 'Group tidak dapat dihapus, Group masih digunakan Tes !';
            	}else{
            		$this->cbt_user_grup_model->delete('lowongan_id', $id);
					$status['status'] = 1;
					$status['pesan'] = 'Group berhasil dihapus !';
            	}
            }else if($pilihan=='simpan'){//simpan
				$group_asli = $this->input->post('edit-group-asli', true);
                $data['posisi'] = $this->input->post('edit-group', true);

                if($group_asli!=$data['posisi']){
                	if($this->cbt_user_grup_model->count_by_kolom('posisi', $data['posisi'])->row()->hasil>0){
		                $status['status'] = 0;
		                $status['pesan'] = 'Nama Group sudah terpakai !';
		            }else{
						$this->cbt_user_grup_model->update('lowongan_id', $id, $data);
		                
		                $status['status'] = 1;
		                $status['pesan'] = 'Group berhasil disimpan ';
		            }
                }else{
                	$status['status'] = 1;
                	$status['pesan'] = 'Group Berhasil disimpan';
                }
            }
            
        }else{
            $status['status'] = 0;
            $status['pesan'] = validation_errors();
        }
        
        echo json_encode($status);
    }
    
    function get_datatable(){
		// variable initialization
		$search = "";
		$start = 0;
		$rows = 10;

		// get search value (if any)
		if (isset($_GET['sSearch']) && $_GET['sSearch'] != "" ) {
			$search = $_GET['sSearch'];
		}

		// limit
		$start = $this->get_start();
		$rows = $this->get_rows();

		// run query to get user listing
		$query = $this->cbt_user_grup_model->get_datatable($start, $rows, 'posisi', $search);
		$iFilteredTotal = $query->num_rows();
		
		$iTotal= $this->cbt_user_grup_model->get_datatable_count('posisi', $search)->row()->hasil;
	    
		$output = array(
			"sEcho" => intval($_GET['sEcho']),
	        "iTotalRecords" => $iTotal,
	        "iTotalDisplayRecords" => $iTotal,
	        "aaData" => array()
	    );

	    // get result after running query and put it in array
		$i=$start;
		$query = $query->result();
	    foreach ($query as $temp) {			
			$record = array();
            
			$record[] = ++$i;
            $record[] = $temp->nama_lowongan;
            $record[] = $temp->posisi;
            $record[] = $temp->pendidikan;
            $record[] = $temp->jenis_kelamin;
            $record[] = $temp->umur_min;
            $record[] = $temp->umur_max;
            $record[] = $temp->tinggi_badan;
            $record[] = '<a onclick="edit(\''.$temp->lowongan_id.'\')" style="cursor: pointer;" class="btn btn-default btn-xs">Edit</a>';

			$output['aaData'][] = $record;
		}
		// format it to JSON, this output will be displayed in datatable
        
		echo json_encode($output);
	}
	
	/**
	* funsi tambahan 
	* 
	* 
*/
	
	function get_start() {
		$start = 0;
		if (isset($_GET['iDisplayStart'])) {
			$start = intval($_GET['iDisplayStart']);

			if ($start < 0)
				$start = 0;
		}

		return $start;
	}

	function get_rows() {
		$rows = 10;
		if (isset($_GET['iDisplayLength'])) {
			$rows = intval($_GET['iDisplayLength']);
			if ($rows < 5 || $rows > 500) {
				$rows = 10;
			}
		}

		return $rows;
	}

	function get_sort_dir() {
		$sort_dir = "ASC";
		$sdir = strip_tags($_GET['sSortDir_0']);
		if (isset($sdir)) {
			if ($sdir != "asc" ) {
				$sort_dir = "DESC";
			}
		}

		return $sort_dir;
	}
}