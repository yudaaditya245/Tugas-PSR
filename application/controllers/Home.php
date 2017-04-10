<?php

defined('BASEPATH') or exit('Error');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelMain', 'm');

        if ($this->session->is_login == 0) {
            redirect('main');
        }
    }

    public function index()
    {
        if ($this->session->is_login == 1) {
            if ($this->session->level == 1) {
                $this->load->view('user/admin');
            } else {
                $this->load->view('user/staff');
            }
        } else {
            echo 'Login dulu bray <a href="main/login">Login</a>';
        }

    }

    // ---------------- LINK HREF ----------------

    public function user()
    {
        $data['user'] = $this->m->selectUser();
        $this->load->view('view/viewUser', $data);
    }

    public function maskapai()
    {
        $data['row'] = $this->m->selectMaskapai();
        $this->load->view('view/viewMaskapai', $data);
    }

    public function jadwal()
    {
        $data['row'] = $this->m->selectJadwal();
        $this->load->view('view/viewJadwal', $data);
    }

    // LINK HREF END


    // ------------ CRUD MASKAPAI ----------------

    public function tambahMaskapai()
    {
        $this->load->view('tambah/tambahMaskapai');
    }

    public function tambahValMaskapai()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_mas', 'Nama Maskapai', 'required|is_unique[tbl_maskapai.maskapai]');

        if ($this->form_validation->run()) {
            $result = $this->m->tambahMaskapai();
            if ($result) {
                $this->maskapai();
            } else {
                $this->load->view('tambah/tambahMaskapai');
            }
        } else {
            $this->load->view('tambah/tambahMaskapai');
        }
    }

    public function editMaskapai($id)
    {
        $query = $this->m->getTable($id, 'tbl_maskapai');
        $data['row'] = $query->row();
        $this->load->view('edit/editMaskapai', $data);
    }

    public function editValMaskapai($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_mas', 'Nama Maskapai', 'required|is_unique[tbl_maskapai.maskapai]');

        if ($this->form_validation->run()) {
            $result = $this->m->editMaskapai($id);
            if ($result) {
                $this->maskapai();
            } else {
                $this->editMaskapai();
            }
        } else {
            $this->editMaskapai($id);
        }
    }

    public function hapusMaskapai($id)
    {

        if ($this->session->is_login == 0) {
            echo 'Login dulu bray <a href="'.base_url().'main/login">Login</a>';
        } elseif ($this->session->level == 0) {
            echo 'Anda adalah Staff, Login dengan akun admin, <a href="'.base_url().'home">Kembali ke Home</a>';
        } else {

            $result = $this->m->hapusMaskapai($id);
            if ($result) {
                $this->maskapai();
            } else {
                echo 'Gagal';
            }
        }
    }

    // CRUD MASKAPAI END


    // ---------------- CRUD JADWAL PENERBANGAN ----------------

    public function tambahJadwal()
    {
        $data['row'] = $this->m->selectMaskapai();
        $this->load->view('tambah/tambahJadwal', $data);
    }

    public function tambahValJadwal()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kode_jadwal', 'Kode Jadwal', 'required|is_unique[tbl_jadwal.kode]');
        $this->form_validation->set_rules('maskapai', 'Maskapai', 'required');
        $this->form_validation->set_rules('asal', 'Asal', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run()) {
            $result = $this->m->tambahJadwal();
            if ($result) {
                $this->jadwal();
            } else {
                echo 'Gagal';
            }
        } else {
            $this->tambahJadwal();
        }

    }

    public function editJadwal($id)
    {
        $data['row'] = $this->m->getTable($id, 'tbl_jadwal') -> row();
        $data['row2'] = $this->m->selectMaskapai();
        $this->load->view('edit/editJadwal', $data);
    }

    public function editValJadwal($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kode_jadwal', 'Kode Jadwal', 'required');
        $this->form_validation->set_rules('maskapai', 'Maskapai', 'required');
        $this->form_validation->set_rules('asal', 'Asal', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run()) {
            $result = $this->m->editJadwal($id);
            if ($result) {
                $this->jadwal();
            } else {
                echo 'Gagal';
            }
        } else {
            $this->editJadwal($id);
        }
    }

    public function hapusJadwal($id)
    {
        if ($this->session->is_login == 0) {
            echo 'Login dulu bray <a href="'.base_url().'main/login">Login</a>';
        } elseif ($this->session->level == 0) {
            echo 'Anda adalah Staff, login dengan akun Admin, <a href="'.base_url().'home">Kembali ke Home</a>';
        } else {

            $result = $this->m->hapusJadwal($id);
            if ($result) {
                $this->jadwal();
            } else {
                echo 'gagal';
            }
        }
    }

    // CRUD JADWAL PENERBANGAN END


    // ---------------- CRUD USER ----------------

    public function hapusUser($id)
    {

        if ($this->session->is_login == 0) {
            echo 'Login dulu bray <a href="'.base_url().'main/login">Login</a>';
        } elseif ($this->session->level == 0) {
            echo 'Anda adalah Staff, login dengan akun Admin, <a href="'.base_url().'home">Kembali ke Home</a>';
        } else {

            $result = $this->m->hapusUser($id);
            if ($result) {
                $this->user();
            } else {
                echo 'Hapus gagal';
            }
        }
    }

    // CRUD USER END


    // ---------------- TRANSAKSI PENJUALAN ----------------

    public function transaksiPenjualan()
    {
        $data['jadwal'] = $this->m->selectJadwal();
        $this->load->view('view/viewTransaksi', $data);
    }

    public function transaksiJual($kode)
    {
        $query = $this->m->getJadwal($kode);
        $data['row'] = $query->row_array();
        $this->load->view('view/viewCart', $data);
    }

    public function transaksiValJual($kode)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', "Nama", 'required');
        $this->form_validation->set_rules('no_id', "No Identitas", 'required|numeric');
        $this->form_validation->set_rules('no_telp', "No Telp", 'required|numeric');

        if ($this->form_validation->run()) {
            if ($this->m->transaksiJual()) {
                redirect('home/laporanPenjualan');
            } else {
                echo 'Pembeliaan Gagal';
            }
        } else {
            $this->transaksiJual($kode);
        }
    }

    public function laporanPenjualan()
    {
        $data['laporan'] = $this->m->selectLaporan();
        $this->load->view('view/viewLaporan', $data);
    }

    // TRANSAKSI PENJUALAN END
}
