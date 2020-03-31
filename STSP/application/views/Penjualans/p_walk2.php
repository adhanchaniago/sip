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
		<div class="form-group">
			<label class="col-sm-32 control-label">Potongan Harga</label>
			<div class="col-sm-33">
				<input type="text" id="potongan" name = "" autocomplete="off" autofocus class="form-control" placeholder = "POTONGAN HARGA" tabindex="17" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-32 control-label">DPP/PPN</label>
			<div class="col-sm-33" style="width:90px">
				<span class="form-control" readonly><div id="dpp"></div></span>
			</div>
			<div class="col-sm-33"style="width:90px">
				<span class="form-control" readonly><div id="ppn"></div></span>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-38">
				<input type="text" name="" id="ongkir1" autocomplete="off" class="form-control" onkeyup="copytextbox3(); this.value=this.value.toUpperCase();" tabindex="17" placeholder = "BIAYA LAIN">
				<input type="hidden" name="" id="ongkir2" autocomplete="off" class="form-control" onkeyup="copytextbox4(); this.value=this.value.toUpperCase();"  tabindex="19">										
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-33" >
				<input type="text" name="" id="nominal1" autocomplete="off" class="form-control" onkeyup="copytextbox();" tabindex="18"placeholder = "NOMINAL">
				<input type="hidden" name="" id="nominal2" autocomplete="off" class="form-control" onkeyup="copytextbox2();"  tabindex="20">										
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-32 control-label">Total</label>
			<div class="col-sm-33">
				<span class="form-control" name="" readonly><div id="total_bayar"></div></span>
				<input type="hidden" name="" id="tb" readonly  autocomplete="off" class="form-control" placeholder = "Total Bayar ">
				<input type="hidden" name=""  id="total" readonly value = "<?php echo round($sub); ?>" autocomplete="off" class="form-control" placeholder = "Total Bayar ">
				<input type="hidden" name=""  id="belanja" readonly value = "<?php echo round($total); ?>" autocomplete="off" class="form-control" placeholder = "Total Bayar ">
				<input type="hidden" name=""  id="retur" readonly value = "<?php echo round($sub); ?>" autocomplete="off" class="form-control" placeholder = "Total Bayar ">
			</div>
		</div>
		<div class="form-group cash">
			<label class="col-sm-32 control-label">Cash</label>
			<div class="col-sm-33">
				<input type="text" name=""  id="cash" onkeypress='return check_int(event)' autocomplete="off" class="form-control" placeholder = "CASH "  tabindex="21">

			</div>
		</div>
		<div class="form-group cashdis" hidden = "">
			<label class="col-sm-32 control-label">Cash</label>
			<div class="col-sm-33">
				<input type="text" name="" readonly="" id="cash" onkeypress='return check_int(event)' autocomplete="off" class="form-control" placeholder = "CASH "  tabindex="21">

			</div>
		</div>
		<div class="form-group transfer">
			<label class="col-sm-32 control-label">Transfer</label>
			<div class="col-sm-33" style="width:107px">
				<input type="text"  name=""  id="transfer" autocomplete="off" class="form-control" placeholder = "TRANSFER " onkeyup="copytextbox8();"  tabindex="24">
			</div>
			<div class="col-sm-33" style="width:74px">
				<input type="text"  name=""  id="bank2" autocomplete="off" class="form-control" placeholder = "BANK " onkeyup="copytextbox9(); this.value=this.value.toUpperCase();"  tabindex="25">
			</div>
		</div>
		<div class="form-group transferdis" hidden = "">
			<label class="col-sm-32 control-label">Transfer</label>
			<div class="col-sm-33" style="width:107px">
				<input type="text"  name=""  id="transfer" readonly="" autocomplete="off" class="form-control" placeholder = "TRANSFER " onkeyup="copytextbox8();"  tabindex="24">
			</div>
			<div class="col-sm-33" style="width:74px">
				<input type="text"  name="" readonly="" id="bank2" autocomplete="off" class="form-control" placeholder = "BANK " onkeyup="copytextbox9(); this.value=this.value.toUpperCase();"  tabindex="25">
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
		<script>
			function copytextbox2() {
				document.getElementById('nom').value = document.getElementById('nominal2').value;
			}
		</script>
		<script>
			function copytextbox3() {
				document.getElementById('ong1').value = document.getElementById('ongkir1').value;
			}
		</script>
		<script>
			function copytextbox4() {
				document.getElementById('ong2').value = document.getElementById('ongkir2').value;
			}
		</script>
		<script>
			function copytextbox6() {
				document.getElementById('deb').value = document.getElementById('debet').value;
			}
		</script>
		<script>
			function copytextbox7() {
				document.getElementById('ban1').value = document.getElementById('bank1').value;
			}
		</script>
		<script>
			function copytextbox8() {
				document.getElementById('trans').value = document.getElementById('transfer').value;
			}
		</script>
		<script>
			function copytextbox9() {
				document.getElementById('ban2').value = document.getElementById('bank2').value;
			}
		</script>
		<!--<script>
			function copytextbox10() {
			document.getElementById('tot').value = document.getElementById('total_bayar').value;
			}
		</script>-->
		<script>
			function copytextbox11() {
				document.getElementById('gr').value = document.getElementById('giro').value;
			}
		</script>
		<script>
			function copytextbox12() {
				document.getElementById('keg').value = document.getElementById('ket_giro').value;
			}
		</script>
		<script>
			function copytextbox13() {
				document.getElementById('kem').value = document.getElementById('kembali').value;
			}
		</script>
		<script>
			function copytextbox14() {
				document.getElementById('sis').value = document.getElementById('sisa').value;
			}
		</script>
		<script>
			function copytextbox14() {
				document.getElementById('siso').value = document.getElementById('siso').value;
			}
		</script>
		<script type="text/javascript">
			$(function(){
				var sisatagihan		=$('#sisatagihan').val();

				if (sisatagihan > 0) {
					$('.cash').hide("hidden");
					$('.transfer').hide("hidden");
				}else{
					$('.cashdis').hide("hidden");
					$('.transferdis').hide("hidden");
				}
				$("#potongan").number(true);
				$("#nominal1").number(true);
				$("#nominal2").number(true);
				$("#cash")	  .number(true);
				$("#debet")   .number(true);
				$("#transfer").number(true);
				$("#dp").number(true);
				$("#giro").number(true);

				$('#potongan').keyup(function(){
					var potongan = $('#potongan').val();
					$('#potongan2').val(potongan);

					var tt = $("#total").val();
					var pt = $("#potongan2").val();
			//var dpp = $("#dpp").val();
			//var ppn = $("#ppn").val();
			
			var tb = (tt * 1) - (pt * 1)  ;
			var dpp = tb/1.1;
			var ppn = dpp *0.1;
			if (tb > 0) {
				$("#tb").text(tb).number(true);
				$("#kembali").text(tb).number(true);
				$("#dpp").text(dpp).number(true);
				$("#dp").text(Math.round(dpp));
				$("#ppn").text(ppn).number(true);
				$("#pp").text(Math.round(ppn));
				
			}
			else
			{
				$("#tb").text(0);
			}
			console.log(tb);
		});
		var potongan = $('#potongan').val();
					$('#potongan2').val(potongan);

					var tt = $("#total").val();
					var pt = $("#potongan2").val();
			//var dpp = $("#dpp").val();
			//var ppn = $("#ppn").val();
			
			var tb = (tt * 1) - (pt * 1)  ;
			var dpp = tb/1.1;
			var ppn = dpp *0.1;
			if (tb > 0) {
				$("#tb").text(tb).number(true);
				$("#kembali").text(tb).number(true);
				$("#dpp").text(dpp).number(true);
				$("#dp").text(Math.round(dpp));
				$("#ppn").text(ppn).number(true);
				$("#pp").text(Math.round(ppn));
				
			}
			else
			{
				$("#tb").text(0);
			}
			console.log(tb);
				$('#potongan,#nominal1,#nominal2').keyup(function(){
					var potongan = $('#potongan').val();
					$('#potongan2').val(potongan);

					var total    = $("#total").val();
					var belanja  = $("#belanja").val();
					var retur  	= $("#retur").val();
					var pot 	 = $("#potongan2").val();
					var nominal  = $("#nominal1").val();
					var nominal2 = $("#nominal2").val();

					$("#nomino").text(nominal);

					var belanja = (belanja* 1) ;
					var tol 	= (total* 1) ;
					var tot_bayar = (total * 1) - (pot * 1) - (nominal * 1)- (nominal2 * 1)  ;
					if (tot_bayar > 0) {
						$("#total_bayar").text(tot_bayar).number(true);
						$("#tot").text(tot_bayar);
						$("#totalan").text(tol);
						$("#total_belanja").text(belanja).number(true);
						$("#total_retur").text(retur).number(true);
					}
					else
					{
						$("#total_bayar").text(tot_bayar);
						$("#tot").text(tot_bayar);
					}
					console.log(tot_bayar);
				});
				var potongan = $('#potongan').val();
					$('#potongan2').val(potongan);

					var total    = $("#total").val();
					var belanja  = $("#belanja").val();
					var retur  	= $("#retur").val();
					var pot 	 = $("#potongan2").val();
					var nominal  = $("#nominal1").val();
					var nominal2 = $("#nominal2").val();

					$("#nomino").text(nominal);

					var belanja = (belanja* 1) ;
					var tol 	= (total* 1) ;
					var tot_bayar = (total * 1) - (pot * 1) - (nominal * 1)- (nominal2 * 1)  ;
					if (tot_bayar > 0) {
						$("#total_bayar").text(tot_bayar).number(true);
						$("#tot").text(tot_bayar);
						$("#totalan").text(tol);
						$("#total_belanja").text(belanja).number(true);
						$("#total_retur").text(retur).number(true);
					}
					else
					{
						$("#total_bayar").text(tot_bayar);
						$("#tot").text(tot_bayar);
					}
					console.log(tot_bayar);
				$('#cash,#potongan,#debet,#transfer,#giro').keyup(function(){
					var cash = $('#cash').val();
					$('#cash2').val(cash);

					var cash 	 = $("#cash2").val();
					var total    = $("#total").val();
					var pot 	 = $("#potongan2").val();
					var nominal  = $("#nominal1").val();
					var nominal2 = $("#nominal2").val();
					var debet 	 = $("#debet").val();
					var transfer = $("#transfer").val();
					var giro = $("#giro").val();

					var tot_bayar = (total * 1) - (pot * 1) + (nominal * 1)+ (nominal2 * 1)  ;
					var tb_bayar = parseInt(tot_bayar * 1) - parseInt(cash * 1) - parseInt(debet * 1) - parseInt(transfer * 1) - parseInt(giro * 1)  ;
					if(tb_bayar < 0){
						$("#kembali").text(tb_bayar).number(true);
						$("#kem").text(tb_bayar).number(true);
					}
					else
					{
						$("#kembali").text(0);
						$("#kem").text(0);
					}
					console.log(tb_bayar);
				});
				var cash = $('#cash').val();
					$('#cash2').val(cash);

					var cash 	 = $("#cash2").val();
					var total    = $("#total").val();
					var pot 	 = $("#potongan2").val();
					var nominal  = $("#nominal1").val();
					var nominal2 = $("#nominal2").val();
					var debet 	 = $("#debet").val();
					var transfer = $("#transfer").val();
					var giro = $("#giro").val();

					var tot_bayar = (total * 1) - (pot * 1) + (nominal * 1)+ (nominal2 * 1)  ;
					var tb_bayar = parseInt(tot_bayar * 1) - parseInt(cash * 1) - parseInt(debet * 1) - parseInt(transfer * 1) - parseInt(giro * 1)  ;
					if(tb_bayar < 0){
						$("#kembali").text(tb_bayar).number(true);
						$("#kem").text(tb_bayar).number(true);
					}
					else
					{
						$("#kembali").text(0);
						$("#kem").text(0);
					}
					console.log(tb_bayar);
				$('#cash,#potongan,#debet,#transfer,#giro,#nominal1').keyup(function(){
					var cash = $('#cash').val();
					$('#cash2').val(cash);

					var cash 	 = $("#cash2").val();
					var total    = $("#total").val();
					var pot 	 = $("#potongan2").val();
					var nominal  = $("#nominal1").val();
					var nominal2 = $("#nominal2").val();
					var debet 	 = $("#debet").val();
					var transfer = $("#transfer").val();
					var giro 	 = $("#giro").val();

					var tot_bayar = (total * 1) - (pot * 1) + (nominal * 1)+ (nominal2 * 1)  ;
					var tb_bayar = (tot_bayar * 1) - (cash * 1) - (debet * 1) - (transfer * 1) - (giro * 1)  ;
					if (tb_bayar > 0) {
						$("#sisa").text(tb_bayar).number(true);
						$("#sis").text(tb_bayar).number(true);
						$("#siso").text(tb_bayar).number(true);
					}
					else
					{
						$("#sisa").text(0);
						$("#sis").text(0);
						$("#siso").text(0);
					}
					console.log(tb_bayar);
				});
				var cash = $('#cash').val();
					$('#cash2').val(cash);

					var cash 	 = $("#cash2").val();
					var total    = $("#total").val();
					var pot 	 = $("#potongan2").val();
					var nominal  = $("#nominal1").val();
					var nominal2 = $("#nominal2").val();
					var debet 	 = $("#debet").val();
					var transfer = $("#transfer").val();
					var giro 	 = $("#giro").val();

					var tot_bayar = (total * 1) - (pot * 1) + (nominal * 1)+ (nominal2 * 1)  ;
					var tb_bayar = (tot_bayar * 1) - (cash * 1) - (debet * 1) - (transfer * 1) - (giro * 1)  ;
					if (tb_bayar > 0) {
						$("#sisa").text(tb_bayar).number(true);
						$("#sis").text(tb_bayar).number(true);
						$("#siso").text(tb_bayar).number(true);
					}
					else
					{
						$("#sisa").text(0);
						$("#sis").text(0);
						$("#siso").text(0);
					}
					console.log(tb_bayar);
				$('#dp').keyup(function(){
					var dp = $('#dp').val();
					$('#dp2').val(dp);

					var dp = $("#dp2").val();
					var total    = $("#total").val();
					var pot 	 = $("#potongan2").val();
					var nominal  = $("#nominal1").val();
					var nominal2 = $("#nominal2").val();

					var tot_bayar = (total * 1) - (pot * 1) + (nominal * 1)+ (nominal2 * 1)  ;
					var down_payment = (tot_bayar * 1) - (dp * 1) ;
					if (down_payment > 0) {
						$("#sisa_dp").text(down_payment).number(true);
					}
					else
					{
						$("#sisa_dp").text(0);
					}
					console.log(down_payment);
				});
				var dp = $('#dp').val();
					$('#dp2').val(dp);

					var dp = $("#dp2").val();
					var total    = $("#total").val();
					var pot 	 = $("#potongan2").val();
					var nominal  = $("#nominal1").val();
					var nominal2 = $("#nominal2").val();

					var tot_bayar = (total * 1) - (pot * 1) + (nominal * 1)+ (nominal2 * 1)  ;
					var down_payment = (tot_bayar * 1) - (dp * 1) ;
					if (down_payment > 0) {
						$("#sisa_dp").text(down_payment).number(true);
					}
					else
					{
						$("#sisa_dp").text(0);
					}
					console.log(down_payment);

			});
		</script>
		<script>
			$('#cash').keyup(function(){
				var cash = $('#cash').val();
				$('#cash3').valcash);
			
			var cash    = $("#cash3").val();
			var total    = $("#total").val();
			var pot 	 = $("#potongan2").val();
			var nominal  = $("#nominal1").val();
			var nominal2 = $("#nominal2").val();
			
			var tot_bayar = (total * 1) - (pot * 1) + (nominal * 1)+ (nominal2 * 1)  ;
			if(parseInt(cash) >= parseInt(tot_bayar)){
				var Selisih = parseInt(cash) - parseInt(tot_bayar);
				$("#kembali").text(Selisih).number(true);
			} else {
				$("#kembali").text(0);
			}
			console.log(Selisih);
		});
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



