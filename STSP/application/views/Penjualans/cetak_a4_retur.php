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
				letter-spacing: 2.0pt;
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

<body onload="window.print();" class="html" >
<!--window.location.href = '<?php echo base_url('Penjualan/view_retur');?>'-->
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
					
					<section class="col-lg-7 connectedSortable" style="margin-left: -127px;margin-top: 13px;width: 70%;" id="FC"> 
					<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data" >
					<div class="form-group"  style="margin-left:64px;">
							<div class="col-sm-42" style ="width:12%">
								<td height="40" colspan="5" align="center" id="fB"><b><font color="#000000"> Nama</font></b></td>
							</div>
							<div class="col-sm-42"style ="width:85%" >
								<td ><b><?php echo $d['nama_pelanggan'];?></b></td>
							</div>
							</div>
					<div class="form-group"  style="margin-left:64px;">
							<div class="col-sm-42" style ="width:12%">
								<td height="40" colspan="5" align="center" id="fB"><b><font color="#000000">Ket</font></b></td>
							</div>
							<div class="col-sm-42"style ="width:85%" >
								<td><b><?php echo  $d['keterangan'];?></b><td>
							</div>
							</div>
							</section>
<section class="col-lg-7 connectedSortable" style="margin-left: -964px;margin-top: 81px; width: 71%;" >
<table align="left" width="900px"  >
	<tr id="FC" height="20px">
		<td width = "5%" align="left" > <b> No</b></td>
		<td width = "50%"> <b>Retur Barang</b></td>
		<td align="center" width = "11%"><b>QTY</b></td>
		<td align="right" width = "13%"><b>Harga</b></td>
		<td align="center" width = "10%"><b>Disc</b></td>
		<td align="right"  width = "13%"><b>Jumlah</b></td>
	</tr>
	
		<tr id="FD" style="border-top: 2px solid #000000; margin-top: 1em; padding-top: 1em;">
		<td  ></td>
		</tr>
	<?php
	$total = 0; $diskon=0; $hasil=0; $hasil2=0; $hasil3=0;$no=1;
	//$query1 = "SELECT * FROM tb_penjualan";
	$no_retur = $this->uri->segment(3);
	$query = "SELECT retur_detail.no_retur,retur_detail.tanggal,retur_detail.id_barang,retur_detail.qtyb,retur_detail.satuan_besar,retur_detail.harga_beli,retur_detail.disc,retur_detail.disc1,tb_barang.nama_barang FROM retur_detail INNER JOIN tb_barang ON retur_detail.id_barang = tb_barang.id_barang WHERE retur_detail.no_retur = '$no_retur'";
	$cari = $this->db->query($query);
	if(isset($cari)){
	foreach ($cari->result_array() as $t){
		$subtotal = $t['qtyb']*$t['harga_beli'];
		$diskon =$t['qtyb']*$t['harga_beli']*$t['disc']/100;
		$hasil =$subtotal-$diskon;
		$hasil2 =$hasil*$t['disc1']/100;
		$hasil3 =$hasil-$hasil2;
		$total = $total+$hasil3;
	?>
	
	<tr id="FC">
		<td><?php echo $no;?></td>
		<td><?php echo $t['nama_barang'];?></td>
		<td align="center"><?php echo $t['qtyb'];?> <?php echo $t['satuan_besar'];?> </td>
		<td align="right"><?php echo number_format($t['harga_beli']);?></td>
		<td align="center">		<?php if($t['disc'] > 0){
										echo $t['disc'].'+'.$t['disc1'];
									}else{
										echo "";
									}
									?></td>
		<td align="right"><?php echo number_format($hasil3);?></td>
	</tr>
	<?php
	$no++;}}
	?>
	<tr>
	<tr>
	<td height="10"> </td>
	<td height="10"> </td>
	</tr>
	</table>
	
					</section>
					</form>
					
					<section class="col-lg-5 connectedSortable" style="width: 28%;margin-top: 14px;margin-left: -45px;height: 52%;" >
					<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data" >
							<div class="form-group" id="FC">
								<td><?php echo $d['no_retur'];?>/<?php echo $d['id_pelanggan'];?></td>
							<div class="col-sm-42" >
								<td>No RTR</td>
							</div>
							</div>
							<div class="form-group" id="FC">
								<td><?php echo $d['no_jual'];?>/<?php echo $d['id_pelanggan'];?>/<?php echo $d['no_reff_inv'];?></td>
							<div class="col-sm-42" >
								<td>No Inv</td>
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
							<div class="form-group" id="FC" style="margin-top: 4px;">
								
							<div class="col-sm-42" >
							</div>
							</div>
							<div id="FD" style="border-top: 1.5px solid #000000; margin-top: 1em; padding-top: 1em;margin-top:2px"></div>
							<div class="form-group" align="right" style="margin-right: -11px;margin-top: -11px;" id="FC">
								<td align="right"><b><?php echo number_format($total,2);?></b></td>
							<div class="col-sm-42" align="left" >
								<td ><b>Total </b></td>
							</div>
							</div>
							
							<div class="form-group" align="right" style="margin-right: -11px;" id="FC">
									<td ><?php if($d['potongan'] > 0){
										echo number_format($d['potongan'],2);
									}else{
										echo " ";
									}
									?></td>
							<div class="col-sm-42" align="left" >
									<td><?php if($d['potongan'] > 0){
										echo "Potongan";
									}else{
										echo " ";
									}
									?></td>
							</div>
							</div>
							<div class="form-group" align="right" style="margin-right: -11px;"id="FC">
									<td><?php if($d['nominal1'] > 0){
										echo number_format($d['nominal1'],2);
									}else{
										echo " ";
									}
									?></td>
							<div class="col-sm-42"align="left" >
									<td><?php if($d['nominal1'] > 0){
										echo $d['ongkir1'];
									}else{
										echo " ";
									}
									?></td>
							</div>
							</div>
							<div class="form-group" align="right" style="margin-right: -11px;" id="FC">
									<td><b><?php if($d['total'] > 0){
										echo number_format($d['total'],2);
									}else{
										echo " ";
									}
									?></b></td>
							<div class="col-sm-42" align="left" >
									<td><b><?php if($d['total'] > 0){
										echo "Grand Total";
									}else{
										echo " ";
									}
									?></b></td>
							</div>
							</div>
							<div class="form-group" align="right" style="margin-right: -11px;" id="FC">
									<td><?php if($d['cash'] > 0){
										echo number_format($d['cash'],2);
									}else{
										echo " ";
									}
									?></td>
							<div class="col-sm-42" align="left" >
									<td><?php if($d['cash'] > 0){
										echo "Cash";
									}else{
										echo " ";
									}
									?></td>
							</div>
							</div>
							<div class="form-group" align="right" style="margin-right: -11px;"id="FC">
									<td><?php if($d['debet'] > 0){
										echo $d['bank1'],"|", number_format($d['debet'],2);
									}else{
										echo " ";
									}
									?></td>
							<div class="col-sm-42" align="left" >
									<td><?php if($d['debet'] > 0){
										echo "Debet";
									}else{
										echo " ";
									}
									?></td>
							</div>
							</div>
							<div class="form-group" align="right" style="margin-right: -11px;" id="FC">
									<td><?php if($d['transfer'] > 0){
										echo $d['bank2'],"|", number_format($d['transfer'],2);
									}else{
										echo " ";
									}
									?></td>
									
							<div class="col-sm-42" align="left">
								<td><?php if($d['transfer'] > 0){
									echo "Transfer";
								}else{
									echo " ";
								}
								?></td>
							</div>
							</div>
							<div class="form-group" align="right"style="margin-right: -11px;" id="FC">
									<td><?php if($d['giro'] > 0){
										echo number_format($d['giro'],2);
									}else{
										echo " ";
									}
									?></td>
							<div class="col-sm-42" align="left">
								<td><?php if($d['giro'] > 0){
										echo "Giro";
									}else{
										echo " ";
									}
									?></td>
							</div>
							</div>
							</section>
					<section class="col-lg-5 connectedSortable" style="width:30%;margin-left: 69%;">
					<div class="form-group" style="margin-bottom: 5%; margin-right: -11px; " align="right" id="FC">
							<div class="col-sm-42" align="left">
									<td></td>
							</div>
							</div>
							<table align="center" id="FC" width="380px" >
							<tr>
								<td colspan="2"><b> <i class = "fa fa-phone"></i> 5511090</b></td>
							</tr>
							<tr>
								<td colspan="2"><b><i class = "fa fa-phone"></i> 5548362/63</b></td>
							</tr>
							<tr id="FC"height="30px">
								<td colspan="2"><i class = "fa fa-fax"></i> <b>0812 8791 7856</b></td>
							</tr>
							<tr id="FD" style="border-top: 2px solid #000000; margin-top: 1em; padding-top: 1em;">
								<td  ></td>
							</tr>
							<tr>
							
								<td align="center" width="40%">Hormat Kami</td>
								<td colspan="2" align="center">Penerima</td>
								
							</tr>
							<tr>
								<td align="center" height="70px"></td>
							</tr>
							<tr>
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