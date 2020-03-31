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
  
</head>
<body>	 
 <div class = "row">
<section class="col-lg-12 connectedSortable">
						<?php 
						$no_jual		= $this->input->get('no_jual');
						$id_pelanggan	= $this->input->get('id_pelanggan');
						if($no_jual != ""){
							$no_jual = "WHERE tb_penjualans.no_jual = '$no_jual'";
						}
						if($id_pelanggan != ""){
							$id_pelanggan = "AND tb_penjualans.id_pelanggan = '$id_pelanggan'";
						}
							$query = "SELECT * FROM tb_penjualans INNER JOIN tb_pelanggan ON tb_penjualans.id_pelanggan = tb_pelanggan.id_pelanggan ".$no_jual.$id_pelanggan."";
							$cari = $this->db->query($query);
							$cari->num_rows();
						
						
								
							?>
						
					  <table id = "" class="table table-condensed" >
						   <thead bgcolor="#99FF99">
				                <tr>
								<td width = "10px" ><b>No</b></td>
								<td width = "100px" ><b>No Invoice</b></td>
								<td  align="center" width = "50px"><b>Tgl Inv</b></td>
								<td  width = "100px"><b>Pelanggan</b></td>
								<td  align="right" width = "80px"><b>Total</b></td>
								<td  align="right" width = "80px"><b>Sisa Tagihan</b></td>								
								<td  align="center" width = "70px"><b>J Tempo</b></td>
								<td width = "5px"><b>C</b></th>
								<td align="center" width = "1%"><b>Status</b></td>
								<td width = "5px"><b>Acc</b></td>
								<td width = "5px"><b>SJ</b></td>
								<td width = "250px"><b>Keterangan</b></td>
								<td width = "20px"><b>User</b></td>
								<td width = "50px"><b>Tempo</b></td>
								<td width = "20px"><b>A</b></td>
								</tr>
								</thead> 
								<tbody>
								<?php 
									$no=1;
									foreach($cari->result() as $row){
									
								?>
								
							
								<tr>
								<td><?php echo $this->session->userdata('row')+$no; ?></td>
								<td  href = "#"  class="detail" data-id = "<?php echo $row->no_jual; ?>"><?php echo ucwords($row->no_jual); ?>/<?php echo ucwords($row->id_pelanggan);?>/<?php echo ucwords($row->no_reff);?></td>
								<td  align="center"><?php echo ucwords($row->tgl_invoice); ?></td>
								<td><?php echo ucwords($row->nama_pelanggan);?></td>
								<td  align="right"><?php echo ucwords(number_format($row->total,2));?></td>
								<td  align="right"><?php if ($row->sisa >= 0 ){ echo ucwords(number_format($row->sisa,2));
								}else{ echo "0.00";}
								
								?></td>
								<td  align="center"><?php echo ucwords(date('d-m-Y',strtotime($row->jatuh_tempo))); ?></td>
								<td><?php echo ucwords($row->cetak); ?></td>
								<td align="center"><?php if ($row->sisa <= 0) {?>
									<span style="width:15px;height:10px" class='btn btn-xs btn-success'></span>
									<?php
								} else{ ?>
								<span style="width:15px;height:10px" class='btn btn-xs btn-danger'></span>
								<?php }?>
								</td>
								<td align="center">
								<?php if ($row->acc == 0) {?>
									<span></i></span>
									<?php
								} else{ ?>
								<span ><i class='fa fa-check'></i></span>
								<?php }?>
								</td>
								<td align="center">
								<?php if ($row->status_kirim == 0) {?>
									<span></span>
									<?php
								} else{ ?>
								<span ><i class='fa fa-check'></i></span>
								<?php }?>
								</td>
								<td><?php echo ucwords($row->keterangan);?></td>
								<td><?php echo ucwords($row->user); ?></td>
								<td><?php echo ucwords($row->tempo);?> Hari</td>
								<td>
								<?php if($row->acc == 0){?>
								<a href = "<?php echo base_url('Penjualan/input_retur_noju/'.$row->no_jual);?>" title='Retur' class="btn btn-xs btn-primary"><i class = "fa fa-mail-forward"></i></a>
								<?php }else{?>
								<a href = "<?php echo base_url('Penjualan/input_retur_noju/'.$row->no_jual);?>" title='Retur' class="btn btn-xs btn-primary disabled"><i class = "fa fa-mail-forward"></i></a>
								<?php }?>
								</td>
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
		<div class="modal fade bd-example-modal-lg" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Data Penjualan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<table  class="table table-condensed" id = "#">
						<thead>
						<tr>
							
							<th style="width:200px"> Nama Barang </th>
							<th style="width:100px"> QTY </th>
							<th style="width:100px"> Satuan </th>
							<th style="width:100px"> Harga </th>
							<th style="width:50px"> % 1 </th>
							<th style="width:50px"> % 2 </th>
							<th style="width:100px"> Subtotal </th>
						</tr>
						</thead>
	
						<tbody id = "detailpenjualan">
						
						
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

			id_barang = $(this).attr('data-id');

			$.ajax({
				type 	:'POST',
				url     :'<?php echo base_url();?>Penjualan/detail_data',
				data    :'id_barang='+id_barang,
				cache   :false,
				success :function(respond){
					
					$("#datadetail").html(respond);
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
		$(".cetak").click(function(){
		$('#ModalCetak').modal("show");
		$('#alasan_cetak').focus();
			no_jual = $(this).attr('data-idi');
			$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Penjualan/looping_cetak',
			data    :'no_jual='+no_jual,
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
				
				setTimeout('self.location.href="<?php echo base_url();?>Penjualan/input_penjualan"', 0);
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