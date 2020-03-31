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
  
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font.css">
  
   <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th,  {
  text-align: center;
  padding: 8px;
}


</style>
</head>
<body>	
 
 <div class = "row">
<section class="col-lg-12 connectedSortable">
						<?php 
						$user = $this->session->userdata('username');
						$query = "select * from menu WHERE level = '$user'";
								$j = $this->db->query($query);
								$j->num_rows();
								
							?>
							<?php foreach ($j->result() as $j){ 
							}
							?>
							
		<div class="box box-primary">
				<?php if ($j->i_penjualan_sample == "Y" ): ?>
				<div class="box box-primary" style="margin-top: -3px;"><a href = "<?php echo base_url();?>Penjualan_Sample/input_penjualan_sample" class="btn btn-sm btn-primary btn-sm pull-right" title="Penjualan" style="margin-right: 5px;margin-top: 5px;" > Penjualan Non Data</a>
				<?php endif;?>
		 <div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
				<?php if ($j->penjualan == "Y" ): ?>
				<li class=""><a href="<?php echo base_url(); ?>Penjualan/view_penjualan"><i class="fa fa-cart-arrow-down"></i> <b>Data Penjualan</b></a></li>
				<?php endif;?>
				<li class="active"><a href="<?php echo base_url(); ?>Penjualan_Sample/view_penjualan_sample" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> <b>Data Penjualan Non Data</b></a></li>
				<?php if ($j->r_penjualan == "Y" ): ?>
				<li class=""><a href="<?php echo base_url(); ?>Penjualan/view_retur" ><i class="fa fa-mail-forward"></i> <b>Data Retur Penjualan</b></a></li>
				<?php endif;?>
				</ul>
			</div>
		</div>
						
					  <table id = "example" class="table table-condensed" >
						   <thead bgcolor="#99FF99">
				                <tr>
								<td width = "10px" ><b>No</b></td>
								<td width = "100px" ><b>No Invoice</b></td>
								<td  width = "50px"><b>Tgl Inv</b></td>
								<td  width = "100px"><b>Pelanggan</b></td>
								<td  align="right" width = "80px"><b>Total</b></td>
								<td  align="right" width = "80px"><b>Sisa Tagihan</b></td>								
								<td  width = "70px"><b>J Tempo</b></td>
								<td width = "5px"><b>C</b></th>
								<td align="center" width = "1%"><b>Status</b></td>
								<td width = "5px"><b>Acc</b></td>
								<td width = "250px"><b>Keterangan</b></td>
								<td width = "20px"><b>User</b></td>
								<td width = "50px"><b>Tempo</b></td>
								</tr>
								</thead> 
								<tbody>
								<?php 
									$no=1;
									foreach($listpenjualan->result() as $f){
									
								?>
								
							
								<tr>
								<td><?php echo $this->session->userdata('row')+$no;?></td>
								<td href = "#"  class="detail" data-nama = "<?php echo $f->no_sample; ?>"><?php echo $f->no_sample;?>/<?php echo $f->id_pelanggan;?>/<?php echo $f->no_reff;?></td>
								<td ><?php echo date('d-m-Y',strtotime($f->tgl_invoice));?></td>
								<td><?php echo $f->nama_pelanggan;?></td>
								<td  align="right"><?php echo number_format($f->total,2);?></td>
								<td  align="right"><?php if ($f->sisa >= 0 ){ echo number_format($f->sisa,2);
								}else{ echo "0.00";}
								
								?></td>
								<td><?php echo date('d-m-Y',strtotime($f->jatuh_tempo)); ?></td>
								<td><?php echo $f->cetak; ?></td>
								<td align="center"><?php if ($f->sisa <= 0) {?>
									<span style="width:15px;height:10px" class='btn btn-xs btn-success'></span>
									<?php
								} else{ ?>
								<span style="width:15px;height:10px" class='btn btn-xs btn-danger'></span>
								<?php }?>
								</td>
								<td align="center">
								<?php if ($f->acc == 0) {?>
									<span></i></span>
									<?php
								} else{ ?>
								<span ><i class='fa fa-check'></i></span>
								<?php }?>
								</td>
								<td><?php echo $f->keterangan;?></td>
								<td><?php echo $f->user; ?></td>
								<td><?php echo $f->tempo;?> Hari</td>
								</tr>
									<?php $no++;}?>
								</tbody>
							</table>
				</div>
			</div>
			<div>
			   <ul class="pagination pagination-sm no-margin pull-right">
				<?php echo $this->pagination->create_links(); ?>
			   </ul>
		    </div>
</section>
	<div class="modal fade bd-example-modal-lg" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Data Detail Penjualan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<table  class="table table-condensed" id = "#">
						<thead bgcolor="#99FF99">
						<tr>
							
							<th style="width:200px"> Nama Barang </th>
							<th style="width:100px"> QTY </th>
							<th style="width:100px"> Satuan </th>
							<th style="width:100px"> Harga </th>
							<th style="width:50px"> % 1 </th>
							<th style="width:50px"> % 2 </th>
							<th style="width:120px"> Subtotal </th>
						</tr>
						</thead>
	
						<tbody id = "datadetail">
						
						
						</tbody>
						</table>
			  </div>
			  <div class="modal-footer">
			 
			  </div>
			</div>
		  </div>
		</div>
		
		<div class="modal fade bd-example-modal-lg" id="ModalCetak" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content" style="width:560px;margin-left: 185px;">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Alasan</h5>
			  </div>
			  <div class="modal-body" id = "keterangan">
				
			  </div>
			  <div class="modal-footer">
					
			  </div>
			</div>
		  </div>
		</div>
		
</div>
</body>
<?php echo $this->session->flashdata('message');
?>
  <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		
  <script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  
  
  <script src="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.js"></script>
  
<script type="text/javascript">
	tampiltmp();
		function tampiltmp(){
								
					
		}
		
		$(".detail").click(function(){
			
			$('#ModalDetail').modal("show");

			nama_barang = $(this).attr('data-nama');

			$.ajax({
				type 	:'POST',
				url     :'<?php echo base_url();?>Penjualan_Sample/detail_data_sample',
				data    :'nama_barang='+nama_barang,
				cache   :false,
				success :function(respond){
					
					$("#datadetail").html(respond);
				}
				
			});

		});
		
		$(".cetak").click(function(){
		$('#ModalCetak').modal("show");
		$('#alasan_cetak').focus();
			no_sample = $(this).attr('data-idi');
			$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Penjualan_sample/looping_cetak',
			data    :'no_sample='+no_sample,
			cache   :false,
			success :function(respond){
					$("#keterangan").html(respond);
			}
		});
	});
		
document.onkeydown = function (e) {
		switch (e.keyCode) {
		   
			case 13:
				e.preventDefault();
				
				setTimeout('self.location.href="<?php echo base_url();?>Penjualan_sample/input_penjualan_sample"', 0);
				break;
		   
			
		}
}
</script>
<script>
  
    $("#example").DataTable({
     
      
      searching   : true,
      bInfo : false,
      bLengthChange : false,
      bPaginate : true,
      ordering	:	false
      
      
    });
   $("#example2").DataTable({
     
      
      searching   : true,
      bInfo : false,
      bLengthChange : false,
      bPaginate : false
      
      
      
    });
   
  
</script>
</html>