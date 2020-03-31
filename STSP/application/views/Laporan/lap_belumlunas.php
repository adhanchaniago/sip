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
  
 <div class="modal fade" id="konfirmasi_hapus" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <b>Anda yakin ingin menghapus data ini ?</b><br><br>
                    <a class="btn btn-danger btn-ok pull-right"> Hapus</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                </div>
            </div>
        </div>
    </div>
	<div class="row">
	<section id="example2" class="col-lg-12 connectedSortable">
		
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
				<?php 
						$user = $this->session->userdata('username');
						$query = "select * from menu WHERE level = '$user'";
								$j = $this->db->query($query);
								$j->num_rows();
								
							?>
							<?php foreach ($j->result() as $j){ 
							}
							?>
				
				<?php if ($j->l_transaksi_pembelian == "Y"): ?>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_transaksib" ><i class="fa fa-money"></i> <b>Laporan Transaksi Pembelian Perhari</b></a></li>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_transaksibulan" ><i class="fa fa-money"></i> <b>Laporan Transaksi Pembelian Pernota</b></a></li>
				<?php endif;?>
				<?php if ($j->l_transaksi_penjualan == "Y"): ?>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_transaksi" ><i class="fa fa-money"></i> <b>Laporan Transaksi Penjualan Perhari</b></a></li>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_transaksipbulan" ><i class="fa fa-money"></i> <b>Laporan Transaksi Penjualan Pernota</b></a></li>
				  <?php endif;?>
				<?php if ($j->lap_pajak == "Y"): ?>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_pajak" ><i class="fa fa-money"></i> <b>Laporan Pajak Penjualan</b></a></li>
				  <?php endif;?>
				<?php if ($j->lap_komisi == "Y"): ?>
				  <li class=""><a href="<?php echo base_url(); ?>Laporan/lap_komisi"><i class="fa fa-money"></i> <b>Laporan Komisi </b></a></li>
				  <li ><a href="<?php echo base_url(); ?>Laporan/lap_belen"><i class="fa fa-money"></i> <b>Laporan Balance</b></a></li>
				   <li><a href="<?php echo base_url(); ?>Laporan/lap_lunas"><i class="fa fa-money"></i> <b>Nota Bayar</b></a></li>
				  <li class="active"><a href="<?php echo base_url(); ?>Laporan/lap_belumlunas" data-toggle="tab"><i class="fa fa-money"></i> <b>Nota belum Bayar</b></a></li>
				  <?php endif;?>
				</ul>
			</div>
            <!-- /.box-header -->
            <div class="box-body">
			<div class="col-md-6" style="width :65%">
			<form class="form-horizontal" action="<?php echo base_url(); ?>Laporan/belumlunas" method="GET">
				<div class="form-group">
								<label class="col-sm-40 control-label" style="width :100px;margin-right :1px;margin-left: 7px;">Nama Customer</label>
								<div class="col-sm-37" style="width :150px">
									<select name="id_karyawan" id="id_karyawan" class="form-control select2"  style="width: 130%;" autofocus tabindex="1" required> 
											<?php
											foreach ($listbelen->result() as $d){ 
												?>
										 <option value="<?php echo $d->ID; ?>"><?php echo $d->Nama; ?></option>
											<?php }?>
									</select>
								</div>
				</div>
				<div class="form-group">
								
								
								<div class="col-sm-37"  style="width :150px;margin-left:300px;margin-top:-33px;">
								<div class="input-group">
									<input type="submit"  value = "CARI" class="btn btn-sm btn-primary" style="margin-left: 10px;" tabindex="4">
								</div>
								</div>
							</div>
				</form>
				<br />
			<div id='result'></div>
				</div>
              </div>
            </div>
			</section>

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
	closeOnDateSelect:true
});
$('#tanggal_sampai').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'d-m-Y',
	closeOnDateSelect:true
});
</script>
<script>
  $('select').select2();

</script>
</html>