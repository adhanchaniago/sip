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
            }
			.html1 {
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
				font-size:10px;
				margin-top:0px;
				margin-left:0px;
				
			}
        </style>
<div class = "page">
<body class="html" onload="window.print();"><!--onload="window.print();window.location.href = '<?php echo base_url('Penjualan/input_penjualan');?>';-->
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
								<td><b><?php echo $d['nama_pelanggan'];?></b></td>
							</div>
							</div>
							<div class="form-group"  style="margin-left:64px;">
							<div class="col-sm-42" style ="width:12%">
								<td height="40" colspan="5" align="center" id="fB"><b><font color="#000000"> Ship TO</font></b></td>
							</div>
							<div class="col-sm-42"style ="width:85%" >
								<td><b><?php echo $d['ket_alamat'];?></b></td>
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
<section class="col-lg-7 connectedSortable" style="margin-left: -964px;margin-top: 80px; width: 71%;" >
<table align="left" width="900px"  >
	<tr id="FC" height="20">
		<td width = "5%" align="left" > <b> No</b></td>
		<td width = "50%"> <b>Nama Barang</b></td>
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
	$no_jual = $this->uri->segment(3);
	$query = "SELECT tb_detail_penjualans.no_jual,tb_detail_penjualans.id_barang,nama_barang,qtyb,tb_detail_penjualans.harga_beli,tb_detail_penjualans.disc,tb_detail_penjualans.disc1,tb_detail_penjualans.satuan_besar FROM tb_detail_penjualans INNER JOIN tb_barang ON tb_detail_penjualans.id_barang=tb_barang.id_barang WHERE tb_detail_penjualans.no_jual = '$no_jual'";
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
		<td><?php echo $t['qtyb'];?> <?php echo $t['satuan_besar'];?> </td>
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
	<td height="10"> </td>
	<td height="10"> </td>
	</tr>
	<?php 
	$totalan = 0; $diskon=0; $hasil4=0; $hasil5=0; $hasil6=0; $jumlah = 0;
	//$query1 = "SELECT * FROM tb_penjualan";
	$no_jual = $this->uri->segment(3);
	$query1 = "SELECT tb_detail_retur.no_jual, tb_detail_retur.id_barang,nama_barang,tb_detail_retur.qtyb,tb_detail_retur.satuan_besar,tb_detail_retur.harga_beli,tb_detail_retur.disc,
				tb_detail_retur.disc1 FROM tb_detail_retur INNER JOIN tb_barang ON tb_detail_retur.id_barang = tb_barang.id_barang WHERE tb_detail_retur.no_jual = '$no_jual'";
	$cari1 = $this->db->query($query1);
	
	?>
	<?php
	$h = 0;
	foreach ($cari1->result_array() as $h){
	?>
	<?php } ?>
	
	<tr id="FC">
	<td align="left"colspan="2"><?php if($h['no_jual'] > 0){ echo "  <b>Retur</b>"; }else{ echo "";}?></td>
	</tr>
	<tr>
	<td height = "10px"> </td>
	</tr>
	
	<?php
	$no=1;
	$totalan=0;
	if(isset($cari1)){
	foreach ($cari1->result_array() as $b){
		$sub = $b['qtyb']*$b['harga_beli'];
		$dis =$b['qtyb']*$b['harga_beli']*$b['disc']/100;
		$hasil4 =$sub-$dis;
		$hasil5 =$hasil4*$b['disc1']/100;
		$hasil6 =$hasil4-$hasil5;
		
		$totalan = $totalan+$hasil6;
	?>
	
	<tr id="FC">
		<td><?php echo $no;?></td>
		<td> <?php echo $b['nama_barang'];?></td>
		<td><?php echo $b['qtyb'];?> <?php echo $b['satuan_besar'];?> </td>
		<td align="right"><?php echo number_format($b['harga_beli']);?></td>
		<td align="center">
		<?php if($b['disc'] > 0){
										echo $b['disc'].'+'.$b['disc1'];
									}else{
										echo "";
									}
									?></td>
		<td align="right"><?php echo number_format($hasil6);?></td>
	</tr>
	<?php
	$no++;}} //$jumlah = $total - $totalan;
	?>
	<?php
	$h = 0;
	foreach ($cari1->result_array() as $h){
	?>
	<?php } ?>
	<tr>
	<tr>
	<td height="10"> </td>
	<td height="10"> </td>
	</tr>
	</table>
	
							<div class="form-group"  style="margin-left:5px;margin-bottom: 15px;" id="FC">
							<div class="col-sm-42" style ="width:24%">
								<td height="40" colspan="5" align="center" id="fB"><b><font color="#000000"> <?php if($d['ket_retur'] > 0){
										echo "Ket. Retur    ";
									}else{
										echo " ";
									}
									?></font></b></td>
							</div>
							<div class="col-sm-42"style ="width:80%;margin-left: -65px;" >
								<td><?php if($h['no_jual'] > 0){
										echo ": ",$d['ket_retur'];
									}else{
										echo " ";
									}
									?></td>
							</div>
							</div>
					</section>
					</form>
					
					<section class="col-lg-5 connectedSortable" style="width: 28%;margin-top: 14px;margin-left: -45px;height: 52%;" >
					<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data" >
							<div class="form-group" id="FC">
								<td><?php echo $d['no_jual'];?>/<?php echo $d['id_pelanggan'];?>/<?php echo $d['no_reff'];?></td>
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
								<td> <?php echo $d['tgl_invoice'];?></td>
							<div class="col-sm-42" >
								<td>Tgl </td>
							</div>
							</div>
							<div class="form-group" id="FC" style="margin-top: 4px;">
								<td><?php echo date('d-m-Y',strtotime($d['jatuh_tempo']));?></td>
							<div class="col-sm-42" >
								<td>J. Tempo</td>
							</div>
							</div>
							<div id="FD" style="border-top: 1.5px solid #000000; margin-top: 1em; padding-top: 1em;margin-top:2px"></div>
							<div class="form-group" align="right" style="margin-right: -11px;margin-top: -11px;" id="FC">
								<td align="right"><b><?php echo number_format($total,2);?></b></td>
							<div class="col-sm-42" align="left" >
								<td ><b>Total</b></td>
							</div>
							</div>
							<div class="form-group" align="right"style="margin-right: -11px;" id="FC">
									<td align="right"><b> <?php if($h['no_jual'] > 0){
										echo number_format($totalan,2);
									}else{
										echo " ";
									}
									?></b></td>
							<div class="col-sm-42" align="left">
									<td><?php if($h['no_jual'] > 0){
										echo "<b>Total Retur</b>";
									}else{
										echo " ";
									}
									?></td>
							</div>
							</div>
							<div class="form-group" align="right" style="margin-right: -11px;" id="FC">
									<td><?php if($d['dpp'] > 0){
										echo number_format($d['dpp'],2);
									}else{
										echo " ";
									}
									?></td>
									
							<div class="col-sm-42" align="left">
								<td><?php if($d['dpp'] > 0){
									echo "DPP";
								}else{
									echo " ";
								}
								?></td>
							</div>
							</div>
							<div class="form-group" align="right" style="margin-right: -11px;" id="FC">
									<td><?php if($d['ppn'] > 0){
										echo number_format($d['ppn'],2);
									}else{
										echo " ";
									}
									?></td>
									
							<div class="col-sm-42" align="left">
								<td><?php if($d['ppn'] > 0){
									echo "PPN";
								}else{
									echo " ";
								}
								?></td>
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
									<td><?php if($d['nominal2'] > 0){
										echo number_format($d['nominal2'],2);
									}else{
										echo " ";
									}
									?></td>
							<div class="col-sm-42" align="left" >
									<td><?php if($d['nominal2'] > 0){
										echo $d['ongkir2'];
									}else{
										echo " ";
									}
									?></td>
							</div>
							</div>
							<div class="form-group" align="right" style="margin-right: -11px;" id="FC">
								<td><b><?php if($d['potongan'] > 0 OR $d['nominal1'] > 0 OR $h['qtyb'] > 0){
									echo number_format($d['total'],2);
								}else{
									echo " ";
								}?></b></td>
							<div class="col-sm-42" align="left">
								<td><?php if($d['potongan'] > 0 OR $d['nominal1'] > 0 OR $h['qtyb'] > 0){
										echo "<b>Grand total</b>";
									}else{
										echo " ";
									}
									?></td>
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
							<div class="form-group" align="right"style="margin-right: -11px;" id="FC">
									<td><?php if($d['dp'] > 0){
										echo number_format($d['deposit'],2);
									}else{
										echo " ";
									}
									?></td>
							<div class="col-sm-42" align="left">
								<td><?php if($d['dp'] > 0){
										echo "Deposit";
									}else{
										echo " ";
									}
									?></td>
							</div>
							</div>
							<div class="form-group" align="right"style="margin-right: -11px;" id="FC">
									<td><?php if($d['dp'] > 0){
										echo number_format($d['deposit'] - $d['dp'],2);
									}else{
										echo " ";
									}
									?></td>
							<div class="col-sm-42" align="left">
								<td><?php if($d['dp'] > 0){
										echo "Sisa Deposit";
									}else{
										echo " ";
									}
									?></td>
							</div>
							</div>
							<div class="form-group"align="right" style="margin-right: -11px;" id="FC">
									<td><?php if($d['kembali'] > 0){
										echo number_format($d['kembali'],2);
									}else{
										echo " ";
									}
									?></td>
							<div class="col-sm-42"align="left" >
									<td><?php if($d['kembali'] > 0){
										echo "Kembali";
									}else{
										echo " ";
									}
									?></td>
							</div>
							</div>
							<div class="form-group" style=" margin-right: -11px; " align="right" id="FC">
									<td><b><?php if($d['sisa2'] > 0){
										echo number_format($d['sisa2'],2);
									}else{
										echo " ";
									}
									?></b></td>
							<div class="col-sm-42" align="left">
									<td><?php if($d['sisa2']> 0){
										echo " <b>Sisa Tagihan</b>";
									}else{
										echo " ";
									}
									?></td>
							</div>
							</div>
							<div class="form-group" align="right"style="margin-right: -11px;" id="FC">
									<td><?php if($d['giro'] > 0){
										echo $d['ket_giro'];
									}else{
										echo " ";
									}
									?></td>
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
</div>
 <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		
  <script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
</html>