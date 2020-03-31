<html>
    <head>
        <title>Menampilkan List Printer</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript">
            function cetak(){
                var printer = $("#printer").val();
                $.ajax({
                    url : "<?php echo base_url();?>Penjualan/cetak_langsung",
                    type: "POST",
                    data : "nama_printer="+printer,
                    success: function(data, textStatus, jqXHR)
                    {
                        alert('Data Sudah DIcetak Ke Printer : '+printer)
                    }
                });
 
 
            }
        </script>
		 <script type="text/javascript">
            function cetak2(){
                var printer = $("#printer").val();
                $.ajax({
                    url : "<?php echo base_url();?>Penjualan/cetak_langsungan",
                    type: "POST",
                    data : "nama_printer="+printer,
                    success: function(data, textStatus, jqXHR)
                    {
                        alert('Data Sudah DIcetak Ke Printer : '+printer)
                    }
                });
 
 
            }
        </script>
    </head>
    <body>
        <button type="submit" onClick="cetak()">Cetak thermal</button>
        <button type="submit" onClick="cetak2()">Cetak a5</button>
    </body>
</html>