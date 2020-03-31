<?php 
$total=0; $hasil=0;$hasil2=0;$hasil3=0;$ppn=0;$dpp=0;
									//$hasil4=0;$hasil5=0;
foreach ($list_tmp as $t) { 
	$subtotal = $t['qtyb']*$t['harga_beli'];
	$diskon =$t['qtyb']*$t['harga_beli']*$t['disc']/100;
	$hasil =$subtotal-$diskon;
	$hasil2 =$hasil*$t['disc1']/100;
	$hasil3 =$hasil-$hasil2;
								//	$hasil4 =$hasil3*$t['disc2']/100;
								//	$hasil5 =$hasil3-$hasil4;
	?>
	<?php $total=$total+$hasil3; $dpp = $total / 1.1; $ppn = $dpp * 10/100; } ?> <!-- Asli $hasil5 -->
	<?php 
	$sub=0;$hasil=0;$hasil2=0;$hasil3=0;
	foreach ($retur_tmp as $r) { 
		$subtotal = $r['qtyb']*$r['harga_beli'];
		$diskon =$r['qtyb']*$r['harga_beli']*$r['disc']/100;
		$hasil =$subtotal-$diskon;
		$hasil2 =$hasil*$r['disc1']/100;
		$hasil3 =$hasil-$hasil2;
		?>
		<?php $sub=$sub+$hasil3; }?>
		<div class="form-group" hidden="">
			<label class="col-sm-32 control-label">Potongan Harga</label>
			<div class="col-sm-33">
				<input type="text" id="potongan" name = "" autocomplete="off" autofocus class="form-control" placeholder = "POTONGAN HARGA" tabindex="17" required>
			</div>
		</div>
		<div class="form-group" hidden="">
			<label class="col-sm-32 control-label">DPP/PPN</label>
			<div class="col-sm-33" style="width:90px">
				<span class="form-control" readonly><div id="dpp"></div></span>
			</div>
			<div class="col-sm-33"style="width:90px">
				<span class="form-control" readonly><div id="ppn"></div></span>
			</div>
		</div>
		<div class="form-group" hidden="">
			<div class="col-sm-38">
				<input type="text" name="" id="ongkir1" autocomplete="off" class="form-control" onkeyup="copytextbox3(); this.value=this.value.toUpperCase();" tabindex="17" placeholder = "BIAYA LAIN">
				<input type="hidden" name="" id="ongkir2" autocomplete="off" class="form-control" onkeyup="copytextbox4(); this.value=this.value.toUpperCase();"  tabindex="19">										
			</div>
		</div>
		<div class="form-group" hidden="">
			<div class="col-sm-33" >
				<input type="text" name="" id="nominal1" autocomplete="off" class="form-control" onkeyup="copytextbox();" tabindex="18"placeholder = "NOMINAL">
				<input type="hidden" name="" id="nominal2" autocomplete="off" class="form-control" onkeyup="copytextbox2();"  tabindex="20">										
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-33">
				<span class="form-control" name="" style="display:none" readonly><div id="total_bayar"></div></span>
				<input type="hidden" name="" id="tb" readonly  autocomplete="off" class="form-control" placeholder = "Total Bayar ">
				<input type="hidden" name=""  id="total" readonly value = "<?php echo round($sub); ?>" autocomplete="off" class="form-control" placeholder = "Total Bayar ">
				<input type="hidden" name=""  id="belanja" readonly value = "<?php echo round($total); ?>" autocomplete="off" class="form-control" placeholder = "Total Bayar ">
				<input type="hidden" name=""  id="retur" readonly value = "<?php echo round($sub); ?>" autocomplete="off" class="form-control" placeholder = "Total Bayar ">
			</div>
		</div>
		<div class="form-group cash">
			<label class="col-sm-32 control-label" hidden = "">Cash</label>
			<div class="col-sm-33">
				<input type="hidden" name=""  id="cash" onkeypress='return check_int(event)' autocomplete="off" class="form-control" placeholder = "CASH "  tabindex="21">

			</div>
		</div>
		<div class="form-group cashdis">
			<label class="col-sm-32 control-label" hidden = "">Cash</label>
			<div class="col-sm-33">
				<input type="hidden" name="" readonly="" id="cash" onkeypress='return check_int(event)' autocomplete="off" class="form-control" placeholder = "CASH "  tabindex="21">

			</div>
		</div>
		<div class="form-group transfer">
			<label class="col-sm-32 control-label" hidden = "">Transfer</label>
			<div class="col-sm-33" style="width:107px">
				<input type="hidden"  name=""  id="transfer" autocomplete="off" class="form-control" placeholder = "TRANSFER " onkeyup="copytextbox8();"  tabindex="24">
			</div>
			<div class="col-sm-33" style="width:74px">
				<input type="hidden"  name=""  id="bank2" autocomplete="off" class="form-control" placeholder = "BANK " onkeyup="copytextbox9(); this.value=this.value.toUpperCase();"  tabindex="25">
			</div>
		</div>
		<div class="form-group transferdis">
			<label class="col-sm-32 control-label" hidden = "">Transfer</label>
			<div class="col-sm-33" style="width:107px">
				<input type="hidden"  name=""  id="transfer" readonly="" autocomplete="off" class="form-control" placeholder = "TRANSFER " onkeyup="copytextbox8();"  tabindex="24">
			</div>
			<div class="col-sm-33" style="width:74px">
				<input type="hidden"  name="" readonly="" id="bank2" autocomplete="off" class="form-control" placeholder = "BANK " onkeyup="copytextbox9(); this.value=this.value.toUpperCase();"  tabindex="25">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-33">
				<textarea style="display:none;" type="text" name="keterangan"  id="ket_giro" autocomplete="off" class="form-control" rows="1" placeholder = "KETERANGAN " onkeyup="copytextbox12();"  tabindex="27"></textarea>

				<div class="col-sm-33">
					<br>
				</div>
			</div>
		</div>

		<script src="<?php echo base_url(); ?>assets/js/number.js"></script>
		<script type="text/javascript">
			$(function(){
					var total = $('#total').val();
					$('#tot').val(total);

			console.log(tb);
		});
</script>



