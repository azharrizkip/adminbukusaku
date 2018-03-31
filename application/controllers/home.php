<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	function index(){

		if ($this->session->userdata('useradmin') OR $this->session->userdata('useradmin')) {
			redirect(base_url()."dashboard");


		}
		else{

			$db='m_login';
			$sub_data['info']=$this->session->userdata('info');
			if ($this->input->post('login')) {
				$this->form_validation->set_rules('nik','NIK Pengguna','trim|required|max_length[20]|xss_clean');
				$this->form_validation->set_rules('password','Password','trim|required|max_length[20]|xss_clean');
				$this->form_validation->set_error_delimiters('<div class="warning-valid">','</div>');
				if($this->form_validation->run()==TRUE){
					$this->$db->proses_login();
				}
			}
			// $data['body']=$this->load->view('v_login', $sub_data, TRUE);

			$this->load->view('index', $sub_data);
			
			$this->session->unset_userdata('info');
		}
	}

	public function proseslog() {

		$data = array(
			'nik' => $this->input->post('nik', TRUE),
			'password' => md5($this->input->post('password', TRUE)),
			//'jabatan'  =>$this->input->post('jabatan',TRUE),
			);

		$hasil = $this->model->GetUser($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				// $sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['kd_guru'] = $sess->kd_guru;
				$sess_data['nik'] = $sess->nik;
				$sess_data['nama'] = $sess->nama;
				$sess_data['email'] = $sess->email;
				$sess_data['status'] = $sess->status;
				$sess_data['jabatan'] = $sess->jabatan;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('status')=='1') {
				$this->session->set_userdata('useradmin', $sess_data);
				redirect(base_url()."dashboard");
				echo $sess_data['email'];
				echo $sess_data['nama'];
				echo $sess_data['jabatan'];
				echo $sess_data['kd_guru'];
				echo $ses_data['nik'];
			}
			else{
				$this->session->set_userdata('useradmin', $sess_data);
				redirect(base_url()."gantips");
				//echo $sess_data['nik'];

			}
		}
		else {
			$info='<div style="color:red">PERIKSA KEMBALI NIK DAN PASSWORD ANDA!</div>';
			$this->session->set_userdata('info',$info);

			redirect(base_url());

		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
    // function register(){
    // 	$this->load->view('v_register');
    // }
}
