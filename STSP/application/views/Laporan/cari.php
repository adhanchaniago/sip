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
  <body onclick="window.print();" class="html">

<?php		
		$tgl	= date('d-m-Y');
		$query1 = "SELECT * from tb_kas  WHERE tgl = '$tgl'";
		$cari1 = $this->db->query($query1);
		$cari1->num_rows();
	
		

		
 ?>
<?php		

		$tanggal_dari	= date('Y-m-d' ,strtotime($this->input->get('tanggal_dari')));
		$tanggal_sampai	= date('Y-m-d' ,strtotime($this->input->get('tanggal_sampai')));
		$id_pelanggan   = $this->input->get('id_pelanggan');
		$query = "SELECT * from transaksi_day WHERE transaksi_day.id_pelanggan = '$id_pelanggan' AND date_invoice BETWEEN '$tanggal_dari' AND '$tanggal_sampai' order by MID(tgl,4,2)DESC,LEFT(tgl,2)DESC,LEFT(jam,2)DESC,MID(jam,4,2)DESC,RIGHT(jam,2)DESC";
		$cari = $this->db->query($query);
		$cari->num_rows();
		

		
 ?>
 <?php
 $query = "select * from tb_pelanggan  WHERE tb_pelanggan.id_pelanggan='$id_pelanggan'";
	$jumlah = $this->db->query($query);
 ?>
<?php foreach ($jumlah->result()  as $p){
}
?>
<table align="center" cellpadding="0" width="533px" style="margin-top: 15px;">
	<tr bgcolor="#fff">
		<td height="20" colspan="5" align="center" id="FB" class="html1"><b><font color="#000000"> &nbsp Statement OF Account</font></b></td>
	</tr>
	<tr bgcolor="#fff">
		<td height="10" colspan="5" align="center" id="fC"><b><font color="#000000"> &nbsp <?php echo "Per  &nbsp ".date('d-m-Y',strtotime($tanggal_sampai)); ?></font></b></td>
	</tr>
	<tr bgcolor="#fff">
		<td height="20"></td>
	</tr>
	</table>
	<br>
	<table  align="center" cellpadding="0" cellspacing="0" class="all" width="533px" id="fC" style="margin-left: 3px;">
	<tr>
	<td height="25" colspan="5"  id="fC"><b><font color="#000000"> <?php echo "Nama Pelanggan  &nbsp &nbsp  " .$p->nama_pelanggan;?></font></b></td>
	</tr>
