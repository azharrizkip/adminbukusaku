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
          <b>PESAN</b>
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
          <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
          <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

          <!-- Left col -->
          <div class="col-md-6">

            <!-- Chat box -->
            <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">FORM KIRIM PESAN UMUM</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>dashboard/pesanumum" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">TENTANG</label>
                        <input type="text" class="form-control" value="" id="" name="tentang" placeholder="Masukan Subjek Pesan" required>
                    </div>
                    <div class="form-group">
                      <label for="">ISI</label>
                        <input type="textarea" class="form-control" value="" id="" name="isi" placeholder="Masukan Pesan" required>
                    </div>
                    <div class="form-group">

                        <label for="">tanggal akhir</label>
                          <input type="text"  class="input-xlarge datepicker hasDatepicker" data-date-format="yyyy-mm-dd" id="tanggal_akhir" name="tanggal_akhir">
                    </div>
                    <div class="form-group">
                      <BR />
                      <BR />
                      <BR />
                      <BR />
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Kirim</button>
                      <a href="<?php echo base_url(); ?>dashboard" class="btn btn-warning btn-block btn-flat">Kembali</a>
                    </div>
                  </div>
                  </form>
                </div><!-- /.item -->
                <!-- /.col -->

              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </div>
          <div class="col-md-6">

            <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">FORM KIRIM PESAN KHUSUS</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>dashboard/pesankhusus" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
                    <div class="form-grup">
                          <p>
                              <b>Nama</b>
                          </p>
                          <select class="form-control show-tick" data-live-search="true" name="nis">
                            <?php $no=0; foreach($data_siswa as $row) { $no++ ?>
                            <option value="<?php echo $row['nis']?>" data-subtext="<?php echo $row['nis']?>"><?php echo $row['nama']?></option>';

                            <?php } ?>
                          </select>
                      </div>
                    <div class="form-group">
                      <br />
                      <label for="">TENTANG</label>
                        <input type="text" class="form-control" value="" id="" name="tentang" placeholder="Masukan Subjek Pesan" required>
                    </div>
                    <div class="form-group">
                      <label for="">ISI</label>
                        <input type="textarea" class="form-control" value="" id="" name="isi" placeholder="Masukan Pesan" required>
                    </div>
                    <div class="form-group">
                        <label for="">tanggal akhir</label>
                          <input type="text"  class="input-xlarge datepicker hasDatepicker" data-date-format="yyyy-mm-dd" id="tanggal_akhir" name="tanggal_akhir">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Kirim</button>
                      <a href="<?php echo base_url(); ?>dashboard" class="btn btn-warning btn-block btn-flat">Kembali</a>
                    </div>
                  </div>
                  </form>
                </div><!-- /.item -->
                <!-- /.col -->

              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
        </div>

          <!-- end of kirim pesan-->
          <div class="col-md-12">
          <div class="box">
              <div class="box-title">
                <div>
                  <h3>DATA PESAN</h3>
                </div>
              </div><!-- /.box-title -->
              <div class="box-body">
                <div class="table-responsive">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                  <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>JENIS</th>
                    <th>JUDUL</th>
                    <th>ISI</th>
                    <th>TANGGAL BUAT</th>
                    <th>TANGGAL AKHIR</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=0; foreach($data_pesan as $row) { $no++ ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['jenis']; ?></td>
                    <td><?php echo $row['tentang']; ?></td>
                    <td><?php echo $row['isi']; ?></td>
                    <td><?php echo $row['tanggal_awal']; ?></td>
                    <td><?php echo $row['tanggal_akhir']; ?></td>
                    <td>
                    <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>dashboard/editpesan/<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i></a>
                    <a onclick="return confirm('Hapus data pesan??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>dashboard/hapuspesan/<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            </div>
          </div><!-- /.box -->
        </div><!-- /.col -->

        <!-- end of table pesan-->
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
    <script src="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

    <!-- Fungsi datepickier yang digunakan -->
    <script type="text/javascript">


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

        $(function(){
        $('#pesan-flash').delay(4000).fadeOut();
        $('#pesan-error-flash').delay(5000).fadeOut();
        });
    </script>
    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/node-waves/waves.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>

</body>
</html>
