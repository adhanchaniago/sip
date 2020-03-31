<form class="form-horizontal"  method="POST" action="<?php echo base_url();?>Penjualan/pembatalan" enctype = "multipart/form-data">
							<div class="form-group">
								<label class="col-sm-3 control-label"><h5>Apakah Anda Yakin ?</h5></label>
								<div class="col-sm-5">
										<?php foreach ($batal->result() as $r) {  ?>
										<input type="hidden" value = "<?php echo $r->no_jual; ?>" name="no_jual" id="#" autocomplete="off" class="form-control" placeholder = "Masukan Alasan">
										<?php } ?>
										<input type="hidden" value = "1" name="batal" id="batal" autocomplete="off" class="form-control" placeholder = "Masukan Alasan">
										<br>
										<br>
										<br>
										<input type="submit" name = "submit" value = "OK" class="btn btn-primary" style="margin-left: 87%;">
										
									
								</div>
							</div>
							
					</form>
					<script>
					$('#alasan_cetak').focus();
					$('select').select2();
					</script>
