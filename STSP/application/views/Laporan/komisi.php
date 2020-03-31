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
  <body onload="window.print();" class="html">
<?php		
$bul=0;
		$id_karyawan	= $this->input->get('id_karyawan');
		$bulan			= $this->input->get('bulan');
		$tanggal_dari	= date('Y-m-d' ,strtotime($this->input->get('tanggal_dari')));
		$tanggal_sampai	= date('Y-m-d' ,strtotime($this->input->get('tanggal_sampai')));
		$query = "SELECT * from lap_komisi  WHERE id_karyawan ='$id_karyawan' AND date_invoice BETWEEN '$tanggal_dari' AND '$tanggal_sampai' order by id_transaksi asc";
		$cari = $this->db->query($query);
		$cari->num_rows();
		if($bulan == 01){$bul = "JANUARI";}elseif($bulan == 02){$bul = "FEBRUARI";}elseif($bulan == 03){$bul = "MARET";}elseif($bulan == 04){$bul = "APRIL";}elseif($bulan == 05){$bul = "MEI";}elseif($bulan == 06){$bul = "JUNI";}elseif($bulan == 07){$bulan = "JULI";}elseif($bulan == 08){$bulan = "AGUSTUS";}elseif($bulan == 09){$bul = "SEPTEMBER";}elseif($bulan == 10){$bul = "OKTOBER";}elseif($bulan == 11){$bul = "NOVEMBER";}elseif($bulan == 12){$bul = "DESEMBER";}
		

		
 ?>
 <?php
 $query = "select * from tb_sales  WHERE id_sales='$id_karyawan'";
	$jumlah = $this->db->query($query);
 ?>
<?php foreach ($jumlah->result()  as $p){
}
?>
<table align="center" cellpadding="0" width="900px" style="margin-top: 15px;">
	<tr bgcolor="#fff">
		<td height="20" colspan="5" align="center" id="FB" class="html1"><b><font color="#000000"> &nbsp Laporan Komisi Penjualan</font></b></td>
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
<tr bgcolor="#fff">
		<td height="10" colspan="5"  id="fC"><b><font color="#000000"><?php echo "Nama Sales :".$p->nama_sales ?></font></b></td>
	</tr>
	<tr bgcolor="#fff">
		<td height="20"></td>
	</tr>
	<tr id="fC">
		<td width = "5%"><b>No</b></td>
		<td width = "20%"><b>No Transaksi</b></td>
		<td align="right" width = "15%"><b>Total</b></td>
		<td align="right" width = "15%"><b>Komisi</b></td>
		<td align="center" width = "10%"><b>ACC</b></td>
	</tr>
	<tr>
		<td colspan="5" id="fD">________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</td>
	
	</tr>
	<?php
	$no=1;
	$p=0;
	$k=0;
	
	if(isset($cari)){
	foreach ($cari->result_array() as $data){
	$p=$p+$data['total_penjualan'];
	$k=$k+$data['total_komisi'];
	?>
	<tr id="fC">
	<td><?php echo $no;?></td>
	<td><?php echo $data['id_transaksi'];?>/<?php echo $data['id_pelanggan'];?>/<?php echo $data['no_reff'];?></td>
	<td align="right">
	<?php if($data['total_penjualan'] == 0){
				echo "-";
			}elseif($data['total_penjualan'] > 0){
			echo number_format($data['total_penjualan']);
			}else{
				echo number_format($data['total_penjualan']);
			}
			?></td>
		<td align="right">
	<?php if($data['total_komisi'] == 0){
				echo "-";
			}elseif($data['total_komisi'] > 0){
			echo number_format($data['total_komisi']);
			}else{
				echo number_format($data['total_komisi']);
			}
			?></td>
			<td align="center"><?php if($data['status'] == 1){echo "Y";}else{echo "T";}?></td>
    </tr> 
	<?php $no++; }}?>
	<tr>
	<tr>
		<td colspan="5" id="fD">________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</td>
	</tr>
	 <?php
 $query = "select sum(total_komisi) as total_komisi from lap_komisi  WHERE status=1 AND date_invoice BETWEEN '$tanggal_dari' AND '$tanggal_sampai' AND id_karyawan='$id_karyawan'";
	$jumlah = $this->db->query($query);
 ?>
<?php foreach ($jumlah->result()  as $l){
}
?>
 <?php
 $query = "select sum(total_komisi) as total_komisi from lap_komisi  WHERE status=0 AND date_invoice BETWEEN '$tanggal_dari' AND '$tanggal_sampai' AND id_karyawan='$id_karyawan'" ;
	$jumlah = $this->db->query($query);
 ?>
<?php foreach ($jumlah->result()  as $b){
}
?>
<?php
 $query = "select sum(total_penjualan) as total_penjualan from lap_komisi  WHERE status=0 AND date_invoice BETWEEN '$tanggal_dari' AND '$tanggal_sampai' AND id_karyawan='$id_karyawan'";
	$jumlah = $this->db->query($query);
 ?>
<?php foreach ($jumlah->result()  as $t){
}
?>
		<table  align="center" cellpadding="0" cellspacing="0" class="all" width="1275px"id="fC" >
				<tr id="fC" height="20px">
							<th  width="550"colspan='10' ></th>
							<th  align="right">Total Komisi lunas :</th>
							<td align="right" >Rp. </td>
							<td align="right" ><?php if($l->total_komisi > 0){
										echo number_format($l->total_komisi,2);
									}else{
									?>
										-
									<?php
									}
									?>
									</td>
							</tr >
							<tr id="fC" height="20px">
							<th  width="150"colspan='10' ></th>
							<th align="right" >Total Komisi Pending :</th>
							<td align="right">Rp. </td>
							<td align="right" colspan='0'><?php if($b->total_komisi > 0){
										echo number_format($b->total_komisi,2);
									}else{
									?>
										-
									<?php
									}
									?></td>
							</tr>		
							<tr id="fC" height="20px">
							<th  width="150"colspan='10' ></th>
							<th align="right" >Total Penjualan Belum Lunas :</th>
							<td align="right">Rp. </td>
							<td align="right" colspan='0'><?php if($t->total_penjualan > 0){
										echo number_format($t->total_penjualan,2);
									}else{
									?>
										-
									<?php
									}
									?></td>
							</tr>		
							</table>
</table>	
</body>