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
 <body id = "backgroundMusic">	
 	<div class = "row">

 		<section class="col-lg-4 connectedSortable" style="margin-left:-1px;width:700px;" >
 			<div class="box box-primary" > 
 				<h3 class="box-title" style="margin-top:4px;margin-bottom:-19px;padding-bottom:4px;"> Data Barang <?php echo $d['nama_pelanggan']?></h3>
 			</div>
 			<table  class="table table-condensed" id = "example">
 				<thead>
 					<tr  bgcolor="#66CCFF">
 						
 						
 						<th style = "width:150px;" > Nama Barang </th>
 						<th style = "width:50px;"> QTY  </th>
 						<th style = "width:50px;"> Terkirim  </th>
 						<th style = "width:50px;"> Sisa Kirim  </th>
 					</tr>
 				</thead>
 				
 				<tbody>
 					<?php		
 					$id = $this->uri->segment(3);
 					$query = "SELECT *
 					FROM tb_detail_penjualan 
 					INNER JOIN tb_barang ON tb_detail_penjualan.id_barang = tb_barang.id_barang WHERE tb_detail_penjualan.no_jual = '$id'"; 
									//dhapus ,disc2
 					$cari = $this->db->query($query);
 					$cari->num_rows();
 					
 					?>
 					<?php 
 					$no=1;
 					$sub = 0;
 					if(isset($cari)){
 						foreach ($cari->result_array() as $t){
 							?>
 							<tr>
 								
 								<td> <?php echo $t['nama_barang']; ?></td>
 								<td> <?php echo  $t['qtyb'] ; ?> <?php echo $t['satuan_besar']; ?></td>
 								<td> <?php echo  $t['terkirim'] ; ?> <?php echo $t['satuan_besar']; ?></td>
 								<td> <?php echo  $t['qtyb']-$t['terkirim'] ; ?></td>
 							<?php } }?> 
 						</tr>
 						
 					</tbody>
 				</table>
 			</section>
 			<section class="col-lg-4 connectedSortable" style = "margin-left:-25px;width:675px;" >
 				<div class="box box-primary" > 
 					<h3 class="box-title" style="margin-top:4px;margin-bottom:-19px;padding-bottom:4px;">Input Surat Jalan</h3>
 				</div>
 				<div class="box-body">
 					<div class="col-ig-7">
 						<form class="form-horizontal"  method="POST" id="form" action="" enctype = "multipart/form-data">
 							<div class="form-group">
 								<label class="col-sm-40 control-label" style = "width:80px;">No SJ</label>
 								<div class="col-sm-37" style = "width:195px;" >
 									<input type="text" name="" value = "<?php echo $autonumber;?>" id="" autocomplete="off" readonly  class="form-control" placeholder = " AUTONUMBER">
 									<input type="hidden"  name="no_reff_sj" id="no_ref" value="<?php echo $d['no_sjln'];?>" autocomplete="off" readonly class="form-control" placeholder = "NO REFF">
 									<input type="hidden"  name="id_pelanggan" id=""  value="<?php echo $d['id_pelanggan'];?>"  autocomplete="off" readonly class="form-control" placeholder = "ID PELANGGAN">
 								</div>
 							</div>
 							<div class="form-group">
 								<label class="col-sm-40 control-label" style = "width:80px;">No SO</label>
 								<div class="col-sm-37" style = "width:195px;" >
 									<input type="text" name="" id="" value="<?php echo $d['no_jual'];?>/<?php echo $d['id_pelanggan'];?>/<?php echo $d['no_roff'];?>"  autocomplete="off" readonly  class="form-control " placeholder = " NO VIEW SALES ORDER">
 									<input type="hidden" name="no_so" id="no_jual" value="<?php echo $d['no_jual'];?>"  autocomplete="off" readonly  class="form-control " placeholder = " NO SALES ODER">
 									<input type="hidden" name="no_reff_so" id = "" value="<?php echo $d['no_roff'];?>" autocomplete="off" readonly  class="form-control detail" placeholder = " NO REFF SO">
 									<input type="hidden" name="cektemp" id="cektemp">
 								</div>
 							</div>
 							<div class="form-group">
 								<label class="col-sm-40 control-label" style = "width:80px;">Tanggal</label>
 								<div class="col-sm-37" style = "width:195px;">
 									<input type="text" name="" id="" value="<?php echo date('d-m-Y');?>" autocomplete="off" readonly  class="form-control" placeholder = " No Jual">
 									<input type="hidden" name="tgl" id="tgl" value="<?php echo date('Y-m-d');?>" autocomplete="off" readonly  class="form-control" placeholder = " No Jual">
 									<?php 
 									$dt = mktime(0,0,0,date('n'),date('j')+$d['masa_hutang'],date('y'));
 									$k  = date('Y-m-d',$dt);?>
 									<input type="hidden" name="jatuh_tempo" id="tgl" autocomplete="off" readonly value="<?php echo $k;?>" class="form-control" placeholder = "Jatuh Tempo">
 								</div>
 							</div>
 						</div>
 						<div class="col-md-5">
 							<div class="col-sm-41">
 								<textarea  type="text" readonly name="ke_alamat" id="send" rows="2" style="margin-left:436px;margin-top:-94px;width: 207px; height: 92px;" autocomplete="off" class="form-control"  placeholder = " ALAMAT (F1)"><?php echo $d['ket_alamat'];?></textarea>
 							</div>
 						</div>
 						<div class="col-ig-7">
 							<div class="form-group">
 								<div class="col-sm-30" style="margin-left:8px;width:296px;margin-top: 11px;" >
 									<input type="text" name="namabarang" id="nama_barang"  autocomplete="off" autofocus class="form-control detail" autofocus placeholder = "NAMA BARANG" tabindex = "1">
 									<input type="hidden"  name="idbarang"  autocomplete="off" id="id_barang" class="form-control"  placeholder = "ID BRG" >
 								</div>
 								<div class="col-sm-35" style="width:96px;margin-top: 11px" >
 									<input type="text"  name="satuanbesar"  autocomplete="off" id="satuan_besar" readonly   class="form-control" placeholder = "SATUAN">
 									<input type="hidden"  name="modal"  autocomplete="off" id="modal" readonly   class="form-control" placeholder = "DISC 1"  >
 									
 								</div>
 								<div class="col-sm-35" style="width:96px; margin-top: 11px;" >
 									<input type="text"  name="jmlkrm" id="jml_krm"  autocomplete="off"  class="form-control" placeholder = "KIRIM"  tabindex = "2">
 									<input type="hidden"  name="qty" id="oon"  autocomplete="off"  class="form-control" placeholder = "KIRIM"  tabindex = "2">
 									
 								</div>
 								<div class="col-sm-35" style="width:96px;margin-top: 11px" hidden="">
 									<input type="text"  name="hargasatuan"  autocomplete="off" id="harga_satuan" readonly   class="form-control" placeholder = "HARGA"  >
 									<input type="hidden"  name="disc"  autocomplete="off" id="disc" readonly   class="form-control" placeholder = "DISC"  >
 									<input type="hidden"  name="disc1"  autocomplete="off" id="disc1" readonly   class="form-control" placeholder = "DISC 1"  >
 									
 								</div>
 								<div class="col-sm-31" style="margin-top: 11px;">
 									
 									<button class="btn btn-sm btn-primary" name="btn_simpan" id="btn_simpan"  tabindex = "3">OK</button>
 								</div>
 								
 								
 							</div>
 							
 						</div>
 						
 						<table  class="table table-condensed" id = "#" style="margin-left: 8px;">
 							<thead>
 								<tr bgcolor="#99FF99">
 									<th style = "width:140px;" > Nama Barang </th>
 									<th style = "width:40px;"> Satuan  </th>
 									<th style = "width:50px;"> Kirim </th>
 									<th style = "width:50px;"> A </th>
 								</tr>
 							</thead>
 							
 							<tbody id="tampilan">
 								
 								
 							</tbody>
 						</table>
 						<div class="form-group">
 							<div class="col-sm-37" style = "margin-left:8px;width:350px;">
 								<input type="text" name="keterangan" id="keterangan"  autocomplete="off"  value="<?php echo $d['keterangan']?>" onkeyup=" this.value=this.value.toUpperCase();"  class="form-control" placeholder = " KETERANGAN"  tabindex = "4">
 							</div>
 						</div>
 						<table class = "table1">	
 							<tr>
 								<td align = "right">
 									<input type="submit" name = "submit" id = "btn_simpan1" target = "blank" class="btn btn-sm btn-primary"  tabindex = "5" value = "SIMPAN">
 									<?php if($this->session->userdata('level') === 'Administrator' OR $this->session->userdata('level') === 'KasirThermal' OR $this->session->userdata('level') === 'Manager'): ?>
 									<input type="submit" name = "submit2" id = "simpan2" class="btn btn-sm btn-success"  tabindex = "5" value = "SIMPAN & CETAK">
 								<?php endif;?>
 								<a href = "<?php echo base_url('surat_jalan/reset');?>" class = "btn btn-sm btn-danger"  tabindex = "6">Cancel</a>
 							</td>
 						</tr>
 					</table>
 				</form>
 			</div>
 		</div>	
 		
 	</section>
 </div>
