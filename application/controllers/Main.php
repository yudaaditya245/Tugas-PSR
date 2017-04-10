<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Main extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('m_main','m');
    }

    public function index(){

      if($this->session->is_login == 1){
        redirect('home');
      }else{
        $this->load->view('login');
      }
    }

    public function signup(){
      if($this->session->is_login == 1){
        redirect('home');
      }else{
        $this->load->view('signup');
      }
    }

    public function login(){
      if($this->session->is_login == 1){
        redirect('home');
      }else{
        $this->load->view('login');
      }
    }

    public function logout(){
      $this->session->sess_destroy();
      redirect('main');
    }

    public function login_val(){
      $this->load->library('form_validation');
      $this->form_validation->set_rules('email','Email','required|valid_email');
      $this->form_validation->set_rules('password','Password','required');

      if($this->form_validation->run()){
        if($row = $this->m->login_val()){
          $data = array(
            'nama' => $row->nama,
            'email' => $row->email,
            'level' => $row->level,
            'is_login' => 1
          );
          $this->session->set_userdata($data);
          redirect("home");
        }else{
          echo '<div style="margin-top:10px;" class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="alert alert-danger">Incorrect email/password</div>
                    </div>
                  </div>
                </div>';
          $this->load->view('login');
        }

      }else{
        $this->load->view('login');
      }
    }

    public function signup_val(){
      $this->load->library('form_validation');
      $this->form_validation->set_rules('nama','Nama','required');
      $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[tbl_user.email]');
      $this->form_validation->set_rules('password','Password','required');
      $this->form_validation->set_rules('cpassword','Confirm Password','required|matches[password]');
      $this->form_validation->set_rules('level','Level','required');

      if($this->form_validation->run()){
        if($row = $this->m->signup_val()){
          $data = array(
            'nama' => $row['nama'],
            'email' => $row['email'],
            'level' => $row['level'],
            'is_login' => 1
          );
          $this->session->set_userdata($data);
          redirect('home');
        }else{
          echo 'Pendaftaran gagal';
        }

      }else{
        $this->load->view('signup');
      }
    }

  }


 ?>
