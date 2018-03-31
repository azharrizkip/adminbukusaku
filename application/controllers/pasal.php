<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pasal extends CI_Controller {

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
			'tot_pesan'=> $this->model->tot_pesan()->result_array(),
			'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
			'display'=>$this->cek,
			'jabatan'=>$this->session->userdata('jabatan'),
			'namaus' => $this->session->userdata('nama'),
			'data_pasal' => $this->model->getpasal("order by no desc")->result_array(),
		);

		$this->load->view('pasal/data_pasal', $data);
	}

	function addpasal()
	{
		$data = array(
			'tot_pesan'=> $this->model->tot_pesan()->result_array(),
			'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
			'namaus' => $this->session->userdata('nama'),
			'display'=>$this->cek,

		);

		$this->load->view('pasal/add_pasal', $data);
	}

	function savedata(){

		$data = array(
			'no' => '',
			'jenis'=> $this->input->post('jenis'),
			'kategori' =>$this->input->post('kategori'),
			'kode' =>$this->input->post('kode'),
			'poin'=>$this->input->post('poin'),
			'keterangan'=>$this->input->post('keterangan'),
			);

		$result = $this->model->Simpan('pasal', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Tambah Pasal BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'pasal');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Tambah Pasal GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'pasal');
		}
	}

	function editpasal($kode = 0){
		$data_pasal = $this->model->getpasal("where no ='$kode'")->result_array();

		$data = array(
			'tot_pesan'=> $this->model->tot_pesan()->result_array(),
			'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
			'display'=>$this->cek,
			'no' => $data_pasal[0]['no'],
			'namaus' => $this->session->userdata('nama'),
			'jenis' => $data_pasal[0]['jenis'],
			'kategori' => $data_pasal[0]['kategori'],
			'kode' => $data_pasal[0]['kode'],
			'poin' => $data_pasal[0]['poin'],
			'keterangan' => $data_pasal[0]['keterangan'],

			);
		$this->load->view('pasal/edit_pasal', $data);
	}

	function hapuspasal($kode = 1){

		$result = $this->model->Hapus('pasal', array('no' => $kode));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus Pasal BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'pasal');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus Pasal GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'pasal');
		}
	}

	function updatepasal(){

		$data = array(
			'no' => $this->input->post('no'),
			'jenis'  =>$this->input->post('jenis'),
			'kategori' => $this->input->post('kategori'),
			'kode' => $this->input->post('kode'),
			'poin' => $this->input->post('poin'),
			'keterangan' => $this->input->post('keterangan'),
			);
			$res = $this->model->update('pasal', $data, array('no' => $data['no'], ));

		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update Pasal BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'pasal');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update Pasal GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'pasal');
		}
	}

}
