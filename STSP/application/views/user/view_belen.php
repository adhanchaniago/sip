<html>
<head>
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
  <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}


</style>
</head>
<body>

<div class="row">
<section class="col-lg-12 connectedSortable" >
					
		<div class="box box-success" style="margin-top: -3px;">
		
		<h3 class="box-title">Data Informasi Balance</h3>
		  </div >
		<table id = "example" class="table table-condensed" style="width: 1319px;">
				                <thead  bgcolor="#99FF99">
								  <td width="10px" ><b>No</b></td>
								  <td width="70px" ><b>Tanggal Beli</b></td>
								  <td width="70px" ><b>Jumlah</b></td>
								  <td width="70px" ><b>No Transaksi</b></td>
								  <td width="70px" ><b>Jumlah</b></td>
				                  <td width="250px"><b>Tanggal Bayar</b></td>
				                </thead>
								<tbody>
								<?php 
								$no = 1;
								foreach ($belen->result() as $data){ ?>
								<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $data->tgl_buat;?></td>
								<td><?php echo number_format($data->total);?></td>
								<td><?php echo $data->no_jual;?></td>
								<td><?php echo number_format($data->jumlah);?></td>
								<td><?php echo $data->tgl;?></td>
								<?php $no++;}?>
								</tr>
								
								
				           </table>
			</section>			   
			</div>	
		
</body>
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->	

  
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>	

  <script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/number.js"></script>
  <script>
  $(document).ready(function() {
        $('#example').DataTable({
		  searching   : true,
		  bInfo : false,
		  bLengthChange : false,
		  bPaginate : true,
		  ordering	:	false
        });
    });
  </script>
  <script>
  $('select').select2();
  
</script>
 <script type="text/javascript">
            $(document).ready(function() {
			
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
					
                    processing: true,
                    serverSide: true,
					bInfo : false,
				  bLengthChange : false,
				  bPaginate : false,
				  ordering	:	false,
				  order : [],
         
                    ajax: {"url": "json_barang", "type": "POST"},
                    columns: [
                        {
                            "data": "id_barang",
                            "orderable": false
                        },
						
                        {"data": "nama_barang"},
                        {"data": "stok"},
                        {"data": "satuan_besar"},
                        {"data": "modal_t", render: $.fn.dataTable.render.number(',', '.', '')},
                        {"data": "modal", render: $.fn.dataTable.render.number(',', '.', '')},
                        {"data": "harga_jual", render: $.fn.dataTable.render.number(',', '.', '')},
                        {"data": "walk", render: $.fn.dataTable.render.number(',', '.', '')},
                        {"data": "tk", render: $.fn.dataTable.render.number(',', '.', '')},
                        {"data": "tb", render: $.fn.dataTable.render.number(',', '.', '')},
                        {"data": "sls", render: $.fn.dataTable.render.number(',', '.', '')},
                        {"data": "agn", render: $.fn.dataTable.render.number(',', '.', '')},
                        {"data": "id_k_barang" },
                        {"data": "jual"},
                        {"data": "minimum"},
                        {"data": "tgl"},
						
						
                    ],
                    rowCallback: function(row, data, iDisplayIndex) {
              var info = this.fnPagingInfo();
              var page = info.iPage;
              var length = info.iLength;
              $('td:eq(0)', row).html();
          }
                });
            });
        </script>
<script>
							
	 $('body').on('click', '.hapus-barang', function(e){
      e.preventDefault();
	  
      var id_barang = $(this).attr('data-idbrg');
          $.ajax({
            type: 'post',
            dataType: 'json',
            url : "<?= site_url('Barang/delete_barang');?>"+'/'+id_barang,
            success: function(data){
				alert("BERHASIL");
				$('.tampildata').load("<?php echo base_url();?>Barang/dat_barang");
            }
			
          });
		 
		 
    });	
</script>
<script>
document.onkeydown = function (e) {
		switch (e.keyCode) {
		   
			case 13:
				e.preventDefault();
				
				setTimeout('self.location.href="<?php echo base_url();?>Barang/input_barang"', 0);
				break;
		   
			
		}
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
$('#modal,#harga_jual,#walk1,#walk,#tk,#tb,#sls,#agn').on('keypress', function(e) {
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
</html>