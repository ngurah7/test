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

//tambah data
if ($aksi == "add_data") {

// inisialisasi input data
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

if ($nama == "" or $username=="" or $password=="" or $repassword=="") { ?>

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
window.location.href = "../../index.php?page=user";
}
}); });
</script>
<!--  -->

<?php }else{

$sql_cek = $connect->query("SELECT * FROM user where username = '$username' ")->rowCount();

if ($sql_cek > 0) { ?>
  <!-- sweetalert ketika data gagal ditambahkan -->
<script type="text/javascript">
setTimeout(function () {
swal({
title: "Oops...",
text: "Data username sudah terdaftar, silahkan cek kembali !",
type: "error",
confirmButtonText: "OK"
},
function(isConfirm){
if (isConfirm) {
window.location.href = "../../index.php?page=user";
}
}); });
</script>
<!--  -->
  <?php }else{

if ($password != $repassword) { ?>
  <!-- sweetalert ketika data gagal ditambahkan -->
<script type="text/javascript">
setTimeout(function () {
swal({
title: "Oops...",
text: "Password dan ulangi password tidak sama, silahkan cek kembali !",
type: "error",
confirmButtonText: "OK"
},
function(isConfirm){
if (isConfirm) {
window.location.href = "../../index.php?page=user";
}
}); });
</script>
<!--  -->
  <?php }else {

// mencari id terakhir dalam tabel
$sql_id = "SELECT * FROM user order by id_user desc limit 1";
$query_id = $connect->query($sql_id)->rowCount();
if ($query_id > 0) {
$result = $connect->query($sql_id);
$data_id = $result->fetch(PDO::FETCH_OBJ);
$id = $data_id->id_user+1;
}else{
$id = 1;
}

try {
// query insert data
$sql = "INSERT into user values ('$id','$nama','$username','$password')";
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
window.location.href = "../../index.php?page=user";
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
window.location.href = "../../index.php?page=user";
}
}); });
</script>
<!--  -->

<?php }}}}} ?>

<?php 

// edit data 
if ($aksi == "edit_data") {

// inisialisasi input data
$id = $_GET['id'];
$nama = $_POST['nama'];

if ($nama == "") { ?>

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
window.location.href = "../../index.php?page=user";
}
}); });
</script>
<!--  -->

<?php }else{

try {

// query update data
$sql = "UPDATE user set nama_user='$nama' where id_user='$id'";
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
window.location.href = "../../index.php?page=user";
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
window.location.href = "../../index.php?page=user";
}
}); });
</script>

<!--  -->
<?php }}} ?>