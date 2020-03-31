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
				<?php if ($j->l_tanda_terima == "Y"): ?>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/Tanda_Terima" ><i class="fa fa-money"></i> <b>Tanda Terima</b></a></li>
				<?php endif;?>
				<li class="active"><a href="<?php echo base_url(); ?>Laporan/Laporan_Saldob" data-toggle="tab"><i class="fa fa-money"></i> <b>Laporan Saldo Supplier</b></a></li>
				<?php if ($j->l_saldo_pelanggan == "Y"): ?>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/Laporan_Saldo" ><i class="fa fa-money"></i> <b>Laporan Saldo Pelanggan</b></a></li>
				<?php endif;?>
				  
				</ul>
			</div>
			<?php		
		$tgl	= date('d-m-Y');
		$query1 = "SELECT * from tb_kas  WHERE tgl = '$tgl'";
		$cari1 = $this->db->query($query1);
		$cari1->num_rows();
	
		

		
 ?>

<?php		
		$tanggal_dari	= date('Y-m-d' ,strtotime($this->input->get('tanggal_dari')));
		$tanggal_sampai	= date('Y-m-d' ,strtotime($this->input->get('tanggal_sampai')));
		$id_supplier   = $this->input->get('id_supplier');
		$query = "SELECT * from transaksi_dayb WHERE transaksi_dayb.id_supplier = '$id_supplier' AND date_invoice BETWEEN '$tanggal_dari' AND '$tanggal_sampai' order by MID(tgl,4,2)DESC,LEFT(tgl,2)DESC,LEFT(jam,2)DESC,MID(jam,4,2)DESC,RIGHT(jam,2)DESC";
		$cari = $this->db->query($query);
		$cari->num_rows();
		

		
 ?>
 <?php
 $query = "select * from tb_supplier  WHERE tb_supplier.id_supplier='$id_supplier'";
	$jumlah = $this->db->query($query);
 ?>
