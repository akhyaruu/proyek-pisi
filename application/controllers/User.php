<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function index()
	{
		//pagination
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
		
		$this->upload->initialize($config);
		if(!$this->upload->do_upload('proposal')) {
			$this->session->set_flashdata('flash', 'Data Gagal Ditambahkan');
			redirect('user');	
		} else {
			$namaBerkas = $this->upload->data("file_name");
			$this->UserModel->tambahPengajuan($namaBerkas);
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('user');	
		}
	}
	
   public function hapus($id)
   {
		$this->UserModel->hapusDataPj($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('user');
   }
   
}