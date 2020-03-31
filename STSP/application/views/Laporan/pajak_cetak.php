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
					
					$tanggal_dari	= date('Y-m-d' ,strtotime($this->input->get('tanggal_dari')));
					$tanggal_sampai	= date('Y-m-d' ,strtotime($this->input->get('tanggal_sampai')));
					$query = "select tb_pelanggan.id_pelanggan,tb_pelanggan.nama_pelanggan,tb_pelanggan.no_npwp,tb_pelanggan.alamat,tb_penjualan.no_reff,tb_penjualan.no_jual,tb_penjualan.total,tb_penjualan.acp,tb_penjualan.dpp,tb_penjualan.acc,tb_penjualan.ppn,tb_penjualan.tgl_invoice,tb_penjualan.date_invoice from tb_penjualan INNER JOIN tb_pelanggan ON tb_penjualan.id_pelanggan=tb_pelanggan.id_pelanggan WHERE date_invoice BETWEEN '$tanggal_dari' AND '$tanggal_sampai' AND tb_penjualan.total > 0 AND tb_penjualan.acp = 0 ORDER BY tb_penjualan.no_jual DESC";
					$cari = $this->db->query($query);
					$cari->num_rows();

					
			 ?>

<table align="center" cellpadding="0" width="533px" style="margin-top: 15px;">
	<tr bgcolor="#fff">
		<td height="20" colspan="5" align="center" id="FB" class="html1"><b><font color="#000000"> &nbsp Laporan Pajak</font></b></td>
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
				<thead >
				<tr id="FC">
					<td width="15%"><b>Nama Pelanggan</b></td>
					<td width="10%"><b>No NPWP</b></td>
					<td width="10%"><b>Tgl Invoice</b></td>
					<td width="20%" align = "center"><b>No Invoice</b></td>
					<td width="10%" align = "right"><b>Total</b></td>
					<td width="10%" align = "right"><b>Total DPP</b></td>
					<td width="10%" align = "right"><b>Total PPN</b></td>
				</tr>
				<tr>
		<td colspan="13" id="fD">________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</td>
	
	</tr>
				</thead>
				<tbody>
				
				<?php
				$sub = 0;
				$dpp = 0;
				$ppn = 0;
				$hasil_dpp = 0;
				$hasil_ppn = 0;
				if(isset($cari)){
				foreach ($cari->result_array() as $data1){
					$hasil_dpp = $data1['total'] / 1.1;
					$hasil_ppn = $hasil_dpp * 10/100;
					$sub = $sub + $data1['total'];
					$dpp = $dpp + $hasil_dpp;
					$ppn = $ppn + $hasil_ppn;
				?>
					<tr id="FC">
						<td><?php echo $data1['nama_pelanggan']?></td>
						<td><?php if($data1['no_npwp'] == 0){echo "000000000000000";}else{ echo $data1['no_npwp'];}?></td>
						<td><?php echo $data1['tgl_invoice']?></td>
						<td align = "center"><?php echo $data1['no_jual'].'/'.$data1['id_pelanggan'].'/'.$data1['no_reff'];?></td>
						<td align = "right"><?php echo number_format($data1['total'],2)?></td>
						<td align = "right"><?php echo number_format(round($hasil_dpp),2)?></td>
						<td align = "right"><?php echo number_format(round($hasil_ppn),2)?></td>
					
					</tr>
				<?php }} ?>
				<tr>
		<td colspan="13" id="fD">________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</td>
	
	</tr>
					<tr id="FC">
					<td colspan = "6" align = "right"><b>Grand Total</b></td>
					<td align = "right"><b><?php echo number_format($sub,2)?></b></td>
					</tr>
					<tr id="FC">
					<td colspan = "6" align = "right"><b>Total DPP</b></td>
					<td align = "right"><b><?php echo number_format(round($dpp),2)?></b></td>
					</tr>
					<tr id="FC">
					<td colspan = "6" align = "right"><b>Total PPN</b></td>
					<td align = "right"><b><?php echo number_format(round($ppn),2)?></b></td>
					</tr>
				</tbody>
				</table>
</body>