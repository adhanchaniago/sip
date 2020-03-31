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
	<section class="col-lg-6 connectedSortable">
		<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title" style="margin-left: -9px;">Data  Ambil Pajak</h3>
		</div>
				<div class="box-body">
					<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data">		
						<div class="col-md-9" style = "width: 51% margin-left:0px;margin-top:-15px;">
							<table id = "example2" class = "table table-condensed" style = "width:650px;">
									<thead bgcolor="#99FF99">
									<td><b>No </b></td>
									<td><b>No Invoice </b></td>
									<td><b>Tanggal Acp</b></td>
									<td><b>Acp</b></td>
									</thead>
									<tbody id = "tampil">
									
									</tbody>
							</table>
							</div>	
								</div>
			</div>
		</section>
			<section class="col-lg-6 connectedSortable">
					<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title"> Ambil Pajak</h3>
					</div>
							<div class="box-body">								
						<div class="col-md-9" style = "width: 100%;margin-top:-10px;">
								<div class="col-sm-30" style="width:290px" >
									<input type="text"  name="nojl" id="no_jual" class="form-control" placeholder = "NO JUAL" tabindex = "1" autofocus>
									<input type="hidden"  name="nojual" id="no_jualan" class="form-control" placeholder = "No Jual" >
									<input type="hidden"  name="noreff" id="no_roff" class="form-control" placeholder = "No Jual" >
									<input type="hidden"  name="idpelanggan" id="id_pelanggan" class="form-control" placeholder = "No Jual" >
									
								</div>
								
								<div class="col-sm-35" style="width:150px">
									<input type="hidden"  name="tgl" id="tgl" value = "<?php echo date('d-m-Y');?>" autocomplete="off" class="form-control" placeholder = "Acc" tabindex = "2">
								
								</div>
								<div class="col-sm-35" style="width:120px">
								<select class="form-control" name = "acp" id="acp"  tabindex="2">
											 <option value = "1" >YA</option>
											 <option value = "0">TIDAK</option>
											</select>
								
								</div>
								
								<div class="col-sm-31">
									<button   type="submit" class="btn btn-sm btn-primary" name="btn_simpan" id="btn_simpan"  tabindex = "3">OK</button>
															
								</div>
								
						</div>
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
    var site = "<?php echo site_url();?>";
    $(function(){
        $('#no_jual').autocomplete({
            serviceUrl: site+'Ambil_pajak/get_data',
			onSelect: function (suggestion) {
                    $('#no_jualan').val(''+suggestion.no_jual);
                    $('#no_roff').val(''+suggestion.no_reff);
                    $('#id_pelanggan').val(''+suggestion.id_pelanggan);
                }
        });
    });
	</script>
	
<script type="text/javascript">		
 tampil();
			
	function tampil(){	
			$("#tampil").load("<?php echo base_url();?>Ambil_pajak/view_tmp_pajak");
		}
	   $('#btn_simpan').on('click',function(){
            var nojual			=$('#no_jualan').val();
            var idpelanggan		=$('#id_pelanggan').val();
            var noreff			=$('#no_roff').val();
            var tgl				=$('#tgl').val();
            var acp				=$('#acp').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>Ambil_pajak/input_pajak",
                data : {nojual:nojual,idpelanggan:idpelanggan,noreff:noreff,tgl:tgl,acp:acp},
                success: function(data){
                    $('[name="nojl"]').val("");
                    $('[name="nojual"]').val("");
                    $('[name="idpelanggan"]').val("");
                    $('[name="noreff"]').val("");
					tampil();
					$("#tampil").load("<?php echo base_url();?>Ambil_pajak/view_tmp_pajak");
					
                }
            });
					
            return false;
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