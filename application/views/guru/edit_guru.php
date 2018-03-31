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
          <b>TAMBAH DATA ADMIN</b>
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
                <h3 class="box-title">FORM EDIT GURU</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>guru/updatedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">NIK</label>
                        <input type="hidden" class="form-control" value="<?php echo $kd_guru;?>" id="" name="kd_guru" placeholder="" required>
                        <input type="text" class="form-control" value="<?php echo $nik;?>" id="" name="nik" placeholder="" required>
                    </div>

                    <div class="form-group">
                      <label for="">Nama</label>
                        <input type="text" class="form-control" value="<?php echo $nama;?>" id="" name="nama" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="">Mapel 01</label>
                        <input type="text" class="form-control" value="<?php echo $mapel1;?>" id="" name="mapel1" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="">Mapel 02</label>
                        <input type="text" class="form-control" value="<?php echo $mapel2;?>" id="" name="mapel2" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="">Mapel 03</label>
                        <input type="text" class="form-control" value="<?php echo $mapel3; ?>" id="" name="mapel3" placeholder="">
                    </div>
                  </div>
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>guru" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
