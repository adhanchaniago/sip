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
				font-size:9px;
				margin-top:0px;
				margin-left:0px;
				text-transform: uppercase;
				letter-spacing: 3.0pt;
				
			}
			#FD{
				font-size:12px;
				margin-top:0px;
				margin-left:0px;
				
			}
        </style>
  <body onclick="window.print();" class="html">


<?php		

		$tanggal_dari	= date('Y-m-d' ,strtotime($this->input->get('tanggal_dari')));
		$tanggal_sampai	= date('Y-m-d' ,strtotime($this->input->get('tanggal_sampai')));
		$kode_akun   = $this->input->get('kode_akun');
		$query = "SELECT * from transaksi_akun INNER JOIN daftar_subakun ON transaksi_akun.kode_akun = daftar_subakun.kode_subakun WHERE transaksi_akun.kode_akun = '$kode_akun' AND tgl BETWEEN '$tanggal_dari' AND '$tanggal_sampai' order by MID(tgl,4,2)DESC,LEFT(tgl,2)DESC,LEFT(jam,2)DESC,MID(jam,4,2)DESC,RIGHT(jam,2)DESC";
		$cari = $this->db->query($query);
		$cari->num_rows();
		

		
 ?>
 <?php
 $query = "select * from daftar_subakun  WHERE daftar_subakun.kode_subakun='$kode_akun'";
	$jumlah = $this->db->query($query);
 ?>
<?php foreach ($jumlah->result()  as $p){
}
?>
<table align="center" cellpadding="0" width="533px" style="margin-top: 15px;">
	<tr bgcolor="#fff">
		<td height="20" colspan="5" align="center" id="FB" ><b><font color="#000000"> &nbsp Buku Besar</font></b></td>
	</tr>
	<tr bgcolor="#fff">
		<td height="10" colspan="5" align="center" id="fC"><b><font color="#000000"> &nbsp <?php echo "Per  &nbsp ".date('d-m-Y',strtotime($tanggal_dari))." S/D ".date('d-m-Y',strtotime($tanggal_sampai)); ?></font></b></td>
	</tr>
	<tr bgcolor="#fff">
		<td height="20"></td>
	</tr>
	</table>
	<table  align="center" cellpadding="0" cellspacing="0" class="all" width="533px" id="fC" style="margin-left: 3px;">
	<tr>
	<td height="25" colspan="5"  id="fC"><b><font color="#000000"> <?php echo "Nama Akun  &nbsp &nbsp  " .$p->nama;?></font></b></td>
	</tr>
</table>
<table  align="center" cellpadding="0" cellspacing="0" class="all" width="1250px" style="margin-left: 5px;">
	<tr id="fC">
		<td><b>No Transaksi</b></td>
		<td><b>Tanggal</b></td>
		<td><b>Akun</b></td>
		<td><b>Debit</b></td>
		<td><b>Kredit</b></td>
		<td><b>Saldo</b></td>
	</tr>
	<tr>
		<td colspan="6" id="fD">___________________________________________________________________________________________________________________________________________________________________</td>
	
	</tr>
	<?php 
				$saldo = 0;
				$total_debet = 0;
				$total_kredit = 0;
				$total_saldo = 0;
				$no_reff = 0;
				if(isset($cari)){
				foreach ($cari->result_array() as $data){
					$saldo = $data['debet'] - $data['kredit'];
					$total_debet = $total_debet + $data['debet'];
					$total_kredit = $total_kredit + $data['kredit'];
					$total_saldo = $total_saldo + $saldo;
					if($data['no_reff'] > 0){
						$no_reff = "/".$data['no_reff'];
					}else{
						$no_reff = "";
					}
					?>
				<tr id="fC">
				<td><?php echo $data['no_transaksi']."/".$data['id_kontak'].$no_reff;?></td>
				<td><?php echo $data['tgl'];?></td>
				<td><?php echo $data['nama'];?></td>
				<td><?php echo number_format($data['debet']);?></td>
				<td><?php echo number_format($data['kredit']);?></td>
				<td><?php echo number_format($saldo);?></td>
					<?php
				}}?>
				</tr>
				
	<tr>
	<tr>
		<td colspan="6" id="fD">___________________________________________________________________________________________________________________________________________________________________</td>
	</tr>
				<tr id="fC">
				<td colspan = "2" align = "left"><b></b></td>
				<td align = "left"><b>Grand Total</b></td>
				<td><b><?php echo number_format($total_debet);?></b></td>
				<td><b><?php echo number_format($total_kredit);?></b></td>
				<td><b><?php echo number_format($total_saldo);?></b></td>
				</tr>	
							
</table>	
</body>