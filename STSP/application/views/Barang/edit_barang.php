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
				<h3 class="box-title"><i class="fa fa-tag"></i> Edit Barang</h3>
			</div>
				<div class="box-body">
					<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data">
						<div class="form-group">
								<label class="col-sm-3 control-label">ID Barang</label>
								<div class="col-sm-5">
										<input type="text"  readonly name="id_barang" id="#" value = "<?php echo $d['id_barang'];?>" autocomplete="off"  class="form-control" placeholder = " ID Barang">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Nama Barang</label>
								<div class="col-sm-5">
									<input name="nama_barang" type="text" value = "<?php echo $d['nama_barang'];?>" class="form-control" autocomplete="off" autofocus placeholder = " Nama Barang" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Kategori Barang</label>
								<div class="col-sm-5" class=" margin-button -10px">
										<select class="form-control" name = "id_k_barang" id="#" style="width: 177px;" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
										 <option value = "<?php echo $d['id_k_barang'];?>"> <?php echo $d['id_k_barang'];?></option>
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
										 <option value = "<?php echo $d['satuan_besar'];?>"> <?php echo $d['satuan_besar'];?></option>
										 <?php foreach($listsatuan->result() as $c){?>
										 <option value = "<?php echo $c->id_satuan;?>"><?php echo $c->nama_satuan;?> </option>
										 <?php } ?>
									</select>
									
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Jual</label>
								<div class="col-sm-5">
									<select class="form-control" name = "jual" id="#" style="width: 177px;" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
										 <option value = "<?php echo $d['jual'];?>"><?php echo $d['jual'];?></option>
										 <option value = "Y"> Ya </option>
										 <option value = "T"> Tidak </option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Stok Min</label>
								<div class="col-sm-5">
										<input type="text"  name="minimum" id="#"  value="<?php echo $d['minimum'];?>" autocomplete="off" class="form-control" placeholder = "Stok Minimum" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Modal</label>

								<div class="col-sm-5">
									<input name="modal" id="modal" type="text" value="<?php echo number_format($d['modal'], 0, ",", ".");?>"  class="form-control" autocomplete="off" placeholder = "HARGA MODAL" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
										
									</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">PRICELIST</label>

								<div class="col-sm-5">
									<input name="pricelist" id="pricelist" type="text" value="<?php echo number_format($d['pricelist'], 0, ",", ".");?>"  class="form-control" autocomplete="off" placeholder = "HARGA PRICELIST" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
										
									</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">TOKO KECIL</label>

								<div class="col-sm-5">
									<input name="harga_jual" id="harga_jual" type="text" value="<?php echo number_format($d['harga_jual'], 0, ",", ".");?>"  class="form-control" autocomplete="off" placeholder = "TOKO KECIL" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
										
									</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">TOKO BESAR</label>

								<div class="col-sm-5">
									<input name="walk" id="walk" type="text" value="<?php echo number_format($d['walk'], 0, ",", ".");?>"  class="form-control" autocomplete="off" placeholder = "TOKO BESAR" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
										
									</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">SALES</label>

								<div class="col-sm-5">
									<input name="tk" id="tk" type="text" value="<?php echo number_format($d['tk'], 0, ",", ".");?>"  class="form-control" autocomplete="off" placeholder = "SALES" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
										
									</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">AGEN</label>

								<div class="col-sm-5">
									<input name="tb" id="tb" type="text" value="<?php echo number_format($d['tb'], 0, ",", ".");?>" class="form-control" autocomplete="off" placeholder = "AGEN" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
										
									</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">PARTAI</label>

								<div class="col-sm-5">
									<input name="sls" id="sls" type="text" value="<?php echo number_format($d['sls'], 0, ",", ".");?>"  class="form-control" autocomplete="off" placeholder = "PARTAI" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
										
									</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Komisi</label>

								<div class="col-sm-5">
									<input name="komisi" id="komisi" type="text" value="<?php echo number_format($d['komisi'], 0, ",", ".");?>"  class="form-control" autocomplete="off" placeholder = "AGEN" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
									<hr>
										<table align = "right">
										<tr>
										<td>
										<input type="submit" name = "submit" value = "SIMPAN" class="btn btn-sm btn-primary">
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
<script type="text/javascript">
  $('select').select2();
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
<script>
 
// memformat angka ribuan
function formatAngka(angka) {
 if (typeof(angka) != 'string') angka = angka.toString();
 var reg = new RegExp('([0-9]+)([0-9]{3})');
 while(reg.test(angka)) angka = angka.replace(reg, '$1.$2');
 return angka;
}
 
// tambah event keypress untuk input bayar
$('#tk').on('keypress', function(e) {
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
$('#tb').on('keypress', function(e) {
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
$('#sls').on('keypress', function(e) {
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
$('#agn').on('keypress', function(e) {
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
$('#komisi').on('keypress', function(e) {
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