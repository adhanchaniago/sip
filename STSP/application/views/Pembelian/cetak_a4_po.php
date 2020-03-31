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
                font-family: "Verdana";
            }
            .content {
                width: 254mm;
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
				font-size:12px;
				margin-top:0px;
				margin-left:0px;
				text-transform: uppercase;
				letter-spacing: 4.0pt;
			}
			#FB{
				font-size:22px;
				margin-top:0px;
				margin-left:0px;
				text-transform: uppercase;
				letter-spacing: 4.0pt;
			}
			#FC{
				font-size:11px;
				margin-top:0px;
				margin-left:0px;
				text-transform: uppercase;
				letter-spacing: 3.0pt;
				
			}
			#FD{
				font-size:12px;
				margin-top:0px;
				margin-left:0px;
				
			}
        </style>
<div class = "page">
<body onload="window.print();" class="html" >
<div class = "row ">
	<section class="col-lg-12 connectedSortable" style="margin-top: 5px;">
		<div class="box box-primary">
				<div class="box-body" >
					<section class="col-lg-2 connectedSortable" style="margin-left: -78px;margin-top: -1px;padding: 10px; width: 232px;" id="FB" > 
					<div class="form-group"  style="margin-left:64px;">
							<div class="col-sm-42" style ="width:18%">
								<td height="40" colspan="5" align="center" ><b><font color="#000000"> &nbspBJM </font></b></td>
							</div>
							
							</div>
					</section > 
					
					<section class="col-lg-7 connectedSortable" style="margin-left: -127px;margin-top: 13px;width: 70%;" id="FC"> 
					<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data" >
					<div class="form-group"  style="margin-left:64px;">
							<div class="col-sm-42" style ="width:12%">
								<td height="40" colspan="5" align="center" id="fB"><b><font color="#000000"> Nama</font></b></td>
							</div>
							<div class="col-sm-42"style ="width:85%" >
								<td><b><?php echo $d['nama_pelanggan'];?></b></td>
							</div>
							</div>
							<div class="form-group"  style="margin-left:64px;">
							<div class="col-sm-42" style ="width:12%">
								<td height="40" colspan="5" align="center" id="fB"><b><font color="#000000"> Ship TO</font></b></td>
							</div>
							<div class="col-sm-42"style ="width:85%" >
								<td><b><?php echo $d['alamat'];?></b></td>
							</div>
							</div>
							<div class="form-group"  style="margin-left:64px;">
							<div class="col-sm-42" style ="width:12%">
								<td height="40" colspan="5" align="center" id="fB"><b><font color="#000000"> Ket</font></b></td>
							</div>
							<div class="col-sm-42"style ="width:85%" >
								<td><b><?php echo  $d['keterangan'];?></b></td>
							</div>
							</div>
							</section>
<section class="col-lg-7 connectedSortable" style="margin-left: -964px;margin-top: 66px; width: 71%;" >
<table align="left" width="900px"  >
	<tr id="FC">
		<td width = "5%" align="left" > <b> No</b></td>
		<td width = "45%"> <b>Nama Barang</b></td>
		<td align="left" width = "20%"><b>Jumlah Po</b></td>
	</tr>
	
		<tr height="20px">
		<td  id="FD"colspan="6"align="right">_______________________________________________________________________________________________________________</td>
		<td></td>
		<td></td>
		<td></td>
		<td ></td>
		<td ></td>
	</tr>
	<?php
	$totalan = 0; $diskon=0; $hasil4=0; $hasil5=0; $hasil6=0; $jumlah = 0;
	//$query1 = "SELECT * FROM tb_penjualan";
	$no_po = $this->uri->segment(3);
	$query1 = "SELECT tb_po.no_po,tb_detail_po.id_barang,tb_detail_po.qty,tb_detail_po.harga_jual,tb_detail_po.satuan,tb_barang.nama_barang FROM tb_po INNER JOIN tb_detail_po ON tb_po.no_po = tb_detail_po.no_po INNER JOIN tb_barang ON tb_detail_po.id_barang = tb_barang.id_barang WHERE tb_po.no_po = '$no_po'";
	$cari1 = $this->db->query($query1);
	
	if(isset($cari1)){
	foreach ($cari1->result_array() as $t){
	?>
	
	<tr id="FC">
		<td><?php echo $no;?></td>
		<td><?php echo $t['nama_barang'];?></td>
		<td><?php echo $t['qty'];?> <?php echo $t['satuan'];?> </td>
	</tr>
	<?php
	$no++;}}
	?>
	<tr>
	<td height="10"> </td>
	<td height="10"> </td>
	</tr>
	
	
	<tr>
	<tr>
	<td height="10"> </td>
	<td height="10"> </td>
	</tr>
	</table>
	
							
					</section>
					
					
					<section class="col-lg-5 connectedSortable" style="width: 28%;margin-top: 14px;margin-left: -45px;height: 57%;" >
					<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data" >
							<div class="form-group" id="FC">
								<td><?php echo $d['no_sj'];?>/<?php echo $d['id_pelanggan'];?>/<?php echo $d['no_reff'];?></td>
							<div class="col-sm-42" >
								<td>No SJ</td>
							</div>
							</div>
							<div class="form-group" id="FC">
								<td><?php echo $d['nama_pelanggan'];?></td>
							<div class="col-sm-42" >
								<td>Nama </td>
							</div>
							</div>
							<div class="form-group" id="FC">
								<td> <?php echo date('d-m-Y');?></td>
							<div class="col-sm-42" >
								<td>Tgl </td>
							</div>
							</div>
							
							<div class="form-group" id="FD" style = "margin-top:18px;">
								<td>_______________________________________________</td>
							</div>
							
							</section>
					<section class="col-lg-5 connectedSortable" style="width:30%;margin-left: 69%;">
							<div class="form-group" style="margin-bottom: 5%; margin-right: -11px; " align="right" id="FC">
							<div class="col-sm-42" align="left">
									<td></td>
							</div>
							</div>
							<table align="center" id="FC" width="380px">
							<tr>
							
								<td colspan="2" align="center">Pengirim</td>
								<td align="center">Penerima</td>
								
							</tr>
							<tr>
								<td align="center" height="100px"></td>
							</tr>
							<tr>
								<td colspan="2" align="center">( &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp )</td>
								<td colspan="2" align="center">( &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp )</td>
							</tr>
							</table>
							</section>
							</form>
</div>
</div>
</section>
</div>
</body>
</div>
 <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		
  <script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
</html>