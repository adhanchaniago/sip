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
 			margin-left : 1px;
 		}
 		th, {
 			text-align: center;
 			padding: 8px;
 		}


 	</style>
 </head>
 <body >	
 	<div class = "row">

 		<section class="col-lg-4 connectedSortable" style="margin-left:-1px;width:700px;" >
 			<div class="box box-primary" > 
 				<h3 class="box-title" style="margin-top:4px;margin-bottom:-19px;padding-bottom:4px;">  Barang <?php echo $d['nama_pelanggan']?> Terkirim</h3>
 			</div>
 			<table  class="table table-condensed" id = "example">
 				<thead>
 					<tr  bgcolor="#66CCFF">
 						
 						<th style = "width:150px;" > Nama Barang </th>
 						<th style = "width:50px;"> Terkirim </th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php		
 					$no_kirim = $this->uri->segment(3);
 					$query = "SELECT * FROM tb_kirim INNER JOIN tb_detail_kirim ON tb_kirim.no_kirim = tb_detail_kirim.no_kirim  INNER JOIN tb_barang ON tb_detail_kirim.id_barang = tb_barang.id_barang WHERE tb_kirim.no_kirim = '$no_kirim'"; //dhapus ,disc2
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
												<td> <?php echo $t['jml_krm']; ?> <?php echo $t['satuan_besar']; ?></td>
											<?php } }?> 
										</tr>
										
										
									</tbody>
								</table>
							</section>
							<section class="col-lg-4 connectedSortable" style = "margin-left:-25px;width:675px;" >
								<div class="box box-primary" > 
									<h3 class="box-title" style="margin-top:4px;margin-bottom:-19px;padding-bottom:4px;"> Retur Barang <?php echo $d['nama_pelanggan']?></h3>
								</div>
								<div class="box-body">
									<div class="col-ig-7">
										<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data"><div class="form-group">
											<label class="col-sm-40 control-label" style = "width:80px;">No Retur</label>
											<div class="col-sm-37" style = "width:195px;" >
												<input type="text" name="no_sj_retur" id=""  value = "<?php echo $autonumber;?>" autocomplete="off" readonly  class="form-control " placeholder = " No Jual">
												
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-40 control-label" style = "width:80px;">No SJ</label>
											<div class="col-sm-37" style = "width:195px;" >
												<input type="text" name="" id="" value = "<?php echo $d['no_kirim']?>/<?php echo $d['id_pelanggan']?>/<?php echo $d['no_reff_sj']?>" autocomplete="off" readonly  class="form-control" placeholder = " No Jual">
												<input type="hidden" name="no_so" id="no_so" value = "<?php echo $d['no_so']?>" autocomplete="off" readonly  class="form-control" placeholder = " No Jual">
												<input type="hidden" name="no_sj" id="no_sj" value = "<?php echo $d['no_kirim']?>" autocomplete="off" readonly  class="form-control" placeholder = " No Jual">
												<input type="hidden"  name="id_pelanggan" id="no_ref" value="<?php echo $d['id_pelanggan']?>" autocomplete="off" readonly class="form-control" placeholder = " No Ref">
												<input type="hidden"  name="no_sjln" id="no_ref" value="<?php echo $d['no_reff_sj']?>" autocomplete="off" readonly class="form-control" placeholder = " No Ref">
											</div>
										</div>
										<div class="form-group">
										<label class="col-sm-40 control-label" style = "width:80px;">Tanggal</label>
											<div class="col-sm-37" style = "width:195px;">
												<input type="text" name="" id="" value="<?php echo date('d-m-Y');?>" autocomplete="off" readonly  class="form-control" placeholder = " No Jual">
												<input type="hidden" name="tgl" id="tgl" value="<?php echo date('Y-m-d');?>" autocomplete="off" readonly  class="form-control" placeholder = " No Jual">
											</div>
										</div>
									</div>
									<div class="col-md-5">
										<div class="col-sm-41">
											<textarea  type="text" readonly name="ke_alamat" id="send" rows="2" style="margin-left:436px;margin-top:-94px;width: 207px; height: 92px;" autocomplete="off" class="form-control"  placeholder = " Ship To (F1)"><?php echo $d['ke_alamat']?></textarea>
										</div>
									</div>
									<div class="col-ig-7">
										<div class="form-group">
											<div class="col-sm-30" style="margin-left:8px;width:296px;margin-top: 11px;" >
												<input type="text"  name="namabarang" id="nama_barang"  autocomplete="off" class="form-control detail" autofocus placeholder = "NAMA BARANG" tabindex = "1">
											</div>
											<div class="col-sm-30" style="width:230px " >
												<input type="hidden"  name="idbarang"  autocomplete="off" id="id_barang" class="form-control"  placeholder = "Barang" >
											</div>
											<div class="col-sm-35" style="width:96px;margin-top: 11px" >
												<input type="text"  name="satuanbesar"  autocomplete="off" id="satuan_besar" readonly   class="form-control" placeholder = "SATUAN"  >
												
											</div>
											<div class="col-sm-35" style="width:96px; margin-top: 11px;" >
												<input type="text"  name="jmlkrm" id="jml_krm"  autocomplete="off"  class="form-control" placeholder = "DIAMBIL"  tabindex = "2">
												<input type="hidden"  name="stok" id="stok"  autocomplete="off"  class="form-control" placeholder = "Kirim" >
												<input type="hidden"  name="" id="oon"  autocomplete="off"  class="form-control" placeholder = "Kirim" >
												
											</div>
											<div class="col-sm-31" style="margin-top: 11px;">
												
												<button type="submit" class="btn btn-sm btn-primary" name="btn_simpan" id="btn_simpan"  tabindex = "3">OK</button>
											</div>
										</div>
										
									</div>
									
									<table  class="table table-condensed" id = "#" style="margin-left: 8px;">
										<thead>
											<tr bgcolor="#99FF99">
												
												<th style = "width:140px;" > Nama Barang </th>
												<th style = "width:40px;"> Satuan  </th>
												<th style = "width:50px;"> Diambil </th>
												<th style = "width:50px;"> A </th>
											</tr>
										</thead>
										
										<tbody id="tampiltmp">
										</tbody>
									</table>
									<hr>
									<div class="form-group">
										<div class="col-sm-37" style = "margin-left:8px;width:350px;">
											<input type="text" name="keterangan" id="keterangan"   autocomplete="off"   class="form-control" placeholder = " KETERANGAN"  tabindex = "4" onkeyup=" this.value=this.value.toUpperCase();">
										</div>
									</div>
									<hr>
									<table class = "table1">
										<tr>
											<td align = "right">
												<input type = "submit" id = "btn_simpan1" name = "submit" value = "SIMPAN" class = "btn btn-sm btn-primary" tabindex = "4">
												<input type = "submit" name = "submit2" id = "simpan2" value = "SIMPAN & CETAK" class = "btn btn-sm btn-success" tabindex = "5">
												<a href = "<?php echo base_url('Surat_jalan/reset_tmp_retur');?>" class = "btn btn-sm btn-danger">Cancel </a>
											</td>
										</tr>
									</table>
								</form>		
							</div>
							<?php echo $this->session->flashdata('message');
							?>				
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
					tampilan();
					
					function tampilan(){			
						$("#tampiltmp").load("<?php echo base_url();?>Surat_jalan/view_detail_retur");
					}
					$('#btn_simpan').on('click',function(){
						var no_sj			=$('#no_sj').val();
						var namabarang		=$('#nama_barang').val();
						var idbarang		=$('#id_barang').val();
						var satuanbesar		=$('#satuan_besar').val();
						var jmlkrm			=$('#jml_krm').val();
						var oon				=parseInt($('#oon').val());
						var stok			= parseInt($('#stok').val());
						
						if(namabarang == 0){
							alert("Oops.. Nama Barang Masih Kosong");
							document.getElementById("nama_barang").focus();
						}else if(jmlkrm == 0){
							alert("Oops.. Jumlah Kirim Masih Kosong");
							document.getElementById("jml_krm").focus();
						}else if(jmlkrm > oon){
							alert("Oops.. Jumlah Retur Lebih");
							document.getElementById("jml_krm").focus();
						}else{
							$.ajax({
								type : "POST",
								url  : "<?php echo base_url()?>Surat_jalan/input_detail_retur",
								data : {no_sj:no_sj,idbarang:idbarang,namabarang:namabarang,satuanbesar:satuanbesar,jmlkrm:jmlkrm},
								success: function(data){
									$('[name="namabarang"]').val("");
									$('[name="idbarang"]').val("");
									$('[name="satuanbesar"]').val("");
									$('[name="jmlkrm"]').val("");
									$('[name="stok"]').val("");
									
									tampilan();
									document.getElementById("nama_barang").focus();
									tampiltmp();
									
								}
							});
							
						}
						return false;
					});
					
				</script>
				<script type="text/javascript">
					var site = "<?php echo site_url();?>";
					$(function(){
						var nono = $('#no_sj').val();
						$('#nama_barang').autocomplete({
							serviceUrl: site+'Surat_jalan/get_barang_edit/'+nono,
							onSelect: function (suggestion) {
								$('#id_barang').val(''+suggestion.id_barang); 
								$('#satuan_besar').val(''+suggestion.satuan_besar); 
								$('#jml_krm').val(''+suggestion.jml_krm); 
								$('#oon').val(''+suggestion.jml_krm); 
							}
						});
					});
				</script>

				<script>
					
					$('body').on('click', '.hapus-barang', function(e){
						e.preventDefault();

						var id_barang = $(this).attr('data-idbarang');
						var user = $(this).attr('data-user');
						var _this = $(this);


						$.ajax({
							type: 'post',
							dataType: 'json',
							url : "<?= site_url('Surat_jalan/destroy/');?>"+'/'+user+'/'+id_barang,
							success: function(data){
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
});

</script>
</html>