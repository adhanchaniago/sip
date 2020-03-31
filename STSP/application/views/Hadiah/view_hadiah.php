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
}
th, {
  text-align: center;
  padding: 8px;
}


</style>
<?php 
 			$user = $this->session->userdata('username');
 			$query = "select * from menu WHERE level = '$user'";
 			$j = $this->db->query($query);
 			$j->num_rows();

 			?>
 			<?php foreach ($j->result() as $j){ 
 			}
 			?>
</head>
<body>	
 <div class = "row">
 <section class="col-lg-9 connectedSortable">
			<div class="box box-success">
				<h3 class="box-title">Data Informasi Hadiah</h3>
					<div class="box-body">
					<table id = "example2" class="table table-condensed" style="margin-left: -6px;">
				                <thead bgcolor="#99FF99">
				           <tr>
				                  <td><b>No</b></td>
				                  <?php if ($j->e_barang_hadiah == "Y"): ?>
								  <td><b>ID Barang</b></td>
								  <?php endif;?>
				                  <td><b>Nama Barang</b></td>
				                  <td><b>QTY</b></td>
				                  <td><b>Harga</b></td>
				                  <td><b>Tanggal</b></td>
				                  <td><b>Keterangan</b></td>
				              
				            
				                </tr>
				                </thead>
				                <tbody>
								<?php 
								$no=1;
								foreach ($list_barang->result() as $g){?>
								<tr>
								<td><?php echo $no;?></td>
				                  <?php if ($j->e_barang_hadiah == "Y"): ?>
								<td><a href = '<?php echo base_url("Hadiah/edit_hadiah")?>/<?php echo $g->id_barang;?>'> <?php echo $g->id_barang;?></a></td>
								<?php endif;?>
								<td><?php echo $g->nama_barang;?></td>
								<td><?php echo $g->stok;?></td>
								<td><?php echo "Rp.&nbsp", number_format($g->harga_jual, 0, ",", ".");?></td>
								<td><?php echo $g->tgl;?></td>
								<td><?php echo $g->keterangan;?></td>
								
								</tr>
								<?php $no++;} ?>
				               </tbody>
				           </table>
						</div>
					</div>
			</section>
	<?php if ($j->e_barang_hadiah == "Y"): ?>
	<section class="col-lg-3 connectedSortable">
		<div class="box box-primary box-solid">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-tag"></i> Input Hadiah</h3>
			</div>
				
				<div class="box-body">
					<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data">
						<div class="form-group">
								
								<div class="col-sm-5">
										<input type="hidden"  name="tgl" value = "<?php echo date('d-m-Y');?>" id="#" autocomplete="off"  class="form-control" placeholder = " ID Barang">
								</div>
							</div>
						<div class="form-group">
								<label class="col-sm-3 control-label">ID Barang</label>
								<div class="col-sm-5">
										<input type="text" required  name="id_barang" id="#" autocomplete="off" autofocus class="form-control" onkeyup="this.value=this.value.toUpperCase();" placeholder = " ID BARANG" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Nama Barang</label>
								<div class="col-sm-5">
									<input name="nama_barang" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" type="text" class="form-control" autocomplete="off" onkeyup="this.value=this.value.toUpperCase();" placeholder = " NAMA BARANG">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Harga</label>

								<div class="col-sm-5">
									<input name="harga_jual" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" id="harga_jual" type="text" onkeyup = "sum();" class="form-control" autocomplete="off" placeholder = "HARGA " required>
										</div>
							</div>
								<div class="form-group">
								<label class="col-sm-3 control-label">Keterangan</label>
								<div class="col-sm-5">
										<textarea type="text" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="keterangan"  id="ket_giro" autocomplete="off" class="form-control" onkeyup=" this.value=this.value.toUpperCase();" rows="1" placeholder = "KETERANGAN " ></textarea>
										<hr>
										<table align = "right" class = "table1">
										<tr>
										<td align = "right">
										<input type="submit" name = "submit" value = "SIMPAN" class="btn btn-sm btn-primary">
										<a href = "<?php echo base_url();?>Hadiah/view_hadiah" class = "btn btn-sm btn-danger">Cancel</a>
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
					<?php endif;?>
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
  $("#example").DataTable({
     
      
      searching   : true,
      bInfo : false,
      bLengthChange : false,
      bPaginate : false,
	  
      
      
      
    });
	$("#example2").DataTable({
     
      
      searching   : true,
      bInfo : false,
      bLengthChange : false,
      bPaginate : false,
	  ordering	:	false
      
      
      
    });
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
</html>