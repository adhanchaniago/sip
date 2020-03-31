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
.table1 {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 0px solid #ddd;
}
th, {
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
	<div class="box box-success" >
				<div class="box box-success" style="margin-top: -3px;"> 
				  <h3 class="box-title">Data Informasi Kategori Barang</h3>
					</div>
						<?php 
						$user = $this->session->userdata('username');
						$query = "select * from menu WHERE level = '$user'";
								$j = $this->db->query($query);
								$j->num_rows();
								
							?>
							<?php foreach ($j->result() as $j){ 
							}
							?>
						<table id = "" class="table table-condensed">
			                 <thead bgcolor="#99FF99">
			                <tr>
							  <th width="150px"> <center>ID</center></th>
			                  <th width="150px"> <center>  Nama Kategori</center></th>
							  <th width="150px"> <center>Keterangan</center></th>
							  <?php if ($j->e_kategori_barang == "Y" ): ?>
							  <th width="150px"> <center>A</center></th>
							  <?php endif;?>
							   
			                </tr>
			                </thead>
			                <tbody>
			                <?php 
			                foreach ($list_k_barang->result() as $c) { 
			                ?>
			                <tr>
			                 <td align = "center"><?php echo $c->id_k_barang; ?></td>
			                 <td align = "center"><?php echo $c->nama_k_barang; ?></td>			                  
							 <td align = "center"><?php echo $c->keterangan; ?></td>
							 <?php if ($j->e_kategori_barang == "Y" ): ?>
							 <td align = "center"><a href = "<?php echo base_url('Barang/edit_k_barang');?>/<?php echo $c->id_k_barang;?>" class="btn btn-success btn-xs"><i class = "fa fa-edit"></i></a></td>
							 <?php endif;?>
			                </tr>
			                
			                <?php } ?>
			               </tbody>
						   
			              </table>
				</div>
	  		</section>
			<?php if ($j->i_kategori_barang == "Y" ): ?>
	  <section class="col-lg-3 connectedSortable">
<div class="box box-primary box-solid">

		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-tag"></i> Input Kategori Barang</h3>
		</div>
		
					<form class="form-horizontal" method="POST" action="">
						<div class="box-body">
							<div class="form-group">
								<label class="col-sm-3 control-label">ID</label>
								<div class="col-sm-5">
										<input type="text"  name="id_k_barang" id="id_kategori" autocomplete="off" class="form-control" onkeyup="this.value=this.value.toUpperCase();" placeholder = "MASUKAN ID KATEGORI" autofocus required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Kategori</label>
								<div class="col-sm-5">
										<input type="text"  name="nama_k_barang" id="nama_kategori" autocomplete="off" class="form-control" onkeyup="this.value=this.value.toUpperCase();" placeholder = "MASUKAN NAMA KATEGORI" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Keterangan</label>
								<div class="col-sm-5">
										<input type="text"  name="keterangan" id="keterangan" autocomplete="off" class="form-control" onkeyup="this.value=this.value.toUpperCase();" placeholder = "MASUKAN KETERANGAN" autofocus required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
											<hr>
											<table align = "right" class = "table1">
											<tr>
											<td align = "right">
											<input type="submit" name = "submit" value = "SIMPAN" class="btn btn-sm btn-primary">
											<a href = "<?php echo base_url();?>welcome" class = "btn btn-sm btn-danger">Cancel</a>
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