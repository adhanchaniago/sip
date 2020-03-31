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


 	<!-- Google Font -->
 	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font.css">
 	<style>
 		table {
 			border-collapse: collapse;
 			border-spacing: 0;
 			width: 100%;
 			border: 1px solid #ddd;
 		}

 		th, {
 			text-align: center;
 			padding: 8px;
 		}


 	</style>
 </head>
 <body>	
 	<div class = "row">
 		<?php echo $this->session->flashdata('message');
 		?>
 		<section class="col-lg-12 connectedSortable">
 			<?php 
 			$user = $this->session->userdata('username');
 			$query = "select * from menu WHERE level = '$user'";
 			$j = $this->db->query($query);
 			$j->num_rows();

 			?>
 			<?php foreach ($j->result() as $j){ 
 			}
 			?>
 			<div class="box box-primary">
 				<div class="nav-tabs-custom">
 					<ul class="nav nav-tabs">
 						<li><a href="<?php echo base_url('Surat_jalan/view_surat_jalan')?>"><b>Data Surat Jalan</b></a></li> <!-- Untuk Tab pertama berikan li class=”active” agar pertama kali halaman di load tab langsung active-->
 						<?php if ($j->r_surat_jalan == "Y"): ?>
 							<li class="active"><a href="<?php echo base_url('Surat_jalan/view_sj_retur')?>"><b>Data Retur Surat Jalan</b></a></li>
 						<?php endif;?>
 					</ul>
 				</div>

 				<table id = "example3" class="table table-condensed" style="width: 100%;">
 					<thead bgcolor="#66CCFF">
 						<tr>
 							<td width = "1%"><b> No </b></td>
 							<td width = "100px"> <b> No Retur</b></td>
 							<td width = "100px"> <b> No SJ</b></td>
 							<td width = "110px"><b>  Nama Pelanggan</b></td>
 							<td width="240px"><b>  Keterangan</b></td>
 							<td width = "50px" ><b>  Tanggal</b></td>
 							<td width = "20px" ><b>  Cetak</b></td>
 							<td width = "30px">  <b>  User</b></td>

 						</tr>
 					</thead>

 					<tbody>
 						<?php 
 						$no=1;
 						foreach($rtr->result() as $rtr){

 							?>


 							<tr >
 								<td ><?php echo $this->session->userdata('row')+$no;?></td>
 								<td href = "#" class="detail2" data-idii = "<?php echo $rtr->no_sj_retur; ?>"><?php echo $rtr->no_sj_retur; ?>/<?php echo $rtr->id_pelanggan;?></td>
 								<td ><?php echo $rtr->no_sj;?>/<?php echo $rtr->id_pelanggan;?>/<?php echo $rtr->no_sjln;?></td>
 								<td><?php echo $rtr->nama_pelanggan;?></td>
 								<td><?php echo $rtr->keterangan;?></td>
 								<td><?php echo date('d-m-Y', strtotime($rtr->tgl));?></td>
 								<td><?php echo $rtr->cetak;?></td>
 								<td><?php echo $rtr->user;?></td>
 							</tr>
 							<?php  $no++;}?>
 						</tbody>
 					</table>
 				</div>
 			</div>
 		</section>
 		<div class="modal fade bd-example-modal-lg" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 			<div class="modal-dialog modal-lg" role="document">
 				<div class="modal-content" style="width:550px; margin-left:200px">
 					<div class="modal-header">
 						<h5 class="modal-title" id="exampleModalLabel">Detail Surat Jalan</h5>
 						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 							<span aria-hidden="true">&times;</span>
 						</button>
 					</div>
 					<div class="modal-body">
 						<table  class="table table-condensed" id = "#">
 							<thead bgcolor="#99FF99">
 								<tr>

 									<th width = "270px"> Nama Barang </th>
 									<th> Stok </th>
 									<th> Harga satuan </th>
 									<th> Terkirim </th>
 									<th> Sisa  </th>
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
 				<div class="modal-content" style="width:550px; margin-left:200px">
 					<div class="modal-header">
 						<h5 class="modal-title" id="exampleModalLabel">Detail History Surat Jalan</h5>
 						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 							<span aria-hidden="true">&times;</span>
 						</button>
 					</div>
 					<div class="modal-body">
 						<table  class="table table-condensed" id = "#">
 							<thead bgcolor="#66CCFF">
 								<tr>

 									<th width = "200px"> Nama Barang </th>
 									<th width = "60px"> Jumlah Kirim </th>
 									<th width = "60px"> Harga Satuan </th>
 								</tr>
 							</thead>

 							<tbody id = "tampilan">


 							</tbody>
 						</table>
 					</div>
 				</div>
 			</div>
 		</div>
 		<div class="modal fade bd-example-modal-lg" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 			<div class="modal-dialog modal-lg" role="document">
 				<div class="modal-content" style="width:550px; margin-left:200px">
 					<div class="modal-header">
 						<h5 class="modal-title" id="exampleModalLabel">Detail History Retur Surat Jalan</h5>
 						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 							<span aria-hidden="true">&times;</span>
 						</button>
 					</div>
 					<div class="modal-body">
 						<table  class="table table-condensed" id = "#">
 							<thead bgcolor="#66CCFF">
 								<tr>

 									<th width = "200px"> Nama Barang </th>
 									<th width = "60px"> Jumlah diambil</th>
 								</tr>
 							</thead>

 							<tbody id = "retur">


 							</tbody>
 						</table>
 					</div>
 				</div>
 			</div>
 		</div>
 		<div class="modal fade bd-example-modal-lg" id="ModalCetak" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 			<div class="modal-dialog modal-lg" role="document">
 				<div class="modal-content" style="width:560px;margin-left: 185px;">
 					<div class="modal-header">
 						<h5 class="modal-title" id="exampleModalLabel">Alasan</h5>
 					</div>
 					<div class="modal-body" id = "keterangan">

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

 <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

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
 			url     :'<?php echo base_url();?>Surat_jalan/data_sj',
 			data    :'id_barang='+id_barang,
 			cache   :false,
 			success :function(respond){

 				$("#datadetail").html(respond);
 			}

 		});

 	});
 	$(".cetak").click(function(){
 		$('#ModalCetak').modal("show");
 		$('#alasan_cetak').focus();
 		no_sj_retur = $(this).attr('data-idi');
 		$.ajax({
 			type 	:'POST',
 			url     :'<?php echo base_url();?>Surat_jalan/looping_cetak_retur',
 			data    :'no_sj_retur='+no_sj_retur,
 			cache   :false,
 			success :function(respond){
 				$("#keterangan").html(respond);
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
 			url     :'<?php echo base_url();?>Surat_jalan/data_terkirim',
 			data    :'id_barang='+id_barang,
 			cache   :false,
 			success :function(respond){

 				$("#tampilan").html(respond);
 			}

 		});

 	});

 </script>

 <script type="text/javascript">
 	retur();
 	function retur(){			

 	}
 	$(".detail2").click(function(){

 		$('#Modal2').modal("show");

 		id_barang = $(this).attr('data-idii');

 		$.ajax({
 			type 	:'POST',
 			url     :'<?php echo base_url();?>Surat_jalan/data_retur',
 			data    :'id_barang='+id_barang,
 			cache   :false,
 			success :function(respond){

 				$("#retur").html(respond);
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
	$('#example2').DataTable({
		'paging'      : false,
		'lengthChange': false,
		'searching'   : true,
		'ordering'    : false,
		'info'        : false,
		'autoWidth'   : false
	});

	$('#example3').DataTable({
		'paging'      : false,
		'lengthChange': false,
		'searching'   : true,
		'ordering'    : false,
		'info'        : false,
		'autoWidth'   : false
	});
	$('#example4').DataTable({
		'paging'      : false,
		'lengthChange': false,
		'searching'   : true,
		'ordering'    : false,
		'info'        : false,
		'autoWidth'   : false
	});
</script>
</html>