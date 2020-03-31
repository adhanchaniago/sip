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
		$id_karyawan	= $this->input->get('id_karyawan');
		$query = "SELECT customer.id,jual.no_jual,jual.kode_sales,jual.tgl_buat,jual.total,jual.valid,jual.bayar,jual.total_retur,jual.total_returl,jual.tagihan,jual.bayar,jual.sisa from jual 
		inner join customer on jual.id_customer=customer.id  
		where customer.id='$id_karyawan'";
		$cari = $this->db->query($query);
		$cari->num_rows();
		

		
 ?>
 <?php
 $query = "select * from customer  WHERE ID='$id_karyawan'";
	$jumlah = $this->db->query($query);
 ?>
<?php foreach ($jumlah->result()  as $p){
}
?>
<section class="col-lg-6 connectedSortable" style="width:430px">
<table align="center" cellpadding="0" width="533px" style="margin-top: 15px;">
	<tr bgcolor="#fff">
		<td height="20" colspan="5" align="center" id="FB" ><b><font color="#000000"> &nbsp Laporan Nota Sudah Bayar</font></b></td>
	</tr>
	<tr bgcolor="#fff">
	</tr>
	<tr bgcolor="#fff">
		<td height="20"></td>
	</tr>
	
	</table>
	<br>
</section>
<section class="col-lg-6 connectedSortable" >
<table  align="center" cellpadding="0" cellspacing="0" class="all" width="250px" style="margin-left: 30px;" >
<tr bgcolor="#fff">
		<td height="20"></td>
	</tr>
	<tr bgcolor="#fff">
		<td height="10" colspan="5"  id="fC"><b><font color="#000000"><?php echo "Nama Customer :".$p->Nama ?></font></b></td>
	</tr>
	<tr bgcolor="#fff">
		<td height="20"></td>
	</tr>
	<tr id="fC">
		<td width = "3%"><b>No</b></td>
		<td width = "10%"><b>No Transaksi</b></td>
		<td width = "10%"><b>Tanggal Bayar</b></td>
		<td  align="right" width = "10%"><b>Bayar</b></td>
	</tr>
	<tr>
		<td colspan="4" id="fD">______________________________________________________________________________</td>
	
	</tr>
	
 <?php		
		$id_karyawan	= $this->input->get('id_karyawan');
		$query = "SELECT customer.id,trimadetail.no_jual as bayar,trima.rebate,trima.tgl_buat as tgl,trimadetail.jumlah from trima 
		inner join customer on trima.id_customer=customer.id  
		inner join trimadetail on trimadetail.no_trima=trima.no_trima
		where customer.id='$id_karyawan' order by trimadetail.no_jual asc";
		$cari1 = $this->db->query($query);
		$cari1->num_rows();
		

		
 ?>
	<?php
	$no=1;
	$p=0;
	$k=0;
	
	if(isset($cari1)){
	foreach ($cari1->result_array() as $data1){
	?>
	<tr id="fC">
	<td><?php echo $no;?></td>
	<td ><?php echo $data1['bayar'];?></td>
	<td><?php echo date('d-m-Y', strtotime($data1['tgl']));?></td>
	<td  align="right">
	<?php echo number_format($data1['jumlah']);?>
	</td>
    </tr> 
	<?php $no++; }}?>
	<tr>
	<tr>
		<td colspan="13" id="fD">______________________________________________________________________________</td>
	</tr>
	<?php
 $query = "SELECT customer.id,jual.no_jual,jual.tgl_buat,jual.total from jual 
		inner join customer on jual.id_customer=customer.id  
		where customer.id='$id_karyawan'";
	$jumlah = $this->db->query($query);
 ?>
<?php 
	$a=0;
foreach ($jumlah->result()  as $l){
	$a=$a+$l->total;
}
?>
<?php
 $query = "SELECT customer.id,trimadetail.no_jual as bayar,trima.rebate,trima.tgl_buat as tgl,trimadetail.jumlah from trima 
		inner join customer on trima.id_customer=customer.id  
		inner join trimadetail on trimadetail.no_trima=trima.no_trima
		where customer.id='$id_karyawan'";
	$jumlah = $this->db->query($query);
 ?>
<?php 
	$b=0;
foreach ($jumlah->result()  as $o){
	$b=$b+$o->jumlah;
}
?>
<?php
 $query = "SELECT count(no_jual) as tot from jual where id_customer='$id_karyawan'";
	$jumlah = $this->db->query($query);
 ?>
<?php 
foreach ($jumlah->result()  as $t){
}
?>
<?php
 $query = "SELECT count(no_jual) as ter from trima inner join trimadetail on trima.no_trima=trimadetail.no_trima where id_customer='$id_karyawan'";
	$jumlah = $this->db->query($query);
 ?>
<?php 
foreach ($jumlah->result()  as $tr){
}
?>
</section>
<section class="col-lg-6 connectedSortable" >
		<table  align="left" cellpadding="0" cellspacing="0" class="all" width="1250px"id="fC" style="margin-left:-44%">
					
							<tr id="fC" height="20px">
							<th  width="550"colspan='4' ></th>
							<th  align="right">Total Bayar :</th>
							<td align="right" >Rp. </td>
							<td align="right" ><?php if($b > 0){
										echo number_format($b,2);
									}else{
									?>
										-
									<?php
									}
									?>
									</td>
							</tr >							
							</table>
</table>
</section>
</body>