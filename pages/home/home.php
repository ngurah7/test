<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Dashboard
    <small>Sports</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Home</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>
            <?php
            $sql = $connect->query("SELECT * from barang")->rowCount();
            echo $sql;
            ?>
            </h3>
            <p>
              Data Barang
            </p>
          </div>
          <div class="icon">
            <i class="fa fa-qrcode"></i>
          </div>
          <!-- <a href="?page=barang" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
              <?php
              $sql = $connect->query("SELECT * from penjualan")->rowCount();
              echo $sql;
              ?>
              </h3>
              <p>Data Penjualan</p>
            </div>
            <div class="icon">
              <i class="fa fa-cart-arrow-down"></i>
            </div>
            <!-- <a href="?page=penjualan" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
          </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>
                <?php
                $sql = $connect->query("SELECT * from pembelian")->rowCount();
                echo $sql;
                ?>
                </h3>
                <p>Data Pembelian</p>
              </div>
              <div class="icon">
                <i class="fa fa-cart-plus"></i>
              </div>
              <!-- <a href="?page=barang-masuk" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>
                  <?php
                  $sql = $connect->query("SELECT * from user")->rowCount();
                  echo $sql;
                  ?>
                  </h3>
                  <p>Admin</p>
                </div>
                <div class="icon">
                  <i class="fa fa-pencil-square-o"></i>
                </div>
                <!-- <a href="?page=admin" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a> -->
              </div>
              </div><!-- ./col -->
              </div><!-- /.row -->

              <br>
              <br>
              <center>
              <h1><b>Sports</b></h1>
              <h3>- Toko Olahraga -</h3>
              </center>
              
              </section><!-- /.content -->
            </div>