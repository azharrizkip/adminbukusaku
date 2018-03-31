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
          <b>EDIT DATA POIN</b>
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
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">FORM EDIT POIN SISWA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>poin/updatepoin" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">NIS</label>
                      <input type="hidden" class="form-control" value="<?php echo $jenis; ?>" id="" name="jenis" placeholder="Isika" required>

                        <input type="hidden" class="form-control" value="<?php echo $kd_sis; ?>" id="" name="kd_sis" placeholder="Isika" required>
                        <input type="text" class="form-control" value="<?php echo $nis; ?>" id="" name="nis" placeholder="" readonly="true">
                    </div>

                    <div class="form-group">
                      <label for="">NAMA</label>
                        <input type="text" class="form-control" value="<?php echo $nama; ?>" id="" name="nama" placeholder="" readonly="true">
                    </div>
                    <div class="form-group">
                      <label for="">KELAS</label>
                        <input type="text" class="form-control" value="<?php echo $kelas; ?>" id="" name="kelas" placeholder="" readonly="true">
                    </div>

                    <div class="form-group">
                      <label for="">KODE</label>
                        <input type="text" class="form-control" value="<?php echo $kode; ?>" id="" name="kode" placeholder="" readonly="true">
                    </div>
                     <div class="form-group">
                      <label for="">PELANGGARAN</label>
                        <input type="text" class="form-control" value="<?php echo $pelanggaran; ?>" id="" name="pelanggaran" placeholder="" readonly="true">
                    </div>
                     <div class="form-group">
                      <label for="">POIN</label>
                        <input type="text" class="form-control" value="<?php echo $poin; ?>" id="" name="poin" placeholder="" readonly="true">
                    </div>
                    <div class="form-group">
                      <label for="">PELAPOR</label>
                        <input type="text" class="form-control" value="<?php echo $pelapor; ?>" id="" name="pelapor" placeholder="" readonly="true">
                    </div>
                  <div class="form-group">
                      <label for="">BARANG</label>
                        <input type="text" class="form-control" value="<?php echo $barang; ?>" id="" name="barang" placeholder="" readonly="true">
                  </div>
                  </div>

                  <div class="col-lg-6">
                  <div class="form-group">
                      <label for="">BUKTI</label><br>
                       <img src="http://localhost/bukus2/assets/bukti/<?php echo $bukti; ?>" width="100%" alt="Pelapor Tidak Menyertakan Bukti Foto" />
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                     <label for="">STATUS BARANG</label>
                        <select name="status_barang" class="form-control" required>
                       <?php
                         if($kd_sis > 0) { ?>
                           <option value="<?php echo $status_barang ?>"><?php echo $status_barang ?></option>
                        <?php } ?>
                            <option value="belum">BELUM</option>
                            <option value="sudah">SUDAH</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                     <label for="">KONFIRMASI</label>
                        <select name="konfirmasi" class="form-control" required>
                            <option value="belum">BELUM</option>
                            <option value="salah">SALAH</option>
                            <option value="benar">BENAR</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="">Pesan</label>
                        <textarea type="text" class="form-control" value="" id="" name="pesan" placeholder="" ></textarea>
                    </div>
                  </div><!-- /.item -->
                    

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>poin" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>

              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
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
