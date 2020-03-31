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
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.autocomplete.css">
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
<body >	
 <div class = "row">
  <?php echo $this->session->flashdata('message');
?>
	<section class="col-lg-12 connectedSortable" >
		<div class="box box-primary">
		<div class="box box-primary" style="margin-top: -3px;">
		<?php if ($j->i_penerimaan == "Y"): ?>
		<a class="pull-right" style="margin-right: 5px;margin-top: 5px;"> <input type="text" id="id_pelanggan" placeholder="NAMA PELANGGAN" autofocus="" class="form-control" style="margin-top: 2px;"></i></a>
		<?php endif;?>
	  <h3 class="box-title">Data Penerimaan Piutang</h3>
	   </div>
						<table id = "example" class="table table-condensed">
						   <thead bgcolor="#99FF99">
				                <tr>
								<td width = "5px" ><b>No</b></td>
								<td width = "50px" ><b>No Bukti</b></td>
								<td width = "50px"align="center" ><b>Tgl Bayar</b></td>
								<td width = "80px"><b>Nama Pelanggan</b></td>
								<td width = "50px" align="right"><b>Total</b> </td>
								<td width = "30px" align="right"><b>Bayar</b></td>
								<td width = "280px"><b>Keterangan</b></td>
								<td width = "50px" ><b>User</b></td>
								</tr>
								</thead> 
								<tbody>
								<?php 
								
								$no=1;
									foreach($penerimaan->result() as $f){
									
								?>
								<tr  href = "#"  class="detail" data-id = "<?php echo $f->no_bukti; ?>">
								<td><?php echo $no;?></td>
								<td><?php echo $f->no_bukti;?>/<?php echo $f->id_pelanggan;?></td>
								<td align="center"><?php echo $f->tgl_bayar;?></td>
								<td><?php echo $f->nama_pelanggan;?></td>
								<td align="right"><?php echo number_format($f->totalan,2);?></td>
								<td align="right"><?php echo number_format($f->cash + $f->debet + $f->transfer + $f->giro,2);?></td>
								<td><?php echo $f->keterangan;?></td>
								<td><?php echo $f->user;?></td>
								</tr>
									<?php $no++;}?>
								</tbody>
							</table>
							
			</div>
		</section>
	<div class="modal fade bd-example-modal-lg" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content" style="width:516px; margin-left:250px">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Penerimaan Piutang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<table  class="table table-condensed" style = "width:500px;">
						<thead bgcolor="#99FF99">
						<tr>
							
							<th> No Invoice </th>
							<th> Tagihan </th>
							<th> Bayar </th>
							<th> Sisa Tagihan </th>
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
			<div class="modal fade bd-example-modal-lg pelanggan" id="ModalPelanggan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content" style="width:429px; margin-left:250px">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Data Pelanggan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <br>
			  <div class="modal-body" style = "width:300px;">
				<table  class="table table-condensed" id = "example2" style = "width:390px;">
						  <thead bgcolor="#99FF99">
						<tr>
							
							<th><b>Nama Pelanggan</b> </th>
							<th align="right"><b>Tambah</b> </th>
						</tr>
						</thead>
	
						<tbody >
						<tr>
						<?php 
						foreach($listpelanggan->result() as $p){
						?>
						<td><?php echo $p->nama_pelanggan;?></td>
						<td align="right"><a href = "<?php echo base_url('Penerimaan/input_penerimaan/'.$p->id_pelanggan); ?>"><span class = "btn btn-xs btn-success"><i class = "fa fa-plus"></i></span></a></td>
						
						</tr>
						<?php } ?>
						</tbody>
				</table>
			  </div>
			  
			  <div class="modal-footer">
					
			  </div>
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
</body>
  <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		
  <script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/jquery.autocomplete.js"></script>
  
  <script src="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.js"></script>
<script type="text/javascript">
	tampiltmp();
		function tampiltmp(){
								
					
		}
		
		$(".detail").click(function(){
			
			$('#ModalDetail').modal("show");

			no_bukti = $(this).attr('data-id');

			$.ajax({
				type 	:'POST',
				url     :'<?php echo base_url();?>Penerimaan/data_pn',
				data    :'no_bukti='+no_bukti,
				cache   :false,
				success :function(respond){
					
					$("#datadetail").html(respond);
				}
				
			});

		});
		$(".cetak").click(function(){
		$('#ModalCetak').modal("show");
		$('#alasan_cetak').focus();
			no_bukti = $(this).attr('data-idi');
			$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Penerimaan/looping_cetak',
			data    :'no_bukti='+no_bukti,
			cache   :false,
			success :function(respond){
					$("#keterangan").html(respond);
			}
		});
	});
	
	var site = "<?php echo site_url();?>";
 		$(function(){
 			$('#id_pelanggan').autocomplete({
 				serviceUrl: site+'Penerimaan/get_data_pelanggan/',
 				onSelect: function (suggestion) {
 					window.location.href = "<?php echo base_url();?>Penerimaan/input_penerimaan/"+suggestion.id_pelanggan;

 				}
 			});
 		});
			
</script>

 <script type="text/javascript">
$(document).on('keydown', 'body', function(e){
	var charCode = ( e.which ) ? e.which : event.keyCode;

	if(charCode == 118) //F7
	{
		BarisBaru();
		return false;
	}

	if(charCode == 13) //enter
	{
		$('#pel').click();
	}
	
});

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
      bPaginate : false,
	  ordering	:	false
      
      
      
    });
</script>
</html>