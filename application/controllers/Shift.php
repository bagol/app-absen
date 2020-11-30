<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Shift extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Shift_model");
    }
    public function show($id = null)
    {
        if ($id != null) {
            if ($this->Shift_model->find(['id' => $id])->num_rows() > 0) {
                $data['shift'] = $this->Shift_model->find(['id' => $id])->result_array();
                $data['title'] = "Detail Shift";
                $data['bc']    = "/Detail Shift";
                $this->load->view("layout/header", $data);
                $this->load->view("admin/show_shift");
                $this->load->view("layout/footer");
                $this->load->view("admin/modal_show_shift");
            }
        }
    }

    public function delete($id = null)
    {
        if ($id != null) {
            if ($this->Shift_model->delete(['id' => $id])) {
                $this->session->set_flashdata("msg_scc", "shift dihapus");
            } else {
                $this->session->set_flashdata("msg_err", "terjadi kesalahan : " . $this->db->error("code"));
            }
        } else {
            $this->session->set_flashdata("msg_err", "id tidak boleh kosong");
        }

        redirect("admin/kelola_shift");
    }

    public function update($id = null)
    {
        if ($id != null) {
            $data = $this->input->post();
            if (!$this->Shift_model->edit(['id' => $id], $data)) {
                $this->session->set_flashdata("msg_scc", "Data berhasil diupdate");
            } else {
                $this->session->set_flashdata("msg_err", "terjadi kesalahan " . $this->db->error()['message']);
            }
        } else {
            $this->session->set_flashdata("msg_err", "terjadi kesalahan : id tidak boleh kosong");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function create()
    {
        $data       = $this->input->post();
        $data['id'] = '';
        if ($this->Shift_model->new($data)) {
            $this->session->set_flashdata("msg_scc", "Data Berhasil ditambah");
            redirect("admin/kelola_shift");
        } else {
            $this->session->set_flashdata("msg_err", "terjadi kesalahan : " . $this->db->error());
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
