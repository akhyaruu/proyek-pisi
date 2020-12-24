<?php 
class UserModel extends CI_Model {
   
   public function getData($id,$limit, $start) 
   {
      
    $y = $this->db->select('*')->from('transaksipengajuan')->join('pengajuan', ' transaksipengajuan.ID_PENGAJUAN = pengajuan.ID_PENGAJUAN ' )->where(' pengajuan.ID_USER ',$id)->limit($limit, $start)->get()->result_array();
      $x = array($this->db->get_where('pengajuan', ['ID_USER' => $id],$limit,$start)->result_array(), $this->db->get('fakultas')->result_array(),$y) ;
      
      return $x;
   }
   public function getCountData($id) 
   {
      return $this->db->get_where('pengajuan', ['ID_USER' => $id])->num_rows();
   }
   public function getCountDataSpj($id) 
   {
      return $this->db->select('*')->from('transaksipengajuan')->join('pengajuan', ' transaksipengajuan.ID_PENGAJUAN = pengajuan.ID_PENGAJUAN ' )->where(' pengajuan.ID_USER ',$id)->get()->num_rows();
   }
   public function getPengajuanById($id)
   {
       return $this->db->get_where('pengajuan', ['ID_PENGAJUAN' => $id])->row_array();
   }
   public function getSpjById($id)
   {
       return $this->db->get_where('transaksipengajuan', ['ID_TPENGAJUAN' => $id])->row_array();
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
        $id = $this->input->post('id_rev');
        
        $data = [
            
            "URL_PENGAJUAN" => $namaBerkas,
            "TGL_REV_PENGAJUAN" => date("y-m-d"),
            "STATUS_PENGAJUAN" => "Menyerahkan Revisi"
            
            
        ];

        $this->db->where('ID_PENGAJUAN', $id);
        $this->db->update('pengajuan', $data);
    }
    public function uploadDataSpj($namaBerkas)
    {
        $id = $this->input->post('id_rev');
        
        $data = [
            
            "URL_SPJ" => $namaBerkas,
            "TGL_REV_SPJ" => date("y-m-d"),
            "STATUS_TPENGAJUAN" => "Menyerahkan SPJ"
            
            
        ];

        $this->db->where('ID_TPENGAJUAN', $id);
        $this->db->update('transaksipengajuan', $data);
    }
    public function ubahDataSpj($namaBerkas)
    {
        $id = $this->input->post('id_rev');
        
        $data = [
            
            "URL_SPJ" => $namaBerkas,
            "TGL_REV_SPJ" => date("y-m-d"),
            "STATUS_TPENGAJUAN" => "Menyerahkan SPJ"
            
            
        ];

        $this->db->where('ID_TPENGAJUAN', $id);
        $this->db->update('transaksipengajuan', $data);
    }

    public function downloadSpj($id)
    {
       return $this->db->get_where('transaksipengajuan', ["ID_TPENGAJUAN" => $id])->row()->URL_SPJ;
    }  
    public function downloadRevisiPengajuan($id)
    {
        return $this->db->get_where('pengajuan', ["ID_PENGAJUAN" => $id])->row()->URL_PENGAJUAN;
    }

}