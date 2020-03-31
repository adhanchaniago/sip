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
 		<section class="col-lg-6 connectedSortable" id = "tampil2">
 			
 		</section>
 		<section class="col-lg-6 connectedSortable">
 			<div class="box box-primary">
 				<div class="box-header">
 					<h3 class="box-title"> Input ACC PO</h3>
 				</div>
 				<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data">		
 					<div class="box-body">								
 						<div class="col-md-9" style = "width: 100%;margin-top:-10px;">
 							<div class="col-sm-30" style="width:290px" >
 								<input type="text"  name="nopo" id="no_beli" class="form-control cekbarang" placeholder = "NO PO" tabindex = "1" autofocus>
 								<input type="hidden"  name="no_beli" id="no_belian" class="form-control" placeholder = "No J" >
 								<input type="hidden"  name="no_reff" id="noreff" class="form-control" placeholder = "No Jual" >
 								<input type="hidden"  name="idsupplier" id="id_supplier" class="form-control" placeholder = "No Jual" >
 								<textarea style = "display:none;" rows="1"class="form-control" name="jam" id="txt" style="height: 34px;"readonly></textarea>
								<input type="hidden"  name="#" id="cekbarang" autocomplete="off" >

 							</div>

 							<div class="col-sm-35" style="width:150px">
 								<input type="hidden"  name="tgl" id="tgl" value = "<?php echo date('d-m-Y');?>" autocomplete="off" class="form-control" placeholder = "Acc" tabindex = "2">

 							</div>
 							<div class="col-sm-35" style="width:120px">
 								<select class="form-control" name = "acc" id="acc"  tabindex="2">
 									<option value = "1" >ACC</option>
 									<option value = "0">BATAL ACC</option>
 								</select>

 							</div>
 							<div class="col-sm-31">
 								<button   type="submit" class="btn btn-sm btn-primary" name="btn_simpan" id="btn_simpan" tabindex = "3">OK</button>

 							</div>

 						</div>
 					</form>
 				</div>
 			</div>
 		</section>
 		<section class="col-lg-6 connectedSortable" id = "tampil" style="margin-top: -16px;">
 			
 		</section>
 	</div>
 </body>
 <?php echo $this->session->flashdata('message');
 ?>
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
 		$('#no_beli').autocomplete({
 			serviceUrl: site+'Acc_po/get_data',
 			onSelect: function (suggestion) {
 				$('#no_belian').val(''+suggestion.no_beli);
 				$('#id_supplier').val(''+suggestion.id_supplier);
 				$('#noreff').val(''+suggestion.no_reff);
 			}
 		});
 	});
	$(".cekbarang").on("keyup",function(){

 		var no_beli = $("#no_beli").val();
 		$.ajax({
 			type    : 'GET',
 			url     : '<?php echo site_url(); ?>Acc_po/ceknota',
 			cache   : false,
 			data    : {no_beli:no_beli},
 			success :function(respond){

 				$("#cekbarang").val(respond);


 			}

 		});
 	});
 </script>

 <script type="text/javascript">		
 	tampil();

 	function tampil(){	
 		$("#tampil").load("<?php echo base_url();?>Acc_po/view_tmp_acc");
 		$("#tampil2").load("<?php echo base_url();?>Acc_po/view_tmp_belum_acc");

 	}
 	$('#btn_simpan').on('click',function(){
 		var no_beli			=$('#no_belian').val();
 		var idsupplier		=$('#id_supplier').val();
 		var tgl				=$('#tgl').val();
 		var noreff			=$('#noreff').val();
 		var jam				=$('#txt').val();
 		var acc				=$('#acc').val();
 		var ceknota			=$('#cekbarang').val();
		if(ceknota == 0){
				alert("Oops.. Nota Purchase Order Tidak Ada");
				document.getElementById("no_beli").focus();
				return false;
		}else if(no_beli == ""){
 			alert("NO PO MASIH KOSONG");
 			document.getElementById("no_beli").focus();
 		}else{
 			$.ajax({
 				type : "POST",
 				url  : "<?php echo base_url()?>Acc_po/input_acc",
 				data : {no_beli:no_beli,idsupplier:idsupplier,tgl:tgl,noreff:noreff,jam:jam,acc:acc},
 				success: function(data){
 					$('[name="nopo"]').val("");
 					$('[name="no_beli"]').val("");
 					$('[name="idsupplier"]').val("");
 					$('[name="no_reff"]').val("");
					$('#cekbarang').val("");
 					$('[name="nopo"]').focus();
 					tampil();

 				}
 			});
 		}		
 		return false;


 	});
 </script>
 <script type="text/javascript">
 	$(document).on('keydown', 'body', function(e){
 		var charCode = ( e.which ) ? e.which : event.keyCode;

	if(charCode == 37) //F9
	{
		$('#no_sample').focus();
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
		bPaginate : true,
		ordering	:	false



	});


</script>
</html>