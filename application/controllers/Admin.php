<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

   function __construct(){
      parent::__construct();
      $this->load->helper('download');
		if($this->session->userdata('STATUS') !== TRUE && $this->session->userdata('LEVEL') !== "1"){
			redirect('login');
		}
	}

	public function index()
	{
      $this->load->view('themes/admin/sidebar');
      $this->load->view('themes/admin/topbar');
      $this->load->view('admin/index');
      $this->load->view('themes/admin/footer');
   }

   // ------------------------------------ pengajuan baru

   public function pengajuanbaru() 
   {
      $data['pengajuan'] = $this->AdminModel->getAllPengajuan();
      // var_dump(empty($data->pengajuan));
      $this->load->view('themes/admin/sidebar');
      $this->load->view('themes/admin/topbar');
      $this->load->view('admin/pengajuan_baru', $data);
      $this->load->view('themes/admin/footer');
   }

   public function downloadPengajuan($id)
   {
      $namaFile = $this->AdminModel->download($id);
      force_download('uploads/'.$namaFile, NULL);
   }

   public function setujuiPengajuan($id)
   {
      $hasil = $this->AdminModel->setAgreePengajuan($id);
      $this->session->set_flashdata('pesan', $hasil);
      redirect('admin/pengajuanbaru');
   }
   
   // ------------------------------------ transaksi pengajuan

   public function transaksipengajuan() 
   {
      $this->load->view('themes/admin/sidebar');
      $this->load->view('themes/admin/topbar');
      $this->load->view('admin/transaksi_pengajuan');
      $this->load->view('themes/admin/footer');
   }

   // ------------------------------------ histori pengajuan

   public function historipengajuan()
   {
      $this->load->view('themes/admin/sidebar');
      $this->load->view('themes/admin/topbar');
      $this->load->view('admin/histori_transaksi');
      $this->load->view('themes/admin/footer');
   }
   
   
}