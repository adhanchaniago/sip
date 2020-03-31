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
			font-size:12px;
			margin-top:0px;
			margin-left:0px;
			text-transform: uppercase;
			letter-spacing: 4.0pt;
		}
		#FB{
			font-size:20px;
			margin-top:0px;
			margin-left:0px;
			text-transform: uppercase;
			letter-spacing: 5.0pt;
		}
		#FC{
			font-size:11px;
			margin-top:0px;
			margin-left:0px;
			text-transform: uppercase;
			letter-spacing: 3.6pt;
			
		}
		#FD{
			font-size:12px;
			margin-top:0px;
			margin-left:0px;
			
		}
	</style>
</style>
</style>
<body onload="window.print();" class="html">
	<?php		
	$tanggal_dari	= date('Y-m-d' ,strtotime($this->input->get('tanggal_dari')));
	$tanggal_sampai	= date('Y-m-d' ,strtotime($this->input->get('tanggal_sampai')));
	$query = "SELECT * from transaksi_dayb1  WHERE date_invoice BETWEEN '$tanggal_dari' AND '$tanggal_sampai' order by MID(tgl,4,2)DESC,LEFT(tgl,2)DESC,LEFT(jam,2)DESC,MID(jam,4,2)DESC,RIGHT(jam,2)DESC";
	$cari = $this->db->query($query);
	$cari->num_rows();
	
	

	
	?>
	<?php 
	$dep=0;
	foreach ($cari->result_array() as $deposit){
		$dep=$dep + $deposit['cash'];
	}
	
	?>

	<table align="center" cellpadding="0" width="533px" style="margin-top: 15px;">
		<tr bgcolor="#fff">
			<td height="20" colspan="5" align="center" id="FB" class="html1"><b><font color="#000000"> &nbsp Laporan Purchase Order</font></b></td>
		</tr>
		<tr bgcolor="#fff">
			<td height="10" colspan="5" align="center" id="fC"><b><font color="#000000"> &nbsp <?php echo "Per  &nbsp ".date('d-m-Y',strtotime($tanggal_dari)); ?> s/d <?php echo date('d-m-Y',strtotime($tanggal_sampai)); ?></font></b></td>
		</tr>
		<tr bgcolor="#fff">
			<td height="20"></td>
		</tr>
	</table>
	<br>
	<table  align="center" cellpadding="0" cellspacing="0" class="all" width="1250px" style="margin-left: 5px;" >
		<tr id="fC">
			<td width = "15%"><b>No</b></td>
			<td width = "90%"><b>No Transaksi</b></td>
			<td align="right" width = "15%"><b>Total</b></td>
		</tr>
		<tr>
			<td colspan="13" id="fD">________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</td>
			
		</tr>
		<?php
		$no=1;
		$t=0;
		$c=0;
		$d=0;
		$tr=0;
		$g=0;
		$p=0;
		$k=0;
		$s=0;
		$b=0;
		$gr=0;
		$dp=0;
		$sub = 0;
		$cash = 0;
		
		if(isset($cari)){
			foreach ($cari->result_array() as $data){
				$t=$t+$data['total'];
				$c=$c+$data['cash'];
				$d=$d+$data['debet'];
				$tr=$tr+$data['transfer'];
				$g=$g+$data['giro'];
				$p=$p+$data['potongan'];
				$k=$k+$data['kembali'];
				$s=$s+$data['sisa_tagihan'];
				$b=$b+$data['beban'];
				$gr=$gr+$data['grand_total'];
				?>
				<tr id="fC">
					<td><?php echo $no;?></td>
					<td><?php echo $data['no_transaksi'];?>/<?php echo $data['id_supplier'];?>/<?php echo $data['no_raff'];?></td>
					<td align="right">
						<?php if($data['grand_total'] == 0){
							echo "-";
						}elseif($data['grand_total'] > 0){
							echo number_format($data['grand_total']);
						}else{
							echo number_format($data['grand_total']);
						}
						?></td>
						
						
					</tr> 
					<?php $no++; }}?>
					<tr>
						<tr>
							<td colspan="13" id="fD">________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</td>
						</tr>
						<table  align="center" cellpadding="0" cellspacing="0" class="all" width="1275"id="fC" >
							
							<tr id="fC" height="20px">
								<td width="650px"></td>
								<th align="right" >Grand Total :</th>
								<td align="right"></td>
								<td align="right" colspan="2"><?php if($gr > 0){
									echo "Rp. ".number_format($gr,2);
								}else{
									?>
									-
									<?php
								}
								?>
							</td>
						</tr>
						
					</table>
				</table>	
			</body>