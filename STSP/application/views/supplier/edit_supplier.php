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
			<h3 class="box-title"><i class="fa fa-tag"></i> Edit Data Supplier</h3>
		</div>
		<div class="box-body">
					<form class="form-horizontal"  method="POST" action="" >
					<div class="form-group">
								<label class="col-sm-3 control-label">Nama Supplier</label>
								<div class="col-sm-5">
									<input name="nama_supplier" value="<?php echo $d['nama_supplier'];?>" onkeyup=" this.value=this.value.toUpperCase();" type="text" autofocus class="form-control" autocomplete="off" placeholder="NAMA SUPPLIER " required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "1">
								</div>
								
							</div>
						<div class="form-group">
								<label class="col-sm-3 control-label">ID Suplier</label>
								<div class="col-sm-5" style="width:100px">
										<input type="text"  name="kode_supplier" value="<?php echo $d['kode_supplier'];?>" readonly autocomplete="off"  class="form-control" placeholder="Kode Supplier ">
								</div>
								<div class="col-sm-5" style="width:137px">
										<input type="text"  name="id_supplier" value = "<?php echo $d['id_supplier'];?>" readonly autocomplete="off"  class="form-control" placeholder="ID Supplier ">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Contact Person</label>
								<div class="col-sm-5" >
										<input type="text" value="<?php echo $d['contact'];?>" onkeyup=" this.value=this.value.toUpperCase();" name="contact"autocomplete="off" class="form-control" placeholder="CONTACT PERSON " required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "2">

								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Telp/Fax</label>
								<div class="col-sm-5">
										<input type="text" value="<?php echo $d['telp'];?>" name="telp" onkeypress="return hanyaAngka(event)" autocomplete="off" class="form-control" placeholder="TELP/FAX " required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "3">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">No Rek</label>

								<div class="col-sm-5">
									<input name="no_rek" type="text" value="<?php echo $d['no_rek'];?>" onkeypress="return hanyaAngka(event)" class="form-control" autocomplete="off" placeholder="NO REK " required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "5">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Rek</label>

								<div class="col-sm-5">
									<input name="nama_rek"  type="text" value="<?php echo $d['nama_rek'];?>" onkeyup=" this.value=this.value.toUpperCase();" class="form-control" autocomplete="off" placeholder="NAMA REK " required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "6">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-5">
										<textarea name="alamat"  class="form-control" rows="3" onkeyup=" this.value=this.value.toUpperCase();" placeholder="ALAMAT " required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "7"><?php echo $d['alamat'];?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Masa Hutang</label>

								<div class="col-sm-5">
									<input name="masa_hutang"  type="text" value="<?php echo $d['masa_hutang'];?>" placeholder="HARI "onkeypress="return hanyaAngka(event)" class="form-control" autocomplete="off" placeholder=" " required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "7">
								</div>
							</div>
							<div class="form-group">
 							<label class="col-sm-3 control-label">MATA UANG </label>
 							<div class="col-sm-5">
 								<select class="form-control" name = "kode_mu" id="#" style="width: 177px;" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "7">
										<option value = "<?php echo $d['kode_mu'];?>"> <?php echo $d['kode_mu'];?></option>
 									<?php foreach($kode_mu->result() as $e){?>
 										<option value = "<?php echo $e->kode_mu;?>"><?php echo $e->nama_mu;?> </option>
 									<?php } ?>
 								</select>

 							</div>
 						</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Keterangan</label>

								<div class="col-sm-5">
									<textarea name="keterangan" class="form-control" rows="2" placeholder="Keterangan " placeholder="KETERANGAN " onkeyup=" this.value=this.value.toUpperCase();" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "8"> <?php echo $d['keterangan'];?></textarea>
										<hr>
										<table align = "right">
										<tr>
										<td>
										<input type="submit" tabindex = "9" name = "submit" value = "SIMPAN" class="btn btn-sm btn-primary">
										<a href = "<?php echo base_url();?>Supplier/input_supplier" tabindex = "10" class="btn btn-sm btn-danger">Cancel</a>
										</td>
										</tr>
										</table>
								</div>
							</div>
							
					</form>
				</div>	
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
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript">
  $('select').select2();
</script>
<script>
    $("#example").DataTable({
     
      
      searching   : true,
      bInfo : false,
      bLengthChange : false,
      bPaginate : false,
	  ordering	:	false
      
      
      
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
$('#input-uangm').on('keypress', function(e) {
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
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
</html>