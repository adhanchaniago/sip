<div class="col-lg-12" style="width: 100%">
  <div class="panel panel-default">
    <h5 align="center"><b>LAPORAN DETAIL PENJUALAN</b></h5>
    <div class="panel-body">
      <div class="table-responsive">
        <?php foreach ($detail as $d) { ?>
          <table class="table table-condensed" >
            <tr>
              <td width="150px">No. Invoice</td>
              <td width="10px">:</td>
              <td width="900px" align="left"><?php echo $d->no_jual;?>/<?php echo $d->id_pelanggan;?>/<?php echo $d->no_reff;?></td>
              <td align="right" width="150px">Tgl. Invoice</td>
              <td align="right" width="10px">:</td>
              <td align="left" width="150"><?php echo $d->tgl_invoice;?></td>
            </tr>
            <tr>
              <td width="150px">Customer</td>
              <td width="10px">:</td>
              <td width="900px" align="left"><?php echo $d->nama_pelanggan;?></td>
              <td align="right" width="150px">Tgl. Jatuh T</td>
              <td align="right" width="10px">:</td>
              <td align="left" width="150"><?php echo $d->jatuh_tempoan;?></td>
            </tr>
            <tr>
              <td width="150px"></td>
              <td width="10px"></td>
              <td width="900px" align="left"></td>
              <td align="right" width="150px">Tempo</td>
              <td align="right" width="10px">:</td>
              <td align="left" width="150"><?php echo $d->masa_hutang;?></td>
            </tr>
            <tr>
              <td width="150px">Keterangan</td>
              <td width="10px">:</td>
              <td width="900px" align="left"><?php echo $d->keterangan;?></td>
            </tr>
          </table>
          <table class="table table-bordered table-striped table-hover table-condensed" >
            <thead>
              <tr>
                <th style="text-align: left" >Kode Barang</th>
                <th style="text-align: left" >Nama Barang</th>
                <th style="text-align: left" >Qty B</th>
                <th style="text-align: right" >Harga @</th>
                <th style="text-align: right" >Disc</th>
                <th style="text-align: right" >Disc1</th>
                <th style="text-align: right" >Disc2</th>
                <th style="text-align: right" >Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="text-align: left" ><?php echo $d->id_barang;?></td>
                <td style="text-align: left" ><?php echo $d->nama_barang;?></td>
                <td style="text-align: left" ><?php echo $d->qtyb;?></td>
                <td style="text-align: right;" ><?php echo number_format($d->harga_beli);?></td>
                <td style="text-align: right;" ><?php echo number_format($d->disc);?></td>
                <td style="text-align: right;" ><?php echo number_format($d->disc1);?></td>
                <td style="text-align: right;" ><?php echo number_format($d->disc2);?></td>
                <td style="text-align: right;" ><?php echo number_format($d->harga_beli*$d->qtyb);?></td>
              </tr>
              <tr>
                <td style="text-align: left" colspan="7">Total</td>
                <td style="text-align: right;" >Rp. <?php echo number_format($d->harga_beli*$d->qtyb);?></td>
              </tr>
            </tbody>
          </table>
          <br>
        <?php  } ?>
      </div> 
    </div> 
  </div>
</div>


