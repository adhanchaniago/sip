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
  <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
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
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_purchase_order"><i class="fa fa-money"></i> <b> Transaksi Purchase Order</b></a></li>
				<?php if ($j->l_transaksi_pembelian == "Y"): ?>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_transaksib" ><i class="fa fa-money"></i> <b> Transaksi Pembelian Perhari</b></a></li>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_transaksibulan" ><i class="fa fa-money"></i> <b> Transaksi Pembelian Pernota</b></a></li>
				<?php endif;?>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_sales_order" ><i class="fa fa-money"></i> <b> Transaksi Sales Orderr</b></a></li>
				<?php if ($j->l_transaksi_penjualan == "Y"): ?>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_transaksi" ><i class="fa fa-money"></i> <b> Transaksi Penjualan Perhari</b></a></li>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_transaksipbulan" ><i class="fa fa-money"></i> <b> Transaksi Penjualan Pernota</b></a></li>
				  <?php endif;?>
				<?php if ($j->lap_pajak == "Y"): ?>
				<li class=""><a href="<?php echo base_url(); ?>Laporan/lap_pajak2"><i class="fa fa-money"></i> <b>Pajak Umum</b></a></li>
				<li class="active"><a href="<?php echo base_url(); ?>Laporan/lap_pajak_khusus" data-toggle="tab"><i class="fa fa-money"></i> <b> Pajak Khusus</b></a></li>
				  <?php endif;?>
				  <?php if ($j->lap_komisi == "Y"): ?>
				  <li class=""><a href="<?php echo base_url(); ?>Laporan/lap_komisi"><i class="fa fa-money"></i> <b> Komisi </b></a></li>
				  <?php endif;?>
				</ul>
			</div>
            <!-- /.box-header -->
			<?php		
					
					$tanggal_dari	= date('Y-m-d' ,strtotime($this->input->get('tanggal_dari')));
					$tanggal_sampai	= date('Y-m-d' ,strtotime($this->input->get('tanggal_sampai')));
					$query = "select tb_pelanggan.id_pelanggan,tb_pelanggan.nama_pelanggan,tb_pelanggan.no_npwp,tb_pelanggan.alamat,tb_penjualan.no_reff,tb_penjualan.no_jual,tb_penjualan.total,tb_penjualan.acp,tb_penjualan.dpp,tb_penjualan.acc,tb_penjualan.ppn,tb_penjualan.tgl_invoice,tb_penjualan.date_invoice from tb_penjualan INNER JOIN tb_pelanggan ON tb_penjualan.id_pelanggan=tb_pelanggan.id_pelanggan WHERE date_invoice BETWEEN '$tanggal_dari' AND '$tanggal_sampai' AND tb_penjualan.total > 0 AND tb_penjualan.acp = 1 ORDER BY tb_penjualan.no_jual DESC";
					$cari = $this->db->query($query);
					$cari->num_rows();

					
			 ?>
            <div class="box-body">
			<div class="col-md-6" style="width :65%">
			<form class="form-horizontal" action="<?php echo base_url(); ?>Laporan/pajak_khusus" method="GET">
			
				<div class="form-group">
								<label class="col-sm-40 control-label" style="width :50px;margin-right :1px;margin-left: 7px;">Tgl Dari</label>
								<div class="col-sm-37"  style="width :150px">
								<div class="input-group">
									<input type="text"   name='tanggal_dari' class='form-control' id='tanggal_dari' tabindex="2" value="<?php echo date('d-m-Y');?>"  required>
								</div>
								</div>
								<label class="col-sm-40 control-label" style="width :60px;margin-right :12px;margin-left: 7px;">Tgl Sampai</label>
								<div class="col-sm-37"  style="width :150px">
								<div class="input-group">
									<input type="text"   name='tanggal_sampai' class='form-control' id='tanggal_sampai' tabindex="3" value="<?php echo date('d-m-Y');?>"  required>
								</div>
								</div>
								<div class="col-sm-37"  style="width :150px;">
								<div class="input-group">
									<input type="submit"  value = "CARI" class="btn btn-sm btn-primary" style="margin-left: 10px;" tabindex="4">
									<a href = "<?php echo base_url('Laporan/pajak_khusus2?&tanggal_dari='.$tanggal_dari.'&tanggal_sampai='.$tanggal_sampai.'');?>" target = "tampil" class = "btn btn-sm btn-success" style="margin-left:506%;margin-top: -52px;">export csv</a>
									<a href = "<?php echo base_url('Laporan/cetak_pajak_khusus?&tanggal_dari='.$tanggal_dari.'&tanggal_sampai='.$tanggal_sampai.'');?>" target = "" class = "btn btn-sm btn-info" style="margin-left:468%;margin-top: -82px;">Cetak</a>
								</div>
								</div>
							</div>
				</form>
				<br />
			<div id='result'></div>
				</div>
              </div>
            </div>
			
			
			<div class="row" style="margin-top: -16px;">
				<table align="center" cellpadding="0" width="533px" style="margin-top: 15px;">
				<tr bgcolor="#fff">
					<td height="20" colspan="5" align="center" id="FB" ><b><font color="#000000" size = "4px"> &nbsp Laporan Pajak</font></b></td>
				</tr>
				<tr bgcolor="#fff">
					<td height="10" colspan="5" align="center" id="fC"><b><font color="#000000"> &nbsp <?php echo "Per  &nbsp ".date('d-m-Y',strtotime($tanggal_dari)); ?> s/d <?php echo date('d-m-Y',strtotime($tanggal_sampai)); ?></font></b></td>
				</tr>
				<tr bgcolor="#fff">
					<td height="20"></td>
				</tr>
				</table>
				
				<table class="table table-condensed" align = "center" style="width:1230px">
				<thead bgcolor="#66CCFF">
				<tr>
					<td><b>Nama Pelanggan</b></td>
					<td><b>No NPWP</b></td>
					<td><b>Tgl Invoice</b></td>
					<td align = "center"><b>No Invoice</b></td>
					<td align = "right"><b>Total</b></td>
					<td align = "right"><b>Total DPP</b></td>
					<td align = "right"><b>Total PPN</b></td>
				</tr>
				</thead>
				<tbody>
				
				<?php
				$sub = 0;
				$dpp = 0;
				$ppn = 0;
				$hasil_dpp = 0;
				$hasil_ppn = 0;
				if(isset($cari)){
				foreach ($cari->result_array() as $data1){
					$hasil_dpp = $data1['total'] / 1.1;
					$hasil_ppn = $hasil_dpp * 10/100;
					$sub = $sub + $data1['total'];
					$dpp = $dpp + $hasil_dpp;
					$ppn = $ppn + $hasil_ppn;
				?>
					<tr>
						<td><?php echo $data1['nama_pelanggan']?></td>
						<td><?php if($data1['no_npwp'] == 0){echo "000000000000000";}else{ echo $data1['no_npwp'];}?></td>
						<td><?php echo $data1['tgl_invoice']?></td>
						<td align = "center"><?php echo $data1['no_jual'].'/'.$data1['id_pelanggan'].'/'.$data1['no_reff'];?></td>
						<td align = "right"><?php echo number_format($data1['total'],2)?></td>
						<td align = "right"><?php echo number_format(round($hasil_dpp),2)?></td>
						<td align = "right"><?php echo number_format(round($hasil_ppn),2)?></td>
					
					</tr>
				<?php }} ?>
					<tr>
					<td colspan = "6" align = "right"><b>Grand Total</b></td>
					<td align = "right"><b><?php echo number_format($sub,2)?></b></td>
					</tr>
					<tr>
					<td colspan = "6" align = "right"><b>Total DPP</b></td>
					<td align = "right"><b><?php echo number_format(round($dpp),2)?></b></td>
					</tr>
					<tr>
					<td colspan = "6" align = "right"><b>Total PPN</b></td>
					<td align = "right"><b><?php echo number_format(round($ppn),2)?></b></td>
					</tr>
				</tbody>
				</table>
            </div>
			</section>
			<iframe name="tampil" frameborder="0"  style="width:10px;height:5px"></iframe>

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