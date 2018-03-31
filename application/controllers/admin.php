<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_cek_login();
		$this->load->helper('currency_format_helper');
		 $this->cek = $this->session->userdata('jabatan');
		if($this->cek== "Ketua Tim Disiplin"){
			//$display = "display:Block;";
			 "display:Block;";
		}
		else{
			//$display = "display:none;";
			 "display:none;";
			 redirect(base_url().'dashboard');
		};
	}
	private function _cek_login()
	{
		if(!$this->session->userdata('useradmin')){
			redirect(base_url().'backend');
		}
	}

	public function index()
	{


		$data = array(
			'display'=>$this->cek,
			'jabatan'=>$this->session->userdata('jabatan'),
			'namaus' => $this->session->userdata('nama'),
			'data_admin' => $this->model->Getadmin(" order by kd_guru desc")->result_array(),
			'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
			'tot_pesan'=> $this->model->tot_pesan()->result_array(),
		);

		$this->load->view('admin/data_admin', $data);
	}

	function addadmin()
	{
		$data = array(
			'display'=>$this->cek,
			'namaus' => $this->session->userdata('nama'),
			'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
			'tot_pesan'=> $this->model->tot_pesan()->result_array(),
		);

		$this->load->view('admin/add_admin', $data);
	}

	function savedata(){

		$data = array(
			'kd_guru'=> '',
			'nik' => $this->input->post('nik'),
			'nama' => $this->input->post('nama'),
			'jabatan' => $this->input->post('jabatan'),
			'email' =>'',
			'password' =>md5($this->input->post('nik')),
			'sekolah' =>'SMK TELKOM PURWOKERTO',
			'status' =>'0',

			);
		//echo $data['jabatan'];
		$result = $this->model->Simpan('admin', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'admin');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'admin');
		}
	}
	function editakun(){
		$data = array(
			'display'=>$this->cek,
			'jabatan'=>$this->session->userdata('jabatan'),
			'namaus' => $this->session->userdata('nama'),
			'nama' => $this->session->userdata('nama'),
			'kd_guru' => $this->session->userdata('kd_guru'),
			'nik' => $this->session->userdata('nik'),
			'email' => $this->session->userdata('email'),
			'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
			'tot_pesan'=> $this->model->tot_pesan()->result_array(),
		);

		$this->load->view('admin/edit_akun', $data);
	}
	function kirim(){
		if($this->input->post('password2') <= 3){
			$data =array(
				'kd_guru' => $this->session->userdata('kd_guru'),
				'nik' => $this->input->post('nik'),
				'email' =>$this->input->post('email'),
				'nama' =>$this->input->post('nama'),
				'jabatan' =>$this->input->post('jabatan'),
				);
				echo "passkosong";
		}else{
			echo "pasada";
			$data =array(
				'kd_guru' => $this->session->userdata('kd_guru'),
				'nik' => $this->input->post('nik'),
				'password' =>md5($this->input->post('password2')),
				'email' =>$this->input->post('email'),
				'nama' =>$this->input->post('nama'),
				'jabatan' =>$this->input->post('jabatan'),
				);
		}

		$res = $this->model->updateakun($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>password BERHASIL diganti</strong></div>");
			$this->session->sess_destroy();
			header('location:'.base_url());
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>password GAGAL diganti</strong></div>");
			header('location:'.base_url().'gantips');
		}
	}
	function editadmin($kode = 0){

		$data_guru = $this->model->Getadmin(" and kd_guru = '$kode'")->result_array();
		$data = array(
			'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
			'tot_pesan'=> $this->model->tot_pesan()->result_array(),
			'display'=>$this->cek,
			'namaus' => $this->session->userdata('nama'),
			'kd_guru' => $data_guru[0]['kd_guru'],
			'nik' => $data_guru[0]['nik'],
			'nama' => $data_guru[0]['nama'],
			'jabatan' => $data_guru[0]['jabatan'],
				);
		$this->load->view('admin/edit_admin', $data);
	}
		function updateadmin(){

		$data = array(

			'kd_guru' => $this->input->post('kd_guru'),
			'nik'  =>$this->input->post('nik'),
			'nama' => $this->input->post('nama'),
			'jabatan' => $this->input->post('jabatan'),
			);

		$res = $this->model->Updateadmin($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'admin');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'admin');
		}
	}
	function hapusadmin($kode = 1){

		$result = $this->model->Hapus('admin', array('kd_guru' => $kode));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'admin');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'admin');
		}
	}



}


// Email: unggulzb@gmail.com
