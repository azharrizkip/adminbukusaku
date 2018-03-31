<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();

	}
	function kelaslama($where=""){
		$data = $this->db->query("select * from historiuser where". $where);
		return $data;
	}

	function Getadmin($where=""){
		$data = $this->db->query("select * from admin where (jabatan != 'Dev')". $where);
		return $data;

	}
	function Getguru($where=""){
		$data = $this->db->query("select * from guru ". $where);
		return $data;

	}
	function Getabsensi($where=""){
		$data = $this->db->query("select * from absensi ". $where);
		return $data;

	}
	function GetUser($data) {
        $query = $this->db->get_where('admin', $data);
        return $query;
    }
		function Getpesan($where=""){
			$data = $this->db->query("select * from pesan ". $where);
			return $data;
		}

	function Getsiswa($where= "")
	{
		$data = $this->db->query('select * from user '.$where);
		return $data;
	}
	public function Getcekin($where= "")
	{
		$data = $this->db->query('select * from user  '.$where);
		return $data;
	}
	public function getpasal($where=" "){
		$data =$this->db->query('select * from pasal ' .$where);
		return $data;
	}

    public function getpoin($where=" "){
    $data = $this->db->query("select * from poin" .$where);
    return $data;
    }

    public function peringatan($where=" "){
    $data = $this->db->query("select * from peringatan" .$where);
    return $data;
    }
	//ambil data dari 2 tabel

	//batas crud data
	public function Simpan($table, $data){
		return $this->db->insert($table, $data);
	}

	public function Update($table,$data,$where){
		return $this->db->update($table,$data,$where);
	}

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}

	function Updatesiswa($data){
        $this->db->where('kd_sis',$data['kd_sis']);
        $this->db->update('user',$data);
    }
    function upsiswapoin($poin){
    	 $this->db->where('nis',$poin['nis']);
        $this->db->update('user',$poin);
    }
    function updatepoin($data){
    	$this->db->where('kd_sis',$data['kd_sis']);
    	$this->db->update('poin',$data);
    }
    function updateadmin($data){
    	$this->db->where('kd_guru', $data['kd_guru']);
    	$this->db->update('admin',$data);
    }
    function updateguru($data){
    	$this->db->where('kd_guru', $data['kd_guru']);
    	$this->db->update('guru',$data);
    }
    function updatepasal($data){
    	$this->db->where('no', $data['no']);
    	$this->db->update('pasal',$data);
    }
    function updatepas($data){
    	$this->db->where('nik',$data['nik']);
    	$this->db->update('admin',$data);
    }
		function updateakun($data){
    	$this->db->where('kd_guru',$data['kd_guru']);
    	$this->db->update('admin',$data);
    }
		function updatepoinsalah($data){
			$this->db->where('kd_sis',$data['kd_sis']);
    	$this->db->update('poin',$data);
		}
		//hapus
		function delpasal(){
			$data = $this->db->query("TRUNCATE pasal");
	    return $data;
		}
		function delsiswa(){
			$data = $this->db->query("TRUNCATE user");
	    return $data;
		}
    //total
		public function count_siswa() {
			return $this->db->count_all('siswa');
		}
		function tot_pesan(){
			$tgl = date('Y-m-d');
		return $this->db->query("select count(*) as tot_pesan from pesan  where tanggal_akhir > $tgl ");
	}
    function tot_pelanggar(){
		return $this->db->query("select count(*) as tot_pelanggar from poin  where konfirmasi = 'belum' ");
	}
	function tot_siswa(){
		return $this->db->query("select count(*) as tot_siswa from user where status = '0'");
	}
	function tot_pasal(){
		return $this->db->query("select count(*) as tot_pasal from pasal");
	}
	function tot_rangking(){
		return $this->db->query("select count(*) as tot_rangking from user where tpoin > 0 order by tpoin desc");
	}
	function totpoin($where=""){
		$data = $this->db->query('SELECT SUM(poin) AS total_poin FROM poin' .$where);
		return $data;
	}
	//batas crud data


     function Rekap_laporan($tanggal,$tanggal_akhir)
   		{
   			//echo $tanggal;
   			// echo "model";
   			//echo $tanggal_akhir;


      	$data=$this->db->query("SELECT * from poin where konfirmasi= 'benar' and tanggal between '".$tanggal."' and '".$tanggal_akhir."' order by tanggal asc");

        return $data;
        }

	//untuk  laporan
	public function view($data){
		$bulan= "'%".$data."%'";
		$where='where konfirmasi = "benar " and tanggal like '.$bulan;
		$data = $this->db->query('select * from poin '.$where);
		//$data = $this->db->query('select * from poin where konfirmasi = "benar"');
		return $data;


	}
	public function view_row($where =""){
		$this->db->limit(1);
		$data = $this->db->query('select * from poin  where konfirmasi = "benar"');
		return $data;
		return $this->db->getlaporan('poin')->result();
	}

}

/* End of file model.php */
/* Location: ./application/models/model.php */
