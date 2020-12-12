<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {



	public function dashboard()
	{
      $this->load->view('themes/admin/sidebar');
      $this->load->view('themes/admin/topbar');
      $this->load->view('admin/index');
      $this->load->view('themes/admin/footer');
   }

   public function pengajuanbaru() 
   {
      $this->load->view('themes/admin/sidebar');
      $this->load->view('themes/admin/topbar');
      $this->load->view('admin/pengajuan_baru');
      $this->load->view('themes/admin/footer');
   }
   
   public function transaksipengajuan() 
   {
      $this->load->view('themes/admin/sidebar');
      $this->load->view('themes/admin/topbar');
      $this->load->view('admin/transaksi_pengajuan');
      $this->load->view('themes/admin/footer');
   }

   public function historitransaksi()
   {
      $this->load->view('themes/admin/sidebar');
      $this->load->view('themes/admin/topbar');
      $this->load->view('admin/histori_transaksi');
      $this->load->view('themes/admin/footer');
   }
   
   
}