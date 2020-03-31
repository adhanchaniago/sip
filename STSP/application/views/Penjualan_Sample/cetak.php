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
<body  onload="window.print();" > <!--- history.go(-1); --->
<table align="center"  class="html" width="610px" id="FK" >
	<tr bgcolor="#fff">
		<td colspan="5" align="center" id="fB"><b><font color="#000000"> &nbsp Faktur Penjualan</font></b></td>
	</tr>
	<tr>
		<td  height="80" colspan="3" align="center"></td>
	</tr>
	<tr>
	<td width = "90px">Inv</td>
	<td width = "270px"><?php echo $d['no_sample'];?>/<?php echo $d['id_pelanggan'];?>/<?php echo $d['no_reff'];?></td>
	<td align = "right"> Tgl</td>
	<td align = "right"> <?php echo date('d-m-Y');?></td>
	</tr>
	<tr>
	<td>Nama </td>
	<td><?php echo $d['nama_pelanggan'];?></td>
	<td align = "right">J. Tempo  </td>
	<td  align = "right"><?php echo date('d-m-Y',strtotime($d['jatuh_tempo']));?></td>
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
		<td  align="center"width = "18%"><b>Disc</b></td>
		<td  align = "right" width = "20%"><b>Jumlah</b></td>
	</tr>
	<tr>
	<td colspan="5">_______________________________________________</td>
	</tr>
	<?php
	$total = 0; $diskon=0; $hasil=0; $hasil2=0; $hasil3=0;
	//$query1 = "SELECT * FROM tb_penjualan";
	$no_sample = $this->uri->segment(3);
	$query = "SELECT tb_penjualan_sample.no_sample,tb_detail_penjualan_sample.nama_barang,qtyb,satuan_besar,harga_beli,disc,disc1 FROM tb_penjualan_sample INNER JOIN tb_detail_penjualan_sample ON tb_penjualan_sample.no_sample=tb_detail_penjualan_sample.no_sample WHERE tb_penjualan_sample.no_sample = '$no_sample'";
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
	
	<tr>
		<td><?php echo $t['nama_barang'];?></td>
		<td  align="center"><?php echo $t['qtyb'];?> <?php echo $t['satuan_besar'];?> </td>
		<td align="right"><?php echo number_format($t['harga_beli']);?></td>
		<td align="center"><?php if($t['disc'] > 0){
										echo $t['disc'].'+'.$t['disc1'];
									}else{
										echo "";
									}
									?></td>
		<td  align = "right"><?php echo number_format($hasil3);?></td>
	</tr>
	<?php
	}}
	?>
	<tr>
	<td height="20"> </td>
	<td height="20"> </td>
	</tr>
	
	<tr>
	<td height="20"> </td>
	<td height="20"> </td>
	</tr>
	</table>
	</table>
	<table  align="center"  class="html" width="610px" id="FC">
	<tr>
	<td height="20"> </td>
	<td height="20"> </td>
	</tr>
	<tr>
		<td ></td>
		<td></td>
		<td></td>
		<td></td>
		<td width="30%"></td>
		<td align = "left" width="35%"><b>Total</b></td>
		<td  align = "right"><b><?php echo number_format($total,2);?></b></td>
	</tr>
	<tr>
	<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td  >
	<?php if($d['potongan'] > 0){
				echo "Potongan";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right">
		<?php if($d['potongan'] > 0){
				echo number_format($d['potongan'],2);
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['nominal1'] > 0){
				echo $d['ongkir1'];
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right">
	<?php if($d['nominal1'] > 0){
				echo number_format($d['nominal1'],2);
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
	<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['potongan'] > 0 OR $d['nominal1'] > 0){
				echo "<b>Grand Total</b>";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right"><b>
	<?php if($d['potongan'] > 0 OR $d['nominal1'] > 0){
				echo number_format($d['total'],2);
			}else{
				echo " ";
			}
			?></b>
	</td>
	</tr>
	
	<tr>
	<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['cash'] > 0){
				echo "Cash";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right">
	<?php if($d['cash'] > 0){
				echo number_format($d['cash'],2);
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
	<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['debet'] > 0){
				echo "Debet";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right">
	<?php if($d['debet'] > 0){
				echo $d['bank1'];
			}else{
				echo " ";
			}
			?>
	<?php if($d['debet'] > 0){
				echo number_format($d['debet'],2);
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['transfer'] > 0){
				echo "Transfer";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right">
	<?php if($d['transfer'] > 0){
				echo $d['bank2'];
			}else{
				echo " ";
			}
			?>
	<?php if($d['transfer'] > 0){
				echo  number_format($d['transfer'],2);
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
	<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['giro'] > 0){
				echo "Giro";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right">
	<?php if($d['giro'] > 0){
				echo number_format($d['giro'],2);
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
	<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['deposit'] > 0){
				echo "Deposit";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right">
	<?php if($d['deposit'] > 0){
				echo number_format($d['deposit'],2);
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
	<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['deposit'] > 0){
				echo "Sisa Deposit";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right">
	<?php if($d['deposit'] > 0){
				echo number_format($d['deposit'] - $d['dp'],2);
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
	<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['kembali'] > 0){
				echo "Kembali";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right">
	<?php if($d['kembali'] > 0){
				echo number_format($d['kembali'],2);
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['sisa2'] > 0){
				echo "<b>Sisa Tagihan</b>";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right"><b>
	<?php if($d['sisa2'] > 0){
				echo number_format($d['sisa2'],2);
			}else{
				echo " ";
			}
			?></b>
	</td>
	</tr>
	<tr>
	<td></td>
	<td></td>
	<td colspan="5"  align = "right">
	<?php if($d['giro'] > 0){
				echo $d['ket_giro'];
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
	<td height="10"> </td>
	</tr>
	</table>
	<table align="center" class="html" width="610px" id="FK" >
	<tr>
		<td  align="center" height="150"  width="300">  Hormat Kami </td>
		<td height="300px"> </td>
		<td height="300px"> </td>
		<td  align="center" height="150"  width="300">  Penerima </td>
	</tr>
	<tr>
		<td align="center"height="200px" ><?php echo $d['user'];?></td>
		<td height="100px"> </td>
		<td height="100px"> </td>
		<td align="center"  height="10" colspan ="3"  ><?php echo $d['nama_pelanggan'];?></td>
	</tr>
		
</table>
</body>
</div>
<div class = "page">
<body  onload="window.print();" > <!--- history.go(-1); --->
<table align="center"  class="html" width="610px" id="FK">
	<tr bgcolor="#fff">
		<td colspan="5" align="center" id="fB"><b><font color="#000000"> &nbsp Faktur Penjualan</font></b></td>
	</tr>
	<tr>
		<td colspan="5" align="center" id="FF"><font color="#000000"> Copy</font></td>
	</tr>
	<tr>
		<td  height="80" colspan="3" align="center"></td>
	</tr>
	<tr>
	<td width = "90px">Inv</td>
	<td width = "270px"><?php echo $d['no_sample'];?>/<?php echo $d['id_pelanggan'];?>/<?php echo $d['no_reff'];?></td>
	<td align = "right"> Tgl</td>
	<td align = "right"> <?php echo date('d-m-Y');?></td>
	</tr>
	<tr>
	<td>Nama </td>
	<td><?php echo $d['nama_pelanggan'];?></td>
	<td align = "right">J. Tempo  </td>
	<td  align = "right"><?php echo date('d-m-Y',strtotime($d['jatuh_tempo']));?></td>
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
		<td  align="center"width = "18%"><b>Disc</b></td>
		<td  align = "right" width = "20%"><b>Jumlah</b></td>
	</tr>
	<tr>
	<td colspan="5">_______________________________________________</td>
	</tr>
	<?php
	$total = 0; $diskon=0; $hasil=0; $hasil2=0; $hasil3=0;
	//$query1 = "SELECT * FROM tb_penjualan";
	$no_sample = $this->uri->segment(3);
	$query = "SELECT tb_penjualan_sample.no_sample,tb_detail_penjualan_sample.nama_barang,qtyb,satuan_besar,harga_beli,disc,disc1 FROM tb_penjualan_sample INNER JOIN tb_detail_penjualan_sample ON tb_penjualan_sample.no_sample=tb_detail_penjualan_sample.no_sample WHERE tb_penjualan_sample.no_sample = '$no_sample'";
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
	
	<tr>
		<td><?php echo $t['nama_barang'];?></td>
		<td  align="center"><?php echo $t['qtyb'];?> <?php echo $t['satuan_besar'];?> </td>
		<td align="right"><?php echo number_format($t['harga_beli']);?></td>
		<td align="center"><?php if($t['disc'] > 0){
										echo $t['disc'].'+'.$t['disc1'];
									}else{
										echo "";
									}
									?></td>
		<td  align = "right"><?php echo number_format($hasil3);?></td>
	</tr>
	<?php
	}}
	?>
	<tr>
	<td height="20"> </td>
	<td height="20"> </td>
	</tr>
	
	<tr>
	<td height="20"> </td>
	<td height="20"> </td>
	</tr>
	</table>
	</table>
	<table  align="center"  class="html" width="610px" id="FC">
	<tr>
	<td height="20"> </td>
	<td height="20"> </td>
	</tr>
	<tr>
		<td ></td>
		<td></td>
		<td></td>
		<td></td>
		<td width="30%"></td>
		<td align = "left" width="35%"><b>Total</b></td>
		<td  align = "right"><b><?php echo number_format($total,2);?></b></td>
	</tr>
	<tr>
	<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td  >
	<?php if($d['potongan'] > 0){
				echo "Potongan";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right">
		<?php if($d['potongan'] > 0){
				echo number_format($d['potongan'],2);
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['nominal1'] > 0){
				echo $d['ongkir1'];
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right">
	<?php if($d['nominal1'] > 0){
				echo number_format($d['nominal1'],2);
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
	<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['potongan'] > 0 OR $d['nominal1'] > 0){
				echo "<b>Grand Total</b>";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right"><b>
	<?php if($d['potongan'] > 0 OR $d['nominal1'] > 0){
				echo number_format($d['total'],2);
			}else{
				echo " ";
			}
			?></b>
	</td>
	</tr>
	
	<tr>
	<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['cash'] > 0){
				echo "Cash";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right">
	<?php if($d['cash'] > 0){
				echo number_format($d['cash'],2);
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
	<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['debet'] > 0){
				echo "Debet";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right">
	<?php if($d['debet'] > 0){
				echo $d['bank1'];
			}else{
				echo " ";
			}
			?>
	<?php if($d['debet'] > 0){
				echo number_format($d['debet'],2);
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['transfer'] > 0){
				echo "Transfer";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right">
	<?php if($d['transfer'] > 0){
				echo $d['bank2'];
			}else{
				echo " ";
			}
			?>
	<?php if($d['transfer'] > 0){
				echo  number_format($d['transfer'],2);
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
	<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['giro'] > 0){
				echo "Giro";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right">
	<?php if($d['giro'] > 0){
				echo number_format($d['giro'],2);
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
	<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['deposit'] > 0){
				echo "Deposit";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right">
	<?php if($d['deposit'] > 0){
				echo number_format($d['deposit'],2);
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
	<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['deposit'] > 0){
				echo "Sisa Deposit";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right">
	<?php if($d['deposit'] > 0){
				echo number_format($d['deposit'] - $d['dp'],2);
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
	<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['kembali'] > 0){
				echo "Kembali";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right">
	<?php if($d['kembali'] > 0){
				echo number_format($d['kembali'],2);
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<td>
	<?php if($d['sisa2'] > 0){
				echo "<b>Sisa Tagihan</b>";
			}else{
				echo " ";
			}
			?>
	</td>
	<td  align = "right"><b>
	<?php if($d['sisa2'] > 0){
				echo number_format($d['sisa2'],2);
			}else{
				echo " ";
			}
			?></b>
	</td>
	</tr>
	<tr>
	<td></td>
	<td></td>
	<td colspan="5"  align = "right">
	<?php if($d['giro'] > 0){
				echo $d['ket_giro'];
			}else{
				echo " ";
			}
			?>
	</td>
	</tr>
	<tr>
	<td height="10"> </td>
	</tr>
	</table>
	<table align="center" class="html" width="610px" id="FK">
	<tr>
		<td  align="center" height="150"  width="300">  Hormat Kami </td>
		<td height="300px"> </td>
		<td height="300px"> </td>
		<td  align="center" height="150"  width="300">  Penerima </td>
	</tr>
	<tr>
		<td align="center"height="200px" ><?php echo $d['user'];?></td>
		<td height="100px"> </td>
		<td height="100px"> </td>
		<td align="center"  height="10" colspan ="3"  ><?php echo $d['nama_pelanggan'];?></td>
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