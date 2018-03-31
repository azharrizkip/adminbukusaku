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
          <b></b>
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
            <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
            <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

          <div class="box">
          <div class="col-md-6">

                <form action="<?php echo base_url();?>laporan/uplod/" method="post" enctype="multipart/form-data">
                  <div class="panel panel-default">

                      <div class="panel-heading">Import dari Excel</div>
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
                                <button type="submit" id="exportbtn" class="btn btn-flat btn-md btn-primary">Upload Tabel</button>

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
          <div class="row">

            <div class="col-md-6">

              <div class="box">
                <div class="box-header">
                  <i class="fa fa-plus"></i>
                  <h3 class="box-title">PINDAH KELAS</h3>
                </div>
                <div class="box-body chat" id="chat-box">
                  <!-- chat item -->
                  <div class="item">
                    <form role="form" action="" method="POST" enctype="multipart/form-data">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <div class="col-lg-3">
                          <label for="">KELAS</label>
                            <select name="kelas" id="kelas"  class="form-control" onclick="kel()">
                              <option value="X">X</option>
                              <option value="XI">XI</option>
                              <option value="XII">XII</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                          <label for="">-</label>
                             <select name="jurusan" id="jurusan" class="form-control" onclick="kel()">
                                 <option value="RPL">RPL</option>
                                 <option value="TJA">TJA</option>
                                 <option value="TKJ">TKJ</option>
                             </select>
                        </div>

                        <div class="col-lg-3">
                          <label for=""> -</label>
                          <select name="angka" id="angka" class="form-control" onclick="kel()">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                          </select>
                          <br />
                        </div>
                    </div>
                  </div><!-- /.item -->
                 </form>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
                <div class="box-title">
                  <div>
                    <h3><center>
                      KELAS LAMA
                    </center></h3>
                  </div>
                </div><!-- /.box-title -->
                <div class="box-body">

                  <div class="table-responsive">
                    <form role="form" action="<?php echo base_url(); ?>laporan/pindahk" method="POST" onsubmit="return validasi_input(this)" enctype="multipart/form-data">
                 <table id="example1" class="table table-bordered table-striped">
                   <thead>
                    <tr>
                      <th>  </th>
                     <th>NO</th>
                      <th>NAMA</th>
                      <th>KELAS</th>
                      <th>JURUSAN</th>
                      <th>ANGKATAN</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_kelas as $row) { $no++ ?>
                    <tr>
                      <td>
                        <input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['kd_sis'];?>"  />
                      </td>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['nama']; ?></td>
                      <td><?php echo $row['kelas']; ?></td>
                      <td><?php echo $row['jurusan']; ?></td>
                      <td><?php echo $row['angkatan']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <div class="form-group">
                  <br />
                  <input type="hidden" name="kelaspilih" id="kelaspilih" />
                  <input type="hidden" name="jurusanpilih" id="jurusanpilih" />
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Pindah</button>
                </div><!-- /.col -->
               </form>
              </div>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col kelas lama-->
          <div class="col-md-6">
            <div class="box">
              <div class="box-title">
                <div>
                  <h3><center>
                    KELAS BARU
                  </center></h3>
                </div>
              </div><!-- /.box-title -->
              <div class="box-body">
                <div class="table-responsive">
               <table id="example2" class="table table-bordered table-striped">
                 <thead>
                  <tr>
                   <th>NO</th>
                    <th>NAMA</th>
                    <th>KELAS</th>
                    <th>JURUSAN</th>
                    <th>ANGKATAN</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=0; foreach($data_kelas2 as $row) { $no++ ?>
                  <tr>
                      <td><?php echo $no; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['kelas']; ?></td>
                    <td><?php echo $row['jurusan']; ?></td>
                    <td><?php echo $row['angkatan']; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            </div>
          </div><!-- /.box -->
        </div><!-- /.col kelas baru-->
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
    <script src="<?php echo base_url();?>assets/js/script.js" type="text/javascript"></script>
  
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
