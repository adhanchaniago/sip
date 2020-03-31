<html>
<head>
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
  <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}


</style>
</head>
<body>
<div class="row">
<section class="col-lg-12 connectedSortable" >
	<div class="box box-success">
		<div class="box box-success" style="margin-top: -3px;">
		<h3 class="box-title">Data Informasi Stok Barang</h3>
		  </div>
				<!--<a href = "#ModalDetail" data-toggle="modal"  class="btn btn-primary btn-sm pull-right" title="Collapse" style="margin-right: 5px;">+</a>-->
		<table id = "table" class="table table-condensed" style="width: 1319px;">
				                <thead  bgcolor="#99FF99">
				                <tr>
				                  <th style="width:10px">No</th>
								  <td width="70px" ><b>ID Barang</b></td>
				                  <td width="300px"><b>Nama Barang</b></td>
				                  <td><b>Stok</b></td>
				                  <td><b>Satuan</b></td>
								  <td><b>Kat Barang</b></td>
				                  <td><b>Jual</b></td>
				                  <td><b>Stok Min</b></td>
				                  <td><b>Tanggal</b></td>
				                </tr>
				                </thead>
								
								
				           </table>
			</div>	
			<div>
			   <ul class="pagination pagination-sm no-margin pull-right">
				<?php echo $this->pagination->create_links(); ?>
			   </ul>
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
                "url": "<?php echo site_url('Barang/get_data_stok')?>",
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
    <script>
    $("#tabelbarang").DataTable({
      
      searching   : true,
      bInfo : false,
      bLengthChange : false,
      bPaginate : false,
      ordering	:	false
	 }) 
  </script>
  <script>
  $('select').select2();
document.onkeydown = function (e) {
		switch (e.keyCode) {
		   
			case 13:
				e.preventDefault();
				
				setTimeout('self.location.href="<?php echo base_url();?>Barang/input_barang"', 0);
				break;
		   
			
		}
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
$('#modal,#harga_jual,#walk1,#walk,#tk,#tb,#sls,#agn').on('keypress', function(e) {
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
</html>