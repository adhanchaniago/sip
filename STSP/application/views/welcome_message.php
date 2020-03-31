<html>
<head>
<title>Bakti Jaya Mandiri</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font.css">
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: center;
  padding: 8px;
}

.html {
    font-family: Humnst777 Cn BT, sans-serif;
    font-size: 11px;
  }
</style>
</head>
<body class = "html">
<div class="row"> 
<section class="col-lg-8 connectedSortable" style="margin-bottom: 130px;">
		<div class="box-box danger">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#piutang" data-toggle="tab"><b>PIUTANG JTH TEMPO</b></a></li> <!-- Untuk Tab pertama berikan li class=”active” agar pertama kali halaman di load tab langsung active-->
					<li><a href="#hutang" data-toggle="tab"><b>HUTANG JTH TEMPO</b></a></li>
					<li><a href="#stok" data-toggle="tab"><b>STOK MINIMUM</b></a></li>
					<li><a href="#laris" data-toggle="tab"><b>BARANG TERLARIS</b></a></li>
					<?php if($this->session->userdata('level') === 'Administrator'): ?>
					<li><a href="#harga" data-toggle="tab"><b>TOTAL PENJUALAN</b></a></li>
					<?php endif;?>
				</ul>
				
				<br>
				<br>
<div class="tab-content" style="height:1000%">
  <div class="tab-pane active" id="piutang">
				<table  class="table table-condensed" id="example">
					<thead bgcolor="#C4DEF6">
							<td width="1%"><b>NO</b></td>
							<td width="5%"><b>No Invoice</b></td>
							<td width="7%"><b>Nama Pelanggan</b></td>
							<td width="5%" align="right"><b>Sisa Tagihan</b></td>
							<td width="5%" align="center"><b>Jatuh Tempo</b></td>
							<td width="5%"><b>Tgl Invoice</b></td>
							<td width="1%" align="right"></b></td>
							<td width="5%"><b>Tempo</b></td>
					</thead>
					<tbody>
					
					 <?php
					$bulan = date('m');
					$query = "select tb_penjualan.no_jual,tb_penjualan.id_pelanggan,tb_penjualan.no_reff,tb_penjualan.sisa,tb_penjualan.jatuh_tempo,tb_penjualan.tgl_invoice,tb_penjualan.tempo,tb_pelanggan.nama_pelanggan from tb_penjualan inner Join tb_pelanggan ON tb_penjualan.id_pelanggan=tb_pelanggan.id_pelanggan WHERE tb_penjualan.sisa > 0 AND month(jatuh_tempo) = '$bulan' order by jatuh_tempo asc";
					$h = $this->db->query($query);
						?>
						<?php
						$no=1;
						foreach ($h->result() as $week){?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $week->no_jual; ?>/<?php echo $week->id_pelanggan; ?>/<?php echo $week->no_reff; ?></td>
							<td ><?php echo $week->nama_pelanggan; ?></td>
							<td align="right"><?php echo number_format($week->sisa,2) ?></td>
							<td align="center"><?php echo date('d-m-Y',strtotime($week->jatuh_tempo)); ?></td>
							<td><?php echo $week->tgl_invoice; ?></td>
							<td align="right"></td>
							<td><?php echo $week->tempo; ?> Hari</td>
						</tr>
						<?php $no++;}?>
						
					</tbody>
				</table>
		</div>
		<!-- Untuk Tab pertama berikan div class=”active” agar pertama kali halaman di load content langsung active-->
  <div class="tab-pane" id="hutang" >
 <table  class="table table-condensed" id="example2" >
					<thead bgcolor="#C4DEF6">
							<td width="1%"><b>NO</b></td>
							<td width="5%"><b>No Beli</b></td>
							<td width="12%"><b>Nama Supplier</b></td>
							<td width="5%" align="right"><b>Sisa Tagihan</b></td>
							<td width="5%" align="center"><b>Jatuh Tempo</b></td>
							<td width="5%"><b>Tgl Invoice</b></td>
							<td width="1%" align="right"></b></td>
							<td width="5%"><b>Tempo</b></td>
					</thead>
					<tbody>
					
					 <?php
					$bun = date('m');
					$query1 = "select tb_pembelian.no_beli,tb_pembelian.id_supplier,tb_pembelian.no_reff,tb_pembelian.tgl_invoice
					,tb_pembelian.sisa,tb_pembelian.tempo,tb_pembelian.jatuh_tempo,tb_supplier.nama_supplier from 
					tb_pembelian INNER JOIN tb_supplier ON tb_pembelian.id_supplier=tb_supplier.id_supplier
					WHERE tb_pembelian.sisa > 0 AND month(tb_pembelian.jatuh_tempo) = '$bun' order by tb_pembelian.jatuh_tempo asc";
					$hutang = $this->db->query($query1);
						?>
						<?php
						$no=1;
						foreach ($hutang->result() as $hut){?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $hut->no_beli; ?>/<?php echo $hut->id_supplier; ?>/<?php echo $hut->no_reff; ?></td>
							<td><?php echo $hut->nama_supplier; ?></td>
							<td align="right"><?php echo number_format($hut->sisa,2) ?></td>
							<td align="center"><?php echo date('d-m-Y',strtotime($hut->jatuh_tempo)); ?></td>
							<td><?php echo $hut->tgl_invoice; ?></td>
							<td align="right"></td>
							<td><?php echo $hut->tempo; ?> Hari</td>
						</tr>
						<?php $no++;}?>
						
					</tbody>
				</table>
				</div>
  <div class="tab-pane" id="stok">
  <table  class="table table-condensed" id="example3">
					<thead bgcolor="#C4DEF6">
							<td width="1%"><b>NO</b></td>
							<td width="7%"><b>Nama Barang</b></td>
							<td width="5%" ><b>Stok Min</b></td>
							<td width="5%"><b>Terjual</b></td>
							<td width="5%"><b>Sisa</b></td>
							<td width="5%" align="center"><b>Status</b></td>
					</thead>
					<tbody>
					
					 <?php
					$query = "select * from tb_barang where jual = 'Y' order by stok,minimum asc ";
					$stok = $this->db->query($query);
						?>
						<?php
						$no=1;
						foreach ($stok->result() as $s){?>
						<tr>
							<td><?php echo $no; ?></td>
							<td ><?php echo $s->nama_barang ?></td>
							<td ><?php echo $s->minimum ?></td>
							<td><?php echo $s->terjual; ?></td>
							<td><?php echo $s->stok; ?></td>
							<td align="center"><?php if ($s->stok <= $s->minimum) {?>
									<span style="width:15px;height:10px" class='btn btn-xs btn-danger'></span>
									<?php
								} else{ ?>
								<span style="width:15px;height:10px" class='btn btn-xs btn-success'></span>
								<?php }?>
								</td>
						</tr>
						<?php $no++;}?>
						
					</tbody>
				</table>
				</div>
  <div class="tab-pane" id="laris">
  <table  class="table table-condensed" id="example4">
					<thead bgcolor="#C4DEF6">
							<td width="1%"><b>No</b></td>
							<td width="50%"><b>Nama Barang</b></td>
							<td width="7%"><b>Jan</b></td>
							<td width="7%"><b>Feb</b></td>
							<td width="7%"><b>Mar</b></td>
							<td width="7%"><b>Apr</b></td>
							<td width="7%"><b>Mei</b></td>
							<td width="7%"><b>Jun</b></td>
							<td width="7%"><b>Jul</b></td>
							<td width="7%"><b>Ags</b></td>
							<td width="7%"><b>Sep</b></td>
							<td width="7%"><b>Okt</b></td>
							<td width="7%"><b>Nov</b></td>
							<td width="7%"><b>Des</b></td>
					</thead>
					<tbody>
					 <?php
					 $bl = date('%Y-%m-%d');
					$query = " SELECT tb_detail_penjualan.id_barang,tb_barang.nama_barang
								, SUM(IF(MONTH(STR_TO_DATE(tb_detail_penjualan.tgl, '%Y-%m-%d')) = 01, tb_detail_penjualan.qtyb, 0)) AS jan
								, SUM(IF(MONTH(STR_TO_DATE(tb_detail_penjualan.tgl, '%Y-%m-%d')) = 02, tb_detail_penjualan.qtyb, 0)) AS feb
								, SUM(IF(MONTH(STR_TO_DATE(tb_detail_penjualan.tgl, '%Y-%m-%d')) = 03, tb_detail_penjualan.qtyb, 0)) AS mar
								, SUM(IF(MONTH(STR_TO_DATE(tb_detail_penjualan.tgl, '%Y-%m-%d')) = 04, tb_detail_penjualan.qtyb, 0)) AS apr
								, SUM(IF(MONTH(STR_TO_DATE(tb_detail_penjualan.tgl, '%Y-%m-%d')) = 05, tb_detail_penjualan.qtyb, 0)) AS mei
								, SUM(IF(MONTH(STR_TO_DATE(tb_detail_penjualan.tgl, '%Y-%m-%d')) = 06, tb_detail_penjualan.qtyb, 0)) AS jun
								, SUM(IF(MONTH(STR_TO_DATE(tb_detail_penjualan.tgl, '%Y-%m-%d')) = 07, tb_detail_penjualan.qtyb, 0)) AS jul
								, SUM(IF(MONTH(STR_TO_DATE(tb_detail_penjualan.tgl, '%Y-%m-%d')) = 08, tb_detail_penjualan.qtyb, 0)) AS ags
								, SUM(IF(MONTH(STR_TO_DATE(tb_detail_penjualan.tgl, '%Y-%m-%d')) = 09, tb_detail_penjualan.qtyb, 0)) AS sep
								, SUM(IF(MONTH(STR_TO_DATE(tb_detail_penjualan.tgl, '%Y-%m-%d')) = 10, tb_detail_penjualan.qtyb, 0)) AS okt
								, SUM(IF(MONTH(STR_TO_DATE(tb_detail_penjualan.tgl, '%Y-%m-%d')) = 11, tb_detail_penjualan.qtyb, 0)) AS nov
								, SUM(IF(MONTH(STR_TO_DATE(tb_detail_penjualan.tgl, '%Y-%m-%d')) = 12, tb_detail_penjualan.qtyb, 0)) AS des
								FROM tb_detail_penjualan INNER JOIN tb_barang ON tb_detail_penjualan.id_barang =tb_barang.id_barang 
								GROUP BY tb_detail_penjualan.id_barang ORDER BY tb_barang.minimum,tb_detail_penjualan.qtyb DESC ";
					$brg = $this->db->query($query);
						?>
						<?php
						$no=1;
						foreach ($brg->result() as $br){?>
						<tr>
							<td><?php echo $no; ?></td>
							<td ><?php echo $br->nama_barang ?></td>
							<td ><?php echo $br->jan ?></td>
							<td ><?php echo $br->feb ?></td>
							<td ><?php echo $br->mar ?></td>
							<td ><?php echo $br->apr ?></td>
							<td ><?php echo $br->mei ?></td>
							<td ><?php echo $br->jun ?></td>
							<td ><?php echo $br->jul ?></td>
							<td ><?php echo $br->ags ?></td>
							<td ><?php echo $br->sep ?></td>
							<td ><?php echo $br->okt ?></td>
							<td ><?php echo $br->nov ?></td>
							<td ><?php echo $br->des ?></td>
						</tr>
						<?php $no++;}?>
								
					</tbody>
				</table>
				</div>
  <div class="tab-pane" id="harga">
  <table  class="table table-condensed" id="example4">
					<thead bgcolor="#C4DEF6">
							<td width="7%"><b>Januari</b></td>
							<td width="7%"><b>Februari</b></td>
							<td width="7%"><b>Maret</b></td>
							<td width="7%"><b>April</b></td>
							<td width="7%"><b>Mei</b></td>
							<td width="7%"><b>Juni</b></td>
					</thead>
					<tbody>
					 <?php
					 $blk = date('%d-%m-%Y');
					$query = "SELECT tb_penjualan.no_jual
								, SUM(IF(MONTH(STR_TO_DATE(tb_penjualan.tgl_invoice, '%d-%m-%Y')) = 01, tb_penjualan.total, 0)) AS jan
								, SUM(IF(MONTH(STR_TO_DATE(tb_penjualan.tgl_invoice, '%d-%m-%Y')) = 02, tb_penjualan.total, 0)) AS feb
								, SUM(IF(MONTH(STR_TO_DATE(tb_penjualan.tgl_invoice, '%d-%m-%Y')) = 03, tb_penjualan.total, 0)) AS mar
								, SUM(IF(MONTH(STR_TO_DATE(tb_penjualan.tgl_invoice, '%d-%m-%Y')) = 04, tb_penjualan.total, 0)) AS apr
								, SUM(IF(MONTH(STR_TO_DATE(tb_penjualan.tgl_invoice, '%d-%m-%Y')) = 05, tb_penjualan.total, 0)) AS mei
								, SUM(IF(MONTH(STR_TO_DATE(tb_penjualan.tgl_invoice, '%d-%m-%Y')) = 06, tb_penjualan.total, 0)) AS jun
								, SUM(IF(MONTH(STR_TO_DATE(tb_penjualan.tgl_invoice, '%d-%m-%Y')) = 07, tb_penjualan.total, 0)) AS jul
								, SUM(IF(MONTH(STR_TO_DATE(tb_penjualan.tgl_invoice, '%d-%m-%Y')) = 08, tb_penjualan.total, 0)) AS ags
								, SUM(IF(MONTH(STR_TO_DATE(tb_penjualan.tgl_invoice, '%d-%m-%Y')) = 09, tb_penjualan.total, 0)) AS sep
								, SUM(IF(MONTH(STR_TO_DATE(tb_penjualan.tgl_invoice, '%d-%m-%Y')) = 10, tb_penjualan.total, 0)) AS okt
								, SUM(IF(MONTH(STR_TO_DATE(tb_penjualan.tgl_invoice, '%d-%m-%Y')) = 11, tb_penjualan.total, 0)) AS nov
								, SUM(IF(MONTH(STR_TO_DATE(tb_penjualan.tgl_invoice, '%d-%m-%Y')) = 12, tb_penjualan.total, 0)) AS des
								FROM tb_penjualan ORDER BY tb_penjualan.no_jual";
					$jual = $this->db->query($query);
						?>
						<?php
						$no=1;
						foreach ($jual->result() as $ju){?>
						<tr>
							<td ><?php echo "Rp. ", number_format($ju->jan) ?></td>
							<td ><?php echo "Rp. ", number_format($ju->feb) ?></td>
							<td ><?php echo "Rp. ", number_format($ju->mar) ?></td>
							<td ><?php echo "Rp. ", number_format($ju->apr) ?></td>
							<td ><?php echo "Rp. ", number_format($ju->mei) ?></td>
							<td ><?php echo "Rp. ", number_format($ju->jun) ?></td>
						</tr>
						<?php $no++;}?>
								
					</tbody>
				</table>
				<table  class="table table-condensed" id="example4">
					<thead bgcolor="#C4DEF6">
							<td width="7%"><b>Juli</b></td>
							<td width="7%"><b>Agustus</b></td>
							<td width="7%"><b>September</b></td>
							<td width="7%"><b>Oktober</b></td>
							<td width="7%"><b>November</b></td>
							<td width="7%"><b>Desember</b></td>
					</thead>
					<tbody>
						<?php
						$no=1;
						foreach ($jual->result() as $jj){?>
						<tr>
							<td ><?php echo "Rp. ", number_format($jj->jul) ?></td>
							<td ><?php echo "Rp. ", number_format($jj->ags) ?></td>
							<td ><?php echo "Rp. ", number_format($jj->sep) ?></td>
							<td ><?php echo "Rp. ", number_format($jj->okt) ?></td>
							<td ><?php echo "Rp. ", number_format($jj->nov) ?></td>
							<td ><?php echo "Rp. ", number_format($jj->des) ?></td>
						</tr>
						<?php $no++;}?>
								
					</tbody>
				</table>
  </div>
