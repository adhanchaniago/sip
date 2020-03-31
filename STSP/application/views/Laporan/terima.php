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
				<li class="active"><a href="<?php echo base_url(); ?>Laporan/Tanda_Terima" data-toggle="tab"><i class="fa fa-money"></i> <b>Tanda Terima</b></a></li>
				<?php if ($j->l_saldo_supplier == "Y"): ?>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/Laporan_Saldob" ><i class="fa fa-money"></i> <b>Laporan Saldo Supplier</b></a></li>
				<?php endif;?>
				<?php if ($j->l_saldo_pelanggan == "Y"): ?>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/Laporan_Saldo" ><i class="fa fa-money"></i> <b>Laporan Saldo Pelanggan</b></a></li>  
				<?php endif;?>
				  
				</ul>
			</div>
            <!-- /.box-header -->
            <div class="box-body">
			<div class="col-md-6" style="width :65%">
			<form class="form-horizontal" action="<?php echo base_url(); ?>Laporan/Tanda_Terima2" method="GET">
				<div class="form-group">
								<label class="col-sm-40 control-label" style="width :100px">Nama Pelanggan</label>
								<div class="col-sm-37" style="width :150px">
									<select name="id_pelanggan" id="id_pelanggan" class="form-control select2"  style="width: 130%;" autofocus tabindex="1" required> 
										<option value="" selected="selected">Pilih Pelanggan</option>
											<?php
											foreach ($listpelanggan->result() as $d){ 
												?>
										 <option value="<?php echo $d->id_pelanggan; ?>"><?php echo $d->nama_pelanggan; ?></option>
											<?php }?>
									</select>
								</div>
							
								<div class="col-sm-37"  style="width :150px">
								<div class="input-group">
									<input type="hidden"   name='tanggal_dari' class='form-control' id='tanggal_dari' tabindex="2" value="<?php echo date('01-01-Y');?>"  required style="margin-left: 149px;margin-top: -23px;">
								</div>
								</div>
								<div class="col-sm-37"  style="width :150px">
								<div class="input-group">
									<label class="col-sm-40 control-label" style="width :60px;margin-right :12px;margin-left: 74px;">Tanggal</label>
									<input type="text" name='tanggal_sampai' class='form-control' id='tanggal_sampai' tabindex="3" value="<?php echo date('d-m-Y');?>"  required style="margin-left: 147px;margin-top: -24px;width:177px;">
								</div>
								</div>
								<div class="col-sm-37"  style="width :150px">
								<div class="input-group">
									<input type="submit"  value = "CARI" class="btn btn-sm btn-primary" style="margin-left: 198px;" tabindex="4">
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
	chageMounth:true,
	chageYear:true,
	closeOnDateSelect:true
});
$('#tanggal_sampai').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'d-m-Y',
	chageMounth:true,
	chageYear:true,
	closeOnDateSelect:true
});
</script>
<script>
  $('select').select2();

</script>
</html>