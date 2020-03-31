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
 	
 	
 </head>
 <body>	
 	<div class = "row">
 		<section class="col-lg-8 connectedSortable">
 			<div class="box box-primary">
 				<div class="box-body">
 					<h3 class="box-title">Data Surat Jalan</h3>
 					<div class="box-body">
 						
 						<table id = "example" class="table table-condensed">
 							<thead>
 								<tr>
 									<th width = "100px" >No Jual</th>
 									<th width = "80px">No Surat Jalan</th>
 									<th width = "80px">Nama Pelanggan</th>
 									<th width = "200px">Alamat Kirim</th>
 									<th width = "10px">A</th>
 								</tr>
 							</thead> 
 							<tbody>
 								<?php 
 								foreach($pj->result() as $f){
 									
 									?>
 									
 									
 									<tr >
 										<td href = "#"  class="detail" data-id = "<?php echo $f->no_jual; ?>"><?php echo $f->no_jual;?>/<?php echo $f->id_pelanggan;?>/<?php echo $f->no_reff;?></td>
 										<td href = "#"  class="detail1" data-idi = "<?php echo $f->no_jual; ?>"><?php echo $f->no_sj;?>/<?php echo $f->id_pelanggan;?>/<?php echo $f->no_sjln;?></td>
 										<td><?php echo $f->nama_pelanggan;?></td>
 										<td><?php echo $f->ke_alamat;?></td>
 										<td><a href = '<?php echo base_url("Penjualan/surat_jalan");?>/<?php echo $f->no_jual;?>' title='Kirim' class='btn btn-xs btn-primary'><i class='fa fa-space-shuttle'></i></a> </td>
 									</tr>
 								<?php }?>
 							</tbody>
 						</table>
 						<hr>
 						
 					</div>
 				</div>
 			</section>
 		</div>
 		<div class="modal fade bd-example-modal-lg" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 			<div class="modal-dialog modal-lg" role="document">
 				<div class="modal-content">
 					<div class="modal-header">
 						<h5 class="modal-title" id="exampleModalLabel">Detail Surat Jalan</h5>
 						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 							<span aria-hidden="true">&times;</span>
 						</button>
 					</div>
 					<div class="modal-body">
 						<table  class="table table-condensed" id = "#">
 							<thead>
 								<tr>
 									
 									<th> Nama Barang </th>
 									<th> Stok /Sisa </th>
 									<th> Jumlah Kirim </th>
 								</tr>
 							</thead>
 							
 							<tbody id = "datadetail">
 								
 								
 							</tbody>
 						</table>
 					</div>
 					<div class="modal-footer">
 						
 					</div>
 				</div>
 			</div>
 		</div>
 		<div class="modal fade bd-example-modal-lg" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 			<div class="modal-dialog modal-lg" role="document">
 				<div class="modal-content">
 					<div class="modal-header">
 						<h5 class="modal-title" id="exampleModalLabel">Detail Surat Jalan</h5>
 						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 							<span aria-hidden="true">&times;</span>
 						</button>
 					</div>
 					<div class="modal-body">
 						<table  class="table table-condensed" id = "#">
 							<thead>
 								<tr>
 									
 									<th> No Jual</th>
 									<th> No SJ </th>
 									<th> Tgl Kirim </th>
 								</tr>
 							</thead>
 							
 							<tbody id = "tampilan">
 								
 								
 							</tbody>
 						</table>
 					</div>
 					<div class="modal-footer">
 						
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </body>
 <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		
 <script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
 
 
 <script src="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.js"></script>
 
 <script type="text/javascript">
 	tampiltmp();
 	function tampiltmp(){
 		
 		
 	}
 	
 	$(".detail").click(function(){
 		
 		$('#ModalDetail').modal("show");

 		id_barang = $(this).attr('data-id');

 		$.ajax({
 			type 	:'POST',
 			url     :'<?php echo base_url();?>Penjualan/data_sj',
 			data    :'id_barang='+id_barang,
 			cache   :false,
 			success :function(respond){
 				
 				$("#datadetail").html(respond);
 			}
 			
 		});

 	});
 	
 </script>
 <script type="text/javascript">
 	tampilan();
 	function tampilan(){			
 		
 	}
 	$(".detail1").click(function(){
 		
 		$('#Modal').modal("show");

 		id_barang = $(this).attr('data-idi');

 		$.ajax({
 			type 	:'POST',
 			url     :'<?php echo base_url();?>Penjualan/data_sj',
 			data    :'id_barang='+id_barang,
 			cache   :false,
 			success :function(respond){
 				
 				$("#tampilan").html(respond);
 			}
 			
 		});

 	});
 	
 </script>
 <script>
 	
 	$('body').on('click', '.hapus-barang', function(e){
 		e.preventDefault();

 		var id_barang = $(this).attr('data-idbarang');
 		var _this = $(this);

 		swal({
 			title: "Anda Yakin ?",
 			
 			showCancelButton: true,
 			confirmButtonClass: "btn-danger",
 			confirmButtonText: "Iya",
 			closeOnConfirm: true
 		},
 		function () {

 			$.ajax({
 				type: 'post',
 				dataType: 'json',
 				url : "<?= site_url('Pembelian/destroy/');?>"+'/'+id_barang,
 				success: function(data){
 					tampiltmp();
 					$('.tampildata').load("<?php echo base_url();?>Pembelian/view_detail_barang2");
 				}
 			});
 		});
 	});	
 </script>
 <script type="text/javascript">
 	function sum(){
 		var txtFirstNumberValue = document.getElementById('qty_b').value;
 		var txtSecondNumberValue = document.getElementById('modal1').value;
 		
 		var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
 		
 		if(!isNaN(result)){
 			document.getElementById('jumlah').value = result;
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
$('#modal1').on('keypress', function(e) {
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
	$("#jabatan").change(function(){
		id = $("#jabatan").val();
		$.ajax({
			type	: 'POST',
			url		: '<?php echo base_url(); ?>Karyawan/get_kategori',
			data	: {id_jabatan:id},
			cache	: false,
			success	: function(respond){
				
				$("#kategori").html(respond);
				
			}
			
			
		});
		
	});
	
	
	
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
		bPaginate : false,
		ordering	:	false 
	});
</script>
</html>