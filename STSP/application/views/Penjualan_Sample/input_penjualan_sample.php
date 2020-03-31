 <html >
 <head>
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">  <!-- Ionicons -->
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">  <!-- DataTables -->
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">  
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
 				<h3 class="box-title" style="margin-top:4px;margin-bottom:-19px;padding-bottom:4px;">Input Penjualan Non Data</h3>
 			</div>
 			<div class="box-body">
 				<div class="col-md-7">
 					<form class="form-horizontal" id="form"  method="POST" action="" enctype = "multipart/form-data">
 						<div class="form-group">
 							<label class="col-sm-40 control-label">No Invoice</label>
 							<div class="col-sm-37">
 								<input type="text" name="" id="" value="<?php echo $autonumber;?>" autocomplete="off" readonly  class="form-control" placeholder = " No Jual" >
 							</div>
 							<label class="col-sm-40 control-label">Tanggal Invoice</label>
 							<div class="col-sm-37">
 								<input type="text" name="tgl_trans"  value="<?php echo date('d-m-Y') ;?>"onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" readonly class="form-control" placeholder = " Tanggal Invoice">
 								<input type="hidden" name="tgl_invoice" id = "tgl_invoice" value="<?php echo date('Y-m-d') ;?>"onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" readonly class="form-control" placeholder = " Tanggal Invoice">
 								<textarea rows="1" style="display:none;" class="form-control" name="jam" id="txt" style="height: 34px;"readonly></textarea>
 								<input type="hidden" name="bulan" id = "bulan" value="<?php echo date('m') ;?>"onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" readonly class="form-control" placeholder = " Tanggal Invoice">
 								<input type="hidden" name="cetak" id = "#" value="1"onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" readonly class="form-control" placeholder = " Tanggal Invoice">
 							</div>
 							<label class="col-sm-40 control-label">Nama Pelanggan</label>
 							<div class="col-sm-37" style = "width:171px;">
 								<select name="id_pelanggan" id="id_pelanggan" class="select2"  style="width: 99%;" autofocus tabindex="1" required > 
 									<option value = "" selected="selected">Pilih Pelanggan</option>
 									<?php foreach ($listpelanggan->result() as $p){
 										$tanggalSekarang=date('d-m-Y');
 										$newTanggalSekarang=strtotime($tanggalSekarang);

 										$jumlahHari=$p->masa_hutang;
 										$NewjumlahHari=86400*$jumlahHari;

 										$hasilJumlah = $newTanggalSekarang + $NewjumlahHari;
 										$tampilHasil=date('Y-m-d',$hasilJumlah);

 										$tmp=date('d-m-Y',$hasilJumlah);

 										?>

 										<option value = "<?php echo $p->id_pelanggan;?>" data-alamat = "<?php echo $p->ship_to; ?>" data-dp1 = "<?php echo $p->deposit;?>" data-color = "<?php if($p->hutang > $p->max_hutang){ echo $color = "<span rows=1 class=form-control style=height: 34px;readonly><div bgcolor = red></div></span>";}elseif($p->hutang == 1){ echo $color = "<span rows=1 class=form-control style=height: 34px;readonly><div bgcolor = yellow></div></span>";}elseif($p->hutang == 0){ echo $color = "<span rows=1 class=form-control style=height: 34px;readonly><div bgcolor = green></div></span>";} ?>" data-hutang = "<?php echo $p->hutang;?>" data-nosjln = "<?php echo $p->no_sjln;?>" data-noref = "<?php echo $p->no_reff;?>" data-nopel = "<?php echo $p->id_pelanggan; ?>" data-jatuhtempo = "<?php echo $tampilHasil;?>" data-jatuhtempoan = "<?php echo $tmp;?>"data-max = "<?php echo $p->masa_hutang;?>" data-max1 = "<?php echo $p->max_hutang;?>" data-kategori = "<?php echo $p->id_k_pelanggan;?>" data-sales = "<?php echo $p->id_sales;?>" > <?php echo $p->nama_pelanggan;?> </option>

 									<?php } ?>
 								</select>
 							</div>
 						</div>

 						<div class="form-group">
 							<label class="col-sm-40 control-label">No Reff</label>
 							<div class="col-sm-37" >
 								<input type="hidden"  name="" id="no_pelanggan" autocomplete="off" readonly class="form-control" placeholder = " No Pel">
 								<input type="text"  name="no_reff" id="no_ref" autocomplete="off" readonly class="form-control" placeholder = " NO REFF">
 							</div>

 							<div class="col-sm-37" style = "width:63px;">
 								<input type="hidden"  name="no_urut" value="1" autocomplete="off" readonly class="form-control" placeholder = " No Ref">
 								<input type="hidden"  name="no_urut2" value="1" autocomplete="off" readonly class="form-control" placeholder = " No Ref">
 								<input type="hidden"  name="cetak" value="1" autocomplete="off" readonly class="form-control" placeholder = " No Ref">
 								<input type="hidden"  name="acc" value="0" autocomplete="off" readonly class="form-control" placeholder = " No Ref">
 							</div>
 							<label class="col-sm-40 control-label">Jatuh Tempo</label>
 							<div class="col-sm-37">
 								<input type="text"  name="jatuh_tempoan" id="jatuh_tempoan" readonly onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" class="form-control" placeholder = " JATUH TEMPO">
 								<input type="hidden" name="tempo" onFocus="startCalc();" readonly onBlur="stopCalc();" id="max_hutang" autocomplete="off" class="form-control" placeholder = " Tempo">
 							</div>
 							<label class="col-sm-40 control-label">Kategori</label>
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
 								<input type="hidden"  name="id_sales" id="id_sales" autocomplete="off"readonly class="form-control" placeholder = " Sales">
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

 							<div class="col-sm-35" style="width:150px">
 								<input type="text"  name="idbarang" id="id_barang" autocomplete="off" onkeyup="this.value=this.value.toUpperCase();" class="form-control" placeholder = "ID BARANG "  tabindex = "4">

 							</div>
 							<div class="col-sm-30" style="width:350px" >
 								<input type="text"  name="namabarang" id="nama_barang" onkeyup="this.value=this.value.toUpperCase();" class="form-control" placeholder = "NAMA BARANG (<-)" tabindex = "4" >
 							</div>

 							<div class="col-sm-35" style="width:90px">
 								<input type="text"  name="qtybes" id="Q_B" autocomplete="off" class="form-control" placeholder = "QTY "  tabindex = "5">

 							</div>
 							<div class="col-sm-35"style="width:80px">
 								<input type="text"  name="satuanbes" id="S_B" autocomplete="off"  onkeyup="this.value=this.value.toUpperCase();" class="form-control" placeholder = "SATUAN" tabindex = "6">

 							</div>
 							<div class="col-sm-30"  style="width:120px">

 								<input type="text" name="hargabeli" id="modal1"  autocomplete="off" class="form-control" placeholder = "HARGA JUAL" tabindex = "7">

 							</div>
 							<div class="col-sm-35" style="width:80px"  >
 								<input type="text"  name="disc" id="disc"  autocomplete="off" class="form-control" placeholder = "% 1" tabindex = "8">

 							</div>
 							<div class="col-sm-35" style="width:80px"  >
 								<input type="text"  name="disc1" id="disc1" autocomplete="off" class="form-control" placeholder = "% 2" tabindex = "9">

 							</div>
 							<div class="col-sm-31">
 								<input  type="submit" name = "btn_simpan" id="btn_simpan" value = "OK" class="btn btn-sm btn-primary"  tabindex="10">															
 							</div>

 							<table id = "#" class="table table-condensed" >
 								<thead bgcolor="#99FF99" id = "color">
 									<tr>
 										<th width = "5px" >No</th>
 										<th width = "127px" >ID Barang</th>
 										<th width = "340px" >Nama Barang</th>
 										<th width = "70px">Qty</th>
 										<th width = "70px">Satuan</th>
 										<th width = "100px">Harga Jual</th>
 										<th width = "50px">% 1</th>
 										<th width = "50px">% 2</th>
 										<th width = "130px">Sub Total</th>
 										<th width = "5px">A</th>
 									</tr>
 								</thead>
 								<tbody id = "tampiltmp">

 								</tbody>
 							</table>
 							<div class="form-group">
 								<label class="col-sm-29 control-label" style="margin-top: 8px;">Keterangan</label>
 								<div class="col-sm-33" style="width:750px">
 									<input type="text"  name="keterangan" id="ket" maxlength="50" autocomplete="off" autofocus tabindex = "11" class="form-control" placeholder = "KETERANGAN (F2)" onkeyup=" this.value=this.value.toUpperCase();">
 								</div>
 							</div>

 						</div>
 						<div class="col-md-3" style="margin-top: -9px;">
 							<div class="col-sm-41 tampildata1">
 							</div>
 							<textarea style="display:none" rows="1"class="form-control" name="total_belanja" id="total_belanja" style="height: 34px;"readonly></textarea>
 							<textarea style="display:none" rows="1"class="form-control" name="total" 		  id="tot" style="height: 34px;"readonly requered></textarea>
 							<textarea style="display:none" rows="1"class="form-control" name="totalan" 	  id="totalan" style="height: 34px;"readonly requered></textarea>
 							<textarea style="display:none" rows="1"class="form-control" name="kembali" 	  id="kem" style="height: 34px;"readonly></textarea>
 							<textarea style="display:none" rows="1"class="form-control" name="sisa" 		  id="sis" style="height: 34px;"readonly ></textarea>
 							<textarea style="display:none" rows="1"class="form-control" name="sisa2"  		  id="siso" style="height: 34px;"readonly></textarea>
 							<textarea style="display:none" rows="1"class="form-control" name="dp"  		  id="dpt2" style="height: 34px;"readonly></textarea>
 							<textarea style="display:none" rows="1"class="form-control" name="dp2"  		  id="dpt1" style="height: 34px;"readonly></textarea>
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
 							<input type="hidden" id="keg" 		name = "ket_giro" autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
 							<div class="form-group">
 								<table class = "table1">
 									<tr>
 										<td align = "right">
 											<input  type="submit" name = "submit2" id="simpan2" value = "SIMPAN CETAK" class="btn btn-sm btn-info"  tabindex="29">
 											<input style="display:none;" type="submit" name = "submit" id="btn_simpan1" value = "SIMPAN" class="btn btn-sm btn-primary" tabindex="30">
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
 		<?php echo $this->session->flashdata('error');
 		?>
 	</section>
 </div>
