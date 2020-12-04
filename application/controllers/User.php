<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$data['fakultas'] = $this->UserModel->getData();
		$this->load->view('themes/user/header');
		$this->load->view('user/index', $data);
		$this->load->view('themes/user/footer');
   }

   public function tambah(){
	$this->UserModel->tambahUser();
	$this->session->set_flashdata('flash', 'Ditambahkan');
	redirect('user');
   }
   
}