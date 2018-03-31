<!DOCTYPE html>
<html>
  <head>
    <?php $this->load->view('inc/head'); ?>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url()?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url()?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url()?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url()?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo base_url()?>assets/css/print.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes
    <link href="<?php echo base_url()?>assets/css/themes/all-themes.css" rel="stylesheet" />
    -->
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
      <div class="content-wrapper" style="background:#fff">
        <section class="content">
            <div class="container-fluid">
                <!-- Exportable Table -->
                <div class="row clearfix">
                  <div class="box-body">
                    <div class="table-responsive">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    LAPORAN SISWA

                                </h2>
                                <br>
                            </div>
                            <div class="body">

                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                          <th>NO</th>
                                          <th>NIS</th>
                                          <th>NAMA</th>
                                          <th>KELAS</th>
                                          <th>JURUSAN</th>
                                          <th>ANGKATAN</th>
                                          <th>POIN</th>
                                          <th>SANKSI</th>
                                          <th hidden="yes">
                                            EMAIL
                                          </th>
                                          <th hidden="yes">
                                            STATUS
                                          </th>
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
                                        <td><?php echo $row['angkatan']; ?></td>
                                        <td><?php echo $row['tpoin']; ?></td>
                                        <td><?php echo $row['aksi']; ?></td>
                                        <td hidden="yes">
                                          <?php echo $row['email']; ?>
                                        </td >
                                        <td hidden="yes">
                                          <?php echo $row['status']; ?>
                                        </td>
                                      <?php } ?>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>

                    </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="card">
                          <div class="header">
                              <h2>
                                  LAPORAN POIN

                              </h2>
                              <br>
                          </div>
                          <div class="body">

                              <table class="table table-bordered table-striped table-hover dataTable js-exportable">
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
                                    <?php $no=0; foreach($data_poin as $row) { $no++ ?>
                                    <tr>
                                      <td><?php echo $no; ?></td>
                                      <td><?php echo $row['nis']; ?></td>
                                      <td><?php echo $row['nama']; ?></td>
                                      <td><?php echo $row['kelas']; ?></td>
                                      <td><?php echo $row['kode']; ?></td>
                                      <td><?php echo $row['poin']; ?></td>
                                    <?php } ?>
                                  </tr>
                                  </tbody>
                              </table>

                          </div>

                  </div>
                  </div>
                </div>
                </div>
                <!-- #END# Exportable Table -->
            </div>
        </section>
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <!-- <b>Version</b> 2.0 -->
        </div>
        <strong>Copyright &copy; 2017 <a href="#"></a></strong>
      </footer>
    </div><!-- ./wrapper -->
    <?php $this->load->view('inc/footer', TRUE); ?>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url()?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url()?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url()?>assets/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url()?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->

    <script src="<?php echo base_url()?>assets/js/pages/tables/jquery-datatable.js"></script>


  </body>

</html>
