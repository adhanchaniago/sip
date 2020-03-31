<iframe name="tampil" frameborder="0"  style="width:10px;height:5px"></iframe>
<form class="form-horizontal"  method="POST" action="<?php echo base_url();?>Pembayaran/update_cetak" target = "" enctype = "multipart/form-data">
							<div class="form-group">
								<label class="col-sm-3 control-label">Alasan Print</label>
								<div class="col-sm-5">
										<?php foreach ($cetak->result() as $r) {  ?>
										<input type="hidden" value = "<?php echo $r->no_bukti;?>" name="no_bukti" id="no_bukti" autocomplete="off" class="form-control" placeholder = "Masukan Alasan">
										<?php } ?>
										<select name="alasan_cetak" id="alasan_cetak" style = "width:300px;" class="form-control select2" autofocus tabindex="1" required > 
										<option value = "Nota Hilang / Rusak">NOTA HILANG / RUSAK</option>
										<option value = "Printer Rusak">PRINTER ERROR</option>
										<option value = "Req Pembeli"> REQ PEMBELI </option>
										</select>
										<input type="hidden"  name="cetak" value = "1" id="#" autocomplete="off" class="form-control" placeholder = "Masukan No KK">
										<hr>
										<?php if($this->session->userdata('level') === 'Administrator' OR $this->session->userdata('level') === 'KasirThermal' OR $this->session->userdata('level') === 'Manager'): ?>
										<h5> <b>History Cetak</b></h5>
										<table>
										<?php 
										$no = 1;
										foreach($cetak1->result() as $g){ ?>
										<tr>
										<td> Cetakan Ke - <?php echo $no;?> </td>
										<td> &nbsp </td>
										<td> = </td>
										<td> &nbsp </td>
										<td> <?php echo $g->alasan_cetak;?> </td>
										</tr>
										<?php $no++;} ?>
										</table>
										<?php endif;?>
										<hr>
										<?php if($this->session->userdata('level') === 'Administrator'  OR $this->session->userdata('level') === 'KasirThermal' OR $this->session->userdata('level') === 'Manager'): ?>
										<table align = "right">
										<tr>
										<td align = "right">
										<input type="submit" name = "submit" value = "CETAK THERMAL" class="btn btn-sm btn-info">
										</td>
										</tr>
										</table>
										<?php endif;?>
								</div>
							</div>
							
					</form>
					<script>
					$('#alasan_cetak').focus();
					$('select').select2();
					</script>
