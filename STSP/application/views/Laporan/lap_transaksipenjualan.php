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
				<li class="active"><a href="<?php echo base_url(); ?>Laporan/lap_transaksi" data-toggle="tab"><i class="fa fa-money"></i> <b> Transaksi Penjualan Perhari</b></a></li>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_transaksipbulan" ><i class="fa fa-money"></i> <b> Transaksi Penjualan Pernota</b></a></li>
				  <?php endif;?>
				<?php if ($j->lap_pajak == "Y"): ?>
				  <li class=""><a href="<?php echo base_url(); ?>Laporan/lap_pajak2" ><i class="fa fa-money"></i> <b> Pajak Umum</b></a></li>
				  <li class=""><a href="<?php echo base_url(); ?>Laporan/lap_pajak_khusus"><i class="fa fa-money"></i> <b> Pajak Khusus</b></a></li>
				  <?php endif;?>
				  <?php if ($j->lap_komisi == "Y"): ?>
				  <li class=""><a href="<?php echo base_url(); ?>Laporan/lap_komisi"><i class="fa fa-money"></i> <b> Komisi </b></a></li>
				  <?php endif;?>
				</ul>
			</div>
            <!-- /.box-header -->
			<?php		
		$tanggal_dari	= date('Y-m-d' ,strtotime($this->input->get('tanggal_dari')));
		$tanggal_sampai	= date('Y-m-d' ,strtotime($this->input->get('tanggal_sampai')));
		$query = "SELECT * from transaksi_day  WHERE date_invoice BETWEEN '$tanggal_dari' AND '$tanggal_sampai' order by MID(tgl,4,2)DESC,LEFT(tgl,2)DESC,LEFT(jam,2)DESC,MID(jam,4,2)DESC,RIGHT(jam,2)DESC";
		$cari = $this->db->query($query);
		$cari->num_rows();
	
		

		
 ?>
 <?php 
 $dep=0;
 foreach ($cari->result_array() as $deposit){
	 $dep=$dep + $deposit['cash'];
 }
	 
	 ?>
            <div class="box-body">
			<div class="col-md-6" style="width :65%">
			<form class="form-horizontal" action="<?php echo base_url(); ?>Laporan/lap_transaksipenjualan" method="GET">
				<div class="form-group">
								<label class="col-sm-40 control-label" style="width :50px;margin-right :1px;margin-left: 7px;">Tgl Dari</label>
								<div class="col-sm-37"  style="width :150px">
								<div class="input-group">
									<input type="text"   name='tanggal_dari' class='form-control' id='tanggal_dari' tabindex="2" value="<?php echo date('d-m-Y');?>"  requered>
								</div>
								</div>
								
								<label class="col-sm-40 control-label" style="width :60px;margin-right :12px;margin-left: 7px;">Tgl Sampai</label>
								<div class="col-sm-37"  style="width :150px">
								<div class="input-group">
									<input type="text"   name='tanggal_sampai' class='form-control' id='tanggal_sampai' tabindex="3" value="<?php echo date('d-m-Y');?>"  requered>
								</div>
								</div>
								<div class="col-sm-37"  style="width :150px">
								<div class="input-group">
									<input type="submit"  value = "CARI" class="btn btn-sm btn-primary" style="margin-left: 10px;" tabindex="4">
									<a href = "<?php echo base_url('Laporan/transaksi?tanggal_dari='.$tanggal_dari.'&tanggal_sampai='.$tanggal_sampai.'');?>" class = "btn btn-sm btn-success" target = "" style="margin-left:699%;margin-top: -52px;">cetak</a>
								</div>
								</div>
							</div>
				</form>
				<br />
			<div id='result'></div>
				</div>
              </div>
            </div>
			</section>
<table align="center" cellpadding="0" width="533px" style="margin-top: -7px;">
	<tr bgcolor="#fff">
		<td height="20" colspan="5" align="center" id="FB" ><b><font color="#000000" size = "3"> &nbsp Laporan Transaksi Penjualan</font></b></td>
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
					<td align="right"><b>Total</b></td>
					<td align="right"><b>Potongan</b></td>
					<td align="right"><b>Biaya</b></td>
					<td align="right"><b>G.Total</b></td>
					<td align="right"><b>Cash</b></td>
					<td align="right"><b>Debet</b></td>
					<td align="right"><b>Transfer</b></td>
					<td align="right"><b>Giro</b></td>
					<td align="right"><b>Kembali</b></td>
					<td align="right"><b>S.Tagihan</b></td>
				</tr>
				
				</thead>
				<tbody>
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
				echo  number_format($data['cash']);
			}else{
			?>
				-
			<?php
			}
			?>	
	</td>
	<td align="right">
		<?php if($data['debet'] <> 0){
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
					<td colspan = "11" align = "right"><b>Total</b></td>
					<td colspan = "1" align = "right"><b><?php if($t > 0){
										echo number_format($t,2);
									}else{
									?>
										-
									<?php
									}
									?></b></td>
					</tr>
					<tr>
					<td colspan = "11" align = "right"><b>Total Potongan</b></td>
					<td colspan = "1" align = "right"><b><?php if($p > 0){
										echo number_format($p,2);
									}else{
									?>
										-
									<?php
									}
									?></b></td>
					</tr>
					<tr>
					<td colspan = "11" align = "right"><b>Total Biaya</b></td>
					<td colspan = "1" align = "right"><b><?php if($b <> 0){
										echo number_format($b,2);
									}else{
									?>
										-
									<?php
									}
									?></b></td>
					</tr>
					<tr>
					<td colspan = "11" align = "right"><b>Grand Total</b></td>
					<td colspan = "1" align = "right"><b><?php if($gr > 0){
										echo number_format($gr,2);
									}else{
									?>
										-
									<?php
									}
									?></b></td>
					</tr>
					<tr>
					<td colspan = "11" align = "right"><b>Total Cash</b></td>
					<td colspan = "1" align = "right"><b><?php if($c > 0){
										echo number_format($c,2);
									}elseif($c < 0){
										echo number_format($c,2);
										}else{
									?>
										-
									<?php
									}
									?></b></td>
					</tr>
					<tr>
					<td colspan = "11" align = "right"><b>Total Debet</b></td>
					<td colspan = "1" align = "right"><b><?php if($d > 0){
										echo number_format($d,2);
									}else{
									?>
										-
									<?php
									}
									?></b></td>
					</tr>
					<tr>
					<td colspan = "11" align = "right"><b>Total Transfer</b></td>
					<td colspan = "1" align = "right"><b><?php if($tr <> 0){
										echo  number_format($tr,2);
									}else{
									?>
										-
									<?php
									}
									?></b></td>
					</tr>
					<tr>
					<td colspan = "11" align = "right"><b>Total Giro</b></td>
					<td colspan = "1" align = "right"><b><?php if($g > 0){
										echo number_format($g,2);
									}else{
									?>
										-
									<?php
									}
									?></b></td>
					</tr>
					<tr>
					<td colspan = "11" align = "right"><b>Total Kembali</b></td>
					<td colspan = "1" align = "right"><b><?php if($k > 0){
										echo number_format($k,2);
									}else{
									?>
										-
									<?php
									}
									?></b></td>
					</tr>
					<tr>
					<td colspan = "11" align = "right"><b>Total Sisa Tagihan</b></td>
					<td colspan = "1" align = "right"><b><?php if($s > 0){
										echo number_format($s,2);
									}else{
									?>
										-
									<?php
									}
									?></b></td>
					</tr>
				</tbody>
	</table>
	<iframe name="tampil" frameborder="0"  style="width:10px;height:5px"></iframe>
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