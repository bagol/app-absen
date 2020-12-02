<?php defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Shift_model");
        $this->load->model("Device_model");
        if ($this->session->userdata("level") !== "admin") {
            redirect("Auth/cekSession");
        }
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['bc']    = "";
        $this->load->view("layout/header", $data);
        $this->load->view("admin/dashboard");
        $this->load->view("layout/footer");
    }

    public function kelola_user()
    {
        $data['title'] = "Kelola Pengguna";
        $data['bc']    = "/Kelola Pengguna";
        $data['users'] = $this->User_model->find()->result_array();
        $this->load->view("layout/header", $data);
        $this->load->view("admin/kelola_user");
        $this->load->view("layout/footer");
    }

    public function tambah_user()
    {
        $data['title'] = "Tambah Pengguna";
        $data['bc']    = "/Tambah Pengguna";
        $this->load->view("layout/header", $data);
        $this->load->view("admin/tambah_user");
        $this->load->view("layout/footer");
    }

    public function kelola_shift()
    {
        $data['title']  = "Kelola Shift";
        $data['bc']     = "/Kelola Shift";
        $data["shifts"] = $this->Shift_model->find()->result_array();
        $this->load->view("layout/header", $data);
        $this->load->view("admin/kelola_shift");
        $this->load->view("layout/footer");
    }

    public function tambah_shift()
    {
        $data['title'] = "Tambah Shift";
        $data['bc']    = "/Tambah Shift";
        $this->load->view("layout/header", $data);
        $this->load->view("admin/tambah_shift");
        $this->load->view("layout/footer");
    }

    public function kelola_device()
    {
        $data['title']   = "Kelola Device";
        $data['bc']      = "/Kelola Device";
        $data["devices"] = $this->Device_model->find()->result_array();
        $this->load->view("layout/header", $data);
        $this->load->view("admin/kelola_device");
        $this->load->view("layout/footer");
        $this->load->view("admin/show_modal_device");
    }

    public function tambah_perangkat()
    {
        $data['title'] = "Tambah Perangkat";
        $data['bc']    = "/Tambah Perangkat";
        $this->load->view("layout/header", $data);
        $this->load->view("admin/tambah_perangkat");
        $this->load->view("layout/footer");
    }

    public function absen($shift = null)
    {

        if ($shift == 1) {
            $data['title'] = "Absen " . "pagi";
            $data['bc']    = "/Absen " . "pagi";
        } else {
            $data['title'] = "Absen " . "siang";
            $data['bc']    = "/Absen " . "siang";
        }
        $data['shift'] = $shift;
        $this->load->view("layout/header", $data);
        $this->load->view("absen/scanner");
        $this->load->view("layout/footer");
    }

    public function laporan_pegawai()
    {
        $data['title'] = "Laporan Absen Pegawai";
        $data['bc']    = "/Laporan Absen";
        $this->load->view("layout/header", $data);
        $this->load->view("Report/pegawai");
        $this->load->view("layout/footer");
    }

    public function profile()
    {
        $data['title'] = "Profile Pengguna";
        $data['bc']    = "/Profile";
        $data['user']  = $this->User_model
            ->find(['username' => $this->session->userdata("username")])
            ->result_array();
        $this->load->view("layout/header", $data);
        $this->load->view("User/profile");
        $this->load->view("layout/footer");
        $this->load->view("User/modal");
    }

}
