
				                <tr>
				                  <th style="width:10px">No</th>
								  <?php if($this->session->userdata('level') === 'Administrator' OR $this->session->userdata('level') === 'Manager'): ?>	
				                  <th>ID Barang</th>
								  <?php endif;?>
				                  <th>Nama Barang</th>
				                  <th>Stok</th>
				                  <th>Satuan</th>
				                  <th>Kat Barang</th>
				                  <th>Stok Min</th>
				                  <th>Jual</th>
				                  <th >Tanggal</th>
				              
				            
				                </tr>
				                </thead>
				                <tbody>
								<?php 
								$no=1;
								foreach ($list_barang->result() as $g){?>
								<tr>
								<td><?php echo $no;?></td>
								<?php if($this->session->userdata('level') === 'Administrator' OR $this->session->userdata('level') === 'Manager'): ?>	
   			                    <td><?php echo $g->id_barang;?></td>
								<?php endif;?>
								<td><?php echo $g->nama_barang;?></td>
								<td><?php echo $g->stok;?></td>
								<td><?php echo $g->satuan_besar;?></td>
								<td><?php echo $g->id_k_barang;?></td>
								<td><?php echo $g->minimum;?></td>
								<td><?php echo $g->jual;?></td>
								<td><?php echo $g->tgl;?></td>
								</tr>
								<?php $no++;} ?>
				             