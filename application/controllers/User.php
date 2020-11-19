<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$data['mahasiswa'] = $this->UserModel->getData();
		$this->load->view('contoh_view', $data);
   }
   
   
}