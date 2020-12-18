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

   public function download($id)
   {
      return $this->db->get_where($this->_pengajuan, ["ID_PENGAJUAN" => $id])->row()->URL_PENGAJUAN;
   }

   public function setAgreePengajuan($id)
   {
      $this->db->where('ID_PENGAJUAN', $id)->update($this->_pengajuan, array('STATUS_PENGAJUAN' => 'Disetujui'));
      $data = array(
         'ID_PENGAJUAN' => $id,
         'STATUS_TPENGAJUAN' => 'Sedang Diproses',
         'JUMLAH_REV' => 0
      );
      $this->db->insert($this->_tpengajuan, $data);
      return 'Pengajuan berhasil disetujui';
   }

   public function setRevisiPengajuan($namaBerkas)
   {
      $id = $this->input->post('idpengajuan');
      $data = array(
         'STATUS_PENGAJUAN' => 'Revisi',
         'URL_PENGAJUAN' => $namaBerkas
      ); 
      $this->db->where('ID_PENGAJUAN', $id)->update($this->_pengajuan, $data);
      return 'Revisi berhasil dikirim';
   }

}