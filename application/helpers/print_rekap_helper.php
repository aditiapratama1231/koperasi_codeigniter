<?php
define('FPDF_FONTPATH', 'font/');
require('fpdf/fpdf.php');

class reportProduct extends FPDF
{
  var $widths;
  var $aligns;

function SetWidths($w)
{
  $this->widths=$w;
}

function SetAligns($a)
{
  $this->aligns=$a;
}

function Row($data)
{
  $nb=0;
  for($i=0;$i<count($data);$i++)
    $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
  $h=(5*$nb);
  $this->CheckPageBreak($h);
  for($i=0;$i<count($data);$i++)
  {
   $w=$this->widths[$i];
   $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
   $x=$this->GetX();
   $y=$this->GetY();
   $this->Rect($x,$y,$w,$h);
   $this->MultiCell($w,5,$data[$i],0,$a);
   $this->SetXY($x+$w,$y);
  }
  $this->Ln($h);
}

function CheckPageBreak($h)
{
  if($this->GetY()+$h>$this->PageBreakTrigger)
  $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
  $cw=&$this->CurrentFont['cw'];
  if($w==0)
   $w=$this->w-$this->rMargin-$this->x;
  $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
  $s=str_replace("r",'',$txt);
  $nb=strlen($s);
  if($nb>0 and $s[$nb-1]=="n")
   $nb--;
  $sep=-1;
  $i=0;
  $j=0;
  $l=0;
  $nl=1;
  while($i<$nb)
  {
   $c=$s[$i];
   if($c=="n")
   {
    $i++;
    $sep=-1;
    $j=$i;
    $l=0;
    $nl++;
    continue;
   }
   if($c==' ')
    $sep=$i;
   $l+=$cw[$c];
   if($l>$wmax)
   {
    if($sep==-1)
    {
     if($i==$j)
      $i++;
    }
    else
     $i=$sep+1;
    $sep=-1;
    $j=$i;
    $l=0;
    $nl++;
   }
   else
   $i++;
 }
 return $nl;
}

function Header()
{
  if($this->kriteria=="simpanan")
  {
    global $title ;


    $title = $this->nama;
    $lebar = $this->w;
    $this->SetFont('Arial','B',15);
    $w = $this->GetStringWidth($title );
    $this->SetX(($lebar -$w)/2);
    $this->Cell($w,9,$title  ,0,0,'C');
    $this->Ln();
    $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-20, $this->GetY());
    $this->Ln(10);
  }
  if($this->kriteria=="pinjaman")
  {
    global $title ;

    $title = $this->nama;
    $lebar = $this->w;
    $this->SetFont('Arial','B',15);
    $w = $this->GetStringWidth($title );
    $this->SetX(($lebar -$w)/2);
    $this->Cell($w,9,$title  ,0,0,'C');
    $this->Ln();
    $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-20, $this->GetY());
    $this->Ln(10);
  }
  if($this->kriteria=="angsuran")
  {
    global $title ;

    $title = "LAPORAN ANGSURAN SEMUA ANGGOTA";
    $lebar = $this->w;
    $this->SetFont('Arial','B',15);
    $w = $this->GetStringWidth($title );
    $this->SetX(($lebar -$w)/2);
    $this->Cell($w,9,$title  ,0,0,'C');
    $this->Ln();
    $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-20, $this->GetY());
    $this->Ln(10);
  }
  if($this->kriteria=="shu")
  {
    global $title ;

    $title = "LAPORAN SHU";
    $lebar = $this->w;
    $this->SetFont('Arial','B',15);
    $w = $this->GetStringWidth($title );
    $this->SetX(($lebar -$w)/2);
    $this->Cell($w,9,$title  ,0,0,'C');
    $this->Ln();
    $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-20, $this->GetY());
    $this->Ln(10);
  }
}

function Footer()
{
  //Position at 1.5 cm from bottom
  //$this->SetY(-15);
  //Arial italic 8
  //$this->SetFont('Arial','',6);
  //Page number
  //$this->Cell(0,10,'Report',0,0,'C');
    $this->SetY(-15);    
    $lebar = $this->w;    
    $this->SetFont('Arial','I',8);            
    $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-20, $this->GetY());
    $this->SetY(-15);
    $this->SetX(0);        
    $this->Ln(1);
    $hal = 'Page : '.$this->PageNo().'/{nb}' ;
    $this->Cell($this->GetStringWidth($hal ),10,$hal );    
    $datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
    $tanggal  = 'Printed : '.date('d-m-Y  h:i-a').' ';
    $this->Cell($lebar-$this->GetStringWidth($hal )-$this->GetStringWidth($tanggal)-20);    
    $this->Cell($this->GetStringWidth($tanggal),10,$tanggal ); 
}

public function setKriteria($i)
{
  $this->kriteria=$i;
}

public function getKriteria()
{
  return $this->kriteria;
}

public function setNama($n)
{
  $this->nama=$n;
}

public function getNama()
{
  return $this->nama;
}

public function setDataset($n)
{
  $this->dataset=$n;
}

public function getDataset()
{
  return $this->dataset;
}

}

?>