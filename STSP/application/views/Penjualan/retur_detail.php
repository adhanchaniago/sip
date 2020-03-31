									<?php 
									$total=0; $hasil=0;$hasil2=0;$hasil3=0;
									//$hasil4=0;$hasil5=0;
									foreach ($listretur->result() as $t) { 
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
											<td align = "right"> Rp. <?php echo number_format($hasil3,2); ?></td> <!-- Asli $hasil5 -->
										</tr>
										<?php $total=$total+$hasil3; } ?> 
										<tr>
											<td colspan = "6" align = right><b>Total</b></td>
											<td align = "right">Rp. <?php echo number_format($total,2); ?></td>
										</tr>
										
										<tr>
											<td colspan="7" align="right">
												<a href = "#" class="btn btn-sm btn-primary cetak" data-idi = "<?php echo $t->no_retur;?>" tabindex="29">Cetak</a>
											</td>
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
												no_retur = $(this).attr('data-idi');
												$.ajax({
													type 	:'POST',
													url     :'<?php echo base_url();?>Penjualan/looping_cetak_retur',
													data    :'no_retur='+no_retur,
													cache   :false,
													success :function(respond){
														$("#keterangan").html(respond);
													}
												});
											});

										</script>

										
										