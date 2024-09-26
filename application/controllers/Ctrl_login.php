<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Ctrl_login extends CI_Controller {
    public function __construct() {
            parent::__construct();
      $this->load->helper('url');
      $this->load->model("model_login");
      $this->load->library(array('session','pagination','form_validation'));

    }
  
  public function index()
  {
    $this->load->view('login');
  }

  public function cek_login(){
            $user = $this->input->post('user');
            $pass = md5($this->input->post('pass'));
            $cek = count($this->model_login->auth($user,$pass));
            $data_user = $this->model_login->dataPengguna($user);

            

             if (@$cek > 0 ) {
                $this->session->set_userdata('tipeuser', $data_user->type);
                $this->session->set_userdata('username', $data_user->username);
                redirect('home');
           
                
            } else {
                echo " <script>
                alert('Gagal Login: Cek username , password dan level anda!'); location='".base_url('login')."';
              </script>";
            }
  }

  function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }


}
?>