<html >
<head>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">  
  
		</head>
	<style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
  <body>
	<div class="row">
<section id="example2" class="col-lg-12 connectedSortable">
	<div class="box box-primary">
            <div class="box-header">
			<div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                        data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                  <i class="fa fa-minus"></i></button>
              </div>
              <h3 class="box-title">Laporan Statement Of Account</h3>
            </div>
			<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
			  
				 <li class="active" ><a href="<?php echo base_url(); ?>Laporan/lap_pelanggan" data-toggle="tab"><i class="fa fa-money"></i> <b>Laporan Statement Of Account</b></a></li>
			
				 
				</ul>
				</div>
            <!-- /.box-header -->
            <div class="box-body">
			<form class="form-horizontal" action="<?php echo base_url(); ?>Laporan/cari" method="GET">
				  <div class="form-group">
								<label class="col-sm-40 control-label" style="width :100px">Nama Pelanggan</label>
								<div class="col-sm-37" style="width :150px">
									<select name="id_pelanggan" id="id_pelanggan" class="form-control select2"  style="width: 100%;" autofocus tabindex="1" required> 
										<option value="" selected="selected">Pilih Pelanggan</option>
											<?php
											foreach ($listpelanggan->result() as $d){ 
												?>
										 <option value="<?php echo $d->id_pelanggan; ?>"><?php echo $d->nama_pelanggan; ?></option>
											<?php }?>
									</select>
								</div>
								<label class="col-sm-40 control-label" style="width :50px;margin-right :1px;margin-left: 7px;">Tgl Dari</label>
								<div class="col-sm-37"  style="width :150px">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text"   name='tanggal_dari' class='form-control' id='tanggal_dari' tabindex="2" value="<?php echo date('d-m-Y');?>"  requered>
								</div>
								</div>
								
								<label class="col-sm-40 control-label" style="width :60px;margin-right :12px;margin-left: 7px;">Tgl Sampai</label>
								<div class="col-sm-37"  style="width :150px">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text"   name='tanggal_sampai' class='form-control' id='tanggal_sampai' tabindex="3" value="<?php echo date('d-m-Y');?>"  requered>
								</div>
								</div>
								<div class="col-sm-37"  style="width :150px">
								<div class="input-group">
									<input type="submit"  value = "Cari" class="btn btn-sm btn-primary" style="margin-left: 10px;" tabindex="4">
								</div>
								</div>
							</div>
				<form>
			<br />
			<div id='result'></div>
				</div>
			<div class="box-body">
         <table id = "#" class="table table-condensed" >
 <?php 
 $id_pelanggan	= $this->input->get('id_pelanggan');
 if($id_pelanggan==""){
?>
<?php
}		
		$tanggal_dari	= $this->input->get('tanggal_dari');
		$tanggal_sampai	= $this->input->get('tanggal_sampai');
		$id_pelanggan   = $this->input->get('id_pelanggan');
		$query = "SELECT * from saldo WHERE saldo.id_pelanggan like '%$id_pelanggan%' AND tgl BETWEEN '$tanggal_dari' AND '$tanggal_sampai' order by bulan,tgl asc";
		$cari = $this->db->query($query);
		$cari->num_rows();
	
		

		
 ?>
 <?php
 $query = "select * from tb_pelanggan  WHERE tb_pelanggan.id_pelanggan='$id_pelanggan'";
	$jumlah = $this->db->query($query);
 ?>
