<?php
class santri_model extends CI_Model{

    public function tampil_data($table)
    {
        return $this->db->get($table);
    }

    public function ambil_id_santri($id)
    {
        $hasil =$this->db->where('id',$id)->get('santri');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        }else{
            return false;
        }
    }

    public function insert_data($data,$table)
    {
        $this->db->insert($table,$data);
    }
    
    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function hapus_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public $table = 'santri';
    public $id = 'id';


    public function get_by_id($id)
    {
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }

    public function get_by_tanggal_lahir($nama,$email)
    {
        $this->db->where('nama',$nama);
        $this->db->where('email',$email);
        return $this->db->get($this->table)->row();
    }
}