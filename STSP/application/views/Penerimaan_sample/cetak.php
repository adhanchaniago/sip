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
				font-size:20px;
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

<div class="page"> 
<body  onload="window.print();" class="html">
<table align="center" width="610px"   id="FK">
	<tr bgcolor="#fff">
		<td colspan="5" align="center" id="fB"><b><font color="#000000"> &nbsp FAKTUR PENERIMAAN</font></b></td>
	</tr>
	<tr>
		<td  height="80" colspan="3" align="center"></td>
	</tr>
	<tr>
	<td width = "110px">No Bukti</td>
	<td width = "290px"><?php echo $d['no_bukti'];?>/<?php echo $d['id_pelanggan'];?></td>
	<td align = "right"> TGL  </td>
	<td align = "right"> <?php echo date('d-m-Y');?></td>
	</tr>
	<tr>
	<td>Nama </td>
	<td colspan = "5"><?php echo $d['nama_pelanggan'];?></td>
	</tr>
	<td>Ket</td>
	<td colspan = "5"><?php echo $d['keterangan'];?></td>
	<td align = "right"> </td>
	<td></td>
	<tr>
		<td  height="30" colspan="3" align="center"></td>
	</tr>
	
<table  align="center"   width="610px" id="FC">
	
	
	<tr>
		<td width = "40%"><b>No Inv</b></td>
		<td align ="right" width = "27%"><b>Bayar</b></td>
		<td align ="right" width = "27%"><b>Sisa</b></td>
	</tr>
	<tr>
	<td colspan="4">_______________________________________________</td>
	</tr>
	<?php
	$total = 0; $diskon=0; $hasil=0; $hasil2=0; $hasil3=0;
	$no_bukti = $this->uri->segment(3);
	$query = "SELECT tb_detail_penerimaan_sample.no_bukti,tb_detail_penerimaan_sample.no_sample,tb_detail_penerimaan_sample.total,tb_detail_penerimaan_sample.sisa_bayar,
	tb_detail_penerimaan_sample.bayar,tb_penjualan_sample.no_reff,tb_penjualan_sample.id_pelanggan FROM tb_detail_penerimaan_sample INNER JOIN tb_penerimaan_sample ON 
	tb_detail_penerimaan_sample.no_bukti = tb_penerimaan_sample.no_bukti INNER JOIN tb_penjualan_sample ON tb_detail_penerimaan_sample.no_sample = tb_penjualan_sample.no_sample
	WHERE tb_detail_penerimaan_sample.no_bukti = '$no_bukti'";
	$cari = $this->db->query($query);
	if(isset($cari)){
	foreach ($cari->result_array() as $t){
	
	$total = $total + $t['bayar'];
		
	?>
	
	<tr>
		<td><?php echo $t['no_sample'];?>/<?php echo $t['id_pelanggan'];?>/<?php echo $t['no_reff'];?></td>
		<td align ="right"><?php echo number_format($t['bayar']);?></td>
		<td align ="right"><?php echo number_format($t['sisa_bayar']);?></td>
		
	</tr>
	<?php
	}}
	?>
		</table>
		</table>
		<table  align="center"   width="610px" id="FC">
	<tr>
	<td height="40"> </td>
	<td height="40"> </td>
	</tr>
	<tr>
		<td ></td>
		<td width="25%"></td>
		<td align = "left" width="35%"><b>Total</b></td>
		<td  align = "right"><b><?php echo number_format($total,2);?></b></td>
	</tr>
	<?php 
	if($d['potongan'] > 0){
		echo "<tr>
	<td colspan=2></td>
	<td> Potongan </td>
	<td  align =right>".number_format($d['potongan'],2)."</td>
	</tr>";
	
	}
	?>
		<?php 
	if($d['potongan'] > 0){
		echo "<tr>
	<td colspan=2></td>
	<td> <b>Grand total</b> </td>
	<td  align =right><b>".number_format($d['totalan'],2)."</b></td>
	</tr>";
	
	}
	?>
	<?php 
	if($d['cash'] > 0){
		echo "<tr>
	<td colspan=2></td>
	<td> Cash </td>
	<td align =right>".number_format($d['cash'],2)." </td>
	</tr>";
	
	}
	?>
	<?php 
	if($d['debet'] > 0){
		echo "<tr>
	<td colspan=2></td>
	<td> Debet</td>
	<td  align =right>".$d['bank1'].". ".number_format($d['debet'],2)."</td>
	</tr>";
	
	}
	
	?>
	<?php 
	if($d['transfer'] > 0){
		echo "<tr>
	<td colspan=2></td>
	<td> Transfer  </td>
	<td  align =right>".$d['bank2'].". ".number_format($d['transfer'],2)." </td>
	</tr>";
	
	}
	
	?>
	<?php 
	if($d['giro'] > 0){
		echo "<tr>
	<td colspan=2></td>
	<td > Giro  </td>
	<td  align =right>".number_format($d['giro'],2)."  </td>
	</tr>";
	
	}
	?>
	<?php 
	if($d['dp'] > 0){
		echo "<tr>
	<td colspan=2></td>
	<td> Deposit  </td>
	<td  align =right>".number_format($d['deposit'],2)."  </td>
	</tr>";
	
	}
	?>
	<?php 
	if($d['dp'] > 0){
		echo "<tr>
	<td colspan=2></td>
	<td > Sisa Deposit  </td>
	<td align =right>".number_format($d['deposit'] - $d['dp'],2)."  </td>
	</tr>";
	
	}
	?>
	<?php 
	if($d['kembali'] > 0){
		echo "<tr>
	<td colspan=2></td>
	<td> Kembali  </td>
	<td  align =right>".number_format($d['kembali'],2)."</td>
	</tr>";
	
	}
	?>
	<?php 
	if($d['giro'] > 0){
		echo "<tr>
	<td ></td>
	<td ></td>
	<td colspan=2 align =right>".$d['ket_giro']."</td>
	</tr>";
	
	}
	?>
	<tr>
	<td height="40"> </td>
	</tr>
	</table>
	<table align="center"  width="610px" id="FK">
	<tr>
		<td  align="center" height="100"  width="300">  Hormat Kami </td>
	</tr>
		<tr>
		<td align="center"height="300px"><?php echo $d['user'];?></td>
	</tr>
