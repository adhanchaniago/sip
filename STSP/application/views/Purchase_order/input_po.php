 <html>
 <head>
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">  <!-- Ionicons -->
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">  <!-- DataTables -->
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
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
 			margin-left : 18px;
 		}
 		th, {
 			text-align: center;
 			padding: 8px;
 		}


 	</style>  
 </head>
 <body class = "tampildata3" onLoad="startTime()">	
 	<div class = "row " >
 		
 		<section class="col-lg-5 connectedSortable" style="margin-left: 1px;width: 690px;">
 			<div style="overflow-x:auto;">
 				<div class="box box-primary" > 
 					<h3 class="box-title">Data PO</h3>
 					
 					
 					<?php 
 					$user = $this->session->userdata('username');
 					$query = "select * from menu WHERE level = '$user'";
 					$j = $this->db->query($query);
 					$j->num_rows();
 					
 					?>
 					<?php foreach ($j->result() as $j){ 
 					}
 					?>
 					
 					<div class="col-sm-12" style="width: 200%;margin-left: -14px;">
 						<table id = "example" class="table table-condensed" >
 							<thead bgcolor="#99FF99">
 								<tr>
 									<td width = "5px" ><b>No</b></td>
 									<td width = "80px" ><b>No PO</b></td>
 									<td width = "80px" ><b>No INV</b></td>
 									<td width = "150px"><b>Supplier</b></td>
 									<td width = "150px"><b>Pelanggan</b></td>
 									<td width = "250px"><b>Alamat</b></td>
 									<td width = "150px"><b>Keterangan</b></td>
 									<td align="center" width = "15px" ><b>Tanggal</b></td>
 									<td align="center"  width = "5px" ><b>S</b></td> 
 									<td align="center"  width = "5px" ><b>C</b></td> 
 									<td align="center"  width = "5px" ><b>E</b></td> 
 									<?php if ($j->e_purchase_order == "Y" ): ?>
 										<td align="center" width = "10px" ><b>A</b></td>
 										<td align="center" width = "10px" ><b>B</b></td>
 									<?php endif;?>
 								</tr>
 							</thead>
 							<tbody>
 								<?php $no = 1; 
 								foreach ($list_po->result() as $b){ 
 									?>
 									<tr>
 										<td> <?php echo $no;?></td>
 										<td href = "#" class="detail" data-idi = "<?php echo $b->no_po;?>"> <?php echo $b->no_po;?></td>
 										<td> <?php echo $b->no_jual;?></td>
 										<td > <?php echo $b->nama_supplier;?></td>
 										<td> <?php echo $b->nama_pelanggan;?></td>
 										<td> <?php echo $b->alamat;?></td>
 										<td> <?php echo $b->keterangan;?></td>
 										<td align="center" > <?php echo $b->tgl;?></td>
 										<td align="center">
 											<?php if ($b->acc > 0) {?>
 												<span ><i class='fa fa-check'></i></span>
 												<?php
 											} else{ ?>
 												<span></i></span>
 											<?php }?>
 										</td>
 										<td align="center"> <?php echo $b->cetak;?></td>
 										<td align="center"> <?php echo $b->edit;?></td>
 										<?php if ($j->e_purchase_order == "Y" ): ?>
 											<td align = "center">
 												<?php if($b->batal == 0 AND $b->acc == 0){?>
 													<a href = "<?php echo base_url("Pembelian/edit_po");?>/<?php echo $b->no_po;?>"  title = "Edit"><span class = "btn btn-xs btn-primary"><i class = "fa fa-edit"></i></span></a>
 												<?php }else{?>
 													<a href = "<?php echo base_url("Pembelian/edit_po");?>/<?php echo $b->no_po;?>"  title = "Edit"><span class = "btn btn-xs btn-primary disabled"><i class = "fa fa-edit"></i></span></a>
 												<?php }?>
 											</td>
 											<td align = "center">
 												<?php if($b->batal == 0 AND $b->acc == 0){?>
 													<a href = "#" data-idi = "<?php echo $b->no_po;?>" class = "batal" title = "Batal"><span class = "btn btn-xs btn-danger"><i class = "fa fa-close"></i></span></a>
 												<?php }else{?>
 													<a href = "#" data-idi = "<?php echo $b->no_po;?>"  class = "btn btn-xs btn-danger disabled"><i class = "fa fa-close"></i></a>
 												<?php }?>
 											</td>
 										<?php endif;?>
 									</tr>
 									<?php $no++;}?>
 								</tbody>
 							</table>
 						</div>
 					</div>
 				</div>
 			</section>
 			<?php if ($j->i_purchase_order == "Y" ): ?>
 				<section class="col-lg-7 connectedSortable" style="margin-left: 6%;">
 					<div class="box box-primary" > 
 						<h3 class="box-title">Input PO</h3>
 					</div>
 					<div class="box-body">
 						<div class="col-md-7">
 							<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data">
 								<div class="form-group">
 									<label class="col-sm-40 control-label">No PO</label>
 									<div class="col-sm-37" style="margin-left: -2%;width: 150px;">
 										<input type="text"  name="no_po" id="no_po" value="<?php echo $autonumber;?>" readonly class="form-control" placeholder = " No PO"  >
 										<input type="hidden"  name="edit_urut" id="#" value="1" readonly class="form-control" placeholder = " No PO"  >
 										<input type="hidden"  name="" id="cekbarang" >
 									</div>
 									<label class="col-sm-40 control-label">Supplier</label>
 									<div class="col-sm-37" style = "width:130px;">
 										<select name="" id="id_supplier" class="form-control select2"  style="width: 130%;" tabindex="1" required autofocus> 
 											<option value = "" selected="selected">Pilih Supplier</option>
 											<?php foreach ($listsupplier->result() as $s){
 												
 												?>
 												<option value = "<?php echo $s->id_supplier;?>" data-idsup = "<?php echo $s->id_supplier;?>" data-alamat = "<?php echo $s->alamat;?>" data-kurs = "<?php echo $s->kurs_tukar;?>" data-kodemu = "<?php echo $s->kode_mu;?>"> <?php echo $s->nama_supplier;?> </option>
 												
 											<?php } ?>
 										</select>
 									</div>
 								</div>
 								<div class="form-group">
 									<label class="col-sm-40 control-label">Tanggal</label>
 									<div class="col-sm-37" style="margin-left: -2%;width: 150px;">
 										<input type="hidden" name="no_jual" id = "no_jual" autocomplete="off" readonly class="form-control" placeholder = " Tanggal PO">
 										<input type="hidden" name="id_supplier" id = "idsup" autocomplete="off" readonly class="form-control" placeholder = " Tanggal PO">
 										<input type="hidden" name="no_reff" id = "no_reff" autocomplete="off" readonly class="form-control" placeholder = " Tanggal PO">
 										<input type="text" name="tgl_po" id = "tgl_po" value="<?php echo date('d-m-Y') ;?>" autocomplete="off" readonly class="form-control" placeholder = " Tanggal PO">
 										<textarea rows="1"  style = "display:none;"class="form-control" name="jam" id="txt" style="height: 34px;"readonly></textarea>
 									</div>
 									<label class="col-sm-40 control-label">Pelanggan</label>
 									<div class="col-sm-37" style = "width:130px;">
 										<select name="id_pelanggan" id="id_pelanggan" class="form-control select2"  style="width: 130%;"  tabindex="1" required> 
 											<option value = "" selected="selected">Pilih Pelanggan</option>
 											<?php foreach ($listpelanggan->result() as $p){
 												?>
 												
 												<option value = "<?php echo $p->id_pelanggan;?>" data-noref = "<?php echo $p->no_reff;?>"> <?php echo $p->nama_pelanggan;?> </option>
 												
 											<?php } ?>
 										</select>
 									</div>
 								</div>
 							</div>	
 							<div class="col-md-5">
 								<div class="col-sm-41">
 									<textarea  type="text"  name="ket_alamat" id="alamat" rows="2" style="width: 172px; height: 70px; margin-left: 65px;" autocomplete="off" class="form-control"  placeholder = " ALAMAT (f1)" onkeyup=" this.value=this.value.toUpperCase();"></textarea>

 								</div>
 							</div>
 							<div class="col-md-9"  style="margin-top: 5px;width: 684px;">
 								<div class="col-sm-30" style="width:305px;" >
 									<input type="text"  name="namabarang" id="nama_barang" class="form-control" placeholder = "NAMA BARANG (<-)" tabindex = "4">
 								</div>
 								<div class="col-sm-30" style="width:230px" >
 									<input type="hidden"  name="idbarang" id="id_barang" class="form-control" placeholder = "Barang" tabindex = "5">
 								</div>
 								<div class="col-sm-35" style="width:110px">
 									<input type="text"  name="qtybes" id="Q_B"   autocomplete="off" class="form-control" placeholder = "QTY "  tabindex = "6">
 									
 								</div>
 								<div class="col-sm-35"style="width:80px">
 									<input type="text"  name="satuanbes" id="S_B" readonly autocomplete="off" class="form-control" placeholder = "SATUAN">
 									
 								</div>
 								<div class="col-sm-35" style="width:110px">
 									<input type="text"  name="hargajual" id="harga_jual" onFocus="startCalc();"   autocomplete="off" class="form-control" placeholder = "HARGA "  tabindex = "6">
 									<input type="hidden"  name="" id="kurs_tukar" onFocus="startCalc();"   autocomplete="off" class="form-control" placeholder = "HARGA "  tabindex = "6">
 									<input type="hidden"  name="kurs" onFocus="startCalc();"  id="hasil_kurs_tukar"   autocomplete="off" class="form-control" placeholder = "HARGA "  tabindex = "6">
 									<input type="hidden"  name="kodemu" id="kode_mu"   autocomplete="off" class="form-control" placeholder = "HARGA "  tabindex = "6">
 								</div>
 								
 								
 								<div class="col-sm-31">
 									<button   type="submit" class="btn btn-sm btn-primary " onkeyup="checkForm();" name="btn_simpan" id="btn_simpan"  tabindex = "7">OK</button>
 									
 								</div>
 								
 								<table class="table table-condensed">
 									<thead bgcolor="#99FF99">
 										<tr>
 											<th width = "5px" >No</th>
 											<th width = "240px" >Nama Barang</th>
 											<th width = "65px">Qty</th>
 											<th width = "163px">Harga</th>
 											<th width = "50px">A</th>
 										</tr>
 									</thead>
 									<tbody id = "tampiltmp">
 										
 									</tbody>
 								</table>
 								<div class="form-group">
 									<label class="col-sm-29 control-label" style="margin-top: 8px;">Keterangan</label>
 									<div class="col-sm-33" style="width:514px;margin-left: 23px;">
 										<input type="text"  name="keterangan" id="ket"  autocomplete="off"  tabindex = "8" class="form-control" placeholder = "KETERANGAN (F2)" onkeyup=" this.value=this.value.toUpperCase();">
 									</div>
 								</div>
 								<div class="col-sm-31">
 									<br>
 									<br>
 									<br>
 								</div>
 							</div>
 							<div class="form-group">
 								<table class = "table1">
 									<tr>
 										<td align = "right">
 											<input type="submit" name = "submit" value = "SIMPAN" title = "Simpan" class="btn btn-sm btn-primary" tabindex="30">
 											<a href = "<?php echo base_url();?>Pembelian/riset2" title = "Cancel" class = "btn btn-sm btn-danger"  tabindex="31">Cancel</a>
 											
 										</td>
 									</tr>
 								</table>
 							</div>
 						</div>
 						
 					</div>
 				</form>
 			</div>
 		</div>
 	</section>
 <?php endif;?>
 <div class="modal fade bd-example-modal-lg" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 	<div class="modal-dialog modal-lg" role="document">
 		<div class="modal-content" style="width:500px;margin-left:200px;margin-top:100px;">
 			<div class="modal-header">
 				<h5 class="modal-title" id="exampleModalLabel">Data Detail PO</h5>
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 					<span aria-hidden="true">&times;</span>
 				</button>
 			</div>
 			<div class="modal-body">
 				<table  class="table table-condensed" id = "#">
 					<thead bgcolor="#99FF99">
 						<tr>
 							
 							<th style="width:1px"> No </th>
 							<th style="width:138px"> Nama Barang </th>
 							<th style="width:10px"> QTY </th>
 							<th style="width:10px"> Harga </th>
 						</tr>
 					</thead>
 					
 					<tbody id = "datadetail">
 						
 						
 					</tbody>
 				</table>
 			</div>
 		</div>
 	</div>
 </div>
 
 <div class="modal fade bd-example-modal-lg" id="detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 	<div class="modal-dialog modal-lg" role="document">
 		<div class="modal-content" style="width:900px;margin-left:50px;margin-top:100px;">
 			<div class="modal-header">
 				<h5 class="modal-title" id="exampleModalLabel">Detail</h5>
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 					<span aria-hidden="true">&times;</span>
 				</button>
 			</div>
 			<div class="modal-body">
 				<table  class="table table-condensed" id = "#">
 					<thead bgcolor="#99FF99">
 						<tr>
 							
 							<th style="width:100px">Keterangan</th>
 							<th style="width:100px"> Alamat </th>
 						</tr>
 					</thead>
 					
 					<tbody id = "detail_alamat">
 						
 						
 					</tbody>
 				</table>
 			</div>
 		</div>
 	</div>
 </div>
 <div class="modal fade bd-example-modal-lg" id="edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 	<div class="modal-dialog modal-lg" role="document">
 		<div class="modal-content" style="width:500px;margin-left:200px;margin-top:100px;">
 			<div class="modal-header">
 				<h5 class="modal-title" id="exampleModalLabel">Data Detail PO</h5>
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 					<span aria-hidden="true">&times;</span>
 				</button>
 			</div>
 			<div class="modal-body">
 				<table  class="table table-condensed" id = "#">
 					<thead bgcolor="#99FF99">
 						<tr>
 							
 							<th style="width:200px"> Nama  </th>
 							<th style="width:10px"> QTY </th>
 						</tr>
 					</thead>
 					
 					<tbody id = "datadetail">
 						
 						
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
 				<h5 class="modal-title" id="exampleModalLabel">Alasan Edit</h5>
 			</div>
 			<div class="modal-body" id = "keterangan">
 				
 			</div>
 			<div class="modal-footer">
 				
 			</div>
 		</div>
 	</div>
 </div>
 <div class="modal fade bd-example-modal-lg" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 	<div class="modal-dialog modal-lg" role="document">
 		<div class="modal-content" style="width:560px;margin-left: 185px;">
 			<div class="modal-header">
 				<h5 class="modal-title" id="exampleModalLabel">Alasan Cetak</h5>
 			</div>
 			<div class="modal-body" id = "keterangan1">
 				
 			</div>
 			<div class="modal-footer">
 				
 			</div>
 		</div>
 	</div>
 </div>
 <div class="modal fade bd-example-modal-lg" id="ModalBatal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 	<div class="modal-dialog modal-lg" role="document">
 		<div class="modal-content" style="width:400px;margin-left: 247px;">
 			<div class="modal-header">
 				<h5 class="modal-title" id="exampleModalLabel">Pembatalan</h5>
 			</div>
 			<div class="modal-body" id = "keterangan2">
 				
 			</div>
 		</div>
 	</div>
 </div>
