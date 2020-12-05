<?php 
class UserModel extends CI_Model {
   
   public function getData() 
   {
      $x = array($this->db->get('pengajuan')->result_array(), $this->db->get('fakultas')->result_array()) ;
      
      return $x;
   }
   public function tambahPengajuan() 
   {
      $data = [
         "ID_USER" => $this->input->post('id', true),
         "ID_FAKULTAS" => $this->input->post('kategori', true),
         "NAMA_UKM" => $this->input->post('nama_ukm', true),
         "NAMA_ACARA" => $this->input->post('nama_kegiatan', true),
         "TGL_PENGAJUAN" => date("y-m-d"),
         "TGL_ACARA" => $this->input->post('datepicker', true),
         "STATUS_PENGAJUAN" => "Antri"
     ];
     $this->db->insert('pengajuan', $data);
   }

}