 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url('assets/be/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">HALAMAN OFFICE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/be/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      

          <?php 
            switch($_SESSION['role']){
              
              case '1': 
                ?>
                   <li class="nav-item has-treeview">
            <a href="<?php echo base_url('Admin'); ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Admin'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Main Dashboard</p>
                </a>
              </li>
            </ul>
          </li>

                 <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                DATA
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('aturuser'); ?>" class="nav-link">
                <i class="nav-icon far fa-user"></i>
                  <p>Pengguna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('aturmember'); ?>" class="nav-link">
                <i class="nav-icon far fa-registered"></i>
                  <p>Member</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('aturproduk');?>" class="nav-link">
                <i class="nav-icon far fa-registered"></i>
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('jenistesmateri');?>" class="nav-link">
                <i class="nav-icon far fa-folder"></i>
                  <p>Tes dan Materi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-bill-alt"></i>
              <p>
                TRANSAKSI
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('aturuser'); ?>" class="nav-link">
                <i class="nav-icon far fa-user"></i>
                  <p>Pembayaran</p>
                </a>
              </li>
            </ul>
          </li>
          

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bolt"></i>
              <p>
                OTHER
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Admin/logout'); ?>" class="nav-link">
                <i class="fas fa-arrow-right"></i>
                  <p>Keluar</p>
                </a>
              </li>
            </ul>
          </li>
              <?php
              break;
              case '2': 
                ?>
                   <li class="nav-item has-treeview">
            <a href="<?php echo base_url('Admin'); ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Admin'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Main Dashboard</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                DATA
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('aturuser'); ?>" class="nav-link">
                <i class="nav-icon far fa-user"></i>
                  <p>Pengguna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('aturmember'); ?>" class="nav-link">
                <i class="nav-icon far fa-registered"></i>
                  <p>Member</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('aturproduk'); ?>" class="nav-link">
                <i class="nav-icon far fa-registered"></i>
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('jenistesmateri');?>" class="nav-link">
                <i class="nav-icon far fa-folder"></i>
                  <p>Tes dan Materi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-bill-alt"></i>
              <p>
                TRANSAKSI
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('aturuser'); ?>" class="nav-link">
                <i class="nav-icon far fa-user"></i>
                  <p>Pembayaran</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bolt"></i>
              <p>
                OTHER
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Admin/logout'); ?>" class="nav-link">
                <i class="fas fa-arrow-right"></i>
                  <p>Keluar</p>
                </a>
              </li>
            </ul>
          </li>
                <?php
              break;
              case '3': 
                ?>
                   <li class="nav-item has-treeview">
            <a href="<?php echo base_url('Admin'); ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Officer'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Main Dashboard</p>
                </a>
              </li>
            </ul>
          </li>

                 <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-bill-alt"></i>
              <p>
                TRANSAKSI
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('aturuser'); ?>" class="nav-link">
                <i class="nav-icon far fa-user"></i>
                  <p>Pembayaran</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bolt"></i>
              <p>
                OTHER
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Officer/logout'); ?>" class="nav-link">
                <i class="fas fa-arrow-right"></i>
                  <p>Keluar</p>
                </a>
              </li>
            </ul>
          </li>
                
                <?php
              break;
              default: 
                redirect('Login/loginow');
              break;
            }

          ?>


         



       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>