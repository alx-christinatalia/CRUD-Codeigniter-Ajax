<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_home extends CI_Model {
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  
  function limit(){
	  $this->db->select("*");
	  $this->db->from("tutorial");
	  return $this->db->get(); 
  }

  function limit_cari($cari){
    $this->db->select('*');
    $this->db->from("tutorial");
    $this->db->like('nama',$cari);
    $this->db->or_like('kelas',$cari);
    return $this->db->get(); 
    
  }
  

  function dataedit($id){
	  $this->db->select("*");
	  $this->db->from("tutorial");
	  $this->db->where("id",$id);
	  return $this->db->get(); 
  }

  function add($data){
	  $this->db->insert('tutorial', $data);
  }
  
  function edit($id,$data){
	  $this->db->where('id',$id);
	$this->db->update('tutorial',$data);
  }
  
   function hapus($id){
	$this->db->where('id',$id);
	$this->db->delete('tutorial');
  }
  
}