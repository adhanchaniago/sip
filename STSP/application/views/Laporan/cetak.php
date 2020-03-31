
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
            }
			#FK{
				font-size:12px;
				margin-top:0px;
				margin-left:0px;
				text-transform: uppercase;
				letter-spacing: 4.0pt;
			}
			#FB{
				font-size:15px;
				font-size:15px;
				margin-top:0px;
				margin-left:0px;
				text-transform: uppercase;
				letter-spacing: 4.0pt;
			}
			#FC{
				font-size:11px;
				margin-top:0px;
				margin-left:3px;
				text-transform: uppercase;
				letter-spacing: 3.0pt;
				
			}
			#FD{
				font-size:12px;
				margin-top:0px;
				margin-left:0px;
				
			}
        </style>

<body  onclick="window.print();" class="html">

<?php 					$tanggal_dari	= $this->input->get('tanggal_dari');
						$tanggal_sampai	= $this->input->get('tanggal_sampai');
						$id_pelanggan   = $this->input->get('id_pelanggan');
						$cari = "SELECT * from saldo  WHERE saldo.id_pelanggan like '%$id_pelanggan%' AND tgl BETWEEN '$tanggal_dari' AND '$tanggal_sampai' order by bulan,tgl asc";
						$hasil = $this->db->query($cari);
				
?>
<table align="center" cellpadding="0" width="533px" >
	<tr bgcolor="#fff">
		<td height="20" colspan="5" align="center" id="FB" ><b><font color="#000000"> &nbsp Statement OF Account </font></b></td>
	</tr>
	<tr bgcolor="#fff">
	
 <?php foreach ($listpelanggan->result()  as $t){
}
?>
		<td height="10" colspan="5" align="center" id="fC"><b><font color="#000000"> &nbsp <?php echo "Per : ".$tanggal_dari; ?> s/d <?php echo $tanggal_sampai; ?></font></b></td>
	</tr>
	</table>
	<table  align="center" cellpadding="0" cellspacing="0" class="all" width="533px" id="fC">
	<tr>
	<td height="20" colspan="5"  id="fC"><b><font color="#000000"> <?php echo "Nama Pelanggan  :  " .$t->nama_pelanggan;?></font></b></td>
	</tr>
	</table>
<table  align="center" cellpadding="0" cellspacing="0" class="all" width="1200px"id="fC" >
	
	
	<tr id="fC">
		<td width = "3%">No</td>
		<td width = "12%">Tanggal</td>
		<td width = "18%">No Transaksi</td>
		<td width = "25%">Keterangan</td>
		<td align="right" width = "15%">Debet</td>
		<td align="right" width = "15%">Kredit</td>
		<td align="right" width = "15%">Saldo</td>
	</tr>
	<tr>
		<td colspan="7" id="fD">---------------------------------------------------------------------------------------------------------------------------------------</td>
	</tr>
	<tr id="fC">
	<?php
	$saldo=0;
	$no=1;
	$pj=0;
	$by=0;
	$total=0;
	if(isset($list)){
	foreach ($list->result_array() as $data){
	$pj=$pj+$data['tagihan'];
	$by=$by+$data['bayar_tagihan'];
	$saldo=$saldo+$data['tagihan']-$data['bayar_tagihan'];
	$total=+$pj-$by;
	?>
	<td><?php echo $no;?></td>
	<td><?php echo $data['tgl'];?></td>
	<td><?php echo $data['id_transaksi'];?>/<?php echo $data['id_pelanggan'];?>/<?php echo $data['no_reff'];?></td>
	<td><?php if($data['tagihan'] > 0){
				echo "Pembelian";
			}elseif($data['bayar_tagihan'] > 0){
				echo "Pembayaran";
			}else{
			?>
				-
			<?php
			}
			?>	</td>
	<td align="right">
	<?php if($data['tagihan'] > 0){
				echo  number_format($data['tagihan'],2);
			}else{
			?>
				-
			<?php
			}
			?>	
	</td>
	<td align="right">
		<?php if($data['bayar_tagihan'] > 0){
				echo number_format($data['bayar_tagihan'],2);
			}else{
			?>
				-
			<?php
			}
			?>	
	</td>
	<td align="right">
	<?php if($saldo > 0){
				echo number_format($saldo,2);
			}else{
			?>
				-
			<?php
			}
			?>	
	</td>
	<td></td>
	
	
    </tr> 
	<?php $no++;}}?>
		<tr>
		<td colspan="7" id="fD" height="40px">---------------------------------------------------------------------------------------------------------------------------------------</td>
	</tr>
							<tr id="fC" height="20px">
							<th  width="150"colspan='5' ></th>
							<th  align="right">Total Debet :</th>
							<td align="right" colspan='0'><?php if($pj > 0){
										echo"Rp. ", number_format($pj,2);
									}else{
									?>
										-
									<?php
									}
									?>
									</td>
							</tr >
							<tr id="fC" height="20px">
							<th  width="150"colspan='5' ></th>
							<th align="right" >Total Kredit :</th>
							<td align="right" colspan='0'><?php if($by > 0){
										echo"Rp. ", number_format($by,2);
									}else{
									?>
										-
									<?php
									}
									?></td>
							</tr >
							<tr id="fC" height="20px">
							<th  width="150"colspan='5' ></th>
							<th align="right" >Total Saldo :</th>
							<td align="right" colspan='0'> 
							<?php if($total > 0){
										echo"Rp. ",  number_format($total,2);
									}else{
									?>
										-
									<?php
									}
									?>	</td>
							</tr>
</table>
</body>
<!--
	Author		: Irfan Saprudin
	E-mail		: irfan_saprudin@yahoo.com
	Company		: Budgeur Communtity / Budgeur Software
	Client		: SMPN 1 Sidangkerta
	Project		: Aplikasi Tabungan Siswa	
	Date		: 13 October 2013
	Revision	: -
-->
<script>
$('#tanggal_dari').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'d-m-Y',
	closeOnDateSelect:true,
	changeMonth : true,
	changeYear : true
});
$('#tanggal_sampai').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'d-m-Y',
	closeOnDateSelect:true,
	changeMonth : true,
	changeYear : true
});
</script>