<link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
<link href="../../assets/dist/css/sweetalert.css" rel="stylesheet" type="text/css">
<link href="../../assets/dist/css/style.css" rel="stylesheet" type="text/css">
<script src="../../assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../../assets/dist/js/sweetalert.min.js"></script>
<?php
//session login
@session_start();

// koneksi database
include '../connect/connection.php';

$aksi = $_GET['aksi'];
$id_user = $_SESSION['id'];
$tanggal = date('Y-m-d');

// TAMBAH KERANJANG BELANJA

//tambah data
if ($aksi == "add_keranjang") {

$id_barang = $_POST['id_barang'];
  //cari harga jual
$sql_harga = $connect->query("SELECT * FROM barang where id_barang='$id_barang'");
$data_harga = $sql_harga->fetch(PDO::FETCH_OBJ);
$harga_beli = $data_harga->harga_beli;
$qty = $_POST['qty'];
$status = 2;
$subtotal = $harga_beli * $qty;
  
$sql_cek_cart = $connect->query("SELECT * FROM keranjang where id_barang = '$id_barang' && id_user = '$id_user' && status_keranjang=2")->rowCount();
  // $cek_cart = $sql_cek_cart->num_rows;
  if ($sql_cek_cart >0) { ?>
  <!-- sweetalert ketika data gagal ditambahkan -->
<script type="text/javascript">
setTimeout(function () {
swal({
title: "Oops...",
text: "Data barang sudah ada dalam keranjang, silahkan cek kembali !",
type: "error",
confirmButtonText: "OK"
},
function(isConfirm){
if (isConfirm) {
window.location.href = "../../index.php?page=pembelian&action=add-pembelian";
}
}); });
</script>
<!--  -->
  <?php }else{

// mencari id terakhir dalam tabel
$sql_id = "SELECT * FROM keranjang order by id_keranjang desc limit 1";
$query_id = $connect->query($sql_id)->rowCount();
if ($query_id > 0) {
$result = $connect->query($sql_id);
$data_id = $result->fetch(PDO::FETCH_OBJ);
$id = $data_id->id_keranjang+1;
}else{
$id = 1;
}

try {
// query insert data
$sql = "INSERT into keranjang values ('$id','$id_user','$id_barang','$harga_beli','$qty','$subtotal', '$status' )";
// menyiapkan query
$query = $connect->prepare($sql); 
// eksekusi query
$query->execute();

?>
<!-- sweetalert ketika data sukses ditambahkan -->
<script type="text/javascript">
setTimeout(function () {
swal({
title: "Sukses !",
text: "Data berhasil disimpan",
type: "success",
confirmButtonText: "OK"
},
function(isConfirm){
if (isConfirm) {
window.location.href = "../../index.php?page=pembelian&action=add-pembelian";
}
}); });
</script>
<!--  -->

<?php } catch (PDOException $e) { ?>

<!-- sweetalert ketika data gagal ditambahkan -->
<script type="text/javascript">
setTimeout(function () {
swal({
title: "Oops...",
text: "Data gagal disimpan, silahkan cek kembali !",
type: "error",
confirmButtonText: "OK"
},
function(isConfirm){
if (isConfirm) {
window.location.href = "../../index.php?page=pembelian&action=add-pembelian";
}
}); });
</script>
<!--  -->

<?php }}} ?>

<!-- =============== -->

<!-- TRANSAKSI PEMBAYARAN -->

