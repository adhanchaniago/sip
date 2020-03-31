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
<body >	
 <div class = "row">
<section class="col-lg-9 connectedSortable">
	<div class="box box-success">
			<h3 class="box-title" style="margin-left: 7px;">Data Informasi Profile</h3>
		<div class="box-body">
						<table id = "#" class="table table-condensed">
				                <thead bgcolor="#99FF99">
				                <tr>
				                  <th>No NPWP</th>
				                  <th>Nama Perusahaan</th>
				                  <th>Alamat</th>
				                  <th>No Telp</th>
				                  <th>Kode Pos</th>
				                  <th>No Faktur Awal</th>
				                  <th>No Faktur Akhir</th>
				                  <th>A</th>
				                 </tr>
				                </thead>
				                <tbody>
								<?php foreach ($listprofile->result() as $p){?>
								<tr>
				                  <td><?php echo $p->no_npwp; ?></td>
				                  <td><?php echo $p->nama; ?></td>
				                  <td><?php echo $p->alamat; ?></td>
				                  <td><?php echo $p->no_telp; ?></td>
				                  <td><?php echo $p->kode_pos; ?></td>
				                  <td><?php echo $p->no_faktur; ?></td>
				                  <td><?php echo $p->no_faktur_akhir; ?></td>
				                  <td><a href = "<?php echo base_url('Profile/edit_profile/'.$p->no_npwp)?>" class = "btn btn-xs btn-success"><i class = "fa fa-edit"></i></a></td>
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
				<h3 class="box-title"><i class="fa fa-tag"></i> Input Data Profile</h3>
			</div>
				<div class="box-body">
					<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data">
						<div class="form-group">
								<label class="col-sm-3 control-label">No NPWP</label>
								<div class="col-sm-5">
										<input type="text"  name="no_npwp" id="#" autocomplete="off" autofocus class="form-control" placeholder = "NO NPWP">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Nama Perusahaan</label>
								<div class="col-sm-5">
									<input name="nama" type="text" class="form-control" autocomplete="off"  placeholder = "NAMA PERUSAHAAN">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-5">
										<textarea name="alamat" class="form-control" rows="4" placeholder="ALAMAT ..."></textarea>
										
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">No Telp</label>
								<div class="col-sm-5">
										<input type="text"  name="no_telp" id="#" autocomplete="off" class="form-control" placeholder = "NO TELPON">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Kode Pos</label>
								<div class="col-sm-5">
									<input name="kode_pos" type="text" class="form-control" autocomplete="off"  placeholder = "KODE POS">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">No Faktur Awal</label>
								<div class="col-sm-5">
										<input type="text"  name="no_faktur" id="#" autocomplete="off" class="form-control" placeholder = "NO FAKTUR AWAL">
										
										</table>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">No Faktur Akhir</label>
								<div class="col-sm-5">
										<input type="text"  name="no_faktur_akhir" id="#" autocomplete="off" class="form-control" placeholder = "NO FAKTUR AKHIR">
										<hr>
										<table align = "right">
										<tr>
										<td>
										<input type="submit" name = "submit" value = "SIMPAN" class="btn btn-sm btn-primary">
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