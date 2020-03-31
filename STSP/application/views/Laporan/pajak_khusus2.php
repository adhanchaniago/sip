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
		
<script>
function downloadCSV(csv, filename) {
    var fileCSV;
    var linkDonwload;

    // File CSV
    fileCSV = new Blob([csv], {type: "text/csv"});

    // Link download
    linkDonwload = document.createElement("a");

    // Nama file
    linkDonwload.download = filename;

    // Membuat link ke file
    linkDonwload.href = window.URL.createObjectURL(fileCSV);

    // Menyembunyikan link download
    linkDonwload.style.display = "none";

    // Menambahkan link ke DOM
    document.body.appendChild(linkDonwload);

    // Klik link download
    linkDonwload.click();
}

function exportTabelKeCSV(filename) {
    var csv = [];
	var baris = document.querySelectorAll("table tr");
	
    for (var i = 0; i < baris.length; i++) {
		var row = [], cols = baris[i].querySelectorAll("td, th");
		
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
		csv.push(row.join(","));		
	}

    // Download file CSV
    downloadCSV(csv.join("\n"), filename);
}
</script>
  <body class="html" onload="exportTabelKeCSV('Import_PK_Masa Export On <?php echo date('dmY');?>.csv')">
<?php		
					$tanggal_dari	= date('Y-m-d' ,strtotime($this->input->get('tanggal_dari')));
					$tanggal_sampai	= date('Y-m-d' ,strtotime($this->input->get('tanggal_sampai')));
					$query = "select tb_pelanggan.id_pelanggan,tb_pelanggan.nama_pelanggan,tb_pelanggan.no_npwp,tb_pelanggan.alamat,tb_penjualan.no_reff,tb_penjualan.no_jual,tb_penjualan.total,tb_penjualan.dpp,tb_penjualan.acc,tb_penjualan.ppn,tb_penjualan.tgl_invoice from tb_penjualan INNER JOIN tb_pelanggan ON tb_penjualan.id_pelanggan=tb_pelanggan.id_pelanggan WHERE date_invoice BETWEEN '$tanggal_dari' AND '$tanggal_sampai' AND tb_penjualan.total > 0 AND tb_penjualan.acp = 1 ORDER BY tb_penjualan.no_jual DESC";
					$cari = $this->db->query($query);
					$cari->num_rows();
					
	

		
 ?>
 
 <?php		
		$query = "select * FROM tb_perusahaan";
		$cari1 = $this->db->query($query);
		$cari1->num_rows();
	 
		

		
 ?>

 <?php
	if(isset($cari1)){
	foreach ($cari1->result_array() as $data1){
	?>
	<?php }}?>

	
	
 
