<form class="form-horizontal"  method="POST" action="<?php echo base_url();?>purchase_order/alasan_edit_pembelian" enctype = "multipart/form-data">
	<div class="form-group">
		<label class="col-sm-3 control-label">Alasan Edit</label>
		<div class="col-sm-5">
			<?php foreach ($edit->result() as $r) {  ?>
				<input type="hidden" value = "<?php echo $r->no_beli; ?>" name="no_beli" id="#" autocomplete="off" class="form-control" placeholder = "Masukan Alasan">
			<?php } ?>
			<select name="alasan_edit" id="alasan_edit" style = "width:300px;" class="form-control select2" autofocus tabindex="1" required>
				<option value = "Menambah Biaya Lain - Lain">MENAMBAH BIAYA LAIN - LAIN</option>
				<option value = "Salah Memasukan Harga Barang">SALAH MEMASUKAN HARGA BARANG</option>
			</select>
			<input type="hidden"  name="edit" value = "1" id="#" autocomplete="off" class="form-control" placeholder = "Masukan No KK">
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
						<td> <?php echo $g->alasan_edit;?> (<?php echo $g->user;?>)</td>
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
