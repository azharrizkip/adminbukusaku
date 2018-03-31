<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gantips extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_cek_login();
	}
	private function _cek_login()
	{
		if(!$this->session->userdata('useradmin')){
			redirect(base_url().'backend');
		}
	}

	public function index(){
	$data = array(
		'nik' => $this->session->userdata('nik'),
		'namaus' =>$this->session->userdata('nama'),
		'nama' =>$this->session->userdata('nama'),
		'data_admin' => $this->model->Getadmin(" order by kd_guru desc")->result_array(),
		);
	$this->load->view('gantips/gantips',$data);

	}

	function kirim(){

		$data =array(
			'nik' => $this->session->userdata('nik'),
			'password' =>md5($this->input->post('password2')),
			'email' =>$this->input->post('email'),
			'status' => '1',
			'nama' =>$this->input->post('nama'),
			);
		$res = $this->model->updatepas($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>password BERHASIL diganti</strong></div>");
			$this->session->sess_destroy();
			header('location:'.base_url());
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>password GAGAL diganti</strong></div>");
			header('location:'.base_url().'gantips');
		}
	}

}
