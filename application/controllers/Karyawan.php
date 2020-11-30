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
}
