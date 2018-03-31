<!DOCTYPE html>
<html>
  <head>
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
      <div class="content-wrapper" style="background:#fff">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <b>DASHBOARD</b>
          </h1><br>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>
              <!-- Chat box -->
              <div class="box box-success">
                <div class="box-header">
                  <!--<i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Info Pos</h3>-->
                </div>
                <div class="box-body chat" id="chat-box">
                  <!-- chat item -->
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">

            <div class="col-lg-12 col-xs-12">
            <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $tot_pelanggar[0]['tot_pelanggar']; ?></h3>

                  <p><b>TOTAL PELANGGAR</b></p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="<?php echo base_url(); ?>poin" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
                          <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $tot_rangking; ?></h3>

                  <p><b>RANGKING POIN</b></p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="<?php echo base_url(); ?>rangking" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>


            <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $tot_siswa; ?></h3>

                  <p><b>TOTAL SISWA BELUM INSTAL</b></p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="<?php echo base_url(); ?>siswa/cekin" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>

              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $tot_pasal; ?></h3>

                  <p><b>TOTAL PASAL</b></p>
                </div>
                <div class="icon">
                  <i class="fa fa-book"></i>
                </div>
                <a href="<?php echo base_url(); ?>pasal" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

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
    <?php $this->load->view('inc/footer', TRUE); ?>
  </body>

</html>
