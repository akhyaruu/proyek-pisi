<?php
class Login extends CI_Controller 
{
    public function index()
	{
		
		
		$this->load->view('themes/login/header');
		$this->load->view('login/index');
		$this->load->view('themes/login/footer');
   }
}
