<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view("Auth/login");
    }

    public function login()
    {
        $this->load->model("User_model");
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $user     = $this->User_model->find(['username' => $username]);

        if ($user->num_rows() > 0) {
            $data = $user->result_array();
            if (password_verify($password, $data[0]['password'])) {
                $data = [
                    "username" => $data[0]['username'],
                    "nik"      => $data[0]['nik'],
                    "gambar"   => $data[0]['gambar'],
                    "logged"   => true,
                    "level"    => $data[0]["level"],
                    "email"    => $data[0]['email'],
                    "no_telp"  => $data[0]['no_telp'],
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata("msg_scc", "Selamat Datang" . $data['username']);
                redirect("Auth/cekSession");
            } else {
                $this->session->set_flashdata("msg_err", "password salah !!!");
                redirect("Auth/index");
            }
        } else {
            $this->session->set_flashdata("msg_err", "username atau nik tidak terdaftar");
            redirect("Auth/index");
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata("msg_scc", "anda telah logout");
        redirect("Auth/cekSession");
    }

    public function device()
    {
        extract($this->input->post());
    }
    public function cekSession()
    {
        if ($this->session->userdata("level") === "admin") {
            redirect("Admin");
        } elseif ($this->session->userdata("level") === 'karyawan') {
            redirect("Karyawan");
        } else {
            redirect("Auth");
        }
    }
}
