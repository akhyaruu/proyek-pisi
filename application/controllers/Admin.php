<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

   function __construct(){
		parent::__construct();
		if($this->session->userdata('STATUS') !== "login" && $this->session->userdata('LEVEL') !== "1"){
			redirect('login');
		}
	}
   
   var $active = 'active';

	public function index()
	{
      $this->load->view('themes/admin/sidebar');
      $this->load->view('themes/admin/topbar');
      $this->load->view('admin/index');
      $this->load->view('themes/admin/footer');
   }

   public function pengajuanbaru() 
   {
      $data = $this->active;
      $this->load->view('themes/admin/sidebar', compact('data'));
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