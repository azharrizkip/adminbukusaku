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
<!--            <div class="col-md-6">

                <div class="panel panel-default">
                    <div class="panel-heading">Import Xls/Xlsx ke database</div>
                    <div class="panel-body">
                        <?php
                        $att=array(
                        'class'=>'form-horizontal',
                        'id'=>'formimport',
                        );
                        echo form_open_multipart("",$att);
                        ?>
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label">Tabel</label>
                            <div class="col-sm-8">
                              <select name="tb1" id="tb1" class="form-control" required="">
                                  <option value="">-Pilih Tabel</option>
                                  <?php
                                  $t1 = $this->db->list_tables();
                                  foreach($t1 as $rf1)
                                  {
                                      ?>
                                      <option value="<?=$rf1;?>"><?=ucwords($rf1);?></option>
                                      <?php
                                  }
                                  ?>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label">Pilih File (xls/xlsx)</label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control" id="file" name="file" required="" placeholder="Pilih File" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label">Baris Ke</label>
                            <div class="col-sm-3">
                              <input type="number" class="form-control" id="mulai" name="mulai" required="">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label"></label>
                            <div class="col-sm-8">
                              <button type="submit" id="importbtn" class="btn btn-flat btn-md btn-primary">Import Data</button>
                              <button type="reset" id="resetbtn" class="btn btn-flat btn-md btn-default">Reset Form</button>
                            </div>
                        </div>
                        <div id="respon1"></div>
                        <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>-->
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Laporan kredit kumulatif</div>
                    <div class="panel-body">
                    <?php
                        $att=array(
                        'class'=>'form-horizontal',
                        'id'=>'formexport',
                        );
                        echo form_open("",$att);
                        ?>
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label">Tabel</label>
                            <div class="col-sm-8">

                              <select name="tb1" id="tb1" class="form-control" required="" >
                                  <option value="">-Pilih Tabel</option>
                                  <option value="user" onclick="autocomplet()">Siswa</option>
                                  <option value="poin" onclick="autocomplet()">Pelanggaran</option>
                              </select>
                            </div>
                        </div>
                        <!-- untuk user-->
                        <div class="nis" style="display:block;" id="nis">
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label">NIS AWAL</label>
                            <div class="col-sm-8">
                              <input type="text"  class="form-control" id="nisawal" name="nisawal">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label">NIS AKHIR</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="nisakhir" name="nisakhir" >
                            </div>
                        </div>
                      </div>
                      <!--unt poin-->
                      <div class="poin" style="display:none;" id="poin">
                      <div class="form-group">
                          <label for="x" class="col-sm-3 control-label">tanggal awal</label>
                          <div class="col-sm-8">
                            <input type="text"  class="input-xlarge datepicker hasDatepicker"  data-date-format="yyyy-mm-dd" id="tanggalawal" name="tanggalawal">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="x" class="col-sm-3 control-label">tanggal akhir</label>
                          <div class="col-sm-8">
                            <input type="text"  class="input-xlarge datepicker hasDatepicker" data-date-format="yyyy-mm-dd" id="tanggalakhir" name="tanggalakhir">
                          </div>
                      </div>
                    </div>
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label"></label>
                            <div class="col-sm-8">
                              <button type="submit" id="exportbtn" class="btn btn-flat btn-md btn-primary">Export Data</button>
                            </div>
                        </div>
                        <div id="respon2"></div>
                        <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
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
<script type="text/javascript" src="<?php echo base_url()?>assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js"></script>

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


</script>


    <script src="<?php echo base_url(); ?>assets/js/laporan.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script>

    function autocomplet() {

    	var keyword = $('#tb1').val();
    if(keyword == "user"){
       document.getElementById('nis').style.display = "block";
       document.getElementById('poin').style.display = "none";

    }else if(keyword == "poin") {
        document.getElementById('poin').style.display = "block";
        document.getElementById('nis').style.display = "none";

    }
    }

    $(function(){
    $('#pesan-flash').delay(4000).fadeOut();
    $('#pesan-error-flash').delay(5000).fadeOut();
    });
      function showelement(id,container)
      {
        var did=$("#"+container).attr('data-id');
        if(did==0)
        {
            $("#"+id).show();
            $("#"+container).attr('data-id','1');
        }else if(did==1){
            $("#"+id).hide();
            $("#"+container).attr('data-id','0');
        }
      }
      $(document).ready(function(){
        var cek =
        $("#formexport").on('submit',function(e){
            e.preventDefault();
            $.ajax({
                type:'post',
                dataType:'json',
                url:'<?=site_url();?>laporan/exportdata',
                data:$(this).serialize(),
                beforeSend:function(){
                    $("#respon2").html('<img src="<?=base_url();?>ajax-loader.gif"/><span>harap tunggu...</span>');
                },
                success:function(x){
                    $("#respon2").html(x);
                    return false;
                },
            });
        });

      });
  </script>

  </body>
</html>
