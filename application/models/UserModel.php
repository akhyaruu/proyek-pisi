<?php 
class UserModel extends CI_Model {
   
   public function getData() 
   {
      return $this->db->get('fakultas')->result_array();
   }
   public function tambahPengajuan() 
   {
      $data = [
         "ID_USER" => $this->input->post('id', true),
         "NAMA_UKM" => $this->input->post('nama_ukm', true),
         "ID_FAKULTAS" => $this->input->post('kategori', true),
         "NAMA_ACARA" => $this->input->post('nama_kegiatan', true),
         "TGL_ACARA" => $this->input->post('datepicker', true),
     ];
     $this->db->insert('pengajuan', $data);
   }

}