</body>

<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/number.js"></script>

<script type="text/javascript">
	$("#form").submit(function(){
		var total      	 = $("#tot").val();

		if(total == 0){

			alert("Oops.. Total Tidak Boleh Kosong");
			$("#cash2").focus();
			return false;

		}else{

			return true;
		}
	});
	$('#id_pelanggan').change(function(){
		var
		value 			= $(this).val(),
		$obj 			= $('#id_pelanggan option[value="'+value+'"]'),
		no_pelanggan	= $obj.attr('data-nopel');
		no_ref			= $obj.attr('data-noref');
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
		deposito1		= $obj.attr('data-dp1');
		alamat			= $obj.attr('data-alamat');


		$('#no_pelanggan').val(no_pelanggan);
		$('#no_ref').val(no_ref);
		$('#no_sjln').val(no_sjln);
		$('#id_k_pelanggan').val(id_k_pelanggan);
		$('#keterangan').val(keterangan);
		$('#id_sales').val(id_sales);
		$('#max_hutang').val(max_hutang);
		$('#max_hutang1').val(max_hutang1);
		$('#hutang').val(hutang);
		$('#jatuh_tempo').val(jatuh_tempo);
		$('#jatuh_tempoan').val(jatuh_tempoan);
		$('#dpt1').val(deposito1);
		$('#send').val(alamat);

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
	tampiltmp();
	//var stok = Interval.document.getElementById("stok").value;

	$('select').select2();
	function tampiltmp(){			
		
		$("#tampiltmp").load("<?php echo base_url();?>Penjualan_Sample/detail_sample");
		$('.tampildata1').load("<?php echo base_url();?>Penjualan_Sample/view_detail_barang3");			
	}
	$('#btn_simpan').on('click',function(){

		var idbarang		=$('#id_barang').val();
		var namabarang		=$('#nama_barang').val();
		var qtybes			=$('#Q_B').val();
            //var qtykec			=$('#Q_K').val();
            var satuanbes		=$('#S_B').val();
            //var satuankec		=$('#S_K').val();
            var hargabeli		= $('#modal1').val();
           // var qik				=$('#Q_IK').val();
           var disc			=$('#disc').val();
           var disc1			=$('#disc1').val();
           var jam				=$('#txt').val();

           if(idbarang == 0){
           	alert("Oops.. ID Barang Masih Kosong");
           	document.getElementById("id_barang").focus();
           }else if(namabarang == 0){
           	alert("Oops.. Nama Barang Masih Kosong");
           	document.getElementById("nama_barang").focus();
           }else if(qtybes == 0){
           	alert("Oops.. Qty Masih Kosong");
           	document.getElementById("Q_B").focus();
           }else if(satuanbes == 0){
           	alert("Oops.. Satuan Masih Kosong");
           	document.getElementById("S_B").focus();
           }else if(hargabeli == 0){
           	alert("Oops.. Harga Masih Kosong");
           	document.getElementById("modal1").focus();
           }else{
           	$.ajax({
           		type : "POST",
           		url  : "<?php echo base_url();?>Penjualan_Sample/input_detail_barang",
                data : {idbarang:idbarang,namabarang:namabarang,qtybes:qtybes,satuanbes:satuanbes,hargabeli:hargabeli,disc:disc,disc1:disc1,jam:jam}, //dihapus,disc2:disc2
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
                    $('[name="disc"]').val("");
                    $('[name="disc1"]').val("");
                    
                    tampiltmp();
                    $('.tampildata').load("<?php echo base_url();?>Penjualan_Sample/view_detail_barang2");

                }
            });


           	$('.tampildata1').load("<?php echo base_url();?>Penjualan_Sample/view_detail_barang3");
           }
           return false;
       });
	

   </script>
   <script>
   	$('#btn_simpan1').on('click',function(){
   		$('.tampildata3').load("<?php echo base_url();?>Penjualan_Sample/input_penjualan");
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
   			url : "<?= site_url('Penjualan_Sample/destroy/');?>"+'/'+user+'/'+id_barang,
   			success: function(data){
   				tampiltmp();
   				$('.tampildata').load("<?php echo base_url();?>Penjualan_Sample/view_detail_barang2");
   				$('.tampildata1').load("<?php echo base_url();?>Penjualan_Sample/view_detail_barang3");
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
		$('#id_barang').focus();
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