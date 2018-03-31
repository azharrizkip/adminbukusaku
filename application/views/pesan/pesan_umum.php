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
          <b>EDIT PESAN BROADCAST</b>
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
                <h3 class="box-title">FORM EDIT PESAN BROADCAST</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>dashboard/updatepesan" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">

                    <div class="form-group">
                      <br />
                      <label for="">TENTANG</label>
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="hidden" name="nis" value="255255255255" />
                        <input type="text" class="form-control" value="<?php echo $tentang ?>" id="" name="tentang" placeholder="Masukan Subjek Pesan" required>
                    </div>
                    <div class="form-group">
                      <label for="">ISI</label>
                        <input type="textarea" class="form-control" value="<?php echo $isi ?>" id="" name="isi" placeholder="Masukan Pesan" required>
                    </div>
                    <div class="form-group">
                        <label for="">tanggal akhir</label>
                          <input type="text" value="<?php echo $tanggal_akhir ?>" readonly="true">
                          <input type="text"  class="input-xlarge datepicker hasDatepicker" data-date-format="yyyy-mm-dd" id="tanggal_akhir" name="tanggal_akhir">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Kirim</button>
                      <a href="<?php echo base_url(); ?>dashboard" class="btn btn-warning btn-block btn-flat">Kembali</a>
                    </div>
              </div>
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
    <script type="text/javascript" src="<?php echo base_url()?>assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script>
    $('.datepicker').datetimepicker({
           language:  'id',
           weekStart: 1,
           todayBtn:  1,
     autoclose: 1,
     todayHighlight: 1,
     startView: 2,
     minView: 2,
     forceParse: 0
       });

    </script>
</body>
</html>
