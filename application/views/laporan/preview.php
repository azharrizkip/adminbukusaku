<!DOCTYPE html>
<html>
<head>
<link href="<?php echo base_url()?>assets/date_picker_bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
          <b>LAPORAN BUKU SAKU</b>
        </h1>

        </section>

        <!-- Main content -->
    <div class="container">
        <br>
        <div class="row">
          <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
          <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

        <div class="box">
        <div class="col-md-6">

              <form action="<?php echo base_url();?>laporan/uplod/" method="post" enctype="multipart/form-data">
                <div class="panel panel-default">

                    <div class="panel-heading">Import excel</div>
                    <br>
                    <br>
                    <div class="panel-body">

                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label">Tabel</label>
                            <div class="col-sm-8">
                              <select name="importbl" id="importbl" class="form-control" required="">
                                  <option value="">-Pilih Tabel</option>
                                  <option value="user">siswa</option>
                                  <option value="pasal">pasal</option>
                              </select>
                            </div>
                        </div>


                         <div class="form-group">
                            <label for="x" class="col-sm-3 control-label"><br>Pilih File (xls/xlsx)</label>
                            <div class="col-sm-8">
                              <br><input type="file" class="form-control" id="file" name="file" required="" placeholder="Pilih File" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label"></label>
                            <div class="col-sm-8">
                              <br>
                              <button type="submit" id="exportbtn" class="btn btn-flat btn-md btn-primary">Import Data</button>

                              <br>
                              <br>
                            </div>
                        </div>
                    </div>
                </div>
              </form>

            </div>
        </div>
    </div>
    </div>
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

    <script src="<?php echo base_url(); ?>assets/js/laporan.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script>


    $(function(){
    $('#pesan-flash').delay(4000).fadeOut();
    $('#pesan-error-flash').delay(5000).fadeOut();
    });

  </script>

  </body>
</html>
