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
</head>
<body>	


 <div class = "row">
<section class="col-lg-9 connectedSortable" >
<div style="overflow-x:auto;">
	<div class="box box-success"> 
				  <h3 class="box-title" >Data Informasi Supplier</h3>
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
						<table id = "table" class="table table-condensed">
				                <thead bgcolor="#99FF99">
				                <tr>
				                  <td width = "1px"><b>No</b></td>
				                  <td width = "50px"><b>ID</b></td>
								  <td width = "150px"><b>Supplier</b></td>
				                  <td width = "100px"><b>CP</b></td>
				                  <td width = "100px"><b>Telp/Fax</b></td>
				                  <td width = "100px"><b>No Rek</b></td>
				                  <td width = "150px"><b>Nama Rek</b></td>
				                  <td width = "300px"><b>Alamat</b></td>
				                  <td width = "150px"><b>Masa Hutang</b></td>
				                  <td width = "150px"><b>Mata Uang</b></td>
				                  <td width = "150px"><b>Keterangan</b></td>
								  <?php if ($j->e_supplier == "Y" ): ?>
				                  <td width = "5px"><b><center>A</center></b></td>
								  <?php endif;?>
								  <?php if ($j->h_supplier == "Y" ): ?>
				                  <td width = "5px"><b><center>H</center></b></td>
								  <?php endif;?>
				                </tr>
				                </thead>
				           </table>
				           </div>
				        </div>
					 </div>
			</section>
			<?php if ($j->i_supplier == "Y" ): ?>
	<section class="col-lg-3 connectedSortable">
		<div class="box box-primary box-solid">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-tag"></i> Input Supplier</h3>
			</div>
				<div class="box-body">
					<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data">
					<div class="form-group">
								<label class="col-sm-3 control-label">Nama Supplier</label>
								<div class="col-sm-5">
									<input name="nama_supplier" type="text" class="form-control" autocomplete="off" placeholder="NAMA SUPPLIER "required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" onkeyup=" this.value=this.value.toUpperCase();" autofocus tabindex = "1">
								</div>
							</div>
						<div class="form-group">
								<label class="col-sm-3 control-label">ID Suplier</label>
								<div class="col-sm-5" style="width:100px">
										<input type="text"  name="kode_supplier" value="<?php echo $autonumber;?>" readonly autocomplete="off"  class="form-control" placeholder="ID Supplier ">
								</div>
								<div class="col-sm-5" style="width:137px">
										<input type="text"  name="id_supplier" autocomplete="off" class="form-control" placeholder="ID SUPPLIER " onkeyup=" this.value=this.value.toUpperCase();" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "2">
										<input type="hidden"  name="no_urut" value = "1" autocomplete="off" autofocus class="form-control" placeholder="ID Supplier ">
										<input type="hidden"  name="no_reff" value = "1" autocomplete="off" autofocus class="form-control" placeholder="ID Supplier ">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Contact Person</label>
								<div class="col-sm-5" >
										<input type="text"  name="contact"autocomplete="off" onkeyup=" this.value=this.value.toUpperCase();" class="form-control" placeholder="CONTACT PERSON "required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "3">

								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Telp/Fax</label>
								<div class="col-sm-5">
										<input type="text"  name="telp"  autocomplete="off" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="TELP/FAX "required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "4">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">No Rek</label>

								<div class="col-sm-5">
									<input name="no_rek" type="text" class="form-control" onkeypress="return hanyaAngka(event)" autocomplete="off" placeholder="NO REKENING "required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "6">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Rek</label>

								<div class="col-sm-5">
									<input name="nama_rek"  type="text" class="form-control" autocomplete="off" placeholder="NAMA REKENING " required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" onkeyup=" this.value=this.value.toUpperCase();" tabindex = "7">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-5">
										<textarea name="alamat" class="form-control" rows="3" placeholder="ALAMAT " required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" onkeyup=" this.value=this.value.toUpperCase();" tabindex = "7"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Masa Hutang</label>

								<div class="col-sm-5">
									<input name="masa_hutang"  type="text"  onkeypress="return hanyaAngka(event)" class="form-control" autocomplete="off" placeholder="HARI " required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "8">
								</div>
							</div>
							<div class="form-group">
 							<label class="col-sm-3 control-label">MATA UANG </label>
 							<div class="col-sm-5">
 								<select class="form-control" name = "kode_mu" id="#" style="width: 177px;" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')"  tabindex = "8">
 									<?php foreach($kode_mu->result() as $d){?>
 										<option value = "<?php echo $d->kode_mu;?>"><?php echo $d->nama_mu;?> </option>
 									<?php } ?>
 								</select>

 							</div>
 						</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Keterangan</label>

								<div class="col-sm-5">
									<textarea name="keterangan" class="form-control" rows="2" placeholder="KETERANGAN "required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" onkeyup=" this.value=this.value.toUpperCase();" tabindex = "9"></textarea>
										<hr>
										<table align = "right" class = "table1">
										<tr>
										<td align = "right">
										<input type="submit" tabindex = "10" name = "submit" value = "SIMPAN" class="btn btn-sm btn-primary">
										<a href = "<?php echo base_url();?>welcome" tabindex = "11" class="btn btn-sm btn-danger">Cancel</a>
										</td>
										</tr>
										</table>
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
                "url": "<?php echo site_url('Supplier/get_data_supplier')?>",
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

		$(".detailalamat").click(function(){
			
			$('#detail').modal("show");

			id_supplier = $(this).attr('data-idii');

			$.ajax({
				type 	:'POST',
				url     :'<?php echo base_url();?>Supplier/alamat',
				data    :'id_supplier='+id_supplier,
				cache   :false,
				success :function(respond){
					$("#detail_alamat").html(respond);
				}
				
			});

		});
</script>
<script>
   $("#example2").DataTable({
     
      
      searching   : true,
      bInfo : false,
      bLengthChange : false,
      bPaginate : false,
	  ordering	:	false
      
      
      
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