<button class="btn btn-success" onclick="exportTabelKeCSV('pajak.csv')">Export data ke CSV</button>	
<table  align="center" cellpadding="0" cellspacing="0" class="all" width="1250px" style="margin-left: 5px;" border="0">
<tr id="fC">
		<td width = "10%"><b>FK </b></td>
		<td width = "15%"><b>KD_JENIS_TRANSAKSI</b></td>
		<td width = "15%"><b>FG_PENGGANTI</b></td>
		<td width = "15%"><b>NO_FAKTUR</b></td>
		<td width = "15%"><b>MASA_PAJAK</b></td>
		<td width = "15%"><b>TAHUN_PAJAK</b></td>
		<td width = "15%"><b>TANGGAL_FAKTUR</b></td>
		<td width = "15%"><b>NPWP</b></td>
		<td width = "15%"><b>NAMA</b></td>
		<td width = "15%"><b>ALAMAT</b></td>
		<td width = "15%"><b>JUMLAH_DPP</b></td>
		<td width = "15%"><b>JUMLAH_PPN</b></td>
		<td width = "15%"><b>JUMLAH_PPNBM</b></td>
		<td width = "15%"><b>ID_KETERANGAN_TAMBAHAN</b></td>
		<td width = "15%"><b>FG_UANG_MUKA</b></td>
		<td width = "15%"><b>UANG_MUKA_DPP</b></td>
		<td width = "15%"><b>UANG_MUKA_PPN</b></td>
		<td width = "15%"><b>UANG_MUKA_PPNBM</b></td>
		<td width = "15%"><b>REFERENSI</b></td>
	</tr>
	<tr id="fC">
		<td width = "10%"><b>LT </b></td>
		<td width = "15%"><b>NPWP</b></td>
		<td width = "15%"><b>NAMA</b></td>
		<td width = "15%"><b>JALAN</b></td>
		<td width = "15%"><b>BLOK</b></td>
		<td width = "15%"><b>NOMOR</b></td>
		<td width = "15%"><b>RT</b></td>
		<td width = "15%"><b>RW</b></td>
		<td width = "15%"><b>KECEMATAN</b></td>
		<td width = "15%"><b>KELURAHAN</b></td>
		<td width = "15%"><b>KABUPATEN</b></td>
		<td width = "15%"><b>PROPINSI</b></td>
		<td width = "15%"><b>KODE_POS</b></td>
		<td width = "15%"><b>NO_TELEPON,,,,,</b></td>
	</tr>
	<tr id="fC">
		<td width = "10%"><b>OF </b></td>
		<td width = "15%"><b>KODE_OBJEK</b></td>
		<td width = "15%"><b>NAMA</b></td>
		<td width = "15%"><b>HARGA_SATUAN</b></td>
		<td width = "15%"><b>JUMLAH_BARANG</b></td>
		<td width = "15%"><b>HARGA_TOTAL</b></td>
		<td width = "15%"><b>DISKON</b></td>
		<td width = "15%"><b>DPP</b></td>
		<td width = "15%"><b>PPN</b></td>
		<td width = "15%"><b>TARIF_PPNBM</b></td>
		<td width = "15%"><b>PPNBM,,,,,,,,</b></td>
	</tr>
	<?php
	$no=$data1['no_faktur'];
	$dpp=0;
	$ppn=0;
	if(isset($cari)){
	foreach ($cari->result_array() as $data){
	$dpp = $data['total'] / 1.1; 
	$ppn = $dpp * 10/100;
	?>
	
	<tr id="fC" >
	<td>FK</td>
	<td>01</td>
	<td>0</td>
	<td><?php echo substr($no++,1);?></td>
	<td><?php echo date('m',strtotime($data['tgl_invoice']));?></td>
	<td><?php echo date('Y',strtotime($data['tgl_invoice']));?></td>
	<td><?php echo date('d/m/Y' ,strtotime($data['tgl_invoice']));?></td>
	<td><?php if($data['no_npwp'] == 0){echo "000000000000000";}else{ echo $data['no_npwp'];}?></td>
	<td><?php echo $data['nama_pelanggan'];?></td>
	<td><?php echo $data['alamat'];?></td>
	<td><?php echo round($dpp);?></td>
	<td><?php echo round($ppn);?></td>
	<td>0</td>
	<td>0</td>
	<td>0</td>
	<td>0</td>
	<td>0</td>
	<td>0</td>
	<td><?php echo $data['no_jual'];?></td>
			
   <tr id="fC">
	<td>FAPR</td>
	<td><?php echo $data1['nama'];?></td>
	<td><?php echo $data1['alamat'];?>,,,,,,,,,,,,,,,,,</td>
    </tr> 
	<?php		
		$no_jual = $data['no_jual'];
		$query2 = "select tb_barang.id_barang,tb_barang.nama_barang,tb_penjualan.no_jual, tb_detail_penjualan.qtyb,tb_detail_penjualan.harga_beli,tb_detail_penjualan.qtyb * tb_detail_penjualan.harga_beli as subtotal, tb_detail_penjualan.disc,tb_detail_penjualan.disc1,tb_penjualan.dpp,tb_penjualan.ppn from tb_penjualan INNER JOIN tb_detail_penjualan ON tb_penjualan.no_jual=tb_detail_penjualan.no_jual INNER JOIN tb_barang ON tb_detail_penjualan.id_barang=tb_barang.id_barang WHERE tb_detail_penjualan.no_jual = '$no_jual' AND tb_detail_penjualan.qtyb > 0 ";
		$cari2 = $this->db->query($query2);
		$cari2->num_rows();
		
	?>
	
	<?php
	$disc=0;
	$disc1=0;
	$disc2=0;
	$disc3=0;
	$dpp=0;
	$ppn=0;
	if(isset($cari2)){
	foreach ($cari2->result_array() as $data2){
	$disc=$data2['subtotal'] * $data2['disc'] /100;
	$disc1=$data2['subtotal'] - $disc ;
	$disc2=$disc1 * $data2['disc1'] /100  ;
	$disc3=$data2['subtotal'] - $disc - $disc2;
	$dpp=$disc3 / 1.1;
	$ppn=$dpp * 10/100;
	?>
	<tr id="fC">
	<td>OF</td>
	<td><?php echo $data2['id_barang'];?></td>
	<td><?php echo $data2['nama_barang'];?></td>
	<td><?php echo $data2['harga_beli'];?></td>
	<td><?php echo $data2['qtyb'];?></td>
	<td><?php echo $data2['harga_beli'] * $data2['qtyb'];?></td>
	<td><?php echo $disc + $disc2;?></td>
	<td><?php echo round($dpp);?></td>
	<td><?php echo round($ppn) ;?></td>
	<td>0</td>
	<td>0,,,,,,,,</td>
    </tr> 
<?php }}?>
<?php }}?>
</table>	
</body>