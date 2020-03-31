  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  
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
<body>
 <div class = "row">
<section class="col-lg-9 connectedSortable">
<div class="box box-success">
		<div class="box box-success" style="margin-top: -3px;"> 
				  <h3 class="box-title">Data Informasi Satuan</h3>
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
						<table id = "" class="table table-condensed" >
			                 <thead bgcolor="#99FF99">
			                <tr>
			                  <th width="150px"> <center>ID</center></th>
			                  <th width="150px"> <center>  Nama Satuan</center></th>
							  <th width="150px"> <center>Keterangan</center></th>
							  <?php if ($j->e_satuan == "Y" ): ?>
							  <th width="150px"> <center>A</center></th>
							  <?php endif;?>
							 
							  
			                </tr>
			                </thead>
			                <tbody>
			                <?php 
			                foreach ($listsatuan->result() as $c) { 
			                ?>
			                <tr>
			                  <td align = "center"><?php echo $c->id_satuan; ?></td>
			                  <td align = "center"><?php echo $c->nama_satuan; ?></td>			                  
							  <td align = "center"><?php echo $c->keterangan; ?></td>
							<?php if ($j->e_satuan == "Y" ): ?>
							 <td align = "center"><a href = "<?php echo base_url('Satuan/edit_satuan');?>/<?php echo $c->id_satuan;?>" class="btn btn-success btn-xs"><i class = "fa fa-edit"></i></a></td>
							 <?php endif;?>
			                </tr>
			                
			                <?php } ?>
			               
			              </table>
						</div>
	  		</section>
	  <section class="col-lg-3 connectedSortable">
<div class="box box-primary box-solid">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-tag"></i> Edit Satuan</h3>
		</div>
					<form class="form-horizontal" method="POST" action="">
						<div class="box-body">
						
						
							<div class="form-group">
							<label class="col-sm-3 control-label">ID</label>
							<div class="col-sm-5">
									<input type="text"  name="id_satuan" id="id_satuan" onkeyup="this.value=this.value.toUpperCase();" value = "<?php echo  $d['id_satuan']; ?>" autocomplete="off" class="form-control" placeholder = "Masukan ID Satuan" readonly>
							</div>	
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Satuan</label>
								<div class="col-sm-5">
										<input type="text"  name="nama_satuan" id="nama_satuan" onkeyup="this.value=this.value.toUpperCase();" value = "<?php echo  $d['nama_satuan']; ?>" autocomplete="off" class="form-control" placeholder = "Masukan Nama Satuan" autofocus required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
								</div>
							</div>
							
							<div class="form-group">
							<label class="col-sm-3 control-label">Keterangan</label>
							<div class="col-sm-5">
									<input type="text"  name="keterangan" id="keterangan" onkeyup="this.value=this.value.toUpperCase();" value = "<?php echo  $d['keterangan']; ?>" autocomplete="off" class="form-control" placeholder = "Masukan Keterangan" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
									<hr>
										<table align = "right" class = "table1">
										<tr>
										<td align = "right">
										<input type="submit" name = "submit" value = "SIMPAN" class="btn btn-sm btn-primary">
										<a href = "<?php echo base_url();?>Satuan/input_satuan" class="btn btn-sm btn-danger">Cancel</a>
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
  
    $("#tabelsatuan").DataTable({
      
      searching   : true,
      bInfo : false,
      //bLengthChange : false,
      bPaginate : false
     
  })
</script>

</html>