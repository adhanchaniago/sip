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
 <section class="col-lg-9 connectedSortable" >
<div style="overflow-x:auto;">
	<div class="box box-success">
				  <h3 class="box-title" >Data Informasi Pelanggan</h3>
					<?php 
						$user = $this->session->userdata('username');
						$query = "select * from menu WHERE level = '$user'";
								$j = $this->db->query($query);
								$j->num_rows();
								
							?>
							<?php foreach ($j->result() as $j){ 
							}
							?>
							
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
	<section class="col-lg-3 connectedSortable">
		<div class="box box-primary box-solid">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-tag"></i> Edit Pelanggan</h3>
			</div>
				<div class="box-body">
					<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data">
					<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Nama Pelanggan</label>
								<div class="col-sm-5">
									<input name="nama_pelanggan" onkeyup=" this.value=this.value.toUpperCase();" type="text" value = "<?php echo $d['nama_pelanggan'];?>" class="form-control" autofocus autocomplete="off"  placeholder = " NAMA PELANGGAN" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "1">
								</div>
							</div>
						<div class="form-group">
								<label class="col-sm-3 control-label">ID Pelanggan</label>
								<div class="col-sm-5">
										<input type="text" onkeyup=" this.value=this.value.toUpperCase();" name="id_pelanggan" readonly value = "<?php echo $d['id_pelanggan']; ?>" id="#" autocomplete="off"  class="form-control" placeholder = "MASUKAN ID PELANGGAN">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">No Npwp</label>
								<div class="col-sm-5" class=" margin-button -10px">
										<input required type="text"  name="no_npwp" id="#" value = "<?php echo $d['no_npwp'];?>" onkeypress="return hanyaAngka(event)" autocomplete="off" class="form-control" placeholder = "NO NPWP" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "2">

								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">No KTP</label>
								<div class="col-sm-5" class=" margin-button -10px">
										<input required type="text"  name="no_ktp" id="#" onkeypress="return hanyaAngka(event)" value = "<?php echo $d['no_ktp'];?>" autocomplete="off" class="form-control" placeholder = "MASUKAN KTP" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "3">

								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">No Telpon</label>
								<div class="col-sm-5">
										<input type="text" required name="no_telp" onkeypress="return hanyaAngka(event)" id="#" autocomplete="off" value = "<?php echo $d['no_telp'];?>" class="form-control" placeholder = "MASUKAN NO TELP" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "4">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-5">
										<textarea  rowspan="3" onkeyup=" this.value=this.value.toUpperCase();" type="text"  name="alamat" id="#" autocomplete="off" class="form-control" placeholder = "ALAMAT" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "5"><?php echo $d['alamat'];?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Ship TO</label>
								<div class="col-sm-5">
										<textarea name="ship_to" onkeyup=" this.value=this.value.toUpperCase();" class="form-control" rows="3" placeholder="SHIP TO" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "6"><?php echo $d['ship_to'];?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">ID Kategori</label>
								<div class="col-sm-5">
									<select class="form-control" name = "id_k_pelanggan" id="#" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "7">
										 <option value = "<?php echo $d['id_k_pelanggan'];?>"><?php echo $d['id_k_pelanggan'];?></option>
										 <?php foreach($listkategori->result() as $b){?>
										 <option value = "<?php echo $b->id_k_pelanggan?>"> <?php echo $b->nama_kategori?> </option>
										 <?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Sales</label>
								<div class="col-sm-5" style="width : 209px;">
									<select class="form-control active" name = "id_karyawan" id="#" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "8">
										 <option value = "<?php echo $d['id_karyawan'];?>"><?php echo $d['id_karyawan'];?></option>
										 <?php foreach($listsales->result() as $c){?>
										 <option value = "<?php echo $c->id_sales;?>"> <?php echo $c->nama_sales;?> </option>
										 <?php }?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Masa Hutang</label>

								<div class="col-sm-5">
									<input required name="masa_hutang" value = "<?php echo $d['masa_hutang'];?>" placeholder="HARI" type="text" class="form-control" autocomplete="off"  onkeypress="return hanyaAngka(event)" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "9">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Max. Hutang</label>

								<div class="col-sm-5">
									<input required name="max_hutang"id="max_hutang" value = "<?php echo $d['max_hutang'];?>" placeholder="Rp" type="text" class="form-control" autocomplete="off" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "10">
									<hr>
										<table align = "right">
										<tr>
										<td>
										<input type="submit" tabindex = "11" name = "submit" value = "SIMPAN" class="btn btn-sm btn-primary">
										<a href = "<?php echo base_url();?>Pelanggan/input_pelanggan" tabindex = "12" class = "btn btn-sm btn-danger">Cancel</a>
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
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
</html>