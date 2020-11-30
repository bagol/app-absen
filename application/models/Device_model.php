<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Device_model extends CI_Model
{
    function new ($data) {
        return $this->db->insert("device", $data);
    }
    public function find($where = null)
    {
        if ($where == null) {
            return $this->db->get("device");
        } else {
            $this->db->where($where);
            return $this->db->get("device");
        }
    }
    public function edit($where, $data)
    {
        $this->db->where($where);
        return $this->db->update("device", $data);
    }
    public function delete($where)
    {
        $this->db->where($where);
        return $this->db->delete("device");
    }
}
