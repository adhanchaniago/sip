  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <body>
 <div class = "row">
<section class="col-lg-9 connectedSortable">
	<div class="box box-success">
		<div class="box box-success" style="margin-top: -3px;"> 
				  <h3 class="box-title">Data Informasi Kategori Pelanggan</h3>
		<div class="box-body">
						<?php 
						$user = $this->session->userdata('level');
						$query = "select * from menu WHERE level = '$user'";
								$j = $this->db->query($query);
								$j->num_rows();
								
							?>
							<?php foreach ($j->result() as $j){ 
							}
							?>
						<table id = "tabelkategori" class="table table-condensed" >
			                <thead bgcolor="#99FF99">
			                <tr>
							  <th width="150px"> <center>ID</center></th>
			                  <th width="150px"> <center>  Nama Kategori</center></th>
							  <th width="150px"> <center>Keterangan</center></th>
							  <?php if ($j->e_kategori_pelanggan == "Y" ): ?>
							  <th width="150px"> <center>A</center></th>
							  <?php endif;?>
			                </tr>
			                </thead>
			                <tbody>
			                <?php 
			                foreach ($listkategori->result() as $c) { 
			                ?>
			                <tr><td align = "center"><?php echo $c->id_k_pelanggan; ?></a></td>
			                <td align = "center"><?php echo $c->nama_kategori; ?></td>			                  
							<td align = "center"><?php echo $c->keterangan; ?></td>
							<?php if ($j->e_kategori_pelanggan == "Y" ): ?>
							<td align = "center"><a href = "<?php echo base_url('kategori/edit_kategori');?>/<?php echo $c->id_k_pelanggan;?>" class="btn btn-success btn-xs"><i class = "fa fa-edit"></i></a></td>
							<?php endif;?>
			                </tr>
			                
			                <?php } ?>
			               
			              </table>
						</div>
	  		</section>
	  <section class="col-lg-3 connectedSortable">
			<div class="box box-primary box-solid">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-tag"></i> Edit Kategori Pelanggan</h3>
		</div>
					<form class="form-horizontal" method="POST" action="">
						<div class="box-body">
							<div class="form-group">
							<label class="col-sm-3 control-label">ID</label>
							<div class="col-sm-5">
									<input type="text"  name="id_k_pelanggan" id="id_k_pelanggan" value = "<?php echo  $d['id_k_pelanggan']; ?>" autocomplete="off" class="form-control" placeholder = "Masukan ID Kategori" readonly>
							</div>	
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Kategori</label>
								<div class="col-sm-5">
										<input type="text"  name="nama_kategori" id="nama_kategori" value = "<?php echo  $d['nama_kategori']; ?>" autocomplete="off" class="form-control" placeholder = "Masukan Nama Kategori" autofocus>
								</div>
							</div>
							
							<div class="form-group">
							<label class="col-sm-3 control-label">Keterangan</label>
							<div class="col-sm-5">
									<input type="text"  name="keterangan" id="keterangan" value = "<?php echo  $d['keterangan']; ?>" autocomplete="off" class="form-control" placeholder = "Masukan Keterangan">
									<hr>
										<table align = "right">
										<tr>
										<td>
										<input type="submit" name = "submit" value = "Simpan" class="btn btn-sm btn-primary">
										<a href = "<?php echo base_url();?>Kategori/input_kategori" class="btn btn-sm btn-danger">Cancel</a>
										</td>
										</tr>
										</table>
							</div>	
							</div>
							</div>
						</form>
					</div>
			</section>
	</div>
</body>
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  
    $("#tabeljabatan").DataTable({
      
      searching   : true,
      bInfo : false,
      //bLengthChange : false,
      bPaginate : false
     
  })
</script>

</html>