<?php defined('BASEPATH') or exit('No direct script access allowed');
class Shift_model extends CI_Model
{
    protected $_table = "shift";

    function new ($data) {
        return $this->db->insert($this->_table, $data);
    }

    public function find($where = null)
    {
        if ($where == null) {
            return $this->db->get($this->_table);
        } else {
            return $this->db->get_where($this->_table, $where);
        }
    }

    public function edit($where, $data)
    {
        $this->db->where($where);
        $this->db->update($this->_table, $data);
    }

    public function delete($where)
    {
        $this->db->where($where);
        return $this->db->delete($this->_table);
    }

}
