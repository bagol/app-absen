<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Device extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Device_model");
        $this->load->library("form_validation");
        $this->load->model("Absen_model");
    }
    public function index()
    {
        $this->load->view("Device/show_qr");
    }

    public function create()
    {
        $validation = [
            [
                "field"  => "nama",
                "label"  => "nama",
                "rules"  => "required",
                "errors" => [
                    "required" => "Nama Perangkat tidak boleh kosong",
                ],
            ],
            [
                "field"  => "lokasi",
                "label"  => "lokasi",
                "rules"  => "required",
                "errors" => [
                    "required" => "Lokasi tidak boleh Kosong",
                ],
            ],
        ];

        $this->form_validation->set_rules($validation);
        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Perangkat";
            $data['bc']    = "/Tambah Perangkat";
            $this->load->view("layout/header", $data);
            $this->load->view("admin/tambah_perangkat");
            $this->load->view("layout/footer");
        } else {
            $data["id"] = '';
            $data       = $this->input->post();
            if ($this->Device_model->new($data)) {
                $this->session->set_flashdata("msg_scc", "data berhasil disimpan");
                redirect("Admin/kelola_device");
            } else {
                $this->session->set_flashdata("msg_err", "terjadi kesalahan :" . $this->db->error());
                redirect($_SERVER['HTTP_REFERER']);
            }

        }
    }

    public function update($id = null)
    {
        if ($id != null) {
            $data = $this->input->post();
            if ($this->Device_model->edit(['id' => $id], $data)) {
                $this->session->set_flashdata("msg_scc", "data berhasil diupdate");
            } else {
                $this->session->set_flashdata("msg_err", "terjadi kesalahan :" . $this->db->error());
            }
        } else {
            $this->session->set_flashdata("msg_err", "terjadi kesalahan: id tidak boleh kosong");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id = null)
    {
        if ($id != null) {
            $where = ["id" => $id];
            if ($this->Device_model->delete($where)) {
                $this->session->set_flashdata("msg_scc", "data berhasil dihapus");
            } else {
                $this->session->set_flashdata("msg_err", "terjadi kesalahan :" . $this->db->error());
            }
        } else {
            $this->session->set_flashdata("msg_err", "id tidak boleh kosong");
        }
        redirect("Admin/kelola_device");
    }

    public function getUniqCode()
    {
        $data = $this->Absen_model->last_id()->result_array();
        if ($data == []) {
            echo json_encode(['id' => date("Ym") . "01"]);
        } else {
            echo json_encode(['id' => date("Ym") . $data[0]['id_presensi']]);
        }
    }
}