</table>
</body>
</div>
<div class="page">
<body  onload="window.print();" class="html">
<table align="center" width="610px"   id="FK" >
	<tr bgcolor="#fff">
		<td colspan="5" align="center" id="fB"><b><font color="#000000"> &nbsp FAKTUR PENERIMAAN  </font></b></td>
	</tr>
	<tr bgcolor="#fff">
		<td colspan="5" align="center" id="ff"><b><font color="#000000"> &nbsp Copy</font></b></td>
	</tr>
	<tr>
		<td  height="80" colspan="3" align="center"></td>
	</tr>
	<tr>
	<td width = "110px">No Bukti</td>
	<td width = "290px"><?php echo $d['no_bukti'];?>/<?php echo $d['id_pelanggan'];?></td>
	<td align = "right"> TGL  </td>
	<td align = "right"> <?php echo date('d-m-Y');?></td>
	</tr>
	<tr>
	<td>Nama </td>
	<td colspan = "5"><?php echo $d['nama_pelanggan'];?></td>
	</tr>
	<td>Ket</td>
	<td colspan = "5"><?php echo $d['keterangan'];?></td>
	<td align = "right"> </td>
	<td></td>
	<tr>
		<td  height="30" colspan="3" align="center"></td>
	</tr>
	
<table  align="center"   width="610px" id="FC">
	
	
	<tr>
		<td width = "40%"><b>No Inv</b></td>
		<td  width = "27%"><b>Bayar</b></td>
		<td align ="right" width = "27%"><b>Sisa</b></td>
	</tr>
	<tr>
	<td colspan="5">_______________________________________________</td>
	</tr>
	<?php
	$totalan = 0;
	//$query1 = "SELECT * FROM tb_penjualan";
	$no_bukti = $this->uri->segment(3);
	$query = "SELECT tb_detail_penerimaan_sample.no_bukti,tb_detail_penerimaan_sample.no_sample,tb_detail_penerimaan_sample.total,tb_detail_penerimaan_sample.sisa_bayar,
	tb_detail_penerimaan_sample.bayar,tb_penjualan_sample.no_reff,tb_penjualan_sample.id_pelanggan FROM tb_detail_penerimaan_sample INNER JOIN tb_penerimaan_sample ON 
	tb_detail_penerimaan_sample.no_bukti = tb_penerimaan_sample.no_bukti INNER JOIN tb_penjualan_sample ON tb_detail_penerimaan_sample.no_sample = tb_penjualan_sample.no_sample
	WHERE tb_detail_penerimaan_sample.no_bukti = '$no_bukti'";
	$cari = $this->db->query($query);
	if(isset($cari)){
	foreach ($cari->result_array() as $t){
		$sub = $t['bayar'];
		
		$totalan = $totalan + $t['bayar'] ;
		
	?>
	
	<tr>
		<td><?php echo $t['no_sample'];?>/<?php echo $t['id_pelanggan'];?>/<?php echo $t['no_reff'];?></td>
		<td><?php echo number_format($t['bayar']);?></td>
		<td align ="right"><?php echo number_format($t['sisa_bayar']);?></td>
		
	</tr>
	<?php
	}}
	?>
		</table>
		</table>
		<table  align="center"   width="610px" id="FC">
	<tr>
	<td height="40"> </td>
	<td height="40"> </td>
	</tr>
	<tr>
		<td ></td>
		<td width="25%"></td>
		<td align = "left" width="35%"><b>Total</b></td>
		<td  align = "right"><b><?php echo number_format($total,2);?></b></td>
	</tr>
	<?php 
	if($d['potongan'] > 0){
		echo "<tr>
	<td colspan=2></td>
	<td> Potongan </td>
	<td  align =right>".number_format($d['potongan'],2)."</td>
	</tr>";
	
	}
	?>
		<?php 
	if($d['potongan'] > 0){
		echo "<tr>
	<td colspan=2></td>
	<td> <b>Grand total</b> </td>
	<td  align =right><b>".number_format($d['totalan'],2)."</b></td>
	</tr>";
	
	}
	?>
	<?php 
	if($d['cash'] > 0){
		echo "<tr>
	<td colspan=2></td>
	<td> Cash </td>
	<td align =right>".number_format($d['cash'],2)." </td>
	</tr>";
	
	}
	?>
	<?php 
	if($d['debet'] > 0){
		echo "<tr>
	<td colspan=2></td>
	<td> Debet</td>
	<td  align =right>".$d['bank1'].". ".number_format($d['debet'],2)."</td>
	</tr>";
	
	}
	
	?>
	<?php 
	if($d['transfer'] > 0){
		echo "<tr>
	<td colspan=2></td>
	<td> Transfer  </td>
	<td  align =right>".$d['bank2'].". ".number_format($d['transfer'],2)." </td>
	</tr>";
	
	}
	
	?>
	<?php 
	if($d['giro'] > 0){
		echo "<tr>
	<td colspan=2></td>
	<td > Giro  </td>
	<td  align =right>".number_format($d['giro'],2)."  </td>
	</tr>";
	
	}
	?>
	<?php 
	if($d['dp'] > 0){
		echo "<tr>
	<td colspan=2></td>
	<td> Deposit  </td>
	<td  align =right>".number_format($d['deposit'],2)."  </td>
	</tr>";
	
	}
	?>
	<?php 
	if($d['dp'] > 0){
		echo "<tr>
	<td colspan=2></td>
	<td > Sisa Deposit  </td>
	<td align =right>".number_format($d['deposit'] - $d['dp'],2)."  </td>
	</tr>";
	
	}
	?>
	<?php 
	if($d['kembali'] > 0){
		echo "<tr>
	<td colspan=2></td>
	<td> Kembali  </td>
	<td  align =right>".number_format($d['kembali'],2)."</td>
	</tr>";
	
	}
	?>
	<?php 
	if($d['giro'] > 0){
		echo "<tr>
	<td ></td>
	<td ></td>
	<td colspan=2 align =right>".$d['ket_giro']."</td>
	</tr>";
	
	}
	?>
	<tr>
	<td height="40"> </td>
	</tr>
	</table>
	<table align="center"  width="610px" id="FK">
	<tr>
		<td align="center"  height="100" colspan ="2"> Penerima</td>
	</tr>
	<tr>
		<td align="center"  height="300" colspan ="2"  >(&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp )</td>
	</tr>
		
</table>
</body >
</div>
<!--
	Author		: Irfan Saprudin
	E-mail		: irfan_saprudin@yahoo.com
	Company		: Budgeur Communtity / Budgeur Software
	Client		: SMPN 1 Sidangkerta
	Project		: Aplikasi Tabungan Siswa	
	Date		: 13 October 2013
	Revision	: -
-->
