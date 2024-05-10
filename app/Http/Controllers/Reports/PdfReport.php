<?php

namespace App\Http\Controllers\Reports;

use Codedge\Fpdf\Fpdf\Fpdf;

class PdfReport extends FPDF
{
    function Header()
    {
        //Logo's
        $imageWidth = 20; // Width of the image
        $pageWidth = $this->GetPageWidth();

        // Calculate the x-coordinate to center the image
        $x = ($pageWidth - $imageWidth) / 2;

        // Placement of image
        $this->Image('barangay.png', $x-60, 10, $imageWidth);
        $this->Image('buksu.png',  $x+60, 10, $imageWidth);

        // Select Arial bold 15
        $this->SetFont('Arial', 'B', 12);

        //Parameter for the Cell(): (width(x), height(y), 'text', border, new line, 'alignment')
        $this->Cell(0, 10, 'Republic of the Philippines', 0, 1, 'C');
        $this->Cell(0, 0, 'Malaybalay City, Bukidnon 8700', 0, 1, 'C');
        $this->SetTextColor(0, 0, 255);     //set the color to blue
        $this->Cell(0, 14, 'E-Barangay', 0, 1, 'C');
        $this->Cell(0, 5, '', 'B', 1, 'C');
        $this->SetTextColor(0);     //reset the color to black

    }

    function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-15);
        // Select Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Print centered page number
        $this->Cell(0, 10, 'Annual Assessment Report of MC-EMBX - Ambient Air Quality Monitoring Station. Released on: ' . date('m/d/Y (l) h:i:sa'), 0, 0, 'L');
        $this->Cell(0, 10, 'Page '.$this->PageNo(), 0, 0, 'R');
    }

        //Cell with horizontal scaling if text is too wide
    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
    {
        //Get string width
        $str_width=$this->GetStringWidth($txt);

        //Calculate ratio to fit cell
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $ratio = ($w-$this->cMargin*2)/$str_width;

        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit)
        {
            if ($scale)
            {
                //Calculate horizontal scaling
                $horiz_scale=$ratio*100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
            }
            else
            {
                //Calculate character spacing in points
                $char_space=($w-$this->cMargin*2-$str_width)/max(strlen($txt)-1,1)*$this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align='';
        }

        //Pass on to Cell method
        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);

        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
        }

        //Cell with horizontal scaling only if necessary
        function CellFitScale($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
        {
            $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,true,false);
        }

        //Cell with horizontal scaling always
        function CellFitScaleForce($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
        {
            $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,true,true);
        }

        //Cell with character spacing only if necessary
        function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
        {
            $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
        }

        //Cell with character spacing always
        function CellFitSpaceForce($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
        {
            //Same as calling CellFit directly
            $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,true);
        }
}
