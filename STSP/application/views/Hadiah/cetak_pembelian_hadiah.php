 <html>
<head>
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
  
  
</head>
<style type="text/css">
            .html {
                font-family: "Arial";
            }
            .content {
                width: 88mm;
                font-size: 12px;
            }
            .content .title {
                text-align: center;
            }
            .content .head-desc {
                margin-top: 0px;
                display: table;
                width: 100%;
            }
            .content .head-desc > div {
                display: table-cell;
            }
            .content .head-desc .user {
                text-align: right;
            }
            .content .nota {
                text-align: center;
                margin-top: 0px;
                margin-bottom: 5px;
            }
            .content .separate {
                margin-top: 0px;
                margin-bottom: 15px;
                border-top: 1px dashed #000;
            }
            .content .transaction-table {
                width: 100%;
                font-size: 12px;
            }
            .content .transaction-table .name {
                width: 185px;
            }
            .content .transaction-table .qty {
                text-align: center;
            }
            .content .transaction-table .sell-price, .content .transaction-table .final-price {
                text-align: right;
                width: 65px;
            }
            .content .transaction-table tr td {
                vertical-align: top;
            }
            .content .transaction-table .price-tr td {
                padding-top: 7px;
                padding-bottom: 7px;
            }
            .content .transaction-table .discount-tr td {
                padding-top: 7px;
                padding-bottom: 7px;
            }
            .content .transaction-table .separate-line {
                height: 1px;
                border-top: 1px dashed #000;
            }
            .content .thanks {
                margin-top: 0px;
                text-align: center;
            }
            .content .azost {
                margin-top:0px;
                text-align: center;
                font-size:10px;
            }
            @media print {
                @page  { 
                    width: 88mm;
                    margin: 0mm;
                    height: -1mm;
                }
				div.page { page-break-after: always}
            }
			#FK{
				font-size:23px;
				margin-top:0px;
				margin-left:0px;
				text-transform: uppercase;
			}
			#FB{
				font-size:30px;
				margin-top:0px;
				margin-left:0px;
				text-transform: uppercase;
			}
			#FC{
				font-size:23px;
				margin-top:0px;
				margin-left:0px;
				text-transform: uppercase;
				
			}
			#FF{
				font-size:18px;
				margin-top:0px;
				margin-left:0px;
				text-transform: uppercase;
				
			}
			@media only print, print {
  body.non-print #product-nav,
  body.non-print #product-content,
  body.non-print #sales-forms-container,
  body.non-print #tab-quote,
  body.non-print #tab-upgrade,
  body.non-print #tab-contact,
  body.non-print #sales-form-phone,
  body.non-print .product-jumbo-strech .bottom-wrapper,
  body.non-print .panel-block-text,
  body.non-print footer,
  .modal-backdrop.toPrint {
    display: none !important;
    visibility: hidden !important;
  }
  .modal.toPrint {
    position: relative;
    overflow: hidden;
    visibility:visible;
    width: 100%;
    font-size: 80%;
  }
  .modal.toPrint .nav .li {
    visibility: hidden;
  }
  .modal.toPrint .nav .li.active {
    visibility: visible;
  }
}
        </style>
<div class = "page">
<body  onload="window.print();history.go(-1);" > <!--- history.go(-1); --->
<table align="center"  class="html" width="610px" id="FK">
	<tr bgcolor="#fff">
		<td colspan="5" align="center" id="fB"><b><font color="#000000"> &nbsp Faktur P. Hadiah</font></b></td>
	</tr>
	<tr>
		<td  height="80" colspan="3" align="center"></td>
	</tr>
	<tr>
	<td width = "90px">Inv</td>
	<td width = "240px"><?php echo $d['no_beli'];?></td>
	<td align = "right"> Tgl</td>
	<td align = "right"> <?php echo date('d-m-Y');?></td>
	</tr>
	<tr>
	<td width = "90px">Nama</td>
	<td width = "240px"><?php echo $d['nama_toko'];?></td>
	<td align = "right">Telp</td>
	<td align = "right"> <?php echo $d['no_telp'];?></td>
	</tr>
	<tr>
	<td>Ket  </td>
	<td colspan="5"><?php echo $d['keterangan'];?></td>
	</tr>
	<tr>
		<td  height="30" colspan="3" align="center"></td>
	</tr>
