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
				<li class="active"><a href="<?php echo base_url(); ?>Laporan/Laporan_Saldo" data-toggle="tab"><i class="fa fa-money"></i> <b>Buku Besar</b></a></li>  
				</ul>
			</div>
            <!-- /.box-header -->
			<?php		
		$tgl	= date('d-m-Y');
		$query1 = "SELECT * from tb_kas  WHERE tgl = '$tgl'";
		$cari1 = $this->db->query($query1);
		$cari1->num_rows();
	
		

		
 ?>
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
            <div class="box-body">
			<div class="col-md-6" style="width :100%">
			<form class="form-horizontal" action="<?php echo base_url(); ?>Laporan/lap_buku_besar" method="GET">
			<div class="form-group">
								<label class="col-sm-40 control-label" style="width :100px">Nama Subakun</label>
								<div class="col-sm-37" style="width :150px">
									<select name="kode_akun" id="kode_akun" class="form-control select2"  style="width: 130%;" autofocus tabindex="1" required> 
										<option value="" selected="selected">Pilih Nama Subakun</option>
											<?php
											foreach ($listakun->result() as $d){ 
												?>
										 <option value="<?php echo $d->kode_subakun; ?>"><?php echo $d->nama_akun; ?></option>
											<?php }?>
									</select>
								</div>
								<div class="form-group">
								<label class="col-sm-40 control-label" style="width :50px;margin-right :1px;margin-left: 57px;">Tgl Dari</label>
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
									<a href = "<?php echo base_url('Laporan/buku_besar_cetak?kode_akun='.$kode_akun.'&tanggal_dari='.$tanggal_dari.'&tanggal_sampai='.$tanggal_sampai.'');?>" class = "btn btn-sm btn-success" target = "" style="margin-left:335%;margin-top: -52px;">cetak</a>
								</div>
								</div>
							</div>
							</div>
				</form>
				<br />
			<div id='result'></div>
				</div>
              </div>
            </div>
			
			
			<div class="row" style="margin-top: -16px;">
				<table align="center" cellpadding="0" width="533px" style="margin-top: 15px;">
					<tr bgcolor="#fff">
						<td height="10" colspan="5" align="center" id="FB" ><b><font color="#000000" size = "3px"> &nbsp Buku Besar</font></b></td>
					</tr>
					<tr bgcolor="#fff">
						<td height="10" colspan="5" align="center" id="fC"><b><font color="#000000"> &nbsp <?php echo "Nama Akun  &nbsp  : &nbsp" .$p->nama;?></font></b></td>
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
					<td><b>No Transaksi</b></td>
					<td><b>Tanggal</b></td>
					<td><b>Akun</b></td>
					<td><b>Debit</b></td>
					<td><b>Kredit</b></td>
					<td><b>Saldo</b></td>
					
				</tr>
				</thead>
				<tbody>
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
				<tr>
				<td><?php echo $data['no_transaksi']."/".$data['id_kontak'].$no_reff;?></td>
				<td><?php echo date('d-m-Y', strtotime($data['tgl']));?></td>
				<td><?php echo $data['nama'];?></td>
				<td><?php echo number_format($data['debet']);?></td>
				<td><?php echo number_format($data['kredit']);?></td>
				<td><?php echo number_format($saldo);?></td>
					<?php
				}}?>
				</tr>
				<tr>
				<td colspan = "3" align = "right"><b>Grand Total</b></td>
				<td><b><?php echo number_format($total_debet);?></b></td>
				<td><b><?php echo number_format($total_kredit);?></b></td>
				<td><b><?php echo number_format($total_saldo);?></b></td>
				</tbody>
				</table>
            </div>
			</section>
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