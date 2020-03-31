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
</body>
 <div class = "row">
<section class="col-lg-9 connectedSortable">
	<div class="box box-success">
		<div class="box box-success" style="margin-top: -3px;"> 
				  <h3 class="box-title">Data Informasi Komisi</h3>
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
			                  <td width="100px"> <b>ID Sales </b></td>
			                  <td width="150px"> <b>Nama Sales </b></td>
			                  <td width="150px"> <b>Barang </b></th>
			                  <td width="100px"> <b>Kategori Pelanggan </b></td>
			                  <td width="50px"> <b>Komisi</b></td>
			                  <td width="10px" align="center"> <b>A</b></td>
			                
			                 
			              
			                </tr>
			                </thead>
			                <tbody>
			                <?php 
			                foreach ($listkomisi->result() as $d) { 
			                ?>
			                <tr>
			                  <td ><?php echo $d->id_sales; ?></td>
			                  <td ><?php echo $d->nama_sales; ?></td>
			                  <td ><?php echo $d->id_k_barang; ?></td>
							  <td ><?php echo $d->id_k_pelanggan; ?></td>
							  <td ><?php echo $d->komisi_rp; ?></td>
							  <td ><a href = '<?php echo base_url('Komisi/edit_komisi');?>/<?php echo $d->id_komisi;?>' class = "btn btn-xs btn-primary"><i class = "fa fa-edit"></i></a></td>
			                </tr>
			                
			                <?php } ?>
			               
			              </table>
				</div>
	  		</section>
	  <section class="col-lg-3 connectedSortable select2">
		<div class="box box-primary box-solid">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-tag"></i> Input Data Komisi</h3>
		</div>
					<form class="form-horizontal" method="POST" action="">
						<div class="box-body">
							<div class="form-group">
							<label class="col-sm-3 control-label">Sales</label>
							<div class="col-sm-5">
									<select class="form-control" name = "id_sales" id="#"autofocus>
										 <?php foreach($listsales->result() as $a){?>
										 <option value = "<?php echo $a->id_sales;?>"><?php echo $a->nama_sales;?> </option>
										 <?php } ?>
									</select>
							</div>
							</div>
							
							<div class="form-group">
							<label class="col-sm-3 control-label">Barang</label>
							<div class="col-sm-5">
									<select class="form-control" name = "id_k_barang" id="#">
										 <?php foreach($list_k_barang->result() as $b){?>
										 <option value = "<?php echo $b->id_barang;?>"><?php echo $b->nama_barang;?> </option>
										 <?php } ?>
									</select>
							</div>
							</div>
							
							<div class="form-group">
							<label class="col-sm-3 control-label">K.Pelanggan</label>
							<div class="col-sm-5">
									<select class="form-control" name = "id_k_pelanggan" id="#">
										 <?php foreach($list_kategori->result() as $c){?>
										 <option value = "<?php echo $c->id_k_pelanggan;?>"><?php echo $c->nama_kategori;?> </option>
										 <?php } ?>
									</select>
							</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Komisi</label>
								<div class="col-sm-5">
										<input type="text"  name="komisi_rp" id="komisi_rp" autocomplete="off" class="form-control" placeholder = "%">
										<input type="hidden"  name="id_komisi" value="<?php echo $akhir;?>" id="id_komisi" autocomplete="off" class="form-control"  >
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
						</div>
					</form>
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
  
    $("#tabelkomisi").DataTable({
      
      searching   : false,
      bInfo : false,
      //bLengthChange : false,
      bPaginate : false
      
     
  })

</script>

</html>