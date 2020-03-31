<div class="col-lg-12" style="width: 100%">
  <div class="panel panel-default">
    <h5 align="center"><b>LAPORAN SUMMARY</b></h5>
    <div class="panel-body">
      <table class="table table-bordered table-striped table-hover table-condensed" >
        <thead>
          <tr>
            <th>TGL INVOICE</th>
            <th>NO INVOICE</th>
            <th>NAMA PELANGGAN</th>
            <th style="text-align: right;">POTONGAN</th>
            <th style="text-align: right;">TOTAL BELANJA</th>
            <th style="text-align: right;">TOTAL RETUR</th>
            <th style="text-align: right;">TOTAL</th>
            <th style="text-align: right;">CASH</th>
            <th style="text-align: right;">DEBET</th>
            <th style="text-align: right;">TRANSFER</th>
            <th style="text-align: right;">SISA BAYAR</th>
          </tr>
        </thead>
        <?php 
        $sisa           = 0;
        $transfer       = 0;
        $total          = 0;
        $cash           = 0;
        $total_retur    = 0;
        $total_belanja  = 0;
        $potongan       = 0;
        $debet          = 0;
        foreach ($data as $d) { 
          $sisa         = $sisa + $d->sisa;
          $transfer     = $transfer + $d->transfer;
          $debet        = $debet + $d->Debet;
          $cash         = $cash + $d->cash;
          $total        = $total + $d->total;
          $potongan     = $potongan + $d->potongan;
          $total_retur  = $total_retur + $d->total_retur;
          $total_belanja= $total_belanja + $d->total_belanja;
          ?>
          <tbody>
            <tr>
              <td align="left"><?php echo $d->tgl_invoice;?></td>
              <td align="left"><?php echo $d->no_jual;?>/<?php echo $d->id_pelanggan;?>/<?php echo $d->no_reff;?></td>
              <td align="left"><?php echo $d->nama_pelanggan;?></td>
              <td align="right"><?php echo number_format($d->potongan);?></td>
              <td align="right"><?php echo number_format($d->total_belanja);?></td>
              <td align="right"><?php echo number_format($d->total_retur);?></td>
              <td align="right"><?php echo number_format($d->total);?></td>
              <td align="right"><?php echo number_format($d->cash);?></td>
              <td align="right"><?php echo number_format($d->Debet);?></td>
              <td align="right"><?php echo number_format($d->transfer);?></td>
              <td align="right"><?php echo number_format($d->sisa);?></td>
            </tr>
          </tbody>
        <?php } ?>
        <tr>
          <th style="text-align: center;" colspan="3">TOTAL</th>
          <th style="text-align: right;">Rp. <?php echo number_format($potongan);?></th>
          <th style="text-align: right;">Rp. <?php echo number_format($total_belanja);?></th>
          <th style="text-align: right;">Rp. <?php echo number_format($total_retur);?></th>
          <th style="text-align: right;">Rp. <?php echo number_format($total);?></th>
          <th style="text-align: right;">Rp. <?php echo number_format($cash);?></th>
          <th style="text-align: right;">Rp. <?php echo number_format($debet);?></th>
          <th style="text-align: right;">Rp. <?php echo number_format($transfer);?></th>
          <th style="text-align: right;">Rp. <?php echo number_format($sisa);?></th>
        </tr>
      </table>

    </div> 
  </div>
</div>