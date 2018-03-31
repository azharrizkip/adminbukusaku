<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class siswa extends CI_Controller {

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
			'jabatan'=>$this->session->userdata('jabatan'),
			'namaus' => $this->session->userdata('nama'),
			'display' =>$this->cek,
			'data_siswa' => $this->model->Getsiswa("order by kd_sis desc")->result_array(),
		);

		$this->load->view('siswa/data_siswa', $data);
	}
	public function absensi()
	{

		$data = array(
			'tot_pesan'=> $this->model->tot_pesan()->result_array(),
			'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
			'jabatan'=>$this->session->userdata('jabatan'),
			'namaus' => $this->session->userdata('nama'),
			'display' =>$this->cek,
			'data_absensi' => $this->model->Getabsensi("order by kd_absensi desc")->result_array(),
		);

		$this->load->view('siswa/absensi', $data);
	}
public function cekin(){
	$data = array(
		'tot_pesan'=> $this->model->tot_pesan()->result_array(),
		'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
			'jabatan'=>$this->session->userdata('jabatan'),
			'namaus' => $this->session->userdata('nama'),
			'display' =>$this->cek,
			'data_siswa' => $this->model->Getcekin(" where status = '0' order by kd_sis asc ")->result_array(),
			'data_siswa2' => $this->model->Getcekin(" where status = '1' order by kd_sis asc ")->result_array(),
		);

		$this->load->view('siswa/tab_siswa', $data);
}
	function addsiswa()
	{
		$data = array(
			'tot_pesan'=> $this->model->tot_pesan()->result_array(),
			'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
			'display' =>$this->cek,
			'namaus' => $this->session->userdata('nama'),
		);

		$this->load->view('siswa/add_siswa', $data);
	}

	function savedata(){

		$kd_sis = '';
		$nama = $this->input->post('nama');
		$nis = $this->input->post('nis');
		$kelas = $this->input->post('kelas');
		$angkatan = $this->input->post('angkatan');
		$jurusan = $this->input->post('jurusan');
		$nomor = $this->input->post('nomor');
		$email =	'';
		$sekolah = "SMK TELKOM PURWOKERTO";
		$keljur = $kelas . " " . $jurusan.$nomor;

		$data = array(
			'kd_sis'=> $kd_sis,
			'nis' => $nis,
			'nama' => $nama,
			'email' =>$email,
			'password' =>md5($nis),
			'kelas' => $keljur,
			'jurusan' => $jurusan,
			'angkatan' => $angkatan,
			'sekolah' =>$sekolah,
			'tanggal' => date('Y-m-d'),
			'status' =>0,

			);

		$result = $this->model->Simpan('user', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'siswa');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'siswa');
		}
	}

	function editsiswa($kode = 0){
		$data_siswa = $this->model->Getsiswa("where kd_sis = '$kode'")->result_array();

		$kawal = $data_siswa[0]['kelas'];
		$kelas= substr($kawal,0,3);
		$tpoin = $data_siswa[0]['tpoin'];
		//unt kls 10

		if((($kelas == 'X R' )||($kelas == 'X T')) && ($tpoin > 0 && $tpoin <= 20 )){
			$tindakan= 'poin ini 1-20';
		}
		else if((($kelas == 'X R' )|| ($kelas == 'X T')) && ($tpoin > 20 && $tpoin <=30 )){
			$tindakan = 'poin ini 20-30';
		}
		else if((($kelas == 'X R' )|| ($kelas == 'X T')) && ($tpoin > 30  && $tpoin <=50 )){
			$tindakan = 'poin ini 31-50';
		}
		else if((($kelas == 'X R' )|| ($kelas == 'X T')) && ($tpoin > 50 && $tpoin <=70 )){
			$tindakan = 'poin ini 51-70';
		}
		else if((($kelas == 'X R' )|| ($kelas == 'X T')) && ($tpoin > 70 && $tpoin <=99 )){
			$tindakan = 'poin ini 71-99';
		}
		else if((($kelas == 'X R' )|| ($kelas == 'X T')) && $tpoin >= 100 ){
			$tindakan = 'poin ini 100';
		}
		//unt kls 11
		else if($kelas == 'XI ' && ($tpoin > 0 && $tpoin <= 30 )){
			$tindakan = 'poin ini 1-30 k11';
		}
		else if($kelas == 'XI ' && ($tpoin > 30 && $tpoin <=45 )){
			$tindakan = 'poin ini 31-45 k11';
		}
		else if($kelas == 'XI ' && ($tpoin > 45 && $tpoin <=75 )){
			$tindakan = 'poin ini 46-75 k11';
		}
		else if($kelas == 'XI ' && ($tpoin > 75 && $tpoin <=105 )){
			$tindakan = 'poin ini 75-105 k11';
		}
		else if($kelas == 'XI ' && ($tpoin > 105 && $tpoin <=149 )){
			$tindakan = 'poin ini 105-149 k11';
		}
		else if($kelas == 'XI ' && $tpoin >=150 ){
			$tindakan = 'poin ini 150 k11';
		}
		//unt kls 12
		else if($kelas == 'XII' && ($tpoin > 0 && $tpoin <= 40)){
			$tindakan = 'poin ini 1-40 k12';
		}
		else if($kelas == 'XII' && ($tpoin > 40 && $tpoin <= 40)){
			$tindakan = 'poin ini 40-60 k12';
		}
		else if($kelas == 'XII' && ($tpoin > 60 && $tpoin <= 100)){
			$tindakan = 'poin ini 60-100 k12';
		}
		else if($kelas == 'XII' && ($tpoin > 100 && $tpoin <= 140)){
			$tindakan = 'poin ini 100-140 k12';
		}
		else if($kelas == 'XII' && ($tpoin > 140 && $tpoin <= 199)){
			$tindakan = 'poin ini 140-199 k12';
		}
		else if($kelas == 'XII' && $tpoin >= 200){
			$tindakan = 'poin ini 200 k12';
		}
		else if($tpoin <= 0){
			$tindakan = 'Tidah mempunyai poin pelanggaran';
		}

		$nis = $data_siswa[0]['nis'];
		$data = array(
			'display' =>$this->cek,
			'namaus' => $this->session->userdata('nama'),
			'kd_sis' => $data_siswa[0]['kd_sis'],
			'nis' => $nis,
			'nama' => $data_siswa[0]['nama'],
			'kelas' => $data_siswa[0]['kelas'],
			'kelasa' => $data_siswa[0]['kelas'],
			'angkatan' => $data_siswa[0]['angkatan'],
			'email' 	=>$data_siswa[0]['email'],
			'jurusan' => $data_siswa[0]['jurusan'],
			'tpoin' =>$data_siswa[0]['tpoin'],
			'tindakan' => $tindakan,
			'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
			'tot_pesan'=> $this->model->tot_pesan()->result_array(),
			'siswa_kelas' => $this->model->kelaslama(" nis = $nis")->result_array(),
			'siswa_poin' => $this->model->getpoin(" where konfirmasi= 'BENAR' and nis = $nis")->result_array(),
			'siswa_rangking' => $this->model->peringatan(" where nis = $nis")->result_array(),
			);

		$this->load->view('siswa/edit_siswa', $data);
	
	}

	function hapusis($kode = 1){

		$result = $this->model->Hapus('user', array('kd_sis' => $kode));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'siswa');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'siswa');
		}
	}
	function reset($kode = 0){
		$cek = $this->model->Getsiswa(" where kd_sis = '$kode'")->result_array();
		$namasiswa = $cek[0]['nama'];
		$res = $this->model->update('user', array('password' => md5($cek[0]['nis']),'status' => '0',),  array('kd_sis' => $kode, ) );
		if($res == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Sandi $namasiswa BERHASIL diReset </strong></div>");
			header('location:'.base_url().'siswa');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Sandi $namasiswa GAGAL diReset</strong></div>");
			header('location:'.base_url().'siswa');
		}
	}

	function updatesiswa(){
		$jurusan = $this->input->post('jurusan');
		$nomor = $this->input->post('nomor');
		$kelas = $this->input->post('kelas');
		$kelasa = $this->input->post('kelasa');
		if($kelas == $kelasa){
			$keljur = $kelas;
		}
		else{
			$keljur = $kelas . " " . $jurusan.$nomor;
		}
		$data = array(
			'kd_sis' => $this->input->post('kd_sis'),
			'nis'  =>$this->input->post('nis'),
			'nama' => $this->input->post('nama'),
			'kelas' => $keljur,
			'angkatan' => $this->input->post('angkatan'),
			'jurusan' => $this->input->post('jurusan'),
			'aksi' => $this->input->post('tindakan')

			);

		$res = $this->model->update('user',$data, array('kd_sis' =>$data['kd_sis'] ,));
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'siswa');

		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'siswa');
		}
	}

}