<?php foreach ($jumlah->result()  as $p){
}
?>
<b><span style='font-size:12pt'><?php echo "Tanggal Yang Dicari : ".$tanggal_dari; ?> s/d <?php echo $tanggal_sampai; ?></span></b></br>
<b><span style='font-size:12pt'><?php echo 'Nama Pelanggan : ', $p->nama_pelanggan; ?></span></b></br>
<tr>
	<thead>
								<th width="3%"  align="center">No</th>
								<th width="7%"  align="center">Tanggal</th>
								<th width="10%" align="center">ID Transaksi</th>
								<th width="40%" align="center">Keterangan</th>
								<th width="100px" align="center">Debet</th>
								<th width="100px" align="center">Kredit</th>
								<th width="100px" align="center">Saldo</th>
								
								
	</thead>
	<tbody>
	<tr>
	<?php
	$no=1;
	$saldo=0;
	$pj=0;
	$by=0;
	$total=0;
	if(isset($cari)){
	foreach ($cari->result_array() as $data){
	$pj=$pj+$data['tagihan'];
	$by=$by+$data['bayar_tagihan'];
	$saldo=$saldo+$data['tagihan']-$data['bayar_tagihan'];
	$total=+$pj-$by;
	?>
	<td><?php echo $no;?></td>
	<td><?php echo $data['tgl'];?></td>
	<td><?php echo $data['id_transaksi'];?>/<?php echo $data['id_pelanggan'];?>/<?php echo $data['no_reff'];?></td>
	<td><?php if($data['tagihan'] > 0){
				echo "Pembelian";
			}elseif($data['bayar_tagihan'] > 0){
				echo "Pembayaran";
			}else{
			?>
				-
			<?php
			}
			?>	</td>
	<td>
	<?php if($data['tagihan'] > 0){
				echo "Rp. ", number_format($data['tagihan'],2);
			}else{
			?>
				-
			<?php
			}
			?>	
	</td>
	<td>
		<?php if($data['bayar_tagihan'] > 0){
				echo "Rp. ", number_format($data['bayar_tagihan'],2);
			}else{
			?>
				-
			<?php
			}
			?>	
	</td>
	<td>
	<?php if($saldo > 0){
				echo "Rp. ", number_format($saldo,2);
			}else{
			?>
				-
			<?php
			}
			?>	
	</td>
	
	
    </tr> 
	<?php $no++; }}?>
	<tr>
							<th  width="150"colspan='5' ></th>
							<th align="right">Total Debet</th>
							<td ><b>Rp.&nbsp<?php echo number_format($pj, 0, ",", ".");?></b></td>
							</tr>
							<tr>
							<th  width="150"colspan='5' ></th>
							<th colspan='0'>Total Kredit</th>
							<td colspan='6'><b>Rp.&nbsp<?php echo number_format($by, 0, ",", ".");?></b></td>
							</tr>
							<tr>
							<th  width="150"colspan='5' ></th>
							<th colspan='0'>Total Saldo</th>
							<td colspan='6'><b>Rp.&nbsp<?php echo number_format($total, 0, ",", ".");?></b></td>
							</tr>
	</tbody>
	  <table id = "#" class="table table-condensed" >
		<tr>
		<td>
		<a href = "<?php echo base_url('Laporan/cetak_struk/'.$id_pelanggan.'/'.$tanggal_dari.'/'.$tanggal_sampai); ?>" class = "btn btn-sm btn-primary" >Cetak</a>
		<a href = "<?php echo base_url('Laporan/lap_bcetak/'.$id_pelanggan.'/'.$tanggal_dari.'/'.$tanggal_sampai); ?>" class = "btn btn-sm btn-primary" >pdf</a>
		</td>
		</tr>
		  </table >
	
	
 </tr> 


							
</table>	
<table align = "right">
<tr>
</th>
</tr>
</table>			
 </div>
 </div>
			</section>
			
	
	</div>
</body>
<script src="<?php echo base_url(); ?>assets/d/dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/editable-table/mindmup-editabletable.js"></script>   
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/editable-table/numeric-input-example.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.css"/>
<script src="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.js"></script>
<script>
$('#tanggal_dari').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'d-m-Y',
	closeOnDateSelect:true,
	changeMonth : true,
	changeYear : true
});
$('#tanggal_sampai').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'d-m-Y',
	closeOnDateSelect:true,
	changeMonth : true,
	changeYear : true
});

$(document).ready(function(){
	$('#FormLaporan').submit(function(e){
		e.preventDefault();

		var TanggalDari = $('#tanggal_dari').val();
		var TanggalSampai = $('#tanggal_sampai').val();

		if(TanggalDari == '' || TanggalSampai == '')
		{
			$('.modal-dialog').removeClass('modal-lg');
			$('.modal-dialog').addClass('modal-sm');
			$('#ModalHeader').html('Oops !');
			$('#ModalContent').html("Tanggal harus diisi !");
			$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok, Saya Mengerti</button>");
			$('#ModalGue').modal('show');
		}
		else
		{
			var URL = "<?php echo base_url('lap_kasbon/lap_kasbonperbulan'); ?>/" + TanggalDari + "/" + TanggalSampai;
			$('#result').load(URL);
		}
	});
});
</script>
  
<script type="text/javascript">
        $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
        $('#textAreaEditor').editableTableWidget({editor: $('<textarea>')});
        window.prettyPrint && prettyPrint();
    </script>
 <script>
 $(function() {
	 $('#example').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false
    })
  })
  </script>
   <script>
 $(function() {
	 $('#example1').DataTable({
		'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false
    })
  })
  </script>
  <script type="text/javascript">
  $('select').select2();
</script>
 <script type="text/javascript">
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('no_kasbon');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'detail.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    
 
    //Hapus Data
    $(document).ready(function() {
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
	});
  </script >
  <script >
  var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
</html>