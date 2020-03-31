 <html>
 <head>
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">

 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">

 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
 	<!-- Ionicons -->
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
 	<!-- DataTables -->
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
 	<!-- Theme style -->
 	<style>
 		@media only screen and (max-width: 840px) {
 			table.responsive {
 				margin-bottom: 0;
 				overflow: hidden;
 				overflow-x: scroll;
 				display: block;
 				white-space: nowrap;
 			}
 		}
 	</style>
 </head>
 <body>	

 	<div class = "row">
 		<section class="col-lg-3 connectedSortable">
 			<div class="box box-primary box-solid">
 				<div class="box-header">
 					<h3 class="box-title"><i class="fa fa-tag"></i> Input Barang</h3>
 				</div>

 				<div class="box-body">
 					<form class="form-horizontal"  method="POST" id="form" action="" enctype = "multipart/form-data">
 						<div class="form-group">

 							<div class="col-sm-5">
 								<input type="hidden"  name="tgl" value = "<?php echo date('d-m-Y');?>" id="#" autocomplete="off"  class="form-control" placeholder = " ID Barang">
 							</div>
 						</div>

 						<div class="form-group">
 							<label for="inputEmail3" class="col-sm-3 control-label">Nama Barang</label>
 							<div class="col-sm-5">
 								<input name="nama_barang" type="text" class="form-control" autofocus autocomplete="off" onkeyup="this.value=this.value.toUpperCase();" placeholder = " NAMA BARANG" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
 							</div>
 						</div>
 						<div class="form-group">
 							<label class="col-sm-3 control-label">ID Barang</label>
 							<div class="col-sm-5">
 								<input type="text"  name="id_barang" id="id_barang" autocomplete="off" autofocus class="form-control cekbarang" onkeyup="this.value=this.value.toUpperCase();" placeholder = " ID BARANG" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
 								<input type="hidden"  name="#" id="cekbarang" autocomplete="off" >
 							</div>
 						</div>
 						<div class="form-group">
 							<label class="col-sm-3 control-label">Kategori Barang</label>
 							<div class="col-sm-5" class=" margin-button -10px">
 								<select class="form-control" name = "id_k_barang" id="#" style="width: 177px;" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
 									<?php foreach($list_k_barang->result() as $b){?>
 										<option value = "<?php echo $b->id_k_barang;?>"> <?php echo $b->nama_k_barang;?> </option>
 									<?php } ?>
 								</select>
 							</div>
 						</div>
 						<div class="form-group">
 							<label class="col-sm-3 control-label">Satuan </label>
 							<div class="col-sm-5">
 								<select class="form-control" name = "satuan_besar" id="#" style="width: 177px;" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
 									<?php foreach($listsatuan->result() as $d){?>
 										<option value = "<?php echo $d->id_satuan;?>"><?php echo $d->nama_satuan;?> </option>
 									<?php } ?>
 								</select>

 							</div>
 						</div>
 						<div class="form-group">
 							<label class="col-sm-3 control-label">Jual</label>
 							<div class="col-sm-5">
 								<select class="form-control" name = "jual" id="#" style="width: 177px;"required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
 									<option value = "Y"> Ya </option>
 									<option value = "T"> Tidak </option>
 								</select>
 							</div>
 						</div>
 						<div class="form-group">
 							<label class="col-sm-3 control-label">Stok Min</label>
 							<div class="col-sm-5">
 								<input type="text"  name="minimum" id="#"  value="1" autocomplete="off" class="form-control" placeholder = "STOK MINIMUM" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
 							</div>
 						</div>
 						<div class="form-group">
 							<label class="col-sm-3 control-label">Modal</label>

 							<div class="col-sm-5">
 								<input name="modal" id="modal2" type="text" class="form-control" autocomplete="off" placeholder = "HARGA MODAL" required>
 								<input name="" id="modal" type="hidden" class="form-control" autocomplete="off" placeholder = "HARGA MODAL" required >

 							</div>
 						</div>
 						<div class="form-group">
 							<label class="col-sm-3 control-label">PRICELIST</label>

 							<div class="col-sm-5">
 								<input name="pricelist" id="pricelist2" type="text" class="form-control" autocomplete="off" placeholder = "HARGA PRICELIST" required  >
 								<input name="" id="pricelist" type="hidden" class="form-control" autocomplete="off" placeholder = "HARGA PRICELIST" required >

 							</div>
 						</div>
 						<div class="form-group">
 							<label class="col-sm-3 control-label">TOKO KECIL</label>

 							<div class="col-sm-5">
 								<input name="harga_jual" id="harga_jual2" type="text" class="form-control" autocomplete="off" placeholder = "TOKO KECIL" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
 								<input name="" id="harga_jual" type="hidden" class="form-control" autocomplete="off" placeholder = "TOKO KECIL" required >
 							</div>
 						</div>
 						<div class="form-group">
 							<label class="col-sm-3 control-label">TOKO BESAR</label>

 							<div class="col-sm-5">
 								<input name="walk" id="walk2" type="text"  class="form-control" autocomplete="off" placeholder = "TOKO BESAR" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
 								<input name="" id="walk" type="hidden"  class="form-control" autocomplete="off" placeholder = "TOKO BESAR" required >
 							</div>
 						</div>
 						<div class="form-group">
 							<label class="col-sm-3 control-label">SALES</label>

 							<div class="col-sm-5">
 								<input name="tk" id="tk2" type="text"  class="form-control" autocomplete="off" placeholder = "SALES" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
 								<input name="" id="tk" type="hidden"  class="form-control" autocomplete="off" placeholder = "SALES" required>
 							</div>
 						</div>
 						<div class="form-group">
 							<label class="col-sm-3 control-label">AGEN</label>

 							<div class="col-sm-5">
 								<input name="tb" id="tb2" type="text"  class="form-control" autocomplete="off" placeholder = "AGEN" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
 								<input name="" id="tb" type="hidden"  class="form-control" autocomplete="off" placeholder = "AGEN" required >
 							</div>
 						</div>
 						<div class="form-group">
 							<label class="col-sm-3 control-label">PARTAI</label>

 							<div class="col-sm-5">
 								<input name="sls" id="sls2" type="text"   class="form-control" autocomplete="off" placeholder = "PARTAI" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
 								<input name="" id="sls" type="hidden"   class="form-control" autocomplete="off" placeholder = "PARTAI" required ">

 							</div>
 						</div>
 						<div class="form-group">
 							<label class="col-sm-3 control-label">Komisi</label>

 							<div class="col-sm-5">
 								<input name="komisi" id="komisi" type="text"  class="form-control" autocomplete="off" placeholder = "KOMISI" required maxlength = "2" oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
 								<hr>
 								<table align = "right">
 									<tr>
 										<td>
 											<input type="submit" name = "submit" value = "SIMPAN"  class="btn btn-sm btn-primary">
 											<a href = "<?php echo base_url();?>Barang/view_barang" class = "btn btn-sm btn-danger">Cancel</a>
 										</td>
 									</tr>
 								</table>	
 							</div>
 						</div>


 					</form>

 				</div>
 			</div>
 			<?php echo $this->session->flashdata('message');
 			?>
 		</section>
 	</div>
 </body>
 <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- DataTables -->
 <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		

 <script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>


 <script>
 	$(".cekbarang").on("input",function(){

 		var id_barang = $("#id_barang").val();
 		$.ajax({
 			type    : 'GET',
 			url     : '<?php echo site_url(); ?>Barang/cekbarang',
 			cache   : false,
 			data    : {id_barang:id_barang},
 			success :function(respond){

 				$("#cekbarang").val(respond);


 			}

 		});
 	});


 	$(function(){

 		$("#modal2").number(true);
 		$("#pricelist2").number(true);
 		$("#harga_jual2").number(true);
 		$("#walk2").number(true);
 		$("#tk2").number(true);
 		$("#tb2").number(true);
 		$("#sls2").number(true);

 		$('#modal2,#pricelist2,#harga_jual2,#walk2,#tk2,#tb2,#sls2').keyup(function(){
 			var modal 		= $('#modal2').val();
 			var pricelist 	= $('#pricelist2').val();
 			var harga_jual  = $('#harga_jual2').val();
 			var walk  		= $('#walk2').val();
 			var tk  		= $('#tk2').val();
 			var tb  		= $('#tb2').val();
 			var sls  		= $('#sls2').val();

 			$('#modal').val(modal);
 			$('#pricelist').val(pricelist);
 			$('#harga_jual').val(harga_jual);
 			$('#walk').val(walk);
 			$('#tk').val(tk);
 			$('#tb').val(tb);
 			$('#sls').val(sls);


 		});

 		$("#form").submit(function(){

 			var modal       			= $("#modal").val();
 			var cekbarang    			= $("#cekbarang").val();
 			var pricelist    			= $("#pricelist").val();
 			var harga_jual				= $("#harga_jual").val();
 			var walk   					= $("#walk").val();
 			var tk    					= $("#tk").val();
 			var tb    					= $("#tb").val();
 			var sls    					= $("#sls").val();

 			if (pricelist > 0) {
 				var hasil1 = (pricelist*1) * (harga_jual*1)/100;
 				var hasil2 = (pricelist*1) - (hasil1*1);
 				var hasil3 = (pricelist*1) * (walk*1)/100;
 				var hasil4 = (pricelist*1) - (hasil3*1);
 				var hasil5 = (pricelist*1) * (tk*1)/100;
 				var hasil6 = (pricelist*1) - (hasil5*1);
 				var hasil7 = (pricelist*1) * (tb*1)/100;
 				var hasil8 = (pricelist*1) - (hasil7*1);
 				var hasil9 = (pricelist*1) * (sls*1)/100;
 				var hasil10 = (pricelist*1) - (hasil9*1);
 				if (cekbarang > 0){
 					alert("Oops.. Kode Barang Sudah Ada");
 					document.getElementById("id_barang").focus();
 					return false;
 				}else if((hasil2*1) <= (modal*1)){
 					alert("Oops.. Harga Toko Kecil Lebih Dari Modal");
 					document.getElementById("harga_jual2").focus();
 					return false;
 				}else if((hasil4*1) <= (modal*1)){
 					alert("Oops.. Harga Toko Besar Lebih Dari Modal");
 					document.getElementById("walk2").focus();
 					return false;
 				}else if((hasil6*1) <= (modal*1)){
 					alert("Oops.. Harga Sales Lebih Dari Modal");
 					document.getElementById("tk2").focus();
 					return false;
 				}else if((hasil8*1) <= (modal*1)){
 					alert("Oops.. Harga Agen Lebih Dari Modal");
 					document.getElementById("tb2").focus();
 					return false;
 				}else if((hasil10*1) <= (modal*1)){
 					alert("Oops.. Harga Partai Lebih Dari Modal");
 					document.getElementById("sls2").focus();
 					return false;
 				}else{
 					return true;
 				}

 			}else if(pricelist == 0){
 				if (cekbarang > 0){
 					alert("Oops.. Kode Barang Sudah Ada");
 					document.getElementById("id_barang").focus();
 					return false;
 				}else if((harga_jual*1) <= (modal*1)){
 					alert("Oops.. Harga Toko Kecil Kurang Dari Modal");
 					document.getElementById("harga_jual2").focus();
 					return false;
 				}else if((walk*1) <= (modal*1)){
 					alert("Oops.. Harga Toko Besar Kurang Dari Modal");
 					document.getElementById("walk2").focus();
 					return false;
 				}else if((tk*1) <= (modal*1)){
 					alert("Oops.. Harga Sales Kurang Dari Modal");
 					document.getElementById("tk2").focus();
 					return false;
 				}else if((tb*1) <= (modal*1)){
 					alert("Oops.. Harga Agen Kurang Dari Modal");
 					document.getElementById("tb2").focus();
 					return false;
 				}else if((sls*1) <= (modal*1)){
 					alert("Oops.. Harga Partai Kurang Dari Modal");
 					document.getElementById("sls2").focus();
 					return false;
 				}else{
 					return true;
 				}
 			}
 		});
 	});
 </script>
 <script type="text/javascript">
 	$('select').select2();
 </script>
 <script type="text/javascript">
 	$('#btn_simpan').on('click',function(){

 	});
 </script>
 <script type="text/javascript">

 	document.getElementById("demo").innerHTML = new Date("yyyy-mm-dd");
 </script>
</script>
<script>
	$("#tabelbarang").DataTable({

		searching   : true,
		bInfo : false,
		bLengthChange : true,
		bPaginate : true,
		ordering	:	false
	}) 
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
$('#pricelist').on('keypress', function(e) {
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
$('#modal').on('keypress', function(e) {
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

 // set nilai ke variabel bayar
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
$('#walk').on('keypress', function(e) {
	var c = e.keyCode || e.charCode;
	switch (c) {
		case 8: case 9: case 27: case 13: return;
		case 65:
		if (e.ctrlKey === true) return;
	}
	if (c < 48 || c > 57) e.preventDefault();
}).on('keyup', function() {
	var inp = $(this).val().replace(/\./g, '');

 // set nilai ke variabel bayar
 $(this).val(formatAngka(inp));

});
</script>	
</html>