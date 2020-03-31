									<?php 
									$total=0; $hasil=0;$hasil2=0;$hasil3=0;
									//$hasil4=0;$hasil5=0;
									foreach ($listdetailsample->result() as $t) { 
									$subtotal = $t->qtyb*$t->harga_beli;
									$diskon =$t->qtyb*$t->harga_beli*$t->disc/100;
									$hasil =$subtotal-$diskon;
									$hasil2 =$hasil*$t->disc1/100;
									$hasil3 =$hasil-$hasil2;
								//	$hasil4 =$hasil3*$t->disc2/100;
								//	$hasil5 =$hasil3-$hasil4;
									?>
									
									<tr>
											<td ><?php echo $t->nama_barang; ?></td>
											<td> <?php echo $t->qtyb; ?></td>
											<td> <?php echo $t->satuan_besar; ?> </td>
											<td>  Rp. <?php echo number_format($t->harga_beli,2); ?></td>
											<td>  <?php echo $t->disc; ?></td>
											<td>  <?php echo $t->disc1; ?></td>
											<td> Rp. <?php echo number_format($hasil3,2); ?></td> <!-- Asli $hasil5 -->
											</tr>
									
									<?php $total=$total+$hasil3; } ?> 
									<tr>
											<td colspan = "1"><b>Keterangan Alamat</b></td>
											<td colspan = "6"><?php echo $t->ket_alamt;?></td>
											</tr>
									<tr>
									<td colspan = "6" align = "right"><b>Total</b></td>
									<td >Rp. <?php echo number_format($total,2);?></td>
									</tr>
									<?php if($t->potongan > 0){
										  echo "<tr>
									<td colspan = 6 align = right><b>Potongan</b></td>
									<td >Rp. ".number_format($t->potongan,2)."</td>
									</tr>";
									}?>
									<?php if($t->nominal1 > 0){
										  echo "<tr>
									<td colspan = 6 align = right><b>".strtoupper($t->ongkir1)."</b></td>
									<td >Rp. ".number_format($t->nominal1,2)."</td>
									</tr>";
									}
									?>
									<?php if($t->potongan > 0 OR $t->nominal1 > 0){
										echo"<tr>
											<td colspan = 6 align = right><b>Grand Total</b></td>
											<td>Rp. " .number_format($t->total,2)."</td>
											</tr>";
											}?>
									<?php if($t->cash > 0){
										  echo "<tr>
									<td colspan = 6 align = right><b>Cash</b></td>
									<td >Rp. ".number_format($t->cash,2)."</td>
									</tr>";
									}
									?>
									<?php if($t->debet > 0){
										  echo "<tr>
									<td colspan = 6 align = right><b>Debet</b></td>
									<td>".strtoupper($t->bank1)." | Rp. ".number_format($t->debet,2)."</td>
									</tr>";
									}
									?>
									<?php if($t->transfer > 0){
										  echo "<tr>
									<td colspan = 6 align = right><b>Transfer</b></td>
									<td>".strtoupper($t->bank2)." | Rp. ".number_format($t->transfer,2)."</td>
									</tr>";
									}
									?>
									<?php if($t->giro > 0){
										  echo "<tr>
									<td colspan = 6 align = right><b>Giro</b></td>
									<td >Rp. ".number_format($t->giro,2)."</td>
									</tr>";
									}
									?>
									<?php if($t->deposit > 0){
										  echo "<tr>
									<td colspan = 6 align = right><b>Deposit</b></td>
									<td >Rp. ".number_format($t->deposit,2)."</td>
									</tr>";
									}
									?>
									<?php if($t->deposit > 0){
										  echo "<tr>
									<td colspan = 6 align = right><b>Sisa Deposit</b></td>
									<td >Rp. ".number_format($t->deposit - $t->dp,2)."</td>
									</tr>";
									}
									
									?>
									<?php if($t->kembali > 0){
										  echo "<tr>
									<td colspan = 6 align = right><b>Kembali</b></td>
									<td> Rp. ".number_format($t->kembali,2)."</td>
									</tr>";
									}
									
									?>
									<?php if($t->sisa2 > 0){
										  echo "<tr>
									<td colspan = 6 align = right><b>Sisa Tagihan</b></td>
									<td> Rp. ".number_format($t->sisa2,2)."</td>
									</tr>";
									}
									
									?>
									<?php if($t->giro > 0){
										  echo "<tr>
									<td colspan = 6 align = right rowspan = 2><b>Ket Giro</b></td>
									<td >".$t->ket_giro."</td>
									</tr>";
									}
									?>
									<tr>
									<?php if($t->acc == 0){?>
										<td colspan = "7" align = "right"><a href = "#" class="btn btn-sm btn-primary cetak" data-idi = "<?php echo $t->no_sample;?>" class = "btn btn-primary">Cetak</a></td>
									<?php }else{
										echo "";
										}
									?>
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
		</script>
									
												
		

                
              