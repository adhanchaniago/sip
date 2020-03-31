									<?php 
									$total=0; 
									//$hasil4=0;$hasil5=0;
									foreach ($listdetail->result() as $t) { 
									?>
									
									<tr>
											<td ><?php echo $t->no_sample; ?>/<?php echo $t->id_pelanggan; ?>/<?php echo $t->no_reff; ?></td>
											<td>Rp. <?php echo number_format($t->total,2); ?> </td>
											<td>Rp. <?php echo number_format($t->bayar,2); ?> </td>
											<td>Rp. <?php echo number_format($t->sisa_bayar,2); ?></td>
											</tr>
									<?php $total=$total+ $t->bayar; } ?> 
												<tr>
											<td colspan = "3" align = "right"><b>Total</b></td>
											<td>Rp. <?php echo number_format($total,2);?></td>
											</tr>
											
											<?php if($t->potongan > 0){ echo"
											<tr>
											<td colspan = 3 align = right><b>Potongan</b></td>
											<td>Rp. " .number_format($t->potongan,2)."</td>
											</tr>";
											}?>
											
											<?php if($t->potongan > 0){ echo"
											<tr>
											<td colspan = 3 align = right><b>Grand Total</b></td>
											<td>Rp. " .number_format($t->totalan,2)."</td>
											</tr>";
											}?>
											
											<?php if($t->cash > 0){ echo"
											<tr>
											<td colspan = 3 align = right><b>Cash</b></td>
											<td>Rp. " .number_format($t->cash,2)."</td>
											</tr>";
											}?>
											
											<?php if($t->debet > 0){ echo"
											<tr>
											<td colspan = 3 align = right><b>Debet</b></td>
											<td>Rp. ".number_format($t->debet,2)."</b> | <b> ".strtoupper($t->bank1)."</b></td>
											</tr>";
											}?>
											
											<?php if($t->transfer > 0){ echo"
											<tr>
											<td colspan = 3 align = right><b>Transfer</b></td>
											<td>Rp. ".number_format($t->transfer,2)."</b> | <b> ".strtoupper($t->bank2)."</b></td>
											</tr>";
											}?>
											
											<?php if($t->giro > 0){ echo"
											<tr>
											<td colspan = 3 align = right><b>Giro</b></td>
											<td>Rp. " .number_format($t->giro,2)."</td>
											</tr>";
											}?>
											
											<?php if($t->deposit > 0){ echo"
											<tr>
											<td colspan = 3 align = right><b>Deposit</b></td>
											<td>Rp. " .number_format($t->deposit,2)."</td>
											</tr>";
											}?>
											
											<?php if($t->deposit > 0){ echo"
											<tr>
											<td colspan = 3 align = right><b>Sisa Deposit</b></td>
											<td>Rp. " .number_format($t->deposit - $t->dp,2)."</td>
											</tr>";
											}?>
											
											<?php if($t->kembali > 0){ echo"
											<tr>
											<td colspan = 3 align = right><b>Kembali</b></td>
											<td>Rp. " .number_format($t->kembali,2)."</td>
											</tr>";
											}?>
											
											<?php if($t->kurang_bayar > 0){ echo"
											<tr>
											<td colspan = 3 align = right><b>Kurang bayar</b></td>
											<td>Rp. " .number_format($t->kurang_bayar,2)."</td>
											</tr>";
											}?>
											
											<?php if($t->giro > 0){ echo"
											<tr>
											<td colspan = 3 align = right><b>Ket Giro</b></td>
											<td>" .$t->ket_giro."</td>
											</tr>";
											}?>
											<?php if($this->session->userdata('level') === 'Administrator'  OR $this->session->userdata('level') === 'KasirThermal' OR $this->session->userdata('level') === 'Manager'): ?>
											<tr>
											<td><iframe name="tampilan" frameborder="0"  style="width:10px;height:5px"></iframe></td>
											<td colspan = "3" align = "right"><a href = "#" class = "btn btn-primary cetak" data-idi = "<?php echo $t->no_bukti;?>">Cetak</a> 
											</tr>
											<?php endif;?>
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
			no_bukti = $(this).attr('data-idi');
			$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Penerimaan_sample/looping_cetak',
			data    :'no_bukti='+no_bukti,
			cache   :false,
			success :function(respond){
					$("#keterangan").html(respond);
			}
		});
	});
											</script>
											
              
                
              