</div>
			</div>
		</div>
	</section>
<section class="col-lg-4 connectedSortable"  >
<div class="col-sm-5" style="margin-left: 3px;margin-top: 12px;">
<?php
			$rows = $this->db->query("SELECT * FROM user where username='".$this->session->username."' AND password='".$this->session->password."'" )->row_array();
			?>
							<p><?php echo $rows['kata_mutiara']; ?></p>
							<p><b>#<?php echo $rows['ciptaan']; ?></b></p>
					</div>
			<section class="col-lg-4 connectedSortable" style="margin-top: 141px;margin-left: -22px;">
							<?php if($rows['jk'] == "LAKI-LAKI"){
								echo "<img src= ".base_url('src/belanja.jpg')." class='logo hidden-xs' style='width: 264px;margin-top: -130px;margin-left: -12px;'>";
							}else{ 
								echo "<img src= ".base_url('src/belanja2.jpg')." class='logo hidden-xs' style='width: 264px;margin-top: -130px;margin-left: -12px;'>";
							}?>
					</section>
					<div class="col-sm-5" style="margin-left: 3px;margin-top: 5px;">
							<p><b>Selamat Datang
							<?php echo $this->session->userdata('nama_lengkap');?>!</b></p>
					</div>
</section>
						<?php 
				$user = $this->session->userdata('username');
				$query = "select * from menu WHERE level = '$user'";
				$j = $this->db->query($query);
				$j->num_rows();
				
			?>
			<?php foreach ($j->result() as $j){ 
			}
			?>
