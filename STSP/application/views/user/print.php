<iframe name="tampil" frameborder="0"  style="width:10px;height:5px"></iframe>
<form class="form-horizontal"  method="POST" action="<?php echo base_url();?>User/update_cetak" target = "tampil" enctype = "multipart/form-data">
							<div class="form-group">
								<label class="col-sm-3 control-label">Alasan Print</label>
								<div class="col-sm-5">
										<?php foreach ($cetak->result() as $r) {  ?>
										<input type="hidden" value = "<?php echo $r->no_kas; ?>" name="no_kas" id="#" autocomplete="off" class="form-control" placeholder = "Masukan Alasan">
										<?php } ?>
										<select name="alasan_cetak" id="alasan_cetak" style = "width:300px;" class="form-control select2" autofocus tabindex="1" required > 
										<option value = "Nota Hilang / Rusak">NOTA HILANG / RUSAK</option>
										<option value = "Printer Rusak">PRINTER ERROR</option>
										<option value = "Req Pembeli"> REQ PEMBELI </option>
										</select>
										<input type="hidden"  name="cetak" value = "1" id="#" autocomplete="off" class="form-control" placeholder = "Masukan No KK">
										<hr>
										<h5> <b>History Cetak</b> </h5>
										<?php if($this->session->userdata('level') === 'Administrator' OR $this->session->userdata('level') === 'KasirThermal' OR $this->session->userdata('level') === 'Manager'): ?>
										<table>
										<?php 
										$no = 1;
										foreach($cetak1->result() as $g){ ?>
										<tr>
										<td> Cetakan Ke - <?php echo $no;?> </td>
										<td> &nbsp </td>
										<td> = </td>
										<td> &nbsp </td>
										<td> <?php echo $g->alasan;?> </td>
										</tr>
										<?php $no++;} ?>
										</table>
										<?php endif;?>
										<hr>
										<table align = "right">
										<tr>
										<td align = "right">
										<?php if($this->session->userdata('level') === 'Administrator' OR $this->session->userdata('level') === 'KasirA5' OR $this->session->userdata('level') === 'Manager'): ?>										
										<input type="submit" name = "submit" value = "CETAK A5" class="btn btn-sm btn-success">
										<?php endif;?>
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
