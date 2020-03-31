<table id = "example" class="table table-condensed">
				                <thead  bgcolor="#99FF99">
				                <tr>
								 <td><b>No</b></td>
								  <?php if ($j->e_barang == "Y" ): ?>
								  <td width="70px" ><b>ID Barang</b></td>
								  <?php endif;?>
				                  <td width="300px"><b>Nama Barang</b></td>
				                  <td><b>Stok</b></td>
				                  <td><b>Satuan</b></td>
				                  <td><b>Harga.T</b></td>
				                  <td><b>Modal</b></td>
				                  <td><b>Walk</b></td>
				                  <td><b>Walk 1</b></td>
				                  <td><b>TK</b></td>
				                  <td><b>TB</b></td>
				                  <td><b>SLS</b></td>
				                  <td><b>AGN</b></td>
				                  <td><b>Kat Barang</b></td>
				                  <td><b>Jual</b></td>
				                  <td><b>Stok Min</b></td>
				                  <td><b>Tanggal</b></td>
				                  <td width = "5px"><b>Status</b></td>
								   <?php if ($j->h_barang == "Y" ): ?>
				                  <td width = "5px"><b>A</b></td>
								    <?php endif;?>
				                </tr>
				                </thead>
								<tbody>
								<?php 
								$no = 1;
								if( ! empty($barang)){
								foreach($barang->result() as $b){
								$modal = $b->modal;
								$modal_t = $b->modal_t;
								$stok = $b->stok;
								$stok_m = $b->minimum;
								$hasil = $modal_t - $modal;
								
								if($stok < $stok_m){
									$color1 = "#99FF99";
								}elseif($stok == $stok_m){
									$color1 = "yellow";
								}else{
									$color1 = "";
								}
								?>
									
								<tr bgcolor = "<?php echo $color1;?>">
								<td><?php echo $no;?></td>
								  <?php if ($j->e_barang == "Y" ): ?>
								  <td width="70px" ><a href = "<?php echo base_url('Barang/edit_barang/'.$b->id_barang);?>"><?php echo $b->id_barang;?></a></td>
								  <?php endif;?>
				                  <td width="300px"><?php echo $b->nama_barang; ?></td>
				                  <td><?php echo $b->stok; ?></td>
				                  <td><?php echo $b->satuan_besar; ?></td>
				                  <td><?php echo number_format($b->modal_t); ?></td>
				                  <td><?php echo number_format($b->modal); ?></td>
				                  <td><?php echo number_format($b->harga_jual); ?></td>
				                  <td><?php echo number_format($b->walk); ?></td>
				                  <td><?php echo number_format($b->tk); ?></td>
				                  <td><?php echo number_format($b->tb); ?></td>
				                  <td><?php echo number_format($b->sls); ?></td>
				                  <td><?php echo number_format($b->agn); ?></td>
				                  <td><?php echo $b->id_k_barang; ?></td>
				                  <td><?php echo $b->jual; ?></td>
				                  <td><?php echo $b->minimum; ?></td>
				                  <td><?php echo $b->tgl; ?></td>
				                  <td width = "5px">
								  <?php 
								  if($hasil > 500){
								  ?>
								  <span align = 'center' class = 'btn btn-xs btn-danger'><i class = 'fa fa-arrow-up'></i></span>
								  <?php }else{?>
								  <span align = 'center' class = 'btn btn-xs btn-info'><i class = 'fa fa-arrow-down'></i></span>
								  <?php }?>
								  </td>
								   <?php if ($j->h_barang == "Y" ): ?>
				                  <td width = "5px"><a href = "<?php echo base_url('Barang/delete_barang/'.$b->id_barang); ?>"><span class = 'btn btn-xs btn-danger'><i class = 'fa fa-trash'></i></span></a></td>
								    <?php endif;?>
								</tr>
								
								 <?php $no++;}}else{
									  echo "<tr><td colspan='12'>Data tidak ada</td></tr>";
								 }
								?>
								 
								 
								</tbody>
				           </table>