
<body class = "tampildata3" onLoad="startTime()" >	
	<div class = "row " >
		<?php echo $this->session->flashdata('message');
		?>
		<section class="col-lg-12 connectedSortable">
			<div class="box box-primary" > 
				<h3 class="box-title">Retur Sales Order</h3>
			</div>
			<div class="box-body">
				<form class="form-horizontal"  method="POST" id="form" action="" enctype = "multipart/form-data">
					<div class="form-group">
						<label class="col-sm-40 control-label">No Retur</label>
						<div class="col-sm-37">
							<input type="text" name="no_retur" id="" value = "<?php echo $autonumber; ?>" autocomplete="off" readonly  class="form-control" placeholder = " No Jual" >
						</div>
						<label class="col-sm-40 control-label"> No SO </label>
						<div class="col-sm-37" >
							<input type="text"readonly name="" value = "<?php echo $p['no_jual'];?>/<?php echo $p['id_pelanggan'];?>/<?php echo $p['no_reff'];?>" autocomplete="off"  class="form-control" placeholder = " No Jual" >
							<input type="hidden" name="no_jual" value = "<?php echo $p['no_jual'];?>" id="no_jual" autocomplete="off"  class="form-control" placeholder = " No Jual" >
							<input type="hidden" name="no_reff" value = "<?php echo $p['no_reff_retur'];?>" id="no_reff" autocomplete="off"  class="form-control" placeholder = " No Jual" >
							<input type="hidden" name="no_min" value = "-1" id="no_reff" autocomplete="off"  class="form-control" placeholder = " No Jual" >
							<input type="hidden" name="no_reff_inv" value = "<?php echo $p['no_reff'];?>" id="no_reff_inv" autocomplete="off"  class="form-control" placeholder = " No Jual" >

						</div>
						<label class="col-sm-40 control-label">Tanggal</label>
						<div class="col-sm-37">
							<input type="hidden" name="tanggal" id = "tanggal" value="<?php echo date('Y-m-d') ;?>"onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" readonly class="form-control" placeholder = " Tanggal SO">
							<input type="hidden" name="tgl_invoice" id = "tgl_invoice" value="<?php echo date('d-m-Y') ;?>"onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" readonly class="form-control" placeholder = " Tanggal Invoice">
							<input type="hidden" name="bln" id = "bln" value="<?php echo date('m') ;?>"onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" readonly class="form-control" placeholder = " Tanggal Invoice">
							<span class = "form-control" readonly><?php echo date('d-m-Y')?></span>
						</div>
						<label class="col-sm-40 control-label">Nama Pelanggan</label>
						<div class="col-sm-37">
							<input type="text" name="" id="id_pelanggan" value = "<?php echo $p['nama_pelanggan']?>" autocomplete="off" readonly class="form-control" placeholder = " Kategori" >
							<input type="hidden" name="id_pelanggan" id="id_pelanggan" value = "<?php echo $p['id_pelanggan']?>" autocomplete="off" readonly class="form-control" placeholder = " Kategori" >
							<input type="hidden" name="" id="id_k_pelanggan" value = "<?php echo $p['id_k_pelanggan']?>" autocomplete="off" readonly class="form-control" placeholder = " Kategori" >
						</div>

					</div>
					<hr>
					<div class="form-group">
						<div class="col-sm-30" >
							<input type="text"  name="namabarang" id="nama_barang" autofocus class="form-control" placeholder = "NAMA BARANG (<-)" tabindex = "4" >
						</div>
						<div class="col-sm-30" >
							<input type="hidden"  name="idbarang" id="id_barang" class="form-control" placeholder = "Barang" tabindex = "5">
						</div>
						<div class="col-sm-35" >
							<input type="text" name="stok" id="stok" readonly  autocomplete="off" class="form-control" placeholder = "STOK ">

						</div>
						<div class="col-sm-35" >
							<input type="text"  name="qtybes" id="Q_B"   autocomplete="off" class="form-control" placeholder = "QTY "  tabindex = "6">
							<input type="hidden"  name="qty" id="qty"   autocomplete="off" class="form-control" placeholder = "QTY "  tabindex = "6">

						</div>
						<div class="col-sm-35">
							<input type="text"  name="satuanbes" id="S_B" readonly autocomplete="off" class="form-control" placeholder = "SATUAN">

						</div>
						<div class="col-sm-35" >
							<input type="hidden" name = "qib" id="Q_IB"  readonly autocomplete="off" class="form-control" placeholder = "Q_IB">

						</div>
						<div class="col-sm-30">

							<input type="text" name="hb" id="hb" autocomplete="off" readonly="" class="form-control" placeholder = "HARGA JUAL" >
							<input type="hidden" name="pricelist" id="pricelist" autocomplete="off" class="form-control" placeholder = "HARGA JUAL" tabindex = "8">
							<input type="hidden" name="hargabeli" id="modal1"  autocomplete="off" class="form-control" placeholder = "HARGA JUAL">
							<input type="hidden" name="sadis" id="sadis" onFocus="startCalc();" readonly autocomplete="off" class="form-control" placeholder = "MODAL">
						</div>
						<div class="col-sm-30" >
							<input type="text" name="hm" id="hm" readonly autocomplete="off" class="form-control" placeholder = "MODAL">
							<input type="hidden" name="modal" id="modal" readonly autocomplete="off" class="form-control" placeholder = "MODAL">
							<input type="hidden"  name="disct" id="disct" onFocus="startCalc();" autocomplete="off" class="form-control" placeholder = "2" tabindex = "9"></div>
							<div class="col-sm-35"  >
								<input type="text"  name="disc" id="disc" readonly="" autocomplete="off" class="form-control" placeholder = "% 1" >
								<input type="hidden"  name="sadis1" id="sadis1" onFocus="startCalc();" autocomplete="off" class="form-control" placeholder = "1" tabindex = "9">
							</div>
							<div class="col-sm-35">
								<input type="text"  name="disc1" id="disc1" readonly="" autocomplete="off" class="form-control" placeholder = "% 2" >
								<input type="hidden"  name="disct1" id="disct1" onFocus="startCalc();" autocomplete="off" class="form-control" placeholder = "3" tabindex = "10"><textarea rows="1" style="display:none;" class="form-control" name="jam1" id="txt" readonly></textarea>
							</div>
							<div class="col-sm-31">
								<button type="submit" class="btn btn-sm btn-primary" name="btn_simpan" id="btn_simpan"  tabindex = "11">OK</button>

							</div>

						</div>

						<div class="form-group">
							<div class="table-responsive">
								<table id = "#" class="table table-condensed" >
									<thead bgcolor="#99FF99">
										<tr>
											<th width = "5px" >No</th>
											<th width = "330px" >Nama Barang</th>
											<th width = "70px">Qty</th>
											<th width = "70px">Satuan</th>
											<th width = "100px">Harga Jual</th>
											<th width = "50px">% 1</th>
											<th width = "50px">% 2</th>
											<th width = "130px">Sub Total</th>
											<th width = "50px">A</th>
										</tr>
									</thead>
									<tbody id = "tampiltmp">

									</tbody>
								</table>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-29 control-label" style="margin-top: 8px;">Keterangan</label>
							<div class="col-sm-33">
								<input type="text"  name="keterangan" id="ket"  autocomplete="off"  class="form-control" placeholder = "KETERANGAN (F2)" onkeyup=" this.value=this.value.toUpperCase();">
							</div>
						</div>
						<div class="col-sm-31">
							<br>
						</div>
						<?php		
						$no_jual = $this->uri->segment(3);
						$query = "SELECT tb_detail_penjualan.no_jual,tb_detail_penjualan.tgl,tb_detail_penjualan.id_barang,
						tb_detail_penjualan.qtyb,tb_detail_penjualan.satuan_besar,tb_detail_penjualan.harga_beli,
						tb_detail_penjualan.disc,tb_detail_penjualan.disc1,tb_barang.nama_barang,tb_penjualan.no_jual,
						tb_penjualan.ket_alamat,tb_penjualan.ket_retur,tb_penjualan.total,tb_penjualan.potongan,tb_penjualan.ongkir1,
						tb_penjualan.ongkir2,tb_penjualan.nominal1,tb_penjualan.nominal2,tb_penjualan.cash,tb_penjualan.debet,tb_penjualan.tgl_invoice,
						tb_penjualan.bank1,tb_penjualan.transfer,tb_penjualan.bank2,
						tb_penjualan.giro,tb_penjualan.kembali,tb_penjualan.sisa,tb_penjualan.sisa2 FROM tb_detail_penjualan 
						INNER JOIN tb_penjualan ON tb_detail_penjualan.no_jual = tb_penjualan.no_jual 
						INNER JOIN tb_barang ON tb_detail_penjualan.id_barang = tb_barang.id_barang 
						WHERE tb_detail_penjualan.no_jual = '$no_jual' ORDER BY tgl DESC";
						$cari = $this->db->query($query);
						$cari->num_rows();

						?>

						<div class="form-group">
							<div class="table-responsive">
								<table id = "example" class="table table-condensed">
									<thead bgcolor="#66CCFF">
										<tr>
											<td width = "10px" ><b>No</b></td>
											<td width = "55px" ><b>Tanggal</b></td>
											<td width = "300px" ><b>Nama Barang</b></td>
											<td  width = "10px"><b>QTY</b></td>
											<td  align="right" width = "80px"><b>Satuan</b></td>
											<td  align="right" width = "80px"><b>Harga</b></td>	
											<td  align="right" width = "80px"><b>Disc</b></td>	
											<td  align="right" width = "150px"><b>Total</b></td>	
										</tr>
									</thead> 
									<tbody>
										<?php 
										$no=1;
										$sub = 0;
										if(isset($cari)){
											foreach ($cari->result_array() as $f){
												$sub = $f['qtyb'] * $f['harga_beli'];
												$diskon1 = $f['qtyb'] * $f['harga_beli'] * $f['disc']/100;
												$hasil =$sub-$diskon1;
												$diskon2 = $hasil * $f['disc1']/100;
												$hasil2 = $hasil - $diskon2;
												?>

												<tr>
													<td><?php echo $no;?></td>
													<td><?php echo $f['tgl_invoice'];?></td>
													<td><?php echo $f['nama_barang'];?></td>
													<td><?php echo $f['qtyb'];?></td>
													<td  align="right"><?php echo $f['satuan_besar'];?></td>
													<td  align="right"><?php echo number_format($f['harga_beli'],2);?></td>
													<td  align="right"><?php if($f['disc'] > 0){
														echo $f['disc'].'+'.$f['disc1'];
													}else{
														echo "-";
													}?></td>
													<td  align="right"><?php echo number_format($hasil2,2);?></td>
												</tr>
												<?php $no++;}}?>
												<?php if($f['potongan'] > 0){ echo"
												<tr>
												<td colspan = 7 align = right><b>Potongan</b></td>
												<td align=right>" .number_format($f['potongan'],2)."</td>
												</tr>";
											}?>

											<?php if($f['nominal1'] > 0){ echo"
											<tr>
											<td colspan = 7 align = right><b> ".strtoupper($f['ongkir1'])." </b></td>
											<td align=right>" .number_format($f['nominal1'],2)."</td>
											</tr>";
										}?>

										<?php if($f['nominal2'] > 0){ echo"
										<tr>
										<td colspan = 7 align = right><b> ".strtoupper($f['ongkir2'])." </b></td>
										<td align=right>" .number_format($f['nominal2'],2)."</td>
										</tr>";
									}?>

									<td colspan = "7" align = "right"><b>Total</b></td>
									<td align="right"><?php echo number_format($f['total'],2);?></td>
									<tr>

										<?php if($f['cash'] > 0){ echo"
										<tr>
										<td colspan = 7 align = right><b>Cash</b></td>
										<td align=right>" .number_format($f['cash'],2)."</td>
										</tr>";
									}?>

									<?php if($f['debet'] > 0){ echo"
									<tr>
									<td colspan = 7 align = right><b>Debet</b></td>
									<td align=right>".number_format($f['debet'],2)."</b> | <b> ".strtoupper($f['bank1'])."</b></td>
									</tr>";
								}?>

								<?php if($f['transfer'] > 0){ echo"
								<tr>
								<td colspan = 7 align = right ><b>Transfer</b></td>
								<td align=right>".number_format($f['transfer'],2)."</b> | <b> ".strtoupper($f['bank2'])."</b></td>
								</tr>";
							}?>

							<?php if($f['giro'] > 0){ echo"
							<tr>
							<td colspan = 7 align = right><b>Giro</b></td>
							<td align=right> " .number_format($f['giro'],2)."</td>
							</tr>";
						}?>

						<?php if($f['kembali'] > 0){ echo"
						<tr>
						<td colspan = 7 align = right><b>Kembali</b></td>
						<td align=right>" .number_format($f['kembali'],2)."</td>
						</tr>";
					}

					?>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<hr>	
