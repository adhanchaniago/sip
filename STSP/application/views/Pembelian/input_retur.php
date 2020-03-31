 <html>
 <head>
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">  <!-- Ionicons -->
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">  <!-- DataTables -->
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">  
 </head>
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
 <body class = "tampildata3" onLoad="startTime()">	

 	<div class = "row">

 		<section class="col-lg-12 connectedSortable">
 			<div class="box box-primary" > 
 				<h3 class="box-title" style="margin-top: 4px;margin-bottom: -19px;padding-bottom: 4PX;" >Retur Pembelian</h3>
 			</div>
 			<div class="box-body">
 				<div class="col-md-7">
 					<form class="form-horizontal"  method="POST" id = "form" action="" enctype = "multipart/form-data">
 						<div class="form-group">
 							<label class="col-sm-40 control-label">No Retur</label>
 							<div class="col-sm-37" style="margin-left: -6%;">
 								<input type="text" name="noretur" id="noretur" value = "<?php echo $autonumber; ?>" autocomplete="off" readonly  class="form-control" placeholder = " No Jual" >
 							</div>
 							<label class="col-sm-40 control-label">No Inv Beli</label>
 							<div class="col-sm-37" style="margin-left: -5%; width:15%;">
 								<input type="text" name="" id="" value="<?php echo $p['no_beli'];?>/<?php echo $p['id_supplier'];?>/<?php echo $p['no_reff'];?>" autocomplete="off" readonly  class="form-control" placeholder = " No Beli" >
 								<input type="hidden" name="nobel" id="nobel" value="<?php echo $p['no_beli'];?>" autocomplete="off" readonly  class="form-control" placeholder = " No Beli" >
 								<input type="hidden" name="no_reff" id="no_reff" value="<?php echo $p['no_reff'];?>" autocomplete="off" readonly  class="form-control" placeholder = " No Beli" >
 								<input type="hidden" name="no_raff" id="no_raff" value="-1" autocomplete="off" readonly  class="form-control" placeholder = " No Beli" >
 							</div>
 							<label class="col-sm-40 control-label">Tgl Retur</label>
 							<div class="col-sm-37" style="margin-left: -4%;">
 								<input type="hidden" name="tgl" id = "" value="<?php echo date('Y-m-d') ;?>"onFocus="startCalc();" autocomplete="off" readonly class="form-control" placeholder = " Tanggal Invoice">
 								<input type="text" name="tanggal" id = "tanggal" value="<?php echo date('d-m-Y') ;?>"onFocus="startCalc();" autocomplete="off" readonly class="form-control" placeholder = " Tanggal Invoice">
 								<textarea rows="1" style = "display:none;" class="form-control" name="jam" id="txt" style="height: 34px;"readonly></textarea>
 							</div>
 							<label class="col-sm-40 control-label">Nama Supplier</label>
 							<div class="col-sm-37" style = "margin-left: -3%;width:16%;">
 								<input type="text" name="" id = "" value="<?php echo $p['nama_supplier'];?>"onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" readonly class="form-control" placeholder = " Nama Supplier">
								<input type="hidden" readonly name="kurs"  value="<?php echo $p['kurs_tukar'];?>" id="kurs"  autocomplete="off" class="form-control" placeholder = "HARGA ">
								<input type="hidden"  name="simbol" id="simbol" value="<?php echo $p['simbol'];?>"  readonly autocomplete="off" class="form-control" placeholder = "HARGA ">
								<input type="hidden"  name="kode_mu" id="" value="<?php echo $p['kode_mu'];?>"  readonly autocomplete="off" class="form-control" placeholder = "HARGA ">
 								<input type="hidden" name="id_supplier" id = "id_supplier" value="<?php echo $p['id_supplier'];?>"onFocus="startCalc();" onBlur="stopCalc();" autocomplete="off" readonly class="form-control" placeholder = " Nama Supplier">
 							</div>
 						</div>
 					</div>		
 					<div class="col-md-4">
 						<div class="col-md-11  tampildata">
 							<div class="info-box bg-aqua" style="min-height:105px">
 								<span class="info-box-icon" style="height:105px; padding:4px 0; width:50px"><i class="fa fa-shopping-cart"></i></span>
 								<div class="info-box-content">
 									<span class="info-box-number"  style=" font-size:23px; padding:36px 0"><div id="grandtotal"></div></span>
 								</div>
 							</div>
 						</div>
 					</div>
 					<br>
 					<br>
 					<br>
 					<br>
 					<br>
 					<hr>
 					<div class="col-md-9"  style="margin-top: -56px;">
 						<div class="col-sm-30" style="width:300px" >
 							<input type="text"  name="namabarang" id="nama_barang" class="form-control" placeholder = "NAMA BARANG (<-)" tabindex = "4" autofocus>
 						</div>
 						<div class="col-sm-30" style="width:230px" >
 							<input type="hidden"  name="idbarang" id="id_barang" class="form-control" placeholder = "Barang">
 						</div>
 						<div class="col-sm-35" style="width:70px">
 							<input type="text"  name="stok" id="stok"  readonly autocomplete="off" class="form-control" placeholder = "STOK "  >

 						</div>
 						<div class="col-sm-35" style="width:70px">
 							<input type="text"  name="qtybes" id="Q_B"   autocomplete="off" class="form-control" placeholder = "QTY "  tabindex = "5">
 							<input type="hidden"  name="" id="Q_U"   autocomplete="off" class="form-control" placeholder = "QTY ">

 						</div>
 						<div class="col-sm-35"style="width:80px">
 							<input type="text"  name="satuanbes" id="S_B" readonly autocomplete="off" class="form-control" placeholder = "SATUAN">

 						</div>
 						<div class="col-sm-35" >
 							<input type="hidden" name = "qib" id="Q_IB"  readonly autocomplete="off" class="form-control" placeholder = "Q_IB">

 						</div>
 						<div class="col-sm-30"  style="width:120px">

 							<input type="text" readonly name="hargabeli2" id="modal2"  autocomplete="off" class="form-control" placeholder = "HARGA ">
 							<input type="hidden" readonly name="hargabeli" id="modal1"  autocomplete="off" class="form-control" placeholder = "HARGA ">

 						</div>
 						<div class="col-sm-30"  style="width:120px">

 							<input type="hidden" name="modalt" id="modal_t"  autocomplete="off" class="form-control" placeholder = "Harga ">

 						</div>
 						<div class="col-sm-30" style="width:120px" >
 							<input type="text" name="modal" id="modal" readonly autocomplete="off" class="form-control" placeholder = "MODAL">
 						</div>
 						<div class="col-sm-35" style="width:60px"  >
 							<input type="hidden" name="ppn" id="ppn" readonly value="<?php echo $p['ppn'];?>" autocomplete="off" class="form-control" placeholder = "PPN">

 						</div>
 						<div class="col-sm-35" style="width:65px"  >
 							<input type="text" readonly name="disc" id="disc"  autocomplete="off" class="form-control" placeholder = "% 1">

 						</div>
 						<div class="col-sm-35" style="width:65px"  >
 							<input type="text" readonly name="disc1" id="disc1" autocomplete="off" class="form-control" placeholder = "% 2">

 						</div>
 						<div class="col-sm-35" style="width:70px"  >
 							<input type="text" readonly name="disc2" id="disc2" autocomplete="off" class="form-control" placeholder = "% 3">
 						</div>
 						<div class="col-sm-31">
 							<button   type="submit" class="btn btn-sm btn-primary" name="btn_simpan" id="btn_simpan"  tabindex = "6">OK</button>

 						</div>

 						<table id = "#" class="table table-condensed">
 							<thead bgcolor="#99FF99">
 								<tr>
 									<th width = "5px">No</th>
 									<th width = "320px">Nama Barang</th>
 									<th width = "65px">Qty</th>
 									<th width = "70px">Satuan</th>
 									<th width = "150px">Harga </th>
 									<th width = "50px">% 1</th>
 									<th width = "50px">% 2</th>
 									<th width = "50px">% 3</th>
 									<th width = "100px">Sub Total</th>
 									<th width = "50px">A</th>
 								</tr>
 							</thead>
 							<tbody id = "tampiltmp">

 							</tbody>
 						</table>
 						<div class="form-group">
 							<label class="col-sm-29 control-label" style="margin-top: 8px;">Keterangan</label>
 							<div class="col-sm-33" style="width:750px">
 								<input type="text"  name="keterangan" id="ket"  autocomplete="off"  class="form-control" placeholder = "KETERANGAN (F2)" onkeyup=" this.value=this.value.toUpperCase();">
 							</div>
 						</div>
 						<div class="col-sm-31">
 							<br>
 							<br>
 							<br>
 						</div>
 						<?php		
 						$no_beli = $this->uri->segment(3);
 						$query = "SELECT tb_detail_pembelian.no_beli,tb_detail_pembelian.id_barang,
 						tb_detail_pembelian.qtyb,tb_detail_pembelian.satuan_besar,tb_detail_pembelian.harga_beli,
 						tb_detail_pembelian.ppn,tb_detail_pembelian.disc,disc1,disc2,tb_detail_pembelian.simbol,tb_detail_pembelian.kurs_tukar,tb_detail_pembelian.kode_mu,tb_barang.nama_barang,
 						tb_pembelian.no_beli,tb_pembelian.ket_retur,tb_pembelian.total,ongkir1,tb_pembelian.nominal1,
 						tb_pembelian.nominal,tb_pembelian.tips,tb_pembelian.sisa
 						FROM tb_detail_pembelian INNER JOIN tb_barang ON tb_detail_pembelian.id_barang = tb_barang.id_barang 
 						INNER JOIN tb_pembelian ON tb_detail_pembelian.no_beli = tb_pembelian.no_beli 
 						WHERE tb_detail_pembelian.no_beli = '$no_beli'";
 						$cari = $this->db->query($query);
 						$cari->num_rows();

 						?>
 						<table id = "example" class="table table-condensed" style="width:700px">
 							<thead bgcolor="#66CCFF">
 								<tr>
 									<td width = "10px" ><b>No</b></td>
 									<td width = "300px" ><b>Nama Barang</b></td>
 									<td  width = "10px"><b>QTY</b></td>
 									<td  align="right" width = "80px"><b>Satuan</b></td>
 									<td  align="right" width = "80px"><b>Harga</b></td>	
 									<td  align="right" width = "80px"><b>Nilai Asing</b></td>	
 									<td  align="right" width = "80px"><b>Disc</b></td>		
 									<td  align="right" width = "150px"><b>Total</b></td>	
 								</tr>
 							</thead> 
 							<tbody>
 								<?php 
 								$no=1;
 								$sub = 0;
 								$dolar = 0;
 								$dolars = 0;
 								$dolarss = 0;
 								if(isset($cari)){
 									foreach ($cari->result_array() as $f){
 										$sub = $f['qtyb'] * $f['harga_beli'];
 										$diskon1 = $f['qtyb'] * $f['harga_beli'] * $f['disc']/100;
 										$hasil =$sub-$diskon1;
 										$diskon2 = $hasil *  $f['disc1']/100;
 										$hasil2 = $hasil - $diskon2;
 										$diskon3 = $hasil2 * $f['disc2']/100;
 										$hasil5 = $hasil2 - $diskon3;
 										$hasil6 =$hasil5*$f['ppn']/100;
 										$hasil7 =$hasil5+$hasil6;
 										$dolarss =$f['harga_beli']/$f['kurs_tukar'];
 										$dolar =$f['harga_beli']/$f['kurs_tukar']*$f['qtyb'];
 										?>
 										
 										<tr>
 											<td><?php echo $no;?></td>
 											<td><?php echo $f['nama_barang'];?></td>
 											<td><?php echo $f['qtyb'];?></td>
 											<td><?php echo $f['satuan_besar'];?></td>
 											<td align="right"><?php echo "Rp. ", number_format($f['harga_beli'],2);?></td>
 											<td align="right"> <?php if($f['kurs_tukar'] > 1){ echo $f['simbol']?>. <?php echo round($dolarss,2); }
 											else{ echo "-";}?></td>
 											<td  align="right"><?php if($f['disc'] > 0){
 												echo $f['disc'].'+'.$f['disc1'].'+'.$f['disc2'];
 											}else{
 												echo "-";
 											}?></td>
 											<td  align="right"><?php echo"Rp. ",  number_format($hasil5,2);?></td>
 										</tr>
 										<?php $dolars=$dolars+$dolar;$no++;}}?>
 										<tr>
 											<td colspan = "7" align = "right"><b>Grand Total</b></td>
 											<td align="right"><?php echo"Rp. ",  number_format($f['total'],2);?></td>
 										</tr>
 										<tr>
 											<td colspan = "7" align = "right"><b>Total Nilai Asing</b></td>
 											<td align="right"> <?php if($f['kurs_tukar'] > 1){ echo $f['simbol']?>. <?php echo round($dolars,2); }
 											else{ echo "-";}?></td>
 											<input type = "hidden" id = "sisatagihan" name = "sisatagihan"value = "<?php echo $f['sisa'];?>"></td>
 										</tr>
 										<tr>
 										</tbody>
 									</table>
 							<hr>	
 						</div>
 						<div class="col-md-3" style="margin-top: -9px;">
 							<div class="col-sm-41 tampildata1">
 							</div>
 							<textarea style = "display:none;" rows="1"class="form-control" name="total" 		  id="tot" style="height: 34px;"readonly requered></textarea>
 							<textarea style = "display:none;" rows="1"class="form-control" name="kurs_tukar" 		  id="kurs_tukaran" style="height: 34px;"readonly requered></textarea>
 							<textarea style = "display:none;" rows="1"class="form-control" name="grand_total" 		  id="bayar" style="height: 34px;"readonly requered></textarea>
 							<input type="hidden" id="potongan2" name = "potongan" autocomplete="off"  class="form-control" placeholder = "Potongan Harga">
 							<textarea style = "display:none;" rows="1"class="form-control" name="dpp" 		  id="dp" style="height: 34px;"readonly requered></textarea>
 							<textarea style = "display:none;" rows="1"class="form-control" name="ppn" 		  id="pp" style="height: 34px;"readonly requered></textarea>
 							<input type="hidden" id="cash2" name = "cash" autocomplete="off"  class="form-control" placeholder = "Potongan Harga">
 							<input type="hidden" id="trans" name = "transfer" autocomplete="off"  class="form-control" placeholder = "Potongan Harga">
 							<input type="hidden" id="ban2" name = "bank" autocomplete="off"  class="form-control" placeholder = "Potongan Harga">

 							<div class="form-group">
 								<table class = "table1">
 									<tr>
 										<td align = "right">
 											<input  type="submit" name = "submit" id="btn_simpan1" value = "SIMPAN" class="btn btn-sm btn-primary" tabindex="30">
 											<a href = "<?php echo base_url();?>Pembelian/riset3" class = "btn btn-sm btn-danger"  tabindex="31">Cancel</a>

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

