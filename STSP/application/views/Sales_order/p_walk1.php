		
<?php 
$total=0; $hasil=0;$hasil2=0;$hasil3=0;$ppn=0;$dpp=0;$kom=0;$komisi=0;$komisi2=0;
									//$hasil4=0;$hasil5=0;
foreach ($list_tmp as $t) { 
	$komisi = $t['harga_beli'] - $t['modal'];
	$komisi2 = $komisi * $t['komisi']/100 * $t['qtyb'];
	$subtotal = $t['qtyb']*$t['harga_beli'];
	$diskon =$t['qtyb']*$t['harga_beli']*$t['disc']/100;
	$hasil =$subtotal-$diskon;
	$hasil2 =$hasil*$t['disc1']/100;
	$hasil3 =$hasil-$hasil2;
								//	$hasil4 =$hasil3*$t['disc2']/100;
								//	$hasil5 =$hasil3-$hasil4;
	?>
	<?php 
	$total=$total+$hasil3; $dpp = $total / 1.1; $ppn = $dpp * 10/100;
	$kom=$kom+$komisi2; 
} 
?> <!-- Asli $hasil5 -->
<?php 
$sub=0;$hasil=0;$hasil2=0;$hasil3=0;
foreach ($list_retur as $r) { 
	$subtotal = $r['qtyb']*$r['harga_beli'];
	$diskon =$r['qtyb']*$r['harga_beli']*$r['disc']/100;
	$hasil =$subtotal-$diskon;
	$hasil2 =$hasil*$r['disc1']/100;
	$hasil3 =$hasil-$hasil2;
	?>
	<?php 
	$sub=$sub+$hasil3; 
}?>
<div class="form-group">
	<div class="col-sm-33">
		<input type="hidden" id="potongan" name = "" autocomplete="off" autofocus class="form-control" placeholder = "POTONGAN HARGA" tabindex="17" required>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-33" style="width:90px">
		<span class="form-control" style="display:none" readonly><div id="dpp"></div></span>
	</div>
	<div class="col-sm-33"style="width:90px">
		<span class="form-control" style="display:none" readonly><div id="ppn"></div></span>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-38">
		<input type="hidden" name="" id="ongkir1" autocomplete="off" class="form-control" onkeyup="copytextbox3(); this.value=this.value.toUpperCase();" tabindex="17" placeholder = "BIAYA LAIN">
		<input type="hidden" name="" id="ongkir2" autocomplete="off" class="form-control" onkeyup="copytextbox4(); this.value=this.value.toUpperCase();"  tabindex="19">										
	</div>
</div>
<div class="form-group">
	<div class="col-sm-33" >
		<input type="hidden" name="" id="nominal1" autocomplete="off" class="form-control" onkeyup="copytextbox();" tabindex="18"placeholder = "NOMINAL">
		<input type="hidden" name="" id="nominal2" autocomplete="off" class="form-control" onkeyup="copytextbox2();"  tabindex="20">										
	</div>
</div>
<div class="form-group">
	<div class="col-sm-33">
		<span class="form-control" name="" style="display:none;" readonly><div id="total_bayar" ></div></span>
		<input type="hidden" name="" id="tb" readonly  autocomplete="off" class="form-control" placeholder = "Total Bayar ">
		<input type="hidden" name=""  id="total" readonly value = "<?php echo round($total-$sub); ?>" autocomplete="off" class="form-control" placeholder = "Total Bayar ">
		<input type="hidden" name=""  id="belanja" readonly value = "<?php echo round($total); ?>" autocomplete="off" class="form-control" placeholder = "Total Bayar ">
		<input type="hidden" name=""  id="retur" readonly value = "<?php echo round($sub); ?>" autocomplete="off" class="form-control" placeholder = "Total Bayar ">
		<input type="hidden" name=""  id="komis"  value = "<?php echo round($kom); ?>"onkeypress='return check_int(event)' autocomplete="off" class="form-control" placeholder = "CASH "  tabindex="21">
	</div>
</div>
<div class="form-group" hidden="">
	<label class="col-sm-32 control-label">Cash</label>
	<div class="col-sm-33">
		<input type="text" name=""  id="cash" onkeypress='return check_int(event)' autocomplete="off" class="form-control" placeholder = "CASH "  tabindex="21">

	</div>
</div>
<div class="form-group" hidden=""> 
	<label class="col-sm-32 control-label">Debet</label>
	<div class="col-sm-33" style="width:107px">
		<input type="text"  name=""  id="debet" autocomplete="off" class="form-control" placeholder = "DEBET "  onkeyup="copytextbox6();"  tabindex="22">
	</div>
	<div class="col-sm-33" style="width:74px">
		<input type="text"  name=""  id="bank1" autocomplete="off" class="form-control" placeholder = "BANK "  onkeyup="copytextbox7(); this.value=this.value.toUpperCase();"  tabindex="23">	
	</div>
</div>
<div class="form-group" hidden="">
	<label class="col-sm-32 control-label">Transfer</label>
	<div class="col-sm-33" style="width:107px">
		<input type="text"  name=""  id="transfer" autocomplete="off" class="form-control" placeholder = "TRANSFER " onkeyup="copytextbox8();"  tabindex="24">
	</div>
	<div class="col-sm-33" style="width:74px">
		<input type="text"  name=""  id="bank2" autocomplete="off" class="form-control" placeholder = "BANK "  onkeyup="copytextbox7(); this.value=this.value.toUpperCase();"  tabindex="25">	
	</div>
</div>
<input type="hidden" name=""  id="giro" autocomplete="off" class="form-control" placeholder = "GIRO " onkeyup="copytextbox11();"  tabindex="26">
<input type="hidden" name=""  readonly id="dpt3" autocomplete="off" class="form-control " placeholder = "DEPOSIT " onkeyup="copytextbox12();">

<div class="form-group" hidden="">
	<label class="col-sm-32 control-label">Kembali</label>
	<div class="col-sm-33">
		<span class="form-control" name="" readonly ><div id="kembali"></div></span>
	</div>
</div>
<div class="form-group" hidden="">
	<label class="col-sm-32 control-label">Sisa Tagihan</label>
	<div class="col-sm-33">
		<span class="form-control" name="" readonly ><div id="sisa"></div></span>
	</div>
</div>
<textarea style = "display:none;" type="text" name=""  id="ket_giro" autocomplete="off" class="form-control" rows="1" placeholder = "KET GIRO " onkeyup="copytextbox102();this.value=this.value.toUpperCase();"  tabindex="27"></textarea>

<div class="col-sm-33">
	<br>
</div>

<script src="<?php echo base_url(); ?>assets/js/number.js"></script>
		<script type="text/javascript">
			$(function(){

					var tol = $('#total').val();
					$('#tot').val(tol);
					$('#total_bayar').val(tol);
					
			});
</script>



