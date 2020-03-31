<p><div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">

                <div class="form-group">

                    <div class="col-lg-2">
                        <input type="text" class="form-control cari" placeholder="Tanggal Dari" name="dari" id="dari">
                    </div>

                    <div class="col-lg-2">
                        <input type="text" class="form-control cari" placeholder="Tanggal Sampai" name="sampai" id="sampai">
                    </div>

                    <div class="col-lg-2">
                        <select class="form-control cari" id="id_pelanggan" name="id_pelanggan">
                            <option value="">Pilih Pelanggan</option>
                            <?php foreach ($pelanggan as $d) { ?>
                                <option value="<?php echo $d->id_pelanggan;?>"><?php echo $d->nama_pelanggan;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12" style="width: 100%">
        <div class="panel panel-default">
            <h4 align="center">LAPORAN SUMMARY</h4>
            <div class="panel-body" id="tampiltemp">

            </div> 
        </div>
    </div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">  
<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>

<script type="text/javascript">

    $('#id_pelanggan').select2();

    $('#id_barang').select2();

    $('#dari').datetimepicker({
        timepicker:false,
        format:'d-m-Y',
        closeOnDateSelect:true
    });

    $('#sampai').datetimepicker({
        timepicker:false,
        format:'d-m-Y',
        closeOnDateSelect:true
    });

    $('.cari').change(function(){

        var dari            = $("#dari").val();
        var sampai          = $("#sampai").val();
        var id_pelanggan    = $("#id_pelanggan").val();
        $.ajax({
            type    : 'POST',
            url     : '<?php echo base_url();?>laporan_pelanggan/hasil_summary',
            data    : 
            {
                id_pelanggan: id_pelanggan,
                dari        : dari,
                sampai      : sampai
            },

            success : function (html) {

                $("#tampiltemp").html(html);

            }
        });


    });

</script>