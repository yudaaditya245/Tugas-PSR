<?php

  defined('BASEPATH') or exit('Error');

  class Home extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('m_main','m');

      if($this->session->is_login == 0){
        redirect('main');
      }
    }

    public function index(){
      if($this->session->is_login == 1){
        if($this->session->level == 1){
          $this->load->view('user/admin');
        }else{
          $this->load->view('user/staff');
        }
      }else{
        echo 'Login dulu bray <a href="main/login">Login</a>';
      }

    }

    // ---------------- LINK HREF ----------------

    public function user(){
      $data['user'] = $this->m->select_user();
      $this->load->view('view/v_user',$data);
    }

    public function maskapai(){
      $data['row'] = $this->m->select_maskapai();
      $this->load->view('view/v_maskapai',$data);
    }

    public function jadwal(){
      $data['row'] = $this->m->select_jadwal();
      $this->load->view('view/v_jadwal',$data);
    }

    // LINK HREF END


    // ------------ CRUD MASKAPAI ----------------

    public function t_maskapai(){
      $this->load->view('tambah/t_maskapai');
    }

    public function t_val_maskapai(){
      $this->load->library('form_validation');
      $this->form_validation->set_rules('nama_mas','Nama Maskapai','required|is_unique[tbl_maskapai.maskapai]');

      if($this->form_validation->run()){
        $result = $this->m->t_maskapai();
        if($result){
          $this->maskapai();
        }else{
          $this->load->view('tambah/t_maskapai');
        }
      }else{
        $this->load->view('tambah/t_maskapai');
      }
    }

    public function e_maskapai($id){
      $query = $this->m->get_tbl($id,'tbl_maskapai');
      $data['row'] = $query->row();
      $this->load->view('edit/e_maskapai',$data);
    }

    public function e_val_maskapai($id){
      $this->load->library('form_validation');
      $this->form_validation->set_rules('nama_mas','Nama Maskapai','required|is_unique[tbl_maskapai.maskapai]');

      if($this->form_validation->run()){
        $result = $this->m->e_maskapai($id);
        if($result){
          $this->maskapai();
        }else{
          $this->e_maskapai();
        }
      }else{
        $this->e_maskapai($id);
      }
    }


    public function h_maskapai($id){
      $result = $this->m->h_maskapai($id);
      if($result){
        $this->maskapai();
      }else{
        echo 'Gagal';
      }
    }

    // CRUD MASKAPAI END


    // ---------------- CRUD JADWAL PENERBANGAN ----------------

    public function t_jadwal(){
      $data['row'] = $this->m->select_maskapai();
      $this->load->view('tambah/t_jadwal',$data);
    }

    public function t_val_jadwal(){
      $this->load->library('form_validation');
      $this->form_validation->set_rules('kode_jadwal','Kode Jadwal','required|is_unique[tbl_jadwal.kode]');
      $this->form_validation->set_rules('maskapai','Maskapai','required');
      $this->form_validation->set_rules('asal','Asal','required');
      $this->form_validation->set_rules('tujuan','Tujuan','required');
      $this->form_validation->set_rules('waktu','Waktu','required');
      $this->form_validation->set_rules('harga','Harga','required|numeric');

      if($this->form_validation->run()){
        $result = $this->m->t_jadwal();
        if($result){
          $this->jadwal();
        }else{
          echo 'Gagal';
        }
      }else{
        $this->t_jadwal();
      }

    }

    public function e_jadwal($id){
      $data['row'] = $this->m->get_tbl($id,'tbl_jadwal') -> row();
      $data['row2'] = $this->m->select_maskapai();
      $this->load->view('edit/e_jadwal',$data);
    }

    public function e_val_jadwal($id){
      $this->load->library('form_validation');
      $this->form_validation->set_rules('kode_jadwal','Kode Jadwal','required');
      $this->form_validation->set_rules('maskapai','Maskapai','required');
      $this->form_validation->set_rules('asal','Asal','required');
      $this->form_validation->set_rules('tujuan','Tujuan','required');
      $this->form_validation->set_rules('waktu','Waktu','required');
      $this->form_validation->set_rules('harga','Harga','required|numeric');

      if($this->form_validation->run()){
        $result = $this->m->e_jadwal($id);
        if($result){
          $this->jadwal();
        }else{
          echo 'Gagal';
        }
      }else{
        $this->e_jadwal($id);
      }
    }

    public function h_jadwal($id){
      $result = $this->m->h_jadwal($id);
      if($result){
        $this->jadwal();
      }else{
        echo 'gagal';
      }
    }

    // CRUD JADWAL PENERBANGAN END


    // ---------------- CRUD USER ----------------

    public function h_user($id){
     $result = $this->m->h_user($id);
     if($result){
       $this->user();
     }else{
       echo 'Hapus gagal';
     }
    }

    // CRUD USER END


    // ---------------- TRANSAKSI PENJUALAN ----------------

    public function t_penjualan(){
      $data['jadwal'] = $this->m->select_jadwal();
      $this->load->view('view/v_transaksi',$data);
    }

    public function t_jual($kode){
      $query = $this->m->get_jadwal($kode);
      $data['row'] = $query->row_array();
      $this->load->view('view/v_cart',$data);
    }

    public function t_val_jual($kode){
      $this->load->library('form_validation');
      $this->form_validation->set_rules('nama',"Nama",'required');
      $this->form_validation->set_rules('no_id',"No Identitas",'required|numeric');
      $this->form_validation->set_rules('no_telp',"No Telp",'required|numeric');

      if($this->form_validation->run()){
        if($this->m->t_jual()){
          redirect('home/l_penjualan');
        }else{
          echo 'Pembeliaan Gagal';
        }
      }else{
        $this->t_jual($kode);
      }
    }

    public function l_penjualan(){
      $data['laporan'] = $this->m->select_laporan();
      $this->load->view('view/v_laporan',$data);
    }

    // TRANSAKSI PENJUALAN END


  }

 ?>
