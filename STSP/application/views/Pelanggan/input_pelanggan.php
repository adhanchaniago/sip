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
<section class="col-lg-9 connectedSortable" >
<div style="overflow-x:auto;">
	<div class="box box-success">
				  <h3 class="box-title" >Data Informasi Pelanggan</h3>
<div class="col-sm-12" style="width: 131%;margin-left: -14px;">
						<table id = "table" class="table table-condensed" >
				                <thead bgcolor="#99FF99">
				                <tr>
				                  <td width="1px"><b>No</b></td>
				                  <td width="50px"><b>ID</b></td>
				                  <td width="150px"><b>Nama Pelanggan</b></td>
				                  <td width="50px"><b>No.NPWP</b></td>
				                  <td width="50px"><b>No.KTP</b></td>
				                  <td width="45px"><b>No.Telp</b></td>
				                  <td width="30px"><b>Kategori</b></td>
				                  <td width="50"><b>Ms.Hutang</b></td>
				                  <td width="50"><b>Hutang</b></td>
				                  <td width="50px"><b>Max.Hutang</b></td>
				                  <td width="50px"><b>Deposit</b></td>
				                  <td width="300px"><b>Alamat</b></td>
				                  <td width="300px"><b>Ship To</b></td>
								  <?php if ($j->e_pelanggan == "Y" ): ?>
				                  <td width="10px"><b><center>A</center></b></td>
								  <?php endif;?>
								   <?php if ($j->h_pelanggan == "Y" ): ?>
				                  <td width="10px"><b><center>H</center></b></td>
								  <?php endif;?>
				                </tr>
				                </thead>
								 
				           </table>
						  </div>
						  </div>
				           </div>
			</section>
			<?php if ($j->i_pelanggan == "Y" ): ?>
	<section class="col-lg-3 connectedSortable">
		<div class="box box-primary box-solid">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-tag"></i> Input Pelanggan</h3>
			</div>
				<div class="box-body">
					<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data">
					<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Nama Pelanggan</label>
								<div class="col-sm-5">
									<input name="nama_pelanggan" onkeyup=" this.value=this.value.toUpperCase();" type="text" class="form-control" autocomplete="off"  placeholder = "NAMA PELANGGAN" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" autofocus tabindex = "1">
								</div>
							</div>
						<div class="form-group">
								<label class="col-sm-3 control-label">ID Pelanggan</label>
								<div class="col-sm-5" style="width:87px">
										<input type="text" readonly name="kode_pelanggan" value="<?php echo $autonumber; ?>" id="#" autocomplete="off"  class="form-control" placeholder = "ID Pelanggan">
								</div>
								<div class="col-sm-5" style="width:153px">
										<input type="text"  onkeyup=" this.value=this.value.toUpperCase();" maxlength="4" min = "1" name="id_pelanggan" id="#" autocomplete="off"  class="form-control" placeholder = "ID PELANGGAN" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "2">
										<input type="hidden"  name="no_reff_retur" value = "1" id="#" autocomplete="off"  class="form-control" placeholder = "Masukan No Rekening">
										<input type="hidden"  name="no_reff" value = "1" id="#" autocomplete="off"  class="form-control" placeholder = "Masukan No Rekening">
										<input type="hidden"  name="no_sjln" value = "1" id="#" autocomplete="off"  class="form-control" placeholder = "Masukan No Rekening">
										<input type="hidden"  name="no_bar" value = "1" id="#" autocomplete="off"  class="form-control" placeholder = "Masukan No Rekening">
										<input type="hidden"  name="tgl_join" value = "<?php echo date('Y-m-d');?>" id="#" autocomplete="off"  class="form-control" placeholder = "Masukan No Rekening">
								
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">No Npwp</label>
								<div class="col-sm-5" class=" margin-button -10px">
										<input required type="text"  name="no_npwp" id="#" onkeypress="return hanyaAngka(event)" autocomplete="off" class="form-control" placeholder = "NO NPWP" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "3">

								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">No KTP</label>
								<div class="col-sm-5" class=" margin-button -10px">
										<input required type="text"  name="no_ktp" id="#" onkeypress="return hanyaAngka(event)" autocomplete="off" class="form-control" placeholder = "NO KTP" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "4">

								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">No Telpon</label>
								<div class="col-sm-5">
										<input required type="text"  name="no_telp" onkeypress="return hanyaAngka(event)" id="#" autocomplete="off" class="form-control" placeholder = "NO TELP" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "5">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-5">
										<textarea name="alamat" onkeyup=" this.value=this.value.toUpperCase();" class="form-control" rows="3" placeholder="ALAMAT ..." required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "6"></textarea>
								</div>
							</div>							
							<div class="form-group">
								<label class="col-sm-3 control-label">Ship TO</label>
								<div class="col-sm-5">
										<textarea name="ship_to" onkeyup=" this.value=this.value.toUpperCase();" class="form-control" rows="3" placeholder="SHIP TO" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "7"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Kategori</label>
								<div class="col-sm-5" style="width : 209px;">
									<select class="form-control active" name = "id_k_pelanggan" id="#" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')"tabindex = "8">
										 <option value = "TK"> TOKO KECIL </option>
										 <option value = "TB"> TOKO BESAR </option>
										 <option value = "SLS"> SALES </option>
										 <option value = "AGN"> AGEN </option>
										 <option value = "PRT"> PARTAI </option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Sales</label>
								<div class="col-sm-5" style="width : 209px;">
									<select class="form-control active" name = "id_karyawan" id="#" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "9">
										<?php
											foreach ($list_sales->result() as $d){ 
												?>
										 <option value="<?php echo $d->id_sales; ?>"><?php echo $d->nama_sales; ?></option>
											<?php }?>
										 
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Masa Hutang</label>

								<div class="col-sm-5">
									<input name="masa_hutang"  type="text" onkeypress="return hanyaAngka(event)" class="form-control" autocomplete="off" placeholder="HARI" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "10">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Max. Hutang</label>

								<div class="col-sm-5">
									<input name="max_hutang" id="max_hutang" type="text" class="form-control" autocomplete="off" placeholder="Rp." required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "11">
									<hr>
										<table align = "right" class = "table1">
										<tr>
										<td align = "right">
										<input type="submit" tabindex = "12" name = "submit" value = "SIMPAN" class="btn btn-sm btn-primary">
										<a href = "<?php echo base_url();?>welcome" tabindex = "13" class = "btn btn-sm btn-danger">Cancel</a>
										</td>
										</tr>
										</table>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-5">
									<input name="deposit" id="deposit" type="hidden" class="form-control" autocomplete="off" placeholder="Deposit">
									
								</div>
							</div>
					</form>
				</div>
			</div>
			
		</section>
		<?php endif;?>
		
<?php echo $this->session->flashdata('message');
				?>
        </div>
</body>
  <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		

  <script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  <script type="text/javascript">
    var table;
    $(document).ready(function() {
 
        //datatables
        table = $('#table').DataTable({ 
 
            "processing": false, 
            "serverSide": true, 
			"searching"   : true,
		  "bInfo" : false,
		  "bLengthChange" : false,
		  "bPaginate" : true,
		  "ordering"	:	false,
            "order": [], 
             
            "ajax": {
                "url": "<?php echo site_url('Pelanggan/get_data_pelanggan')?>",
                "type": "POST"
            },
 
             
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
 
        });
 
    });
 
</script>
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
   $("#example2").DataTable({
      searching   : true,
      bInfo : false,
      bLengthChange : false,
      bPaginate : false
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
$('#max_hutang').on('keypress', function(e) {
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
$('#deposit').on('keypress', function(e) {
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
	</script>
</html>