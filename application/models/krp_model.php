<?php
class krp_model extends CI_Model
{
    public $table = 'krp';
    public $id      ='id_krp';


    // public function tampil_data()
    // {
    //     return $this->db->get($this->table);
    // }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
//     public function edit_data($where, $table)
//     {
//         return $this->db->get_where($table, $where);
//     }
    public function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    // public function get_by_santri($id)
    // {
    //     $this->db->where('id_santri', $id);
    //     return $this->db->get($this->table)->result();
    // }

    public function get_by_id($id)
    {
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }
}