</table>
<table  align="center" cellpadding="0" cellspacing="0" class="all" width="1250px" style="margin-left: 5px;">
	<tr id="fC">
		<td width = "15%"><b>No</b></td>
		<td width = "90%"><b>No Transaksi</b></td>
		<td align="right" width = "15%"><b>Total</b></td>
		<td align="right" width = "15%"><b>Potongan</b></td>
		<td align="right" width = "15%"><b>Biaya</b></td>
		<td align="right" width = "15%"><b>G.Total</b></td>
		<td align="right" width = "15%"><b>Cash</b></td>
		<td align="right" width = "15%"><b>Debet</b></td>
		<td align="right" width = "15%"><b>Transfer</b></td>
		<td align="right" width = "15%"><b>Giro</b></td>
		<td align="right" width = "15%"><b>Kembali</b></td>
		<td align="right" width = "20%"><b>S.Tagihan</b></td>
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
	$dp=$dp+$data['deposit'];
	?>
	<tr id="fC">
	<td><?php echo $no;?></td>
	<td><?php echo $data['no_transaksi'];?>/<?php echo $data['id_pelanggan'];?><?php echo $data['id_supplier'];?><?php if($data['no_raff'] == 0){echo "";}else{echo "/". $data['no_raff'];}?></td>
	<td align="right">
	<?php if($data['total'] == 0){
				echo "-";
			}elseif($data['total'] > 0){
			echo number_format($data['total']);
			}else{
				echo number_format($data['total']);
			}
			?></td>
	<td align="right">
		<?php if($data['potongan'] > 0){
				echo  number_format($data['potongan']);
			}else{
			?>
				-
			<?php
			}
			?>	
	</td>
	<td align="right">
		<?php if($data['beban'] <> 0){
				echo  number_format($data['beban']);
			}else{
			?>
				-
			<?php
			}
			?>	
	</td><td align="right">
	<?php if($data['grand_total'] == 0){
				echo "-";
			}elseif($data['grand_total'] > 0){
			echo number_format($data['grand_total']);
			}else{
				echo number_format($data['grand_total']);
			}
			?></td>
	<td align="right">
	<?php if($data['cash'] <> 0){
				echo number_format($data['cash']);
			}else{
			?>
				-
			<?php
			}
			?>	
	</td>
	<td align="right">
		<?php if($data['debet'] > 0){
				echo  number_format($data['debet']);
			}else{
			?>
				-
			<?php
			}
			?>	
	</td>
	<td align="right">
		<?php if($data['transfer'] <> 0){
				echo  number_format($data['transfer']);
			}else{
			?>
				-
			<?php
			}
			?>	
	</td>
	<td align="right">
		<?php if($data['giro'] > 0){
				echo  number_format($data['giro']);
			}else{
			?>
				-
			<?php
			}
			?>	
	</td>
	<td align="right">
		<?php if($data['kembali'] > 0){
				echo  number_format($data['kembali']);
			}else{
			?>
				-
			<?php
			}
			?>	
	</td>
	<td align="right">
		<?php if($data['sisa_tagihan'] > 0){
				echo  number_format($data['sisa_tagihan']);
			}else{
			?>
				-
			<?php
			}
			?>	
	</td>
	
    </tr> 
	<?php $no++; }}?>
	<tr>
	<tr>
		<td colspan="13" id="fD">________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</td>
	</tr>
		<table  align="center" cellpadding="0" cellspacing="0" class="all" width="1275px"id="fC" >
				<tr id="fC" height="20px">
							<th  width="550"colspan='10' ></th>
							<th  align="right">Total :</th>
							<td align="right" >Rp. </td>
							<td align="right" ><?php if($t > 0){
										echo number_format($t,2);
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
							<th align="right" >Total Potongan :</th>
							<td align="right">Rp. </td>
							<td align="right" colspan='0'><?php if($p > 0){
										echo number_format($p,2);
									}else{
									?>
										-
									<?php
									}
									?></td>
							</tr>
							<tr id="fC" height="20px">
							<th  width="150"colspan='10' ></th>
							<th align="right" >Total Biaya :</th>
							<td align="right">Rp. </td>
							<td align="right" colspan='0'><?php if($b <> 0){
										echo number_format($b,2);
									}else{
									?>
										-
									<?php
									}
									?></td>
							</tr>
							<tr id="fC" height="20px">
							<th  width="150"colspan='10' ></th>
							<th align="right" >Grand Total :</th>
							<td align="right">Rp. </td>
							<td align="right" colspan='0'><?php if($gr > 0){
										echo number_format($gr,2);
									}else{
									?>
										-
									<?php
									}
									?></td>
							</tr>
							<tr id="fC" height="20px">
							<th  width="150"colspan='10' ></th>
							<th align="right" >Total Cash :</th>
							<td align="right">Rp. </td>
							<td align="right" colspan='0'><?php if($c > 0){
										echo number_format($c,2);
									}elseif($c < 0){
										echo number_format($c,2);
										}else{
									?>
										-
									<?php
									}
									?></td>
							</tr >
							<tr id="fC" height="20px">
							<th  width="150"colspan='10' ></th>
							<th align="right" >Total Debet :</th>
							<td align="right">Rp. </td>
							<td align="right" colspan='0'><?php if($d > 0){
										echo number_format($d,2);
									}else{
									?>
										-
									<?php
									}
									?></td>
							</tr>		
							<tr id="fC" height="20px">
							<th  width="150"colspan='10' ></th>
							<th align="right" >Total Transfer :</th>
							<td align="right">Rp. </td>
							<td align="right" colspan='0'><?php if($tr <> 0){
										echo  number_format($tr,2);
									}else{
									?>
										-
									<?php
									}
									?></td>
							</tr>		
							<tr id="fC" height="20px">
							<th  width="150"colspan='10' ></th>
							<th align="right" >Total Giro :</th>
							<td align="right">Rp. </td>
							<td align="right" colspan='0'><?php if($g > 0){
										echo number_format($g,2);
									}else{
									?>
										-
									<?php
									}
									?></td>
							</tr>
							<tr id="fC" height="20px">
							<th  width="150"colspan='10' ></th>
							<th align="right" >Total Deposit :</th>
							<td align="right">Rp. </td>
							<td align="right" colspan='0'><?php if($dp > 0){
										echo number_format($dp,2);
									}else{
									?>
										-
									<?php
									}
									?></td>
							</tr>
							<tr id="fC" height="20px">
							<th  width="150"colspan='10' ></th>
							<th align="right" >Total Kembali :</th>
							<td align="right">Rp. </td>
							<td align="right" colspan='0'><?php if($k > 0){
										echo number_format($k,2);
									}else{
									?>
										-
									<?php
									}
									?></td>
							</tr>
							<tr id="fC" height="20px">
							<th  width="150"colspan='10' ></th>
							<th align="right" >Total Sisa Tagihan :</th>
							<td align="right">Rp. </td>
							<td align="right" colspan='0'><?php if($s > 0){
										echo number_format($s,2);
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