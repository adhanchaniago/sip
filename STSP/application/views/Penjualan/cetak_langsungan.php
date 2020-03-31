	<?php
/* contoh text */  
$text = 'Eh, ini adalah pesan text yang akan tercetak di printer...!';     
/* tulis dan buka koneksi ke printer */    
$printer = printer_open("EPSON LX-310 ESC/P");  
/* write the text to the print job */  
printer_write($printer, $text);   
/* close the connection */ 
printer_close($printer);
?>