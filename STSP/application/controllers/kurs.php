<?php
class Kurs extends CI_Controller {
 
    public function index() {
       $urlAPI = 'https://kurs.web.id/api/v1/bca';
       $ambilKurs = file_get_contents($urlAPI);
       $dataKurs = json_decode($ambilKurs);
       $kurs['bank'] = $dataKurs->bank;
       $kurs['matauang'] = $dataKurs->matauang;
       $kurs['jual'] = $dataKurs->jual;
       $kurs['beli'] = $dataKurs->beli;
 
       $this->load->view('kurs', $kurs);
    }
}
?>