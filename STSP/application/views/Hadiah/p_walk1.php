<?php 
$total=0; $hasil=0;$hasil2=0;$hasil3=0;$ppn=0;$dpp=0;
									//$hasil4=0;$hasil5=0;
foreach ($list_tmp as $t) { 
	$subtotal = $t['qtyb']*$t['harga_beli'];
	$diskon =$t['qtyb']*$t['harga_beli']*$t['disc']/100;
	$hasil =$subtotal-$diskon;
									//$hasil2 =$hasil*$t['disc1']/100;
									//$hasil3 =$hasil-$hasil2;
									//	$hasil4 =$hasil3*$t['disc2']/100;
									//	$hasil5 =$hasil3-$hasil4;
	?>
	<?php $total=$total+$hasil; } ?> 
	<div class="form-group">
		<label class="col-sm-32 control-label">Total</label>
		<div class="col-sm-33">
			<span class="form-control" name="" readonly><div id="total_bayar"></div></span>
			<input type="hidden" name="" id="tb" readonly  autocomplete="off" class="form-control" placeholder = "Total Bayar ">
			<input type="hidden" name=""  id="total" readonly value = "<?php echo round($total); ?>" autocomplete="off" class="form-control" placeholder = "Total Bayar ">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-32 control-label">Cash</label>
		<div class="col-sm-33">
			<input type="text" name=""  id="cash" onkeypress='return check_int(event)' autocomplete="off" class="form-control" placeholder = "CASH "  tabindex="21">
			
		</div>
	</div>
	<div class="form-group"> 
		<label class="col-sm-32 control-label">Debet</label>
		<div class="col-sm-33" style="width:107px">
			<input type="text"  name=""  id="debet" autocomplete="off" class="form-control" placeholder = "DEBET "  onkeyup="copytextbox6();"  tabindex="22">
		</div>
		<div class="col-sm-33" style="width:74px">
			<input type="text"  name=""  id="bank1" autocomplete="off" class="form-control" placeholder = "BANK "  onkeyup="copytextbox7(); this.value=this.value.toUpperCase();"  tabindex="23">	
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-32 control-label">Transfer</label>
		<div class="col-sm-33" style="width:107px">
			<input type="text"  name=""  id="transfer" autocomplete="off" class="form-control" placeholder = "TRANSFER " onkeyup="copytextbox8();"  tabindex="24">
		</div>
		<div class="col-sm-33" style="width:74px">
			<input type="text"  name=""  id="bank2" autocomplete="off" class="form-control" placeholder = "BANK " onkeyup="copytextbox9(); this.value=this.value.toUpperCase();"  tabindex="25">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-32 control-label">Giro</label>
		<div class="col-sm-33">
			<input type="text" name=""  id="giro" autocomplete="off" class="form-control" placeholder = "GIRO " onkeyup="copytextbox11();"  tabindex="26">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-32 control-label">Ket Giro</label>
		<div class="col-sm-33">
			<textarea type="text" name="" onkeyup=" this.value=this.value.toUpperCase();" id="ket_giro" autocomplete="off" class="form-control" rows="1" placeholder = "KET GIRO " onkeyup="copytextbox12();"  tabindex="27"></textarea>
			
			<div class="col-sm-33">
				<br>
			</div>
		</div>
	</div>
	
	<script src="<?php echo base_url(); ?>assets/js/number.js"></script>
	
	<script>
		function copytextbox12() {
			document.getElementById('keg').value = document.getElementById('ket_giro').value;
		}
	</script>
	<script>
		function copytextbox7() {
			document.getElementById('ban1').value = document.getElementById('bank1').value;
		}
	</script>
	<script>
		function copytextbox9() {
			document.getElementById('ban2').value = document.getElementById('bank2').value;
		}
	</script>
	
	<script type="text/javascript">
		$(function(){
			$("#cash")	  .number(true);
			$("#debet")   .number(true);
			$("#transfer").number(true);
			$("#giro").number(true);
			
			$('#cash,#debet,#transfer,#giro').keyup(function(){
				var cash = $('#cash').val();
				$('#cash2').val(cash);
				var debet = $('#debet').val();
				$('#deb').val(debet);
				var transfer = $('#transfer').val();
				$('#trans').val(transfer);
				var giro = $('#giro').val();
				$('#gr').val(giro);
				var total    = $("#total").val();
				
				var tot_bayar = (total * 1)  ;
				if (tot_bayar > 0) {
					$("#total_bayar").text(tot_bayar).number(true);
					$("#tot").text(tot_bayar).number(true);
				}
				else
				{
					$("#total_bayar").text(tot_bayar);
					$("#tot").text(tot_bayar);
				}
				console.log(tot_bayar);
			});
			
			
		});
	</script>
	<script>
// memformat angka ribuan
function formatAngka(angka) {
	if (typeof(angka) != 'string') angka = angka.toString();
	var reg = new RegExp('([0-9]+)([0-9]{3})');
	while(reg.test(angka)) angka = angka.replace(reg, '$1.$2');
	return angka;
}

// nilai total ditulis langsung, bisa dari hasil perhitungan lain
var tt = document.getElementById('tt').value;,
var total = document.getElementById('total').value;,
var potongan = document.getElementById('potongan').value;,
var nominal1 = document.getElementById('nominal1').value;;

// masukkan angka total dari variabel
$('#tt').val(formatAngka(tt));

// tambah event keypress untuk input bayar
$('#potongan').on('keypress', function(e) {
	var c = e.keyCode || e.charCode;
	switch (c) {
		case 8: case 9: case 27: case 13: return;
		case 65:
		if (e.ctrlKey === true) return;
	}
	if (c < 48 || c > 57) e.preventDefault();
}).on('keyup', function() {
	var inp = $(this).val().replace(/\./g, '');
	
 // set nilai ke variabel bayar
 potongan = new Number(inp);
 nominal1 = new Number(inp);
 $(this).val(formatAngka(inp));
 
 // set kembalian, validasi
 if (potongan > tt) total = potongan - tt;
 if (tt > potongan) total = 0;
 if (nominal1 > tt) total = nominal1 - tt;
 if (tt > nominal1) total = 0;
 $('#total').val(formatAngka(total));
});
</script>



