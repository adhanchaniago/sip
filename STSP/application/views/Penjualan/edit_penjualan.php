 <html >
 <head>
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">  <!-- Ionicons -->
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">  <!-- DataTables -->
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">  
 </head>
 <body class = "#" onLoad="startTime()" >	
 	<div class = "row " >
 		<section class="col-lg-12 connectedSortable">
 			<div class="box box-primary">
 				<div class="box-body">
 					<div class="col-md-7">
 						<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data">
 							<div class="form-group">
 								<label class="col-sm-40 control-label">No Invoice</label>
 								<div class="col-sm-37">
 									<input type="text" name="" id="" value="<?php echo $d['no_jual'];?>" autocomplete="off" readonly  class="form-control" placeholder = " No Jual" >
 								</div>
 								<label class="col-sm-40 control-label">Tanggal Invoice</label>
 								<div class="col-sm-37">
 									<input type="text" name="tgl_invoice" id = "tgl_invoice" value="<?php echo $d['tgl_invoice'] ;?>" onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" readonly class="form-control" placeholder = " Tanggal Invoice">
 								</div>
 								<label class="col-sm-40 control-label">Nama Pelanggan</label>
 								<div class="col-sm-37" style = "width:130px;">
 									<input type="text" name="" id = "tgl_invoice" value="<?php echo $d['nama_pelanggan'];?>" onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" readonly class="form-control" placeholder = " Tanggal Invoice">
 									
 								</div>
 							</div>
 							
 							<div class="form-group">
 								<label class="col-sm-40 control-label">No Reff</label>
 								<div class="col-sm-37" >
 									<input type="hidden"  name="id_pelanggan" value="<?php echo $d['id_pelanggan'];?>" id="no_pelanggan" autocomplete="off" readonly class="form-control" placeholder = " No Pel">
 									<input type="text"  name="no_reff" id="no_ref" value="<?php echo $d['no_reff'];?>" autocomplete="off" readonly class="form-control" placeholder = " No Reff">
 								</div>
 								
 								<div class="col-sm-37" style = "width:63px;">
 									<input type="hidden"  name="no_urut" value="<?php echo $d['no_urut'] ;?>" autocomplete="off" readonly class="form-control" placeholder = " No Ref">
 									<input type="hidden"  name="no_urut2" value="1" autocomplete="off" readonly class="form-control" placeholder = " No Ref">
 									<input type="hidden"  name="cetak" value="1" value="<?php echo $d['cetak'] ;?>" autocomplete="off" readonly class="form-control" placeholder = " No Ref">
 									<input type="hidden"  name="acc" value="0" value="<?php echo $d['acc'] ;?>" autocomplete="off" readonly class="form-control" placeholder = " No Ref">
 								</div>
 								<label class="col-sm-40 control-label">Tempo</label>
 								<div class="col-sm-37">
 									<input type="text" name="tempo" value="<?php echo $d['tempo'] ;?>" onFocus="startCalc();" readonly onBlur="stopCalc();" id="max_hutang" autocomplete="off" class="form-control" placeholder = " Tempo">
 								</div>
 								<label class="col-sm-40 control-label">Kategori</label>
 								<div class="col-sm-37">
 									<input type="text" name="id_k_pelanggan" value="<?php echo $d['id_k_pelanggan'] ;?>" id="id_k_pelanggan" autocomplete="off" readonly class="form-control" placeholder = " Kategori" >
 								</div>
 							</div>
 							<div class="form-group">
 								<div class="col-sm-37">
 									<input type="hidden" name="ket_pel" id="keterangan" class = "form-control"  autocomplete="off" placeholder = "Ket">
 								</div>
 								<div class="col-sm-37" style = "width:88px;">
 									<input type="hidden"  name="no_sj" id="no_sj" value="<?php echo $d['no_sj'];?>" autocomplete="off" readonly class="form-control" placeholder = " No SJ">
 								</div>
 								<div class="col-sm-37" style = "width:46px;">
 									<input type="hidden"  name="no_sjln" id="no_sjln" value="<?php echo $d['no_sjln'] ;?>" autocomplete="off" readonly class="form-control" placeholder = " No SJ">
 								</div>
 								<label class="col-sm-40 control-label"></label>
 								<div class="col-sm-37">
 									<input type="hidden"  name="jatuh_tempo" id="jatuh_tempo" value="<?php echo $d['jatuh_tempo'] ;?>" readonly onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" class="form-control" placeholder = " Jatuh Tempo">
 									<input type="hidden"  name="jatuh_tempoan" id="jatuh_tempoan" readonly onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" class="form-control" placeholder = " Jatuh Tempo">
 								</div>	
 								<div class="col-sm-37" width = "10px">
 									<input type="hidden"  name="max_hutang1" id="max_hutang1" autocomplete="off"readonly class="form-control" placeholder = " Sales">
 									<input type="hidden"  name="id_sales" id="id_sales" autocomplete="off" readonly class="form-control" placeholder = " Sales">
 									<input type="hidden"  name="" id="hutang" autocomplete="off"readonly class="form-control" placeholder = " Sales">
 								</div>
 							</div>
 						</div>							
 						<div class="col-md-5">
 							<div class="col-sm-41">
 								<textarea  type="text"  readonly name="ket_alamat" id="send" rows="2" style="width: 207px; height: 70; " autocomplete="off" class="form-control"  placeholder = " Ship To (F1) " onkeyup=" this.value=this.value.toUpperCase();"><?php echo $d['ket_alamat'] ;?></textarea>

 							</div>
 						</div>
 						<div class="col-md-4">
 							<!-- Asli $hasil5 -->
 							
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
 						<div class="col-md-9"  style="margin-top: -41px;">
 							<div class="col-sm-30" style="width:320px" >
 								<input type="text" name="namabarang" id="nama_barang" class="form-control" placeholder = "Nama Barang (<-)" tabindex = "4" >
 							</div>
 							<div class="col-sm-30" style="width:230px" >
 								<input type="hidden"  name="idbarang" id="id_barang" class="form-control" placeholder = "Barang" tabindex = "5">
 							</div>
 							<div class="col-sm-35" style="width:80px">
 								<input type="text" name="stok" id="stok" readonly  autocomplete="off" class="form-control" placeholder = "Stok ">
 								
 							</div>
 							<div class="col-sm-35" style="width:80px">
 								<input type="text"  name="qtybes" id="Q_B"   autocomplete="off" class="form-control" placeholder = "Qty "  tabindex = "6">
 								
 							</div>
 							<div class="col-sm-35"style="width:80px">
 								<input type="text"  name="satuanbes" id="S_B" readonly autocomplete="off" class="form-control" placeholder = "Satuan">
 								
 							</div>
 							<div class="col-sm-35" >
 								<input type="hidden" name = "qib" id="Q_IB"  readonly autocomplete="off" class="form-control" placeholder = "Q_IB">
 								
 							</div>
 							<div class="col-sm-30"  style="width:120px">
 								
 								<input type="text" name="hargabeli" id="modal1"  autocomplete="off" class="form-control" placeholder = "Harga Jual" tabindex = "8">
 								
 							</div>
 							<div class="col-sm-30" style="width:120px" >
 								<input type="text" name="modal" id="modal" readonly autocomplete="off" class="form-control" placeholder = "Modal">
 							</div>
 							<div class="col-sm-35" style="width:80px"  >
 								<input type="text"  name="disc" id="disc"  autocomplete="off" class="form-control" placeholder = "Disc 1" tabindex = "9">
 								
 							</div>
 							<div class="col-sm-35" style="width:80px"  >
 								<input type="text"  name="disc1" id="disc1" autocomplete="off" class="form-control" placeholder = "Disc 2" tabindex = "10">
 								<textarea rows="1" style="display:none;" class="form-control" name="jam" id="txt" style="height: 34px;"readonly></textarea>
 								
 							</div>
 							<div class="col-sm-31">
 								<button type="submit" class="btn btn-sm btn-primary" name="btn_simpan" id="btn_simpan"  tabindex = "11">OK</button>
 								
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
 								<tbody>
 									<?php
 									$no = 1;
 									$sub = 0;
 									$no_jual = $this->uri->segment(3);
 									$query = "SELECT tb_penjualan.no_jual,tb_detail_penjualan.id_barang,tb_detail_penjualan.qtyb,tb_detail_penjualan.satuan_besar,tb_detail_penjualan.harga_beli,tb_detail_penjualan.disc,tb_detail_penjualan.disc1,tb_barang.nama_barang FROM tb_penjualan INNER JOIN tb_detail_penjualan ON tb_penjualan.no_jual=tb_detail_penjualan.no_jual INNER JOIN tb_barang ON tb_detail_penjualan.id_barang = tb_barang.id_barang WHERE tb_penjualan.no_jual = '$no_jual'";
 									$cari = $this->db->query($query);
 									if(isset($cari)){
 										foreach ($cari->result_array() as $t){
 											$subtotal = $t['qtyb']*$t['harga_beli'];
 											$diskon =$t['qtyb']*$t['harga_beli']*$t['disc']/100;
 											$hasil =$subtotal-$diskon;
 											$hasil2 =$hasil*$t['disc1']/100;
 											$hasil3 =$hasil-$hasil2;
 											
									//$total = $total+$hasil3;
 											?>
 											
 											<tr>
 												<td><?php echo $no;?></td>
 												<td><?php echo $t['nama_barang'];?></td>
 												<td><?php echo $t['qtyb'];?></td>
 												<td><?php echo $t['satuan_besar'];?></td>
 												<td><?php echo number_format($t['harga_beli'],2);?></td>
 												<td><?php echo $t['disc'];?></td>
 												<td><?php echo $t['disc1'];?></td>
 												<td><?php echo number_format($hasil3,2);?></td>
 											</tr>
 											<?php $no++;}} ?>
 										</tbody>
 									</table>
 									<div class="form-group">
 										<label class="col-sm-29 control-label" style="margin-top: 8px;">Keterangan</label>
 										<div class="col-sm-33" style="width:750px">
 											<input type="text"  name="keterangan" id="ket"  autocomplete="off" autofocus class="form-control" placeholder = "Keterangan (F2)" onkeyup=" this.value=this.value.toUpperCase();">
 										</div>
 									</div>
 								</div>
 								<div class="col-md-3" style="margin-top: -9px;">
 									<div class="col-sm-41 tampildata1">
 									</div>
 									<textarea style="display:none;" rows="1"class="form-control" name="total_belanja" id="total_belanja" style="height: 34px;"readonly></textarea>
 									<textarea style="display:none;" rows="1"class="form-control" name="total_retur"   id="total_retur" style="height: 34px;"readonly></textarea>
 									<textarea style="display:none;" rows="1"class="form-control" name="total" 		  id="tot" style="height: 34px;"readonly requered></textarea>
 									<textarea style="display:none;" rows="1"class="form-control" name="kembali" 	  id="kem" style="height: 34px;"readonly></textarea>
 									<textarea style="display:none;" rows="1"class="form-control" name="sisa" 		  id="sis" style="height: 34px;"readonly ></textarea>
 									<textarea style="display:none;" rows="1"class="form-control" name="sisa2"  		  id="siso" style="height: 34px;"readonly></textarea>
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
 										<div class="col-sm-33" style="width: 179px;px;margin-left:95px;margin-top: -14px;margin-bottom: 8px;">
 											<select class="form-control" name = "status_kirim" id="status_kirim"  tabindex="28">
 												<option value = "1">Di Kirim</option>
 												<option value = "0" >Di Ambil Sendiri</option>
 											</select>
 										</div>
 										<table style = "width:1000px; margin-left:34px">
 											<tr>
 												<td>
 													<?php if($this->session->userdata('level') === 'Administrator'  OR $this->session->userdata('level') === 'Kasir Thermal' OR $this->session->userdata('level') === 'Manager'): ?>
 													<input  type="submit" name = "submit2" id="simpan2" value = "Cetak Thermal" class="btn btn-sm btn-primary"  tabindex="29">
 												<?php endif; ?>
 												<?php if($this->session->userdata('level') === 'Administrator'  OR $this->session->userdata('level') === 'Kasir A5' OR $this->session->userdata('level') === 'Manager'): ?>
 												<input  type="submit" name = "submit3" id="simpan3" value = "Cetak A5" class="btn btn-sm btn-success"  tabindex="29">
 											<?php endif;?>
 											<input style="display:none;" type="submit" name = "submit" id="btn_simpan1" value = "Simpan" class="btn btn-sm btn-primary" tabindex="30">
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
	tampiltmp();
	
	$('select').select2();
	function tampiltmp(){			
		
		$("#tampiltmp").load("<?php echo base_url();?>Penjualan/view_detail_barang");		
	}
	$('#btn_simpan').on('click',function(){
		var namabarang		=$('#nama_barang').val();
		var idbarang		=$('#id_barang').val();
		var qtybes			=$('#Q_B').val();
		var satuanbes		=$('#S_B').val();
		var hargabeli		=$('#modal1').val();
		var stok			=$('#stok').val();
		var modal			=$('#modal').val();
		var disc			=$('#disc').val();
		var disc1			=$('#disc1').val();
		var jam				=$('#txt').val();
		$.ajax({
			type : "POST",
			url  : "<?php echo base_url();?>Penjualan/input_detail_barang",
                data : {idbarang:idbarang,qtybes:qtybes,satuanbes:satuanbes,modal:modal,hargabeli:hargabeli,disc:disc,disc1:disc1,jam:jam}, //dihapus,disc2:disc2
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
                    
                    tampiltmp();
                    $('.tampildata').load("<?php echo base_url();?>Penjualan/view_detail_barang2");
                    
                }
            });
		
		$('.tampildata1').load("<?php echo base_url();?>Penjualan/view_detail_barang3");
		return false;
	});
	
	
</script>
<script>
	$('#btn_simpan1').on('click',function(){
		$('.tampildata3').load("<?php echo base_url();?>Penjualan/input_penjualan");
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
			url : "<?= site_url('Penjualan/destroy/');?>"+'/'+user+'/'+id_barang,
			success: function(data){
				tampiltmp();
				$('.tampildata').load("<?php echo base_url();?>Penjualan/view_detail_barang2");
				$('.tampildata1').load("<?php echo base_url();?>Penjualan/view_detail_barang3");
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