<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Absen_model extends CI_Model
{
    function new ($data) {
        return $this->db->insert('presensi', $data);
    }
    public function find($where = null)
    {
        if ($where == null) {
            return $this->db->get("presensi");
        } else {
            $this->db->where($where);
            return $this->db->get("presensi");
        }
    }
    public function edit($where, $data)
    {
        $this->db->where($where);
        return $this->db->update("presensi", $data);
    }
    public function delete($where)
    {
        $this->db->where($where);
        return $this->db->delete("presensi");
    }

    public function last_id()
    {
        return $this->db->query('SELECT * FROM `presensi` GROUP by id_presensi DESC limit 1');
    }

    public function perTanggal($awal, $akhir)
    {
        $this->db->where("tanggal >=", $awal);
        $this->db->where("tanggal <=", $akhir);
        return $this->db->get("presensi");
    }

    public function absenBulanan($bulan, $nik = null)
    {
        if ($nik == null) {
            return $this->db->query("SELECT count(*) as jumlah_hadir,b.username,a.nik FROM presensi a join user b on a.nik=b.nik where status = 'masuk' and month(tanggal) = $bulan GROUP BY a.nik");
        }
    }
}