</body>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/number.js"></script>

<script type="text/javascript">
	$("#btn_simpan1").click(function(){

		var cektemp			=$('#cektemp').val();
		if(cektemp == 0){
			alert("Oops.. Barang Masih Kosong");
			return false;
		}else{

			return true;
		}

	});
	
	tampilan();
	
	function tampilan(){			
		$("#tampilan").load("<?php echo base_url();?>surat_jalan/view_detail");
	}
	$('#btn_simpan').on('click',function(){
		var namabarang		=$('#nama_barang').val();
		var idbarang		=$('#id_barang').val();
		var satuanbesar		=$('#satuan_besar').val();
		var hargasatuan		=$('#harga_satuan').val();
		var modal			=$('#modal').val();
		var disc			=$('#disc').val();
		var disc1			=$('#disc1').val();
		var jmlkrm			=$('#jml_krm').val();
		var oon				= parseInt($('#oon').val());
		var stok			= parseInt($('#stok').val());
		
		if(namabarang == 0){
			alert("Oops.. Nama Barang Masih Kosong");
			document.getElementById("nama_barang").focus();
		}else if(jmlkrm == 0){
			alert("Oops.. Jumlah Kirim Masih Kosong");
			document.getElementById("jml_krm").focus();
		}else if(jmlkrm > oon){
			alert("Oops.. Jumlah Kirim Lebih");
			document.getElementById("jml_krm").focus();
		}else{
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url()?>Surat_jalan/input_detail",
				data : {idbarang:idbarang,satuanbesar:satuanbesar,modal:modal,hargasatuan:hargasatuan,jmlkrm:jmlkrm,disc:disc,disc1:disc1},
				success: function(data){
					$('[name="namabarang"]').val("");
					$('[name="idbarang"]').val("");
					$('[name="satuanbesar"]').val("");
					$('[name="hargasatuan"]').val("");
					$('[name="jmlkrm"]').val("");
					$('[name="stok"]').val("");
					$('[name="disc"]').val("");
					$('[name="disc1"]').val("");
					$('[name="qty"]').val("");
					$('[name="modal"]').val("");
					
					tampilan();
					cektemp();
					document.getElementById("nama_barang").focus();
				}
			});
			
		}
		return false;
	});
	
