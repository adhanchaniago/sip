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

 		th, {
 			text-align: center;
 			padding: 8px;
 		}


 	</style>
 </head>
 <body  onLoad="startTime()">	
 	<div class = "row">
 		
 		<section class="col-lg-6 connectedSortable tampil2">
 			
 		</section>

 		<section class="col-lg-6 connectedSortable">
 			<div class="box box-primary">
 				<div class="box-header">
 					<h3 class="box-title"> Input ACC Penjualan</h3>
 				</div>
 				<div class="box-body">								
 					<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data">		
 						<div class="col-md-9" style = "width: 100%;margin-top:-10px;">
 							<div class="col-sm-30" style="width:290px" >
 								<input type="text"  name="nojl" id="no_jual" class="form-control cekacc cekbarang" placeholder = "NO JUAL" tabindex = "1" autofocus>
 								<input type="hidden"  name="acc1" id="acc1" class="form-control cekacc" placeholder = "acc" >
 								<input type="hidden"  name="total_komisi" id="total_komisi" class="form-control" placeholder = "total_komisi" >
 								<input type="hidden"  name="id_sales" id="id_sales" class="form-control" placeholder = "id_sales" >
 								<input type="hidden"  name="nojual" id="no_jualan" class="form-control cekacc" placeholder = "No Jual" >
 								<input type="hidden"  name="noroff" id="no_roff" class="form-control" placeholder = "No Jual" >
 								<input type="hidden"  name="idpelanggan" id="id_pelanggan" class="form-control" placeholder = "No Jual" >
 								<textarea style="display:none;" rows="1"class="form-control" name="jam" id="txt" style="height: 34px;"readonly></textarea>
								<input type="hidden"  name="#" id="cekbarang" autocomplete="off" >
 								
 							</div>
 							
 							<div class="col-sm-35" style="width:150px">
 								<input type="hidden"  name="tgl" id="tgl" value = "<?php echo date('d-m-Y');?>" autocomplete="off" class="form-control" placeholder = "Acc" tabindex = "2">
 								
 							</div>
 							<div class="col-sm-35" style="width:120px">
 								<select class="form-control cekacc" name = "acc" id="acc"  tabindex="2">
 									<option value = "1" >ACC</option>
 									<option value = "0">BATAL ACC</option>
 								</select>
 								
 							</div>
 							<div class="col-sm-35" style="width:150px">
 								<input type="text"  name="total" id="total"  readonly autocomplete="off" class="form-control" placeholder = "TOTAL" tabindex = "">
 								
 							</div>
 							
 							<div class="col-sm-31">
 								<button   type="submit" class="btn btn-sm btn-primary" name="btn_simpan" id="btn_simpan"  tabindex = "3">OK</button>
 								
 							</div>
 							
 						</div>
 					</form>
 				</div>
 			</div>
 		</section>
 		
 		<section class="col-lg-6 connectedSortable tampil" style="margin-top: -16px;">
 			
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
 	
 	var site = "<?php echo site_url();?>";
 	$(function(){
 		$('#no_jual').autocomplete({
 			serviceUrl: site+'Acc/get_data',
 			cache: false,
 			onSelect: function (suggestion) {
 				$('#no_jualan').val(''+suggestion.no_jual);
 				$('#no_roff').val(''+suggestion.no_reff);
 				$('#id_pelanggan').val(''+suggestion.id_pelanggan);
 				$('#total').val(''+suggestion.total);
 				$('#total_komisi').val(''+suggestion.total_komisi);
 				$('#acc1').val(''+suggestion.acc1);
 				$('#id_sales').val(''+suggestion.id_sales);	

 			}
 		});
 	});
	
	$(".cekbarang").on("keyup",function(){

 		var no_jual = $("#no_jual").val();
 		$.ajax({
 			type    : 'GET',
 			url     : '<?php echo site_url(); ?>Acc/ceknota',
 			cache   : false,
 			data    : {no_jual:no_jual},
 			success :function(respond){

 				$("#cekbarang").val(respond);


 			}

 		});
 	});
	
 </script>

 <script type="text/javascript">		
 	tampil();
 	tampil2();

 	function tampil(){	
 		$(".tampil").load("<?php echo base_url();?>Acc/view_tmp_acc");
 	}

 	function tampil2(){	
 		$(".tampil2").load("<?php echo base_url();?>Acc/view_tmp_belum_acc");
 	}


 	$('#btn_simpan').on('click',function(){
 		var nojual			=$('#no_jualan').val();
 		var idpelanggan		=$('#id_pelanggan').val();
 		var noroff			=$('#no_roff').val();
 		var tgl				=$('#tgl').val();
 		var jam				=$('#txt').val();
 		var total_komisi	=$('#total_komisi').val();
 		var total			=$('#total').val();
 		var id_sales		=$('#id_sales').val();
 		var acc				=$('#acc').val();
 		var acc1			=$('#acc1').val();
 		var cekacc			=$('#cekacc').val();
 		var ceknota			=$('#cekbarang').val();
		if(ceknota == 0){
				alert("Oops.. Nota Penjualan Tidak Ada");
				document.getElementById("no_jual").focus();
				return false;
		}else if (acc1 == acc ){
 			alert("Oops.. Tidak boleh");
 			document.getElementById("acc").focus();
 			return false;
 		}else{
 			$.ajax({
 				type : "POST",
 				url  : "<?php echo base_url()?>Acc/input_acc",
 				data : {nojual:nojual,idpelanggan:idpelanggan,noroff:noroff,tgl:tgl,jam:jam,total:total,total_komisi:total_komisi,id_sales:id_sales,acc:acc},
 				success: function(data){
 					$('[name="nojl"]').val("");
 					$('[name="nojual"]').val("");
 					$('[name="idpelanggan"]').val("");
 					$('[name="noroff"]').val("");
 					$('[name="total"]').val("");
 					$('[name="total_komisi"]').val("");
 					$('[name="id_sales"]').val("");
 					$('[name="acc1"]').val("");
					$('#cekbarang').val("");
 					tampil();
 					$("#tampil").load("<?php echo base_url();?>Acc/view_tmp_acc");
 					$(".tampil2").load("<?php echo base_url();?>Acc/view_tmp_belum_acc");

 				}
 			});

 			return false;
 		}
 	});
 </script>
 <script type="text/javascript">
 	$(document).on('keydown', 'body', function(e){
 		var charCode = ( e.which ) ? e.which : event.keyCode;

	if(charCode == 37) //F9
	{
		$('#no_jual').focus();
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
</html>