<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Reports\PdfReport;
use App\Models\AirQualityData;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PdfClearanceController extends Controller
{
    public function index()
    {


        // Initialize PDF report
        $fpdf = new PdfReport('P', 'mm', 'A4');
        $fpdf->AddPage();
        $fpdf->SetFont('Arial', 'b', 22);
        $fpdf->ln(8);
        $fpdf->Cell(0, 0, 'BARANGAY CLEARANCE', 0, 1, 'C');

        $fpdf->SetFont('Arial', '', 12);
        $fpdf->ln(14);
        $fpdf->Cell(18);
        $fpdf->Cell(0, 5, 'TO WHOM IT MAY CONCERN:', 0, 1, 'L');
        $fpdf->ln(10);

        $fpdf->Cell(36);
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Cell(43, 5, 'THIS IS TO CERTIFY', 0, 0, 'L');
        $fpdf->SetFont('Arial', '', 12);
        $fpdf->Cell(9, 5, 'that', 0, 0, 'L');
        $fpdf->SetFont('Arial', 'b', 12);
        $fpdf->Cell(62, 5, 'RAMON PAULO A. CAUMBAN,', 'B', 0, 'L');
        $fpdf->SetFont('Arial', '', 12);
        $fpdf->Cell(1);
        $fpdf->Cell(20, 5, 'of a legal', 0, 1, 'L');

        $fpdf->Cell(18);
        $fpdf->Cell(132, 5, 'age bonafide resident of P-3, Central Poblacion, Kalilangan, Bukidnon', 0, 0, 'L');
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Cell(10, 5, 'is known', 0, 1, 'L');
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Cell(18);
        $fpdf->Cell(120, 5, 'to be of good moral character and law-abiding citizen in the community.', 0, 1, 'L');
        $fpdf->ln(10);

        $fpdf->Cell(36);
        $fpdf->SetFont('Arial', '', 12);
        $fpdf->Cell(45, 5, 'To certify further, that he/she has no deregatory and/or criminal record',0, 1, 'L');
        $fpdf->Cell(18);
        $fpdf->Cell(0, 5, 'filed in this barangay.', 0, 1, 'L');

        $fpdf->ln(10);

        $fpdf->Cell(36);
        $fpdf->Cell(15, 5, 'Issued,', 0, 0, 'L');
        $fpdf->SetFont('Arial', '', 12);
        $fpdf->Cell(100, 5, 'this 13th day of May 2024, at Barangay Central Poblacion,', 0, 1, 'L');

        $fpdf->Cell(18);
        $fpdf->Cell(130, 5, 'Kalilangan, Bukidnon upon request of the interested party for whatever legal', 0, 1, 'L');
        $fpdf->Cell(18);
        $fpdf->Cell(130, 5, 'purposes it may serve.', 0, 1, 'L');
        $fpdf->ln(35);

        
        $fpdf->SetFont('Arial', 'B', 15);
        $fpdf->Cell(105);
        $fpdf->Cell(30, 5, 'NESTOR L. JUMAO-AS', 0, 1, 'L');

        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Cell(116);
        $fpdf->Cell(30, 5, 'Punong Barangay', 0, 1, 'L');



        // Output PDF with a unique filename
        $today = date('Y'); // Get current year only (YYYY format)
        $fpdf->Output('I', "AirSense $today Annual Assessment.pdf");
        exit;
    }
}