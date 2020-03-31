								<?php 
								$total=0; $hasil=0;$hasil2=0;$hasil3=0;$ppn=0;$dpp=0;$totalan=0;$kode_mu=0;
								$hasil4=0;$hasil5=0;$hasil6=0;$hasil7=0;
								foreach ($list_tmp as $t) { 
									$subtotal = $t['qtyb']*$t['harga_beli'];
									$diskon =$t['qtyb']*$t['harga_beli']*$t['disc']/100;
									$hasil =$subtotal-$diskon;
									$hasil2 =$hasil*$t['disc1']/100;
									$hasil3 =$hasil-$hasil2;
									$hasil4 =$hasil3*$t['disc2']/100;
									$hasil5 =$hasil3-$hasil4;
									$hasil6 =$hasil5*$t['ppn']/100;
									$hasil7 =$hasil5+$hasil6;
									$kode_mu = $t['kode_mu'];
									?>
									<?php $total=$total+$hasil5*$t['kurs_tukar'];$totalan=$totalan+$hasil5; $dpp = $total / 1.1; $ppn = $dpp * 10/100; } ?> <!-- Asli $hasil5 -->
									
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
										<div class="col-sm-38">
											<input type="hidden" name="" id="ongkir1" autocomplete="off" class="form-control" onkeyup="copytextbox3(); this.value=this.value.toUpperCase();" tabindex="17" placeholder = "BIAYA LAIN">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-33" >
											<input type="hidden" name="" id="nominal1" autocomplete="off" class="form-control" onkeyup="copytextbox();" placeholder = "NOMINAL" tabindex="17">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-38">
											<input type="text" name="" id="tips" autocomplete="off" class="form-control" onkeyup="copytextbox4(); this.value=this.value.toUpperCase();" tabindex="18" placeholder = "TIPS">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-33" >
											<input type="text" name="" id="nominal" autocomplete="off" class="form-control" onkeyup="copytextbox2();" tabindex="18"placeholder = "NOMINAL">
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-32 control-label">&nbsp &nbsp Total</label>
										<div class="col-sm-33">
											<span class="form-control" name=""  readonly><div id="total_bayar"></div></span>
											<input type="hidden" name="" id="tb" readonly  autocomplete="off" class="form-control" placeholder = "Total Bayar ">
											<input type="hidden" name=""  id="total" readonly value = "<?php echo $total; ?>" autocomplete="off" class="form-control" placeholder = "Total Bayar 1">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-32 control-label">Total Nilai Asing</label>
										<div class="col-sm-33">
											<span class="form-control" name=""  readonly style="width:104px;"><div id="total_bayar1"></div></span>
											<div class="col-sm-33" style="width:74px;margin-top: -30px;margin-left: 106px;">
												<input type="text"  name="" value = "<?php echo $kode_mu;?>" readonly id="kode_mu" autocomplete="off" class="form-control" placeholder = "KODE MU" onkeyup="copytextbox9(); this.value=this.value.toUpperCase();">
											</div>
											<input type="hidden" name="" value = "<?php echo $totalan; ?>"id="kurs_tukar" readonly  autocomplete="off" class="form-control" placeholder = "Total Bayar 2">
										</div>
									</div>
									<script src="<?php echo base_url(); ?>assets/js/number.js"></script>
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
										$(function(){
											$("#nominal1").number(true);
											$("#nominal").number(true);


											$('#tips,#nominal1,#nominal').keyup(function(){
												var total    = $("#total").val();
												var total1    = $("#kurs_tukar").val();
												var nominal1  = $("#nominal1").val();

												var totalan = (total * 1)  ;
												var totalan1 = (total1 * 1)  ;
												var tot_bayar = (total * 1) + (nominal1 * 1)  ;
												var dpp = tot_bayar/1.1;
												var ppn = dpp *0.1;
												if (tot_bayar > 0) {
													$("#total_bayar1").text(totalan1);
													$("#hasil_kurs_tukar1").text(totalan1);
													$("#total_bayar").text(tot_bayar).number(true);
													$("#totalan").text(totalan).number(true);
													$("#tot").text(tot_bayar);
													$("#sisa").text(tot_bayar).number(true);
													$("#dpp").text(dpp).number(true);
													$("#dp").text(Math.round(dpp));
													$("#ppnan").text(ppn).number(true);
													$("#pp").text(Math.round(ppn));
												}
												else
												{
													$("#total_bayar").text(tot_bayar);
													$("#tot").text(tot_bayar);
													$("#sisa").text(tot_bayar);
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



