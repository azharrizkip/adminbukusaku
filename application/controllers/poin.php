<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class poin extends CI_Controller {

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
			'data_poin' => $this->model->getpoin(" where konfirmasi = 'belum' order by kd_sis desc")->result_array(),
		);

		$this->load->view('poin/data_poin', $data);
	}
	public function pbenar()
	{

		$data = array(
			'tot_pesan'=> $this->model->tot_pesan()->result_array(),
			'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
			'display'=>$this->cek,
			'jabatan'=>$this->session->userdata('jabatan'),
			'namaus' => $this->session->userdata('nama'),
			'data_poinbenar' => $this->model->getpoin(" where konfirmasi = 'benar' order by tanggal desc")->result_array(),
		);

		$this->load->view('poin/data_poinbenar', $data);
	}

	public function psalah()
	{

		$data = array(
			'tot_pesan'=> $this->model->tot_pesan()->result_array(),
			'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
			'display'=>$this->cek,
			'jabatan'=>$this->session->userdata('jabatan'),
			'namaus' => $this->session->userdata('nama'),
			'data_poinsalah' => $this->model->getpoin(" where konfirmasi = 'salah' order by tanggal desc")->result_array(),
		);

		$this->load->view('poin/data_poinsalah', $data);
	}

	function addpoin()
	{
		$data = array(
			'tot_pesan'=> $this->model->tot_pesan()->result_array(),
			'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
			'display' =>$this->cek,
			'namaus' => $this->session->userdata('nama'),
			'data_pasal' => $this->model->getpasal("order by no asc")->result_array(),
			'data_siswa' => $this->model->Getsiswa("order by kd_sis asc")->result_array(),
		);

		$this->load->view('poin/add_poin', $data);
	}

	function savedata(){
		$si = $this->input->post('nis');
		$po	= $this->input->post('pasal');
		$data_siswa = $this->model->Getsiswa(" where kd_sis = '$si' ")->result_array();
		$data_pasal = $this->model->getpasal(" where kode = '$po' ")->result_array();


		$data = array(
			'kd_sis'=> '',
			'nis' => $data_siswa[0]['nis'],
			'nama' => $data_siswa[0]['nama'],
			'kelas' => $data_siswa[0]['kelas'],
			'kode' => $data_pasal[0]['kode'],
			'jenis' => $data_pasal[0]['jenis'],
			'pelanggaran' => $data_pasal[0]['keterangan'],
			'poin' => $data_pasal[0]['poin'],
			'barang' => $this->input->post('barang'),
			'konfirmasi' => 'belum',
			'status_barang' => 'belum',
			'tanggal' => date('Y-m-d'),
			'pelapor' => $this->session->userdata('nama'),
			'pesan' => '',
			);

		$result = $this->model->Simpan('poin', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'poin');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'poin');
		}
	}

//update salah poin salah
function editpoinsalah($kode = 0){
	$data_poinsalah = $this->model->getpoin(" where kd_sis = '$kode' and konfirmasi = 'salah' ")->result_array();
	$data = array(
		'tot_pesan'=> $this->model->tot_pesan()->result_array(),
		'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
		'display'=>$this->cek,
		'namaus' => $this->session->userdata('nama'),
		'kd_sis' => $data_poinsalah[0]['kd_sis'],
		'nis' => $data_poinsalah[0]['nis'],
		'nama' => $data_poinsalah[0]['nama'],
		'kelas' => $data_poinsalah[0]['kelas'],
		'kodeps' => $data_poinsalah[0]['kode'],
		'keteranganps' => $data_poinsalah[0]['pelanggaran'],
		'data_pasal' => $this->model->getpasal("order by no desc")->result_array(),
	);
	$this->load->view('poin/edit_poinsalah', $data);
	}