<section class="col-lg-4 connectedSortable" style="width: 33%;  margin-top:3px">
<div class="pengantar">
			<div class="statistik row">
			<?php if ($j->pelanggan == "Y"):?>
				<a href="<?php echo base_url();?>Pelanggan/input_pelanggan">
				<div class="col-sm-3" style="width: 33%;">
					<div class="panel panel-default sma" style="background-color: white;border: 1px;" >
						<div class="panel-body">
							<div class="column">
								<h3><span class="jumlah" style="color:black;"  ><center><i class="fa fa-user-plus"></i></center></span></h3>
								<span class="jumlah" style="color:black;"  ><center>PELANGGAN</center></span>
							</div>
						</div>
					</div>
				</div>
				</a>
			<?php endif; ?>
			<?php if ($j->penjualan == "Y"):?>
				<a href="<?php echo base_url();?>Penjualan/view_penjualan" >
				<div class="col-sm-3" style="width: 33%;">
					<div class="panel panel-default smp" style="background-color: white;border: 1px;">
						<div class="panel-body">
							<div class="column">
								<h3><span class="jumlah" style="color:black;"><center><i class="fa fa-shopping-cart"></i></center></span></h3>
								<span class="jumlah" style="color:black;"><center>PENJUALAN</center></span>
							</div>
						</div>
					</div>
				</div>
				</a>
			<?php endif; ?>
				<?php if ($j->penerimaan == "Y"):?>
				<a href="<?php echo base_url();?>Penerimaan/view_penerimaan" >
				<div class="col-sm-3" style="width: 33%;">
					<div class="panel panel-default smk" style="background-color: white;border: 1px;">
						<div class="panel-body">
							<div class="column">
								<h3><span class="jumlah" style="color:black;"><center></i><i class="fa fa-money"></i></center></span></h3>
								<span class="jumlah" style="color:black;"><center>PENERIMAAN</center></span>
							</div>
						</div>
					</div>
				</div>
				</a>
				<?php endif; ?>
				</div>
		</div>