<script>
	var site = "<?php echo site_url();?>";
	$(function(){
		var nobel = $('#nobel').val();
		$('#nama_barang').autocomplete({
			serviceUrl: site+'Pembelian/get_data_retur/'+nobel,
			onSelect: function (suggestion) {
				$('#id_barang').val(''+suggestion.id_barang); 
				$('#stok').val(''+suggestion.stok); 
				$('#Q_B').val(''+suggestion.qty_b); 
				$('#Q_U').val(''+suggestion.qty_b); 
				$('#S_B').val(''+suggestion.satuan_besar); 
				$('#modal1').val(''+suggestion.harga_beli1);
				$('#modal2').val(''+suggestion.harga_beli);
				$('#modalt').val(''+suggestion.modal_t);
				$('#modal').val(''+suggestion.modal);
				$('#disc').val(''+suggestion.disc);
				$('#disc1').val(''+suggestion.disc1);
				$('#disc2').val(''+suggestion.disc2);
			}
		});
	});
	var sisatagihan		=$('#sisatagihan').val();

	if (sisatagihan > 0) {
		document.getElementById("cash").style.display = "none";
		document.getElementById("transfer").style.display = "none";
		document.getElementById("bank2").style.display = "none";
		$('#cashdis').prop('disabled',true);
		$('#transferdis').prop('disabled',true);
		$('#bank2dis').prop('disabled',true);
	}else{
		document.getElementById("cashdis").style.display = "none";
		document.getElementById("transferdis").style.display = "none";
		document.getElementById("bank2dis").style.display = "none";
	}
