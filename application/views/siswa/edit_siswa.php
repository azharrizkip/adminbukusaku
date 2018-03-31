<!DOCTYPE html>
<html>
<head>
  <link href="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <?php $this->load->view('inc/head'); ?>

</head>
<body class="skin-blue">
  <!-- wrapper di bawah footer -->
  <div class="wrapper">

    <?php $this->load->view('inc/head2'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <?php $this->load->view('inc/sidebar'); ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <b>EDIT DATA SISWA</b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-6">

            <!-- Chat box -->
            <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">FORM EDIT SISWA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>siswa/updatesiswa" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">NIS</label>
                      <input type="hidden" class="form-control" value="<?php echo $kelasa; ?>" id="" name="kelasa" placeholder="Isika" >

                        <input type="hidden" class="form-control" value="<?php echo $kd_sis; ?>" id="" name="kd_sis" placeholder="Isika" >
                        <input type="text" class="form-control" value="<?php echo $nis; ?>" id="" name="nis" placeholder="" >
                    </div>

                    <div class="form-group">
                      <label for="">Nama</label>
                        <input type="text" class="form-control" value="<?php echo $nama; ?>" id="" name="nama" placeholder="" >
                    </div>

                      <div class="form-group">
                      <label for="">KELAS</label>
                        <select name="kelas" class="form-control" >
                          <?php
                            if($kd_sis> 0) { ?>
                              <option value="<?php echo $kelas; ?>"><?php echo $kelas; ?></option>
                          <?php } ?>
                          <option value="X">X</option>
                          <option value="XI">XI</option>
                          <option value="XII">XII</option>
                        </select>
                    </div>
                  </div>
                   <div class="col-lg-6">
                  <div class="col-lg-6">
                    <div class="form-group">
                     <label for="">JURUSAN</label>
                        <select name="jurusan" class="form-control" >
                        <?php
                            if($kd_sis> 0) { ?>
                              <option value="<?php echo $jurusan ?>"><?php echo $jurusan ?></option>
                            <?php } ?>
                            <option value="RPL">RPL</option>
                            <option value="TJA">TJA</option>
                            <option value="TKJ">TKJ</option>

                        </select>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                     <label for=""></label>
                        <select name="nomor" class="form-control" >

                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">ANGKATAN</label>
                        <input type="text" class="form-control" value="<?php echo $angkatan; ?>" id="" name="angkatan" placeholder="" >
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">EMAIL</label>
                        <input type="text" class="form-control" value="<?php echo $email; ?>" id="" name="email" placeholder="" >
                    </div>
                    </div>
                    <div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label for="">TOTAL POIN</label>
                        <input type="text" class="form-control" value="<?php echo $tpoin; ?>" id="" name="tpoin" placeholder="" >
                    </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label for="">TINDAKLANJUT</label>
                        <input type="text" class="form-control" value="<?php echo $tindakan; ?>" id="" name="tindakan" placeholder="" >
                    </div>
                    </div>
                    </div>
                  </div>
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>siswa" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>

              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!--riwayat kelas-->
          <section class="col-lg-6">
            <div class="box">
            <div class="box-header">
              <i class="fa fa-plus"></i>
              <h3 class="box-title">RIWAYAT KELAS</h3>
              </div><!-- /.box-title -->
              <div class="box-body">
                <div class="table-responsive">
               <table id="example3" class="table table-bordered table-striped ">
                 <thead>
                  <tr>
                    <th>NO</th>
                    <th>KELAS</th>
                    <th>ANGKATAN</th>
                    <th>POIN</th>
                    <th>SANKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=0; foreach($siswa_kelas as $row) { $no++ ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['kelas']; ?></td>
                    <td><?php echo $row['angkatan']; ?></td>
                    <td><?php echo $row['tpoin']; ?></td>
                    <td><?php echo $row['aksi']; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            </div>
          </div><!-- /.box -->
          </section>
          <!--riwayat pemanggilan-->
          <section class="col-lg-12">
            <div class="box">
              <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
              <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">RIWAYAT PEMANGGILAN</h3>

              </div><!-- /.box-title -->
              <div class="box-body">
                <div class="table-responsive">
               <table id="example2" class="table table-bordered table-striped">
                 <thead>
                  <tr>
                    <th>NO</th>
                    <th>NIS</th>
                    <th>NAMA</th>
                    <th>PADA POIN</th>
                    <th>TANGGAL</th>
                    <th>LEVEL</th>
                    <th>TIM.Dis</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=0; foreach($siswa_rangking as $row) { $no++ ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['nis']; ?></td>
                   <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['tpoin']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td><?php echo $row['aksi']; ?></td>
                    <td><?php echo $row['timdis']; ?></td>
                    <td>
                    <?php
                    if($row['status'] == 1){?>
                     <a class="" href=""><i class="fa fa-check"></i></a>
                    <?php
                    }else{?>
                      <a class="" onclick="return confirm('Sudah Melakukan konseling??');" href="<?php echo base_url(); ?>rangking/upstatus/<?php echo $row['kd_sis']; ?>"><i class="fa  fa-times"></i></a>
                    <?php
                    }
                    ?>
                   <!-- <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>rangking/editrangking/<?php echo $row['kd_sis']; ?>"><i class="fa fa-pencil"></i></a>
                   --> </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            </div>
          </div><!-- /.box -->
          </section>
          <!--riwayat poin-->
          <section class="col-lg-12">
            <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">RIWAYAT POIN</h3>
              </div><!-- /.box-title -->
              <div class="box-body">
                <div class="table-responsive">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                  <tr>
                    <th>NO</th>
                    <th>NIS</th>
                    <th>NAMA</th>
                    <th>KELAS</th>
                    <th>KODE</th>
                    <th>POIN</th>

                  </tr>
                </thead>
                <tbody>
                  <?php $no=0; foreach($siswa_poin as $row) { $no++ ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['nis']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['kelas']; ?></td>
                    <td><?php echo $row['kode']; ?></td>
                    <td><?php echo $row['poin']; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            </div>
          </div><!-- /.box -->
          </section>

          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <!-- <b>Version</b> 2.0 -->
      </div>
      <strong>Copyright &copy; 2017 <a href="#"></a></strong>
    </footer>
  </div><!-- ./wrapper -->
  <!-- page script -->



    <?php $this->load->view('inc/footer'); ?>
</body>
</html>
