<?php 
class UserModel extends CI_Model {
   
   public function getData() 
   {
      return $this->db->get('fakultas')->result_array();
   }
   public function tambahUser() 
   {
      $data = [
         "nama" => $this->input->post('nama', true),
         "nip" => $this->input->post('nip', true),
         "email" => $this->input->post('email', true),
         "jurusan" => $this->input->post('jurusan', true),
     ];
     $this->db->insert('mahasiswa', $data);
   }

}