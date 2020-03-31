
									<?php 
									foreach ($listdetail->result() as $t) {
										
									?>
									<tr>
											<td> <?php echo $t->nama_barang; ?> </td>
											<td> <?php echo $t->jml_krm; ?> <?php echo $t->satuan_besar; ?></td>
									</tr>
									<?php } ?> 
									
									<tr>
									<?php if($this->session->userdata('level') === 'Administrator' OR $this->session->userdata('level') === 'Kasir Thermal' OR $this->session->userdata('level') === 'Manager'): ?>
									<?php if($t->jml_krm > 0){ ?>
									<td colspan = "4" align = "right"><a href = "#" class="btn btn-sm btn-primary cetak" data-idi = "<?php echo $t->no_kirim;?>" tabindex="29">Cetak</a></i></td>
									<?php }else{
											echo "";
									}?>
									<?php endif;?>
									</td>
									</tr>
									<tr>
									<td colspan="4" align="right">
									<iframe name="tampil1" frameborder="0" scrolling="no" style = "width:10px;height:5px;">
									</iframe>
									</tr>
									
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
		<script>
		$(".cetak").click(function(){
		$('#ModalCetak').modal("show");
		$('#alasan_cetak').focus();
			no_kirim = $(this).attr('data-idi');
			$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Surat_jalan/looping_cetak_sj',
			data    :'no_kirim='+no_kirim,
			cache   :false,
			success :function(respond){
					$("#keterangan").html(respond);
			}
		});
	});
		</script>
									
                