</div>  
<?php echo $this->session->flashdata('message');
?>
</body>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/number.js"></script>

<script type="text/javascript">
	cekbarang();
	function cekbarang(){

		var idbarang = $("#id_barang").val();
		$.ajax({
			type    : 'POST',
			url     : '<?php echo site_url(); ?>Pembelian/cekbarangpo',
			cache   : false,
			data    : {idbarang:idbarang},
			success :function(respond){

				$("#cekbarang").val(respond);
				var cekbarang = $("#cekbarang").val();

				if (cekbarang >= 1) {
					$('#id_supplier').prop('disabled',true);
				}else{
					$('#id_supplier').prop('disabled',false);

				}

			}

		});
	} 
	$('#id_pelanggan').change(function(){
		var
		value 			= $(this).val(),
		$obj 			= $('#id_pelanggan option[value="'+value+'"]'),
		no_ref			= $obj.attr('data-noref');
		
		$('#no_reff').val(no_ref);
		
	});
</script>
<script type="text/javascript">
	$('#id_supplier').change(function(){
		var
		value 			= $(this).val(),
		$obj 			= $('#id_supplier option[value="'+value+'"]'),
		alamat			= $obj.attr('data-alamat');
		kurs_tukar		= $obj.attr('data-kurs');
		kode_mu		    = $obj.attr('data-kodemu');
		idsup		    = $obj.attr('data-idsup');
		
		$('#alamat').val(alamat);
		$('#kode_mu').val(kode_mu);
		$('#kurs_tukar').val(kurs_tukar);
		$('#idsup').val(idsup);
		
	});
