<?php 
class UserModel extends CI_Model {
   
   public function getData($limit, $start) 
   {
      $x = array($this->db->get('pengajuan',$limit, $start)->result_array(), $this->db->get('fakultas')->result_array()) ;
      
      return $x;
   }
   public function getCountData() 
   {
      return $this->db->get('pengajuan')->num_rows();
   }
   public function getPengajuanById($id)
   {
       return $this->db->get_where('pengajuan', ['ID_PENGAJUAN' => $id]);
   }
   public function tambahPengajuan($namaBerkas) 
   {
      $data = [
         "ID_USER" =>  $this->session->userdata('ID_USER'),
         "ID_FAKULTAS" => $this->input->post('kategori', true),
         "NAMA_UKM" => $this->input->post('nama_ukm', true),
         "NAMA_ACARA" => $this->input->post('nama_kegiatan', true),
         "TGL_PENGAJUAN" => date("y-m-d"),
         "TGL_ACARA" => $this->input->post('datepicker', true),
         "STATUS_PENGAJUAN" => "Antri",
         "URL_PENGAJUAN" => $namaBerkas
      ];
     $this->db->insert('pengajuan', $data);
   }
   public function hapusDataPj($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('pengajuan', ['ID_PENGAJUAN' => $id]);
    }
    public function ubahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nrp" => $this->input->post('nrp', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true)
        ];

        $this->db->where('ID_PENGAJUAN', $this->input->post('id'));
        $this->db->update('pengajuan', $data);
    }

}