<html >
<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">  <!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">  <!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">  
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.autocomplete.css">  
	<style>
		table {
			border-collapse: collapse;
			border-spacing: 0;
			width: 100%;
			border: 1px solid #ddd;
		}
		.table1 {
			border-collapse: collapse;
			border-spacing: 0;
			width: 100%;
			border: 0px solid #ddd;
			margin-left : 18px;
		}
		th, {
			text-align: center;
			padding: 8px;
		}


	</style>
</head>
<body class = "tampildata3" onLoad="startTime()" >	
	<div class = "row " >
		<section class="col-lg-12 connectedSortable">
			<div class="box box-primary" > 
				<h3 class="box-title" style="margin-top:4px;margin-bottom:-19px;padding-bottom:4px;">Input Sales Order</h3>
			</div>
			<div class="box-body">
				<div class="col-md-7">
					<form class="form-horizontal"  method="POST" id="form" action="" enctype = "multipart/form-data">
						<div class="form-group">
							<label class="col-sm-40 control-label">No SO</label>
							<div class="col-sm-37">
								<input type="text" name="no_sales" id="" value="<?php echo $autonumber;?>" autocomplete="off" readonly  class="form-control" placeholder = " No Jual" >
							</div>
							<label class="col-sm-40 control-label">Tanggal SO</label>
							<div class="col-sm-37">
								<input type="hidden" name="tgl"  value="<?php echo date('Y-m-d') ;?>"onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" readonly class="form-control" placeholder = " Tanggal Invoice">
								<input type="text" name="tgl_invoice" id = "tgl_invoice" value="<?php echo date('d-m-Y') ;?>"onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" readonly class="form-control" placeholder = " Tanggal Invoice">
								<textarea rows="1" style="display:none;" class="form-control" name="jam" id="txt" style="height: 34px;"readonly></textarea>
								<input type="hidden" name="bulan" id = "bulan" value="<?php echo date('m') ;?>"onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" readonly class="form-control" placeholder = " Tanggal Invoice">
							</div>
							<label class="col-sm-40 control-label">Nama Pelanggan</label>
							<div class="col-sm-37" style = "width:171px;">
								<select name="id_plg" id="id_pelanggan" class="form-control select2 id_pelanggan"  style="width: 99%;" autofocus tabindex="1" required> 
									<option value = "" selected="selected">Pilih Pelanggan</option>
									<?php foreach ($listpelanggan->result() as $p){
										$tanggalSekarang=date('d-m-Y');
										$newTanggalSekarang=strtotime($tanggalSekarang);

										$jumlahHari=$p->masa_hutang;
										$NewjumlahHari=86400*$jumlahHari;
										$hutang=$p->hutang;
										$max_hutang= $p->max_hutang;

										$hasilJumlah = $newTanggalSekarang + $NewjumlahHari;
										$tampilHasil=date('Y-m-d',$hasilJumlah);

										$tmp=date('d-m-Y',$hasilJumlah);

										?>

										<option value = "<?php echo $p->id_pelanggan;?>" data-idplg = "<?php echo $p->id_pelanggan;?>" data-dp1 = "<?php echo $p->deposit;?>" data-dp = "<?php echo $p->deposit; ?>" data-plg = "<?php echo $p->id_pelanggan; ?>" data-nama = "<?php echo $p->nama_pelanggan; ?>" data-no_npwp = "<?php echo $p->no_npwp; ?>" data-alamat = "<?php echo $p->ship_to; ?>" data-color = "<?php if($p->hutang > $p->max_hutang){ echo $color = "<span rows=1 class=form-control style=height: 34px;readonly><div bgcolor = red></div></span>";}elseif($p->hutang == 1){ echo $color = "<span rows=1 class=form-control style=height: 34px;readonly><div bgcolor = yellow></div></span>";}elseif($p->hutang == 0){ echo $color = "<span rows=1 class=form-control style=height: 34px;readonly><div bgcolor = green></div></span>";} ?>" data-hutang = "<?php echo $p->hutang;?>" data-nosjln = "<?php echo $p->no_sjln;?>" data-noref = "<?php echo $p->no_reff_so;?>" data-nopel = "<?php echo $p->id_pelanggan; ?>" data-jatuhtempo = "<?php echo $tampilHasil;?>" data-jatuhtempoan = "<?php echo $tmp;?>"data-max = "<?php echo $p->masa_hutang;?>" data-max1 = "<?php echo $p->max_hutang;?>" data-kategori = "<?php echo $p->id_k_pelanggan;?>" data-sales = "<?php echo $p->id_karyawan;?>" > <?php echo $p->nama_pelanggan;?> </option>

									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-40 control-label">No Reff</label>
							<div class="col-sm-37" >
								<input type="hidden"  name="id_pelanggan" id="id_plg" autocomplete="off" readonly class="form-control" placeholder = " No Pel">
								<input type="hidden"  name="nama_pelanggan" id="nama_pelanggan" autocomplete="off" readonly class="form-control" placeholder = " No Pel">
								<input type="hidden"  name="" id="no_pelanggan" autocomplete="off" readonly class="form-control" placeholder = " No Pel">
								<input type="text"  name="no_reff" id="no_ref" autocomplete="off" readonly class="form-control" placeholder = " NO REFF">
								<input type="hidden"  name="no_npwp" id="no_npwp" autocomplete="off" readonly class="form-control" placeholder = " NO REFF">
							</div>
							<div class="col-sm-37" style = "width:63px;">
								<input type="hidden"  name="no_urut" value="1" autocomplete="off" readonly class="form-control" placeholder = " No Ref">
								<input type="hidden"  name="no_urut2" value="1" autocomplete="off" readonly class="form-control" placeholder = " No Ref">
								<input type="hidden"  name="cetak" value="1" autocomplete="off" readonly class="form-control" placeholder = " No Ref">
								<input type="hidden"  name="acc" value="0" autocomplete="off" readonly class="form-control" placeholder = " No Ref">
							</div>
							<label class="col-sm-40 control-label">ID Sales</label>
							<div class="col-sm-37">
								<input type="text"  name="id_karyawan" id="id_sales" autocomplete="off"readonly class="form-control" placeholder = " SALES">
								<input type="hidden"  name="jatuh_tempoan" id="jatuh_tempoan" readonly onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" class="form-control" placeholder = " JATUH TEMPO">
								<input type="hidden" name="tempo" onFocus="startCalc();" readonly onBlur="stopCalc();" id="max_hutang" autocomplete="off" class="form-control" placeholder = " Tempo">
							</div>
							<label class="col-sm-40 control-label">ID Kategori</label>
							<div class="col-sm-37" style = "width:171px;">
								<input type="text" name="id_k_pelanggan" id="id_k_pelanggan" autocomplete="off" readonly class="form-control" placeholder = " KATEGORI" >
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-37">
								<input type="hidden" name="ket_pel" id="keterangan" class = "form-control"  autocomplete="off" placeholder = "Ket">
							</div>
							<div class="col-sm-37" style = "width:88px;">
								<input type="hidden"  name="no_sj" id="no_sj" value="<?php echo $autonumber1;?>" autocomplete="off" readonly class="form-control" placeholder = " No SJ">
							</div>
							<div class="col-sm-37" style = "width:46px;">
								<input type="hidden"  name="no_sjln" id="no_sjln" autocomplete="off" readonly class="form-control" placeholder = " No SJ">
							</div>
							<label class="col-sm-40 control-label"></label>
							<div class="col-sm-37">
								<input type="hidden"  name="jatuh_tempo" id="jatuh_tempo" readonly onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" class="form-control" placeholder = " Jatuh Tempo">
							</div>	
							<div class="col-sm-37" width = "10px">
								<input type="hidden"  name="max_hutang1" id="max_hutang1" autocomplete="off"readonly class="form-control" placeholder = " Max Hutang">
								<input type="hidden"  name="hutang" id="hutang" autocomplete="off"readonly class="form-control" placeholder = "Hutang">
							</div>
						</div>
					</div>							
					<div class="col-md-5">
						<div class="col-sm-41">
							<textarea  type="text"  name="ket_alamat"  maxlength="50"  id="send" rows="2" style="width: 159px; height: 70; margin-left:34px;" autocomplete="off" class="form-control"  placeholder = " SHIP TO (F1) " onkeyup=" this.value=this.value.toUpperCase();"></textarea>

						</div>
					</div>
					<div class="col-md-4">
						<?php 
						$total=0; $hasil=0;$hasil2=0;$hasil3=0;$ppn=0;$dpp=0;
									//$hasil4=0;$hasil5=0;
						foreach ($list_tmp as $t) { 
							$subtotal = $t['qtyb']*$t['harga_beli'];
							$diskon =$t['qtyb']*$t['harga_beli']*$t['disc']/100;
							$hasil =$subtotal-$diskon;
							$hasil2 =$hasil*$t['disc1']/100;
							$hasil3 =$hasil-$hasil2;
								//	$hasil4 =$hasil3*$t['disc2']/100;
								//	$hasil5 =$hasil3-$hasil4;
							?>
							<?php $total=$total+$hasil3; $dpp = $total / 1.1; $ppn = $dpp * 10/100; } ?> <!-- Asli $hasil5 -->

							<div class="col-md-11  tampildata">
								<div class="info-box bg-aqua" style="min-height:105px">
									<span class="info-box-icon" style="height:105px; padding:4px 0; width:50px"><i class="fa fa-shopping-cart"></i></span>
									<div class="info-box-content">
										<span class="info-box-number"  style=" font-size:23px; padding:36px 0"><div id="grandtotal"></div></span>
									</div>
								</div>
							</div>
						</div>
						<br>
						<br>
						<br>
						<br>
						<br>
						<hr>
						<div class="col-md-9"  style="margin-top: -41px;" onsubmit="return validasi_input(this)">
							<div class="col-sm-30" style="width:320px" >
								<input type="text"  name="namabarang" id="nama_barang" class="form-control block" placeholder = "NAMA BARANG (<-)" tabindex = "4" >
							</div>
							<div class="col-sm-30" style="width:230px" >
								<input type="hidden"  name="idbarang" id="id_barang" class="form-control" placeholder = "Barang" tabindex = "5">
								<input type="hidden" name="cekbarang" id="cekbarang">
							</div>
							<div class="col-sm-35" style="width:80px">
								<input type="text" name="stok" id="stok" readonly  autocomplete="off" class="form-control" placeholder = "STOK ">
								
							</div>
							<div class="col-sm-35" style="width:80px">
								<input type="text"  name="qtybes" id="Q_B" autocomplete="off" onFocus="startCalc();" onkeyup="copytextbox1();"class="form-control" placeholder = "QTY "  tabindex = "6">
								
							</div>
							<div class="col-sm-35"style="width:80px">
								<input type="text"  name="satuanbes" id="S_B" readonly autocomplete="off" class="form-control" placeholder = "SATUAN">
								
							</div>
							<div class="col-sm-35" >
								<input type="hidden" name = "qib" id="Q_IB"  readonly autocomplete="off" class="form-control" placeholder = "Q_IB">
								
							</div>
							<div class="col-sm-30"  style="width:120px">
								<input type="text" name="j" id="jual"  class="form-control" placeholder = "HARGA JUAL" tabindex = "8">
								<input type="hidden" name="pricelist" id="pricelist" autocomplete="off" class="form-control" placeholder = "HARGA JUAL" tabindex = "8">
								<input type="hidden" name="hargabeli" id="modal1" onFocus="startCalc();" autocomplete="off" class="form-control" placeholder = "HARGA JUAL" tabindex = "8">
								<input type="hidden" name="sadis" id="sadis" onFocus="startCalc();" readonly autocomplete="off" class="form-control" placeholder = "MODAL">								
							</div>
							<div class="col-sm-30" style="width:120px" >
								<input type="text" name="j" id="jual1" readonly autocomplete="off" class="form-control" placeholder = "MODAL">
								<input type="hidden" name="modal" id="modal" readonly autocomplete="off" class="form-control" placeholder = "MODAL">
								<input type="hidden"  name="disct" id="disct" onFocus="startCalc();" autocomplete="off" class="form-control" placeholder = "2" tabindex = "9">
							</div>
							<div class="col-sm-35" style="width:80px"  >
								<input type="hidden"  name="komisi" id="komisi"  autocomplete="off" class="form-control" placeholder = "% 1" tabindex = "9">
								<input type="text"  name="disc" id="disc"  autocomplete="off" class="form-control" placeholder = "% 1" tabindex = "9">
								<input type="hidden"  name="sadis1" id="sadis1" onFocus="startCalc();" autocomplete="off" class="form-control" placeholder = "1" tabindex = "9">
								
							</div>
							<div class="col-sm-35" style="width:80px"  >
								<input type="text"  name="disc1" id="disc1" autocomplete="off" class="form-control" placeholder = "% 2" tabindex = "10">
								<input type="hidden"  name="disct1" id="disct1" onFocus="startCalc();" autocomplete="off" class="form-control" placeholder = "3" tabindex = "10">
							</div>
							<div class="col-sm-31">
								<input  type="submit" name = "btn_simpan" id="btn_simpan" value = "OK" class="btn btn-sm btn-primary"  tabindex="11">															
							</div>

							<table id = "#" class="table table-condensed" >
								<thead bgcolor="#99FF99" id = "color">
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
							<div class="form-group">
								<label class="col-sm-29 control-label" style="margin-top: 8px;">Keterangan</label>
								<div class="col-sm-33" style="width:750px">
									<input type="text"  name="keterangan" id="ket" maxlength="50" autocomplete="off" autofocus class="form-control" placeholder = "KETERANGAN (F2)" onkeyup=" this.value=this.value.toUpperCase();">
								</div>
							</div>
							<br>
							<hr>
								<!--- <div class="col-sm-30" style="width:320px" >
									<input type="text"  name="nmbarang" id="nm_barang" class="form-control" placeholder = "NAMA BARANG (UP)" tabindex = "12" autofocus>
								</div>
								<div class="col-sm-30" style="width:230px" >
									<input type="hidden"  name="idplg" id="idplg" class="form-control" placeholder = "Barang" tabindex = "5">
									<input type="hidden"  name="idbrg" id="id_brg" class="form-control" placeholder = "Barang" tabindex = "">
								</div>
								<div class="col-sm-35" style="width:80px">
									<input type="text"  name="stoke" id="stoke"  readonly autocomplete="off" class="form-control" placeholder = "STOK ">
								
								</div>
								<div class="col-sm-35" style="width:80px">
									<input type="text"  name="qty" id="qty"   autocomplete="off" class="form-control" placeholder = "QTY"  tabindex = "13">
								
								</div>
								<div class="col-sm-35"style="width:80px">
									<input type="text"  name="satuan" id="satuan" readonly autocomplete="off" class="form-control" placeholder = "SATUAN">
								
								</div>
								<div class="col-sm-35" >
									<input type="hidden" name = "qib" id="Q_IB"  readonly autocomplete="off" class="form-control" placeholder = "Q_IB">
								
								</div>
								<div class="col-sm-30" style="width:120px" >
									<input type="text" name="hj" id="hj" readonly autocomplete="off" class="form-control" placeholder = "HARGA JUAL" >
									<input type="hidden" name="hargajual" id="harga_jual"  autocomplete="off" class="form-control" placeholder = "HARGA JUAL" >
								
								</div>
								<div class="col-sm-30"  style="width:120px">
									<input type="text" name="hm" id="hm" readonly autocomplete="off" class="form-control" placeholder = "MODAL">
									<input type="hidden" name="hargamodal" id="harga_modal" readonly autocomplete="off" class="form-control" placeholder = "MODAL">
								
								</div>
								<div class="col-sm-35" style="width:80px"  >
									<input type="text"  name="diskon1" id="diskon1"  autocomplete="off" class="form-control" placeholder = "% 1" tabindex = "15">
								
								</div>
								<div class="col-sm-35" style="width:80px"  >
									<input type="text"  name="diskon2" id="diskon2"  autocomplete="off" class="form-control" placeholder = "% 2" tabindex = "16">
								</div>
								<div class="col-sm-31">
									<button   type="submit" class="btn btn-sm btn-primary" name="bt_simpan" id="bt_simpan"  tabindex = "17">OK</button>
															
								</div>
						   <table id = "#" class="table table-condensed" >
						   <thead bgcolor="#66CCFF">
				                <tr>
								<th width = "5px">No</th>
								<th width = "330px">Nama Barang</th>
								<th width = "70px">Qty</th>
								<th width = "70px">Satuan</th>
								<th width = "100px">Harga Jual</th>
								<th width = "50px">% 1</th>
								<th width = "50px">% 2</th>
								<th width = "130px">Sub Total</th>
								<th width = "50px">A</th>
								</tr>
								</thead>
								<tbody id = "tampilan">
								
								</tbody>
							</table>
						   <div class="form-group">
								<label class="col-sm-29 control-label" style="margin-top: 8px;">Keterangan</label>
								<div class="col-sm-33" style="width:750px">
										<input type="text"  name="ket_retur" id="ket_retur" autocomplete="off" autofocus class="form-control" placeholder = "KETERANGAN RETUR (DOWN)" onkeyup=" this.value=this.value.toUpperCase();">
								</div>
							</div> --->
						</div>
						<div class="col-md-3" style="margin-top: -9px;">
							<div class="col-sm-41 tampildata1">
							</div>
							<textarea style="display:none;" rows="1"class="form-control" name="total_komisi" id="total_komisi" style="height: 34px;"readonly></textarea>
							<textarea style="display:none;" rows="1"class="form-control" name="total_belanja" id="total_belanja" style="height: 34px;"readonly></textarea>
							<textarea style="display:none;" rows="1"class="form-control" name="total_retur"   id="total_retur" style="height: 34px;"readonly></textarea>
							<textarea style="display:none;" rows="1"class="form-control" name="dpp" 		  id="dp" style="height: 34px;"readonly requered></textarea>
							<textarea style="display:none;" rows="1"class="form-control" name="ppn" 		  id="pp" style="height: 34px;"readonly requered></textarea>
							<textarea style="display:none;" rows="1"class="form-control" name="total" 		  id="tot" style="height: 34px;"readonly requered></textarea>
							<textarea style="display:none;" rows="1"class="form-control" name="totalan" 		  id="totalan" style="height: 34px;"readonly requered></textarea>
							<textarea style="display:none;" rows="1"class="form-control" name="kembali" 	  id="kem" style="height: 34px;"readonly></textarea>
							<textarea style="display:none;" rows="1"class="form-control" name="sisa" 		  id="sis" style="height: 34px;"readonly ></textarea>
							<textarea style="display:none;" rows="1"class="form-control" name="sisa2"  		  id="siso" style="height: 34px;"readonly></textarea>
							<textarea style="display:none;" rows="1"class="form-control" name="dp"  		  id="dpt2" style="height: 34px;"readonly></textarea>
							<textarea style="display:none;" rows="1"class="form-control" name="dp2"  		  id="dpt1" style="height: 34px;"readonly></textarea>
							<input type="hidden" id="potongan2" name = "potongan" autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga" required>
							<input type="hidden" id="nomin" 	name = "nominal1" autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
							<input type="hidden" id="nom" 		name = "nominal2" autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
							<input type="hidden" id="ong1" 		name = "ongkir1"  autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
							<input type="hidden" id="ong2" 		name = "ongkir2"  autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
							<input type="hidden" id="cash2" 	name = "cash"     autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
							<input type="hidden" id="deb" 		name = "debet"    autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
							<input type="hidden" id="ban1" 		name = "bank1"    autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
							<input type="hidden" id="trans" 	name = "transfer" autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
							<input type="hidden" id="ban2" 		name = "bank2"    autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
							<input type="hidden" id="gr"	    name = "giro"     autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
							<input type="hidden"	 id="ket_giroan" 		name = "ket_giro" autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
							<div class="form-group">
								<div class="col-sm-33" style="width: 179px;px;margin-left:95px;margin-top: -14px;margin-bottom: 8px;">
									<select class="form-control" name = "status_kirim" id="status_kirim"  tabindex="28">
										<option value = "1">Di Kirim</option>
										<option value = "0" >Di Ambil Sendiri</option>
									</select>
								</div>
								<table class = "table1">
									<tr>
										<td align = "right">
											<input type="submit" name = "submit" id="btn_simpan1" value = "SIMPAN" class="btn btn-sm btn-primary" tabindex="29">
											<?php if($this->session->userdata('level') === 'Administrator'  OR $this->session->userdata('level') === 'KasirA5' OR $this->session->userdata('level') === 'Manager'): ?>
											<input  type="submit" name = "submit3" id="simpan3" value = "CETAK A5" class="btn btn-sm btn-success"  tabindex="30">
										<?php endif;?>
										<a href = "<?php echo base_url();?>Penjualan/riset" class = "btn btn-sm btn-danger"  tabindex="31">Cancel</a>
										
									</td>
								</tr>
							</table>
						</div>
					</div>

				</div>
			</form>
		</div>
	</div>
	<?php echo $this->session->flashdata('message');
	?>
</section>
<div id="show" class="modal fade" role="dialog" >
	<div class="modal-dialog" style="margin-top:130px;">
		<!-- konten modal-->
		<div class="modal-content">
			<!-- heading modal -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Oops.. Disc Kurang Dari Modal</h4>
			</div>
			<!-- body modal -->
			<div class="modal-body">
				<div class="form-group">
					<label class="col-sm-40 control-label" style="width:100px;margin-top:-7px;">password</label>
					<div class="col-sm-37" style="width:250px;margin-top:-15px;">
						<input type="password" name="password" onkeyup=" this.value=this.value.toUpperCase();" id = "password" autocomplete="off" class="form-control" placeholder = " PASSWORD" autofocus>
						<?php 
						$query = "select * from user WHERE kode_user = 'adm'";
						$j = $this->db->query($query);
						$j->num_rows();

						?>
						<?php foreach ($j->result() as $j){ 
						}
						?>
						<input type="hidden" name="pass"  id = "pass" value = "<?php echo $j->password;?>" autocomplete="off" class="form-control" placeholder = " PASSWORD" autofocus>
					</div>
				</div>
			</div>
			<!-- footer modal -->
			<div class="modal-footer">
				<button type="submit" name = "ok" class="btn btn-default ok">OK</button>
			</div>
		</div>
	</div>
</div>
</div>
</body>

<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>src/jquery.autocomplete.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.number.min.js"></script>


<script>
	cekbarang();
	function cekbarang(){

		var idbarang = $("#id_barang").val();
		$.ajax({
			type    : 'POST',
			url     : '<?php echo site_url(); ?>Penjualan/cekbarang',
			cache   : false,
			data    : {idbarang:idbarang},
			success :function(respond){

				$("#cekbarang").val(respond);
				var cekbarang = $("#cekbarang").val();

				if (cekbarang >= 1) {
					$('#id_pelanggan').prop('disabled',true);
				}else{
					$('#id_pelanggan').prop('disabled',false);

				}

			}

		});
	}
	var site = "<?php echo site_url();?>";
	$(function(){
		$('#nama_barang').autocomplete({
			serviceUrl: site+'Penjualan/get_data',
			onSelect: function (suggestion) {
				$('#id_barang').val(''+suggestion.id_barang); 
				$('#stok').val(''+suggestion.stok); 
				$('#S_B').val(''+suggestion.satuan_besar); 
				$('#Q_IB').val(''+suggestion.qty_b); 
				$('#komisi').val(''+suggestion.komisi); 
				$('#modal').val(''+suggestion.modal);
				$('#pricelist').val(''+suggestion.pricelist);
				if(id_k_pelanggan == "TK"){
					var pricelist = $('#pricelist').val();
					if(pricelist > 0){
						var jual = $('#pricelist').val();
						$('#jual').val(jual);
						$('#disc').val(''+suggestion.harga_jual);
					}else{
						$('#disc').val(''+suggestion.pricelist);
						$('#jual').val(''+suggestion.harga_jual);

					}
				}if(id_k_pelanggan == "TB"){
					var pricelist = $('#pricelist').val();
					if(pricelist > 0){
						var jual = $('#pricelist').val();
						$('#jual').val(jual);
						$('#disc').val(''+suggestion.walk);
					}else{
						$('#disc').val(''+suggestion.pricelist);
						$('#jual').val(''+suggestion.walk);

					}
				}if(id_k_pelanggan == "SLS"){
					var pricelist = $('#pricelist').val();
					if(pricelist > 0){
						var jual = $('#pricelist').val();
						$('#jual').val(jual);
						$('#disc').val(''+suggestion.tk);
					}else{
						$('#disc').val(''+suggestion.pricelist);
						$('#jual').val(''+suggestion.tk);

					}
				}if(id_k_pelanggan == "AGN"){
					var pricelist = $('#pricelist').val();
					if(pricelist > 0){
						var jual = $('#pricelist').val();
						$('#jual').val(jual);
						$('#disc').val(''+suggestion.tb);
					}else{
						$('#disc').val(''+suggestion.pricelist);
						$('#jual').val(''+suggestion.tb);

					}
				}if(id_k_pelanggan == "PRT"){
					var pricelist = $('#pricelist').val();
					if(pricelist > 0){
						var jual = $('#pricelist').val();
						$('#jual').val(jual);
						$('#disc').val(''+suggestion.sls);
					}else{
						$('#disc').val(''+suggestion.pricelist);
						$('#jual').val(''+suggestion.sls);

					}
				}
			}

		});
	});
</script>
<script>
	$(function(){
		$('#nama_barang,#nm_barang,#jual').change(function(){
			
			$("#jual1") .number(true);
			$("#hm") .number(true);
			$("#hj") .number(true);

			$('#Q_B,#jual').keyup(function(){
				$("#jual").number(true);
				
				var jual1 = $('#modal').val();
				$('#jual1').val(jual1);

				var jual = $('#jual').val();
				$('#modal1').val(jual);
				
				var jual1       = $("#modal").val();
				var jual 		= $('#jual').val();
				
				var jual1        = jual1.replace(/\,/g, '');
				var jual         = by.replace(/\,/g, '');


			});
			
		});
	});
</script>
<script>
	var site = "<?php echo site_url();?>";
	$(function(){
		
		$('#nm_barang').autocomplete({
			serviceUrl: site+'Penjualan/get_data',
			onSelect: function (suggestion) {

				$('#id_brg').val(''+suggestion.id_barang); 
				$('#stoke').val(''+suggestion.stok); 
				$('#satuan').val(''+suggestion.satuan_besar); 
				$('#harga_modal').val(''+suggestion.modal);
				if(id_k_pelanggan == "WALK1"){
					$('#hj').val(''+suggestion.harga_jual);
				}if(id_k_pelanggan == "WALK"){
					$('#hj').val(''+suggestion.walk);
				}if(id_k_pelanggan == "TK"){
					$('#hj').val(''+suggestion.tk);
				}if(id_k_pelanggan == "TB"){
					$('#hj').val(''+suggestion.tb);
				}if(id_k_pelanggan == "SLS"){
					$('#hj').val(''+suggestion.sls);
				}if(id_k_pelanggan == 'AGN'){
					$('#hj').val(''+suggestion.agn);
				}
			}
		});
	});
</script>
<script type="text/javascript">
	$('#id_pelanggan').change(function(){
		var
		value 			= $(this).val(),
		$obj 			= $('#id_pelanggan option[value="'+value+'"]'),
		idplg			= $obj.attr('data-idplg');
		no_pelanggan	= $obj.attr('data-nopel');
		nama_pelanggan	= $obj.attr('data-nama');
		no_ref			= $obj.attr('data-noref');
		no_npwp			= $obj.attr('data-no_npwp');
		no_sjln			= $obj.attr('data-nosjln');
		id_k_pelanggan	= $obj.attr('data-kategori');
		keterangan 		= $obj.attr('data-keterangan');
		id_sales 		= $obj.attr('data-sales');
		max_hutang		= $obj.attr('data-max');
		max_hutang1		= $obj.attr('data-max1');
		hutang			= $obj.attr('data-hutang');
		jatuh_tempo		= $obj.attr('data-jatuhtempo');
		jatuh_tempoan	= $obj.attr('data-jatuhtempoan');
		color			= $obj.attr('data-color');
		alamat			= $obj.attr('data-alamat');
		plg				= $obj.attr('data-plg');
		deposito		= $obj.attr('data-dp');
		deposito1		= $obj.attr('data-dp1');


		$('#no_pelanggan').val(no_pelanggan);
		$('#id_plg').val(idplg);
		$('#nama_pelanggan').val(nama_pelanggan);
		$('#no_ref').val(no_ref);
		$('#no_npwp').val(no_npwp);
		$('#no_sjln').val(no_sjln);
		$('#id_k_pelanggan').val(id_k_pelanggan);
		$('#keterangan').val(keterangan);
		$('#id_sales').val(id_sales);
		$('#max_hutang').val(max_hutang);
		$('#max_hutang1').val(max_hutang1);
		$('#hutang').val(hutang);
		$('#jatuh_tempo').val(jatuh_tempo);
		$('#jatuh_tempoan').val(jatuh_tempoan);
		$('#send').val(alamat);
		$('#idplg').val(plg);
		$('#dpt').val(deposito);
		$('#dpt1').val(deposito1);

		var ngutang			= parseInt($('#hutang').val());
		var maksimal		= parseInt($('#max_hutang1').val());
		if(ngutang > maksimal){
			document.getElementById("color").style.backgroundColor = "#FF6666"; 
			alert("Opps..Maaf Pelanggan Ini Tidak Bisa Melakukan Transaksi");
			$('#nama_barang').prop('disabled',true);
		}else{
			document.getElementById("color").style.backgroundColor = "#99FF99"; 
			$('#nama_barang').prop('disabled',false);
		}

	});
</script>
<script type="text/javascript">
	tampilan();
	function tampilan(){			
		
		$('.tampildata1').load("<?php echo base_url();?>Penjualan/view_detail_barang3");
		$("#tampilan").load("<?php echo base_url();?>Penjualan/view_detail_retur");	
	}
	$('#bt_simpan').on('click',function(){
		var nmbarang		=$('#nm_barang').val();
		var idplg			=$('#idplg').val();
		var idbrg			=$('#id_brg').val();
		var qty				=$('#qty').val();
		var stoke			=$('#stoke').val();
		var satuan			=$('#satuan').val();
		var hargajual		=$('#harga_jual').val();
		var hargamodal		=$('#harga_modal').val();
		var jual			=$('#hj').val();
		var jual1			=parseInt($('#hm').val());
		var diskon1			=$('#diskon1').val();
		var diskon2			=$('#diskon2').val();
		var jam				=$('#txt').val();

		if(nmbarang == 0){
			alert("Oops.. Nama Barang Masih Kosong");
			document.getElementById("nm_barang").focus();
		}else if(qty == 0){
			alert("Oops.. Qty Masih Kosong");
			document.getElementById("qty").focus();
		}else if(hargajual == 0){
			alert("Oops.. Harga Masih Kosong");
			document.getElementById("harga_jual").focus();
		}else{
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url()?>Penjualan/input_detail_retur",
                data : {idplg:idplg,idbrg:idbrg,qty:qty,satuan:satuan,hargajual:hargajual,diskon1:diskon1,diskon2:diskon2,jam:jam}, //dihapus,disc2:disc2
                success: function(data){
                	$('[name="idbrg"]').val("");
                	$('[name="nmbarang"]').val("");
                	$('[name="qty"]').val("");
                	$('[name="stoke"]').val("");
                	$('[name="satuan"]').val("");
                	$('[name="hargajual"]').val("");
                	$('[name="hargamodal"]').val("");
                	$('[name="diskon1"]').val("");
                	$('[name="diskon2"]').val("");
                	$('[name="hj"]').val("");
                	$('[name="hm"]').val("");

                	tampilan();
                	$('.tampildata').load("<?php echo base_url();?>Penjualan/view_detail_barang2");
                	document.getElementById("nm_barang").focus();
                }
            });
			
			$('.tampildata1').load("<?php echo base_url();?>Penjualan/view_detail_barang3");
		}
		return false;
	});