</div>
<div class="col-md-12" >
	<div class="col-sm-41 tampildata1" hidden="">
	</div>
	<textarea style="display:none;" rows="1"class="form-control" name="total_belanja" id="total_belanja" style="height: 34px;"readonly></textarea>
	<textarea style="display:none;" style="display:none;" rows="1"class="form-control" name="total_retur"   id="total_retur" style="height: 34px;"readonly></textarea>
	<textarea style="display:none;" rows="1"  class="form-control" name="total" 		  id="tot" style="height: 34px;"readonly requered></textarea>
	<textarea style="display:none;" rows="1"  class="form-control" name="totalan" id="totalan" style="height: 34px;"readonly requered></textarea>
	<textarea style="display:none;" rows="1"class="form-control" name="dpp"   id="dp" style="height: 34px;"readonly requered></textarea>
	<textarea style="display:none;" rows="1"class="form-control" name="ppn" 	 id="pp" style="height: 34px;"readonly requered></textarea>
	<textarea style="display:none;" rows="1"class="form-control" name="kembali" 	  id="kem" style="height: 34px;"readonly></textarea>
	<textarea style="display:none;" rows="1"class="form-control" name="sisa" 		  id="sis" style="height: 34px;"readonly ></textarea>
	<textarea style="display:none;" rows="1"class="form-control" name="sisa2"  		  id="siso" style="height: 34px;"readonly></textarea>
	<input type="hidden" id="potongan2" name = "potongan" autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga" required>
	<textarea  rows="1"class="form-control" name="nominal1" style="display:none;" id="nomino" style="height: 34px;"readonly></textarea>
	<input type="hidden" id="nom" 		name = "nominal2" autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
	<input type="hidden" id="ong1" 		name = "ongkir1"  autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
	<input type="hidden" id="ong2" 		name = "ongkir2"  autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
	<input type="hidden" id="cash2" 	name = "cash"     autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
	<input type="hidden" id="deb" 		name = "debet"    autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
	<input type="hidden" id="ban1" 		name = "bank1"    autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
	<input type="hidden" id="trans" 	name = "transfer" autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
	<input type="hidden" id="ban2" 		name = "bank2"    autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
	<input type="hidden" id="gr"	    name = "giro"     autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
	<input type="hidden" id="keg" 		name = "ket_giro" autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
	<div class="form-group" align="right">
		<table class = "table1">
			<tr>
				<td align = "right">
					<input type="submit" name = "submit" id="btn_simpan1" value = "SIMPAN" class="btn btn-sm btn-primary" tabindex="29">
					<?php if($this->session->userdata('level') === 'Administrator'  OR $this->session->userdata('level') === 'KasirA5' OR $this->session->userdata('level') === 'Manager'): ?>
				<?php endif;?>
				<a href = "<?php echo base_url();?>Sales_order/riset_retur" class = "btn btn-sm btn-danger"  tabindex="31">Cancel</a>

			</td>
		</tr>
	</table>
