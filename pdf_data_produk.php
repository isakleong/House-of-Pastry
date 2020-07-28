<?php 
session_start();
if(empty($_SESSION['admin'])){
    header("location:login.php");
}
require "fpdf181/fpdf.php";
$db = new mysqli("localhost", "root", "", "proyek_tekweb");

class myPDF extends FPDF{
    function header(){
        $this->image('img/logo1.png',10, 6, -150); //(gambar, ke kanan, ke bawah, ukuran gambar)
        $this->SetFont('Arial','B',18);
        $this->Ln(5);
        $this->Cell(190,10,'DATA PRODUK',0,0,'C');
        $this->Ln(5);
        $this->SetFont('Times','',16);
        $this->Cell(190,15,'PT. House Of Pastry',0,0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable(){
        $this->SetX(10);
        $this->SetFont('Times','B',14);
        $this->Cell(10,10,'No',1,0,'C');
        $this->Cell(40,10,'Nama Produk',1,0,'C');
        $this->Cell(35,10,'Harga (Rp.)',1,0,'C');
        $this->Cell(40,10,'Ukuran ',1,0,'C');
        $this->Cell(40,10,'Kategori',1,0,'C');
        $this->Cell(30,10,'Rating',1,0,'C');
        $this->Ln();
    }
    function viewTable($db){
        $this->SetFont('Times','',12);
        $no = 1;
        $stmt = $db->query('Select * from produk join kategori on produk.id_kategori=kategori.id_kategori order by produk.id_kategori asc');
        while($data = $stmt->fetch_assoc()){
            $this->Cell(10,10,$no++,1,0,'C');
            $this->Cell(40,10,$data['nama_produk'],1,0,'L');
            $this->Cell(35,10,number_format($data['harga_produk']),1,0,'C');
            $this->Cell(40,10,$data['berat_produk'],1,0,'C');
            $this->Cell(40,10,$data['nama_kategori'],1,0,'C');
            $this->Cell(30,10,$data['rating'],1,0,'C');
            $this->Ln();
        }
    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output('i','data_produk.pdf');