<html>
<tbody> 
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<tbody>
		<div class="box box-primary box-solid">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-tag"></i> Input User</h3>
			</div>
			<form class="form-horizontal" class="form-vertical" method="POST" action="">
				<div class="box-body">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Kode User</label>

						<div class="col-sm-3">
							<input name="kode_user" value="" type="text" placeholder="Kode User" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">Nama Lengkap</label>
						<div class="col-sm-3">
							<input name="nama_lengkap" value="" type="text" placeholder="Nama Lengkap" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Username</label>
						<div class="col-sm-3">
							<input name="username" value="" type="text" placeholder="Username" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Password</label>

						<div class="col-sm-3">
							<input name="password" value="" type="text" placeholder="Password" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Level</label>

						<div class="col-sm-3">
							<input name="level" value="" type="text" placeholder="Level" class="form-control">
						</div>
					</div>
					<div  class="col-sm-12">
						<table align = "right">
							
							<tr>
								<td>
									<input type="submit" value = "Simpan & Cetak" class="btn btn-primary">
									<input type="reset" value = "Cancel" class="btn btn-danger">
								</td>
							</tr>
						</table>
					</div>
				</div>	
			</form>
		</div>
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data User</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Kode User</th>
							<th>Nama Lengkap</th>
							<th>Username</th>
							<th>Password</th>
							<th>Level</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
	</tbody>
	</html>