</div>
</div>

</div>
</form>
</div>
</div>
</section>
</div>

<script>
	

	$("#form").submit(function(){

		var total       = $("#tot").val();
		if (total == 0) {
			alert("Opps.. Total Tidak Boleh Kosong");
			document.getElementById("nama_barang").focus();
			return false;

		}else{

			return true;
		}

	});
	
	var site = "<?php echo site_url();?>";
	var id_k_pelanggan = document.getElementById("id_k_pelanggan").value;
	$(function(){
		var noju = $('#no_jual').val();
		$('#nama_barang').autocomplete({
			serviceUrl: site+'Sales_order/get_data_retur_nojul/'+noju,
			onSelect: function (suggestion) {
				$('#id_barang').val(''+suggestion.id_barang); 
				$('#stok').val(''+suggestion.stok); 
				$('#S_B').val(''+suggestion.satuan_besar); 
				$('#Q_B').val(''+suggestion.qtyb); 
				$('#qty').val(''+suggestion.qtyb); 
				$('#hm').val(''+suggestion.modal);
				$('#pricelist').val(''+suggestion.pricelist);
				$('#disc').val(''+suggestion.disc);
				$('#disc1').val(''+suggestion.disc1);
				$('#hb').val(''+suggestion.harga_beli);
			}

		});
	});
