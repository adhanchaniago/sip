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
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 0px solid #ddd;
}



</style>
  <?php 
 			$user = $this->session->userdata('username');
 			$query = "select * from menu WHERE level = '$user'";
 			$j = $this->db->query($query);
 			$j->num_rows();

 			?>
 			<?php foreach ($j->result() as $j){ 
 			}
 			?>
</head>
<body>
<?php echo $this->session->flashdata('message');
?>
 <div class = "row">
<section class="col-lg-9 connectedSortable" >
	<div class="box box-success">
		<div class="box box-success" style="margin-top: -3px;">
				  <h3 class="box-title">Data Informasi Kategori Akun</h3>
		</div>
					
						<table id = "tabelkategori" class="table table-condensed" >
			                <thead bgcolor="#99FF99">
			                <tr>
							  <td  width="150px"><b>Kode_akun</b></td>
			                  <td  width="150px"><b>Nama Kategori</b></td>
							  <td  width="150px"><b>Keterangan</b></td>
							  <?php if ($j->e_kategori_akun == "Y"): ?>
							  <td  width="10px"><b>E</b></td>
							  <?php endif;?>
							  <?php if ($j->h_kategori_akun == "Y"): ?>
							  <td  width="10px"><b>H</b></td>
							  <?php endif;?>
			                </tr>
			                </thead>
			                <tbody>
			                <?php 
			                foreach ($listkategori->result() as $d) { 
			                ?>
			                <tr>
							<td><?php echo $d->kode_kategori; ?></td>
			                <td><?php echo $d->nama_kategori; ?></td>			                  
							<td><?php echo $d->keterangan; ?></td>
							<?php if ($j->e_kategori_akun == "Y"): ?>
							<td><a href = "<?php echo base_url('Kategori_akun/edit_kategori/'.$d->kode_kategori);?>" class="btn btn-xs btn-success"><i class = "fa fa-edit"></i></a></td>
							<?php endif;?>
							<?php if ($j->h_kategori_akun == "Y"): ?>
							<td><a href = "<?php echo base_url('Kategori_akun/hapus_kategori/'.$d->kode_kategori);?>" class="btn btn-xs btn-danger"><i class = "fa fa-trash-o"></i></a></td>
							<?php endif;?>
			                </tr>
			                
			                <?php } ?>
			               
			              </table>
				</div>
	  		</section>
	<?php if ($j->i_kategori_akun == "Y"): ?>
	 <section class="col-lg-3 connectedSortable">
		<div class="box box-primary box-solid">

		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-tag"></i> Input Kategori Akun</h3>
		</div>
		
					<form class="form-horizontal" method="POST" action="">
						<div class="box-body">
							<div class="form-group">
								<label class="col-sm-3 control-label">Kode Kategori</label>
								<div class="col-sm-5">
										<input type="text"  name="kode_kategori" value = "<?php echo $autonumber?>" id="kode_kategori" readonly autocomplete="off" class="form-control" placeholder = "KODE KATEGORI AKUN" onkeyup=" this.value=this.value.toUpperCase();">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Kategori</label>
								<div class="col-sm-5">
										<input type="text"  name="nama_kategori" id="nama_kategori" autocomplete="off" class="form-control" placeholder = "NAMA KATEGORI AKUN" onkeyup=" this.value=this.value.toUpperCase();" autofocus>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Keterangan</label>
								<div class="col-sm-5">
										<input type="text"  name="keterangan" id="keterangan" autocomplete="off" class="form-control" placeholder = "KETERANGAN" onkeyup=" this.value=this.value.toUpperCase();">
											<hr>
											<table>
											<tr>
											<td align = "right">
											<input type="submit" name = "submit" value = "SIMPAN" class="btn btn-sm btn-primary">
											<a href = "<?php echo base_url();?>welcome" class="btn btn-sm btn-danger">CANCEL</a>
											</td>
											</tr>
											</table>
								</div>
							</div>
						</div>
					</form>
				</div>				
</section>
<?php endif;?>
</div>
</body>
 <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		

  <script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
  
    $("#tabeljabatan").DataTable({
      
      searching   : false,
      bInfo : false,
      //bLengthChange : false,
      bPaginate : false
      
     
  })

</script>

</html>