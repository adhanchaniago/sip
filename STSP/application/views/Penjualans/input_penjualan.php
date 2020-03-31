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
				<h3 class="box-title" style="margin-top:4px;margin-bottom:-19px;padding-bottom:4px;">Input Penjualan</h3>
			</div>
			<div class="box-body">
				<div class="col-md-7">
					<form class="form-horizontal"  method="POST" id="form" action="" enctype = "multipart/form-data">
						<div class="form-group">
							<label class="col-sm-40 control-label">No Invoice</label>
							<div class="col-sm-37">
								<input type="text" name="no_jual" id="" value="<?php echo $autonumber;?>" autocomplete="off" readonly  class="form-control" placeholder = " No Jual" >
							</div>
							<label class="col-sm-40 control-label">Tanggal Invoice</label>
							<div class="col-sm-37">
								<input type="hidden" name="tgl"  value="<?php echo date('Y-m-d') ;?>"onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" readonly class="form-control" placeholder = " Tanggal Invoice">
								<input type="text" name="tgl_invoice" id = "tgl_invoice" value="<?php echo date('d-m-Y') ;?>"onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" readonly class="form-control" placeholder = " Tanggal Invoice">
							</div>
							<label class="col-sm-40 control-label">No Surat Jalan</label>
							<div class="col-sm-37" style = "width:171px;">
								<input type="text" readonly="" name="" id="" autocomplete="off" readonly class="form-control" value="<?php echo $this->uri->segment(3);?>/<?php echo $g['id_pelanggan'];?>/<?php echo $g['no_reff_sj'];?>" placeholder = " No Pel">
								<input type="hidden" readonly="" name="nojual" id="no_jual" autocomplete="off" readonly class="form-control" value="<?php echo $this->uri->segment(3);?>" placeholder = " No Pel">
								<input type="hidden" readonly="" name="no_reff_sj" id="no_reff_sj" autocomplete="off" readonly class="form-control" value="<?php echo $g['no_reff_sj'];?>" placeholder = " No Pel">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-40 control-label">No Reff</label>
							<div class="col-sm-37" >
								<input type="hidden"  name="id_pelanggan"  value = "<?php echo $g['id_pelanggan'];?>" id="id_plg" autocomplete="off" readonly class="form-control" placeholder = " No Pel">
								<input type="text"  name="no_reff" value = "<?php echo $g['no_reff'];?>" id="no_ref" autocomplete="off" readonly class="form-control" placeholder = " NO REFF">
							</div>
							<label class="col-sm-40 control-label">Jatuh Tempo</label>
							<div class="col-sm-37">
								<input type="text" value = "<?php echo date('d-m-Y',strtotime($g['jatuh_tempo']));?>" name="jatuh_tempoan" id="jatuh_tempoan" readonly  autocomplete="off" class="form-control" placeholder = " JATUH TEMPO">
								<input type="hidden" value = "<?php echo $g['jatuh_tempo'];?>" name="jatuh_tempo" id="jatuh_tempo" readonly  autocomplete="off" class="form-control" placeholder = " JATUH TEMPO">
							</div>
							<label class="col-sm-40 control-label">Nama Pelanggan</label>
							<div class="col-sm-37" style = "width:171px;">
								<input type="text" value = "<?php echo $g['nama_pelanggan'];?>" name="" id="" autocomplete="off" readonly class="form-control" placeholder = " KATEGORI" >
								<input type="hidden" value = "<?php echo $g['id_k_pelanggan'];?>" name="id_k_pelanggan" id="id_k_pelanggan" autocomplete="off" readonly class="form-control" placeholder = " KATEGORI" >
							</div>
						</div>
						<div class="form-group">	
							<div class="col-sm-37" width = "10px">
								<input type="hidden"  name="id_karyawan" id="id_sales" value = "<?php echo $g['id_karyawan'];?>" autocomplete="off"readonly class="form-control" placeholder = " Sales">
								<input type="hidden"  name="no_npwp" id="no_npwp" value = "<?php echo $g['no_npwp'];?>" autocomplete="off"readonly class="form-control" placeholder = " Sales">
							</div>
						</div>
					</div>				
					<div class="col-md-5">
						<div class="col-sm-41">
							<textarea type="text"  name="ket_alamat"  maxlength="50"  id="send" rows="2" style="width: 159px; height: 70; margin-left:34px;" autocomplete="off" class="form-control"  placeholder = " SHIP TO (F1) " onkeyup=" this.value=this.value.toUpperCase();"><?php echo $g['ke_alamat'];?></textarea>

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
								<input type="text"  name="namabarang" id="nama_barang" autofocus="" class="form-control block" placeholder = "NAMA BARANG (<-)" tabindex = "4" >
							</div>
							<div class="col-sm-30" style="width:230px" >
								<input type="hidden"  name="idbarang" id="id_barang" class="form-control" placeholder = "Barang" tabindex = "5">
								<input type="hidden" name="cekbarang" id="cekbarang">
							</div>
							<div class="col-sm-35" style="width:80px">
								<input type="text" name="stok" id="stok" readonly  autocomplete="off" class="form-control" placeholder = "STOK ">
								
							</div>
							<div class="col-sm-35" style="width:80px">
								<input type="text"  name="qtybes" id="Q_B" readonly autocomplete="off" onFocus="startCalc();" onkeyup="copytextbox1();"class="form-control" placeholder = "QTY ">
								
							</div>
							<div class="col-sm-35"style="width:80px">
								<input type="text"  name="satuanbes" id="S_B" readonly autocomplete="off" class="form-control" placeholder = "SATUAN">
								
							</div>
							<div class="col-sm-35" >
								<input type="hidden" name = "qib" id="Q_IB" readonly autocomplete="off" class="form-control" placeholder = "Q_IB">
								
							</div>
							<div class="col-sm-30"  style="width:120px">
								<input type="text" name="jual" id="jual" autocomplete="off" onFocus="startCalc();"  class="form-control currency" placeholder = "HARGA JUAL" tabindex = "8">
								<input type="hidden" name="hargabeli" id="modal1" autocomplete="off" class="form-control" placeholder = "HARGA JUAL3" tabindex = "8">								
								<input type="hidden" name="hasil1" id="hasil1" onFocus="startCalc();"  autocomplete="off" class="form-control" placeholder = "HASIL">
								<input type="hidden" name="hasil_akhir" id="hasil_akhir" onFocus="startCalc();"  autocomplete="off" class="form-control" placeholder = "HASIL">
							</div>
							<div class="col-sm-30" style="width:120px" >
								<input type="text" name="jual" id="jual1" readonly autocomplete="off" class="form-control" placeholder = "MODAL" onFocus="startCalc();">
								<input type="hidden" name="modal" id="modal" readonly autocomplete="off" class="form-control" placeholder = "MODAL">
							</div>
							<div class="col-sm-35" style="width:80px"  >
								<input type="hidden"  name="komisi" id="komisi"  autocomplete="off" class="form-control" placeholder = "% 1" tabindex = "9">
								<input type="text"  name="disc" id="disc"  autocomplete="off" class="form-control" placeholder = "% 1" tabindex = "9">
								<input type="hidden" name="hasil" id="hasil" onFocus="startCalc();"  autocomplete="off" class="form-control" placeholder = "HASIL">
								
							</div>
							<div class="col-sm-35" style="width:80px"  >
								<input type="text"  name="disc1" id="disc1" autocomplete="off" class="form-control" placeholder = "% 2" tabindex = "10">
								<input type="hidden" name="hasil2" id="hasil2" onFocus="startCalc();"  autocomplete="off" class="form-control" placeholder = "HASIL">
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
									</tr>
								</thead>
								<tbody id = "tampiltmp">

								</tbody>
							</table>
							<div class="form-group">
								<label class="col-sm-29 control-label" style="margin-top: 8px;">Keterangan</label>
								<div class="col-sm-33" style="width:750px">
									<input type="text"  name="keterangan" value = "<?php echo $g['keterangan'];?>" id="ket" maxlength="50" autocomplete="off" class="form-control" placeholder = "KETERANGAN (F2)" onkeyup=" this.value=this.value.toUpperCase();">
								</div>
							</div>
							
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

								<table class = "table1">
									<tr>
										<td align = "right">
											<input type="submit" name = "submit" id="btn_simpan1" value = "SIMPAN" class="btn btn-sm btn-primary" tabindex="109">
											<?php if($this->session->userdata('level') === 'Administrator'  OR $this->session->userdata('level') === 'KasirThermal'  OR $this->session->userdata('level') === 'Manager'): ?>
											<input type="submit" name = "submit3" id="submit3" value = "SIMPAN & CETAK" class="btn btn-sm btn-success"tabindex="110" >
										<?php endif;?>
										<a href = "<?php echo base_url();?>Penjualans/view_penjualan" class = "btn btn-sm btn-danger"  tabindex="111">Cancel</a>

									</td>
								</tr>
							</table>
						</div>
					</div>
				</form>
			</div>
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