</script>
<script>
	$('#nama_barang').change(function(){
		$("#hm") .number(true);
		$("#hb") .number(true);
		
		$('#Q_B,#hb').keyup(function(){
			
			var jual1 = $('#modal').val();
			$('#hm').val(jual1);
			
			var jual = $('#hb').val();
			$('#modal1').val(jual);
			
			
		});
	});
</script>
<script>
	var site = "<?php echo site_url();?>";
	$(function(){
		$('#no_jl').autocomplete({
			serviceUrl: site+'Sales_order/get',
			onSelect: function (suggestion) {
				$('#no_jual').val(''+suggestion.no_jual); 
				$('#id_pelanggann').val(''+suggestion.id_pelanggan);
				$('#no_reff_inv').val(''+suggestion.no_reff);

			}
		});
	});
</script>
<script type="text/javascript">
	$('#id_pelanggan').change(function(){
		var
		value 			= $(this).val(),
		$obj 			= $('#id_pelanggan option[value="'+value+'"]'),
		no_reff			= $obj.attr('data-noreff');
		id_k_pelanggan	= $obj.attr('data-kategori');
		keterangan 		= $obj.attr('data-keterangan');

		id_sales 		= $obj.attr('data-sales');
		max_hutang		= $obj.attr('data-max');
		max_hutang1		= $obj.attr('data-max1');
		hutang			= $obj.attr('data-hutang');
		jatuh_tempo		= $obj.attr('data-jatuhtempo');
		jatuh_tempoan	= $obj.attr('data-jatuhtempoan');

		$('#no_reff').val(no_reff);
		$('#id_k_pelanggan').val(id_k_pelanggan);
		$('#keterangan').val(keterangan);
		$('#id_sales').val(id_sales);
		$('#max_hutang').val(max_hutang);
		$('#max_hutang1').val(max_hutang1);
		$('#hutang').val(hutang);
		$('#jatuh_tempo').val(jatuh_tempo);
		$('#jatuh_tempoan').val(jatuh_tempoan);


	});
