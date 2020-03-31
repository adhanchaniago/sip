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
  border: 1px solid #ddd;
}

th, td {
  text-align: center;
  padding: 8px;
}


</style>
</head>
<body>
<?php echo $this->session->flashdata('message');
?>
 <div class = "row">
<section class="col-lg-9 connectedSortable" >
	<div class="box box-success">
		<div class="box box-success" style="margin-top: -3px;">
				  <h3 class="box-title">Data Informasi Kategori Pelanggan</h3>
		</div>
						<table id = "tabelkategori" class="table table-condensed" >
			                <thead bgcolor="#99FF99">
			                <tr>
							  <th width="150px"> <center>ID</center></th>
			                  <th width="150px"> <center>  Nama Kategori</center></th>
							  <th width="150px"> <center>Keterangan</center></th>
			                </tr>
			                </thead>
			                <tbody>
			                <?php 
			                foreach ($listkategori->result() as $d) { 
			                ?>
			                <tr><td align = "center"><?php echo $d->id_k_pelanggan; ?></a></td>
			                <td align = "center"><?php echo $d->nama_kategori; ?></td>			                  
							<td align = "center"><?php echo $d->keterangan; ?></td>
			                </tr>
			                
			                <?php } ?>
			               
			              </table>
				</div>
	  		</section>
	 <!-- <section class="col-lg-3 connectedSortable">
		<div class="box box-primary box-solid">

		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-tag"></i> Input Kategori Pelanggan</h3>
		</div>
		
					<form class="form-horizontal" method="POST" action="">
						<div class="box-body">
							<div class="form-group">
								<label class="col-sm-3 control-label">ID</label>
								<div class="col-sm-5">
										<input type="text"  name="id_k_pelanggan" id="id_k_pelanggan" autocomplete="off" class="form-control" placeholder = "Masukan ID Kategori" autofocus>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Kategori</label>
								<div class="col-sm-5">
										<input type="text"  name="nama_kategori" id="nama_kategori" autocomplete="off" class="form-control" placeholder = "Masukan Nama Kategori">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Keterangan</label>
								<div class="col-sm-5">
										<input type="text"  name="keterangan" id="keterangan" autocomplete="off" class="form-control" placeholder = "Masukan Keterangan" autofocus>
											<hr>
											<table align = "right">
											<tr>
											<td>
											<input type="submit" name = "submit" value = "Simpan" class="btn btn-sm btn-primary">
											<a href = "<?php echo base_url();?>welcome" class="btn btn-sm btn-danger">Cancel</a>
											</td>
											</tr>
											</table>
								</div>
							</div>
						</div>
					</form>
				</div>				
</section>-->
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