<div class="modal fade bd-example-modal-lg pelanggan" id="akun" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" style="width:429px; margin-left:250px">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Data Akun</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<br>
			<div class="modal-body" style = "width:300px;">
				<table  class="table table-condensed" id = "example2" style = "width:390px;">
					<thead bgcolor="#99FF99">
						<tr>

							<th><b>Kode akun</b> </th>
							<th><b>Nama Akun</b> </th>
							<th><b>A</b> </th>
						</tr>
					</thead>

					<tbody >
						<tr>
							<?php
							$query1 = "SELECT * FROM daftar_subakun";
							$cari1 = $this->db->query($query1);

							?>
							<?php
							foreach ($cari1->result_array() as $p){
								?>
								<td><?php echo $p['kode_subakun']?></td>
								<td><?php echo $p['nama']?></td>
								<td><a href="#" class="btn btn-xs btn-primary akuns" data-kodes="<?php echo $p['kode_subakun'];?>" data-nama="<?php echo $p['nama'];?>" data-nama1="Potongan" data-nama2="Penjualan"><i class="fa fa-plus"></i></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>

			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
<div class="modal fade bd-example-modal-lg pelanggan" id="akun2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" style="width:429px; margin-left:250px">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Data Akun</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<br>
			<div class="modal-body" style = "width:300px;">
				<table  class="table table-condensed" id = "example" style = "width:390px;">
					<thead bgcolor="#99FF99">
						<tr>

							<th><b>Kode akun</b> </th>
							<th><b>Nama Akun</b> </th>
							<th><b>A</b> </th>
						</tr>
					</thead>

					<tbody >
						<tr>
							<?php
							$query1 = "SELECT * FROM daftar_subakun";
							$cari1 = $this->db->query($query1);

							?>
							<?php
							foreach ($cari1->result_array() as $p){
								?>
								<td><?php echo $p['kode_subakun']?></td>
								<td><?php echo $p['nama']?></td>
								<td><a href="#" class="btn btn-xs btn-primary akuns2" data-kodes="<?php echo $p['kode_subakun'];?>" data-nama="<?php echo $p['nama'];?>" data-nama1="Biaya lain" data-nama2="Penjualan"><i class="fa fa-plus"></i></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>

			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<div class="modal fade bd-example-modal-lg pelanggan" id="pwalk1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<br>
	<br>
	<div class="modal-dialog modal-lg" role="document" style="width:300px;align-content: center;">
		<div class="modal-content" >
			<br>
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-12 ">
				</div>
			</div>
			<div class="modal-footer">
				<div class="col-sm-12">
					<div class="form-group">
						<table class = "table1">
							<tr>
								<td align = "right">
									<input type="submit" name = "submit" id="btn_simpan1" value = "SIMPAN" class="btn btn-sm btn-primary">
									<?php if($this->session->userdata('level') === 'Administrator'  OR $this->session->userdata('level') === 'KasirThermal'  OR $this->session->userdata('level') === 'Manager'): ?>
									<input type="submit" name = "submit2" id="simpan2" value = "SIMPAN & CETAK" class="btn btn-sm btn-info" >
								<?php endif;?>
								<a href = "#" data-dismiss="modal" aria-label="Close" class = "btn btn-sm btn-danger">Cancel</a>
							</td>
						</tr>
					</table>
				</div>
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

<script type="text/javascript">

	$(function(){
		$('#btn_pwalk').click(function(){
			// $('#pwalk1').modal('show');
		});
		$('.akuns').on('click',function(){
			var kode_akun= $(this).attr('data-kodes');
			var nama 	 = $(this).attr('data-nama');
			var nama1 	 = $(this).attr('data-nama1');
			var nama2 	 = $(this).attr('data-nama2');
			$("#kode_akun").val(kode_akun);
			$("#nama_akun").val(nama);
			$('#akun').modal('hide');
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url()?>Penjualans/input_bebas",
				data : {
					kode_akun 		: kode_akun,
					nama1 			: nama1,
					nama2 			: nama2,
				}, 
				success: function(data){
				}
			});

		});

		$('.akuns2').on('click',function(){
			var kode_akun= $(this).attr('data-kodes');
			var nama 	 = $(this).attr('data-nama');
			var nama1 	 = $(this).attr('data-nama1');
			var nama2 	 = $(this).attr('data-nama2');
			$("#kode_akun").val(kode_akun);
			$("#nama_akun").val(nama);
			$('#akun2').modal('hide');
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url()?>Penjualans/input_bebas",
				data : {
					kode_akun 		: kode_akun,
					nama1 			: nama1,
					nama2 			: nama2,
				}, 
				success: function(data){
				}
			});

		});

	});
