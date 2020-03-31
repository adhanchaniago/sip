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
                font-family: "Arial Narrow";
            }.html1 {
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
            }
			#FK{
				font-size:14px;
				margin-top:0px;
				margin-left:0px;
				text-transform: uppercase;
				letter-spacing: 4.0pt;
			}
			#FB{
				font-size:24px;
				margin-top:0px;
				margin-left:0px;
				text-transform: uppercase;
				letter-spacing: 6.0pt;
			}
			#FC{
				font-size:13.5px;
				margin-top:0px;
				margin-left:0px;
				text-transform: uppercase;
				letter-spacing: 4.0pt;
				
			}
			#FD{
				font-size:12px;
				margin-top:-1px;
				margin-left:0px;
				
			}
        </style>

<body onload="window.print(); " class="html" ><!--- history.go(-1); --->
<div class = "row ">
	<section class="col-lg-12 connectedSortable" style="margin-top: 5px;">
		<div class="box box-primary">
				<div class="box-body" >
					<section class="col-lg-2 connectedSortable" style="margin-left: -78px;margin-top: -1px;padding: 10px; width: 232px;" id="FB" > 
					<div class="form-group"  style="margin-left:64px;">
							<div class="col-sm-42" style ="width:18%">
								<td height="40" colspan="5" align="center" ><b><font color="#000000" style="font-size: 140%;" class="html1"> &nbspSTS </font></b></td>
							</div>
							
							</div>
					</section > 
					
					<section class="col-lg-7 connectedSortable" style="margin-left: -78px;margin-top: -1px;padding: 10px; width: 560px;" id="FB" > 
					<div class="form-group"  style="margin-left:64px;">
							<div class="col-sm-42" style ="width:100%;margin-left: -58px;">
								<td height="40" ><b><font color="#000000" class="html1"> &nbsp Tanda Terima</font></b></td>
							</div>
							
							</div>
					</section > 
<section class="col-lg-7 connectedSortable" style="margin-left: -616px;margin-top: 66px; width: 71%;" >
<table align="left" width="890px"  >
	<tr id="FC" height="20px">
		<td width = "60%"><b>Nama Barang</b></td>
		<td align="center" width = "25%"><b>QTY</b></td>
	</tr>
	<tr id="FD" style="border-top: 2px solid #000000; margin-top: 1em; padding-top: 1em;">
		<td  ></td>
	</tr>
	<?php
	$total = 0; $diskon=0; $hasil=0; $hasil2=0; $hasil3=0;
	//$query1 = "SELECT * FROM tb_penjualan";
	$no_pemberian = $this->uri->segment(3);
	$query = "SELECT tb_detail_pemberian_hadiah.no_pemberian,tb_detail_pemberian_hadiah.id_barang,tb_hadiah.nama_barang,tb_detail_pemberian_hadiah.qtyb,tb_detail_pemberian_hadiah.harga_jual FROM tb_detail_pemberian_hadiah INNER JOIN tb_hadiah ON tb_detail_pemberian_hadiah.id_barang = tb_hadiah.id_barang WHERE tb_detail_pemberian_hadiah.no_pemberian = '$no_pemberian'";
	$cari = $this->db->query($query);
	if(isset($cari)){
	foreach ($cari->result_array() as $t){
		$subtotal = $t['qtyb']*$t['harga_jual'];
		$total = $total + $subtotal;
	?>
	
	<tr id="FC">
		<td><?php echo $t['nama_barang'];?></td>
		<td  align="center"><?php echo $t['qtyb'];?></td>
	</tr>
	<?php
	}}
	?>
	</table>

					</section>
					</form>
					
					<section class="col-lg-5 connectedSortable" style="width: 28%;margin-top: 14px;margin-left: -45px;" >
					<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data" >
							<div class="form-group" id="FC">
								<td><?php echo $d['no_pemberian'];?>/<?php echo $d['id_pelanggan'];?></td>
							<div class="col-sm-42" >
								<td>No Pbr</td>
							</div>
							</div>
							<div class="form-group" id="FC">
								<td><?php echo $d['nama_pelanggan'];?></td>
							<div class="col-sm-42" >
								<td>Nama </td>
							</div>
							</div>
							<div class="form-group" id="FC" >
								<td><?php echo date('d-m-Y',strtotime($d['tgl_pemberian']));?></td>
							<div class="col-sm-42" >
								<td>Tgl </td>
							</div>
							</div>
							<div style="border-top: 2px solid #000000; margin-top: 1em; padding-top: 1em;"></div>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<table  width="365px" >
							<tr id="FC">
							<td>
							<b><font color="#000000" size = "2px"> <?php echo $d['cetak'];?> </font></b></td>
							</tr>
							<tr id="FC">
								<td colspan="2"><b> <i class = "fa fa-phone"></i> 5511090</b></td>
							</tr>
							<tr id="FC">
								<td colspan="2"><b><i class = "fa fa-phone"></i> 5548362/63</b></td>
							</tr>
							<tr id="FC" height="18px">
								<td colspan="2"><i class = "fa fa-fax"></i> <b>0812 8791 7856</b></td>
							</tr>
							<tr  id="FD" style="border-top: 2px solid #000000; margin-top: 1em; padding-top: 1em;">
									<td></td>
							</tr>
							<tr id="FC">
							
								<td align="center" width="40%">Hormat Kami</td>
								<td colspan="2" align="center">Penerima</td>
								
							</tr>
							<tr >
								<td align="center" height="70px"></td>
							</tr>
							<tr id="FC">
								<td align="center"><?php echo $d['user'];?></td>
								<td align="center"><?php echo $d['nama_pelanggan'];?></td>
							</tr>
							</table>
							</section>
							</form>
</div>
</div>
</section>
</div>
</body>
 <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		
  <script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
</html>