<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class M_main extends CI_Model{

    public function login_val(){
      $email = $this->input->post('email');
      $password = md5($this->input->post('password'));

      $this->db->where('email',$email);
      $this->db->where('password',$password);
      $query = $this->db->get('tbl_user');

      if($query->num_rows() == 1){
        $row = $query -> row();
        return $row;
      }else{
        return false;
      }

    }

    public function signup_val(){
      $nama = $this->input->post('nama');
      $email = $this->input->post('email');
      $password = md5($this->input->post('password'));
      $level = $this->input->post('level');

      $data = array(
        'id' => NULL,
        'nama' => $nama,
        'email' => $email,
        'password' => $password,
        'level' => $level
      );

      $query = $this->db->insert('tbl_user',$data);

      if($query){
        return $data;
      }else {
        return false;
      }

    }

    public function select_user(){
      $query = $this->db->get('tbl_user');
      return $query->result_array();
    }

    public function select_maskapai(){
      $query = $this->db->get('tbl_maskapai');
      return $query->result_array();
    }

    public function select_jadwal(){
      $query = $this->db->get('tbl_jadwal');
      return $query->result_array();
    }

    public function select_laporan(){
      $query = $this->db->get('v_laporan');
      return $query->result_array();
    }

    public function t_maskapai(){
      $data = array(
        'id' => NULL,
        'maskapai' => $this->input->post('nama_mas')
      );

      if($this->db->insert('tbl_maskapai',$data)){
        return true;
      }else{
        return false;
      }

    }

    public function e_maskapai($id){
      $data = array(
        'maskapai' => $this->input->post('nama_mas')
      );

      $this->db->where('id',$id);
      if($this->db->update('tbl_maskapai',$data)){
          return true;
      }else{
        return false;
      }

    }

    public function h_maskapai($id){
      $this->db->where('id',$id);

      if($this->db->delete('tbl_maskapai')){
        return true;
      }else{
        return false;
      }
    }

    public function get_tbl($id,$tbl){
      $this->db->where('id',$id);
      $query = $this->db->get("$tbl");
      return $query;
    }

    public function t_jadwal(){
      $data = array(
        'id' => NULL,
        'kode' => $this->input->post('kode_jadwal'),
        'maskapai' => $this->input->post('maskapai'),
        'asal' => $this->input->post('asal'),
        'tujuan' => $this->input->post('tujuan'),
        'waktu' => $this->input->post('waktu'),
        'harga' => $this->input->post('harga')
      );

      if($this->db->insert('tbl_jadwal',$data)){
        return true;
      }else {
        return false;
      }
    }

    public function e_jadwal($id){
      $data = array(
        'kode' => $this->input->post('kode_jadwal'),
        'maskapai' => $this->input->post('maskapai'),
        'asal' => $this->input->post('asal'),
        'tujuan' => $this->input->post('tujuan'),
        'waktu' => $this->input->post('waktu'),
        'harga' => $this->input->post('harga')
      );

      $this->db->where('id',$id);
      if($this->db->update('tbl_jadwal',$data)){
        return true;
      }else{
        return false;
      }
    }

    public function h_jadwal($id){
      $this->db->where('id',$id);
      if($this->db->delete('tbl_jadwal')){
        return true;
      }else{
        return false;
      }
    }

    public function h_user($id){
      $this->db->where('id',$id);
      if($this->db->delete('tbl_user')){
        return true;
      }else{
        return false;
      }
    }

    public function t_jual(){
      $data = array(
        'id' => NULL,
        'kode' => $this->input->post('kode'),
        'nama' => $this->input->post('nama'),
        'no_id' => $this->input->post('no_id'),
        'no_telp' => $this->input->post('no_telp')
      );

      // print_r($data);

      if($this->db->insert('tbl_jual',$data)){
        return true;
      }else{
        return false;
      }
    }

    public function get_jadwal($kode){
      $this->db->where('kode',$kode);
      if($query = $this->db->get('tbl_jadwal')){
        return $query;
      }else{
        return false;
      }
    }

  }

 ?>
