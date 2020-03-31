								<?php 
									$total=0; $hasil=0;$hasil2=0;$hasil3=0;$ppn=0;$dpp=0;$no=1;
									foreach($listpenjualan->result() as $f){
									
								?>
								<tr>
								<td><?php echo $no;?></td>
								<td href = "#"  class="detail" data-id = "<?php echo $f->no_jual; ?>"><?php echo $f->no_jual;?>/<?php echo $f->id_pelanggan;?>/<?php echo $f->no_reff;?></td>
								<td><?php echo $f->tgl_invoice;?></td>
								<td><?php echo $f->nama_pelanggan;?></td>
								<td><?php echo number_format($f->total,2);?></td>
								<td><?php echo number_format($f->sisa,2);?></td>
								<td><?php echo $f->jatuh_tempo;?></td>
								<td><?php echo $f->keterangan;?></td>
								<td><?php echo $f->no_sj;?>/<?php echo $f->id_pelanggan;?>/<?php echo $f->no_sjln;?></td>
								<td><?php echo $f->user; ?></td>
								<td><?php echo $f->cetak; ?></td>
								<td><?php echo $f->tempo;?> Hari</td>
								<td><?php if ($f->sisa == 0) {?>
									<span style="font-size:12px"class="label label-success">Lunas</span>
									<?php
								} else{ ?>
								<span style="font-size:12px" class="label label-danger">Hutang</span>
								<?php }?>
								</td>
								</tr>
								<?php $no++;}?>