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
<body  onload="window.print();window.location.href = '<?php echo base_url('Pembelian/input_po');?>';" > <!--- history.go(-1); --->
<table align="center"  class="html" width="610px" id="FK" >
	<tr bgcolor="#fff">
		<td colspan="5" align="center" id="fB"><b><font color="#000000"> &nbsp PURCHASE ORDER</font></b></td>
	</tr>
	<tr>
		<td  height="80" colspan="3" align="center"></td>
	</tr>
	<tr>
	<td width = "90px">No PO</td>
	<td width = "260px"><?php echo $d['no_po'];?></td>
	<td align = "right"> No INV</td>
	<td align = "right"> <?php echo $d['no_jual'];?></td>
	</tr>
	<tr>
	<td  width = "100px">SUP</td>
	<td width = "200px"><?php echo $d['nama_supplier'];?></td>
	<td align = "right"> Tgl</td>
	<td align = "right"> <?php echo date('d-m-Y');?></td>
	</tr>
	<tr>
	<td>Alamat  </td>
	<td colspan="5"><?php echo $d['alamat'];?></td>
	</tr>
	<tr>
		<td  height="30" colspan="5" ></td>
	</tr>
	<tr>
		<td  height="30" colspan="5" >TOLONG BERIKAN BARANG KEPADA SUPIR KAMI SBB:</td>
	</tr>
	<tr>
		<td  height="30" colspan="5" ></td>
	</tr>
<table  align="center"  class="html" width="610px" id="FC" >
	
	
	<tr>
		<td width = "60%"><b>Nama Barang</b></td>
		<td align="center" width = "25%"><b>QTY</b></td>
	</tr>
	<tr>
	<td colspan="5">_______________________________________________</td>
	</tr>
	<?php
	$totalan = 0; $diskon=0; $hasil4=0; $hasil5=0; $hasil6=0; $jumlah = 0;
	//$query1 = "SELECT * FROM tb_penjualan";
	$no_po = $this->uri->segment(3);
	$query1 = "SELECT tb_po.no_po,tb_detail_po.id_barang,tb_detail_po.qty,tb_detail_po.harga_jual,tb_detail_po.satuan,tb_barang.nama_barang FROM tb_po INNER JOIN tb_detail_po ON tb_po.no_po = tb_detail_po.no_po INNER JOIN tb_barang ON tb_detail_po.id_barang = tb_barang.id_barang WHERE tb_po.no_po = '$no_po'";
	$cari1 = $this->db->query($query1);
	
	if(isset($cari1)){
	foreach ($cari1->result_array() as $b){
	?>
	<tr>
		<td width = "60%"><?php echo $b['nama_barang'];?></td>
		<td align="center" width = "25%"><?php echo $b['qty'];?> <?php echo $b['satuan'];?></td>
	</tr>
	<?php
	}}
	?>
	<tr>
	<td height="10"> </td>
	</tr>
	</table>
	<table align="center" class="html" width="610px" id="FK">
	<tr>
	<td height="10"> </td>
	</tr>
	<tr>
	<td height="10"> </td>
	</tr>
	<tr>
	<td height="10"> </td>
	</tr>
	
		<td  align="center" height="150"  width="610">   Hormat Kami</td>
	</tr>
	<tr>
		<td align="center"height="200px">(&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp )</td>
	</tr>
		
</table>
</table>
</body>
</div>
<div class = "page">
<body  onload="window.print();" > <!--- history.go(-1); --->
<table align="center"  class="html" width="610px" id="FK">
	<tr bgcolor="#fff">
		<td colspan="5" align="center" id="fB"><b><font color="#000000"> &nbsp PURCHASE ORDER</font></b></td>
	</tr>
	<tr bgcolor="#fff">
		<td colspan="5" align="center" id="fk"><font color="#000000"> &nbsp Copy</font></td>
	</tr>
	<tr>
		<td  height="80" colspan="3" align="center"></td>
	</tr>
	<tr>
	<td width = "90px">No PO</td>
	<td width = "260px"><?php echo $d['no_po'];?></td>
	<td align = "right"> No INV</td>
	<td align = "right"> <?php echo $d['no_jual'];?></td>
	</tr>
	<tr>
	<td  width = "100px">SUP</td>
	<td width = "200px"><?php echo $d['nama_supplier'];?></td>
	<td align = "right"> Tgl</td>
	<td align = "right"> <?php echo date('d-m-Y');?></td>
	</tr>
	<tr>
	<td>Alamat  </td>
	<td colspan="5"><?php echo $d['alamat'];?></td>
	</tr>
	<tr>
		<td  height="30" colspan="3" align="center"></td>
	</tr>
<table  align="center"  class="html" width="610px" id="FC">
	
	
	<tr>
		<td width = "60%"><b>Nama Barang</b></td>
		<td align="center" width = "25%"><b>QTY</b></td>
	</tr>
	<tr>
	<td colspan="5">_______________________________________________</td>
	</tr>
	<?php
	$totalan = 0; $diskon=0; $hasil4=0; $hasil5=0; $hasil6=0; $jumlah = 0;
	//$query1 = "SELECT * FROM tb_penjualan";
	$no_po = $this->uri->segment(3);
	$query1 = "SELECT tb_po.no_po,tb_detail_po.id_barang,tb_detail_po.qty,tb_detail_po.harga_jual,tb_detail_po.satuan,tb_barang.nama_barang FROM tb_po INNER JOIN tb_detail_po ON tb_po.no_po = tb_detail_po.no_po INNER JOIN tb_barang ON tb_detail_po.id_barang = tb_barang.id_barang WHERE tb_po.no_po = '$no_po'";
	$cari1 = $this->db->query($query1);
	
	if(isset($cari1)){
	foreach ($cari1->result_array() as $b){
	?>
	<tr>
		<td width = "60%"><?php echo $b['nama_barang'];?></td>
		<td align="center" width = "25%"><?php echo $b['qty'];?> <?php echo $b['satuan'];?></td>
	</tr>
	<?php
	}}
	?>
	<tr>
	<td height="10"> </td>
	</tr>
	</table>
	<table align="center" class="html" width="610px" id="FK">
	<tr>
	<td height="10"> </td>
	</tr>
	<tr>
	<td height="10"> </td>
	</tr>
	<tr>
	<td height="10"> </td>
	</tr>
	
		<td  align="center" height="150"  width="610">   Hormat Kami</td>
	</tr>
	<tr>
		<td align="center"height="200px">(&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp )</td>
	</tr>
		
</table>
</table>
</body>
</div>
 <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		
  <script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  

  
</html>