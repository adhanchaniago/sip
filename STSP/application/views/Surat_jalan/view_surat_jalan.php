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
 						<li class="active" id = "naonwe"><a href="<?php echo base_url('Surat_jalan/view_surat_jalan')?>"><b>Data Surat Jalan</b></a></li> 
 						<?php if ($j->r_surat_jalan == "Y"): ?>
 							<li><a href="<?php echo base_url('Surat_jalan/view_sj_retur')?>"><b>Data Retur Surat Jalan</b></a></li>
 						<?php endif;?>
 						<?php if ($j->i_surat_jalan == "Y"): ?>
 							<a class="pull-right" style="margin-right: 5px;margin-top: 0px;"> <input type="text" id="no_jual" placeholder="NO SALES ORDER" autofocus="" class="form-control" style="margin-top: 2px;"></i></a>
 						<?php endif;?>
 					</ul>
 				</div>

 				<table id = "example2" class="table table-condensed">
 					<thead bgcolor="#66CCFF">
 						<tr>
 							<td width = "1%"><b> No </b></td>
 							<td width = "90px"> <b> No SJ</b></td>
 							<td width = "90px"> <b> No SO</b></td>
 							<td width = "150px"><b>  Nama Pelanggan</b></td>
 							<td align="center" width = "1%"><b>Status</b></td>
 							<td width = "250px"><b>  Ship To</b></td>
 							<td width = "250px"><b>  Keterangan</b></td>
 							<td width = "20px" ><b>  Tanggal</td>
 								<td width = "20px" ><b>  Cetak</td>
 									<td width = "30px">  <b>  User</b></td>
 									<?php if ($j->r_surat_jalan == "Y"): ?>
 										<td align="center" width = "30px">  <b>  R</b></td>
 									<?php endif;?>

 								</tr>
 							</thead>

 							<tbody>
 								<?php 
 								$no=1;
 								foreach($pk->result() as $pk){

 									?>
 									<tr >
 										<td ><?php echo $this->session->userdata('row')+$no;?></td>
 										<td href = "#" class="detail1" data-idi = "<?php echo $pk->no_kirim; ?>"><?php echo $pk->no_kirim; ?>/<?php echo $pk->id_pelanggan;?>/<?php echo $pk->no_reff_sj;?></td>
 										<td ><?php echo $pk->no_so;?>/<?php echo $pk->id_pelanggan;?>/<?php echo $pk->no_reff_so;?></td>
 										<td href = "#" ><?php echo $pk->nama_pelanggan;?></td>
 										<td align="center"><?php if ($pk->status > 0) {?>
 											<span style="width:15px;height:10px" class='btn btn-xs btn-success'></span>
 											<?php
 										} else{ ?>
 											<span style="width:15px;height:10px" class='btn btn-xs btn-danger'></span>
 										<?php }?>
 									</td>
 									<td href = "#" ><?php echo $pk->ke_alamat;?></td>
 									<td href = "#" ><?php echo $pk->keterangan;?></td>
 									<td href = "#" ><?php echo date("d-m-Y", strtotime($pk->tgl));?></td>
 									<td href = "#" ><?php echo $pk->cetak;?></td>
 									<td href = "#" ><?php echo $pk->user;?></td>
 									<?php if ($j->r_surat_jalan == "Y"): ?>
 										<td align="center"><a href = "<?php echo base_url('surat_jalan/edit_surat_jalan/'.$pk->no_kirim);?>"><span class = "btn btn-xs btn-success"><i class = "fa fa-mail-forward"></i></span></a></td>
 									<?php endif;?>
 								</tr>
 								<?php  $no++;}?>
 							</tbody>
 						</table>
 					</div>
 					<div>
 						<ul class="pagination pagination-sm no-margin pull-right">
 							<?php echo $this->pagination->create_links(); ?>
 						</ul>
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
 											<th width = "60px"> Satuan </th>
 											<th width = "60px"> Jumlah </th>
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
 				<div class="modal fade bd-example-modal-lg pelanggan" id="Modalorder" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 					<div class="modal-dialog modal-lg" role="document">
 						<div class="modal-content" style="width:729px; margin-left:148px">
 							<div class="modal-header">
 								<h5 class="modal-title" id="exampleModalLabel">Data Sales Order</h5>
 								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 									<span aria-hidden="true">&times;</span>
 								</button>
 							</div>
 							<br>
 							<div class="modal-body">
 								<table  class="table table-condensed" id = "example3" style = "width:697px;">
 									<thead bgcolor="#99FF99">
 										<tr>

 											<th style = "width:70px;"><b>No Order</b> </th>
 											<th style = "width:100px;"><b>Pelanggan</b> </th>
 											<th style = "width:100px;"><b>Sales</b> </th>
 											<th style = "width:150px;"><b>Ship To</b> </th>
 											<th style="align:right;width:50px;"><b>Tambah</b> </th>
 										</tr>
 									</thead>

 									<tbody >
 										<tr>
 											<?php
 											$query1 = "SELECT *,tb_penjualan.no_reff as no_reff FROM tb_penjualan INNER JOIN tb_pelanggan ON tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan  INNER JOIN tb_sales ON tb_penjualan.id_sales = tb_sales.id_sales where stok > 0 AND acc = 0 order by tb_penjualan.no_jual desc";
 											$cari1 = $this->db->query($query1);

 											?>
 											<?php
 											foreach ($cari1->result_array() as $p){
 												?>
 												<td><?php echo $p['no_jual']?>/<?php echo $p['id_pelanggan']?>/<?php echo $p['no_reff']?></td>
 												<td><?php echo $p['nama_pelanggan']?></td>
 												<td><?php echo $p['nama_sales']?></td>
 												<td><?php echo $p['alamat']?></td>
 												<td align="right"><a href = "<?php echo base_url('Surat_jalan/surat_jalan/'.$p['no_jual']); ?>"><span class = "btn btn-xs btn-success"><i class = "fa fa-plus"></i></span></a></td>

 											</tr>
 										<?php } ?>
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
 				no_sj = $(this).attr('data-idi');
 				$.ajax({
 					type 	:'POST',
 					url     :'<?php echo base_url();?>Surat_jalan/looping_cetak_sj',
 					data    :'no_sj='+no_sj,
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
 			var site = "<?php echo site_url();?>";
 			$(function(){
 				$('#no_jual').autocomplete({
 					serviceUrl: site+'Surat_jalan/get_data_no_sales/',
 					onSelect: function (suggestion) {
 						window.location.href = "<?php echo base_url();?>Surat_jalan/surat_jalan/"+suggestion.no_jual;

 					}
 				});
 			});
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
 			document.onkeyup = function (e) {
 				var evt = window.event || e;   
 				if (evt.keyCode == 13) {
 					$('#pel').click()   
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