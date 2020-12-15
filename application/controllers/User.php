<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('STATUS') !== "login" && $this->session->userdata('LEVEL') !== "2"){
			redirect('login');
		}
	}

	public function index()
	{
		
		$config['base_url'] = 'http://localhost/proyekpisi/user/index';
		$config['total_rows'] = $this->UserModel->getCountData();
		$config['per_page'] = 5;

		$config['full_tag_open'] = '<nav><ul class="pagination">';
		$config['full_tag_close'] = ' </ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');
		
		$this->pagination->initialize($config);
		
		$data['start'] = $this->uri->segment(3);
		$data['x'] = $this->UserModel->getData($config['per_page'],$data['start']);
		//$data['fakultas'] = $this->UserModel->getData();
	
		$this->load->view('themes/user/header');
		$this->load->view('user/index', $data);
		$this->load->view('themes/user/footer');
	

}

   public function tambah(){

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 2500;
		$this->form_validation->set_rules('nama_ukm', 'Nama UKM', 'trim|required');
		$this->form_validation->set_rules('nama_kegiatan', 'Nama Acara', 'trim|required');
		$this->form_validation->set_rules('datepicker', 'Tanggal acara', 'trim|required');
	
		
		$this->upload->initialize($config);
	if ($this->form_validation->run() == false) {
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">gagal ditambahkan pastikan data terisi dengan benar</div>');
		redirect('user');	
	} else {
		if(!$this->upload->do_upload('proposal')) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">anda belum melampirkan proposal</div>');
			redirect('user');	
		} else {
			$namaBerkas = $this->upload->data("file_name");
			$this->UserModel->tambahPengajuan($namaBerkas);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">berhasil ditambahkan</div>');
			redirect('user');	
		}
	}
}
	
   public function hapus($id)
   {
		$this->UserModel->hapusDataPj($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">berhasil dihapus</div>');
		redirect('user');
   }

   public function getubah()
   {
	 
	 echo json_encode($this->UserModel->getPengajuanById($_POST['id']));
   }

   public function ubah()
   {
	 
	$config['upload_path']          = './uploads/';
	$config['allowed_types']        = 'pdf';
	$config['max_size']             = 2500;
	$this->form_validation->set_rules('nama_ukm', 'Nama UKM', 'trim|required');
	$this->form_validation->set_rules('nama_kegiatan', 'Nama Acara', 'trim|required');
	$this->form_validation->set_rules('datepicker', 'Tanggal acara', 'trim|required');

	
	$this->upload->initialize($config);
if ($this->form_validation->run() == false) {
	$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">gagal ditambahkan pastikan data terisi dengan benar</div>');
	redirect('user');	
} else {
	if(!$this->upload->do_upload('proposal')) {
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">anda belum melampirkan proposal</div>');
		redirect('user');	
	} else {
		$namaBerkas = $this->upload->data("file_name");
		$this->UserModel->ubahDataPengajuan($namaBerkas);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">berhasil diupdate</div>');
		redirect('user');	
	}
}
   }

  
   
}