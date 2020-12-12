<?php
class Login extends CI_Controller 
{
    public function index()
	{
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('themes/login/header');
			$this->load->view('login/index');
			$this->load->view('themes/login/footer');	
		} else {
           
            $this->_login();
        }
		
   }
   private function _login()
    {
        $username = $this->input->post('username');
		$password = $this->input->post('password');
		
		
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('NIP',$username);
		$this->db->or_where('NIM',$username);
        $user = $this->db->get()->row_array();
		
        if ($user) {
            
                if ( $user['PASSWORD'] == $password) {
                    $data = [
						'NIP' => $user['NIP'],
						'NIM' => $user['NIM'],
                        'LEVEL' => $user['LEVEL']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['LEVEL'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">pasword salah!</div>');
                    redirect('login');
                }
            
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">username salah</div>');
            redirect('login');
        }
    }
}
