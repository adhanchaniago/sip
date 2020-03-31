<html>
<style>
	table {
		border-collapse: collapse;
		border-spacing: 0;
		width: 100%;
		border: 1px solid #ddd;
	}
	.table1 {
		border-collapse: collapse;
		border-spacing: 0;
		width: 100%;
		border: 0px solid #ddd;
		margin-left : 1px;
	}
	th, {
		text-align: center;
		padding: 8px;
	}


</style>
<tbody> 
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/css/font4.css">
	<tbody>
		<div class = "row">
			<section class = "col-lg-9" connectedSortable id = "select2">
				<div class="box box-success">
					<h3 class="box-title">Data User</h3>
				</div>
				<table id="example1" class="table table-condensed">
					<thead bgcolor="#99FF99">
						<tr>
							<td><b>Kode User </b></td>
							<td><b>Nama Lengkap</b></td>
							<td><b>Username</b></td>
							<td><b>Password</b></td>
							<td><b>Level</b></td>
							<td><b>A</b></td>
							
						</tr>
					</thead>
					<tbody>
						<?php foreach($listuser->result() as $u){ ?>
							<tr>
								<td><?php echo $u->kode_user; ?></td>
								<td><?php echo $u->nama_lengkap; ?></td>
								<td><?php echo $u->username; ?></td>
								<td><?php echo $u->password; ?></td>
								<td><?php echo $u->level; ?></td>
								<td><a href = "<?php echo base_url('user/edit_user');?>/<?php echo $u->kode_user;?>" class="btn btn-success btn-xs"><i class = "fa fa-edit"></i></a></td>
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
					<h3 class="box-title"><i class="fa fa-tag"></i> Edit User</h3>
				</div>
				<form class="form-horizontal" class="form-vertical" method="POST" action="" enctype = "multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Kode User</label>

							<div class="col-sm-5">
								<input name="kode_user" value="<?php echo $d['kode_user']; ?>" onkeyup="this.value=this.value.toUpperCase();" readonly type="text" placeholder="Kode User" class="form-control" >
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">Nama Lengkap</label>
							<div class="col-sm-5">
								<input name="nama_lengkap" value="<?php echo $d['nama_lengkap']; ?>" onkeyup="this.value=this.value.toUpperCase();" type="text" placeholder="Nama Lengkap" class="form-control" autofocus required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Username</label>
							<div class="col-sm-5">
								<input name="username" value="<?php echo $d['username']; ?>" onkeyup="this.value=this.value.toUpperCase();" type="text" autocomplete="off" placeholder="Username" class="form-control" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Password</label>

							<div class="col-sm-5">
								<input name="password" value="<?php echo $d['password']; ?>"  onkeyup="this.value=this.value.toUpperCase();" type="text" autocomplete="off" placeholder="Password" class="form-control" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Level</label>

							<div class="col-sm-5">
								<select class="form-control" name = "level" id="#" value="" required>
									<option value = "<?php echo $d['level']; ?>"><?php echo $d['level']; ?></option>
									<option value = "Administrator"> ADMINISTRATOR</option>
									<option value = "Kasir Thermal"> KASIR THERMAL</option>
									<option value = "Kasir A5"> KASIR A5</option>
									<option value = "Manager"> MANAGER </option>
									<option value = "Sales"> SALES</option>
									
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">POTO PROFIL</label>
							<div class="col-sm-5">
								<input type="file" name="foto" class="form-control" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">KATA MUTIARA</label>

							<div class="col-sm-5">
								<textarea type="text" name="kata_mutiara" class="form-control" rowspan="3" minlength="140" maxlength="141" placeholder="KATA MUTIARA" onkeyup="this.value=this.value.toUpperCase();" ><?php echo $d['kata_mutiara'];?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Ciptaan</label>

							<div class="col-sm-5">
								<input name="ciptaan" value="<?php echo $d['ciptaan']; ?>"  onkeyup="this.value=this.value.toUpperCase();" type="text" autocomplete="off" placeholder="Password" class="form-control" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Jenis Kelamin</label>

							<div class="col-sm-5">
								<select class="form-control" name = "jenis_kelamin" id="#" value="" required>
									<option value = "LAKI-LAKI"> LAKI-LAKI</option>
									<option value = "PEREMPUAN"> PEREMPUAN</option>
									
								</select>
							</div>
						</div>
						
						<div  class="col-sm-12">
							<table class = "table1">
								<hr>
								<tr>
									<td align = "right">
										<input type="submit" name = "submit" value = "SIMPAN" class="btn btn-primary">
										<a href = "<?php echo base_url();?>User/view_user" class="btn btn-sm btn-danger">Cancel</a>
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
<script src="<?php echo base_url(); ?>assets/js/number.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		

<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript">
	$('select').select2();
</script>
</html>