<?php
//tambah data
if ($aksi == "add_pembayaran") {

$id = $_POST['id_nota'];
$id_supplier = $_POST['id_supplier'];
$total_qty = $_POST['total_qty'];
$total_belanja = str_replace(".", "", $_POST['total_belanja']);

if ($id_supplier =="") { ?>

    <!-- sweetalert ketika data gagal ditambahkan -->
    <script type="text/javascript">
    setTimeout(function () {
    swal({
    title: "Oops...",
    text: "Supplier tidak boleh kosong, silahkan cek kembali !",
    type: "error",
    confirmButtonText: "OK"
    },
    function(isConfirm){
    if (isConfirm) {
    window.location.href = "../../index.php?page=pembelian&action=add-pembelian";
    }
    }); });
    </script>
    <!--  -->
  
  <?php }else{ 

try {

  $sql_produk = $connect->query("SELECT * FROM keranjang where id_user='$id_user' and status_keranjang='2'");
  while ($data_produk = $sql_produk->fetch(PDO::FETCH_OBJ)) {

    $sql_id = "SELECT * FROM detail_pembelian order by id_det_beli desc limit 1";
    $query_id = $connect->query($sql_id)->rowCount();
    if ($query_id > 0) {
    $result = $connect->query($sql_id);
    $data_id = $result->fetch(PDO::FETCH_OBJ);
    $id_det = $data_id->id_det_beli+1;
    }else{
    $id_det = 1;
    }
  
  $id_keranjang = $data_produk->id_keranjang;
  $id_barang = $data_produk->id_barang;
  $harga_produk = $data_produk->harga;
  $qty_produk = $data_produk->qty;
  $subtotal = $data_produk->subtotal;

  $sql_detail = "INSERT into detail_pembelian values ('$id_det','$id', '$id_barang','$harga_produk','$qty_produk','$subtotal')";
    // menyiapkan query
  $query_detail = $connect->prepare($sql_detail); 
  // eksekusi query
  $query_detail->execute();

  // cari stok barang
  $sql_stok = $connect->query("SELECT * FROM barang where id_barang='$id_barang'");
  $data_stok = $sql_stok->fetch(PDO::FETCH_OBJ);
  $stok_lama = $data_stok->stok;
  // tambah stok baru dari order
  $stok_baru = $stok_lama + $qty_produk;
  // update stok
  $sql_update_stok = "UPDATE barang set stok='$stok_baru' where id_barang='$id_barang'";
  // menyiapkan query
  $query_update = $connect->prepare($sql_update_stok); 
  // eksekusi query
  $query_update->execute();

  $sql_delete = "DELETE FROM keranjang where id_keranjang = '$id_keranjang'";
    // menyiapkan query
  $query_delete = $connect->prepare($sql_delete); 
  // eksekusi query
  $query_delete->execute();

  }


// query insert data
$sql = "INSERT into pembelian values ('$id', '$tanggal','$id_user','$id_supplier','$total_qty','$total_belanja')";
// menyiapkan query
$query = $connect->prepare($sql); 
// eksekusi query
$query->execute();

?>
<!-- sweetalert ketika data sukses ditambahkan -->
<script type="text/javascript">
setTimeout(function () {
swal({
title: "Sukses !",
text: "Data berhasil disimpan",
type: "success",
confirmButtonText: "OK"
},
function(isConfirm){
if (isConfirm) {
window.location.href = "../../index.php?page=pembelian&action=add-pembelian";
window.open("../laporan/nota_pembelian.php?nota=<?php echo $id ?>","_blank");
}
}); });
</script>
<!--  -->

<?php } catch (PDOException $e) { ?>

<!-- sweetalert ketika data gagal ditambahkan -->
<script type="text/javascript">
setTimeout(function () {
swal({
title: "Oops...",
text: "Data gagal disimpan, silahkan cek kembali !",
type: "error",
confirmButtonText: "OK"
},
function(isConfirm){
if (isConfirm) {
window.location.href = "../../index.php?page=pembelian&action=add-pembelian";
}
}); });
</script>
<!--  -->

<?php }}} ?>

<!-- =================== -->

<!-- EDIT KERANJANG BELANJA -->

<?php 

