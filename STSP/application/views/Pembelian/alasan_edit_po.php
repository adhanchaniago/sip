<form class="form-horizontal"  method="POST" action="<?php echo base_url();?>Pembelian/alasan_edit_po" enctype = "multipart/form-data">
							<div class="form-group">
								<label class="col-sm-3 control-label">Alasan Edit</label>
								<div class="col-sm-5">
										<?php foreach ($edit->result() as $r) {  ?>
										<input type="hidden" value = "<?php echo $r->no_po; ?>" name="no_po" id="#" autocomplete="off" class="form-control" placeholder = "Masukan Alasan">
										<?php } ?>
										<select name="alasan_edit" id="alasan_edit" style = "width:300px;" class="form-control select2" autofocus tabindex="1" required> 
										<option value = "Salah Memasukan Nama Barang">Salah Memasukan Nama Barang</option>
										<option value = "Salah Memasukan Nama Supplier">Salah Memasukan Nama Supplier</option>
										<option value = "Salah Memasukan Quantity Barang"> Salah Memasukan Quantity Barang </option>
										</select>
										<hr>
										<h5> History Alasan </h5>
										<table>
										<?php 
										$no = 1;
										foreach($edit1->result() as $g){ ?>
										<tr>
										<td> Edit Ke - <?php echo $no;?> </td>
										<td> &nbsp </td>
										<td> = </td>
										<td> &nbsp </td>
										<td> <?php echo $g->alasan_edit;?> (<?php echo $g->user;?>) </td>
										</tr>
										<?php $no++;} ?>
										</table>
										<table align = "right">
										<tr>
										<td align = "right">
										<input type="submit" name = "submit" value = "OK" class="btn btn-sm btn-primary">
										</td>
										</tr>
										</table>
								</div>
							</div>
							
					</form>
					<script>
					$('#alasan_cetak').focus();
					$('select').select2();
					</script>
