<html >
<head>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">  
  
		</head>
	<style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
  <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}


</style>
  <body>
  
 <div class="modal fade" id="konfirmasi_hapus" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <b>Anda yakin ingin menghapus data ini ?</b><br><br>
                    <a class="btn btn-danger btn-ok pull-right"> Hapus</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                </div>
            </div>
        </div>
    </div>
	<div class="row">
	<section id="example2" class="col-lg-12 connectedSortable">
		
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
				<?php 
						$user = $this->session->userdata('username');
						$query = "select * from menu WHERE level = '$user'";
								$j = $this->db->query($query);
								$j->num_rows();
								
							?>
							<?php foreach ($j->result() as $j){ 
							}
							?>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_purchase_order"><i class="fa fa-money"></i> <b> Transaksi Purchase Order</b></a></li>
				<?php if ($j->l_transaksi_pembelian == "Y"): ?>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_transaksib" ><i class="fa fa-money"></i> <b> Transaksi Pembelian Perhari</b></a></li>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_transaksibulan" ><i class="fa fa-money"></i> <b> Transaksi Pembelian Pernota</b></a></li>
				<?php endif;?>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_sales_order" ><i class="fa fa-money"></i> <b> Transaksi Sales Orderr</b></a></li>
				<?php if ($j->l_transaksi_penjualan == "Y"): ?>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_transaksi" ><i class="fa fa-money"></i> <b> Transaksi Penjualan Perhari</b></a></li>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_transaksipbulan" ><i class="fa fa-money"></i> <b> Transaksi Penjualan Pernota</b></a></li>
				  <?php endif;?>
				<?php if ($j->lap_pajak == "Y"): ?>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_pajak2" ><i class="fa fa-money"></i> <b>Pajak Umum</b></a></li>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_pajak_khusus"><i class="fa fa-money"></i> <b> Pajak Khusus</b></a></li>
				  <?php endif;?>
				<?php if ($j->lap_komisi == "Y"): ?>
				  <li class="active"><a href="<?php echo base_url(); ?>Laporan/lap_komisisales" data-toggle="tab"><i class="fa fa-money"></i> <b> Komisi </b></a></li>
				  <?php endif;?>
				</ul>
			</div>
            <!-- /.box-header -->
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
            <div class="box-body">
			<div class="col-md-6" style="width :65%">
			<form class="form-horizontal" action="<?php echo base_url(); ?>Laporan/lap_komisisales" method="GET">
				<div class="form-group">
								<label class="col-sm-40 control-label" style="width :100px;margin-right :1px;margin-left: 7px;">Nama Sales</label>
								<div class="col-sm-37" style="width :150px">
									<select name="id_karyawan" id="id_karyawan" class="form-control select2"  style="width: 130%;" autofocus tabindex="1" required> 
											<?php
											foreach ($listsales->result() as $d){ 
												?>
										 <option value="<?php echo $d->id_sales; ?>"><?php echo $d->nama_sales; ?></option>
											<?php }?>
									</select>
								</div>
				</div>
				<div class="form-group" style="margin-top: -4%;margin-left: 36%;">
								<label class="col-sm-40 control-label" style="width :50px;margin-right :1px;margin-left: 7px;">Tgl Dari</label>
								<div class="col-sm-37"  style="width :150px">
								<div class="input-group">
									<input type="text"   name='tanggal_dari' class='form-control' id='tanggal_dari' tabindex="2" value="<?php echo date('d-m-Y');?>"  required>
								</div>
								</div>
								
								<label class="col-sm-40 control-label" style="width :60px;margin-right :12px;margin-left: 7px;">Tgl Sampai</label>
								<div class="col-sm-37"  style="width :150px">
								<div class="input-group">
									<input type="text"   name='tanggal_sampai' class='form-control' id='tanggal_sampai' tabindex="3" value="<?php echo date('d-m-Y');?>"  required>
								</div>
								</div>
								<div class="col-sm-37"  style="width :150px;margin-top: -6%;margin-left: 78%;">
								<div class="input-group">
									<input type="submit"  value = "CARI" class="btn btn-sm btn-primary" style="margin-left: 10px;" tabindex="4">
									<a href = "<?php echo base_url('Laporan/komisi?id_karyawan='.$id_karyawan.'&tanggal_dari='.$tanggal_dari.'&tanggal_sampai='.$tanggal_sampai.'');?>" class = "btn btn-sm btn-success" target = "" style="margin-left:425%;margin-top: -52px;">cetak</a>
								</div>
								</div>
							</div>
				</form>
				<br />
			<div id='result'></div>
				</div>
              </div>
			  <table align="center" cellpadding="0" width="533px" style="margin-top: 15px;">
				<tr bgcolor="#fff">
					<td height="20" colspan="5" align="center" id="FB" ><b><font color="#000000" size ="3"> &nbsp Laporan Komisi Penjualan</font></b></td>
				</tr>
				<tr bgcolor="#fff">
								<td height="10" colspan="5" align="center" id="fC"><b><font color="#000000"> &nbsp <?php echo "Nama Sales  &nbsp ".$p->nama_sales; ?></font></b></td>
				</tr>
				<tr bgcolor="#fff">
								<td height="10" colspan="5" align="center" id="fC"><b><font color="#000000"> &nbsp <?php echo "Per  &nbsp ".date('d-m-Y',strtotime($tanggal_dari)); ?> s/d <?php echo date('d-m-Y',strtotime($tanggal_sampai)); ?></font></b></td>
				</tr>
				<tr bgcolor="#fff">
					<td height="20"></td>
				</tr>
				
			</table>
			<table class="table table-condensed" align = "center" style="width:1230px">
			<thead bgcolor="#66CCFF">
			<tr>
			<td><b>No</b></td>
			<td><b>No Transaksi</b></td>
			<td align="center"><b>ACC</b></td>
			<td align="right"><b>Total</b></td>
			<td align="right"><b>Komisi</b></td>
			</tr>
			</thead>
			<tbody>
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
	<td align="center"><?php if($data['status'] == 1){echo "Y";}else{echo "T";}?></td>
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
			
    </tr> 
	<?php $no++; }}?>
			</tbody>
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
					<tr>
					<td colspan = "4" align = "right"><b>Total Komisi</b></td>
					<td align = "right"><b><?php if($l->total_komisi > 0){
										echo number_format($l->total_komisi,2);
									}else{
									?>
										-
									<?php
									}
									?></b></td>
					</tr>
					<tr>
					<td colspan = "4" align = "right"><b>Total Komisi Pending</b></td>
					<td  align = "right"><b><?php if($b->total_komisi > 0){
										echo number_format($b->total_komisi,2);
									}else{
									?>
										-
									<?php
									}
									?></b></td>
					</tr>
					<tr>
					<td colspan = "4" align = "right"><b>Total Komisi Belum Lunas</b></td>
					<td align = "right"><b><?php if($t->total_penjualan > 0){
										echo number_format($t->total_penjualan,2);
									}else{
									?>
										-
									<?php
									}
									?></b></td>
					</tr>
			</table>
			<iframe name="tampil" frameborder="0"  style="width:10px;height:5px"></iframe>
            </div>
			</section>
			

</body>
<script src="<?php echo base_url(); ?>assets/d/dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/editable-table/mindmup-editabletable.js"></script>   
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/editable-table/numeric-input-example.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.css"/>
<script src="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.js"></script>
<script>
$('#tanggal_dari').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'d-m-Y',
	closeOnDateSelect:true
});
$('#tanggal_sampai').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'d-m-Y',
	closeOnDateSelect:true
});
</script>
<script>
  $('select').select2();

</script>
</html>