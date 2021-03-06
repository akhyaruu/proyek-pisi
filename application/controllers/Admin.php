<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller {

   function __construct(){
      parent::__construct();
      $this->load->helper('download');
		if($this->session->userdata('STATUS') !== TRUE && $this->session->userdata('LEVEL') !== "1"){
         $this->session->sess_destroy();
			redirect('login');
		}else {
			$this->session->unset_userdata('STATUS');
		}
	}

	public function index()
	{
      $this->load->view('themes/admin/sidebar');
      $this->load->view('themes/admin/topbar');
      $this->load->view('admin/index', $this->AdminModel->countPengajuan());
      $this->load->view('themes/admin/footer');
   }

   public function graphpengajuan()
   {
      $hasil = $this->AdminModel->getGraph();
      echo json_encode($hasil);
   }

   // -------------------------------------------------------------- pengajuan baru

   public function pengajuanbaru() 
   {
      $config['base_url'] = 'http://localhost/proyekpisi/admin/pengajuanbaru';
      $config['total_rows'] = $this->AdminModel->getCountPengajuan();
      $config['per_page'] = 10;

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
      $data['pengajuan'] = $this->AdminModel->getAllPengajuan($config['per_page'], $data['start']);
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
      $config['upload_path']          = './uploads/';
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

   public function filterpengajuan()
   {
      $hasil = $this->AdminModel->setFilterPengajuan($this->input->post('nilai'));
      echo json_encode($hasil);
   }

   // -------------------------------------------------------------- transaksi pengajuan

   public function transaksipengajuan() 
   {
      $config['base_url'] = 'http://localhost/proyekpisi/admin/transaksipengajuan';
      $config['total_rows'] = $this->AdminModel->getCountTransaksi();
      $config['per_page'] = 10;

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
      $data['transaksi'] = $this->AdminModel->getAllTransaksi($config['per_page'], $data['start']);
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
      $config['upload_path']          = './uploads/';
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

   public function setujuiSpj($id)
   {
      $hasil = $this->AdminModel->setAgreeSpj($id);
      $this->session->set_flashdata('pesan', $hasil);
      redirect('admin/transaksipengajuan');
   }

   public function filtertransaksi()
   {
      $hasil = $this->AdminModel->setFilterTransaksi($this->input->post('nilai'));
      echo json_encode($hasil);
   }
   
   public function pencarianTransaksi()
   {
      $hasil = $this->AdminModel->searchTransaksi($this->input->post('nilai'));
      echo json_encode($hasil);
   }

   // -------------------------------------------------------------- histori pengajuan

   public function historipengajuan()
   {
      // $config['base_url'] = 'http://localhost/proyekpisi/admin/historipengajuan';
      // $config['total_rows'] = $this->AdminModel->getCountHistori();
      // $config['per_page'] = 10;

      // $config['full_tag_open'] = '<nav><ul class="pagination">';
		// $config['full_tag_close'] = ' </ul></nav>';

		// $config['first_link'] = 'First';
		// $config['first_tag_open'] = '<li class="page-item">';
		// $config['first_tag_close'] = '</li>';

		// $config['last_link'] = 'Last';
		// $config['last_tag_open'] = '<li class="page-item">';
		// $config['last_tag_close'] = '</li>';

		// $config['next_link'] = '&raquo';
		// $config['next_tag_open'] = '<li class="page-item">';
		// $config['next_tag_close'] = '</li>';

		// $config['prev_link'] = '&laquo';
		// $config['prev_tag_open'] = '<li class="page-item">';
		// $config['prev_tag_close'] = '</li>';

		// $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		// $config['cur_tag_close'] = '</a></li>';

		// $config['num_tag_open'] = '<li class="page-item">';
      // $config['num_tag_close'] = '</li>';
      
      // $config['attributes'] = array('class' => 'page-link');

      // $this->pagination->initialize($config);
		
      // $data['start'] = $this->uri->segment(3);
      $data['histori'] = $this->AdminModel->getAllHistori();
      $this->load->view('themes/admin/sidebar');
      $this->load->view('themes/admin/topbar');
      $this->load->view('admin/histori_transaksi', $data);
      $this->load->view('themes/admin/footer');
   }
   
   public function downloadPengajuanTransaksi($id)
   {
      $namaFile = $this->AdminModel->downloadPengajuanTransaksi($id);
      force_download('uploads/'.$namaFile, NULL);
   }
   public function downloadPengajuanSPJ($id)
   {
      $namaFile = $this->AdminModel->downloadPengajuanSPJ($id);
      force_download('uploads/'.$namaFile, NULL);
   }

   public function excel()
   {
      $spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No.');
		$sheet->setCellValue('B1', 'Nama Pengaju');
		$sheet->setCellValue('C1', 'NIM');
		$sheet->setCellValue('D1', 'Fakultas');
		$sheet->setCellValue('E1', 'No telp');
		$sheet->setCellValue('F1', 'UKM');
		$sheet->setCellValue('G1', 'Acara');
		$sheet->setCellValue('H1', 'Tgl Acara');
		$sheet->setCellValue('I1', 'Tgl Pengajuan');
		$sheet->setCellValue('J1', 'Tgl Pengajuan Disetujui');
		$sheet->setCellValue('K1', 'Tgl SPJ Disetujui');
      $sheet->setCellValue('L1', 'Total Revisi');
      
      $pengajuan = $this->AdminModel->getAll();
      $no = 1;
      $x = 2;
      foreach($pengajuan as $row)
      {
         $totalRevisi = $row->JUMLAH_REV_SPJ + $row->JUMLAH_REV;

         $sheet->setCellValue('A'.$x, $no++);
         $sheet->setCellValue('B'.$x, $row->NAMA_USER);
         $sheet->setCellValue('C'.$x, $row->NIM);
         $sheet->setCellValue('D'.$x, $row->NAMA_FAKULTAS);
         $sheet->setCellValue('E'.$x, $row->NO_TLP);
         $sheet->setCellValue('F'.$x, $row->NAMA_UKM);
         $sheet->setCellValue('G'.$x, $row->NAMA_ACARA);
         $sheet->setCellValue('H'.$x, $row->TGL_ACARA);
         $sheet->setCellValue('I'.$x, $row->TGL_PENGAJUAN);
         $sheet->setCellValue('J'.$x, $row->TGL_P_DISETUJUI);
         $sheet->setCellValue('K'.$x, $row->TGL_T_DISETUJUI);
         $sheet->setCellValue('L'.$x, $totalRevisi);
         $x++;
      }

      $writer = new Xlsx($spreadsheet);
      $filename = 'laporan-histori-pengajuan';
      
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
      header('Cache-Control: max-age=0');
	   $writer->save('php://output');
   }
}  