<div class="col-sm-12">
    <h5 align="center" class="m-t-none m-b">INPUT DATA SUPPLIER</h5>
    <form class="needs-validation form" role="form" id="form" action="<?php echo base_url();?>user/supplier/edit" novalidate method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label">
                Nama Supplier <span class="symbol "></span>
            </label>
            <input type="text" autofocus placeholder="Masukan Nama Supplier" name="nama_supplier" class="form-control input-sm" >
        </div>
        <div>
            <button class="btn btn-primary btn-block"  name="submit" data-style="zoom-in">Simpan</button>
        </div>
    </form>
</div>
