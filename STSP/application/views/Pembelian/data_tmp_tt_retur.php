									<?php 
									$total=0; $hasil=0;$hasil2=0;$hasil3=0;$ppn=0;$dpp=0;$kurs_tukar=0;$simbol=0;
									$hasil4=0;$hasil5=0;$hasil6=0;$hasil7=0;
									foreach ($list_tmp as $t) { 
									$simbol = $t['simbol'];
									$kurs_tukar = $t['kurs_tukar'];
									$subtotal = $t['qtyb']*$t['harga_beli'];
									$diskon =$t['qtyb']*$t['harga_beli']*$t['disc']/100;
									$hasil =$subtotal-$diskon;
									$hasil2 =$hasil*$t['disc1']/100;
									$hasil3 =$hasil-$hasil2;
									$hasil4 =$hasil3*$t['disc2']/100;
									$hasil5 =$hasil3-$hasil4;
									$hasil6 =$hasil5*$t['ppn']/100;
									$hasil7 =$hasil5+$hasil6;
									?>
									<?php $total=$total+$hasil7; $dpp = $total / 1.1; $ppn = $dpp * 10/100; } ?> <!-- Asli $hasil5 -->
									<div class="info-box bg-aqua" style="min-height:105px">
									<span class="info-box-icon" style="height:105px; padding:4px 0; width:50px"><i class="fa fa-shopping-cart"></i></span>

									<div class="info-box-content">
									
									  <span class="info-box-number" style=" font-size:23px; padding:36px 0">
											<?php if($kurs_tukar >1){ echo $simbol?>. <?php echo round($total,2); }
											else{ echo "Rp. ",number_format($total,2);}?><div id="grandtotal"></div></span>
									  
									  
									</div>
								</div>
								
			
		
