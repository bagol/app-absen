<?php defined('BASEPATH') or exit('No direct script access allowed');
class Presensi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Absen_model");
        $this->load->model("Shift_model");
    }

    public function index()
    {

    }

    public function absen($shift = null)
    {
        date_default_timezone_set('Asia/Jakarta');
        if ($shift != null) {
            $input  = file_get_contents('php://input');
            $input  = json_decode($input);
            $insert = [
                "id"      => "",
                "nik"     => $input->nik,
                "tanggal" => date("Y-m-d"),
                "jam"     => date("H:i:s"),
                "device"  => $input->device,
            ];
            $Shift      = $this->Shift_model->find(["id" => $shift])->result_array();
            $jam_masuk  = $Shift[0]['jam_masuk'];
            $jam_keluar = $Shift[0]['jam_keluar'];
            $nama_shift = $Shift[0]['shift'];
            if ($shift == "1") {
                $masuk = ['nik' => $input->nik, 'tanggal' => date("Y-m-d"), 'status' => "masuk"];
                if ($this->Absen_model->find($masuk)->num_rows() > 0) {
                    // ABSEN PULANG
                    // cek apakah sudah waktu pulang atau belum
                    if (strtotime($jam_keluar) < time()) {
                        // cek apakah user sudah absen pulang atau blm
                        $pulang = ['nik' => $absen[0], 'tanggal' => date("Y-m-d"), 'status' => "pulang"];
                        if ($this->Absen_model->find($pulang)->num_rows() > 0) {
                            // jika sudah absen pulang
                            echo json_encode(["massage" => "anda sudah absen pulang"]);
                        } else {
                            // insert absen pulang
                            $insert['keterangan'] = 'absen pulang';
                            $insert['status']     = 'pulang';
                            if ($this->Absen_model->create($insert)) {
                                echo json_encode(["message" => "absen pulang berhasil"]);
                                $this->pusher();
                            } else {
                                echo json_encode(["message" => "gagal absen"]);
                            }
                        }
                    } else {
                        echo json_encode(['message' => "blm waktunya pulang"]);
                    }
                } else {
                    // ABSEN MASUK
                    // cek apakah user telat atau tepat waktu
                    if (time() > strtotime(date("Y-m-d") . " " . $jam_masuk)) {
                        $insert['keteranagan'] = "telat";
                    } else {
                        $insert['keteranagan'] = 'tepat waktu';

                    }
                    $insert['status'] = 'telat';
                    // insert data absen masuk
                    if ($this->Absen_model->create($insert)) {
                        echo json_encode(["message" => "absen masuk berhasil"]);
                        $this->pusher();
                    } else {
                        echo json_encode(["message" => "gagal absen"]);
                    }

                }
            } elseif ($shift == "2") {
                $masuk = ['nik' => $input->nik, 'tanggal' => date("Y-m-d"), 'status' => "masuk"];
                if ($this->Absen_model->find($masuk)->num_rows() > 0) {
                    // ABSEN PULANG
                    // cek apakah sudah waktu pulang atau belum
                    if (strtotime($jam_keluar) < time()) {
                        // cek apakah user sudah absen pulang atau blm
                        $pulang = ['nik' => $absen[0], 'tanggal' => date("Y-m-d"), 'status' => "pulang"];
                        if ($this->Absen_model->find($pulang)->num_rows() > 0) {
                            // jika sudah absen pulang
                            echo json_encode(["massage" => "anda sudah absen pulang"]);
                        } else {
                            // insert absen pulang
                            $insert['keterangan'] = 'absen pulang';
                            $insert['status']     = 'pulang';
                            if ($this->Absen_model->create($insert)) {
                                echo json_encode(["message" => "absen pulang berhasil"]);
                                $this->pusher();
                            } else {
                                echo json_encode(["message" => "gagal absen"]);
                            }
                        }
                    } else {
                        echo json_encode(["message" => "blm waktunya pulang"]);
                    }
                } else {
                    // ABSEN MASUK
                    // cek apakah user telat atau tepat waktu
                    if (time() > strtotime(date("Y-m-d") . " " . $jam_masuk)) {
                        $insert['keteranagan'] = "telat";
                    } else {
                        $insert['keteranagan'] = 'tepat waktu';

                    }
                    $insert['status'] = 'masuk';
                    // insert data absen masuk
                    if ($this->Absen_model->create($insert)) {
                        echo json_encode(["message" => "absen masuk berhasil"]);
                        $this->pusher();
                    } else {
                        echo json_encode(["message" => "gagal absen"]);
                    }

                }
            }
        }
    }

    public function pusher()
    {
        require_once APPPATH . 'vendor\autoload.php';
        $options = array(
            'cluster' => 'ap1',
        );
        $pusher = new Pusher\Pusher(
            '089f7eee4e4c00a7142f',
            'fdbefd7371c8904e22fe',
            '1092781',
            $options
        );
        $data = ["status" => "update"];
        $pusher->trigger('absen', 'my-event', $data);
    }

}
