<?php 

class UserModel extends CI_Model {
   
   public function getData() 
   {
      return $this->db->get('mahasiswa')->result_array();
   }

}