<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Soal_model extends Ci_Model {

  public function get_data_soal($idsoal){

    $query = "SELECT * FROM t_soal WHERE id_soal='$idsoal'";
    return $this->db->query($query)->row_array();
  }

  public function View($where= "") {

    $query = "SELECT * FROM t_soal". $where;
    return $this->db->query($query)->result_array();
  }

   public function Ambil($where= "") {
    $data = $this->db->query('select * from t_soal '.$where);
    return $data;
  }

  public function Simpan($tabel, $data){
    $res = $this->db->insert($tabel, $data);
    return $res;
  }

  public function Rubah($id,$data)
  {
    $this->db->set('paket', $data);
    $this->db->where('id_soal',$id);
    $this->db->update('t_soal');
  }

  public function Hapus($table,$where){
    return $this->db->delete($table,$where);
  }

  public function AmbilPaket2($kode = 0) {
    $data = $this->db->query("select * from soal where id_soal = '$kode'")->result_array();
    return $data[0]['paket'];
  } 

  public function AmbilJawaban($kode = 0) {
    $data = $this->db->query("select * from soal where id_soal = '$kode'")->result_array();
    return $data[0]['kunci'];
  }

  public function HitungSoal() {

    $query = $this->db->get('t_soal');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
  }

  public function data_soal($stat){

    $query = "SELECT * FROM t_soal WHERE status='$stat'";
    return $this->db->query($query)->row_array();
  }
}