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
		$bul=0;
		$id	= 2;
		$query = "SELECT customer.id,customer.nama,jual.no_jual as beli,jual.total,trimadetail.no_jual as bayar,trimadetail.jumlah from jual inner join customer on jual.id_customer=customer.id inner join trimadetail on jual.no_jual=trimadetail.no_jual where customer.id='$id'";
		$cari = $this->db->query($query);
		$cari->num_rows();
		

		
 ?>
<table align="center" cellpadding="0" width="533px" style="margin-top: 15px;">
	<tr bgcolor="#fff">
		<td height="20" colspan="5" align="center" id="FB" ><b><font color="#000000"> &nbsp Laporan Komisi Balance</font></b></td>
	</tr>
	<tr bgcolor="#fff">
	</tr>
	<tr bgcolor="#fff">
		<td height="20"></td>
	</tr>
	
	</table>
	<br>
<table  align="center" cellpadding="0" cellspacing="0" class="all" width="1250px" style="margin-left: 5px;" >
<tr bgcolor="#fff">
	</tr>
	<tr bgcolor="#fff">
		<td height="20"></td>
	</tr>
	<tr id="fC">
		<td width = "5%"><b>No</b></td>
		<td width = "5%"><b>Nama</b></td>
		<td width = "20%"><b>Beli</b></td>
		<td width = "20%"><b>Total</b></td>
		<td width = "20%"><b>Bayar</b></td>
		<td width = "20%"><b>Jumlah</b></td>
	</tr>
	<tr>
		<td colspan="13" id="fD">___________________________________________________________________________________________________________________________________________________________________</td>
	
	</tr>
	<?php
	$no=1;
	
	if(isset($cari)){
	foreach ($cari->result_array() as $data){
	?>
	<tr id="fC">
	<td><?php echo $data['id'];?></td>
	<td><?php echo $data['nama'];?></td>
	<td><?php echo $data['beli'];?></td>
	<td><?php echo $data['total'];?></td>
	<td><?php echo $data['bayar'];?></td>
	<td><?php echo $data['jumlah'];?></td>
    </tr> 
	<?php }}?>
	
</table>	
</body>