<div class="pengantar">
			<div class="statistik row" >
			<?php if ($j->l_saldo_supplier == "Y" ): ?>
				<a href="<?php echo base_url();?>Laporan/Laporan_saldo" >
				<div class="col-sm-3" style="width: 33%;margin-top: -30px;">
					<div class="panel panel-default sma" style="background-color: white;border: 1px;">
						<div class="panel-body">
							<div class="column">
								<h3><span class="jumlah" style="color:black;"><center><i class="fa fa-folder-open"></i></center></span></h3>
								<span class="jumlah" style="color:black;"><center>SALDO</center></span>
							</div>
						</div>
					</div>
				</div>
				</a>
			<?php endif; ?>
			<?php if ($j->pembelian == "Y" ): ?>
				<a href="<?php echo base_url();?>Pembelian/input_pembelian" >
				<div class="col-sm-3" style="width: 33%;margin-top: -30px;">
					<div class="panel panel-default smp" style="background-color: white;border: 1px;">
						<div class="panel-body">
							<div class="column">
								<h3><span class="jumlah" style="color:black;"><center><i class="fa fa-shopping-cart"></i></center></span></h3>
								<span class="jumlah" style="color:black;"><center>PEMBELIAN</center></span>
							</div>
						</div>
					</div>
				</div>
				</a>
			<?php endif;?>
				<?php if ($j->pembayaran == "Y" ): ?>
				<a href="<?php echo base_url();?>Pembayaran/view_pembayaran" >
				<div class="col-sm-3" style="width: 33%;margin-top: -30px;">
					<div class="panel panel-default smk" style="background-color: white;border: 1px;">
						<div class="panel-body">
							<div class="column">
								<h3><span class="jumlah" style="color:black;"><center><i class="fa fa-money"></i></center></span></h3>
								<span class="jumlah" style="color:black;"><center>PEMBAYARAN</center></span>
							</div>
						</div>
					</div>
				</div>
				</a>
				<?php endif;?>
				</div>
		</div>
