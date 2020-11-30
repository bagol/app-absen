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
}