</script>
<script type="text/javascript">
	tampiltmp();

	$('select').select2();
	function tampiltmp(){			
		
		$("#tampiltmp").load("<?php echo base_url();?>Sales_order/retur_tmp");
		$('.tampildata1').load("<?php echo base_url();?>Sales_order/view_detail_barang4");			
		$('.tampildata').load("<?php echo base_url();?>Sales_order/view_retur_total");
	}
	$('#btn_simpan').on('click',function(){
		var namabarang		=$('#nama_barang').val();
		var idbarang		=$('#id_barang').val();
		var noju			=$('#no_jual').val();
		var qtybes			=$('#Q_B').val();
		var qty				=parseInt($('#qty').val());
            //var qtykec			=$('#Q_K').val();
            var satuanbes		=$('#S_B').val();
            //var satuankec		=$('#S_K').val();
            var hargabeli		=$('#modal1').val();
            var jual    		=$('#hb').val();
            var jual1   		=parseInt($('#hm').val());
            var stok			=$('#stok').val();
            var jml_brg			= parseInt($('#jml_brg').val());
           // var qik				=$('#Q_IK').val();
           var modal			=$('#modal').val();
           var disc			=$('#disc').val();
           var disc1			=$('#disc1').val();

           if(namabarang == 0){
           	alert("Oops.. Nama Barang Masih Kosong");
           	document.getElementById("nama_barang").focus();
           }else if(qtybes == 0){
           	alert("Oops.. Qty Masih Kosong");
           	document.getElementById("Q_B").focus();
           }else if(qtybes > qty){
           	alert("Oops.. Retur Lebih");
           	document.getElementById("Q_B").focus();
           }else{
           	$.ajax({
           		type : "POST",
           		url  : "<?php echo base_url();?>Sales_order/input_detail_retur1",
                data : {idbarang:idbarang,noju:noju,qtybes:qtybes,satuanbes:satuanbes,modal:modal,hargabeli:hargabeli,disc:disc,disc1:disc1}, //dihapus,disc2:disc2
                success: function(data){
                	$('[name="idbarang"]').val("");
                	$('[name="namabarang"]').val("");
                	$('[name="qtybes"]').val("");
                   // $('[name="qtykec"]').val("");
                   $('[name="satuanbes"]').val("");
                    //$('[name="satuankec"]').val("");
                    $('[name="hargabeli"]').val("");
                    $('[name="qib"]').val("");
                    //$('[name="qik"]').val("");
                    $('[name="modal"]').val("");
                    $('[name="disc"]').val("");
                    $('[name="disc1"]').val("");
                    $('[name="stok"]').val("");
                    $('[name="jmlbrg"]').val("");
                    $('[name="hb"]').val("");
                    $('[name="hm"]').val("");
                    
                    tampiltmp();
                    document.getElementById("nama_barang").focus();

                }
            });

           	$('.tampildata1').load("<?php echo base_url();?>Sales_order/view_detail_barang4");
           }
           return false;
       });
	

   </script>
   <script>
   	$('#btn_simpan1').on('click',function(){
   		$('.tampildata3').load("<?php echo base_url();?>Sales_order/input_penjualan");
   	});
   </script>


   <script>

   	$('body').on('click', '.hapus-barang', function(e){
   		e.preventDefault();

   		var user = $(this).attr('data-user');
   		var id_barang = $(this).attr('data-idbarang');
   		var _this = $(this);

   		$.ajax({
   			type: 'post',
   			dataType: 'json',
   			url : "<?= site_url('Sales_order/destroy4/');?>"+'/'+user+'/'+id_barang,
   			success: function(data){
   				tampiltmp();
   				$('.tampildata').load("<?php echo base_url();?>Sales_order/view_retur_total");
   				$('.tampildata1').load("<?php echo base_url();?>Sales_order/view_detail_barang4");
   			}
   		});
   	});	
   </script>

   <script>

   	$('body').on('click', '.hapus-retur', function(e){
   		e.preventDefault();

   		var id_brg = $(this).attr('data-idbrg');
   		var user = $(this).attr('data-user');
   		var _this = $(this);



   		$.ajax({
   			type: 'post',
   			dataType: 'json',
   			url : "<?= site_url('Sales_order/destroy2/');?>"+'/'+id_brg+'/'+user,
   			success: function(data){
   				tampilan();
   				$('.tampildata').load("<?php echo base_url();?>Sales_order/view_detail_barang2");
   				$('.tampildata1').load("<?php echo base_url();?>Sales_order/view_detail_barang3");
   			}
   		});
   	});	
   </script>
   <script>
   	document.onkeyup = function (e) {
   		var evt = window.event || e;   
   		if (evt.keyCode == 16 && evt.ctrlKey) {
   			$('#btn_simpan1').click()   
   		}
   		if (evt.keyCode == 67 && evt.ctrlKey) {
   			$('#simpan2').click()   
   		}
   		if (evt.keyCode == 88 && evt.ctrlKey) {
   			$('#simpan3').click()   
   		}
   	}
   </script>
   <script>
   	function startTime()
   	{
   		var today=new Date();
   		var h=today.getHours();
   		var m=today.getMinutes();
   		var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('txt').innerHTML=h+":"+m+":"+s;
document.getElementById('txt1').innerHTML=h+":"+m+":"+s;
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
	if (i<10)
	{
		i="0" + i;
	}
	return i;
}
</script>
<script type="text/javascript">
	$(document).on('keydown', 'body', function(e){
		var charCode = ( e.which ) ? e.which : event.keyCode;

	if(charCode == 118) //F7
	{
		BarisBaru();
		return false;
	}

	if(charCode == 37) //enter
	{
		$('#nama_barang').focus();
	}
	if(charCode == 112) //panah atas
	{
		$('#send').focus();
	}
	if(charCode == 39) //panah kanan	
	{
		$('#btn_simpan1').focus();
	}
	if(charCode == 113) //panah bawah
	{
		$('#ket').focus();
	}
	if(charCode == 35) //F9
	{
		$('#simpan').click();
	}
	if(charCode == 1200) //F9
	{
		$('#simpan2').click();
	}
	if(charCode == 1210) //F9
	{
		$('#simpan3').click();
	}
	if(charCode == 45) //F9
	{
		$('#id_pelanggan').focus();
	}
	if(charCode == 33) //F9
	{
		$('#nm_barang').focus();
	}
	if(charCode == 34) //F9
	{
		$('#ket_retur').focus();
	}
});

