									<?php 
									$total=0; $hasil=0;$hasil2=0;$hasil3=0;$ppn=0;$dpp=0; $subtotal =0;
									//$hasil4=0;$hasil5=0;
									foreach ($list_tmp as $t) { 
									$subtotal = $t['qtyb']*$t['harga_jual'];
									//$hasil = $hasil + $subtotal;
									//$hasil2 =$hasil*$t['disc1']/100;
									//$hasil3 =$hasil-$hasil2;
									//	$hasil4 =$hasil3*$t['disc2']/100;
									//	$hasil5 =$hasil3-$hasil4;
									?>
									<?php $total=$total+$subtotal; } ?> 
									<div class="info-box bg-aqua" style="min-height:105px">
									<span class="info-box-icon" style="height:105px; padding:4px 0; width:50px"><i class="fa fa-shopping-cart"></i></span>

									<div class="info-box-content">
									
									  <span class="info-box-number" style=" font-size:23px; padding:36px 0">Rp. <?php echo number_format($total,2);?><div id="grandtotal"></div></span>
									  
									  
									</div>
								</div>
								
			
		
