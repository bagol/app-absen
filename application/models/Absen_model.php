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
        return $this->db->query("select a.nik,a.username,count(b.id_presensi) as hadir from user a left join presensi b on a.nik=b.nik and status='masuk' and tanggal >= '$awal' and tanggal <= '$akhir' group by a.nik,a.username");
    }

    public function absenBulanan($bulan, $nik = null)
    {
        if ($nik == null) {
            return $this->db->query("select a.nik,a.username,count(b.id_presensi) as hadir from user a left join presensi b on a.nik=b.nik and status='masuk' and month(tanggal) = $bulan group by a.nik,a.username");
        }
    }

    public function detailAbsen($nik, $bulan)
    {
        return $this->db->query("select a.username,b.*,c.nama,a.nik from user a join presensi b on a.nik=b.nik and month(tanggal) = $bulan join device c on b.device=c.id where a.nik = $nik");
    }
}