</script>
<script>
var test = $().attr();

	cekbarang();
	function cekbarang(){

		var idbarang = $("#id_barang").val();
		$.ajax({
			type    : 'POST',
			url     : '<?php echo site_url(); ?>Penjualans/cekbarang',
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
		var no_jual = $("#no_jual").val();
		$('#nama_barang').autocomplete({
			serviceUrl: site+'Penjualans/get_data/'+no_jual,
			onSelect: function (suggestion) {
				$('#id_barang').val(''+suggestion.id_barang); 
				$('#stok').val(''+suggestion.stok); 
				$('#S_B').val(''+suggestion.satuan_besar); 
				$('#Q_B').val(''+suggestion.qtyb); 
				$('#komisi').val(''+suggestion.komisi); 
				$('#modal').val(''+suggestion.modal);
				$('#jual').val(''+suggestion.harga_beli);
				$('#disc').val(''+suggestion.disc);
				$('#disc1').val(''+suggestion.disc1);

				var jual        = $("#jual").val();
				var jual1 		= $('#modal').val();

				var jual        = jual.replace(/\,/g, '');
				var jual1        = jual1.replace(/\,/g, '');
				$('#jual').val(formatUang(jual*1));
				
				$('#jual1').val(jual1);
				$('#modal1').val(jual);

			}

		});
	});
</script>
<script> 
	function formatUang(angka) {
		if (typeof(angka) != 'string') angka = angka.toString();
		var reg = new RegExp('([0-9]+)([0-9]{3})');
		while(reg.test(angka)) angka = angka.replace(reg, '$1,$2');
		return angka;
	}

	$(function(){
		$('#nama_barang,#nm_barang,#jual').change(function(){

			$('#Q_B,#jual').keyup(function(){

				var jual        = $("#jual").val();
				var jual1 		= $('#jual1').val();
				var modal 		= $('#modal').val();

				var jual        = jual.replace(/\,/g, '');
				var jual1       = jual1.replace(/\,/g, '');
				var modal       = modal.replace(/\,/g, '');

				$('#jual').val(formatUang(jual*1));
				$('#jual1').val(formatUang(Math.round(jual1)));
				$('#modal').val(Math.round(modal));
				$('#modal1').val(jual);


			});
		});
	});
</script>
<script>
	var site = "<?php echo site_url();?>";
	$(function(){
		
		$('#nm_barang').autocomplete({
			serviceUrl: site+'Penjualans/get_data',
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
	
	$('#no_jual').change(function(){
		var
		value 			= $(this).val(),
		$obj 			= $('#no_jual option[value="'+value+'"]'),
		idplg			= $obj.attr('data-idplg');
		no_pelanggan	= $obj.attr('data-nopel');
		nama_pelanggan	= $obj.attr('data-nama');
		no_ref			= $obj.attr('data-noref');
		noreff			= $obj.attr('data-noreff');
		no_npwp			= $obj.attr('data-no_npwp');
		no_sjln			= $obj.attr('data-nosjln');
		no_sjln			= $obj.attr('data-kategori1');
		id_kategori		= $obj.attr('data-kategori');
		keterangan 		= $obj.attr('data-keterangan');
		id_sales 		= $obj.attr('data-sales');
		max_hutang		= $obj.attr('data-max');
		max_hutang1		= $obj.attr('data-max1');
		hutang			= $obj.attr('data-hutang');
		jatuh_tempo		= $obj.attr('data-tempo');
		jatuh_tempoan	= $obj.attr('data-tempo1');
		color			= $obj.attr('data-color');
		alamat			= $obj.attr('data-alamat');
		plg				= $obj.attr('data-plg');
		deposito		= $obj.attr('data-dp');
		deposito1		= $obj.attr('data-dp1');


		$('#no_pelanggan').val(no_pelanggan);
		$('#id_plg').val(idplg);
		$('#nama_pelanggan').val(nama_pelanggan);
		$('#no_ref').val(noreff);
		$('#no_npwp').val(no_npwp);
		$('#no_sjln').val(no_sjln);
		$('#id_k_pelanggan').val(id_kategori);
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
		var no_jual = $('#no_jual').val();

		var ngutang			= parseInt($('#hutang').val());
		var maksimal		= parseInt($('#max_hutang1').val());
		if(ngutang > maksimal){
			document.getElementById("color").style.backgroundColor = "#FF6666"; 
		}else{
			document.getElementById("color").style.backgroundColor = "#99FF99"; 
		}



	});
</script>
<script type="text/javascript">
	tampilan();
	function tampilan(){	

		var no_jual 	 = $('#no_jual').val();
		$('.tampildata').load("<?php echo base_url();?>Penjualans/view_detail_barang2/"+no_jual);

		$.ajax({
			type    : "POST",
			url     : "<?php echo base_url(); ?>penjualans/view_detail_barang/",
			data    : {no_jual:no_jual},
			cache   : false,
			success : function(respond){
				$("#tampiltmp").html(respond);
				var sub = $('#subtotaltemp').val();
				$('#grandtotals').text(sub);
				$('#subtotals').val(sub);
				$('#belanja').val(sub);
				$('#total').val(sub);
				$('#grand').val(sub);	
			}
		});

		$.ajax({
			type    : "POST",
			url     : "<?php echo base_url(); ?>penjualans/view_detail_barangsj/",
			data    : {no_jual:no_jual},
			cache   : false,
			success : function(respond){
				$("#tampiltmpsj").html(respond);
			}
		});	

		$.ajax({
			type    : "POST",
			url     : "<?php echo base_url(); ?>penjualans/view_detail_barang3/",
			data    : '',
			cache   : false,
			success : function(respond){
				$(".tampildata1").html(respond);
				$('#potongan').focus();
			}
		});		
		
	}
	
</script>


<script type="text/javascript">
	function startCalc(){
		interval = setInterval("calc()",1);}
		function calc(){
			
			hiji   = document.getElementById('modal1').value;
			dua   = document.getElementById('disc').value;
			tilu = document.getElementById('disc1').value;
			opat = document.getElementById('hasil').value;
			lima = document.getElementById('hasil1').value;
			genab = document.getElementById('hasil2').value;
			document.getElementById('hasil').value =(hiji * 1) * (dua / 100);
			document.getElementById('hasil1').value =(hiji * 1) - (opat * 1);
			document.getElementById('hasil2').value =(lima * 1) * (tilu / 100);
			document.getElementById('hasil_akhir').value =(lima * 1) - (genab * 1);
		}
		function stopCalc(){
			clearInterval(interval);}

			

		</script>
		<script type="text/javascript">
			cekbarang();


			$('select').select2();
			
			$('#btn_simpan').on('click',function(){

				var namabarang		=$('#nama_barang').val();
				var idbarang		=$('#id_barang').val();
				var qtybes			=$('#Q_B').val();
				var stok			=parseInt($('#stok').val());
				var satuanbes		=$('#S_B').val();
				var hargabeli		= $('#modal1').val();
				var nojual			= $('#no_jual').val();
				var jual			= $('#jual').val();
				var jual1			= parseInt($('#jual1').val());
				var modal			=$('#modal').val();
				var disc			=$('#disc').val();
				var disc1			=$('#disc1').val();
				var disct			=$('#disct1').val();
				var komisi			=$('#komisi').val();
				var jam				=$('#txt').val();
				var hasilakhir		=$('#hasil_akhir').val();
				var cekbrg			=parseInt($('#cekbarang').val());
				if(namabarang == 0){
					alert("Oops.. Nama Barang Masih Kosong");
					document.getElementById("nama_barang").focus();
				}else if(hasilakhir < jual1){
					alert("Oops.. Harga Tidak Boleh Kurang Dari Modal");
					document.getElementById("jual").focus();
				}else{
					$.ajax({
						type : "POST",
						url  : "<?php echo base_url();?>Penjualans/input_detail_barang",
						data : {
							idbarang:idbarang,qtybes:qtybes,satuanbes:satuanbes,modal:modal,jual:jual,disc:disc,komisi:komisi,disc1:disc1,jam:jam,nojual:nojual
						},
						success: function(data){
							$('[name="idbarang"]').val("");
							$('[name="namabarang"]').val("");
							$('[name="qtybes"]').val("");
							$('[name="satuanbes"]').val("");
							$('[name="hargabeli"]').val("");
							$('[name="qib"]').val("");
							$('[name="modal"]').val("");
							$('[name="disc"]').val("");
							$('[name="disc1"]').val("");
							$('[name="komisi"]').val("");
							$('[name="stok"]').val("");
							$('[name="jual"]').val("");
							tampilan();
							cekbarang();
							document.getElementById("nama_barang").focus();

						}
					});
					tampilan();
				}
				return false;
			});


		</script>
		<script>
			$('#btn_simpan1').on('click',function(){
				$('.tampildata3').load("<?php echo base_url();?>Penjualans/input_penjualan");
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
					url : "<?= site_url('Penjualans/destroy/');?>"+'/'+user+'/'+id_barang,
					success: function(data){
						cekbarang();
						tampiltmp();
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
					url : "<?= site_url('Penjualans/destroy2/');?>"+'/'+id_brg+'/'+user,
					success: function(data){
						tampilan();
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
		$('#potongan').focus();
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