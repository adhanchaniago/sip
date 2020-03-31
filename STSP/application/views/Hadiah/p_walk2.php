								<?php 
									$total=0; $hasil=0;$hasil2=0;$hasil3=0;$ppn=0;$dpp=0;$subtotal = 0;
									//$hasil4=0;$hasil5=0;
									foreach ($list_tmp as $t) { 
									$subtotal = $t['qtyb']*$t['harga_jual'];
									$hasil = $hasil + $subtotal;
									//$hasil2 =$hasil*$t['disc1']/100;
									//$hasil3 =$hasil-$hasil2;
									//	$hasil4 =$hasil3*$t['disc2']/100;
									//	$hasil5 =$hasil3-$hasil4;
									?>
									<?php $total=$total+$hasil; } ?> 
								<div class="form-group">
								<label class="col-sm-32 control-label">Total</label>
								<div class="col-sm-33">
										<input type="text" name="" readonly id="total"  value = "<?php echo number_format($hasil)?>" autocomplete="off" class="form-control" placeholder = "Total Bayar " onchange="copytextbox12();" >
								</div>
							</div>
			<script src="<?php echo base_url(); ?>assets/js/number.js"></script>
<script>
			function copytextbox12() {
			document.getElementById('tot').value = document.getElementById('total').value;
			}
			$('#total').change(function(){
			var total = $('#total').val();
			$('#tot').val(total);
			});
		</script>
<script>
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

			
		
