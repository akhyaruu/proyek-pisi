<?php 

class AdminModel extends CI_Model {
   
   private $_pengajuan = "pengajuan";
   private $_tpengajuan = "transaksipengajuan";

   public $pengajuan;
   public $id_user;
   public $nama_pengaju;
   public $nama_ukm;
   public $nama_acara;

   public function getAllPengajuan()
   {
      return $this->db->select('*')->from($this->_pengajuan)
         ->join('user', 'user.id_user = pengajuan.id_user')
         ->order_by('pengajuan.id_pengajuan', 'DESC')
         ->get()->result();
   }

   public function downloadPengajuan($id)
   {
      return $this->db->get_where($this->_pengajuan, ["ID_PENGAJUAN" => $id])->row()->URL_PENGAJUAN;
   }

   public function setAgreePengajuan($id)
   {
      $this->db->where('ID_PENGAJUAN', $id)->update($this->_pengajuan, array('STATUS_PENGAJUAN' => 'Disetujui'));
      $data = array(
         'ID_PENGAJUAN' => $id,
         'STATUS_TPENGAJUAN' => 'Sedang Berjalan',
         'JUMLAH_REV' => 0
      );
      $this->db->insert($this->_tpengajuan, $data);
      return 'Pengajuan berhasil disetujui';
   }

   public function setRevisiPengajuan($namaBerkas)
   {
      $id = $this->input->post('idpengajuan');
      $totalRevisi = $this->db->get_where($this->_pengajuan, ["ID_PENGAJUAN" => $id])->row()->JUMLAH_REV;
      $data = array(
         'STATUS_PENGAJUAN' => 'Revisi',
         'URL_PENGAJUAN' => $namaBerkas,
         'JUMLAH_REV' => $totalRevisi + 1
      ); 
      $this->db->where('ID_PENGAJUAN', $id)->update($this->_pengajuan, $data);
      return 'Revisi berhasil dikirim';
   }

   public function setDeletePengajuan($id)
   {
      $namaPengaju = $this->db->get_where($this->_pengajuan, ["ID_PENGAJUAN" => $id])->row()->NAMA_UKM;
      $this->db->delete($this->_pengajuan, array("ID_PENGAJUAN" => $id));
      return 'Data pengajuan UKM '.$namaPengaju.' berhasil dihapus';
   }

   // ------------------------------------------------------- transaksi pengajuan

   public function getAllTransaksi()
   {
      return $this->db->select('*')->from($this->_pengajuan)
      ->join('transaksipengajuan', 'transaksipengajuan.ID_PENGAJUAN = pengajuan.ID_PENGAJUAN')
      ->order_by('transaksipengajuan.ID_PENGAJUAN', 'DESC')
      ->get()->result();
   }

   public function downloadSpj($id)
   {
      return $this->db->get_where($this->_tpengajuan, ["ID_TPENGAJUAN" => $id])->row()->URL_SPJ;
   }

   public function setRevisiSpj($namaBerkas)
   {
      $id = $this->input->post('idrevisi');
      // $totalRevisi = $this->db->get_where($this->_pengajuan, ["ID_TPENGAJUAN" => $id])->row()->JUMLAH_REV;
      $data = array(
         'STATUS_TPENGAJUAN' => 'Revisi SPJ',
         'URL_SPJ' => $namaBerkas,
      ); 
      $this->db->where('ID_TPENGAJUAN', $id)->update($this->_tpengajuan, $data);
      return 'Revisi berhasil dikirim';
   }

}