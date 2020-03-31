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
<div class = "page">
<body onload="window.print();"> <!---history.go(-1);--->
<table align="center"  class="html" width="610px" id="FK">
	<tr bgcolor="#fff">
		<td colspan="5" align="center" id="fB"><b><font color="#000000"> &nbsp SURAT JALAN</font></b></td>
	</tr>
	<tr>
		<td  height="80" colspan="3" align="center"></td>
	</tr>
	<tr>

	<td width = "100px">No SJ</td>
	<td width = "300px"><?php echo $d['no_sj'].'/'.$d['id_pelanggan'].'/'.$d['no_sjln'].'/'.$d['noreff'];?></td>
	<td align = "right"> Tgl  </td>
	<td align = "right"> <?php echo date('d-m-Y');?></td>
	</tr>
	<tr>
	<td>Nama </td>
	<td colspan="5"><?php echo $d['nama_pelanggan'];?></td>
	</tr>
	<td>Ship To</td>
	<td colspan="5"><?php echo $d['ke_alamat'];?></td>
	</tr>
	<td>Ket</td>
	<td colspan="5"><?php echo $d['keterangan'];?></td>
	</tr>
	<tr>
		<td  height="30" colspan="3" align="center"></td>
	</tr>
<table align="center"  class="html" width="610px" id="FK">
	
	<tr>
		<td width = "50px" ><b>Nama Barang</b></td>
		<td align = "center" width = "50px"><b>Di Kirim</b></td>
		<td align = "center" width = "50px"><b>Sisa</b></td>
	</tr>
	<tr>
		<td colspan = "3">_______________________________________________</td>
		
	<?php
	$total = 0; $diskon=0; $hasil=0; $hasil2=0; $hasil3=0;
	$no_kirim = $this->uri->segment(3);
	$query = "SELECT tb_detail_kirim.no_kirim,no_sj,jml_krm,sisa_kirim,tb_barang.nama_barang,tb_barang.satuan_besar FROM tb_detail_kirim INNER JOIN tb_barang ON tb_detail_kirim.id_barang=tb_barang.id_barang WHERE no_kirim = '$no_kirim'";
	$cari = $this->db->query($query);
	if(isset($cari)){
	foreach ($cari->result_array() as $t){
	?>
	<tr>
		<td ><?php echo $t['nama_barang'];?></td>
		<td align = "center"><?php echo $t['jml_krm'];?> <?php echo $t['satuan_besar']; ?></td>
		<td align = "center"><?php echo $t['sisa_kirim'];?> <?php echo $t['satuan_besar']; ?></td>
		
	</tr>
	<?php
	}}
	?>
	</table>
	
	</tr>
	</table>
<table align="center" class="html" width="610px" id="FK" >
	<tr>
	<td height="10"> </td>
	</tr>
	<tr>
	<td height="10"> </td>
	</tr>
	<tr>
	<td height="10"> </td>
	</tr>
	
		<td  align="center" height="150"  width="300">Pengirim</td>
		<td align="center"  height="10" colspan ="3"> Penerima </td>
	</tr>
	<tr>
		<td height="100"> </td>
	</tr>
	<tr>
		<td align="center"height="200px">(&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp )</td>
		<td align="center"height="200px">(&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  )</td>
	</tr>
		
</table>
</body>
</div>
<div class = "page">
<body>
<table align="center"  class="html" width="610px" id="FK">
	<tr bgcolor="#fff">
		<td colspan="5" align="center" id="fB"><b><font color="#000000"> &nbsp SURAT JALAN</font></b></td>
	</tr>
	<tr bgcolor="#fff">
		<td colspan="5" align="center" id="ff"><b><font color="#000000"> &nbsp Copy</font></b></td>
	</tr>
	<tr>
		<td  height="80" colspan="3" align="center"></td>
	</tr>
	<tr>
	<?php
								$kalimat = $d['no_sj'];
								$sub_kalimat = substr($kalimat,0,12);
	?>
	<td width = "100px">No SJ</td>
	<td width = "300px"><?php echo $d['no_sj'].'/'.$d['id_pelanggan'].'/'.$d['no_sjln'].'/'.$d['noreff'];?></td>
	<td align = "right"> Tgl  </td>
	<td align = "right"> <?php echo date('d-m-Y');?></td>
	</tr>
	<tr>
	<td>Nama </td>
	<td colspan="5"><?php echo $d['nama_pelanggan'];?></td>
	</tr>
	<td>Ship To</td>
	<td colspan="5"><?php echo $d['ke_alamat'];?></td>
	</tr>
	<td>Ket</td>
	<td colspan="5"><?php echo $d['keterangan'];?></td>
	</tr>
	<tr>
		<td  height="30" colspan="3" align="center"></td>
	</tr>
	
<table align="center"  class="html" width="610px" id="FK">
	
	<tr>
		<td width = "50px" ><b>Nama Barang</b></td>
		<td align = "center" width = "50px"><b>Di Kirim</b></td>
		<td align = "center" width = "50px"><b>Sisa</b></td>
	</tr>
	<tr>
		<td colspan = "3">_______________________________________________</td>
		
	<?php
	$total = 0; $diskon=0; $hasil=0; $hasil2=0; $hasil3=0;
	//$query1 = "SELECT * FROM tb_penjualan";
	$no_kirim = $this->uri->segment(3);
	$query = "SELECT tb_detail_kirim.no_sj,tb_detail_kirim.id_barang,nama_barang,tb_detail_kirim.jml_krm,tb_detail_kirim.satuan_besar,tb_detail_kirim.sisa_kirim FROM tb_detail_kirim INNER JOIN tb_barang ON tb_detail_kirim.id_barang = tb_barang.id_barang WHERE tb_detail_kirim.no_kirim = '$no_kirim'";
	$cari = $this->db->query($query);
	if(isset($cari)){
	foreach ($cari->result_array() as $t){
	?>
	<tr>
	
		<td ><?php echo $t['nama_barang'];?></td>
		<td align = "center"><?php echo $t['jml_krm'];?> <?php echo $t['satuan_besar']; ?></td>
		<td align = "center"><?php echo $t['sisa_kirim'];?> <?php echo $t['satuan_besar']; ?></td>
		
	</tr>
	<?php }}?>
	</table>
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
	
		<td  align="center" height="150"  width="300">Pengirim</td>
		<td align="center"  height="10" colspan ="3"> Penerima </td>
	</tr>
	<tr>
		<td height="100"> </td>
	</tr>
	<tr>
		<td align="center"height="200px">(&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp )</td>
		<td align="center"height="200px">(&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  )</td>
	</tr>
		
</table>
</body>
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
