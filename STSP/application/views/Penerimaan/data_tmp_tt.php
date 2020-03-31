									<?php 
									$total=0;
									foreach ($list_tmp as $t) { 
									?>
								<?php $total=$total+$t['bayar'];} ?> <!-- Asli $hasil5 -->
									<div class="info-box bg-aqua" style="min-height:105px">
									<span class="info-box-icon" style="height:105px; padding:4px 0; width:50px"><i class="fa fa-shopping-cart"></i></span>

									<div class="info-box-content">
									
									  <span class="info-box-number" style=" font-size:23px; padding:36px 0">Rp. <?php echo number_format($total,2);?><div id="grandtotal"></div></span>
									  
									  
									</div>
								</div>
								
			
		
