<?php 
$total=0; $hasil=0;$hasil2=0;$hasil3=0;$ppn=0;$dpp=0;
$hasil4=0;$hasil5=0;$hasil6=0;$hasil7=0;$harga=0;
foreach ($list_tmp as $t) { 
	$harga = $t['handling']+$t['harga_beli'];
	$subtotal = $t['qtyb']*$harga*$t['kurs_tukar'];
	$diskon =$t['qtyb']*$t['harga_beli']*$t['kurs_tukar']*$t['disc']/100;
	$hasil =$subtotal-$diskon;
	$hasil2 =$hasil*$t['disc1']/100;
	$hasil3 =$hasil-$hasil2;
	$hasil4 =$hasil3*$t['disc2']/100;
	$hasil5 =$hasil3-$hasil4;
	$hasil6 =$hasil5*$t['ppn']/100;
	$hasil7 =$hasil5+$hasil6;
	?>
	<?php $total=$total+$hasil7; $dpp = $total / 1.1; $ppn = $dpp * 10/100; } ?> <!-- Asli $hasil5 -->
	<?php 
	$sub=0; $hasil=0;$hasil2=0;$hasil3=0;$ppn=0;$dpp=0;
	$hasil4=0;$hasil5=0;$hasil6=0;$hasil7=0;$harga=0;
	foreach ($list_tmp as $t) { 
		$harga = $t['handling']+$t['harga_beli'];
		$subtotal = $t['qtyb']*$harga;
		$diskon =$t['qtyb']*$t['harga_beli']*$t['disc']/100;
		$hasil =$subtotal-$diskon;
		$hasil2 =$hasil*$t['disc1']/100;
		$hasil3 =$hasil-$hasil2;
		$hasil4 =$hasil3*$t['disc2']/100;
		$hasil5 =$hasil3-$hasil4;
		$hasil6 =$hasil5*$t['ppn']/100;
		$hasil7 =$hasil5+$hasil6;
		?>
		<?php $sub=$sub+$hasil7; }?>
		<div class="form-group">
			<label class="col-sm-32 control-label" style="margin-top: -4px;">DPP/PPN</label>
			<div class="col-sm-33" style="width:90px">
				<span class="form-control" readonly><div id="dpp"></div></span>
			</div>
			<div class="col-sm-33" style="width:90px">
				<span class="form-control" readonly><div id="ppnan"></div></span>
			</div>
		</div>
		<div class="form-group" >
			<div class="col-sm-38">
				<input type="hidden" name="" id="ongkir1" autocomplete="off" class="form-control" onkeyup="copytextbox3(); this.value=this.value.toUpperCase();" tabindex="17" placeholder = "BIAYA LAIN">
			</div>
		</div>
		<div class="form-group" >
			<div class="col-sm-33" >
				<input type="hidden" name="" id="nominal1" autocomplete="off" class="form-control" onkeyup="copytextbox();" placeholder = "NOMINAL" tabindex="17">
				<input type="hidden" name=""  id="kurs_tukar2" readonly autocomplete="off" class="form-control" placeholder = "Kurs Tukar ">
				<input type="hidden" name=""  id="hasil" readonly autocomplete="off" class="form-control" placeholder = "Hasil ">
			</div>
		</div>
		<div class="form-group" >
			<div class="col-sm-38" >
				<input type="text" name="" id="tips" autocomplete="off" class="form-control" onkeyup="copytextbox4(); this.value=this.value.toUpperCase();" tabindex="100" placeholder = "TIPS">
			</div>
			<div class="col-sm-33" style="width: 47%;">
				<input type="text" name="" id="nominal" autocomplete="off" class="form-control" onkeyup="copytextbox2();" tabindex="101"placeholder = "NOMINAL">
			</div>
			<div class="col-sm-33" style="width: 11%;">
				<button type="button" id="tst" class="btn btn-default" style="height: 30px;">
					<span class="caret"></span>
				</button>
			</div>
		</div>
		<div class="form-group" >
			<label class="col-sm-32 control-labelstyle="margin-top: -4px;" >Total</label>
			<div class="col-sm-33" style="width: 180px">
				<span class="form-control" readonly><div id="total_bayar"></div></span>
				<input type="hidden" name="" id="tb" readonly  autocomplete="off" class="form-control" placeholder = "Total Bayar ">
				<input type="hidden" name=""  id="total" readonly  autocomplete="off" class="form-control" placeholder = "Total Bayar ">
			</div>
		</div>
		<div class="form-group" id="asing" >
			<label class="col-sm-32 control-label nilaimu" style="margin-top: -4px;">Nilai Uang Asing</label>
			<div class="col-sm-33" style="width:107px">
				<input type="text" name=""  id="kurs_tukar" readonly  autocomplete="off" class="form-control" placeholder = "NILAI ASING ">
			</div>
			<div class="col-sm-33" style="width:74px">
				<input type="text"  name="" readonly id="kode_mu" autocomplete="off" class="form-control" placeholder = "KODE MU" onkeyup="copytextbox9(); this.value=this.value.toUpperCase();">
			</div>
		</div>
		<script src="<?php echo base_url(); ?>assets/js/number.js"></script>

		<script type="text/javascript">
			$(function(){
				$('#tst').click(function(){
					$('#akun').modal('show');
				});

			});
		</script>
		<script>
			function copytextbox() {
				document.getElementById('nomin').value = document.getElementById('nominal1').value;
			}
		</script>
		<script>
			function copytextbox2() {
				document.getElementById('nomin2').value = document.getElementById('nominal').value;
			}
		</script>
		<script>
			function copytextbox3() {
				document.getElementById('ong1').value = document.getElementById('ongkir1').value;
			}
		</script>
		<script>
			function copytextbox4() {
				document.getElementById('ong2').value = document.getElementById('tips').value;
			}
		</script>

		<script type="text/javascript">

			$("#nominal").number(true);


			var kode_akun = $("#kode_akun").val();
			$("#ka_tips").val(kode_akun);



			var tol = $('#sub').val();
			$('#total').val(tol);

			var hasil    = $("#hasil").val();
			var nominal1 = $("#nominal1").val();
			var kurs  	 = $("#kurs_tukar2").val();
			var total    = $("#total").val();

			var kurs_tukar2 = $('#kurs_tukar1').val();
			$('#kurs_tukar2').val(kurs_tukar2);

			var kode_mu = $('#simbol').val();
			$('#kode_mu').val(kode_mu);

			var totalan = (total * 1)  ;
			var dpp = totalan/1.1;
			var ppn = dpp *0.1;
			var hasils = nominal1 * kurs_tukar2;
			var tot_bayar = (total * 1) + (hasils * 1)  ;
			var kurs_tukars = (tot_bayar/kurs_tukar2);
			hasil = kurs_tukars.toFixed(2);
			if (kode_mu == "RP"){
				$('#asing').hide("hidden");
			}

			if (tot_bayar > 0 ) {
				$("#total_bayar").text(tot_bayar).number(true);
				$("#tot").text(tot_bayar).number(true);
				$("#totalan").text(totalan).number(true);
				$("#sisa").text(tot_bayar).number(true);
				$("#dpp").text(dpp).number(true);
				$("#dp").text(dpp).number(true);
				$("#ppnan").text(ppn).number(true);
				$("#pp").text(ppn).number(true);
				$("#kurs_tukar").val(hasil);
				$("#hasil_kurs_tukar1").val(hasil);
				$("#hasil").val(hasils);

			}
			else
			{
				$("#total_bayar").text(tot_bayar);
				$("#tot").text(tot_bayar);
				$("#sisa").text(tot_bayar);
			}
			console.log(tot_bayar);

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
var nomin = document.getElementById('nomin').value;;
var nomin2 = document.getElementById('nomin2').value;;

// masukkan angka total dari variabel
$('#tt').val(formatAngka(tt));

// tambah event keypress untuk input bayar
$('#ongkir1').on('keypress', function(e) {
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



