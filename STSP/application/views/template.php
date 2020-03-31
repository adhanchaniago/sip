<!DOCTYPE html>
<html >
<head >
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php
  $query=$this->db->query("SELECT *
    FROM tb_perusahaan ORDER BY nama DESC");
  $data2 =   $query->row_array();

  ?>
  <title><?php echo $data2['nama'];?></title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo1.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/sweetalert/sweetalert.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
  	folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  	<!-- Morris chart -->
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.css">
  	<!-- jvectormap -->
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  	<!-- Date Picker -->
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  	<!-- Daterange picker -->
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  	<!-- bootstrap wysihtml5 - text editor -->
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.autocomplete.css">
  	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font.css">
  </head>

  <SCRIPT>
  	$(document).ready(function() {
  		var div = $('#ok');
  		var start = $(div).offset().top;
  		$.event.add(window, "scroll", function() {
  			var p = $(window).scrollTop();
  			$(div).css('position',((p)>start) ? 'fixed' : 'static');
  			$(div).css('top',((p)>start) ? '0px' : '');
  		});
  	});
  </SCRIPT>
  <style>
  	.header{
  		width:100%; /*supaya header memenuhi layar*/
  		z-index:1000; /*z-index dgn nilai besar berfungsi supaya header selalu tampil didepan*/
  		position:fixed;
  		height:60px; 
  	}
  	body{
  		text-transform: uppercase;
  	}
  	#header{
  		width:100%; /*supaya header memenuhi layar*/
  		z-index:100; /*z-index dgn nilai besar berfungsi supaya header selalu tampil didepan*/
  		position:fixed;
  		height:60px; 
  	}
  	@viewport{
  		zoom: 1.0;
  		width: device-width;
  		position:fixed;
  	}
  	.html {
  		font-family: Humnst777 Cn BT, sans-serif;
  		font-size: 11px;
  	}
  </style>
  <body  class="hold-transition skin-blue sidebar-mini layout-top-nav html" >
  	<div class="wrapper">
  		<header class="main-header">
  			<nav class="navbar navbar-static-top" id = "header" style = "background-color:black; position: absolute;">
  				<div class="container">
  					<div class="navbar-header">
  						<a href="<?php echo base_url();?>welcome" class="navbar-brand" id="ok" style="margin-top: 4px;"><b><?php echo $data2['nama'];?></b></a>
  						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
  							<i class="fa fa-bars"></i>
  						</button>
  					</div>
  					<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
  						<ul class="nav navbar-nav" style="margin-top: 4px;">
  							<?php 
  							$user = $this->session->userdata('username');
  							$query = "select * from menu WHERE level = '$user'";
  							$j = $this->db->query($query);
  							$j->num_rows();
  							
  							?>
  							<?php foreach ($j->result() as $j){ 
  							}
  							?>
  							<?php if ($j->m_data == "Y" ): ?>
  								<li class="dropdown">
  									<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <font color="#ffffff"> <i class="fa fa-database"></i>  Master Data <span class="caret"></span> </font></a>
  									<ul class="dropdown-menu" role="menu">
  										<?php if ($j->k_barang == "Y" ): ?>
  											<li><a href="<?php echo base_url();?>Barang/input_k_barang"><i class="fa fa-cube"></i>Kategori Barang</a></li>
  										<?php endif;?>
  										<?php if ($j->satuan == "Y" ): ?>
  											<li><a href="<?php echo base_url();?>Satuan/input_satuan"><i class="fa fa-cube"></i>Satuan</a></li>
  										<?php endif;?>
  										<?php if ($j->barang == "Y" ): ?>
  											<li><a href="<?php echo base_url();?>Barang/view_barang"><i class="fa fa-cube"></i>Barang</a></li>
  										<?php endif;?>
  										<?php if ($j->k_pelanggan == "Y" ): ?>
  											<li><a href="<?php echo base_url();?>Kategori/input_kategori"><i class="fa  fa-user-plus"></i>Kategori Pelanggan</a></li>
  										<?php endif;?>
  										<?php if ($j->pelanggan == "Y" ): ?>
  											<li><a href="<?php echo base_url();?>Pelanggan/input_pelanggan"><i class="fa fa-user-plus"></i>Pelanggan</a></li>
  										<?php endif;?>
  										<?php if ($j->supplier == "Y" ): ?>
  											<li><a href="<?php echo base_url();?>Supplier/input_supplier"><i class="fa fa-user-plus"></i>Supplier</a></li>
  										<?php endif;?>
  										<?php if ($j->sales == "Y" ): ?>
  											<li><a href="<?php echo base_url();?>Sales/view_sales"><i class="fa fa-user-plus"></i>Sales</a></li>
  										<?php endif;?>
  										<?php if ($j->mata_uang == "Y" ): ?>
                        <li><a href="<?php echo base_url();?>Mata_uang/input_mata_uang"><i class="fa fa-money"></i>Mata Uang</a></li>
                      <?php endif;?>
                    </ul>
                  </li>
                <?php endif;?>
                <?php if ($j->d_barang == "Y" ): ?>
                  <li class="dropdown">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <font color="#ffffff"> <i class="fa fa-database"></i> Data Barang <span class="caret"></span></font></a>
                   <ul class="dropdown-menu" role="menu">
                    <?php if ($j->stok == "Y" ): ?>
                     <li><a href="<?php echo base_url();?>Barang/stok"><i class="fa fa-cube"></i>Stok</a></li>
                   <?php endif;?>
                   <?php if ($j->price_list == "Y" ): ?>
                     <li><a href="<?php echo base_url();?>Barang/price_list"><i class="fa fa-cube"></i>Price List</a></li>
                   <?php endif;?>
                   <?php if ($j->profit == "Y" ): ?>
                     <li><a href="<?php echo base_url();?>Barang/profit"><i class="fa fa-cube"></i>Profit</a></li>
                   <?php endif;?>
                 </ul>
               </li>
             <?php endif;?>
             <?php if ($j->transaksi == "Y" ): ?>
              <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <font color="#ffffff">  <i class="fa fa-shopping-cart"></i> Pembelian <span class="caret"></span></font></a>
               <ul class="dropdown-menu" role="menu">
                 <?php if ($j->purchase_order == "Y" ): ?>
                   <li><a href="<?php echo base_url();?>Purchase_order/view_purchase"><i class="fa fa-file-text-o"></i> Purchase Order</a></li>       
                 <?php endif;?>
                 <?php if ($j->pembelian == "Y" ): ?>
                   <li><a href="<?php echo base_url();?>Pembelian/view_pembelian"><i class="fa  fa-cart-arrow-down"></i> Pembelian</a></li>
                 <?php endif;?>
                 <?php if ($j->pembayaran == "Y" ): ?>
                   <li><a href="<?php echo base_url();?>Pembayaran/view_pembayaran"><i class="fa fa-money"></i> Pembayaran</a></li>
                 <?php endif;?>
                 <?php if ($j->giro == "Y" ): ?>
                  <li><a href="<?php echo base_url();?>Giro/input_giro"><i class="fa fa-file-text-o"></i>&nbspGiro</a></li> 
                <?php endif;?>
              </ul>
            </li>
          <?php endif;?>
          <?php if ($j->transaksi2 == "Y" ): ?>
            <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <font color="#ffffff">  <i class="fa fa-shopping-cart"></i>  Penjualan <span class="caret"></span></font></a>
             <ul class="dropdown-menu" role="menu">
              <?php if ($j->sales_order == "Y" ): ?>
               <li><a href="<?php echo base_url();?>Penjualan/view_penjualan"><i class="fa  fa-cart-arrow-down"></i> Sales Order</a></li>
             <?php endif;?>

             <?php if ($j->surat_jalan == "Y" ): ?>
               <li><a href="<?php echo base_url();?>Surat_jalan/view_surat_jalan"><i class="fa fa-truck"></i> Surat Jalan</a></li>  
             <?php endif;?>
             <?php if ($j->penjualan == "Y" ): ?>
               <li><a href="<?php echo base_url();?>Penjualans/view_penjualan"><i class="fa  fa-cart-arrow-down"></i> Penjualan</a></li>
             <?php endif;?>
             <?php if ($j->penerimaan == "Y" ): ?>
               <li><a href="<?php echo base_url();?>Penerimaan/view_penerimaan"><i class="fa fa-money"></i> Penerimaan</a></li>   
             <?php endif;?>

             <!--- <li><a href="<?php echo base_url();?>Penerimaan_sample/view_penerimaan"><i class="fa fa-money"></i> Penerimaan Non Data</a></li> --->

             <?php if ($j->l_tanda_terima == "Y" ): ?>
               <li><a href="<?php echo base_url();?>Laporan/Tanda_terima"><i class="fa  fa-file"></i> Tanda Terima</a></li>
             <?php endif;?>
             <!-- <li><a href="<?php echo base_url();?>User/view_cash"><i class="fa  fa-money"></i> Deposit</a></li> -->
             <?php if ($j->barang_hadiah == "Y" ): ?>
               <li><a href="<?php echo base_url();?>Hadiah/view_hadiah"><i class="fa fa-cube"></i> Barang Hadiah</a></li>
             <?php endif;?>
             <?php if ($j->pembelian_hadiah == "Y" ): ?>
               <li><a href="<?php echo base_url();?>Hadiah/view_pembelian"><i class="fa fa-cart-arrow-down"></i> Pembelian Hadiah</a></li>   
             <?php endif;?>
             <?php if ($j->pemberian_hadiah == "Y" ): ?>
               <li><a href="<?php echo base_url();?>Hadiah/view_penjualan"><i class="fa fa-cart-arrow-down"></i> Pemberian Hadiah</a></li>    
             <?php endif;?>
           </ul>
         </li>
       <?php endif;?>
       <?php if ($j->akuntansi == "Y" ): ?>
        <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown">  <font color="#ffffff"> <i class="fa fa-money"></i>  Akuntansi <span class="caret"></span></font></a>
         <ul class="dropdown-menu" role="menu">
          <?php if ($j->kategori_akun == "Y" ): ?>
           <li><a href="<?php echo base_url();?>Kategori_akun/input_kategori"><i class="fa  fa-file"></i> Kategori Akun </a></li>
         <?php endif;?>
         <?php if ($j->daftar_akun == "Y" ): ?>
           <li><a href="<?php echo base_url();?>Daftar_akun/input_akun"><i class="fa  fa-file"></i> Daftar Akun </a></li>
         <?php endif;?>
         <?php if ($j->daftar_subakun == "Y" ): ?>
           <li><a href="<?php echo base_url();?>Sub_akun/input_sub_akun"><i class="fa  fa-file"></i> Daftar SubAkun </a></li>
         <?php endif;?>
         <?php if ($j->buku_besar == "Y" ): ?>
           <li><a href="<?php echo base_url();?>Laporan/Buku_besar"><i class="fa  fa-file"></i> Buku Besar</a></li>
         <?php endif;?>
         <?php if ($j->jurnal_umum == "Y" ): ?>
           <li><a href="#"><i class="fa  fa-file"></i> Jurnal Umum</a></li>
         <?php endif;?>
       </ul>
     </li>	
   <?php endif;?>
   <?php if ($j->laporan == "Y" ): ?>
    <li class="dropdown">
     <a href="#" class="dropdown-toggle" data-toggle="dropdown">  <font color="#ffffff"> <i class="fa fa-bar-chart-o"></i>  Laporan <span class="caret"></span></font></a>
     <ul class="dropdown-menu" role="menu">
      <?php if ($j->l_saldo_supplier == "Y" ): ?>
       <li><a href="<?php echo base_url();?>Laporan/Laporan_saldob"><i class="fa  fa-file"></i> Saldo Supplier</a></li>
     <?php endif;?>
     <?php if ($j->l_saldo_pelanggan == "Y"): ?>
       <li><a href="<?php echo base_url();?>Laporan/Laporan_saldo"><i class="fa  fa-file"></i> Saldo Pelanggan</a></li>
     <?php endif;?>
     <?php if ($j->lap_po == "Y" ): ?>
       <li><a href="<?php echo base_url();?>Laporan/lap_purchase_order"><i class="fa  fa-file"></i> Transaksi Purchase Order</a></li>
     <?php endif;?>
     <?php if ($j->l_transaksi_pembelian == "Y" ): ?>
       <li><a href="<?php echo base_url();?>Laporan/lap_transaksib"><i class="fa  fa-file"></i> Transaksi Pembelian</a></li>
     <?php endif;?>
     <?php if ($j->lap_so == "Y" ): ?>
       <li><a href="<?php echo base_url();?>Laporan/lap_sales_order"><i class="fa  fa-file"></i> Transaksi Sales Order</a></li>
     <?php endif;?>
     <?php if ($j->l_transaksi_penjualan == "Y" ): ?>
       <li><a href="<?php echo base_url();?>Laporan/lap_transaksi"><i class="fa  fa-file"></i> Transaksi Penjualan</a></li>
     <?php endif;?>
     <?php if ($j->lap_pajak == "Y"): ?>
       <li ><a href="<?php echo base_url(); ?>Laporan/lap_pajak2"><i class="fa fa-file"></i> Pajak Umum</a></li>
     <?php endif;?>
     <?php if ($j->pajak_khusus == "Y"): ?>
       <li ><a href="<?php echo base_url(); ?>Laporan/lap_pajak_khusus"><i class="fa fa-file"></i> Pajak Khusus</a></li>
     <?php endif;?>
     <?php if ($j->lap_komisi == "Y"): ?>
       <li ><a href="<?php echo base_url(); ?>Laporan/lap_komisi"><i class="fa fa-file"></i> Komisi</a></li>
     <?php endif;?> 
	 <?php if ($j->l_saldo_pelanggan == "Y" ): ?>
         <li><a href="<?php echo base_url();?>Laporan_pelanggan"><i class="fa  fa-file"></i> Summary / Per-Barang</a></li>
        <?php endif;?>
   </ul>
 </li>	
