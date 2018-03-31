<?php

class laporan extends CI_Controller {

    public function __construct(){
        parent::__construct();
         $this->load->library('tools');
        $this->load->helper(array('form','url'));
        $this->load->database();
        $this->load->model('model');
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    }

    public function index(){
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
          'tot_pesan'=> $this->model->tot_pesan()->result_array(),
          'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
        'display'=>$display,
        'jabatan'=> $this->session->userdata('jabatan'),
        'namaus' => $this->session->userdata('nama'),
        'print' => $this->model->view_row(" order by tanggal asc")->result_array(),
            );

        $this->load->view('laporan/preview',$data);

    }
    public function kelas(){
      $cek = $this->session->userdata('jabatan');
      if($cek== "Ketua Tim Disiplin"){
          $display = "display:Block;";
          //echo "display:Block;";
      }
      else{
          $display = "display:none;";
          //echo "display:none;";
      }
      $tgl = date('Y-m-d');
      $data = array(
        'tot_pesan'=> $this->model->tot_pesan()->result_array(),
        'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
      'display'=>$display,
      'jabatan'=> $this->session->userdata('jabatan'),
      'namaus' => $this->session->userdata('nama'),
      'data_kelas' => $this->model->Getsiswa(" where tanggal < '$tgl' order by kd_sis asc")->result_array(),
      'data_kelas2' => $this->model->Getsiswa(" where tanggal = '$tgl' order by kd_sis asc")->result_array(),
          );

      $this->load->view('laporan/data_kelas',$data);
    }
    function pindahk(){

      $chk = $_POST['chk'];
    	$chkcount = count($chk);
      for($i=0; $i<$chkcount; $i++)
     {
       $upd = $chk[$i];
       //untuk pindah data_kelas
       $cek = $this->model->Getsiswa("where kd_sis = '$upd'")->result_array();
       $datasis = array(
         //'kd_sis'=> $cek[0]['kd_sis'],
         'tanggal' => date('Y-m-d'),
        'nis' => $cek[0]['nis'],
        'nama' => $cek[0]['nama'],
        'email' =>$cek[0]['email'],
        'password' =>$cek[0]['password'],
        'kelas' => $cek[0]['kelas'],
        'jurusan' => $cek[0]['jurusan'],
        'angkatan' => $cek[0]['angkatan'],
        'sekolah' =>$cek[0]['sekolah'],
        'tpoin' =>$cek[0]['tpoin'],
        'aksi' => $cek[0]['aksi'],
        'status' =>$cek[0]['status'],
          );
          $result = $this->model->Simpan('historiuser', $datasis);
          //up kelas
       $data  = array(
         'kd_sis' => $upd,
         'kelas' => $this->input->post('kelaspilih') ,
         'jurusan' => $this->input->post('jurusanpilih'),
         'tanggal' => date('Y-m-d'),
        );
        $res = $this->model->Updatesiswa($data);


     }

  		if($res>=0){
  			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update kelas BERHASIL di lakukan</strong></div>");
  			header('location:'.base_url().'laporan/kelas');

  		}else{
  			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update kelas GAGAL di lakukan</strong></div>");
  			header('location:'.base_url().'laporan/kelas');
  		}
    }

    public function exportfile(){
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
        'tot_pesan'=> $this->model->tot_pesan()->result_array(),
        'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
      'display'=>$display,
      'jabatan'=> $this->session->userdata('jabatan'),
      'namaus' => $this->session->userdata('nama'),
      'data_siswa' => $this->model->Getsiswa("order by kd_sis asc")->result_array(),
      'data_laporan' => $this->model->getpoin(" where konfirmasi = 'benar' order by tanggal asc")->result_array(),
      'data_poin' => $this->model->getpoin(" where konfirmasi = 'benar' order by tanggal asc")->result_array(),
      'print' => $this->model->view_row(" order by tanggal asc")->result_array(),
          );
      $this->load->view('laporan/export',$data);
    }


    function uplod(){
  $fileName = time().$_FILES['file']['name'];
$tbl=$this->input->post('importbl');
$config['upload_path'] = './assets/'; //buat folder dengan nama assets di root folder
$config['file_name'] = $fileName;
$config['allowed_types'] = 'xls|xlsx|csv';
$config['max_size'] = 10000;

$this->load->library('upload');
$this->upload->initialize($config);

if(! $this->upload->do_upload('file') )
$this->upload->display_errors();

$media = $this->upload->data('file');
$inputFileName = './assets/'.$media['file_name'];

try {
     $inputFileType = IOFactory::identify($inputFileName);
     $objReader = IOFactory::createReader($inputFileType);
     $objPHPExcel = $objReader->load($inputFileName);
 } catch(Exception $e) {
     die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
 }

 $sheet = $objPHPExcel->getSheet(0);
 $highestRow = $sheet->getHighestRow();
 $highestColumn = $sheet->getHighestColumn();


 for ($row = 2; $row<= $highestRow; $row++){                  //  Read a row of data into an array
     $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                     NULL,
                                     TRUE,
                                   FALSE);
     //      echo $rowData;
     //Sesuaikan sama nama kolom tabel di database
     if($tbl == "pasal"){
          $data = array(
         "jenis"=> $rowData[0][0],
         "kategori"=> $rowData[0][1],
         "kode"=> $rowData[0][2],
         "poin"=> $rowData[0][3],
         "keterangan"=> $rowData[0][4],
     );
         }
     else if ($tbl == "user"){
             $data = array(
                'tanggal' => date('Y-m-d'),
                 'nis' =>$rowData[0][1],
                 'nama'=>$rowData[0][2],
                 'email'=> $rowData[0][8],
                 'password'=>md5($rowData[0][1]),
                 'kelas'=>$rowData[0][3],
                 'jurusan'=>$rowData[0][4],
                 'angkatan'=>$rowData[0][5],
                 'sekolah'=> "SMK TELKOM PURWOKERTO",
                 'tpoin' => $rowData[0][6],
                 'aksi' => $rowData[0][7],
                 'status'=>$rowData[0][9],

                  );
     }else{


     }

     //sesuaikan nama dengan nama tabel
     $insert = $this->db->insert($tbl,$data);
     if($insert == 1){
       $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Upload data BERHASIL dilakukan</strong></div>");
       header('location:'.base_url().'laporan/kelas');
     }else{
       $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Upload data GAGAL di lakukan</strong></div>");
       header('location:'.base_url().'laporan/kelas');
     }
     //delete_files($media['file_path']);
     }
       //redirect('laporan/');

            }


}