</script>
<script>
	function startTime()
	{
		var today=new Date();
		var h=today.getHours();
		var m=today.getMinutes();
		var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('txt').innerHTML=h+":"+m+":"+s;
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
	if (i<10)
	{
		i="0" + i;
	}
	return i;
}
</script>
<script>

// memformat angka ribuan
function formatAngka(angka) {
	if (typeof(angka) != 'string') angka = angka.toString();
	var reg = new RegExp('([0-9]+)([0-9]{3})');
	while(reg.test(angka)) angka = angka.replace(reg, '$1.$2');
	return angka;
}

// tambah event keypress untuk input bayar
$('#').on('keypress', function(e) {
	var c = e.keyCode || e.charCode;
	switch (c) {
		case 8: case 9: case 27: case 13: return;
		case 65:
		if (e.ctrlKey === true) return;
	}
	if (c < 48 || c > 57) e.preventDefault();
}).on('keyup', function() {
	var inp = $(this).val().replace(/\./g, '');

	$(this).val(formatAngka(inp));

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

// tambah event keypress untuk input bayar
$('#harga_jual').on('keypress', function(e) {
	var c = e.keyCode || e.charCode;
	switch (c) {
		case 8: case 9: case 27: case 13: return;
		case 65:
		if (e.ctrlKey === true) return;
	}
	if (c < 48 || c > 57) e.preventDefault();
}).on('keyup', function() {
	var inp = $(this).val().replace(/\./g, '');

	$(this).val(formatAngka(inp));

});
</script>
<script>
	function hanyaAngka(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))

			return false;
		return true;
	}
	$(this).val(nama);
</script>
<script type="text/javascript">
	function checkForm(){
		var qtyb = document.getElementById("sis").value;

		f(qtyb == 0){
			alert("Nama Belum Di pilih");
			return false;
		} else  {
			return false;
		}
	}
</script>
<script type="text/javascript">
	function confirm() {
		var msg;
		msg= "Apakah Mang Kemed Yakin Akan Menghapus Data ? " ;
		var agree=confirm(msg);
		if (agree)
			return true ;
		else
			return false ;
	}</script>
	<script>

		$("#example").DataTable({


			searching   : true,
			bInfo : false,
			bLengthChange : false,
			bPaginate : false,
			ordering	:	false


		});
		$("#example2").DataTable({


			searching   : true,
			bInfo : false,
			bLengthChange : false,
			bPaginate : false



		});


	</script>
	</html>