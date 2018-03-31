<!DOCTYPE html>
<html>
<head>
  <link href="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

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
          <b>EDIT DATA POIN SISWA SALAH</b>
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
                <h3 class="box-title">FORM EDIT POIN SISWA SALAH</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>poin/savepsalah" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">NIS</label>

                        <input type="hidden" class="form-control" value="<?php echo $kd_sis; ?>" id="" name="kd_sis" placeholder="Isika" required>
                        <input type="text" class="form-control" value="<?php echo $nis; ?>" id="" name="nis" placeholder="" readonly="yes">
                    </div>

                    <div class="form-group">
                      <label for="">NAMA</label>
                        <input type="text" class="form-control" value="<?php echo $nama; ?>" id="" name="nama" placeholder="" readonly="yes">
                    </div>
                    <div class="form-group">
                      <label for="">KELAS</label>
                        <input type="text" class="form-control" value="<?php echo $kelas; ?>" id="" name="kelas" placeholder="" readonly="yes">
                    </div>
                    <div class="form-group">
                          <p>
                              <b>Pasal</b>
                          </p>
                          <select class="form-control show-tick" data-live-search="true" name="pasal" editabled >
                            <?php
                              if($kd_sis > 0) { ?>
                                <option value="<?php echo $kodeps ?>" data-subtext="<?php echo $kodeps?>"><?php echo $keteranganps ?></option>
                             <?php } ?>
                            <?php $no=0; foreach($data_pasal as $row) { $no++ ?>
                            <option value="<?php echo $row['kode']?>"data-subtext="<?php echo $row['kode']?>"><?php echo $row['keterangan']?></option>';

                            <?php } ?>
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="">BARANG</label>
                          <input type="text" class="form-control" value="" id="" name="barang" placeholder="" >
                      </div>
                    </div>

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
    <!-- Select Plugin Js -->
    <!-- Bootstrap Core Js -->
  
    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/forms/form-validation.js"></script>

</body>
</html>
