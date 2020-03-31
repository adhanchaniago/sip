<html>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/css/font4.css">
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
	<body onLoad="startTime()">
	<div class = "row">
		<section class = "col-lg-9" connectedSortable id = "select2" style="margin-bottom: 20%;">
            <div class="box box-success">
              <h3 class="box-title">Data Deposit</h3>
            
              <table id="example1" class="table table-condensed" style = "width:950px;">
                 <thead bgcolor="#99FF99">
					<td width="50px"><b>No Deposit</b></td>
					<td width="30px"><b>Tanggal</b></td>
					<td width="50px"><b>Pelanggan</b></td>
					<td width="200px"><b>Keterangan</b></td>
					<td width="30px"><b>Cash</b></td>
					<td width="30px"><b>Transfer</b></td>
					<td width="50px"><b>User</b></td>
					<td width="40px" align="center"><b>A</b></td>
                </thead>
                <tbody>
              <?php foreach($cash->result() as $d){ ?>
				<tr>
				<td><?php echo $d->no_kas; ?></td>
				<td><?php echo date('d-m-Y',strtotime($d->tgl));?></td>
				<td><?php echo $d->nama_pelanggan; ?></td>
				<td><?php echo $d->keterangan; ?></td>
				<td><?php if ($d->nominal == 0){ echo "-";}else{ echo number_format($d->nominal,2);} ?></td>
				<td><?php if ($d->nominal1 == 0){ echo "-";}else{ echo number_format($d->nominal1,2);} ?></td>
				<td><?php echo $d->user; ?></td>
				<td align="center">
				<!---<a href = "#" data-idi = "<?php echo $d->no_kas;?>" class = "btn btn-danger btn-xs batal" title = "Batal"><i class = "fa fa-edit"></i></a>--->
				<a href = "#" class="btn btn-success btn-xs cetak" data-id = "<?php echo $d->no_kas;?>"><i class = "fa fa-print"></i></a>
				</td>
				</tr>
				<?php
				};
				?>
				</tr>
				</tbody>
              </table>
			  </div>
		  </section>
	<section class = "col-lg-4" connectedSortable id = "select2" >
	<div class="box box-primary box-solid">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-tag"></i> Input Deposit</h3>
		</div>
					<form class="form-horizontal" class="form-vertical" method="POST" action="" enctype = "multipart/form-data">
						<div class="box-body">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">No Deposit</label>

								<div class="col-sm-5">
									<input name="no_kas" readonly value="<?php echo $autonumber; ?>" type="text" placeholder="Kode User" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Pelanggan</label>
								<div class="col-sm-5">
									<select class="form-control" name = "kode_user" id="#" autofocus required>
										<option value = ""> Pilih Pelanggan</option>
										 <?php foreach($user->result() as $u){?>
										 <option value = "<?php echo $u->id_pelanggan;?>"> <?php echo $u->nama_pelanggan;?></option>
										 <?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Cash</label>

								<div class="col-sm-5">
									<input name="nominal" id="rupiah" type="text" placeholder="CASH" class="form-control" autocomplete="off" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
									<input name="jenis_trans"  type="hidden" value="input" placeholder="Nominal" class="form-control" >
									<input name="tgl" value="<?php echo date('Y-m-d');?>" type="hidden" placeholder="Nama Lengkap" class="form-control">
									<input name="tanggal" value="<?php echo date('d-m-Y');?>" type="hidden" placeholder="Nama Lengkap" class="form-control">
									<input name="bulan" value="<?php echo date('m');?>" type="hidden" placeholder="Nama Lengkap" class="form-control">
									<textarea rows="1" style = "display:none;" class="form-control" name="jam" id="txt" style="height: 34px;"readonly></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Transfer</label>

								<div class="col-sm-5">
									<input name="nominal1" id="rupiah1" type="text" placeholder="TRANSFER" class="form-control" autocomplete="off" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
									</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Keterangan</label>

								<div class="col-sm-5">
									 <textarea  type="text"  name="keterangan"  maxlength="50"  id="send" rows="1" style="width: 180px; height: 70;" autocomplete="off" class="form-control"  placeholder = "KETERANGAN" onkeyup=" this.value=this.value.toUpperCase();" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')"></textarea>
								</div>
							</div>
						<div  class="col-sm-12">
						<br>
						<table class = "table1">
						<tr>
						<td align = "right">
							<input type="submit" name = "submit" value = "SIMPAN & CETAK" class="btn btn-info">
							<a href = "<?php echo base_url();?>welcome" class="btn btn-sm btn-danger">Cancel</a>
						</td>
						</tr>
						</table>
						</div>
						</div>	
					</form>
				</div>
				</section>
				<section class = "col-lg-4" connectedSortable id = "select2" style="margin-top: -11px;">
	<div class="box box-primary box-solid" >
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-tag"></i> Cair Deposit</h3>
		</div>
					<form class="form-horizontal" class="form-vertical" method="POST" action="" enctype = "multipart/form-data">
						<div class="box-body">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">No Deposit</label>

								<div class="col-sm-5">
									<input name="no_kas" readonly value="<?php echo $autonumber1; ?>" type="text" placeholder="Kode User" class="form-control">
								</div>
							</div>
			
							<div class="form-group">
								<label class="col-sm-3 control-label">Pelanggan</label>
								<div class="col-sm-5">
									<select class="form-control" name = "kode_user" id="id_pelanggan1" autofocus required tabindex="1">
										<option value = ""> Pilih Pelanggan</option>
										 <?php foreach($user->result() as $u){?>
										 <option value = "<?php echo $u->id_pelanggan;?>" data-nom1 = "<?php echo number_format($u->deposit); ?>" > <?php echo $u->nama_pelanggan;?></option>
										 <?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Sisa Deposit</label>

								<div class="col-sm-5">
									<input name="tot" id="total" readonly type="text" placeholder="SISA DEPOSIT" class="form-control" autocomplete="off">
									</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Cash</label>

								<div class="col-sm-5">
									<input name="nominal" id="rupiah2" type="text" placeholder="CASH" class="form-control" autocomplete="off" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex="2">
									<input name="jenis_trans"  type="hidden" value="cair" placeholder="Nominal" class="form-control" >
									<input name="tgl" value="<?php echo date('Y-m-d');?>" type="hidden" placeholder="Nama Lengkap" class="form-control">
									<input name="tanggal" value="<?php echo date('d-m-Y');?>" type="hidden" placeholder="Nama Lengkap" class="form-control">
									<input name="bulan" value="<?php echo date('m');?>" type="hidden" placeholder="Nama Lengkap" class="form-control">
									<textarea rows="1" style = "display:none;" class="form-control" name="jam" id="txt1" style="height: 34px;"readonly></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Transfer</label>

								<div class="col-sm-5">
									<input name="nominal1" id="rupiah3" type="text" placeholder="TRANSFER" class="form-control" autocomplete="off" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex="3">
									</div>
							</div>
						<div class="form-group">
								<label class="col-sm-3 control-label">Keterangan</label>

								<div class="col-sm-5">
									 <textarea  type="text"  name="keterangan"  maxlength="50"  id="send" rows="1" style="width: 180px; height: 70;" autocomplete="off" class="form-control"  placeholder = "KETERANGAN" onkeyup=" this.value=this.value.toUpperCase();" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex="4"></textarea>
								</div>
							</div>
						<div  class="col-sm-12">
						<br>
						<table class = "table1">
						<tr>
						<td align = "right">
							<input type="submit" name = "submit1" value = "SIMPAN & CETAK" class="btn btn-info" tabindex="5">
							<a href = "<?php echo base_url();?>welcome" class="btn btn-sm btn-danger" tabindex="6">Cancel</a>
						</td>
						</tr>
						</table>
						</div>
						</div>	
					</form>
<?php echo $this->session->flashdata('message');
?>
				</div>
				</section>
		  </div>
		  <div class="modal fade bd-example-modal-lg" id="ModalBatal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content" style="width:387px;margin-left: 247px;">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Peringatan Hapus</h5>
			  </div>
			  <div class="modal-body" id = "keterangan">
				
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
			  <div class="modal-body" id = "keterangan2">
				
			  </div>
			  <div class="modal-footer">
					
			  </div>
			</div>
		  </div>
		</div>
	</body>
	<script src="<?php echo base_url(); ?>assets/js/number.js"></script>
	  <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		

  <script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
	<script type="text/javascript">
  $('select').select2();
</script>
</script>
<script type="text/javascript">
 $('#id_pelanggan1').change(function(){
    var
    value 			= $(this).val(),
    $obj 			= $('#id_pelanggan1 option[value="'+value+'"]'),
    nominal	= $obj.attr('data-nom1');
	
	
    $('#total').val(nominal);
    
});
</script>
<script>
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 function formatRupiah(angka, prefix){
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
	split   		= number_string.split(','),
	sisa     		= split[0].length % 3,
	rupiah     		= split[0].substr(0, sisa),
	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if(ribuan){
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
 
	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? ' ' + rupiah : '');
}
</script>	
<script>
$(".batal").click(function(){
		$('#ModalBatal').modal("show");
			no_kas = $(this).attr('data-idi');
			$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>User/looping_batal',
			data    :'no_kas='+no_kas,
			cache   :false,
			success :function(respond){
					$("#keterangan").html(respond);
			}
		});
	});
	$(".cetak").click(function(){
		$('#ModalCetak').modal("show");
		$('#alasan_cetak').focus();
			no_kas = $(this).attr('data-id');
			$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>User/looping_cetak_deposit',
			data    :'no_kas='+no_kas,
			cache   :false,
			success :function(respond){
					$("#keterangan2").html(respond);
			}
		});
	});
</script>
<script>
		var rupiah1 = document.getElementById('rupiah1');
		rupiah1.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah1.value = formatRupiah(this.value, 'Rp. ');
		});
 function formatRupiah(angka, prefix){
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
	split   		= number_string.split(','),
	sisa     		= split[0].length % 3,
	rupiah1     		= split[0].substr(0, sisa),
	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if(ribuan){
		separator = sisa ? '.' : '';
		rupiah1 += separator + ribuan.join('.');
	}
 
	rupiah1 = split[1] != undefined ? rupiah1 + ',' + split[1] : rupiah1;
	return prefix == undefined ? rupiah1 : (rupiah1 ? ' ' + rupiah1 : '');
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
$('#rupiah2').on('keypress', function(e) {
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
$('#rupiah3').on('keypress', function(e) {
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
$("#example1").DataTable({
     
      
      searching   : true,
      bInfo : false,
      bLengthChange : false,
      bPaginate : false,
      ordering	:	false
      
      
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

</html>
