      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="assets/dist/img/user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['username']; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if($_GET['page']=='home'){ ?> active treeview <?php } ?>">
              <a href="?page=home">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
              
            </li>
            
            <li class="<?php if($_GET['page']=='supplier' or $_GET['page']=='barang' or $_GET['page']=='kategori' or $_GET['page']=='user'){ ?> active treeview <?php } ?>">
              <a href="#">
                <i class="fa fa-folder"></i>
                <span>Data Master</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($_GET['page']=='barang'){ ?> active treeview <?php } ?>"><a href="?page=barang"><i class="fa fa-circle-o"></i> Data Barang</a></li>
                <li class="<?php if($_GET['page']=='kategori'){ ?> active treeview <?php } ?>"><a href="?page=kategori"><i class="fa fa-circle-o"></i> Data Kategori Barang</a></li>
                <li class="<?php if($_GET['page']=='supplier'){ ?> active treeview <?php } ?>"><a href="?page=supplier"><i class="fa fa-circle-o"></i> Data Supplier</a></li>
                <li class="<?php if($_GET['page']=='user'){ ?> active treeview <?php } ?>"><a href="?page=user"><i class="fa fa-circle-o"></i> Data User</a></li>
              </ul>
            </li>
          
            <li class="<?php if($_GET['page']=='penjualan' or $_GET['page']=='pembelian'){ ?> active treeview <?php } ?>">
              <a href="#">
                <i class="fa fa-cart-arrow-down"></i>
                <span>Transaksi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($_GET['page']=='penjualan'){ ?> active treeview <?php } ?>"><a href="?page=penjualan"><i class="fa fa-circle-o"></i> Transaksi Penjualan</a></li>
                <li class="<?php if($_GET['page']=='pembelian'){ ?> active treeview <?php } ?>"><a href="?page=pembelian"><i class="fa fa-circle-o"></i> Transaksi Pembelian Barang </a></li>
                <!-- <li class="<?php if($_GET['page']=='pembelian'){ ?> active treeview <?php } ?>"><a href="?page=pembelian"><i class="fa fa-circle-o"></i> Transaksi Barang Masuk</a></li> -->
              </ul>
            </li>
          
            <li class="<?php if($_GET['page']=='laporan-pembelian' or $_GET['page']=='laporan-penjualan'){ ?> active treeview <?php } ?>">
              <a href="#">
                <i class="fa fa-newspaper-o "></i>
                <span>Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($_GET['page']=='laporan-penjualan'){ ?> active treeview <?php } ?>"><a href="?page=laporan-penjualan"><i class="fa fa-circle-o"></i> Laporan Penjualan</a></li>
                <li class="<?php if($_GET['page']=='laporan-pembelian'){ ?> active treeview <?php } ?>"><a href="?page=laporan-pembelian"><i class="fa fa-circle-o"></i> Laporan Pembelian Barang</a></li>
                
              </ul>
            </li>
          
            
            <li class="header">Akun</li>
            <li><a href="" data-url="?page=logout" class="confirm_logout"><i class="fa fa-circle-o text-red"></i> <span>Keluar</span></a></li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>