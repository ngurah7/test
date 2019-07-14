<?php
// error_reporting(E_ALL* (E_NOTICE | E_WARNING));
include 'pages/connect/connection.php';
@session_start();
@$username = $_SESSION['username'];
if ($username=="") { ?>
<script type="text/javascript">
window.location.href="pages/account/login.php";
</script>
<?php }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sports</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- sweetalert -->
    <link href="assets/dist/css/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- select search -->
    <link rel="stylesheet" href="assets/dist/css/bootstrap-select.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
    <!-- color_picker -->
    <link href="assets/dist/css/bootstrap-colorpicker.css" rel="stylesheet">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- image  -->
    <link href="assets/dropzone/dropzone.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php
      include 'pages/part/header.php';
      include 'pages/part/sidemenu.php';
      ?>
      <!-- Content Wrapper. Contains page content -->
      
      
      <?php
      @$page = $_GET['page'];
      @$action = $_GET['action'];
      
      if ($page=="home") {
      include "pages/home/home.php";
      }
      
      if ($page=="user") {
      if ($action=="edit") {
      include "pages/user/edit_user.php";
      }else{
      include "pages/user/user.php";
      }
      }
      if ($page=="kategori") {
      if ($action=="edit") {
      include "pages/kategori/edit_kategori.php";
      }else{
      include "pages/kategori/kategori.php";
      }
      }
      if ($page=="barang") {
      if ($action=="edit") {
      include "pages/barang/edit_barang.php";
      }else{
      include "pages/barang/barang.php";
      }
      }
      
      if ($page=="pembelian") {
      if ($action=="edit") {
      include "pages/transaksi/edit_pembelian.php";
      }elseif ($action=="add-pembelian") {
      include "pages/transaksi/add_pembelian.php";
      }else{
      include "pages/transaksi/pembelian.php";
      }
      }
      if ($page=="penjualan") {
      if ($action=="edit") {
      include "pages/transaksi/edit_penjualan.php";
      }elseif ($action=="add-penjualan") {
      include "pages/transaksi/add_penjualan.php";
      }else{
      include "pages/transaksi/penjualan.php";
      }
      }
      if ($page=="supplier") {
      if ($action=="edit") {
      include "pages/supplier/edit_supplier.php";
      }else{
      include "pages/supplier/supplier.php";
      }
      }
      
      if ($page=="laporan-penjualan") {
      include "pages/laporan/laporan_penjualan.php";
      }
      if ($page=="laporan-pembelian") {
      include "pages/laporan/laporan_pembelian.php";
      }
      if ($page=="laporan-stok-barang") {
      include "pages/laporan/laporan_stok.php";
      }
      if ($page=="logout") {
      include "pages/account/logout.php";
      }
      ?>
      
      <?php include 'pages/part/footer.php'; ?>
      <?php
      function rupiah($angka){
      echo "Rp " . number_format($angka,0,',','.');
      }
      
      ?>
      
      
      <!-- jQuery 2.1.4 -->
      <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
      <!-- Bootstrap 3.3.5 -->
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <!-- FastClick -->
      <!-- <script src="assets/plugins/fastclick/fastclick.min.js"></script> -->
      <!-- AdminLTE App -->
      <script src="assets/dist/js/app.min.js"></script>
      <!-- SlimScroll 1.3.0 -->
      <!-- <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script> -->
      <!-- ChartJS 1.0.1 -->
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <!-- <script src="assets/dist/js/pages/dashboard2.js"></script> -->
      <!-- AdminLTE for demo purposes -->
      <!-- <script src="assets/dist/js/demo.js"></script> -->
      <!-- Bootstrap WYSIHTML5 -->
      <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
      <script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
      <!-- sweetalert -->
      <script src="assets/dist/js/sweetalert.min.js"></script>
      <!-- bootstrap select search -->
      <script src="assets/dist/js/bootstrap-select.js"></script>
      <!-- DataTables -->
      <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
      <!-- color picker -->
      <!-- <script src="assets/dist/js/bootstrap-colorpicker.js"></script> -->
      <!-- chart -->
      <script src="assets/chart/js/highcharts.js"></script>
      
      <!-- image -->
      <script src="assets/dropzone/dropzone.js"></script>
      
      
      <script type="text/javascript">
      
      // table
      $(function () {
      $("#example1").DataTable();
      });
      $( "#btn_add" ).click(function() {
      $( "#add_content" ).slideToggle( "slow" );
      });
      
      // confirm logout
      $('.confirm_logout').on('click', function(){
      var log_url = $(this).attr('data-url');
      swal({
      title: "Logout Sistem ?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Keluar",
      cancelButtonText: "Batal",
      closeOnConfirm: false
      }, function(){
      window.location.href = log_url;
      });
      return false
      });
      // confirm delete
      $('.confirm_delete').on('click', function(){
      var delete_url = $(this).attr('data-url');
      swal({
      title: "Hapus Data ?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Hapus",
      cancelButtonText: "Batal",
      closeOnConfirm: false
      }, function(){
      window.location.href = delete_url;
      });
      return false
      });

      // confirm delete
      $('.confirm_cart').on('click', function(){
      var delete_url = $(this).attr('data-url');
      swal({
      title: "Batal Transaksi ?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Batal Transaksi",
      cancelButtonText: "Cancel",
      closeOnConfirm: false
      }, function(){
      window.location.href = delete_url;
      });
      return false
      });

      $('#add_data').on('click',function(e){
      e.preventDefault();
      var form = $('#formAdd');
      swal({
      title: "Simpan Data?",
      // text: "Pastikan anda mengecek jumlah pembayaran dan barang!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Simpan Data",
      closeOnConfirm: false
      }, function(isConfirm){
      if (isConfirm) form.submit();
      });
      });

      $('#edit_data').on('click',function(e){
      e.preventDefault();
      var form = $('#formEdit');
      swal({
      title: "Update Data?",
      // text: "Pastikan anda mengecek jumlah pembayaran dan barang!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Update Data",
      closeOnConfirm: false
      }, function(isConfirm){
      if (isConfirm) form.submit();
      });
      });
      
      $('#bayar_transaksi').on('click',function(e){
      e.preventDefault();
      var form = $('#formBayar');
      swal({
      title: "Simpan Transaksi?",
      text: "Pastikan anda mengecek jumlah pembayaran dan barang!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Simpan Transaksi",
      closeOnConfirm: false
      }, function(isConfirm){
      if (isConfirm) form.submit();
      });
      });
      
      
      function pembayaran(){
      
      var total = document.getElementById('total_belanja').value;
      var bayar = document.getElementById('harga1').value;
      var reverse_bayar = bayar.toString().split('').reverse().join(''),
      ribuan_bayar  = reverse_bayar.match(/\d{1,3}/g);
      ribuan_bayar  = ribuan_bayar.join('').split('').reverse().join('');
      var kembalian = parseInt(ribuan_bayar) - parseInt(total);
      var reverse_kembalian = kembalian.toString().split('').reverse().join(''),
      ribuan_kembalian  = reverse_kembalian.match(/\d{1,3}/g);
      ribuan_kembalian  = ribuan_kembalian.join('.').split('').reverse().join('');
      if (kembalian<0) {
      document.getElementById('kembalian').value = "-"+ribuan_kembalian;
      }else{
      document.getElementById('kembalian').value = ribuan_kembalian;
      }
      }

      function autoRupiah(){
      // harga dengan titik otomatis
      var harga1 = document.getElementById('harga1');
      harga1.addEventListener('keyup', function(e){
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      harga1.value = formatRupiah(this.value);
      });
      }

      function autoRupiah2(){
      // price
      var harga2 = document.getElementById('harga2');
      harga2.addEventListener('keyup', function(e){
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      harga2.value = formatRupiah(this.value);
      });
      } 
      
      /* Fungsi formatRupiah */
      function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split       = number_string.split(','),
      sisa        = split[0].length % 3,
      rupiah        = split[0].substr(0, sisa),
      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
      }
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ?  + rupiah : '');
      };
      
      function reload() {
      location.reload();
      }
      
      </script>
      
      
      
      
    </body>
  </html>