 <html>
<head>
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
  
  
</head>
<style type="text/css">
            .html {
                font-family: "Verdana";
            }
            .content {
                width: 254mm;
                font-size: 12px;
            }
            .content .title {
                text-align: center;
            }
            .content .head-desc {
                margin-top: 0px;
                display: table;
                width: 100%;
            }
            .content .head-desc > div {
                display: table-cell;
            }
            .content .head-desc .user {
                text-align: right;
            }
            .content .nota {
                text-align: center;
                margin-top: 0px;
                margin-bottom: 5px;
            }
            .content .separate {
                margin-top: 0px;
                margin-bottom: 15px;
                border-top: 1px dashed #000;
            }
            .content .transaction-table {
                width: 100%;
                font-size: 12px;
            }
            .content .transaction-table .name {
                width: 185px;
            }
            .content .transaction-table .qty {
                text-align: center;
            }
            .content .transaction-table .sell-price, .content .transaction-table .final-price {
                text-align: right;
                width: 65px;
            }
            .content .transaction-table tr td {
                vertical-align: top;
            }
            .content .transaction-table .price-tr td {
                padding-top: 7px;
                padding-bottom: 7px;
            }
            .content .transaction-table .discount-tr td {
                padding-top: 7px;
                padding-bottom: 7px;
            }
            .content .transaction-table .separate-line {
                height: 1px;
                border-top: 1px dashed #000;
            }
            .content .thanks {
                margin-top: 0px;
                text-align: center;
            }
            .content .azost {
                margin-top:0px;
                text-align: center;
                font-size:10px;
            }
            @media print {
                @page  { 
                    width: 88mm;
                    margin: 0mm;
                    height: -1mm;
                }
            }
			#FK{
				font-size:12px;
				margin-top:0px;
				margin-left:0px;
				text-transform: uppercase;
				letter-spacing: 4.0pt;
			}
			#FB{
				font-size:22px;
				margin-top:0px;
				margin-left:0px;
				text-transform: uppercase;
				letter-spacing: 4.0pt;
			}
			#FC{
				font-size:11px;
				margin-top:0px;
				margin-left:0px;
				text-transform: uppercase;
				letter-spacing: 3.0pt;
				
			}
			#FD{
				font-size:12px;
				margin-top:0px;
				margin-left:0px;
				
			}
        </style>

<body onload="window.print();" class="html" ><!--- history.go(-1); --->
<div class = "row ">
	<section class="col-lg-12 connectedSortable" style="margin-top: 5px;">
		<div class="box box-primary">
				<div class="box-body" >
					<section class="col-lg-2 connectedSortable" style="margin-left: -78px;margin-top: -1px;padding: 10px; width: 232px;" id="FB" > 
					<div class="form-group"  style="margin-left:64px;">
							<div class="col-sm-42" style ="width:18%">
								<td height="40" colspan="5" align="center" ><b><font color="#000000"> &nbspBJM </font></b></td>
							</div>
							
							</div>
					</section > 
					
					<section class="col-lg-7 connectedSortable" style="margin-left: -78px;margin-top: -1px;padding: 10px; width: 650px;" id="FB" > 
					<div class="form-group"  style="margin-left:64px;">
							<div class="col-sm-42" style ="width:150%;margin-left: -58px;">
							<?php if($d['jenis_trans'] == "input"){?>
								<td height="40" ><b><font color="#000000"> &nbsp TANDA TERIMA DEPOSIT</font></b></td>
							<?php }else{?>
								<td height="40" ><b><font color="#000000"> &nbsp TANDA TERIMA CAIR DEPOSIT</font></b></td>
							<?php }?>
							</div>
							
							</div>
					</section > 
<section class="col-lg-7 connectedSortable" style="margin-left: -710px;margin-top: 66px; width: 71%;" >
<table align="left" width="900px"  >
	<tr id="FC">
		<td width = "25%"> <b>Nama Pelanggan</b></td>
		<td width = "40%"><b>Keterangan</b></td>
		<?php if($d['nominal'] > 0){ 
		
		echo "<td align=right width = 20%><b>Cash</b></td>";
		
		}else{ echo "";}?>
		
		<?php if($d['nominal1'] > 0){ 
		
		echo "<td align=right width = 20%><b>Transfer</b></td>";
		
		}else{ echo "";}?>
		</tr>
	
	<tr height="20px">
		<td  id="FD"colspan="6"align="right">_________________________________________________________________________________________________________________</td>
		<td></td>
		<td></td>
		<td></td>
		<td ></td>
		<td ></td>
	</tr>
	<tr id="FC">
		<td width = "20%"><?php echo $d['nama_pelanggan'];?></td>
		<td><?php echo $d['keterangan'];?></td>
		<?php if($d['nominal'] > 0){
			echo"<td align=right>".number_format($d['nominal'])."</td>";
		}else{ echo "";}?>
		<?php if($d['nominal1'] > 0){
			echo"<td align=right>".number_format($d['nominal1'])."</td>";
		}else{ echo "";}?>
		
		
	</tr>
	</table>

					</section>
					</form>
					
					<section class="col-lg-5 connectedSortable" style="width: 28%;margin-top: 14px;margin-left: -45px;" >
					<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data" >
							<div class="form-group" id="FC">
								<td><?php echo $d['no_kas'];?></td>
							<div class="col-sm-42" >
								<td>No Deposit</td>
							</div>
							</div>
							<div class="form-group" id="FC">
								<td><?php echo $d['nama_pelanggan'];?></td>
							<div class="col-sm-42" >
								<td>Nama </td>
							</div>
							</div>
							<div class="form-group" id="FC" style="margin-bottom: 18px;">
								<td><?php echo date('d-m-Y',strtotime($d['tgl']));?></td>
							<div class="col-sm-42" >
								<td>Tgl </td>
							</div>
							</div>
							<div class="form-group" id="FD">
								<td>_______________________________________________</td>
							</div>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<table  id="FC" width="380px">
							<tr>
							
								<td colspan="2" align="center"><?php if($d['jenis_trans'] == "input"){
									echo "DITERIMA";
								}else{
									echo "HORMAT KAMI";
								}?></td>
								<td colspan="2" align="center"><?php if($d['jenis_trans'] == "input"){
									echo "PELANGGAN";
								}else{
									echo "PENERIMA";
								}?></td>
								
							</tr>
							<tr>
								<td align="center" height="100px"></td>
							</tr>
							<tr>
								<td colspan="2" align="center"><?php echo $d['user'];?></td>
								<td colspan="2" align="center"><?php echo $d['nama_pelanggan'];?></td>
							</tr>
							</table>
							</section>
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
</html>