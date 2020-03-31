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
	<link rel="stylesheet" href="<?php echo base_url(); ?>/css/font4.css">
	<tbody>
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
		<div class = "row">
			<section class = "col-lg-9" connectedSortable id = "select2">
				<div class="box box-success">
					<h3 class="box-title">Data User</h3>
				</div>
				<table id="example1" class="table table-condensed">
					<thead bgcolor="#99FF99">
						<tr>
							<th>Kode User</th>
							<th>Nama Lengkap</th>
							<th>Username</th>
							<th>Password</th>
							<th>Level</th>
							<th>&nbsp&nbsp A</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($listuser->result() as $d){ ?>
							<tr>
								<td><a href = "<?php echo base_url('user/hak_akses/'.$d->username); ?>"><?php echo $d->kode_user; ?></a></td>
								<td><?php echo $d->nama_lengkap; ?></td>
								<td><?php echo $d->username; ?></td>
								<td><?php echo $d->password; ?></td>
								<td><?php if ( $d->level == "KasirA5"){echo "Kasir A5";
							}elseif($d->level == "KasirThermal"){echo "Kasir Thermal";
						}else{
							echo $d->level;
						} ?></td>
						<td><a href = "<?php echo base_url('user/edit_user');?>/<?php echo $d->kode_user;?>" class="btn btn-success btn-xs"><i class = "fa fa-edit"></i></a> | <a href = "<?php echo base_url('User/delete_user');?>/<?php echo $d->username;?>" class="btn btn-danger btn-xs"><i class = "fa fa-trash"></i></a></td>
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
			<h3 class="box-title"><i class="fa fa-tag"></i> Input User</h3>
		</div>
		<form class="form-horizontal" class="form-vertical" method="POST" action="" enctype = "multipart/form-data">
			<div class="box-body">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Kode User</label>

					<div class="col-sm-5">
						<input name="kode_user" value="" type="text" onkeyup="this.value=this.value.toUpperCase();" placeholder="KODE USER" class="form-control" autofocus required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Lengkap</label>
					<div class="col-sm-5">
						<input name="nama_lengkap" value="" type="text" onkeyup="this.value=this.value.toUpperCase();" placeholder="NAMA LENGKAP" class="form-control" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Username</label>
					<div class="col-sm-5">
						<input name="username" value="" type="text" onkeyup="this.value=this.value.toUpperCase();" placeholder="USERNAME" class="form-control" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>

					<div class="col-sm-5">
						<input name="password" value="" type="text" placeholder="PASSWORD" onkeyup="this.value=this.value.toUpperCase();" class="form-control" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Level</label>

					<div class="col-sm-5">
						<select class="form-control select2" name = "level" id="#" required>
							<option value = ""> PILIH</option>
							<option value = "Administrator"> ADMINISTRATOR</option>
							<option value = "Manager"> MANAGER</option>
							<option value = "KasirA5"> KASIR A5</option>
							<option value = "KasirThermal"> KASIR THERMAL</option>
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
						<textarea type="text" name="kata_mutiara" class="form-control" rowspan="3" minlength="140" maxlength="141" placeholder="MINIMAL 130 KATA"  onkeyup="this.value=this.value.toUpperCase();" ></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">CIPTAAN</label>
					<div class="col-sm-5">
						<input name="ciptaan" value="" type="text" onkeyup="this.value=this.value.toUpperCase();" placeholder="CIPTAAN" class="form-control" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
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