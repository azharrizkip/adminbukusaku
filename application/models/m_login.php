
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {	

	public function __construct()
	{
		parent::__construct();
		
	}

	function proses_login(){
		
        //set variabel
		$nik = $this->input->post('nik');
		$password=($_POST['password']);
		
        //ambil database
		$query = $this->db->query("Select * from admin Where nik = '$nik' and '".md5($password)."' and not jabatan = 'Guru'");
		if ($query->num_rows() > 0){
			
			$row = $query->row();
			$kd_guru = $row->kd_guru;
			$password = $row->password;
			$nama = $row->nama;
			$nik  = $row->nik;
			$status=$row->status;
			
			if ($password==$password AND $status==1){
                //ambil nama
				$q="SELECT * FROM admin where kd_guru='".$kd_guru."'";
				$bidang=$this->db->query($q)->row();
				$c='";s:1:"';
				$sql="SELECT * FROM admin WHERE kd_guru LIKE '%id_user".$c.$kd_guru."%'";
				$cek=$this->db->query($sql)->num_rows();
				// if($cek==0){

					$this->session->set_userdata('id_user',$kd_guru);
					$this->session->set_userdata('nama',$nama);
					if($level==1){

						$this->session->set_userdata('usersap',$kd_guru, $nama);
						redirect(base_url()."usersap");
					}
					

					else{

						$this->session->set_userdata('enjinering',$kd_guru);
						redirect(base_url()."enjinering");
					}
					
				// }
				// else{

				// 	$info='<div class="warning-valid">NAMA PENGGUNA DAN PASSWORD ANDA SEDANG DI GUNAKAN</div>';
				// 	$this->session->set_userdata('info',$info);
				// 	redirect(base_url().'login');
				// }
			}
			
			else{
				$info='<div style="color:red">AKUN YANG ANDA GUNAKAN BELUM DI VERIFIKASI ADMIN</div>';
				$this->session->set_userdata('info',$info);

				redirect(base_url().'login');
			}
		}
		else{
			$info='<div style="color:red">PERIKSA KEMBALI NAMA PENGGUNA DAN PASSWORD ANDA!by admin</div>';
			$this->session->set_userdata('info',$info);

			redirect(base_url().'login');
		}       
	}

	
}

// /* End of file m_login.php */
// /* Location: ./application/models/m_login.php */