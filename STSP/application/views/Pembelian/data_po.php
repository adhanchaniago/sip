									<?php 
									$no=1;
									foreach ($detail_po->result() as $t) { 
									?>
									<tr>
											<td ><?php echo $no; ?></td>
											<td ><?php echo $t->nama_barang; ?></td>
											<td ><?php echo $t->qty; ?> <?php echo $t->satuan; ?></td>
											<td> <?php echo $t->simbol;?>.<?php echo number_format($t->harga_jual,2);?></td>
									</tr>
									<?php $no++;} ?>
									<tr>
									<?php 
									if($t->acc == 0 AND $t->batal == 0){
									?>
									<td colspan = "4" align = "right"><a href = "#" data-nopo = "<?php echo $t->no_po;?>" class = "btn btn-primary edit">Cetak</a></td>
									<?php }else{ 
									echo "";
									}?>
									</tr>
									
		<div class="modal fade bd-example-modal-lg" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content" style="width:560px;margin-left: 185px;">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Alasan Cetak</h5>
			  </div>
			  <div class="modal-body" id = "keterangan1">
				
			  </div>
			  <div class="modal-footer">
					
			  </div>
			</div>
		  </div>
		</div>
		
		<script>
		$(".edit").click(function(){
		$('#ModalEdit').modal("show");
			no_po = $(this).attr('data-nopo');
			$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Pembelian/looping_cetak_po',
			data    :'no_po='+no_po,
			cache   :false,
			success :function(respond){
					$("#keterangan1").html(respond);
			}
		});
	});
		</script>