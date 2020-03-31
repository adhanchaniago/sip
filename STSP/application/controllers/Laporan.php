<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct(){
		parent:: __construct();
		
		ceklogin();
		$this->load->Model(array('Model_laporan','Model_pelanggan','Model_supplier','Model_akun'));
			//$this->load->helper(array('form','url'));
	}
	function tabs(){
		$data['listsupplier']  = $this->Model_supplier->view_supplier();
		$this->template->load('template','tabs',$data);
		
	}
	function Laporan_Saldob(){
		$data['listsupplier']  = $this->Model_supplier->view_supplier();
		$this->template->load('template','Laporan/saldob',$data);
		
	}
	function lap_saldosupplier(){
		$data['listsupplier']  = $this->Model_supplier->view_supplier();
		$this->template->load('template','Laporan/lap_saldosupplier',$data);
		
	}
	function carib(){
		$data['listsupplier']  = $this->Model_supplier->view_supplier();
		$this->load->view('Laporan/carib',$data);
		
	}
	
	function Laporan_Saldo(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->template->load('template','Laporan/saldo',$data);
		
	}
	function Buku_besar(){
		$data['listakun']  = $this->Model_akun->view_subakun();
		$this->template->load('template','Laporan/buku_besar',$data);
		
	}
	function lap_buku_besar(){
		$data['listakun']  = $this->Model_akun->view_subakun();
		$this->template->load('template','Laporan/lap_buku_besar',$data);
		
	}
	function lap_saldopelanggan(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->template->load('template','Laporan/lap_saldopelanggan',$data);
		
	}
	function lap_pelanggan(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->template->load('template','Laporan/hasil_saldo',$data);
		
	}
	function Tanda_Terima(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->template->load('template','Laporan/terima',$data);
		
	}
	function Tanda_Terima2(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->template->load('template','Laporan/lap_tandaterima',$data);
		
	}
	function cari(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->load->view('Laporan/cari',$data);
		
	}
	function buku_besar_cetak(){
		$this->load->view('Laporan/buku_besar_cetak');
		
	}
	function cari_t(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->load->view('Laporan/cari_t',$data);
		
	}
	function transaksi(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->load->view('Laporan/transaksi',$data);
		
	}function pajak(){
		$a 						=  $this->Model_laporan->view_faktur()->row_array();
		$data['autonumber'] 	= buatkode($a['no_faktur'],'');
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->load->view('Laporan/pajak',$data);
		
	}function pajak_khusus2(){
		$a 						=  $this->Model_laporan->view_faktur()->row_array();
		$data['autonumber'] 	= buatkode($a['no_faktur'],'');
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->load->view('Laporan/pajak_khusus2',$data);
		
	}function cetak_pajak_khusus(){
		$a 						=  $this->Model_laporan->view_faktur()->row_array();
		$data['autonumber'] 	= buatkode($a['no_faktur'],'');
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->load->view('Laporan/cetak_pajak_khusus',$data);
		
	}function pajak2(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->template->load('template','Laporan/pajak2',$data);
		
	}function pajak_khusus(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->template->load('template','Laporan/pajak_khusus',$data);
		
	}function komisi(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->load->view('Laporan/komisi',$data);
		
	}function belen(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->load->view('Laporan/belen',$data);
		
	}function lunas(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->load->view('Laporan/nota_lunas',$data);
		
	}function belumlunas(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->load->view('Laporan/nota_belumlunas',$data);
		
	}function transaksinota(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->template->load('template','Laporan/transaksinota',$data);
		
	}
	function lap_transaksi(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->template->load('template','Laporan/lap_transaksi',$data);
		
	}
	function lap_transaksipenjualan(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->template->load('template','Laporan/lap_transaksipenjualan',$data);
		
	}
	function lap_purchase_order(){
		$this->template->load('template','Laporan/lap_transaksi_purchase');
		
	}
	function lap_transaksi_purchase_order(){
		$this->template->load('template','Laporan/lap_transaksi_purchase_order');
		
	}
	function lap_sales_order(){
		$this->template->load('template','Laporan/lap_transaksi_sales');
		
	}
	function lap_transaksi_sales_order(){
		$this->template->load('template','Laporan/lap_transaksi_sales_order');
		
	}
	function transaksi_sales_order(){
		
		$this->load->view('Laporan/transaksi_sales_order');
		
	}
	function transaksi_purchase_order(){
		
		$this->load->view('Laporan/transaksi_purchase_order');
		
	}
	function lap_belen(){
		$data['listbelen']  = $this->Model_laporan->view_belen();
		$this->template->load('template','Laporan/lap_belen',$data);
		
	}
	function lap_lunas(){
		$data['listbelen']  = $this->Model_laporan->view_belen();
		$this->template->load('template','Laporan/lap_lunas',$data);
		
	}
	function lap_belumlunas(){
		$data['listbelen']  = $this->Model_laporan->view_belen();
		$this->template->load('template','Laporan/lap_belumlunas',$data);
		
	}
	function lap_pajak(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->template->load('template','Laporan/lap_pajak',$data);
		
	}
	function pajak_cetak(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->load->view('Laporan/pajak_cetak',$data);
		
	}function lap_pajak2(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->template->load('template','Laporan/lap_pajak2',$data);
		
	}function lap_pajak_khusus(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->template->load('template','Laporan/lap_pajak_khusus',$data);
		
	}function lap_komisi(){
		$data['listsales']  = $this->Model_laporan->view_sales();
		$this->template->load('template','Laporan/lap_komisi',$data);
		
	}
	function lap_komisisales(){
		$data['listsales']  = $this->Model_laporan->view_sales();
		$this->template->load('template','Laporan/lap_komisisales',$data);
		
	}
	function lap_transaksipbulan(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->template->load('template','Laporan/lap_transaksipbulan',$data);
		
	}
	function lap_transaksipelanggan(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$this->template->load('template','Laporan/lap_transaksipelanggan',$data);
		
	}
	function transaksib(){
		$data['listsupplier']  = $this->Model_supplier->view_supplier();
		$this->load->view('Laporan/transaksib',$data);
		
	}
	function transaksibnota(){
		$data['listsupplier']  = $this->Model_supplier->view_supplier();
		$this->template->load('template','Laporan/transaksibnota',$data);
		
	}
	function lap_transaksib(){
		$data['listsupplier']  = $this->Model_supplier->view_supplier();
		$this->template->load('template','Laporan/lap_transaksib',$data);
		
	}
	function lap_transaksibeli(){
		$data['listsupplier']  = $this->Model_supplier->view_supplier();
		$this->template->load('template','Laporan/lap_transaksibeli',$data);
		
	}
	function lap_transaksibulan(){
		$data['listsupplier']  = $this->Model_supplier->view_supplier();
		$this->template->load('template','Laporan/lap_transaksibulan',$data);
		
	}function lap_transaksisupplier(){
		$data['listsupplier']  = $this->Model_supplier->view_supplier();
		$this->template->load('template','Laporan/lap_transaksisupplier',$data);
		
	}
	function cetak_struk($id_pelanggan,$tanggal_dari,$tanggal_sampai){
		$data['list']  = $this->Model_laporan->lap_saldo($id_pelanggan,$tanggal_dari,$tanggal_sampai);
		$data['listpelanggan']  = $this->Model_laporan->pelanggan($id_pelanggan);
		$this->load->view('Laporan/cetak',$data);
		
	}
	public function lap_bcetak($id_pelanggan,$tanggal_dari,$tanggal_sampai)
	{
		$bkasbon 	= $this->Model_laporan->lap_saldo($id_pelanggan,$tanggal_dari,$tanggal_sampai);
		$pelanggan 	= $this->Model_laporan->pelanggan($id_pelanggan);
		
		$this->load->library('cfpdf');		
		$pdf = new FPDF('L','mm','A5' );
		$pdf->AddPage();
		$pdf->SetFont('helvetica','',8);
		
		$pdf->Cell(190, 4, 'Statement of Account', 0, 0, 'C'); 
		$pdf->Ln();
		$pdf->Cell(190,6,'Per '.date('d-m-Y', strtotime($tanggal_dari)).' s/d '.date('d-m-Y', strtotime($tanggal_sampai)),0,1,'C');
		$pdf->Ln();
		foreach($bkasbon->result() as $p)
		{
		}
		foreach($pelanggan->result() as $d)
		{
		}
		$pdf->Cell(30,4,'Nama Pelanggan : '.$d->nama_pelanggan,0,1,'L');
		
		$pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		$pdf->Ln();
		
		$pdf->Cell(40, 5, 'Tanggal', 0, 0, 'L');
		$pdf->Cell(40, 5, 'ID Transkasi', 0, 0, 'L');
		$pdf->Cell(40, 5, 'Debet', 0, 0, 'L');
		$pdf->Cell(40, 5, 'Kredit', 0, 0, 'L');
		$pdf->Cell(43, 5, 'Saldo', 0, 0, 'L');
		$pdf->Ln();

		$pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		$pdf->Ln();

		

		
		$total =0 ;
		$pj =0 ;
		$by =0 ;
		$saldo =0 ;
		foreach($bkasbon->result() as $p)
		{
			$total = $total + $p->tagihan+ $p->bayar_tagihan;
			$pj = $pj + $p->tagihan;
			$by = $by + $p->bayar_tagihan;
			$saldo = $saldo + $p->tagihan - $p->bayar_tagihan ;
			$pdf->Cell(40, 5, date('d-m-Y', strtotime($p->tgl)), 0, 0, 'L');
			$pdf->Cell(40, 5, $p->id_transaksi.'/'.$p->id_pelanggan.'/'.$p->no_reff, 0, 0, 'L');
			$tagihan			= $p->tagihan;
			$bayar_tagihan		= $p->bayar_tagihan;
			if($p->tagihan =$tagihan){
				$tagihan = $tagihan;
			}elseif($p->tagihan = $bayar_tagihan){
				$tagihan = '0';
			}
			$pdf->Cell(40, 5, str_replace(",", ".",number_format($tagihan)), 0, 0, 'L');
			$bayar_tagihan	= $p->bayar_tagihan;
			if($p->bayar_tagihan =$bayar_tagihan){
				$bayar_tagihan = $bayar_tagihan;
			}elseif($p->bayar_tagihan = $tagihan){
				$bayar_tagihan ='0';
			}
			$pdf->Cell(40, 5,str_replace(",", ".", number_format($bayar_tagihan)), 0, 0, 'L');
			
			$pdf->Cell(43, 5, "Rp. ".str_replace(",", ".", number_format($saldo)), 0, 0, 'L');
			$pdf->Ln();
			
		}
		$pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(150, 5, 'Total Debet', 0, 0, 'R');
		$pdf->Cell(30, 5, "Rp. ".str_replace(',', '.', number_format($pj)), 0, 0, 'R');
		$pdf->Ln();
		$pdf->Cell(150, 5, 'Total Kredit', 0, 0, 'R');
		$pdf->Cell(30, 5, "Rp. ".str_replace(',', '.', number_format($by)), 0, 0, 'R');
		$pdf->Ln();
		$pdf->Cell(150, 5, 'Total Saldo', 0, 0, 'R');
		$pdf->Cell(30, 5, "Rp. ".str_replace(',', '.', number_format($saldo)), 0, 0, 'R');
		$pdf->Ln();
		$pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		$pdf->Ln();
		
		

		$pdf->Output();
	}
	
	
}
?>