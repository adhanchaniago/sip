<?php 
$total=0; $hasil=0;$hasil2=0;$hasil3=0;$ppn=0;$dpp=0;$total1=0;
$hasil4=0;$hasil5=0;$hasil6=0;$hasil7=0;
foreach ($list_tmp as $t) { 
	$subtotal = $t['qtyb']*$t['harga_beli']*$t['kurs_tukar'];
	$diskon =$t['qtyb']*$t['harga_beli']*$t['disc']/100;
	$hasil =$subtotal-$diskon;
	$hasil2 =$hasil*$t['disc1']/100;
	$hasil3 =$hasil-$hasil2;
	$hasil4 =$hasil3*$t['disc2']/100;
	$hasil5 =$hasil3-$hasil4;
	$hasil6 =$hasil5*$t['ppn']/100;
	$hasil7 =$hasil5+$hasil6;
	?>
	<?php $total=$total+$hasil7;$total1=$total1+$hasil7/$t['kurs_tukar']; $dpp = $total / 1.1; $ppn = $dpp * 10/100; } ?> <!-- Asli $hasil5 -->

	<div class="form-group">
		<label class="col-sm-32 control-label">Potongan Harga</label>
		<div class="col-sm-33">
			<input type="text" id="potongan" name = "" autocomplete="off" autofocus class="form-control" placeholder = "POTONGAN HARGA"  tabindex="12">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-32 control-label">DPP/PPN</label>
		<div class="col-sm-33" style="width:90px">
			<span class="form-control" readonly><div id="dpp"></div></span>
		</div>
		<div class="col-sm-33"style="width:90px">
			<span class="form-control" readonly><div id="ppnan"></div></span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-32 control-label">Total</label>
		<div class="col-sm-33">
			<span class="form-control" name=""  readonly><div id="total_bayar"></div></span>
			<input type="hidden" name="" id="tb" readonly  autocomplete="off" class="form-control" placeholder = "Total Bayar ">
			<input type="hidden" name=""  id="tt" readonly value = "<?php echo round($total); ?>" autocomplete="off" class="form-control" placeholder = "Total Bayar ">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-32 control-label">Total uang Asing</label>
		<div class="col-sm-33">
			<span class="form-control" name=""  readonly><div id="total_bayar1"></div></span>
			<input type="hidden" name="" value = "<?php echo $total1; ?>"id="kurs_tukar" readonly  autocomplete="off" class="form-control" placeholder = "Total Bayar ">
		</div>
	</div>
	<div class="form-group cash">
		<label class="col-sm-32 control-label">Cash</label>
		<div class="col-sm-33">
			<input type="text" name=""  id="cash" onkeypress='return check_int(event)' autocomplete="off" class="form-control" placeholder = "CASH ">
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
			<input type="text"  name=""  id="transfer" autocomplete="off" class="form-control" placeholder = "TRANSFER " onkeyup="copytextbox8();">
		</div>
		<div class="col-sm-33" style="width:74px">
			<input type="text"  name=""  id="bank2" autocomplete="off" class="form-control" placeholder = "BANK " onkeyup="copytextbox9(); this.value=this.value.toUpperCase();">
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

	<script src="<?php echo base_url(); ?>assets/js/number.js"></script>
	<script>
		function copytextbox9() {
			document.getElementById('ban2').value = document.getElementById('bank2').value;
		}
	</script>

	<script type="text/javascript">
		var sisatagihan		=$('#sisatagihan').val();

				if (sisatagihan > 0) {
					$('.cash').hide("hidden");
					$('.transfer').hide("hidden");
				}else{
					$('.cashdis').hide("hidden");
					$('.transferdis').hide("hidden");
				}

		$(function(){
			$("#cash")	  .number(true);
			$("#transfer").number(true);


			$('#potongan,#cash,#transfer').keyup(function(){
				var potongan = $('#potongan').val();
				$('#potongan2').val(potongan);

				var cash = $('#cash').val();
				$('#cash2').val(cash);

				var transfer = $('#transfer').val();
				$('#trans').val(transfer);

				var total    = $("#tt").val();
				var total1   = $("#kurs_tukar").val();
				var pot 	 = $("#potongan2").val();

				var totot = (total * 1);
				var totot1 = (total1 * 1);
				var tot_bayar = (total * 1) - (pot * 1) ;
				var tot_bayar1 = (total1 * 1) - (pot * 1) ;
				var dpp = tot_bayar/1.1;
				var ppn = dpp *0.1;
				if (tot_bayar > 0) {
					$("#kurs_tukaran").text(tot_bayar1);
					$("#total_bayar1").text(tot_bayar1);
					$("#total_bayar").text(tot_bayar).number(true);
					$("#bayar").text(totot);
					$("#tot").text(tot_bayar);
					$("#dpp").text(dpp).number(true);
					$("#dp").text(Math.round(dpp));
					$("#ppnan").text(ppn).number(true);
					$("#pp").text(Math.round(ppn));
				}
				else
				{
					$("#total_bayar").text(0);
					$("#tot").text(0);
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


