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
</body>
 <div class = "row">
<section class="col-lg-12 connectedSortable" >
		<div class="box box-success" style="margin-top: -3px;">
			<?php if ($j->i_sales == "Y" ): ?>
			<a href = "<?php echo base_url();?>Sales/input_sales" class="btn btn-sm btn-primary pull-right"title="Collapse" style="margin-right: 5px; margin-top: 5px;"> Tambah Sales</a>
			<?php endif;?>
			<h3 class="box-title">Data Informasi Sales</h3>
		</div >
		<?php if ($j->reset_sales == "Y" ): ?>
		<a href = "<?php echo base_url();?>Sales/reset_sales" class="btn btn-sm btn-danger pull-right"title="Collapse" style="margin-right: 5px; margin-top: 1px;"> Reset Sales</a>
		<?php endif;?>
		<?php if ($j->cetak_sales == "Y" ): ?>
		<a href = "<?php echo base_url();?>Sales/cetak_sales_seluruh" class="btn btn-sm btn-success pull-right"title="Collapse" style="margin-right: 5px; margin-top: 1px;" target = "tampil"> Cetak Sales</a>
		<?php endif;?>
			<table id = "example" class="table table-condensed" style="width: 1319px;">
				                <thead  bgcolor="#99FF99">
			                <tr>
			                  <td width="10px"> <b>No </b></td>
			                  <td width="50px"> <b>ID Sales</b></td>
			                  <td width="100px"> <b>Nama Sales</b></td>
							  <td width="50px"> <b>No Telp</b></td>
							  <td width="50px"> <b>Target Penjualan</b></td>
							  <td width="50px"> <b>Omset penjualan</b></td>
							  <td width="50px"> <b>Total Komisi</b></td>
							  <td width="150px"> <b>Alamat</b></td>
							  <td width="50px" align="center"> <b>Status</b></td>
							  <?php if ($j->cetak_sales == "Y" ): ?>
							  <td width="1px" align="center"> <b>E</b></td>
							  <?php endif;?>
							  <?php if ($j->e_sales == "Y" ): ?>
							  <td width="1px" align="center"> <b>C</b></td>
							 <?php endif;?>
							  
			                </tr>
			                </thead>
			                <tbody>
			                <?php 
							$no=1;
			                foreach ($listsales->result() as $d) { 
			                ?>
			                <tr>
							  <td><?php echo $no; ?></td>	
			                  <td><?php echo $d->id_sales; ?></td>
			                  <td><?php echo $d->nama_sales; ?></td>	
			                  <td><?php echo $d->no_telp; ?></td>		                  
			                  <td><?php echo number_format($d->target_penjualan,2); ?></td>		                  
			                  <td><?php echo number_format($d->omset_penjualan,2); ?></td>		                  
			                  <td><?php echo number_format($d->total_komisi,2); ?></td>		                  
			                  <td><?php echo $d->alamat; ?></td>
			                 <td align="center"><?php if ($d->status == "0") {?>
									<span style="font-size:12px"class="label label-success">Aktif</span>
									<?php
								} else{ ?>
								<span style="font-size:12px" class="label label-danger">Resign</span>
								<?php }?>
								</td>
								<?php if ($j->e_sales == "Y" ): ?>
							  <td align = "center"><a href = "<?php echo base_url('Sales/edit_sales/'.$d->id_sales);?>" class = "btn btn-xs btn-success"><i class = "fa fa-edit"></i></a></td>
								<?php endif;?>
								<?php if ($j->cetak_sales == "Y" ): ?>
							  <td align = "center"><a href = "<?php echo base_url('Sales/cetak_sales/'.$d->id_sales);?>" class = "btn btn-xs btn-primary" target = "tampil2"><i class = "fa fa-print"></i></a></td>
							  <?php endif;?>
			                </tr>
			                
			                <?php $no++; } ?>
			               
			              </table>
	  		</section>


</div>
		<iframe name="tampil" frameborder="0"  style="width:10px;height:5px"></iframe>
		<iframe name="tampil2" frameborder="0"  style="width:10px;height:5px"></iframe>
</body>


 <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		

  <script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
    $("#example").DataTable({
      searching   : true,
      bInfo : false,
      bLengthChange : false,
      bPaginate : false,
	  ordering	:	false
    });
</script>

</html>