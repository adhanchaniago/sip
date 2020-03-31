<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Import Data Excel dengan PHP</title>

		<!-- Load File bootstrap.min.css yang ada difolder css -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">  <!-- Ionicons -->
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">  <!-- DataTables -->
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">  
		
		<!-- Style untuk Loading -->
		<style>
        #loading{
			background: whitesmoke;
			position: absolute;
			top: 140px;
			left: 82px;
			padding: 5px 10px;
			border: 1px solid #ccc;
		}
		.fileUpload {
		position: relative;
		overflow: hidden;
		margin: 10px;
		}
		.fileUpload input.upload {
			position: absolute;
			top: 0;
			right: 0;
			margin: 0;
			padding: 0;
			font-size: 20px;
			cursor: pointer;
			opacity: 0;
			filter: alpha(opacity=0);
		}
		</style>
		
		<!-- Load File jquery.min.js yang ada difolder js -->
		<script src="js/jquery.min.js"></script>
		
		<script>
		$(document).ready(function(){
			// Sembunyikan alert validasi kosong
			$("#kosong").hide();
		});
		
		</script>
		<script>
		document.getElementById("uploadBtn").onchange = function () {
		document.getElementById("uploadFile").value = this.value;
		};
		</script>
	</head>
	<body>
		<!-- Content -->
		<div style="padding: 0 15px;margin-top: 47px;">
			<!-- Buat sebuah tombol Cancel untuk kemabli ke halaman awal / view data -->
			<a href="<?php echo base_url('Barang/view_barang'); ?>" class="btn btn-danger pull-right">
				<span class="glyphicon glyphicon-remove"></span> Cancel
			</a>
			
			<h3>Form Import Barang</h3>
			<hr>
			
			<!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
			<form method="post" action="<?php echo base_url("Barang/import_barang"); ?>" enctype="multipart/form-data">
				<a href="<?php echo base_url('./excel/Format.xlsx'); ?>" class="btn btn-default">
					<span class="glyphicon glyphicon-download"></span>
					Download Format
				</a><br><br>
				
				<!-- 
				-- Buat sebuah input type file
				-- class pull-left berfungsi agar file input berada di sebelah kiri
				-->
				<input type="file" name="file" class="pull-left" style="width: 161px;height: 33px;">
				
				<button type="submit" name="preview" class="btn btn-success btn-sm">
					<span class="glyphicon glyphicon-eye-open"></span> PREVIEW
				</button>
			</form>
			
			<hr>
			
  <?php  if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form   
  if(isset($upload_error)){ // Jika proses upload gagal      
  echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload      
  die; // stop skrip   
  }        // Buat sebuah tag form untuk proses import data ke database    
  echo "<form method='post' action='".base_url("Barang/import")."'>";        // Buat sebuah div untuk alert validasi kosong  