<?php foreach ($jumlah->result()  as $p){
}
?>
            <!-- /.box-header -->
            <div class="box-body">
			<div class="col-md-6" style="width :65%">
			<form class="form-horizontal" action="<?php echo base_url(); ?>Laporan/lap_saldosupplier" method="GET">
				<div class="form-group">
								<label class="col-sm-40 control-label" style="width :100px">Nama Pelanggan</label>
								<div class="col-sm-37" style="width :150px">
									<select name="id_supplier" id="id_supplier" class="form-control select2"  style="width: 130%;" autofocus tabindex="1" required> 
										<option value="" selected="selected">Pilih Supplier</option>
											<?php
											foreach ($listsupplier->result() as $d){ 
												?>
										 <option value="<?php echo $d->id_supplier; ?>"><?php echo $d->nama_supplier; ?></option>
											<?php }?>
									</select>
								</div>
								
								<div class="col-sm-37"  style="width :150px">
								<div class="input-group">
									
									<input type="hidden"   name='tanggal_dari' class='form-control' id='tanggal_dari' tabindex="2" value="<?php echo date('01-01-Y');?>"  requered>
								</div>
								</div>
								
								<label class="col-sm-40 control-label" style="width :60px;margin-right :12px;margin-left: 48px;">Tanggal</label>
								<div class="col-sm-37"  style="width :150px">
								<div class="input-group">
									
									<input type="text"   name='tanggal_sampai' class='form-control' id='tanggal_sampai' tabindex="3" value="<?php echo date('d-m-Y');?>"  requered>
								</div>
								</div>
								<div class="col-sm-37"  style="width :150px">
								<div class="input-group">
									<input type="submit"  value = "CARI" class="btn btn-sm btn-primary" style="margin-left: 10px;" tabindex="4">
									<a href = "<?php echo base_url('Laporan/carib?id_supplier='.$id_supplier.'&tanggal_dari='.$tanggal_dari.'&tanggal_sampai='.$tanggal_sampai.'');?>" class = "btn btn-sm btn-success" target = "" style="margin-left:602%;margin-top: -52px;">cetak</a>
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
						<td height="10" colspan="5" align="center" id="FB" ><b><font color="#000000" size = "3px"> &nbsp Statement OF Account</font></b></td>
					</tr>
					<tr bgcolor="#fff">
						<td height="10" colspan="5" align="center" id="fC"><b><font color="#000000"> &nbsp <?php echo "Nama Supplier  &nbsp  : &nbsp" .$p->nama_supplier;?></font></b></td>
					</tr>
					<tr bgcolor="#fff">
						<td height="10" colspan="5" align="center" id="fC"><b><font color="#000000"> &nbsp <?php echo "Per  &nbsp ".date('d-m-Y', strtotime($tanggal_dari)); ?> s/d <?php echo date('d-m-Y', strtotime($tanggal_sampai)); ?></font></b></td>
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
					<td align="right"><b>Biaya</b></td>
					<td align="right"><b>Tips</b></td>
					<td align="right"><b>Potongan</b></td>
					<td align="right"><b>G.Total</b></td>
					<td align="right"><b>Cash</b></td>
					<td align="right"><b>Debet</b></td>
					<td align="right"><b>Transfer</b></td>
					<td align="right"><b>Giro</b></td>
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
	$tip=0;
	$gr=0;
	$sub = 0;
	if(isset($cari)){
	foreach ($cari->result_array() as $data){
	$t=$t+$data['total'];
	$b=$b+$data['beban'];
	$tip=$tip+$data['tips'];
	$gr=$gr+$data['grand_total'];
	$p=$p+$data['potongan'];
	$c=$c+$data['cash'];
	$d=$d+$data['debet'];
	$tr=$tr+$data['transfer'];
	$g=$g+$data['giro'];
	$k=$k+$data['kembali'];
	$s=$s+$data['sisa_tagihan'];
	?>
	<tr id="fC">
	<td><?php echo $no;?></td>
	<td><?php echo $data['no_transaksi'];?>/<?php echo $data['id_supplier'];?><?php if($data['no_raff'] == 0){echo "";}else{echo "/". $data['no_raff'];}?></td>
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
	<?php if($data['beban'] == 0){
				echo "-";
			}elseif($data['beban'] > 0){
			echo number_format($data['beban']);
			}else{
				echo number_format($data['beban']);
			}
			?></td>
			<td align="right">
	<?php if($data['tips'] == 0){
				echo "-";
			}elseif($data['tips'] > 0){
			echo number_format($data['tips']);
			}else{
				echo number_format($data['tips']);
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
					<td colspan = "2" align = "right"><b><?php if($t > 0){
										echo number_format($t,2);
									}else{
									?>
										-
									<?php
									}
									?></b></td>
					</tr>
					<tr>
					<td colspan = "11" align = "right"><b>Total Biaya</b></td>
					<td colspan = "2" align = "right"><b><?php if($b <> 0){
										echo number_format($b,2);
									}else{
									?>
										-
									<?php
									}
									?></b></td>
					</tr>
					<tr>
					<td colspan = "11" align = "right"><b>Total Tips</b></td>
					<td colspan = "2" align = "right"><b><?php if($tip <> 0){
										echo number_format($tip,2);
									}else{
									?>
										-
									<?php
									}
									?></b></td>
					</tr>
					<tr>
					<td colspan = "11" align = "right"><b>Total Potongan</b></td>
					<td colspan = "2" align = "right"><b><?php if($p > 0){
										echo number_format($p,2);
									}else{
									?>
										-
									<?php
									}
									?></b></td>
					</tr>
					<tr>
					<td colspan = "11" align = "right"><b>Grand Total</b></td>
					<td colspan = "2" align = "right"><b><?php if($gr > 0){
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
					<td colspan = "2" align = "right"><b><?php if($c > 0){
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
					<td colspan = "2" align = "right"><b><?php if($d > 0){
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
					<td colspan = "2" align = "right"><b><?php if($tr <> 0){
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
					<td colspan = "2" align = "right"><b><?php if($g > 0){
										echo number_format($g,2);
									}else{
									?>
										-
									<?php
									}
									?></b></td>
					</tr>
					<tr>
					<td colspan = "11" align = "right"><b>Total Sisa Tagihan</b></td>
					<td colspan = "2" align = "right"><b><?php if($s > 0){
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