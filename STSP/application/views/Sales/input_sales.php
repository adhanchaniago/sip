  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 <body>
 <div class = "row">
	  <section class="col-lg-3 connectedSortable">
		<div class="box box-primary box-solid">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-tag"></i> Input Data Sales</h3>
		</div>
					<form class="form-horizontal" method="POST" action="">
						<div class="box-body">
						<div class="form-group">
								<label class="col-sm-3 control-label">Nama Sales</label>
								<div class="col-sm-5">
										<input type="text"  name="nama_karyawan" id="nama_karyawan" value = "" autocomplete="off" class="form-control" placeholder = "NAMA SALES" autofocus required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" onkeyup=" this.value=this.value.toUpperCase();" autofocus tabindex = "1">
								</div>
							</div>
						<div class="form-group">
								<label class="col-sm-3 control-label">ID Sales</label>
								<div class="col-sm-5" style="width:87px">
										<input type="text" readonly  name="kode_sales" value="<?php echo $autonumber; ?>" id="" autocomplete="off" class="form-control" placeholder = "ID SALES" >
								</div>
								<div class="col-sm-5" style="width:153px">
										<input type="text"  name="id_karyawan" id="id_karyawan" autocomplete="off" class="form-control" placeholder = " ID SALES"  required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" onkeyup=" this.value=this.value.toUpperCase();" value = "" tabindex = "2">
										<input type="hidden"  name="tgl_join" value="<?php echo date('Y-m-d');?>" id="" autocomplete="off" class="form-control" placeholder = " ID Sales" >
								</div>
								
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">No Telp</label>
								<div class="col-sm-5">
										<input type="text"  name="no_hp" id="no_hp" value = "" autocomplete="off" class="form-control" placeholder = "NO TELP" autofocus required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" onkeyup=" this.value=this.value.toUpperCase();" tabindex = "3">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Target Penjualan</label>
								<div class="col-sm-5">
										<input type="text"  name="target_penjualan" id="target_penjualan" value = "" autocomplete="off" class="form-control" placeholder = "TARGET PENJUALAN" autofocus required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" onkeyup=" this.value=this.value.toUpperCase();" tabindex = "4">
										<input type="hidden"  name="omset_penjualan" id="omset_penjualan" value = "" autocomplete="off" class="form-control" placeholder = "TOTAL TARGET" autofocus required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" onkeyup=" this.value=this.value.toUpperCase();">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-5">
										<textarea name="alamat" id="alamat" onkeyup="this.value=this.value.toUpperCase();" class="form-control" rows="2" placeholder="ALAMAT" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "5"></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Status</label>
								<div class="col-sm-5">
										<select name="status" id="" class="form-control select2"  style="width: 100%;" required tabindex = "6"> 
												<option value="" >Pilih</option>
												<option value="0">AKTIF</option>
												<option value="1">RESIGN</option>
											   
										</select>
								</div>
							</div>
							
							<div class="form-group">
							<label class="col-sm-3 control-label">Keterangan</label>
							<div class="col-sm-5">
							<textarea name="keterangan" id="keterangan" onkeyup=" this.value=this.value.toUpperCase();" class="form-control" rows="2" placeholder="KETERANGAN" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "7"></textarea>
									<hr>
										<table align = "right">
										<tr>
										<td>
										<input type="submit" name = "submit" value = "SIMPAN" tabindex = "8" class="btn btn-sm btn-primary">
										<a href = "<?php echo base_url();?>Sales/view_sales" tabindex = "9" class="btn btn-sm btn-danger">Cancel</a>
										</td>
										</tr>
										</table>
									</div>	
									</div>
							</div>
						</form>
					</div>
			</section>
			
	</div>
</body>


<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  
    $("#tabeljabatan").DataTable({
      
      searching   : true,
      bInfo : false,
      //bLengthChange : false,
      bPaginate : false
     
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
$('#target_penjualan').on('keypress', function(e) {
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
$('#omset_penjualan').on('keypress', function(e) {
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