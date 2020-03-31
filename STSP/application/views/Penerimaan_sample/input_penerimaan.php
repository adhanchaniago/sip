 <html>
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
 <body onLoad="startTime()">	

 	<div class = "row">
 		<section class="col-lg-12 connectedSortable" style = "margin-left:-3px;width:100%;">
 			<div class="box box-primary" > 
 				<h3 class="box-title" style="margin-top: 4px;margin-bottom: -19px;padding-bottom: 4PX;" >Input Penerimaan Non Data</h3>
 			</div>
 			<div class="box-body">
 				<div class="col-md-7">
 					<form class="form-horizontal"  method="POST" id="" action="" enctype = "multipart/form-data">
 						<div class="form-group">
 							<label class="col-sm-40 control-label" style="width: 179px;">No Bukti</label>
 							<div class="col-sm-37" style="margin-left: -77px;">
 								<input type="text" name="" id="" value="<?php echo $autonumber;?>" autocomplete="off" readonly  class="form-control" placeholder = " No Jual">
 							</div>
 							<div class="form-group">
 								<label class="col-sm-40 control-label" style="margin-left: 6px;width: 179px;">Tanggal </label>
 								<div class="col-sm-37" style="margin-left: -81px;">
 									<input type="text" name="tgl_bayar" id = "tgl_bayar" value="<?php echo date('d-m-Y') ;?>"onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" readonly class="form-control" placeholder = " Tanggal Invoice">
 									<input type="hidden" name="bulan" id = "bulan" value="<?php echo date('m') ;?>"onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" readonly class="form-control" placeholder = " Tanggal Invoice">
 									<textarea rows="1" style = "display:none;" class="form-control" name="jam" id="txt" style="height: 34px;"readonly></textarea>
 									<input type="hidden" name="no_reff" id = "no_reff" value = "<?php echo $p['no_bar'];?>" autocomplete="off" readonly class="form-control" placeholder = " Tanggal Invoice">
 									<input type="hidden" name="no_urut" id = "" value="1" onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" readonly class="form-control" placeholder = " Tanggal Invoice">
 								</div>
 								<label class="col-sm-40 control-label"  style="margin-left: 6px;width: 179px;">Nama Pelanggan</label>
 								<div class="col-sm-37" style="margin-left: -81px;">
 									<input type="text" name="" id="" value="<?php echo $p['nama_pelanggan'];?>" autocomplete="off" readonly  class="form-control" placeholder = " No Jual">
 									<input type="hidden" name = "id_pelanggan" id="id" value="<?php echo $p['id_pelanggan'];?>" autocomplete="off" readonly  class="form-control" placeholder = " No Jual">
 								</div>
 							</div>
 						</div>
 					</div>		
 					<div class="col-md-4">
 						<div class="col-md-11  tampildata">
 							<div class="info-box bg-aqua" style="min-height:105px">
 								<span class="info-box-icon" style="height:105px; padding:4px 0; width:50px"><i class="fa fa-shopping-cart"></i></span>
 								<div class="info-box-content">
 									<span class="info-box-number"  style=" font-size:23px; padding:36px 0"><div id="grandtotal"></div></span>
 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="col-md-9" style="width: 81%;margin-left: -20px;margin-top: -61px;">
 						<div class="col-sm-30" style="width:490px" >
 							<input type="text"  name="nojl" id="no_jl" class="form-control" placeholder = "NO INVOICE" tabindex = "1" autofocus >
 							<input type="hidden"  name="nosample" id="no_jualan" class="form-control" placeholder = "No Jual" >
 							<input type="hidden"  name="noreff" id="noreff" class="form-control" placeholder = "No Jual" >
 						</div>
 						<div class="col-sm-30" style="width:150px" >
 							<input type="hidden"  name="idpelanggan" id="id_pelangganan"readonly class="form-control" placeholder = "ID Pelanggan" >
 						</div>

 						<div class="col-sm-35" style="width:150px">
 							<input type="text"  name="t" id="totalan2"  readonly autocomplete="off" class="form-control" placeholder = "TOTAL" >
 							<input type="hidden"  name="total" id="totalan"  readonly autocomplete="off" class="form-control" placeholder = "TOTAL" >
 							
 						</div>
 						
 						<div class="col-sm-35" style="width:150px">
 							<input type="text"  name="b" id="by2"  autocomplete="off" class="form-control" placeholder = "BAYAR" tabindex = "2">
 							<input type="hidden"  name="bayar" id="by"  autocomplete="off" class="form-control" placeholder = "BAYAR" tabindex = "2">
 							
 						</div>
 						<div class="col-sm-35" style="width:150px">
 							<input type="text"  name="s" id="sisaan2" readonly autocomplete="off" class="form-control" placeholder = "SISA">
 							<input type="hidden"  name="sisabayar" id="sisaan" readonly autocomplete="off" class="form-control" placeholder = "SISA">
 							
 						</div>
 						<div class="col-sm-31">
 							<button   type="submit" class="btn btn-sm btn-primary" name="btn_simpan" id="btn_simpan"  tabindex = "3">OK</button>
 							
 						</div>
 						
 						<div class="col-sm-31">
 							<br>
 							<br>
 							<br>
 						</div>
 						<table id = "#" class="table table-condensed">
 							<thead bgcolor="#99FF99">
 								<tr>
 									<th width = "395px">No Invoice</th>
 									<th width = "150px"> Nama Pelanggan</th>
 									<th width = "150px"> Total</th>
 									<th width = "150px"> Bayar</th>
 									<th width = "150px">Sisa</th>
 									<th> A</th>
 								</tr>
 							</thead>
 							<tbody id = "tampilan">
 								
 							</tbody>
 						</table>
 						<hr>
 						<div class="form-group">
 							<label class="col-sm-29 control-label">Keterangan</label>
 							<div class="col-sm-33" style="width:750px">
 								<input type="text"  name="keterangan" id="ket" onkeyup=" this.value=this.value.toUpperCase();" autocomplete="off" class="form-control" placeholder = "KETERANGAN (F2)">
 							</div>
 						</div>
 						
 						<div class="col-sm-31">
 							<br>
 							<br>
 							<br>
 							<br>
 							<br>
 							<br>
 						</div>
 						<?php		
 						$id_pelanggan = $this->uri->segment(3);
 						$query = "SELECT tb_penjualan_sample.no_sample,tb_penjualan_sample.id_pelanggan,tb_penjualan_sample.no_reff,tb_penjualan_sample.total,tb_penjualan_sample.sisa,tb_pelanggan.nama_pelanggan,tb_pelanggan.deposit 
 						from tb_penjualan_sample INNER JOIN tb_pelanggan ON tb_penjualan_sample.id_pelanggan=tb_pelanggan.id_pelanggan  WHERE tb_penjualan_sample.id_pelanggan='$id_pelanggan' AND sisa > 0 
 						order by no_sample desc ";
 						$cari = $this->db->query($query);
 						$cari->num_rows();
 						
 						?>
 						<table id = "example" class="table table-condensed" style="width:700px">
 							<thead bgcolor="#66CCFF">
 								<tr>
 									<td width = "10px" ><b>No</b></td>
 									<td width = "100px" ><b>No Invoice</b></td>
 									<td  width = "100px"><b>Pelanggan</b></td>
 									<td  align="right" width = "80px"><b>Total</b></td>
 									<td  align="right" width = "80px"><b>Sisa Tagihan</b></td>	
 								</tr>
 							</thead> 
 							<tbody>
 								<?php 
 								$no=1;
 								if(isset($cari)){
 									foreach ($cari->result_array() as $f){
 										?>
 										
 										<tr>
 											<td><?php echo $no;?></td>
 											<td><?php echo $f['no_sample'];?>/<?php echo $f['id_pelanggan'];?>/<?php echo $f['no_reff'];?></td>
 											<td><?php echo $f['nama_pelanggan'];?></td>
 											<td  align="right"><?php echo number_format($f['total'],2);?></td>
 											<td  align="right"><?php echo number_format($f['sisa'],2);?></td>
 										</tr>
 										<?php $no++;}}?>
 									</tbody>
 								</table>
 								<hr>
 							</div>
 							<div class="col-md-3" >
 								<div class="col-sm-41 tampildata1">
 								</div>
 								<textarea style="display:none;"  rows="1"class="form-control" name="bayaran" id="bayar" style="height: 34px;"readonly></textarea>
 								<textarea  style="display:none;"  rows="1"class="form-control" name="totalan" id="tot" style="height: 34px;"readonly></textarea>
 								<textarea  style="display:none;"  rows="1"class="form-control" name="kembali" id="kem" style="height: 34px;"readonly></textarea>
 								<textarea  style="display:none;" rows="1"class="form-control" name="kurang_bayar" id="sis" style="height: 34px;"readonly></textarea>
 								<textarea  style="display:none;" rows="1"class="form-control" name="dp"  		  id="dpt2" style="height: 34px;"readonly></textarea>
 								<textarea  style="display:none;" rows="1"class="form-control" name="dp2"  		  id="dpt1" style="height: 34px;"readonly><?php echo $f['deposit'];?></textarea>
 								<input type="hidden" id="potongan2" name = "potongan" autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
 								<input type="hidden" value="" id="cash2" name = "cash" autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
 								<input type="hidden" id="deb" name = "debet" autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
 								<input type="hidden" id="ban1" name = "bank1" autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
 								<input type="hidden" id="trans" name = "transfer" autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
 								<input type="hidden" id="ban2" name = "bank2" autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
 								<input type="hidden" id="gr" name = "giro" autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
 								<input type="hidden" id="keg" name = "ket_giro" autocomplete="off" autofocus class="form-control" placeholder = "Potongan Harga">
 								<hr>
 								<table class = "table1">
 									<tr>
 										<td align = "right">
 											<?php if($this->session->userdata('level') === 'Administrator'  OR $this->session->userdata('level') === 'KasirThermal' OR $this->session->userdata('level') === 'Manager'): ?>
 											<input type="submit" name = "submit2" id="simpan2" value = "SIMPAN & CETAK" class="btn btn-sm btn-info" >
 										<?php endif;?>
 										<input style="display:none;"  type="submit" name = "submit" id="btn_simpan1" value = "SIMPAN" class="btn btn-sm btn-primary" >
 										<a href = "<?php echo base_url();?>Penerimaan_sample/reset" class = "btn btn-sm btn-danger">Cancel</a>
 									</td>
 								</tr>
 							</table>
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
 <script src="<?php echo base_url(); ?>assets/js/jquery.autocomplete.js"></script>
 
 <script>
 	var site = "<?php echo site_url();?>";
 	$(function(){
 		$('#no_jl').autocomplete({
 			serviceUrl: site+'Penerimaan_sample/get_data',
 			onSelect: function (suggestion) {
 				$('#no_jualan').val(''+suggestion.no_sample); 
 				$('#id_pelangganan').val(''+suggestion.id_pelanggan); 
 				$('#totalan').val(''+suggestion.total); 
 				$('#noreff').val(''+suggestion.no_reff); 
 				$('#sisaan').val(''+suggestion.sisa); 
 			}
 		});
 	});
 </script>
 <script>
 	$('#no_jl').change(function(){
 		$("#totalan2").number(true);
 		$("#sisaan2")   .number(true);
 		$("#by2")   .number(true);
 		
 		$('#by2').keyup(function(){
 			
 			var tot = $('#totalan').val();
 			$('#totalan2').val(tot);
 			
 			var by = $('#by2').val();
 			$('#by').val(by);
 			
 			var sisa = $('#sisaan').val();
 			$('#sisaan2').val(sisa);
 		})
 	});
 </script>
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
 		no_ref			= $obj.attr('data-noref');
 		
 		$('#no_reff').val(no_ref);
 		
 		
 	});
 </script>
 <script type="text/javascript">		
 	tampilan();
 	
 	function tampilan(){	
 		$("#tampilan").load("<?php echo base_url();?>Penerimaan_sample/view_detail_pembayaran");
 		$('.tampildata1').load("<?php echo base_url();?>Penerimaan_sample/view_detail_pembayaran3");
 	}
 	$('#btn_simpan').on('click',function(){
 		var nojl			=$('#no_jl').val();
 		var nosample		=$('#no_jualan').val();
 		var idpelanggan		=$('#id_pelangganan').val();
 		var id				=$('#id').val();
 		var noreff			=$('#noreff').val();
 		var total			=$('#totalan').val();
 		var sisabayar		=$('#sisaan').val();
 		var sisa			= parseInt($('#sisaan2').val());
 		var bayar			=$('#by').val();
 		var by				=$('#by2').val();
 		
 		if(nojl == 0){
 			alert("Oops.. No Inv Masih Kosong");
 			document.getElementById("no_jl").focus();
 		}else if(by == 0){
 			alert("Oops.. Jumlah Bayar Masih Kosong");
 			document.getElementById("by2").focus();
 		}else if(bayar > sisa){
 			alert("Oops.. Jumlah Bayar Lebih");
 			document.getElementById("by2").focus();
 		}else{
 			$.ajax({
 				type : "POST",
 				url  : "<?php echo base_url()?>Penerimaan_sample/input_detail_pembayaran",
 				data : {nosample:nosample,idpelanggan:idpelanggan,id:id,noreff:noreff,total:total,sisabayar:sisabayar,bayar:bayar},
 				success: function(data){
 					$('[name="nojl"]').val("");
 					$('[name="nosample"]').val("");
 					$('[name="idpelanggan"]').val("");
 					$('[name="noreff"]').val("");
 					$('[name="total"]').val("");
 					$('[name="sisabayar"]').val("");
 					$('[name="bayar"]').val("");
 					$('[name="t"]').val("");
 					$('[name="b"]').val("");
 					$('[name="s"]').val("");
 					
 					tampilan();
 					$('.tampildata').load("<?php echo base_url();?>Penerimaan_sample/view_detail_pembayaran2");
 					document.getElementById("no_jl").focus();
 					
 				}
 			});
 			$('.tampildata1').load("<?php echo base_url();?>Penerimaan_sample/view_detail_pembayaran3");
 		}
 		return false;
 	});
 </script>


 <script>
 	$('select').select2();				
 	$('body').on('click', '.hapus-barang', function(e){
 		e.preventDefault();

 		var no_sample = $(this).attr('data-idsample');
 		var user = $(this).attr('data-user');
 		var _this = $(this);
 		
 		$.ajax({
 			type: 'post',
 			dataType: 'json',
 			url : "<?= site_url('Penerimaan_sample/destroy/');?>"+'/'+no_sample+'/'+user,
 			success: function(data){
 				tampilan();
 				$("#tampilan").load("<?php echo base_url();?>Penerimaan_sample/view_detail_pembayaran");
 				$('.tampildata').load("<?php echo base_url();?>Penerimaan_sample/view_detail_pembayaran2");
 			}
 		});
 	});	
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
		$('#no_jl').focus();
	}
	if(charCode == 39) //panah atas
	{
		$('#potongan').focus();
	}
	if(charCode == 113) //panah kanan	
	{
		$('#ket').focus();
	}
	if(charCode == 112) //panah bawah
	{
		$('#id_pelanggan').focus();
	}
	if(charCode == 35) //F9
	{
		$('#simpan').click();
	}
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
	}
</script>

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
$('#by').on('keypress', function(e) {
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
		
	//mengambil nilai form
	//var qty = document.getElementById("Q_B").value;
	var qtyb = document.getElementById("id_k_pelanggan").value;
	
	if(qtyb == 0){
		alert("Nama Belum Di pilih");
		return false;
	} else  {
		return false;
	}
}
</script>
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
</html>