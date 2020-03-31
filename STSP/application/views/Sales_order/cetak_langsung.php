	<?php
/* contoh text */  
$text = 'Eh, ini adalah pesan text yang akan tercetak di printer...!';     
/* tulis dan buka koneksi ke printer */    
$printer = printer_open("BP TMU-A300");  
/* write the text to the print job */  
printer_write($printer, $text);   
/* close the connection */ 
printer_close($printer);
?>