<div class="pengantar">
			<div class="statistik row" >
			<?php if ($j->l_transaksi_pembelian == "Y" ): ?>
				<a href="<?php echo base_url();?>Laporan/lap_transaksib" >
				<div class="col-sm-3" style="width: 33%;margin-top: -30px;">
					<div class="panel panel-default sma" style="background-color: white;border: 1px;">
						<div class="panel-body">
							<div class="column">
								<h3><span class="jumlah" style="color:black;"><center><i class="fa fa-file-pdf-o"></i> </center></span></h3>
								<span class="jumlah" style="color:black;"><center> LAP PEMBELIAN</center></span>
							</div>
						</div>
					</div>
				</div>
				</a>
				<?php endif;?>
				<?php if ($j->l_transaksi_penjualan == "Y" ): ?>
				<a href="<?php echo base_url();?>Laporan/lap_transaksi">
				<div class="col-sm-3" style="width: 33%;margin-top: -30px;">
					<div class="panel panel-default smp" style="background-color: white;border: 1px;">
						<div class="panel-body">
							<div class="column">
								<h3><span class="jumlah" style="color:black;"><center><i class="fa fa-file-pdf-o"></i></center></span></h3>
								<span class="jumlah" style="color:black;"><center>LAP PENJUALAN</center></span>
							</div>
						</div>
					</div>
				</div>
				</a>
				<?php endif;?>
				<?php if ($j->surat_jalan == "Y" ): ?>
				<a href="<?php echo base_url();?>Surat_jalan/view_surat_jalan">
				<div class="col-sm-3" style="width: 33%;margin-top: -30px;">
					<div class="panel panel-default smk" style="background-color: white;border: 1px;">
						<div class="panel-body">
							<div class="column">
								<h3><span class="jumlah" style="color:black;"><center><i class="fa fa-truck"></i></center></span></h3>
								<span class="jumlah" style="color:black;"><center>PENGIRIMAN</center></span>
							</div>
						</div>
					</div>
				</div>
				</a>
				<?php endif;?>
				</div>
		</div>
