<?php 

class AdminModel extends CI_Model {
   
   private $_pengajuan = "pengajuan";
   private $_tpengajuan = "transaksipengajuan";

   public function countPengajuan()
   {
      $pengajuanBaru = $this->db->from($this->_pengajuan)->count_all_results();
      $revisiPengajuan = $this->db->select_sum('JUMLAH_REV')->get('pengajuan')->row()->JUMLAH_REV;
      $data = array(
         "pengajuanbaru" => $pengajuanBaru,
         "revisipengajuan" => $revisiPengajuan,
      );

      return $data;
   }

   public function getAllPengajuan($limit, $start)
   {
      return $this->db->select('*')->from($this->_pengajuan)
         ->join('user', 'user.id_user = pengajuan.id_user')
         ->limit($limit, $start)
         ->order_by('pengajuan.id_pengajuan', 'DESC')
         ->get()->result();
   }

   public function getCountPengajuan()
   {
      return $this->db->select('*')->from($this->_pengajuan)
         ->join('user', 'user.id_user = pengajuan.id_user')
         ->get()->num_rows();
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
         'JUMLAH_REV_SPJ' => 0
      );
      $this->db->insert($this->_tpengajuan, $data);
      return 'Pengajuan berhasil disetujui';
   }

   public function setRevisiPengajuan($namaBerkas)
   {
      $id = $this->input->post('idpengajuan');
      $kegiatan = $this->db->get_where($this->_pengajuan, ["ID_PENGAJUAN" => $id])->row()->NAMA_ACARA;
      $totalRevisi = $this->db->get_where($this->_pengajuan, ["ID_PENGAJUAN" => $id])->row()->JUMLAH_REV;
      $data = array(
         'STATUS_PENGAJUAN' => 'Revisi',
         'URL_PENGAJUAN' => $namaBerkas,
         'JUMLAH_REV' => $totalRevisi + 1
      ); 
      $this->db->where('ID_PENGAJUAN', $id)->update($this->_pengajuan, $data);
      return 'Revisi kegiatan '.$kegiatan. ' berhasil dikirim';
   }

   public function setDeletePengajuan($id)
   {
      $namaPengaju = $this->db->get_where($this->_pengajuan, ["ID_PENGAJUAN" => $id])->row()->NAMA_UKM;
      $this->db->delete($this->_pengajuan, array("ID_PENGAJUAN" => $id));
      return 'Data pengajuan UKM '.$namaPengaju.' berhasil dihapus';
   }

   public function setFilterPengajuan($nilai)
   {
      return $this->db->select('*')->from($this->_pengajuan)
      ->join('user', 'user.id_user = pengajuan.id_user')
      ->where('STATUS_PENGAJUAN', $nilai)
      ->order_by('pengajuan.id_pengajuan', 'DESC')
      ->get()->result();
      
   }

   // ------------------------------------------------------- transaksi pengajuan

   public function getAllTransaksi($limit, $start)
   {
      return $this->db->select('*')->from($this->_pengajuan)
      ->join('transaksipengajuan', 'transaksipengajuan.ID_PENGAJUAN = pengajuan.ID_PENGAJUAN')
      ->limit($limit, $start)
      ->order_by('transaksipengajuan.ID_PENGAJUAN', 'DESC')
      ->get()->result();
   }

   public function getCountTransaksi()
   {
      return $this->db->select('*')->from($this->_pengajuan)
      ->join('transaksipengajuan', 'transaksipengajuan.ID_PENGAJUAN = pengajuan.ID_PENGAJUAN')
      ->get()->num_rows();
   }

   public function downloadSpj($id)
   {
      return $this->db->get_where($this->_tpengajuan, ["ID_TPENGAJUAN" => $id])->row()->URL_SPJ;
   }

   public function setRevisiSpj($namaBerkas)
   {
      $id = $this->input->post('idrevisi');
      $totalRevisi = $this->db->get_where($this->_tpengajuan, ["ID_TPENGAJUAN" => $id])->row()->JUMLAH_REV_SPJ;
      $data = array(
         'STATUS_TPENGAJUAN' => 'Revisi SPJ',
         'URL_SPJ' => $namaBerkas,
         'TGL_REV_SPJ' => date("Y-m-d"),
         'JUMLAH_REV_SPJ' => $totalRevisi + 1
      ); 
      $this->db->where('ID_TPENGAJUAN', $id)->update($this->_tpengajuan, $data);
      return 'Revisi berhasil dikirim';
   }

   public function setAgreeSpj($id)
   {
      $this->db->where('ID_TPENGAJUAN', $id)->update($this->_tpengajuan, array('STATUS_TPENGAJUAN' => 'Selesai'));
      return 'SPJ berhasil disetujui, kegiatan telah selesai';
   }

   // ------------------------------------------------------- histori transaksi

   public function getAllHistori($limit, $start)
   {
      return $this->db->select('*')->from($this->_tpengajuan)
      ->join('pengajuan', 'pengajuan.ID_PENGAJUAN = transaksipengajuan.ID_PENGAJUAN')
      ->join('user', 'user.ID_USER = pengajuan.ID_USER')
      ->limit($limit, $start)
      ->order_by('transaksipengajuan.ID_TPENGAJUAN', 'DESC')
      ->get()->result();
   }

   public function getCountHistori()
   {
      return $this->db->select('*')->from($this->_tpengajuan)
      ->join('pengajuan', 'pengajuan.ID_PENGAJUAN = transaksipengajuan.ID_PENGAJUAN')
      ->join('user', 'user.ID_USER = pengajuan.ID_USER')
      ->get()->num_rows();
   }

   public function downloadPengajuanTransaksi($id)
   {
      return $this->db->select('*')->from($this->_tpengajuan)
         ->join('pengajuan', 'pengajuan.ID_PENGAJUAN = transaksipengajuan.ID_PENGAJUAN')
         ->where('transaksipengajuan.ID_TPENGAJUAN', $id)->get()->row()->URL_PENGAJUAN;
   }

   public function downloadPengajuanSPJ($id)
   {
      return $this->db->get_where('transaksipengajuan', ["ID_TPENGAJUAN" => $id])->row()->URL_SPJ; 
   }

}