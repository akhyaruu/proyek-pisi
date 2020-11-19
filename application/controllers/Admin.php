<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function dashboard()
	{
      $this->load->view('themes/admin/header');
      $this->load->view('themes/admin/sidebar');
      $this->load->view('admin/index');
      $this->load->view('themes/admin/footer');
   }
   
   
}