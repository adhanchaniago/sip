<style type="text/css" title="border">
.all{
border:1px solid #000000;
}
.top{
border-top:1px solid #000000;
}
.bottom{
border-top:1px solid #000000;
}
.topleft{
border-top:1px solid #000000;
border-left:1px solid #000000;
}
.rightbottom{
border-bottom:1px solid #000000;
border-right:1px solid #000000;
}
#wfont{
color:#FFFFFF;}
#fB{
font-size:16px;
}
#fK{
font-size:11px
}
}
</style>

<body onload="window.print();">
<?php
		
		
		foreach ($listgaji->result() as $b){
		
?>
<table align="center" cellpadding="0" cellspacing="0" class="all" width="200" >
	
	<tr bgcolor="#fff">
		<td height="40" colspan="2" align="center" id="fB"><b><font color="#000000">FAKTUR PENGGAJIAN</font></b></td>
	</tr>
	<tr>
		<td width="122">&nbsp;ID Karyawan </td>
		<td width="236">: <?php echo $b->id_karyawan;?></td>
	</tr>
	<tr>
		<td width="122">&nbsp;Nama Karyawan</td>
		<td width="236">: <?php echo $b->nama_karyawan;?></td>
	</tr>
	<tr>
		<td colspan="3" align="center">---------------------------------------------------------------</td>
	</tr>
	<tr>
		<td width="122">&nbsp;Tanggal </td>
		
		<td width="236">: <?php echo date('d-m-Y', strtotime($b->tanggal)); ?></td>
	</tr>
	<tr>
		<td width="122">&nbsp;Efektif.K </td>
		<td width="236">: <?php echo $b->efektifitas - $b->izin - $b->cuti - $b->alpa;?></td>
	</tr>
	<tr>
		<td width="122">&nbsp;Izin </td>
		<td width="236">: <?php echo $b->izin;?></td>
	</tr>
	<tr>
		<td width="122">&nbsp;Cuti </td>
		<td width="236">: <?php echo $b->cuti;?></td>
	</tr>
	<tr>
		<td width="122">&nbsp;Alpa </td>
		<td width="236">: <?php echo $b->alpa;?></td>
	</tr>
	<tr>
		<td width="122">&nbsp;Lembur</td>
		<td width="236">: <?php echo $b->lembur;?></td>
	</tr>
	<tr>
		<td width="122">&nbsp;Penerimaan</td>
		
		<td width="236">: Rp. &nbsp <?php echo number_format($b->penerimaan,'0','.',','); ?> </td>
	</tr>
	<tr>
		<td width="122">&nbsp;Sisa Hutang</td>
		<td width="236">: Rp. &nbsp <?php echo number_format($b->sisa_hutang,'0','.',','); ?> </td>
	</tr>
	<tr>
		<td width="122">&nbsp;Bayar Hutang</td>
		<td width="236">: Rp. &nbsp <?php echo number_format($b->bayar_hutang,'0','.',','); ?> </td>
	</tr>
	<tr>
		<td width="122">&nbsp;T.Penerimaan</td>
		<td width="236">: Rp. &nbsp <?php echo number_format($b->total_penerimaan,'0','.',','); ?> </td>
	</tr>
	<tr>
		<td width="122">&nbsp;Nama Rekening</td>
		<td width="236">: <?php echo $b->nama_rekening;?> </td>
	</tr>
	<tr>
	<td width="122" valign="top">&nbsp;Jenis Bayar</td>
	<td width="236">: 
			<?php if($b->jenis_bayar=="Cash"){
				echo $b->jenis_bayar;
			}elseif($b->jenis_bayar=="Transfer"){
				echo $b->no_rekening;
			}else{
			?>
				-
			<?php
			}
			?>		
		</td>
	</tr>
	
	<tr>
		<td colspan="3" align="center">---------------------------------------------------------------</td>
	</tr>
	<tr>
		<td height="29" colspan="3" align="center"><i>.::Jangan Lama-lama Ya Say::.</i></td>
	</tr>
		<?php
		}
		?>
</table>
</body>
<hr>
<!--
	Author		: Irfan Saprudin
	E-mail		: irfan_saprudin@yahoo.com
	Company		: Budgeur Communtity / Budgeur Software
	Client		: SMPN 1 Sidangkerta
	Project		: Aplikasi Tabungan Siswa	
	Date		: 13 October 2013
	Revision	: -
-->
