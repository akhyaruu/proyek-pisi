<?php 

class AdminModel extends CI_Model {
   
   private $_table = "pengajuan";

   public $pengajuan;
   public $id_user;
   public $nama_pengaju;
   public $nama_ukm;
   public $nama_acara;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["pengajuan" => $id])->row();
    }


}