</script>


<script type="text/javascript">
	function startCalc(){
		interval = setInterval("calc()",1);}
		function calc(){
			
			one   = document.getElementById('modal1').value;
			two   = document.getElementById('disc').value;
			tri   = document.getElementById('sadis').value;
			four   = document.getElementById('disc1').value;
			five   = document.getElementById('disct').value;
			six   = document.getElementById('sadis1').value;
			document.getElementById('sadis').value =(one * 1) * (two / 100);
			document.getElementById('disct').value =(one * 1) - (tri * 1);
			document.getElementById('sadis1').value =(five * 1) * (four / 100);
			document.getElementById('disct1').value =(five * 1) - (six * 1);
		}
		function stopCalc(){
			clearInterval(interval);}

			

		</script>
		<script type="text/javascript">
			tampiltmp();
			cekbarang();
	//var stok = Interval.document.getElementById("stok").value;

	$('select').select2();
	function tampiltmp(){			
		
		$("#tampiltmp").load("<?php echo base_url();?>Penjualan/view_detail_barang");
		$('.tampildata1').load("<?php echo base_url();?>Penjualan/view_detail_barang3");	
		
	}
	$('#btn_simpan').on('click',function(){

		var namabarang		=$('#nama_barang').val();
		var idbarang		=$('#id_barang').val();
		var qtybes			=$('#Q_B').val();
		var stok			=parseInt($('#stok').val());
            //var qtykec		=$('#Q_K').val();
            var satuanbes		=$('#S_B').val();
            //var satuankec		=$('#S_K').val();
            var hargabeli		= $('#modal1').val();
            var jual			= $('#jual').val();
            var jual1			= parseInt($('#jual1').val());
           // var qik			=$('#Q_IK').val();
           var modal			=$('#modal').val();
           var disc			=$('#disc').val();
           var disc1			=$('#disc1').val();
           var disct			=$('#disct1').val();
           var komisi			=$('#komisi').val();
           var jam				=$('#txt').val();
           var cekbrg			=parseInt($('#cekbarang').val());

           if(namabarang == 0){
           	alert("Oops.. Nama Barang Masih Kosong");
           	document.getElementById("nama_barang").focus();
           }else if(cekbrg >= 24){
           	alert("Oops.. Barang Melebihi Batas");
           	$('[name="idbarang"]').val("");
           	$('[name="namabarang"]').val("");
           	$('[name="qtybes"]').val("");
                   // $('[name="qtykec"]').val("");
                   $('[name="satuanbes"]').val("");
                    //$('[name="satuankec"]').val("");
                    $('[name="hargabeli"]').val("");
                    $('[name="modalt"]').val("");
                    $('[name="qib"]').val("");
                    //$('[name="qik"]').val("");
                    $('[name="modal"]').val("");
                    $('[name="disc"]').val("");
                    $('[name="disc1"]').val("");
                    $('[name="disc2"]').val("");
                    $('[name="stok"]').val("");
                    $('[name="modal"]').val("");
                    document.getElementById("nama_barang").focus();
                }else if(qtybes == 0){
                	alert("Oops.. Qty Masih Kosong");
                	document.getElementById("Q_B").focus();
                }else if(qtybes > stok){
                	alert("Oops.. Stok Kurang");
                	document.getElementById("Q_B").focus();
                }else if(hargabeli == 0){
                	alert("Oops.. Pilih Pelanggan Dulu Untuk Memunculkan Harga");
                	document.getElementById("id_pelanggan").focus();
                }else if(jual < jual1){
                	alert("Oops.. Harga Kurang Dari Modal");
                	document.getElementById("jual").focus();
                }else if(jual == jual1){
                	alert("Oops.. Harga Sama Dengan Modal");
                	document.getElementById("jual").focus();
                }else if(disct < jual1){
                	$('#show').modal('show');
                	$('.ok').click(function () {
                		var password = $('#password').val();
                		var confirmPassword = $('#pass').val();
                		if (password != confirmPassword) {
                			alert("Oops.. Jangan Nakal Ya");
                			$('[name="password"]').val("");
                			confirmPassword('hide'); 
                		}else{
                			$.ajax({
                				type : "POST",
                				url  : "<?php echo base_url();?>Penjualan/input_detail_barang",
                data : {idbarang:idbarang,qtybes:qtybes,satuanbes:satuanbes,modal:modal,hargabeli:hargabeli,disc:disc,komisi:komisi,disc1:disc1,jam:jam}, //dihapus,disc2:disc2
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
                    $('[name="komisi"]').val("");
                    $('[name="stok"]').val("");
                    $('[name="j"]').val("");
                    $('[name="password"]').val("");
                    $('#show').modal('hide');
                    tampiltmp();
                    cekbarang();
                    $('.tampildata').load("<?php echo base_url();?>Penjualan/view_detail_barang2");
                    $('.tampildata1').load("<?php echo base_url();?>Penjualan/view_detail_barang3");
                    document.getElementById("nama_barang").focus();

                }
            });
                		} 
                	});
                }else{
                	$.ajax({
                		type : "POST",
                		url  : "<?php echo base_url();?>Penjualan/input_detail_barang",
                data : {idbarang:idbarang,qtybes:qtybes,satuanbes:satuanbes,modal:modal,hargabeli:hargabeli,disc:disc,komisi:komisi,disc1:disc1,jam:jam}, //dihapus,disc2:disc2
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
                    $('[name="komisi"]').val("");
                    $('[name="stok"]').val("");
                    $('[name="j"]').val("");
                    
                    tampiltmp();
                    cekbarang();
                    $('.tampildata').load("<?php echo base_url();?>Penjualan/view_detail_barang2");
                    document.getElementById("nama_barang").focus();

                }
            });


                	$('.tampildata1').load("<?php echo base_url();?>Penjualan/view_detail_barang3");
                }
                return false;
            });


        </script>
        <script>
        	$('#btn_simpan1').on('click',function(){
        		$('.tampildata3').load("<?php echo base_url();?>Penjualan/input_penjualan");
        	});
        </script>


        <script>

        	$('body').on('click', '.hapus_barang', function(e){
        		e.preventDefault();

        		var user = $(this).attr('data-user');
        		var id_barang = $(this).attr('data-idbarang');
        		var _this = $(this);

        		$.ajax({
        			type: 'post',
        			dataType: 'json',
        			url : "<?= site_url('Penjualan/destroy/');?>"+'/'+user+'/'+id_barang,
        			success: function(data){
        				cekbarang();
        				tampiltmp();
        				$('.tampildata').load("<?php echo base_url();?>Penjualan/view_detail_barang2");
        				$('.tampildata1').load("<?php echo base_url();?>Penjualan/view_detail_barang3");
        			}
        		});
        	});	
        </script>

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
        	$('body').on('click', '.hapus-retur', function(e){
        		e.preventDefault();

        		var id_brg = $(this).attr('data-idbrg');
        		var user = $(this).attr('data-user');
        		var _this = $(this);



        		$.ajax({
        			type: 'post',
        			dataType: 'json',
        			url : "<?= site_url('Penjualan/destroy2/');?>"+'/'+id_brg+'/'+user,
        			success: function(data){
        				tampilan();
        				$('.tampildata').load("<?php echo base_url();?>Penjualan/view_detail_barang2");
        				$('.tampildata1').load("<?php echo base_url();?>Penjualan/view_detail_barang3");
        			}
        		});
        	});	
        </script>
        <script>
        	document.onkeyup = function (e) {
        		var evt = window.event || e;   
        		if (evt.keyCode == 13 && evt.ctrlKey) {
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
		$('#status_kirim').focus();
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
$('#modal1').on('keypress', function(e) {
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