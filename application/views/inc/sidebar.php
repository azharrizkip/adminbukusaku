<section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>assets/dist/img/admin.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $namaus; ?></p>


              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li id="dashboard">
              <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-home"></i> <span>Dashboard</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            <li id="profil">
              <a href="<?php echo base_url(); ?>admin/editakun">
                <i class="fa fa-user"></i> <span>Profile</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            <li id="pasal">
              <a href="<?php echo base_url(); ?>pasal">
                <i class="fa fa-book"></i> <span>Pasal</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            <li  id="absensi" style="<?php echo $display; ?>">
              <a href="<?php echo base_url(); ?>siswa/absensi">
              <i class="fa fa-book"></i> <span>Absensi</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            <li id="siswa">
              <a href="<?php echo base_url(); ?>siswa">
                <i class="fa fa-user"></i> <span>Siswa</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            <!--akan muncul jika login sebagai sa-->
            <li  id="jabatan" style="<?php echo $display; ?>">
              <a href="<?php echo base_url(); ?>admin">
              <i class="fa fa-user"></i> <span>Admin</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            <li  id="guru" style="<?php echo $display; ?>">
              <a href="<?php echo base_url(); ?>guru">
              <i class="fa fa-user"></i> <span>Guru</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            <li class="treeview" id="datapoin">
              <a href="#">
                <i class="fa fa-save"></i>
                <span>Data Poin</span>
                <span class="pull-right-container">

                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>poin"><i class="fa fa-save"></i>Poin Baru</a></li>
                <li><a href="<?php echo base_url(); ?>poin/psalah"><i class="fa fa-save"></i>Poin Salah</a></li>
                <li><a href="<?php echo base_url(); ?>poin/pbenar"><i class="fa fa-save"></i>Poin Benar</a></li>
                  </ul>
            </li>

            <li class="treeview" id="Pengaturan">
              <a href="#">
                <i class="fa fa-cog"></i>
                <span>Pengaturan</span>
                <span class="pull-right-container">

                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>laporan/exportfile"><i class="fa fa-save"></i>Laporan</a></li>
                <li id="jabatan" style="<?php echo $display; ?>"><a href="<?php echo base_url(); ?>laporan/kelas"><i class="fa fa-cog"></i>Pengaturan</a></li>

              </ul>
            </li>

            <li>
              <a href="<?php echo base_url(); ?>home/logout">
                <i class="fa fa-sign-out"></i> <span>Keluar</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
             </ul>
        </section>

<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
        if (window.location.href === 'http://localhost/sadmin/dashboard'){
            $('#dashboard').addClass('active');
        }
        else if (window.location.href === 'http://localhost/sadmin/admin/editakun'){
            $('#profil').addClass('active');
        }
        else if (window.location.href === 'http://localhost/sadmin/pasal'){
            $('#pasal').addClass('active');
        }
        else if (window.location.href === 'http://localhost/sadmin/siswa'){
            $('#siswa').addClass('active');
        }
        else if (window.location.href === 'http://localhost/sadmin/siswa/absensi'){
            $('#absensi').addClass('active');
        }
        else if (window.location.href === 'http://localhost/sadmin/admin'){
            $('#jabatan').addClass('active');
        }
        else if (window.location.href === 'http://localhost/sadmin/pasal'){
            $('#datapoin').addClass('active');
        }
        else if (window.location.href === 'http://localhost/sadmin/laporan/exportfiles'){
            $('#Pengaturan').addClass('active');
        }
        else if (window.location.href === 'http://localhost/sadmin/laporan/kelas'){
            $('#Pengaturan').addClass('active');
        }
        else if (window.location.href === 'http://localhost/sadmin/guru'){
            $('#guru').addClass('active');
        }
        
    });
</script>