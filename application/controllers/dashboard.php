<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_cek_login();
	}
	private function _cek_login()
	{
		header('Expires: Mon, 1 Jul 1998 01:00:00 GMT');
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0', FALSE);
		header('Pragma: no-cache');
		header( "Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT" );

		if(!$this->session->userdata('useradmin')){
			redirect(base_url());
			//echo "kie login";
		}else {
			//echo "kie masuk Dashboard";
		}
	}

	public function index()
	{

		$tsiswa = $this->model->tot_siswa()->result_array();
		$tpelanggaran = $this->model->tot_pelanggar()->result_array();
		$tpasal = $this->model->tot_pasal()->result_array();
		$trangking =$this->model->tot_rangking()->result_array();
		$cek = $this->session->userdata('jabatan');
		if($cek== "Ketua Tim Disiplin"){
			$display = "display:Block;";
			//echo "display:Block;";
		}
		else{
			$display = "display:none;";
			//echo "display:none;";
		}
		$data = array(
			'display' =>$display,
			'tot_siswa'=> $tsiswa[0]['tot_siswa'],
			'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
			'tot_pesan'=> $this->model->tot_pesan()->result_array(),
			'tot_pasal'=> $tpasal[0]['tot_pasal'],
			'tot_rangking' =>$trangking[0]['tot_rangking'],
			'namaus' => $this->session->userdata('nama'),
			'jabatan' => $this->session->userdata('jabatan'),
		);


		$this->load->view('dashboard', $data);
	}
	public function pesan(){
		$cek = $this->session->userdata('jabatan');
		if($cek== "Ketua Tim Disiplin"){
			$display = "display:Block;";
			//echo "display:Block;";
		}
		else{
			$display = "display:none;";
			//echo "display:none;";
		}
		$data = array(
			'display' =>$display,
			'data_siswa' => $this->model->Getsiswa("order by kd_sis desc")->result_array(),
			'data_pesan' => $this->model->Getpesan(" left join(user) on user.nis=pesan.nis order by id asc")->result_array(),
			'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
			'tot_pesan'=> $this->model->tot_pesan()->result_array(),
			'namaus' => $this->session->userdata('nama'),
			'jabatan' => $this->session->userdata('jabatan'),
		);


		$this->load->view('pesan/pesan', $data);
	}

	function pesanumum(){
		$data  = array(
			'nis' => '255255255255' ,
			'jenis' => 'Broadcast',
			'tentang' => $this->input->post('tentang'),
			'isi' => $this->input->post('isi'),
			'tanggal_awal' => date('Y-m-d'),
			'tanggal_akhir' => $this->input->post('tanggal_akhir'),
			'UserName' => $this->session->userdata('nama'),
		 );
		 $out = $data['jenis'];
		$result = $this->model->Simpan('pesan', $data);
 		if($result == 1){
 			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Kirim Pesan $out BERHASIL dilakukan</strong></div>");
 			header('location:'.base_url().'dashboard/pesan');
 		}else{
 			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Kirim Pesan $out GAGAL di lakukan</strong></div>");
 			header('location:'.base_url().'dashboard/pesan');
 		}
	}


	function pesankhusus(){
		$data  = array(
			'nis' => $this->input->post('nis') ,
			'jenis' => 'khusus',
			'tentang' => $this->input->post('tentang'),
			'isi' => $this->input->post('isi'),
			'tanggal_awal' => date('Y-m-d'),
			'tanggal_akhir' => $this->input->post('tanggal_akhir'),
			'UserName' => $this->session->userdata('nama'),
		 );
		  $out = $data['jenis'];
		 $result = $this->model->Simpan('pesan', $data);
 		if($result == 1){
 			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Kirim Pesan $out BERHASIL dilakukan</strong></div>");
 			header('location:'.base_url().'dashboard/pesan');
 		}else{
 			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Kirim Pesan $out GAGAL di lakukan</strong></div>");
 			header('location:'.base_url().'dashboard/pesan');
 		}
	}
	function editpesan($kode= 0){
		$data_pesan = $this->model->Getpesan(" where id= $kode")->result_array();
		$cek = $this->session->userdata('jabatan');
		if($cek== "Ketua Tim Disiplin"){
			$display = "display:Block;";
			//echo "display:Block;";
		}
		else{
			$display = "display:none;";
			//echo "display:none;";
		}

		if($data_pesan[0]['jenis'] == 'umum'){
			$data = array(
				'display' =>$display,
				'namaus' => $this->session->userdata('nama'),
				'jabatan' => $this->session->userdata('jabatan'),
				'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
				'tot_pesan'=> $this->model->tot_pesan()->result_array(),
				'id' => $kode,
				'nis' => $data_pesan[0]['nis'],
				'jenis' => $data_pesan[0]['jenis'],
				'tentang' => $data_pesan[0]['tentang'],
				'isi' => $data_pesan[0]['isi'],
				'tanggal_akhir' => $data_pesan[0]['tanggal_akhir'],
				);
			$this->load->view('pesan/pesan_umum', $data);
		}else{
			$data_nama = $this->model->Getpesan(" join(user) on pesan.nis = user.nis where id= $kode")->result_array();
			$data = array(
				'display' =>$display,
				'namaus' => $this->session->userdata('nama'),
				'jabatan' => $this->session->userdata('jabatan'),
				'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
				'tot_pesan'=> $this->model->tot_pesan()->result_array(),
				'id' => $kode,
				'nis' => $data_pesan[0]['nis'],
				'nama' => $data_nama[0]['nama'],
				'jenis' => $data_pesan[0]['jenis'],
				'tentang' => $data_pesan[0]['tentang'],
				'isi' => $data_pesan[0]['isi'],
				'tanggal_akhir' => $data_pesan[0]['tanggal_akhir'],
				'data_siswa' => $this->model->Getsiswa("order by kd_sis desc")->result_array(),
				);
			$this->load->view('pesan/pesan_khusus', $data);
		}

	}
	function updatepesan(){
		$data  = array(
			'id' =>  $this->input->post('id') ,
			'nis' => $this->input->post('nis') ,
			'tentang' => $this->input->post('tentang'),
			'isi' => $this->input->post('isi'),
			'tanggal_awal' => date('Y-m-d'),
			'tanggal_akhir' => $this->input->post('tanggal_akhir'),
			'UserName' => $this->session->userdata('nama'),
		 );
		 $res = $this->model->Update('pesan', $data ,array('id' => $data['id']));
 		if($res>=0){
 			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update pesan BERHASIL di lakukan</strong></div>");
 			header('location:'.base_url().'dashboard/pesan');
 		}else{
 			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update pesan GAGAL di lakukan</strong></div>");
 			header('location:'.base_url().'dashboard/pesan');
 		}
	}
	function hapuspesan($kode=0){

				$result = $this->model->Hapus('pesan', array('id' => $kode));
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus pesan BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'dashboard/pesan');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus pesan GAGAL di lakukan</strong></div>");
					header('location:'.base_url().'dashboard/pesan');
				}
	}

}

// Email: unggulzb@gmail.com
