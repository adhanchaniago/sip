 <html>
<head>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  	<style>
@media only screen and (max-width: 840px) {
table.responsive {
margin-bottom: 0;
overflow: hidden;
overflow-x: scroll;
display: block;
white-space: nowrap;
}
}
</style>
</head>
<body>	
 <div class = "row">
<section class="col-lg-9 connectedSortable">
	<div class="box box-default box-succes">
		<div class="box-header">
		  <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                        data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                  <i class="fa fa-minus"></i></button>
			<h3 class="box-title">Data Informasi Gudang</h3>
		</div>
		<div class="box-body">
						<table id = "#" class="table table-condensed">
				                <thead>
				                <tr>
				                  <th>ID Gudang</th>
				                  <th>Nama Gudang</th>
				                  <th>Contact Person</th>
				                  <th>Alamat</th>
				                  <th>No Telp</th>
				                  <th>Jenis Gudang</th>
				                 </tr>
				                </thead>
				                <tbody>
								<tr>
								<?php foreach ($listgudang->result() as $b){?>
								<td><a href = '<?php echo base_url('Gudang/edit_gudang')?>/<?php echo $b->id_gudang?>'><?php echo $b->id_gudang;?></a></td>
								<td><?php echo $b->nama_gudang;?></td>
								<td><?php echo $b->kontak_person;?></td>
								<td><?php echo $b->alamat;?></td>
								<td><?php echo $b->no_telp;?></td>
								<td><?php echo $b->jenis_gudang;?></td>
								</tr>
								<?php } ?>
				               </tbody>
				           </table>
				           </div>
				       </div>
			</section>
	<section class="col-lg-3 connectedSortable">
		<div class="box box-primary box-solid">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-tag"></i> Input Data Gudang</h3>
			</div>
				<div class="box-body">
					<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data">
						<div class="form-group">
								<label class="col-sm-3 control-label">ID Gudang</label>
								<div class="col-sm-5">
										<input type="text"  name="id_gudang" id="#" autocomplete="off" autofocus class="form-control" placeholder = "Masukan No Rekening">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Nama Gudang</label>
								<div class="col-sm-5">
									<input name="nama_gudang" type="text" class="form-control" autocomplete="off"  placeholder = "Masukan Id Karyawan">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Contact Person</label>
								<div class="col-sm-5">
										<input type="text"  name="kontak_person" id="#" autocomplete="off" class="form-control" placeholder = "Masukan No KK">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-5">
										<textarea name="alamat" class="form-control" rows="4" placeholder="Alamat ..."></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">No Telp.</label>
								<div class="col-sm-5">
									<input name="no_telp" type="text" class="form-control" autocomplete="off"  placeholder = "Masukan Id Karyawan">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Jenis Gudang</label>
								<div class="col-sm-5">
										<input type="text"  name="jenis_gudang" id="#" autocomplete="off" class="form-control" placeholder = "Masukan No KK">
										<hr>
										<table align = "right">
										<tr>
										<td>
										<input type="submit" name = "submit" value = "Simpan" class="btn btn-sm btn-primary">
										<a href = "<?php echo base_url();?>welcome" class = "btn btn-sm btn-danger">Cancel</a>
										</td>
										</tr>
										</table>
								</div>
							</div>
							
					</form>
				</div>
			</div>
		</section>
        </div>
</body>
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
    $("#example").DataTable({
      searching   : true,
      bInfo : false,
      bLengthChange : false,
      bPaginate : false
    });
   $("#example2").DataTable({
      searching   : true,
      bInfo : false,
      bLengthChange : false,
      bPaginate : false
    });
</script>
</html>