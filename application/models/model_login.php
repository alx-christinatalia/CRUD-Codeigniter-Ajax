<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_login extends CI_Model {
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  
  function auth($user,$pass){
  $this->db->select('*');
  $this->db->from('login');
  $this->db->where('username',$user);
  $this->db->where('password',$pass);
  $result = $this->db->get();
  return $result->result(); 
    }

  public function dataPengguna($user)
  {
   $username = htmlspecialchars($this->db->escape($user));    
   $this->db->select('*');
   $this->db->where("username = $username"); 
   
   $query = $this->db->get('login');
   
   return $query->row();
  }
  
}