function savepsalah(){

	$po	= $this->input->post('pasal');
	$data_pasal = $this->model->getpasal(" where kode = '$po' ")->result_array();

	$data = array(
		'kd_sis'=> $this->input->post('kd_sis'),
		'nis' => $this->input->post('nis'),
		'nama' => $this->input->post('nama'),
		'kelas' => $this->input->post('kelas'),
		'kode' => $data_pasal[0]['kode'],
		'jenis' => $data_pasal[0]['jenis'],
		'pelanggaran' => $data_pasal[0]['keterangan'],
		'poin' => $data_pasal[0]['poin'],
		'barang' => $this->input->post('barang'),
		'konfirmasi' => 'belum',
		'status_barang' => 'belum',
		'tanggal' => date('Y-m-d'),
		'pelapor' => $this->session->userdata('nama'),
		'pesan' => '',
		);
	$result = $this->model->update('poin', $data,array('kd_sis' => $data['kd_sis'] ,));
	if($result >= 0){
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update pelanggaran Poin BERHASIL dilakukan</strong></div>");
		header('location:'.base_url().'poin');
	}else{
		$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update pelanggaran Poin GAGAL di lakukan</strong></div>");
		header('location:'.base_url().'poin');
	}
}
//update biasa
	function editpoin($kode = 0){
		$data_poin = $this->model->getpoin(" where kd_sis = '$kode' ")->result_array();

		$data = array(
			'tot_pesan'=> $this->model->tot_pesan()->result_array(),
			'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
			'display'=>$this->cek,
			'namaus' => $this->session->userdata('nama'),
			'kd_sis' => $data_poin[0]['kd_sis'],
			'nis' => $data_poin[0]['nis'],
			'nama' => $data_poin[0]['nama'],
			'kelas' => $data_poin[0]['kelas'],
			'kode' => $data_poin[0]['kode'],
			'pelanggaran' => $data_poin[0]['pelanggaran'],
			'poin' => $data_poin[0]['poin'],
			'barang' => $data_poin[0]['barang'],
			'pelapor' => $data_poin[0]['pelapor'],
			'status_barang' => $data_poin[0]['status_barang'],
			'konfirmasi' => $data_poin[0]['konfirmasi'],
			'jenis' =>$data_poin[0]['jenis'],
			'bukti' =>$data_poin[0]['bukti'],
			);

		$this->load->view('poin/edit_poin', $data);
	}

	function hapuspoin($kode = 1){

		$result = $this->model->Hapus('poin', array('kd_sis' => $kode));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'poin');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'poin');
		}
	}

	function updatepoin(){
		$data = array(
			'kd_sis' => $this->input->post('kd_sis'),
			'nis'  =>$this->input->post('nis'),
			'nama' => $this->input->post('nama'),
			'kelas' => $this->input->post('kelas'),
			'kode' => $this->input->post('kode'),
			'pelanggaran' => $this->input->post('pelanggaran'),
			'poin' => $this->input->post('poin'),
			'barang' =>$this->input->post('barang'),
			'status_barang ' =>$this->input->post('status_barang'),
			'konfirmasi ' =>$this->input->post('konfirmasi'),
			'pesan' =>$this->input->post('pesan'),
			'jenis' =>$this->input->post('jenis'),
			);
		$nis = $data['nis'];
		$data_tpoin = $this->model->Getsiswa(" where nis = '$nis' ")->result_array();



		if($data['konfirmasi '] == 'benar'){


		if($data['jenis'] != 'PENGHARGAAN'){
			$tpoin = $data_tpoin[0]['tpoin'] + $this->input->post('poin');
		}
		else{
			$tpoin = $data_tpoin[0]['tpoin'] - $this->input->post('poin');
		}
		//untuk update tbl peringatan
		$kawal = $data_tpoin[0]['kelas'];
		$kelas= substr($kawal,0,3);


		//unt kls 10

		if((($kelas == 'X R' )||($kelas == 'X T')) && ($tpoin > 0 && $tpoin <= 20 )){
			$tindakan= 'poin ini 1-20';
			$id = 'X1';
		}
		else if((($kelas == 'X R' )|| ($kelas == 'X T')) && ($tpoin > 20 && $tpoin <=30 )){
			$tindakan = 'poin ini 20-30';
			$id = 'X2';
		}
		else if((($kelas == 'X R' )|| ($kelas == 'X T')) && ($tpoin > 30  && $tpoin <=50 )){
			$tindakan = 'poin ini 31-50';
			$id = 'X3';
		}
		else if((($kelas == 'X R' )|| ($kelas == 'X T')) && ($tpoin > 50 && $tpoin <=70 )){
			$tindakan = 'poin ini 51-70';
			$id = 'X4';
		}
		else if((($kelas == 'X R' )|| ($kelas == 'X T')) && ($tpoin > 70 && $tpoin <=99 )){
			$tindakan = 'poin ini 71-99';
			$id = 'X5';
		}
		else if((($kelas == 'X R' )|| ($kelas == 'X T')) && $tpoin >= 100 ){
			$tindakan = 'poin ini 100';
			$id = 'X6';
		}
		//unt kls 11
		else if($kelas == 'XI ' && ($tpoin > 0 && $tpoin <= 30 )){
			$tindakan = 'poin ini 1-30 k11';
			$id = 'XI1';
		}
		else if($kelas == 'XI ' && ($tpoin > 30 && $tpoin <=45 )){
			$tindakan = 'poin ini 31-45 k11';
			$id = 'XI2';
		}
		else if($kelas == 'XI ' && ($tpoin > 45 && $tpoin <=75 )){
			$tindakan = 'poin ini 46-75 k11';
			$id = 'XI3';
		}
		else if($kelas == 'XI ' && ($tpoin > 75 && $tpoin <=105 )){
			$tindakan = 'poin ini 75-105 k11';
			$id = 'XI4';
		}
		else if($kelas == 'XI ' && ($tpoin > 105 && $tpoin <=149 )){
			$tindakan = 'poin ini 105-149 k11';
			$id = 'XI5';
		}
		else if($kelas == 'XI ' && $tpoin >=150 ){
			$tindakan = 'poin ini 150 k11';
			$id = 'XI6';
		}
		//unt kls 12
		else if($kelas == 'XII' && ($tpoin >= 1 && $tpoin <= 40)){
			$tindakan = 'poin ini 1-40 k12';
			$id = 'XII1';
		}
		else if($kelas == 'XII' && ($tpoin > 40 && $tpoin <= 60)){
			$tindakan = 'poin ini 40-60 k12';
			$id = 'XII2';
		}
		else if($kelas == 'XII' && ($tpoin > 60 && $tpoin <= 100)){
			$tindakan = 'poin ini 60-100 k12';
			$id = 'XII3';
		}
		else if($kelas == 'XII' && ($tpoin > 100 && $tpoin <= 140)){
			$tindakan = 'poin ini 100-140 k12';
			$id = 'XII4';
		}
		else if($kelas == 'XII' && ($tpoin > 140 && $tpoin <= 199)){
			$tindakan = 'poin ini 140-199 k12';
			$id = 'XII5';
		}
		else if($kelas == 'XII' && $tpoin >= 200){
			$tindakan = 'poin ini 200 k12';
			$id = 'XII6';
		}
		else {
			$tindakan = 'anda tidak mempunyai poin';
			$id = '-';
		}


		$peringatan = array(
			'nis' =>$this->input->post('nis'),
			'nama' =>$this->input->post('nama'),
			'tpoin' =>$tpoin,
			'tanggal' => date("Y-m-d"),
			'id' => $id,
			'aksi' =>$tindakan,
			'timdis' =>$this->session->userdata('nama'),

			);
		$poin = array(
			'nis' => $this->input->post('nis'),
			'aksi' =>$id,
			'tpoin' =>$tpoin,
			);
		//untuk udate tabel user&poin
		$upoin =$this->model->upsiswapoin($poin);
		$res = $this->model->Updatepoin($data);
		//unt cek id peringatan.
		$iddb = $this->model->peringatan(" where nis = '$nis' order by kd_sis desc")->result_array();
		$cekid = $this->model->peringatan(" where nis = '$nis'");

		if ($cekid->num_rows() == 0) {

		$peri =$this->model->Simpan('peringatan',$peringatan);
		}
		else{

			if($id != $iddb[0]['id']){
			$peri =$this->model->Simpan('peringatan',$peringatan);

			}else{
				$panggil = array(
				'tpoin' =>$tpoin,
				'tanggal' => date("Y-m-d"),
				);
			$where = array(
				'id' => $iddb[0]['id'],
				);
			$peri = $this->model->Update('peringatan',$panggil,$where);
			}
		}
		}
		else{
			//jika konfrimasi salah
			$res = $this->model->Updatepoin($data);

		}

		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'poin');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'poin');
		}
	}

}
