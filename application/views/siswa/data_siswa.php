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
          <b>DATA SISWA</b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>

        <!-- Main content -->
         <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
            <a style="margin-bottom:3px" href="<?php echo base_url(); ?>siswa/addsiswa" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH SISWA </a>
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">

                </div><!-- /.box-title -->
                <div class="box-body">
                  <div class="table-responsive">
                 <table id="example1" class="table table-bordered table-striped ">
                   <thead>
                    <tr>
                      <th>NO</th>
                      <th>NIS</th>
                      <th>NAMA</th>
                      <th>KELAS</th>
                      <th>JURUSAN</th>

                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_siswa as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['nis']; ?></td>
                      <td><?php echo $row['nama']; ?></td>
                      <td><?php echo $row['kelas']; ?></td>
                      <td><?php echo $row['jurusan']; ?></td>

                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>siswa/editsiswa/<?php echo $row['kd_sis']; ?>"><i class="fa fa-pencil"></i></a>
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>siswa/hapusis/<?php echo $row['kd_sis']; ?>"><i class="fa fa-trash"></i></a>
                      <a onclick="return confirm('Anda Ingin Mereset Sandi??');"  class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>siswa/reset/<?php echo $row['kd_sis']; ?>"><i class="fa fa-key"></i></a>

                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
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
    <script src="<?php echo base_url(); ?>assets/dist/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function() {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false


        });
      });
            //waktu flash data :v
      $(function(){
      $('#pesan-flash').delay(4000).fadeOut();
      $('#pesan-error-flash').delay(5000).fadeOut();
      });
    </script>
</body>
</html>
