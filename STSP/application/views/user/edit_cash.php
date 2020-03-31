<html>
<tbody> 
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
	<tbody>
	<div class = "row">
		<section class = "col-lg-9" connectedSortable id = "select2">
            <div class="box box-success">
              <h3 class="box-title">Data Deposit</h3>
            </div>
              <table id="example1" class="table table-condensed">
                 <thead bgcolor="#99FF99">
                <tr>
					<td width="50px"><b>No Deposit</b></td>
					<td width="30px"><b>Tanggal</b></td>
					<td width="50px"><b>Pelanggan</b></td>
					<td width="200px"><b>Keterangan</b></td>
					<td width="30px"><b>Nominal</b></td>
					<td width="30px"><b>Sisa</b></td>
					<td width="50px"><b>User</b></td>
					<td width="10px" align="center"><b>A</b></td>
                </tr>
                </thead>
                <tbody>
              <?php foreach($cash->result() as $d){ ?>
				<tr>
				<td><?php echo $d->no_kas; ?></td>
				<td><?php echo date('d-m-Y',strtotime($d->tgl));?></td>
				<td><?php echo $d->nama_pelanggan; ?></td>
				<td><?php echo $d->keterangan; ?></td>
				<td><?php echo number_format($d->nominal,2); ?></td>
				<td><?php echo number_format($d->sisa,2); ?></td>
				<td><?php echo $d->user; ?></td>
				<td align="center"><a href = "<?php echo base_url('user/edit_cash');?>/<?php echo $d->no_kas;?>" class="btn btn-success btn-xs"><i class = "fa fa-edit"></i></a></td>
				</tr>
				<?php
				};
				?>
				</tr>
				</tbody>
              </table>
		  </section>
	<section class = "col-lg-4" connectedSortable id = "select2">
	<div class="box box-primary box-solid">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-tag"></i> Edit Deposit</h3>
		</div>
					<form class="form-horizontal" class="form-vertical" method="POST" action="" enctype = "multipart/form-data">
						<div class="box-body">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">No Deposit</label>

								<div class="col-sm-5">
									<input name="no_kas" readonly value="<?php echo $k['no_kas']; ?>" type="text" placeholder="Kode User" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Pelanggan</label>
								<div class="col-sm-5">
									<select class="form-control" name = "kode_user" id="#" autofocus>
										 <option value = "<?php echo $k['kode_user']; ?>"> <?php echo $k['nama_pelanggan']; ?></option>
										 <?php foreach($listuser->result() as $u){?>
										 <option value = "<?php echo $u->id_pelanggan;?>"> <?php echo $u->nama_pelanggan;?></option>
										 <?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nominal</label>

								<div class="col-sm-5">
									<input name="nominal" id="rupiah" value = "<?php echo number_format($k['nominal'], 2, ",", "."); ?>" type="text" placeholder="Username" class="form-control" required>
								</div>
							</div>
						<div class="form-group">
								<label class="col-sm-3 control-label">Keterangan</label>

								<div class="col-sm-5">
									 <textarea  type="text"  name="keterangan"  maxlength="50"  id="send" rows="2" style="width: 180px; height: 70;" autocomplete="off" class="form-control"  placeholder = "Keterangan" onkeyup=" this.value=this.value.toUpperCase();"><?php echo $k['keterangan'];?></textarea>
								</div>
							</div>
						<div  class="col-sm-12">
						<table align = "right">
						<hr>
						<tr>
						<td>
							<input type="submit" name = "submit" value = "Simpan" class="btn btn-primary">
							<a href = "<?php echo base_url();?>User/view_cash" class="btn btn-sm btn-danger">Cancel</a>
						</td>
						</tr>
						</table>
						</div>
						</div>	
					</form>
				</div>
				</section>
				
		  </div>
	</tbody>	
   <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		

  <script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript">
  $('select').select2();
</script>
<script>
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 function formatRupiah(angka, prefix){
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
	split   		= number_string.split(','),
	sisa     		= split[0].length % 3,
	rupiah     		= split[0].substr(0, sisa),
	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if(ribuan){
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
 
	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? ' ' + rupiah : '');
}
</script>	
</html>