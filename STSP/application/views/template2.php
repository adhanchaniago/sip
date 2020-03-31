<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">  
  <?php
  $query=$this->db->query("SELECT *
    FROM tb_perusahaan ORDER BY nama DESC");
  $data2 =   $query->row_array();

  ?>
  <title><?php echo $data2['nama'];?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>mobile/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>mobile/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>mobile/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>mobile/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?php echo base_url();?>mobile/dist/css/skins/_all-skins.min.css">

   <link rel="stylesheet" href="<?php echo base_url(); ?>mobile/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.autocomplete.css">

   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">  
   
   <!-- Google Font -->
   <link rel="stylesheet" href="<?php echo base_url();?>mobile/css/font.css">
   <style type="text/css">
    .html {
      font-family: Humnst777 Cn BT, sans-serif;
      font-size: 11px;
    }
    body{
      text-transform: uppercase;
    }
  </style>
</head>


<!-- jQuery 3 -->
<script src="<?php echo base_url();?>mobile/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>mobile/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>mobile/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>mobile/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>mobile/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>mobile/dist/js/demo.js"></script>

<script src="<?php echo base_url(); ?>mobile/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>mobile/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> 

<script src="<?php echo base_url(); ?>assets/js/jquery.autocomplete.js"></script>

<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>

<body class="hold-transition skin-blue layout-top-nav html">
  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="navbar-header" >
          <a href="#" class="navbar-brand" style="font-size: 15px"><b><?php echo $data2['nama'];?></b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="divider"></li>
            <li><a href="<?php echo base_url();?>Sales_order/input_penjualan">Tambah Sales Order</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url(); ?>Sales_order/view_penjualan">Data Sales Order</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url(); ?>Sales_order/view_retur">Data Retur Sales Order</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url()?>Auth/logout">Sign Out</a></li>
            <li class="divider"></li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
        <!-- /.container-fluid -->
      </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper" style="">

     <section class="content active" >
       <?php echo $contents;?>
     </section>

   </div>
 </div>
</body>
</html>
