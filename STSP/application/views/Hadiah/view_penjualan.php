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
<body>	 
 <div class = "row">
<section class="col-lg-12 connectedSortable">
		<div class="box box-primary">
				<div class="box box-primary" style="margin-top: -3px;">
				<?php if ($j->i_pemberian_hadiah == "Y"): ?>
				<a href = "<?php echo base_url();?>Hadiah/input_penjualan" class="btn btn-sm btn-primary btn-sm pull-right" title="Collapse"style="margin-right: 5px;margin-top: 5px;" > Tambah Pemberian</i></a>
				<?php endif;?>
       	<h3 class="box-title">Data Pemberian Hadiah</h3>
		</div>
					  <table id = "example" class="table table-condensed" >
						   <thead bgcolor="#99FF99">
				                <tr>
								<td width = "10px" ><b>No</b></td>
								<td width = "100px" ><b>No Pemberian</b></td>
								<td  align="center" width = "50px"><b>Tgl Beri</b></td>
								<td  width = "100px"><b>Pelanggan</b></td>
								<td  align="right" width = "80px"><b>Total</b></td>
								<td width = "250px"><b>Keterangan</b></td>
								<td width = "20px"><b>User</b></td>
								</tr>
								</thead> 
								<tbody>
								<?php 
									$no=1;
									foreach($list_pemberian->result() as $f){
									
								?>
								
							
								<tr href = "#"  class="detail" data-id = "<?php echo $f->no_pemberian; ?>">
								<td><?php echo $no;?></td>
								<td><?php echo $f->no_pemberian;?>/<?php echo $f->id_pelanggan;?></td>
								<td align="center"><?php echo $f->tgl_pemberian;?></td>
								<td><?php echo $f->nama_pelanggan;?></td>
								<td  align="right"><?php echo number_format($f->total,2);?></td>
								<td><?php echo $f->keterangan;?></td>
								<td><?php echo $f->user;?></td>
									</tr>
									<?php $no++;}?>
								</tbody>
							</table>
				</div>
			</div>
</section>
	<div class="modal fade bd-example-modal-lg" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Data Detail Pemberian</h5>
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
							<th style="width:100px"> Harga </th>
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

		<?php echo $this->session->flashdata('message');
?>
</body>
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

			id_barang = $(this).attr('data-id');

			$.ajax({
				type 	:'POST',
				url     :'<?php echo base_url();?>Hadiah/detail_pemberian',
				data    :'id_barang='+id_barang,
				cache   :false,
				success :function(respond){
					
					$("#datadetail").html(respond);
				}
				
			});

		});
		$(".cetak").click(function(){
		$('#ModalCetak').modal("show");
		$('#alasan_cetak').focus();
			no_pemberian = $(this).attr('data-idi');
			$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Hadiah/looping_cetak_hadiah',
			data    :'no_pemberian='+no_pemberian,
			cache   :false,
			success :function(respond){
					$("#keterangan").html(respond);
			}
		});
	});
			$(".detail").click(function(){
			
			$('#ModalDetail').modal("show");

			id_barang = $(this).attr('data-id');

			$.ajax({
				type 	:'POST',
				url     :'<?php echo base_url();?>Penjualan/detail_retur',
				data    :'id_barang='+id_barang,
				cache   :false,
				success :function(respond){
					$("#detairetur").html(respond);
				}
				
			});

		});
		$(".detail1").click(function(){
			
			$('#Modal').modal("show");

			no_jual = $(this).attr('data-idi');

			$.ajax({
				type 	:'POST',
				url     :'<?php echo base_url();?>Penjualan/penjualan_data',
				data    :'no_jual='+no_jual,
				cache   :false,
				success :function(respond){
					
					$("#detailpenjualan").html(respond);
				}
				
			});

		});
		
document.onkeydown = function (e) {
		switch (e.keyCode) {
		   
			case 13:
				e.preventDefault();
				
				setTimeout('self.location.href="<?php echo base_url();?>Hadiah/input_penjualan"', 0);
				break;
		   
			
		}
}
</script>
<script>
  
    $("#example").DataTable({
     
      
      searching   : true,
      bInfo : false,
      bLengthChange : false,
      bPaginate : false,
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