// Jika semua data sudah diisi     
  echo "<button type='submit' name='import' class = 'btn btn-sm btn-success'>Import</button> ";      
  
 echo "<table class = table table-condensed cellpadding='8'>  
  <tr>  
  <td align =center colspan='14'><b>Preview Data</b></td> 
  </tr>   
  <tr>   
  <th>ID Barang</th>  
  <th>Nama Barang</th>   
  <th>Satuan</th>   
  <th>Modal</th>   
  <th>Toko Kecil </th>   
  <th>Toko Besar</th>   
  <th>Sales</th>   
  <th>Agen</th>   
  <th>Partai</th>   
  <th>Kat Barang</th>   
  <th>Jual</th>   
  <th>Min</th>   
  <th>Tanggal</th>   
  </tr>";    
  $numrow = 1; 
  $kosong = 0;        // Lakukan perulangan dari data yang ada di excel    // $sheet adalah variabel yang dikirim dari controller
  foreach($sheet as $row){       // Ambil data pada excel sesuai Kolom      
  $id_barang = $row['A']; // Ambil data NIS      
  $nama_barang = $row['B']; // Ambil data nama  
  $satuan = $row['C']; // Ambil data jenis kelamin    
  $modal = $row['D']; // Ambil data jenis kelamin    
  $harga_jual = $row['E']; // Ambil data jenis kelamin    
  $walk = $row['F']; // Ambil data jenis kelamin    
  $tk = $row['G']; // Ambil data jenis kelamin    
  $tb = $row['H']; // Ambil data jenis kelamin    
  $sls = $row['I']; // Ambil data jenis kelamin    
  $id_k_barang = $row['J']; // Ambil data jenis kelamin    
  $jual = $row['K']; // Ambil data jenis kelamin    
  $minimum = $row['L']; // Ambil data jenis kelamin    
  $tgl = $row['M']; // Ambil data jenis kelamin    
  //$alamat = $row['D']; // Ambil data alamat            // Cek jika semua data tidak diisi  
  if(empty($id_barang) && empty($nama_barang) && empty($satuan) && empty($modal)&& empty($harga_jual)&& empty($walk)&& empty($tk)&& empty($tb)&& empty($sls)&& empty($agn)&& empty($id_k_barang)&& empty($jual)&& empty($minimum)&& empty($harga_jual)&& empty($tgl))  
  continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)            // Cek $numrow apakah lebih dari 1      // Artinya karena baris pertama adalah nama-nama kolom      // Jadi dilewat saja, tidak usah diimport 
  if($numrow > 1){        // Validasi apakah semua data telah diisi        
  $nis_td = ( ! empty($id_barang))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah     
  $nama_td = ( ! empty($nama_barang))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah     
  $satuan_td = ( ! empty($satuan))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah  
  $modal_td = ( ! empty($modal))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah  
  $harga_jual_td = ( ! empty($harga_jual))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah  
  $walk_td = ( ! empty($walk))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah  
  $tk_td = ( ! empty($tk))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah  
  $tb_td = ( ! empty($tb))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah  
  $sls_td = ( ! empty($sls))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah  
  $id_k_barang_td = ( ! empty($id_k_barang))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah  
  $jual_td = ( ! empty($jual))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah  
  $minimum_td = ( ! empty($minimum))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah  
  $tgl_td = ( ! empty($tgl))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah  
  //$alamat_td = ( ! empty($alamat))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah                // Jika salah satu data ada yang kosong 
   if(empty($id_barang) or empty($nama_barang) or empty($satuan) or empty($modal) or empty($harga_jual) or empty($walk) or empty($tk) or empty($tb) or empty($sls) or empty($agn) or empty($id_k_barang) or empty($jual) or empty($minimum) or empty($harga_jual) or empty($tgl))  
  {      
  $kosong++; // Tambah 1 variabel $kosong        
  }               
  echo "<tr>";     
  echo "<td".$nis_td.">".$id_barang."</td>";    
  echo "<td".$nama_td.">".$nama_barang."</td>";    
  echo "<td".$satuan_td.">".$satuan."</td>";    
  echo "<td".$modal_td.">".$modal."</td>";    
  echo "<td".$harga_jual_td.">".$harga_jual."</td>";    
  echo "<td".$walk_td.">".$walk."</td>";    
  echo "<td".$tk_td.">".$tk."</td>";    
  echo "<td".$tb_td.">".$tb."</td>";    
  echo "<td".$sls_td.">".$sls."</td>";    
  echo "<td".$id_k_barang_td.">".$id_k_barang."</td>";    
  echo "<td".$jual_td.">".$jual."</td>";    
  echo "<td".$minimum_td.">".$minimum."</td>";    
  echo "<td".$tgl_td.">".$tgl."</td>";    
  echo "</tr>";     
  }        
  $numrow++; // Tambah 1 setiap kali looping  
  }        
  echo "</table>";        // Cek apakah variabel kosong lebih dari 0    // Jika lebih dari 0, berarti ada data yang masih kosong 
  if($kosong > 0){    ?>      
  <script>    
  $(document).ready(function(){        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong 
  $("#jumlah_kosong").html('<?php echo $kosong; ?>');               
  $("#kosong").show(); // Munculkan alert validasi kosong    
  });  
  
  $("#example2").DataTable({
     
      
      searching   : false,
      bInfo : false,
      bLengthChange : false,
      bPaginate : false
      
      
      
    });
	
  </script>  
  <?php    }else{ // Jika semua data sudah diisi     
  
  }        
  echo "</form>"; 
  }  ?>		
  </div>
</body>
</html>