<?php endif;?>
<?php if($this->session->userdata('level') === 'Administrator'): ?>
 <li class="dropdown">
   <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="#ffffff"> <i class="fa  fa-file-text"></i>  Acc <span class="caret"></span></font></a>
   <ul class="dropdown-menu" role="menu">
   <?php endif;?>
   <?php if($this->session->userdata('level') === 'Administrator' OR $this->session->userdata('level') === 'Manager'): ?>
 <?php endif;?>
 <?php if($this->session->userdata('level') === 'Administrator'): ?>
   <li><a href="<?php echo base_url();?>Acc_so/view_acc"><i class="fa  fa-file"></i> Acc Sales Order</a></li>
   <li><a href="<?php echo base_url();?>Acc/view_acc"><i class="fa  fa-file"></i> Acc Penjualan</a></li>
   <!--- <li><a href="<?php echo base_url();?>Acc_ps/view_acc"><i class="fa  fa-file"></i> Acc Penjualan Non Data</a></li> --->
   <li><a href="<?php echo base_url();?>Acc_pembayaran/view_accpembayaran"><i class="fa  fa-file"></i> Acc Pembelian</a></li>
   <li><a href="<?php echo base_url();?>Acc_po/view_acc"><i class="fa  fa-file"></i> Acc PO</a></li>
   <li><a href="<?php echo base_url();?>Acc_sj/view_acc"><i class="fa  fa-file"></i> Acc SJ</a></li>
   <li><a href="<?php echo base_url();?>Acc_giro/view_acc_giro"><i class="fa  fa-file"></i> Acc Giro Penerimaan</a></li>
   <li><a href="<?php echo base_url();?>Acc_giro_pembayaran/view_acc_giro"><i class="fa  fa-file"></i> Acc Giro Pembayaran</a></li>

 </ul>
