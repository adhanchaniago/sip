 <html>
<head>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">  
</head>
<body >	
 <div class = "row">
	<section class="col-lg-4 connectedSortable" style = "margin-left:-25px;width:675px;" >
		<div class="box box-primary">
				<div class="box-body">
					<div class="col-ig-7">
					<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data">
						<div class="form-group">
								<label class="col-sm-40 control-label" style = "width:80px;">Id Barang</label>
								<div class="col-sm-37" style = "width:195px;" >
										
										
										<input type="hidden" name="id_barang" id="#"  value = "<?php echo $d['id_barang'];?>" autocomplete="off" class="form-control " placeholder = " No Jual">
										<input type="hidden" name="no_sj" id="#"  value = "<?php echo $d['no_sj'];?>" autocomplete="off"  readonly class="form-control " placeholder = " No Jual">
										<input type="hidden" name="no_jl" id="#"  value = "<?php echo $d['no_jl'];?>" autocomplete="off"  readonly class="form-control " placeholder = " No Jual">
										
										<input type="text" name="" id="#"  value = "<?php echo $d['nama_barang'];?>" autocomplete="off"  readonly class="form-control " placeholder = " No Jual">
										
								</div>
						</div>
						<div class="form-group">
								<label class="col-sm-40 control-label" style = "width:80px;">Satuan Besar</label>
								<div class="col-sm-37" style = "width:195px;" >
										<input type="text" name="satuan_besar" id="#" readonly value = "<?php echo $d['satuan_besar']?>" autocomplete="off" class="form-control" placeholder = " No Jual">
					
							</div>
						</div>
						<div class="form-group">
								<label class="col-sm-40 control-label" style = "width:80px;">Jumlah</label>
								<div class="col-sm-37" style = "width:195px;">
										<input type="text" name="jml_krm" id="#" value="<?php echo $d['jml_krm'];?>" autocomplete="off" class="form-control" placeholder = " No Jual">
								</div>
						</div>
						<div class="form-group">
								<label class="col-sm-40 control-label" style = "width:80px;">Ket Edit</label>
								<div class="col-sm-37" style = "width:195px;">
										<input type="text" name="ket_edit" id="#" value="<?php echo $d['ket_edit'];?>" autocomplete="off" class="form-control" placeholder = " Ket Edit">
								</div>
						</div>
						</div>
						<div class="col-ig-7">
						
							
						</div>
						<hr>
										<table align = "right">
										<tr>
										<td>
										<input type = "submit" name = "submit1" value = "Simpan" class = "btn btn-sm btn-primary"></td>
										<td><a href = "<?php echo base_url();?>Surat_jalan/view_surat_jalan" class = "btn btn-sm btn-danger"  tabindex = "6">Cancel</a>
										</td>
										</tr>
										</table>
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
	tampilan();
			
	function tampilan(){			
		$("#tampilan").load("<?php echo base_url();?>Penjualan/view_detail");
		}
	   $('#btn_simpan').on('click',function(){
            var namabarang		=$('#namabarang').val();
            var idbarang		=$('#id_barang').val();
            var satuanbesar		=$('#satuan_besar').val();
            var jmlkrm			=$('#jml_krm').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>Penjualan/input_detail",
                data : {idbarang:idbarang,satuanbesar:satuanbesar,jmlkrm:jmlkrm},
                success: function(data){
                    $('[name="namabarang"]').val("");
                    $('[name="idbarang"]').val("");
                    $('[name="satuanbesar"]').val("");
                    $('[name="jmlkrm"]').val("");
					
					tampilan();
					tampiltmp();
					document.getElementById("namabarang").focus();
					
                }
            });
            return false;
        });
                    
</script>
    <script type="text/javascript">
    var site = "<?php echo site_url();?>";
    $(function(){
        $('#nama_barang').autocomplete({
            serviceUrl: site+'Surat_jalan/get_barang',
			onSelect: function (suggestion) {
                    $('#id_barang').val(''+suggestion.id_barang); 
                    $('#satuan_besar').val(''+suggestion.satuan_besar); 
				}
        });
    });
    </script>

<script type="text/javascript">
	tampiltmp();
		function tampiltmp(){
								
					
		}
		
		$(".detail").keyup(function(){
			

			id_barang = $(this).attr('data-id');

			$.ajax({
				type 	:'POST',
				url     :'<?php echo base_url();?>Surat_jalan/data_sj',
				data    :'id_barang='+id_barang,
				cache   :false,
				success :function(respond){
					$("#tampiltmp").html(respond);
				}
				
			});

		});
	
</script>
<script>

</script>
<script>
							
	 $('body').on('click', '.hapus-barang', function(e){
      e.preventDefault();

      var id_barang = $(this).attr('data-idbarang');
      var _this = $(this);

      swal({
          title: "Anda Yakin !",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Ya",
          closeOnConfirm: true
      },
     function () {

          $.ajax({
            type: 'post',
            dataType: 'json',
            url : "<?= site_url('Penjualan/hapus/');?>"+'/'+id_barang,
            success: function(data){
			  tampilan();
            }
          });
      });
    });	
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
});

  </script>
</html>