<table  align="center"  class="html" width="610px" id="FC">
	
	
	<tr>
		<td width = "60%"><b>Nama Barang</b></td>
		<td align="center" width = "25%"><b>QTY</b></td>
		<td  align="right"width = "18%"><b>Harga</b></td>
	</tr>
	<tr>
	<td colspan="5">_______________________________________________</td>
	</tr>
	<?php
	$total = 0; $diskon=0; $hasil=0; $hasil2=0; $hasil3=0;
	//$query1 = "SELECT * FROM tb_penjualan";
	$no_beli = $this->uri->segment(3);
	$query = "SELECT pembelian_hadiah_detail.no_beli,pembelian_hadiah_detail.id_barang,tb_hadiah.nama_barang,pembelian_hadiah_detail.qtyb,pembelian_hadiah_detail.harga_beli FROM pembelian_hadiah_detail INNER JOIN tb_hadiah ON pembelian_hadiah_detail.id_barang = tb_hadiah.id_barang WHERE pembelian_hadiah_detail.no_beli = '$no_beli'";
	$cari = $this->db->query($query);
	if(isset($cari)){
	foreach ($cari->result_array() as $t){
		$subtotal = $t['qtyb']*$t['harga_beli'];
		$total = $total + $subtotal;
	?>
	
	<tr>
		<td><?php echo $t['nama_barang'];?></td>
		<td  align="center"><?php echo $t['qtyb'];?></td>
		<td align="right"><?php echo number_format($t['harga_beli']);?></td>
	</tr>
	<?php
	}}
	?>
	<tr>
	<td height="20"> </td>
	<td height="20"> </td>
	</tr>
	<tr>
		<td></td>
		<td  align="center">Total</td>
		<td align="right"><?php echo number_format($d['total']);?></td>
	</tr>
	<?php 
	if($d['cash'] > 0){
	echo "<tr>
	<td ></td>
	<td align = center> Cash  </td>
	<td align =right>".number_format($d['cash'],2)." </td>
	</tr>";
	
	}
	?>
	<?php 
	if($d['debet'] > 0){
	echo "<tr>
	<td ></td>
	<td align = center> Debet  </td>
	<td align =right>".$d['bank1'].". ".number_format($d['debet'],2)." </td>
	</tr>";
	}
	?>
	<?php 
	if($d['transfer'] > 0){
	echo "<tr>
	<td ></td>
	<td align = center> Debet  </td>
	<td align =right>".$d['bank2'].". ".number_format($d['transfer'],2)." </td>
	</tr>";
	}
	?>
	<?php 
	if($d['giro'] > 0){
	echo "<tr>
	<td ></td>
	<td align = center> Giro  </td>
	<td align =right>".number_format($d['giro'],2)." </td>
	</tr>";
	}
	?>
	<?php 
	if($d['giro'] > 0){
	echo "<tr>
	<td ></td>
	<td align = center> Ket Giro  </td>
	<td align =right>".$d['ket_giro']." </td>
	</tr>";
	}
	?>
	
	<tr>
	<td height="10"> </td>
	</tr>
	</table>
	<table align="center" class="html" width="480px" id="FK">
	<tr>
		<td  align="center" height="150"  width="300">  Hormat Kami </td>
		<td height="300px"> </td>
		<td height="300px"> </td>
		<td align="center"  height="10" colspan ="2"> Penerima</td>
	</tr>
	<tr>
		<td align="center"height="200px"><?php echo $d['user'];?></td>
		<td height="100px"> </td>
		<td height="100px"> </td>
		<td align="center"  height="10" colspan ="3"  ></td>
	</tr>
		
</table>
</body>
</div>
 <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		
  <script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  

  
</html>