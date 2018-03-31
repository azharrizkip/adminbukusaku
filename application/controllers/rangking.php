<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rangking extends CI_Controller {

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
			'data_rangking' => $this->model->Getsiswa(" where tpoin > 0 order by tpoin desc")->result_array(),
		);

		$this->load->view('rangking/data_rangking', $data);
	}
	function editrangking2($kode = 0){
		$data_cek = $this->model->Getsiswa(" where kd_sis = '$kode' ")->result_array();
		$nis = $data_cek[0]['nis'];
		$data_rangking = $this->model->peringatan(" where nis = '$nis' ")->result_array();

		$data = array(
			'tot_pesan'=> $this->model->tot_pesan()->result_array(),
			'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
			'display'=>$this->cek,
			'jabatan'=>$this->session->userdata('jabatan'),
			'namaus' => $this->session->userdata('nama'),

			'data_rangking' => $this->model->peringatan(" where nis = '$nis' order by tanggal desc")->result_array(),

			);
		$this->load->view('rangking/rangking', $data);
	}


	function editrangking($kode = 0){
		$data_rangking = $this->model->Getsiswa(" where kd_sis = '$kode' ")->result_array();

		$data = array(
			'tot_pesan'=> $this->model->tot_pesan()->result_array(),
			'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
			'display'=>$this->cek,
			'namaus' => $this->session->userdata('nama'),
			'kd_sis' => $data_rangking[0]['kd_sis'],
			'nis' => $data_rangking[0]['nis'],
			'nama' => $data_rangking[0]['nama'],
			'kelas' => $data_rangking[0]['kelas'],
			'tpoin' => $data_rangking[0]['tpoin'],
			'tindakan' => $data_rangking[0]['tindakan'],

			);

		$this->load->view('rangking/edit_rangking', $data);
	}

	function updaterangking(){

		$panggil = array(
			'nis' =>$this->input->post('nis'),
			'nama' =>$this->input->post('nama'),
			'kelas' =>$this->input->post('kelas'),
			'tpoin' =>$this->input->post('poin'),
			'pesan' =>$this->input->post('pesan'),
			'guru' => $this->session->userdata('nama'),
			'tanggal' => date("d-m-Y"),
			);

		$data = array(
			'kd_sis' => $this->input->post('kd_sis'),
			'pesan' =>$this->input->post('pesan'),
			);
			$res = $this->model->update('user',$data, array('kd_sis' =>$data['kd_sis'] ,));
		
		if($res>=0){
			$panggilan = $this->model->Simpan('peringatan',$panggil);
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'rangking');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'rangking');
		}

	}
	function upstatus($kode = 0){

		$panggil = array(
			'status' =>'1',
			);
		$where = array(
			'kd_sis' => $kode,
			);
			$cek = $this->model->peringatan(" where kd_sis = $kode")->result_array();
			$am = $cek[0]['nis'];
			$ambil = $this->model->Getsiswa(" where nis = $am")->result_array();
		$panggilan = $this->model->Update('peringatan',$panggil,$where);

		if($panggilan>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'rangking/editrangking2/'.$ambil[0]['kd_sis']);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'rangking/editrangking2/'.$ambil[0]['kd_sis']);
		}
	}

}