</script>
<script type="text/javascript">
	tampiltmp();

	$('select').select2();
	function tampiltmp(){			
		var no_beli			= $('#nobel').val();
		$.ajax({
			type    : "POST",
			url     : "<?php echo base_url(); ?>Pembelian/view_barang_retur/"+no_beli,
			data    : {no_beli:no_beli},
			cache   : false,
			success : function(respond){
				$("#tampiltmp").html(respond);

			}
		});
		$.ajax({
			type    : "POST",
			url     : "<?php echo base_url(); ?>Pembelian/view_barang_retur3/"+no_beli,
			data    : {no_beli:no_beli},
			cache   : false,
			success : function(respond){
				$(".tampildata1").html(respond);

			}
		});
		$('.tampildata').load("<?php echo base_url();?>Pembelian/view_barang_retur2/"+no_beli);
 		//$("#tampiltmp").load("<?php echo base_url();?>Pembelian/view_barang_retur");
        //$('.tampildata1').load("<?php echo base_url();?>Pembelian/view_barang_retur3");
    }
    $('#btn_simpan').on('click',function(){
    	var noretur			=$('#noretur').val();
    	var nobel			=$('#nobel').val();
    	var namabarang		=$('#nama_barang').val();
    	var idbarang		=$('#id_barang').val();
    	var qtybes			=$('#Q_B').val();
    	var qu				=$('#Q_U').val();
        //var qtykec		=$('#Q_K').val();
        var stok			=$('#stok').val();
        var satuanbes		=$('#S_B').val();
        var hargabeli		=$('#modal2').val();
        var qib				=$('#Q_IB').val();
        var modal			=$('#modal').val();
        var modalt			=$('#modal_t').val();
        var ppn				=$('#ppn').val();
        var disc			=$('#disc').val();
        var disc1			=$('#disc1').val();
        var disc2			=$('#disc2').val();
        var jam				=$('#txt').val();
        var kurs			=$('#kurs').val();
        var simbol			=$('#simbol').val();

        if(namabarang == 0){
        	alert("Oops.. Nama Barang Masih Kosong");
        	document.getElementById("nama_barang").focus();
        }else if(qtybes == 0){
        	alert("Oops.. Qty Masih Kosong");
        	document.getElementById("Q_B").focus();
        }else if(hargabeli == 0){
        	alert("Oops.. Harga Masih Kosong");
        	document.getElementById("modal1").focus();
        }else if((qtybes*1) > (qu*1)){
        	alert("Oops.. Qty Lebih");
        	document.getElementById("Q_B").focus();
        }else{
        	$.ajax({
        		type : "POST",
        		url  : "<?php echo base_url()?>Pembelian/input_barang_retur",
        		data : {idbarang:idbarang,noretur:noretur,nobel:nobel,modalt:modalt,stok:stok,qtybes:qtybes,satuanbes:satuanbes,hargabeli:hargabeli,modal:modal,ppn:ppn,disc:disc,disc1:disc1,disc2:disc2,jam:jam,kurs:kurs,simbol:simbol}, 
        		success: function(data){
        			$('[name="idbarang"]').val("");
        			$('[name="namabarang"]').val("");
        			$('[name="qtybes"]').val("");
        			$('[name="satuanbes"]').val("");
        			$('[name="hargabeli"]').val("");
        			$('[name="modalt"]').val("");
        			$('[name="qib"]').val("");
        			$('[name="modal"]').val("");
        			$('[name="disc"]').val("");
        			$('[name="disc1"]').val("");
        			$('[name="disc2"]').val("");
        			$('[name="stok"]').val("");
        			$('[name="modal"]').val("");

        			tampiltmp();

        			document.getElementById("nama_barang").focus();

        		}
        	});

        }
        return false;
    });


