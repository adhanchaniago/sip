									<?php 
									$sub=0;$hasil=0;$hasil2=0;$hasil3=0;
									foreach ($list_retur as $r) { 
									$subtotal = $r['qtyb']*$r['harga_beli'];
									$diskon =$r['qtyb']*$r['harga_beli']*$r['disc']/100;
									$hasil =$subtotal-$diskon;
									$hasil2 =$hasil*$r['disc1']/100;
									$hasil3 =$hasil-$hasil2;
									?>
									<?php $sub=$sub+$hasil3; }?><!-- Asli $hasil5 -->
									<div class="info-box bg-aqua" style="min-height:105px">
									<span class="info-box-icon" style="height:105px; padding:4px 0; width:50px"><i class="fa fa-shopping-cart"></i></span>

									<div class="info-box-content">
									
									  <span class="info-box-number" style=" font-size:23px; padding:36px 0">Rp. <?php echo number_format($sub,2);?><div id="grandtotal"></div></span>
									  
									  
									</div>
								</div>
								
			
		