</script>
<script>
	
	var site = "<?php echo site_url();?>";
	$(function(){
		$('#nama_barang').autocomplete({
			serviceUrl: site+'Pembelian/get_data',
			onSelect: function (suggestion) {
				$('#id_barang').val(''+suggestion.id_barang); 
				$('#harga_jual').val(''+suggestion.modal_t); 
				$('#S_B').val(''+suggestion.satuan_besar); 
				$('#Q_IB').val(''+suggestion.qty_b);
			}
		});
	});
</script>
<script type="text/javascript">
	function startCalc(){
		interval = setInterval("calc()",1);}
		function calc(){
			
			one   = document.getElementById('harga_jual').value;
			two   = document.getElementById('kurs_tukar').value;
			document.getElementById('hasil_kurs_tukar').value = (one * 1) * (two *1);
		}
		
		function stopCalc(){
			clearInterval(interval);}

			

		</script>
		<script type="text/javascript">
			tampiltmp();

			$('select').select2();
			function tampiltmp(){			

				$("#tampiltmp").load("<?php echo base_url();?>Pembelian/view_detail_po");
			//$('.tampildata1').load("<?php echo base_url();?>Pembelian/view_barang_edit3");			
		}
		$('#btn_simpan').on('click',function(){
			var namabarang		=$('#nama_barang').val();
			var idbarang		=$('#id_barang').val();
			var hargajual		=$('#harga_jual').val();
			var qtybes			=$('#Q_B').val();
			var satuanbes		=$('#S_B').val();
			var kurs			=$('#hasil_kurs_tukar').val();
			var kodemu			=$('#kode_mu').val();
			var jam				=$('#txt').val();
			if(namabarang == 0){
				alert("Oops.. Nama Barang Masih Kosong");
				document.getElementById("nama_barang").focus();
			}else if(hargajual == 0){
				alert("Oops.. Harga Masih Kosong");
				document.getElementById("harga_jual").focus();
			}else if(qtybes == 0){
				alert("Oops.. Qty Masih Kosong");
				document.getElementById("Q_B").focus();
			}else{
				$.ajax({
					type : "POST",
					url  : "<?php echo base_url()?>Pembelian/input_detail_po",
                data : {idbarang:idbarang,kurs:kurs,kodemu:kodemu,hargajual:hargajual,qtybes:qtybes,satuanbes:satuanbes,jam:jam}, //dihapus,disc2:disc2
                success: function(data){
                	$('[name="idbarang"]').val("");
                	$('[name="namabarang"]').val("");
                	$('[name="hargajual"]').val("");
                	$('[name="qtybes"]').val("");
                   // $('[name="qtykec"]').val("");
                   $('[name="satuanbes"]').val("");
                   cekbarang();
                   tampiltmp();
                   document.getElementById("nama_barang").focus();
                   
					//$("#tampil").load("<?php echo base_url();?>Pembelian/view_detail_po");
					
				}
				
			});
			}
			return false;
			
		});
		
		
		
		
	</script>
	<script>

		$(".detail").click(function(){
			
			$('#ModalDetail').modal("show");

			id_barang = $(this).attr('data-idi');

			$.ajax({
				type 	:'POST',
				url     :'<?php echo base_url();?>Pembelian/detail_po',
				data    :'id_barang='+id_barang,
				cache   :false,
				success :function(respond){
					$("#datadetail").html(respond);
					cekbarang();
				}
				
			});

		});
		$(".cetak").click(function(){
			$('#ModalCetak').modal("show");
			$('#alasan_cetak').focus();
			no_po = $(this).attr('data-id');
			$.ajax({
				type 	:'POST',
				url     :'<?php echo base_url();?>Pembelian/looping_edit_po',
				data    :'no_po='+no_po,
				cache   :false,
				success :function(respond){
					$("#keterangan").html(respond);
					cekbarang();

				}
			});
		});
		$(".edit").click(function(){
			$('#ModalEdit').modal("show");
			no_po = $(this).attr('data-nopo');
			$.ajax({
				type 	:'POST',
				url     :'<?php echo base_url();?>Pembelian/looping_cetak_po',
				data    :'no_po='+no_po,
				cache   :false,
				success :function(respond){
					$("#keterangan1").html(respond);
					cekbarang();
				}
			});
		});
		$(".batal").click(function(){
			$('#ModalBatal').modal("show");
			no_po = $(this).attr('data-idi');
			$.ajax({
				type 	:'POST',
				url     :'<?php echo base_url();?>Pembelian/looping_batal',
				data    :'no_po='+no_po,
				cache   :false,
				success :function(respond){
					cekbarang();
					$("#keterangan2").html(respond);
				}
			});
		});
	</script>
	<script>

		$(".detailalamat").click(function(){
			
			$('#detail').modal("show");

			no_po = $(this).attr('data-idii');

			$.ajax({
				type 	:'POST',
				url     :'<?php echo base_url();?>Pembelian/detail_alamat',
				data    :'no_po='+no_po,
				cache   :false,
				success :function(respond){
					$("#detail_alamat").html(respond);
				}
				
			});

		});
	</script>

	<script>

		$(".edit").click(function(){
			
			$('#edit').modal("show");

			no_po = $(this).attr('data-edit');

			$.ajax({
				type 	:'POST',
				url     :'<?php echo base_url();?>Pembelian/edit',
				data    :'no_po='+no_po,
				cache   :false,
				success :function(respond){
					$("#edit").html(respond);
				}
				
			});

		});
	</script>
	<script>
		
		$('body').on('click', '.hapus-barang', function(e){
			e.preventDefault();

			var use = $(this).attr('data-use');
			var idbarang = $(this).attr('data-idbrg');
			var _this = $(this);
			
			$.ajax({
				type: 'post',
				dataType: 'json',
				url : "<?= site_url('Pembelian/destroy4/');?>"+'/'+use+'/'+idbarang,
				success: function(data){
					cekbarang();
					tampiltmp();
			  //$('.tampildata').load("<?php echo base_url();?>Pembelian/view_barang_edit2");
			  //$('.tampildata1').load("<?php echo base_url();?>Pembelian/view_barang_edit3");
			}
		});
		});	
	</script>

	<script>
		document.onkeyup = function (e) {
			var evt = window.event || e;   
			if (evt.keyCode == 16 && evt.ctrlKey) {
				$('#btn_simpan1').click()   
			}
			if (evt.keyCode == 67 && evt.ctrlKey) {
				$('#simpan2').click()   
			}
			if (evt.keyCode == 88 && evt.ctrlKey) {
				$('#simpan3').click()   
			}
		}
	</script>
	<script type="text/javascript">
		$(document).on('keydown', 'body', function(e){
			var charCode = ( e.which ) ? e.which : event.keyCode;

				if(charCode == 118) 
				//F7
				{
					BarisBaru();
					return false;
				}

				if(charCode == 37) //enter
				{
					$('#nama_barang').focus();
				}
				if(charCode == 112) //panah atas
				{
					$('#alamat').focus();
				}
				if(charCode == 39) //panah kanan	
				{
					$('#ongkir1').focus();
				}
				if(charCode == 113) //panah bawah
				{
					$('#ket').focus();
				}
				if(charCode == 35) //F9
				{
					$('#simpan').click();
				}
				if(charCode == 1200) //F9
				{
					$('#simpan2').click();
				}
				if(charCode == 1210) //F9
				{
					$('#simpan3').click();
				}
				if(charCode == 45) //F9
				{
					$('#id_pelanggan').focus();
				}
				if(charCode == 33) //F9
				{
					$('#nm_barang').focus();
				}
				if(charCode == 34) //F9
				{
					$('#ket_retur').focus();
				}
});

</script>
<script>
	function startTime()
	{
		var today=new Date();
		var h=today.getHours();
		var m=today.getMinutes();
		var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('txt').innerHTML=h+":"+m+":"+s;
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
	if (i<10)
	{
		i="0" + i;
	}
	return i;
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
	$(this).val(nama);
</script>
<script type="text/javascript">
	function checkForm(){
		var qtyb = document.getElementById("Q_B").value;
		
		f(qtyb == 0){
			alert("Qty Masih Kosong");
			return false;
		} else  {
			return false;
		}
	}
</script>
<script type="text/javascript">
	function confirm() {
		var msg;
		msg= "Apakah Mang Kemed Yakin Akan Menghapus Data ? " ;
		var agree=confirm(msg);
		if (agree)
			return true ;
		else
			return false ;
	}</script>
	<script>
		
		$("#example").DataTable({
			
			searching   : true,
			bInfo : false,
			bLengthChange : false,
			bPaginate : true,
			ordering	:	false
			
			
		});
		$("#example2").DataTable({
			
			
			searching   : true,
			bInfo : false,
			bLengthChange : false,
			bPaginate : false
			
			
			
		});
		
		
	</script>
	</html>