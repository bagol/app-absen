<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends CI_Model
{
    function new ($data) {
        return $this->db->insert('user', $data);
    }
    public function find($where = null)
    {
        if ($where == null) {
            return $this->db->get("user");
        } else {
            $this->db->where($where);
            return $this->db->get('user');
        }
    }
    public function edit($id, $data)
    {
        $this->db->where($id);
        return $this->db->update('user', $data);
    }
    public function delete($id)
    {
        $this->db->where($id);
        return $this->db->delete('user');
    }
}
