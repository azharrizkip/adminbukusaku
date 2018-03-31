<header class="main-header">
        <!-- Logo -->
        <a  class="logo"><b>BUKU</b>SAKU</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <li class="dropdown messages-menu">
                <a href="<?php echo base_url(); ?>poin">
                <i class="fa fa-bell"></i>
                  <span href="<?php echo base_url(); ?>poin" class="label label-success"><?php echo $tot_pelanggar[0]['tot_pelanggar']; ?></span>
                </a>
              </li>
              <li class="dropdown messages-menu">
                <a href="<?php echo base_url(); ?>dashboard/pesan">
                <i class="fa fa-bullhorn"></i>
                  <span href="" class="label label-success"><?php echo $tot_pesan[0]['tot_pesan'] ?></span>
                </a>
              </li>

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <b>Selamat Datang, </b><span class="hidden-xs"><?php echo $namaus; ?></span>
                </a>
              </li>

            </ul>
          </div>
        </nav>
      </header>