</li>
<?php endif;?>
<?php if($this->session->userdata('level') == 'Administrator' OR $this->session->userdata('level') == 'Manager'): ?>
<li class="dropdown">
 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="#ffffff"> <i class="fa fa-gears"></i>  Pengaturan <span class="caret"></span></font></a>
 <ul class="dropdown-menu" role="menu">
 <?php endif;?>
 <?php if($this->session->userdata('level') == 'Administrator'): ?>
  <li><a href="<?php echo base_url();?>User/view_user"><i class="fa  fa-users"></i> Users</a></li>
<?php endif;?>
<?php if($this->session->userdata('level') == 'Administrator' OR $this->session->userdata('level') == 'Manager'): ?>
<li><a href="<?php echo base_url();?>Profile/input_profile"><i class="fa  fa-university"></i> Profile</a></li>
<?php endif;?>
</ul>
</li>
</ul>
</div>
<div class="navbar-custom-menu" >
 <ul class="nav navbar-nav">
  <!-- Messages: style can be found in dropdown.less-->

  <!-- User Account: style can be found in dropdown.less -->
  <li class="dropdown user user-menu">
   <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-top: 3px;margin-bottom: -10px;">
    <?php
    $rows = $this->db->query("SELECT * FROM user where username='".$this->session->username."' AND password='".$this->session->password."'" )->row_array();
    ?>
    <img style = "width:24px;height: 24px;" src='<?php echo base_url()?>upload/foto_user/<?php echo $rows['foto']?>' class="img-circle">
    <font color="#ffffff"> <span class="hidden-xs"><?php echo $this->session->userdata('username'); ?></span></font>
  </a>
  <ul class="dropdown-menu">
    <!-- User image -->
    <li class="user-header bg-navy" >
     <img style = "width:90px" src='<?php echo base_url()?>upload/foto_user/<?php echo $rows['foto']?>' class="img-circle" />
     <p>
      <font color="#ffffff">
       <small><?php echo $this->session->userdata('username'); ?></small></font>
     </p>
   </li>

   <!-- Menu Footer-->
   <li class="user-footer">
    <div class="pull-left">
     <a href="<?php echo base_url('Profile/input_profile');?>" class="btn btn-default btn-flat">Profile</a>
   </div>
   <div class="pull-right">
     <a href="<?php echo base_url()?>Auth/logout" class="btn btn-default btn-flat">Sign out</a>
   </div>
 </li>
</ul>
</li>
</ul>
</div>
</div>
</nav>
</header>
<div class="content-wrapper ">

 <section class="content active" >
  <?php echo $contents; ?>
</section>


</div>

</div>
</body>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url(); ?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.autocomplete.js"></script>
<script src="<?php echo base_url(); ?>asset/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>asset/sweetalert/sweetalert-dev.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>

<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.number.min.js"></script>


</html>
