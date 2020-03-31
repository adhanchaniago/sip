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
	<div class="box box-default box-succes">
			<h3 class="box-title">Data Informasi Komisi</h3>
					<form class="form-horizontal" method="POST" action="">
						<div class="box-body">
						<table id = "tabelkomisi" class="table table-condensed">
			                <thead bgcolor="#99FF99">
			                <tr>
			                  <th width="150px"> <center>ID Komisi</center></th>
			                  <th width="150px"> <center>ID Sales </center></th>
			                  <th width="150px"> <center>ID Kategori </center></th>
			                  <th width="150px"> <center>ID K Pelanggan </center></th>
			                  <th width="150px"> <center>Komisi Persen</center></th>
			                </tr>
			                </thead>
			                <tbody>
			                <?php 
			                foreach ($listkomisi->result() as $c) { 
			                ?>
			                <tr>
			                  <td align = "center"><a href = "<?php echo base_url('Komisi/edit_komisi');?>/<?php echo $c->id_komisi;?>"><?php echo $c->id_komisi; ?></a></td>
			                  <td align = "center"><?php echo $c->id_sales; ?></td>
			                  <td align = "center"><?php echo $c->id_k_pelanggan; ?></td>
							  <td align = "center"><?php echo $c->id_k_pelanggan; ?></td>
							  <td align = "center"><?php echo $c->komisi_rp; ?></td>
			                </tr>
			                
			                <?php } ?>
			               
			              </table>
						</div>
					</form>
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
							<label class="col-sm-3 control-label">ID Komisi</label>
							<div class="col-sm-5">
									<input type="text"  name="id_komisi" value = "<?php echo $d['id_komisi'];?>" id="id_komisi" autocomplete="off" class="form-control" placeholder = "Masukan ID Komisi" autofocus>
							</div>	
							</div>
							
							<div class="form-group">
							<label class="col-sm-3 control-label">ID Sales</label>
							<div class="col-sm-5">
									<select class="form-control" name = "id_sales" id="#">
										 <option value = "<?php echo $d['id_sales'];?> "> <?php echo $d['id_sales'];?> </option>
										 <?php foreach($listsales->result() as $a){?>
										 <option value = "<?php echo $a->id_sales;?>"><?php echo $a->nama_sales;?> </option>
										 <?php } ?>
									</select>
							</div>
							</div>
							
							<div class="form-group">
							<label class="col-sm-3 control-label">ID K Barang</label>
							<div class="col-sm-5">
									<select class="form-control" name = "id_k_barang" id="#">
										 <option value = "<?php echo $d['id_k_pelanggan'];?>"> <?php echo $d['id_k_barang'];?> </option>
										 <?php foreach($list_k_barang->result() as $b){?>
										 <option value = "<?php echo $b->id_k_barang;?>"><?php echo $b->nama_k_barang;?> </option>
										 <?php } ?>
									</select>
							</div>
							</div>
							
							<div class="form-group">
							<label class="col-sm-3 control-label">ID K Pelanggan</label>
							<div class="col-sm-5">
									<select class="form-control" name = "id_k_pelanggan" id="#">
										 <option value = "<?php echo $d['id_k_pelanggan'];?>"> <?php echo $d['id_k_pelanggan'];?> </option>
										 <?php foreach($list_kategori->result() as $c){?>
										 <option value = "<?php echo $c->id_k_pelanggan;?>"><?php echo $c->nama_kategori;?> </option>
										 <?php } ?>
									</select>
							</div>
							</div>
							
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Komisi Persen</label>
								<div class="col-sm-5">
										<input type="text"  name="komisi_rp" value = "<?php echo $d['komisi_rp'];?>" id="komisi_rp" autocomplete="off" class="form-control" placeholder = "Masukan Komisi">
										<hr>
										<table align = "right">
										<tr>
										<td>
										<input type="submit" name = "submit" value = "Simpan" class="btn btn-sm btn-primary">
										<a href = "<?php echo base_url();?>Komisi/input_komisi" class = "btn btn-sm btn-danger">Cancel</a>
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
      
      searching   : true,
      bInfo : false,
      //bLengthChange : false,
      bPaginate : false
      
     
  })

</script>

</html>