<div class="content-wrapper">
  <section class="content-header">
    <h1>
    Data Jenis Barang
    <small>Sports</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Data Master</a></li>
      <li><a href="#">Data Jenis Barang</a></li>
    </ol>
  </section>
  <br>  
  <?php
  $id = $_GET['edit'];
  $sql = "SELECT * FROM kategori where id_kategori = '$id'";
  $result = $connect->query($sql);
  $data = $result->fetch(PDO::FETCH_OBJ);
  $id_kategori = $data->id_kategori;
  $kategori = $data->kategori;
  
  ?>
  <div id="add_content">
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Kategori Barang</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" id="formEdit" action="pages/kategori/proses_kategori.php?aksi=edit_data&id=<?php echo($id_kategori) ?>">
                <div class="box-body">

                  <div class="form-group">
                    <label class="col-md-2 control-label">Nama Kategori Barang</label>
                    <div class="col-md-8">
                      <input type="text" name="nama" class="form-control" placeholder="Nama Kategori Barang ..." required="" autofocus="" value="<?php echo($kategori) ?>">
                    </div>

                  </div>
                  
                  <div class="box-footer">
                    <div class="col-md-7"></div>
                    <div class="col-md-3">
                      <input type="submit" class="btn btn-success" name="edit_data" id="edit_data" value="Update Data"/>
                      &nbsp;&nbsp;&nbsp;
                      <a href="?page=kategori" class="btn btn-danger">Batal</a>
                    </div>
                    <div class="col-md-1"></div>
                    </div><!-- /.box-footer -->
                  </form>
                  </div><!-- /.box -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>