</script>

<script type="text/javascript">
	var site = "<?php echo site_url();?>";
	$(function(){
		var nono = $('#no_jual').val();
		$('#nama_barang').autocomplete({
			serviceUrl: site+'Surat_jalan/get_barang/'+nono,
			onSelect: function (suggestion) {
				$('#id_barang').val(''+suggestion.id_barang); 
				$('#satuan_besar').val(''+suggestion.satuan_besar); 
				$('#jml_krm').val(''+suggestion.sisa_kirim); 
				$('#harga_satuan').val(''+suggestion.harga_beli); 
				$('#disc').val(''+suggestion.disc); 
				$('#disc1').val(''+suggestion.disc1); 
				$('#modal').val(''+suggestion.modal); 
				$('#oon').val(''+suggestion.sisa_kirim); 
				cektemp();
			}
		});
	});
</script>

<script type="text/javascript">
	cektemp();
	function cektemp(){

		$.ajax({

			type    : 'POST',
			url     : '<?php echo base_url(); ?>Surat_jalan/cektemp',
			cache   : false,
			success :function(respond){

				$("#cektemp").val(respond);
				
			}

		});
	} 
	
	$(".detail").keyup(function(){
		

		id_barang = $(this).attr('data-id');

		$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Surat_jalan/data_sj',
			data    :'id_barang='+id_barang,
			cache   :false,
			success :function(respond){
				$("#tampiltmp").html(respond);
			}
			
		});

	});
	
</script>
<script>

</script>
<script>
	
	$('body').on('click', '.hapus-barang', function(e){
		e.preventDefault();

		
		var user = $(this).attr('data-user');
		var idbarang = $(this).attr('data-barang');
		var _this = $(this);

		$.ajax({
			type: 'post',
			dataType: 'json',
			url : "<?= site_url('Penjualan/destroy3/');?>"+'/'+user+'/'+idbarang,
			success: function(data){
				cektemp();
				tampilan();
			}
		});
	});	
</script>
<script>
	document.onkeyup = function (e) {
		var evt = window.event || e;   
		if (evt.keyCode == 13 && evt.ctrlKey) {
			$('#btn_simpan1').click()   
		}
		if (evt.keyCode == 67 && evt.ctrlKey) {
			$('#simpan2').click()   
		}
	}
</script>
<script type="text/javascript">
	$(document).on('keydown', 'body', function(e){
		var charCode = ( e.which ) ? e.which : event.keyCode;

	if(charCode == 118) //F7
	{
		BarisBaru();
		return false;
	}

	if(charCode == 37) //enter
	{
		$('#nama_barang').focus();
	}
	if(charCode == 39) //panah kanan	
	{
		$('#potongan').focus();
	}
	if(charCode == 113) //panah bawah
	{
		$('#ket').focus();
	}
	if(charCode == 112) //F9
	{
		$('#btn_simpan').click();
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
</html>