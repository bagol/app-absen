<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
    }
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['bc']    = "";
        $this->load->view("layout/header", $data);
        $this->load->view("admin/dashboard");
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
}