</script>
<script>
	$("#form").submit(function(){

		var tot       			= $("#tot").val();
		var cash2    			= $("#cash2").val();
		var trans    			= $("#trans").val();
		var total    			= $("#tot").val();

		if((cash2*1)+(trans*1) > tot){

			$("#cash").focus();
			return false;

		}else if((cash2*1)+(trans*1) > tot){
			$("#trans").focus();
			return false;
		}else if(total == 0){

			alert("Oops.. Total Tidak Boleh Kosong");
			document.getElementById("nama_barang").focus();
			return false;

		}else{
			return true;
		}
	});
</script>
<script>

	$('body').on('click', '.hapus-barang', function(e){
		e.preventDefault();

		var user = $(this).attr('data-user');
		var id_barang = $(this).attr('data-idbarang');
		var _this = $(this);

		$.ajax({
			type: 'post',
			dataType: 'json',
			url : "<?= site_url('Pembelian/destroy_retur/');?>"+'/'+user+'/'+id_barang,
			success: function(data){
				tampiltmp();
				$('.tampildata').load("<?php echo base_url();?>Pembelian/view_barang_retur2");
				$('.tampildata1').load("<?php echo base_url();?>Pembelian/view_barang_retur3");
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
		if (evt.keyCode == 88 && evt.ctrlKey) {
			$('#simpan3').click()   
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
	if(charCode == 112) //panah atas
	{
		$('#no_beli').focus();
	}
	if(charCode == 39) //panah kanan	
	{
		$('#potongan').focus();
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
$('#harga_jual').on('keypress', function(e) {
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
		var qtyb = document.getElementById("sis").value;

		f(qtyb == 0){
			alert("Nama Belum Di pilih");
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
	</html>