<?php 
class UserModel extends CI_Model {
   
   public function getData($id,$limit, $start) 
   {
      
    $y = $this->db->select('*')->from('pengajuan')->join(' transaksipengajuan ', ' transaksipengajuan.ID_PENGAJUAN = pengajuan.ID_PENGAJUAN ' )->where(' pengajuan.ID_USER ',$id)->limit($limit, $start)->get()->result_array();
      $x = array($y, $this->db->get('fakultas')->result_array()) ;
      
      return $x;
   }
   public function getCountData($id) 
   {
      return $this->db->get_where('pengajuan', ['ID_USER' => $id])->num_rows();
   }
   public function getPengajuanById($id)
   {
       return $this->db->get_where('pengajuan', ['ID_PENGAJUAN' => $id])->row_array();
   }
   public function tambahPengajuan($namaBerkas) 
   {
      $data = [
         "ID_USER" =>  $this->session->userdata('ID_USER'),
         "ID_FAKULTAS" => $this->input->post('kategori', true),
         "NAMA_UKM" => $this->input->post('nama_ukm', true),
         "NAMA_ACARA" => $this->input->post('nama_kegiatan', true),
         "TGL_PENGAJUAN" => date("y-m-d"),
         "TGL_REV_PENGAJUAN" => date("y-m-d"),
         "JUMLAH_REV" => 0,
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
    public function ubahDataPengajuan($namaBerkas)
    {
        $data = [
            "ID_FAKULTAS" => $this->input->post('kategori', true),
            "NAMA_UKM" => $this->input->post('nama_ukm', true),
            "NAMA_ACARA" => $this->input->post('nama_kegiatan', true),
            "TGL_ACARA" => $this->input->post('datepicker', true),
            "URL_PENGAJUAN" => $namaBerkas
            
        ];

        $this->db->where('ID_PENGAJUAN', $this->input->post('id'));
        $this->db->update('pengajuan', $data);
    }
    public function ubahDataRevisi($namaBerkas)
    {
        $data = [
            "TGL_REV_PENGAJUAN" => date("y-m-d"),
            "URL_PENGAJUAN" => $namaBerkas,
            "STATUS_PENGAJUAN" => "Menyerahkan Revisi"
            
            
        ];

        $this->db->where('ID_PENGAJUAN', $this->input->post('id_rev'));
        $this->db->update('pengajuan', $data);
    }

}