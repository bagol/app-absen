<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->library("form_validation");
    }
    public function index()
    {
        echo "ini adalah controller user";
    }

    public function create()
    {
        $validation = [
            [
                "field"  => "nik",
                "label"  => "nik",
                "rules"  => "required|is_unique[user.nik]",
                "errors" => [
                    "required"  => "nik tidak boleh kosong",
                    "is_unique" => "nik %s telah digunakan",
                ],
            ],
            [
                "field"  => "username",
                "label"  => "username",
                "rules"  => "required|is_unique[user.username]",
                "errors" => [
                    "required"  => "username tidak boleh kosong",
                    "is_unique" => "username %s telah digunakan",
                ],
            ],
            [
                "field"  => "email",
                "label"  => "email",
                "rules"  => "required|valid_email",
                "errors" => [
                    "required"    => "email tidak boleh kosong",
                    "valid_email" => "email tidak valid",
                ],
            ],
            [
                "field"  => "password",
                "label"  => "password",
                "rules"  => "required|min_length[6]",
                "errors" => [
                    "required"   => "password tidak boleh kosong",
                    "min_length" => "Pasword tidak boleh kurang dari 6 karakter",
                ],
            ],
            [
                "field"  => "no_telp",
                "label"  => "no_telp",
                "rules"  => "required",
                "errors" => [
                    "required" => "no_telp tidak boleh kosong",
                ],
            ],
            [
                "field"  => "level",
                "label"  => "level",
                "rules"  => "required",
                "errors" => [
                    "required" => "level tidak boleh kosong",
                ],
            ],

        ];
        extract($this->input->post());
        $this->form_validation->set_rules($validation);
        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Pengguna";
            $data['bc']    = "/Tambah Pengguna";
            $this->load->view("layout/header", $data);
            $this->load->view("admin/tambah_user");
            $this->load->view("layout/footer");
        } else {
            $data = [
                "nik"      => $nik,
                "username" => $username,
                "password" => password_hash($password, PASSWORD_BCRYPT, ['const' => 5]),
                "gambar"   => $this->upload("gambar"),
                "level"    => $level,
                "email"    => $email,
                "no_telp"  => $no_telp,
            ];

            if ($this->User_model->new($data)) {
                $this->session->set_flashdata("msg_scc", "berhasil menyimpan data");
                redirect('Admin/kelola_user');
            } else {
                $this->session->set_flashdata("msg_err", "terjadi kesalahan" . $this->db->error());
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function update($id = null)
    {
        if ($id != null) {
            $data['username'] = $this->input->post("username");
            $data['email']    = $this->input->post("email");
            $data['no_telp']  = $this->input->post("no_telp");
            $data['level']    = $this->input->post("level");
            if ($_FILES['gambar']['name'] != "") {
                $data['gambar'] = $this->upload('gambar');
            }
            if ($this->User_model->edit(['nik' => $id], $data)) {
                $this->session->set_flashdata("msg_scc", "Data berhasil diupdate");
            } else {
                $this->session->set_flashdata("msg_err", "terjadi kesalahan :" . $this->db->error());
            }
        } else {
            $this->session->set_flashdata("msg_err", "terjadi kesalahan : id tidak boleh kosong");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function show($id = null)
    {
        if ($id != null) {
            $query = $this->User_model->find(['nik' => $id]);
            if ($query->num_rows() > 0) {
                $data['user']  = $this->User_model->find(['nik' => $id])->result_array();
                $data['title'] = "Detail Pengguna";
                $data['bc']    = "/Detail Pengguna";
                $this->load->view("layout/header", $data);
                $this->load->view("admin/show_user");
                $this->load->view("layout/footer");
                $this->load->view("admin/modal_show_user");
            } else {
                $this->session->set_flashdata("msg_err", "terjadi kesalahan : id tidak ditemukan");
            }
        } else {
            $this->session->set_flashdata("msg_err", "terjadi kesalahan : id tidak boleh kosong");
        }
    }

    public function delete($id = null)
    {
        if ($id != null) {
            if ($this->User_model->delete(['nik' => $id])) {
                $this->session->set_flashdata("msg_scc", "berhasil menghapus Pengguna");
            } else {
                $this->session->set_flashdata("msg_err", "terjadi kesalahan : " . $this->db->error());
            }
        } else {
            $this->session->set_flashdata("msg_err", "id tidak boleh kosong");
        }

        redirect("admin/kelola_user");
    }

    public function resetPassword($nik = null)
    {
        if ($nik != null) {
            $email = $this->input->post("email");
            $newPw = explode("@", $email);
            $newPw = $newPw[0] . "123";
            $newPw = password_hash($newPw, PASSWORD_BCRYPT, ['const' => 12]);
            if ($this->User_model->edit(['nik' => $nik], ['password' => $newPw])) {
                $this->session->set_flashdata("msg_scc", "password Penggguna disetel ulang menggunakan email + 123");
            } else {
                $this->session->set_flashdata("msg_err", "terjadi kesalahan : " . $this->db->error());
            }

        } else {
            $this->session->set_flashdata("msg_err", "id tidak boleh kosong");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function upload($field)
    {
        $config['upload_path']   = './assets/images/profile/';
        $config['file_name']     = time();
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if (!empty($_FILES[$field]['name'])) {
            if ($this->upload->do_upload($field)) {
                $gbr = $this->upload->data();
                //convert image ke ukuran 100px
                $config['image_library']  = 'gd2';
                $config['source_image']   = './assets/images/profile/' . $gbr['file_name'];
                $config['create_thumb']   = false;
                $config['maintain_ratio'] = false;
                $config['quality']        = '50%';
                $config['width']          = 100;
                $config['height']         = 100;
                $config['new_image']      = './assets/images/thumbnail/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                return $gbr['file_name'];
            }
        } else {
            $this->session->set_flashdata("err", $this->upload->display_errors());
            return 'default.png';
        }
    }

    public function suntingProfile($id = null)
    {
        $this->session->set_userdata($this->input->post());
        $this->update($id);
    }

    public function updatePassword($nik = null)
    {
        if ($nik !== null) {
            $data = [
                'password' => password_hash($this->input->post("password"), PASSWORD_BCRYPT, ['const' => 12]),
            ];
            if ($this->User_model->edit($nik, $data)) {
                $this->session->set_flashdata("msg_scc", "Password berhasil diubah");
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata("msg_err", "terjadi kesalahan : nik tidak boleh kosong");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
