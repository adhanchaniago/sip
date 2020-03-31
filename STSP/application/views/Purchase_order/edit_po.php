 <html>
<head>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">  
</head>
<body class = "tampildata3" onLoad="startTime()">	
 <div class = "row " >
	<section class="col-lg-6 connectedSortable">
		<div class="box box-primary" > 
				  <h3 class="box-title" style="margin-top: 4px;margin-bottom: -19px;padding-bottom: 4PX;" >Edit PO</h3>
		</div>
				<div class="box-body">
					<div class="col-md-7">
					<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data">
					<div class="form-group">
								<label class="col-sm-40 control-label">No PO</label>
								<div class="col-sm-37" style="margin-left: -2%;width: 150px;">
										<input type="text"  name="no_po" id="no_poan" readonly value="<?php echo $p['no_po'];?>"  class="form-control" placeholder = " No PO"  >
										<?php foreach($edit->result() as $b){?>
										<input type="hidden"  name="edit" id="" readonly value="1"  class="form-control" placeholder = " No PO"  >
										<input type="hidden"  name="alasan_edit" id="" readonly value="<?php echo $b->alasan_edit;?>"  class="form-control" placeholder = " No PO"  >
										<?php }?>
								</div>
								</div>
						<div class="form-group">
								<label class="col-sm-40 control-label">No Inv</label>
								<div class="col-sm-37" style="margin-left: -2%;width: 150px;">
								<select class="form-control" name = "no_jual"  tabindex="2">
										 <option value = "<?php echo $p['no_jual'];?>"> <?php echo $p['no_jual'];?></option>
										 <?php foreach($nojual->result() as $n){?>
										 <option value = "<?php echo $n->no_jual;?>"> <?php echo $n->no_jual;?></option>
										 <?php } ?>
									</select>
								</div>
								<textarea rows="1"  style = "display:none;"class="form-control" name="jam" id="txt" style="height: 34px;"readonly></textarea>
								
							</div>
							</div>	
								<hr>							
								<div class="form-group">
										<table style = "width:1000px; margin-left:500px">
										<tr>
										<td>
										<input  type="submit" name = "submit" value = "SIMPAN CETAK" class="btn btn-sm btn-info" tabindex="9">
										<a href = "<?php echo base_url();?>Pembelian/riset_edit_po" class = "btn btn-sm btn-danger"  tabindex="10">Cancel</a>
										
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
        $('#nama_barang').autocomplete({
            serviceUrl: site+'Pembelian/get_data',
			onSelect: function (suggestion) {
                    $('#id_barang').val(''+suggestion.id_barang); 
                    $('#nmbrg').val(''+suggestion.nama_barang); 
                    $('#S_B').val(''+suggestion.satuan_besar); 
                    $('#Q_IB').val(''+suggestion.qty_b); 
                    $('#stok').val(''+suggestion.stok); 
                    $('#modal').val(''+suggestion.modal);
                    $('#harga_jual').val(''+suggestion.modal_t);
                    $('#modal_t').val(''+suggestion.modal_status);
                }
        });
    });
	</script>
	<script type="text/javascript">
 $('#id_supplier').change(function(){
    var
    value 			= $(this).val(),
    $obj 			= $('#id_supplier option[value="'+value+'"]'),
    alamat			= $obj.attr('data-alamat');
	
    $('#alamat').val(alamat);
    
});
</script>
<script type="text/javascript">
	tampiltmp();
			
  $('select').select2();
	function tampiltmp(){			
		
			$("#tampiltmp").load("<?php echo base_url();?>Pembelian/view_detail_po_edit");
			//$('.tampildata1').load("<?php echo base_url();?>Pembelian/view_barang_edit3");			
		}
	   $('#btn_simpan').on('click',function(){
            var namabarang		=$('#nama_barang').val();
            var no_po			=$('#no_poan').val();
            var nmbrg			=$('#nmbrg').val();
            var idbarang		=$('#id_barang').val();
            var hargajual		=$('#harga_jual').val();
            var qtybes			=$('#Q_B').val();
            var qq				=$('#qq').val();
            var brgid			=$('#brgid').val();
            var satuanbes		=$('#S_B').val();
            var jam				=$('#txt').val();
			if(qtybes == ""){
				alert("QTY MASIH KOSONG");
				document.getElementById("Q_B").focus();
			}else if(qtybes == 0){
				alert("QTY JANGAN DI ISI NOL");
				document.getElementById("Q_B").focus();
			}else{
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>Pembelian/input_detail_po_edit",
                data : {idbarang:idbarang,no_po:no_po,hargajual:hargajual,qtybes:qtybes,satuanbes:satuanbes,jam:jam}, //dihapus,disc2:disc2
                success: function(data){
                    $('[name="idbarang"]').val("");
                    $('[name="namabarang"]').val("");
                    $('[name="hargajual"]').val("");
                    $('[name="qtybes"]').val("");
                   // $('[name="qtykec"]').val("");
                    $('[name="satuanbes"]').val("");
                    
					tampiltmp();
					
					//$("#tampil").load("<?php echo base_url();?>Pembelian/view_detail_po");
					
                }
				
            });
			}
            return false;
			
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
			  tampiltmp();
			  //$('.tampildata').load("<?php echo base_url();?>Pembelian/view_barang_edit2");
			  //$('.tampildata1').load("<?php echo base_url();?>Pembelian/view_barang_edit3");
            }
          });
    });	
</script>


<script>
							
	 $('body').on('click', '.hapus-retur', function(e){
      e.preventDefault();

      var id_brg = $(this).attr('data-idbrg');
	  var user = $(this).attr('data-user');
      var _this = $(this);

      

          $.ajax({
            type: 'post',
            dataType: 'json',
            url : "<?= site_url('Pembelian/destroy2/');?>"+'/'+id_brg+'/'+user,
            success: function(data){
			  tampilan();
			 $('.tampildata').load("<?php echo base_url();?>Pembelian/view_detail_barang2");
			 $('.tampildata1').load("<?php echo base_url();?>Pembelian/view_detail_barang3");
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
document.getElementById('txt1').innerHTML=h+":"+m+":"+s;
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