// edit data 
if ($aksi == "edit_cart") {

// inisialisasi input data
$id = $_GET['id'];
$qty_cart = $_POST['qty_cart'];
  
$sql_cart = $connect->query("SELECT * FROM keranjang where id_keranjang='$id'");
$data_cart = $sql_cart->fetch(PDO::FETCH_OBJ);
$harga_cart = $data_cart->harga;
$subtotal_cart = $harga_cart * $qty_cart;

try {

// query update data
$sql = "UPDATE keranjang set qty='$qty_cart', subtotal='$subtotal_cart', harga='$harga_cart' where id_keranjang='$id'";
// menyiapkan query
$query = $connect->prepare($sql);
//mengeksekusi query
$query->execute();

?>

<!-- sweetalert ketika data berhasil diupdate -->
<script type="text/javascript">
setTimeout(function () {
swal({
title: "Sukses !",
text: "Data berhasil diupdate",
type: "success",
confirmButtonText: "OK"
},
function(isConfirm){
if (isConfirm) {
window.location.href = "../../index.php?page=pembelian&action=add-pembelian";
}
}); });
</script>
<!--  -->

<?php } catch (PDOException $e) { ?>

<!-- sweetalert ketika data gagal diupdate -->
<script type="text/javascript">
setTimeout(function () {
swal({
title: "Oops...",
text: "Data gagal diupdate, silahkan cek kembali !",
type: "error",
confirmButtonText: "OK"
},
function(isConfirm){
if (isConfirm) {
window.location.href = "../../index.php?page=pembelian&action=add-pembelian";
}
}); });
</script>

<!--  -->
<?php }} ?>

<!-- ================ -->

<!-- HAPUS ITEM KERANJANG BELANJA -->

<?php 

// edit data 
if ($aksi == "delete") {

// inisialisasi input data
$id = $_GET['id'];

try {

// query update data
$sql = "DELETE FROM keranjang where id_keranjang = '$id'";
// menyiapkan query
$query = $connect->prepare($sql);
//mengeksekusi query
$query->execute();

?>

<!-- sweetalert ketika data berhasil diupdate -->
<script type="text/javascript">
setTimeout(function () {
swal({
title: "Sukses !",
text: "Data berhasil dihapus",
type: "success",
confirmButtonText: "OK"
},
function(isConfirm){
if (isConfirm) {
window.location.href = "../../index.php?page=pembelian&action=add-pembelian";
}
}); });
</script>
<!--  -->

<?php } catch (PDOException $e) { ?>

<!-- sweetalert ketika data gagal diupdate -->
<script type="text/javascript">
setTimeout(function () {
swal({
title: "Oops...",
text: "Data gagal dihapus, silahkan cek kembali !",
type: "error",
confirmButtonText: "OK"
},
function(isConfirm){
if (isConfirm) {
window.location.href = "../../index.php?page=pembelian&action=add-pembelian";
}
}); });
</script>

<!--  -->
<?php }} ?>

<!-- ============== -->


<!-- HAPUS KERANJANG BELANJA / BATAL TRANSAKSI -->

<?php 

// edit data 
if ($aksi == "delete_cart") {

try {

// query update data
$sql = "DELETE FROM keranjang where id_user = '$id_user' and status_keranjang='2'";
// menyiapkan query
$query = $connect->prepare($sql);
//mengeksekusi query
$query->execute();

?>

<!-- sweetalert ketika data berhasil diupdate -->
<script type="text/javascript">
setTimeout(function () {
swal({
title: "Sukses !",
text: "Data berhasil dihapus",
type: "success",
confirmButtonText: "OK"
},
function(isConfirm){
if (isConfirm) {
window.location.href = "../../index.php?page=pembelian&action=add-pembelian";
}
}); });
</script>
<!--  -->

<?php } catch (PDOException $e) { ?>

<!-- sweetalert ketika data gagal diupdate -->
<script type="text/javascript">
setTimeout(function () {
swal({
title: "Oops...",
text: "Data gagal dihapus, silahkan cek kembali !",
type: "error",
confirmButtonText: "OK"
},
function(isConfirm){
if (isConfirm) {
window.location.href = "../../index.php?page=pembelian&action=add-pembelian";
}
}); });
</script>

<!--  -->
<?php }} ?>

<!-- ============ -->

