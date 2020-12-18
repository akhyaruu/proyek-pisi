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

   // ------------------------------------------------------- pengajuan baru

   public function pengajuanbaru() 
   {
      $data['pengajuan'] = $this->AdminModel->getAllPengajuan();
      $this->load->view('themes/admin/sidebar');
      $this->load->view('themes/admin/topbar');
      $this->load->view('admin/pengajuan_baru', $data);
      $this->load->view('themes/admin/footer');
   }

   public function downloadPengajuan($id)
   {
      $namaFile = $this->AdminModel->downloadPengajuan($id);
      force_download('uploads/'.$namaFile, NULL);
   }

   public function setujuiPengajuan($id)
   {
      $hasil = $this->AdminModel->setAgreePengajuan($id);
      $this->session->set_flashdata('pesan', $hasil);
      redirect('admin/pengajuanbaru');
   }
   
   public function revisiPengajuan()
   {
      $config['upload_path']          = './uploads/revisi/';
		$config['allowed_types']        = 'pdf';
      $config['max_size']             = 2500;
      $this->upload->initialize($config);
      
      if(!$this->upload->do_upload('filerevisi')) {
			$this->session->set_flashdata('error', 'Revisi gagal dikirim! pastikan data berupa pdf');
			redirect('admin/pengajuanbaru');	
		} else {
			$namaBerkas = $this->upload->data("file_name");
			$hasil = $this->AdminModel->setRevisiPengajuan($namaBerkas);
         $this->session->set_flashdata('pesan', $hasil);
         redirect('admin/pengajuanbaru');
      }
   }

   public function hapusPengajuan($id)
   {
      $hasil = $this->AdminModel->setDeletePengajuan($id);
      $this->session->set_flashdata('pesan', $hasil);
      redirect('admin/pengajuanbaru');
   }

   // ------------------------------------------------------- transaksi pengajuan

   public function transaksipengajuan() 
   {
      $data['transaksi'] = $this->AdminModel->getAllTransaksi();
      $this->load->view('themes/admin/sidebar');
      $this->load->view('themes/admin/topbar');
      $this->load->view('admin/transaksi_pengajuan', $data);
      $this->load->view('themes/admin/footer');
   }

   public function downloadSpj($id)
   {
      $namaFile = $this->AdminModel->downloadSpj($id);
      force_download('uploads/'.$namaFile, NULL);
   }

   public function revisiSpj()
   {
      $config['upload_path']          = './uploads/revisi/';
		$config['allowed_types']        = 'pdf';
      $config['max_size']             = 2500;
      $this->upload->initialize($config);
      
      if(!$this->upload->do_upload('filerevisi')) {
			$this->session->set_flashdata('error', 'Revisi gagal dikirim! pastikan data berupa pdf');
			redirect('admin/transaksipengajuan');	
		} else {
			$namaBerkas = $this->upload->data("file_name");
			$hasil = $this->AdminModel->setRevisiSpj($namaBerkas);
         $this->session->set_flashdata('pesan', $hasil);
         redirect('admin/transaksipengajuan');
      }
   }

   // ------------------------------------------------------- histori pengajuan

   public function historipengajuan()
   {
      $this->load->view('themes/admin/sidebar');
      $this->load->view('themes/admin/topbar');
      $this->load->view('admin/histori_transaksi');
      $this->load->view('themes/admin/footer');
   }
   
   
}