</section>
				
		  
</div>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/chart.js/Chart.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

<script src="<?php echo base_url(); ?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.min.js"></script>
  <script>
  $(function () {
    //BAR CHART
  var bar = new Morris.Bar({
      element: 'bar',
      resize: true,
      data: [
        {y: 'JANUARI', a: <?php echo $ju->jan ?>, b: 90},
        {y: '2007', a: 75, b: 65},
        {y: '2008', a: 50, b: 40},
        {y: '2009', a: 75, b: 65},
        {y: '2010', a: 50, b: 40},
        {y: '2011', a: 75, b: 65},
        {y: '2012', a: 100, b: 90}
      ],
      barColors: ['#00a65a', '#f56954'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['PENJUALAN', 'PENJUALAN'],
      hideHover: 'auto'
    });
  });
</script>
</body>
<script>
  
    $("#example").DataTable({
     
      
      searching   : true,
      bInfo : false,
      bLengthChange : false,
      bPaginate : true,
      ordering	:	true,
	  lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]]
      
      
    });
		 $('#example2').DataTable({
      paging      : true,
      lengthChange: false,
      searching   : true,
      ordering    : true,
      info        : false,
      autoWidth   : false,
	  lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]]
    });
   
  	 $('#example3').DataTable({
      paging      : true,
      lengthChange: false,
      searching   : true,
      ordering    : true,
      info        : false,
      autoWidth   : false,
	  lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]]
    });
	 $('#example4').DataTable({
      paging      : true,
      lengthChange: false,
      searching   : true,
      ordering    : true,
      info        : false,
      autoWidth   : false,
	  lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]]
    });
	$('#example5').DataTable({
      paging      : true,
      lengthChange: false,
      searching   : true,
      ordering    : true,
      info        : false,
      autoWidth   : false,
	  lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]]
    });
</script>
 <script type="text/javascript">
$(document).on('keydown', 'body', function(e){
	var charCode = ( e.which ) ? e.which : event.keyCode;

	if(charCode == 118) //F7
	{
		BarisBaru();
		return false;
	}

	if(charCode == 37) //enter
	{
		$('#nama_barang').focus();
	}
	if(charCode == 112) //panah atas
	{
		$('#f1').click();
	}
	if(charCode == 39) //panah kanan	
	{
		$('#potongan').focus();
	}
	if(charCode == 113) //panah bawah
	{
		$('#ket').focus();
	}
	if(charCode == 35) //F9
	{
		$('#simpan').click();
	}
});
document.onkeydown = function (e) {
		switch (e.keyCode) {
		   
			case 112:
				e.preventDefault();
				
				setTimeout('self.location.href="<?php echo base_url();?>Penerimaan/view_penerimaan"', 0);
				break;
		   
			case 114:
				e.preventDefault();
				
				setTimeout('self.location.href="admin.php?page=penjualan&aksi=piutang"', 0);
				break;
		}
}
  </script>
</html>