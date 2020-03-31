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
		$tanggal_dari	= $this->input->get('tanggal_dari');
		$tanggal_sampai	= $this->input->get('tanggal_sampai');
		$id_pelanggan   = $this->input->get('id_pelanggan');
		$query = "SELECT * from tb_penjualans WHERE tb_penjualans.id_pelanggan = '$id_pelanggan' AND jatuh_tempo BETWEEN '$tanggal_dari' AND '$tanggal_sampai' AND tb_penjualans.sisa > 0 ORDER BY tgl_invoice DESC ";
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

<table align="center" cellpadding="0" width="533px" >
	<tr bgcolor="#fff">
		<td height="20" colspan="5" align="center" id="FB" class="html1"><b><font color="#000000"> &nbsp Tanda Terima</font></b></td>
	</tr>
	<tr bgcolor="#fff">
		<td height="10" colspan="5" align="center" id="fC"><b><font color="#000000"> &nbsp <?php echo "Per     ".date('d-m-Y',strtotime($tanggal_sampai)); ?></font></b></td>
	</tr>
	<tr bgcolor="#fff">
		<td height="20"></td>
	</tr>
	</table>
	<br>
<table  align="center" cellpadding="0" cellspacing="0" class="all" width="533px" id="FB" style="margin-left: 3px;">
	<tr>
	<td height="25" colspan="5"  id="fC"><b><font color="#000000"> <?php echo "Nama Pelanggan    &nbsp &nbsp &nbsp" .$p->nama_pelanggan;?></font></b></td>
	</tr>
</table>
<table align="left" width="900px"  >
	<tr id="fC">
		<td width = "1%"><b>No</b></td>
		<td width = "10%"><b>Tanggal</b></td>
		<td width = "10%"><b>JTH Tempo</b></td>
		<td width = "15%"><b>No Invoice</b></td>
		<td align="right" width = "10%"><b>Tagihan</b></td>
		<td align="right" width = "10%"><b>Sisa Tagihan</b></td>
	</tr>
	<tr>
		<td  id="FD"colspan="6"align="right">________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</td>
		<td></td>
		<td></td>
		<td></td>
		<td ></td>
		<td ></td>
	</tr>
	<?php
	$no=1;
	$saldo=0;
	$pj=0;
	$by=0;
	$pt=0;
	$kb=0;
	$total=0;
	if(isset($cari)){
	foreach ($cari->result_array() as $data){
	$pj=$pj+$data['sisa'];
	$by=$by+$data['total'];
	
	?>
	<tr id="fC">
	<td><?php echo $no;?></td>
	<td><?php echo $data['tgl_invoice'];?></td>
	<td><?php echo date('d-m-Y',strtotime($data['jatuh_tempo']));?></td>
	<td><?php echo $data['no_jual'];?>/<?php echo $data['id_pelanggan'];?><?php if($data['no_reff'] == 0){echo "";}else{echo "/". $data['no_reff'];}?></td>
	<td align="right">
	<?php if($data['total'] > 0){
				echo number_format($data['total']);
			}else{
			?>
				-
			<?php
			}
			?>	
	</td>
	<td align="right">
		<?php if($data['sisa'] > 0){
				echo  number_format($data['sisa']);
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
		<td  id="FD"colspan="6"align="right">________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</td>
		<td></td>
		<td></td>
		<td></td>
		<td ></td>
		<td ></td>
	</tr>
							<tr id="fC" height="20px">
							<td width="150"colspan='3' align = "center">Penerima</td>
							<td align="right" colspan='2'><b>Total Tagihan </b></td>
							<td align="right" colspan='1'><?php if($by > 0){
										echo"Rp. ", number_format($by,2);
									}else{
									?>
										-
									<?php
									}
									?></td>
							</tr >
							<tr id="fC" height="20px">
							<td width="150"colspan='3' ></td>
							<td align="right" colspan='2' ><b>Total Sisa Tagihan </b></td>
							<td align="right" colspan='1'> 
							<?php if($pj > 0){
										echo"Rp. ",  number_format($pj,2);
									}else{
									?>
										-
									<?php
									}
									?>	</td>
							</tr>
							<tr id="fC" height="20px">
							<td width="150"colspan='3' ></td>
							<td align="right" colspan='2' ></td>
							<td align="right" colspan='2'> 	</td>
							</tr>
							<tr id="fC" height="20px">
							<td width="150"colspan='3' ></td>
							<td align="right" colspan='2' ><b></b></td>
							<td align="right" colspan='2'> </td>
							</tr>
							</tr>
							<tr id="fC" height="20px">
							<td width="150"colspan='3' ></td>
							<td align="right" colspan='2' ><b></b></td>
							<td align="right" colspan='2'> </td>
							</tr>
							<tr id="fC" height="20px">
							<td width="150"colspan='3' align = "center">(&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp)</td>
							<td align="right" colspan='2' ></td>
							<td align="right" colspan='2'> 	</td>
							</tr>
</table>	
</body>