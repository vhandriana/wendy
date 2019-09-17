<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paket_model extends Ci_Model {

  public function View($where= "") {
    
    $query = "SELECT * FROM t_paket".$where;
    return $this->db->query($query)->result_array();
  }


  public function Simpan($tabel, $data){
    $res = $this->db->insert($tabel, $data);
    return $res;
  }

  public function Rubah($paket,$data)
  {
    
    $this->db->set('paket', $data);
    $this->db->where('id_paket', $paket);
    $this->db->update('t_paket');

  }

  public function Hapus($table,$where){
    return $this->db->delete($table,$where);
  }
}