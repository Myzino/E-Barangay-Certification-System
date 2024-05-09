<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Reports\PdfReport;
use App\Models\AirQualityData;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PdfController extends Controller
{
    public function index()
    {

        // Initialize PDF report
        $fpdf = new PdfReport('P', 'mm', 'A4');
        $fpdf->AddPage();

        // CoverPage ====================================================================================================
        $fpdf->Image('barangay.png', 15, 50, 180);
        $fpdf->SetFillColor(255, 255, 255, 127); // White background color
        $fpdf->Rect(40, 210, 130, 50, 'F'); // x, y, w, h, 'F' indicates to fill the rectangle
        $today = date('Y');
        $description = "CY $today\nOVERALL ASSESSMENT REPORT OF BUKIDNON STATE UNIVERSITY- (MAIN CAMPUS)\nIoT AIR QUALITY MONITORING STATION\n(PM2.5, PM10, CO, NO2, AND O3)";
        $fpdf->SetFont('Arial', '', 13);
        $fpdf->SetXY(40 + 5, 210 + 5); // Adjust the position for the description
        $fpdf->MultiCell(130 - 10, 8, $description, 0, 'C');
        $first = true;
        $fpdf->AddPage();

        // 2ndPage ====================================================================================================


        $fpdf->SetFont('Arial', 'B', 10);

        $fpdf->Cell(0, 10, 'CY 2024-2025 Daily Assessment Report from AirSense IoT Monitoring Device', 0, 1, 'C');
        $fpdf->Cell(0, 0, 'CO Ambient Air Quality Monitoring Station', 0, 1, 'C');
        $fpdf->Ln(10);

        $fpdf->SetFont('Arial', '', 10);                                        // REMOVING THE BOLD STYLE
        $fpdf->Cell(25);                                                        // ACT AS A MARGIN-LEFT BUT ACTUALLY AN INVISIBLE CELL WITH A WIDTH OF 25pt
        $fpdf->Cell(40, 5, 'Station: ', 0, 0, 'L');                             // 40pt THE WIDTH I DECIDED FOR EVERY VISIBLE 2ND LEFT CELL
        $fpdf->Cell(100, 5, 'Bukidnon State University - Main Campus', 'B', 1); // JUST GOES ALONG WITH THE 1ST AND 2ND CELL

        $fpdf->Cell(25);
        $fpdf->Cell(40, 5, 'Latitude: ', 0, 0, 'L');
        $fpdf->Cell(100, 5, 'Latitude: 8.157408, Longitude: 125.124856', 'B', 1);

        $fpdf->Cell(25);
        $fpdf->Cell(40, 5, 'Area Type: ', 0, 0, 'L');
        $fpdf->Cell(100, 5,'General Ambient', 'B', 1);

        $fpdf->Cell(25);
        $fpdf->Cell(40, 5, 'Station Type: ', 0, 0, 'L');
        $fpdf->Cell(100, 5, 'PM5003, MiCS6814 & MQ131 Sampler (Solar Paneled Sensor)', 'B', 1);

        $fpdf->Cell(25);
        $fpdf->Cell(40, 5, 'Monitoring Objectives: ', 0, 0, 'L');
        $fpdf->Cell(100, 5, 'To determine the concentration level of CO', 'B', 1);

        $fpdf->Cell(25);    //INVISIBLE LEFT CELL WITH A WIDTH OF 25 AS A MARGIN
        $fpdf->Cell(40, 5, 'Measures Air Pollutant: ', 0, 0, 'L');      //42pt THE WIDTH I DECIDED FOR EVERY VISIBLE 2ND LEFT CELL
        $fpdf->Cell(100, 5, 'Micrograms per cubic meter (ug/m3), Parts per million (ppm)', 'B', 1,);    //JUST GOES ALONG WITH THE 1ST AND 2ND CELL


        // POLLUTANT INFORMATION
        $fpdf->Ln(5);
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Cell(0, 10, 'Pollutant Information', 0, 0, 'C');

        $fpdf->SetFont('Arial', 'B', 10);
        $fpdf->Ln(12);
        $fpdf->Cell(2); // An Empty cell to push the table(row) to center
        $fpdf->SetFillColor(197, 206, 209); // Light grey color
        $fpdf->Cell(40, 10, 'POLLUTANT', 1, 0, 'C', true);
        $fpdf->Cell(150, 10, 'INFORMATION', 1, 1, 'C', true);
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Cell(2); // An Empty cell to push the table(row) to center
        // PM2.5
        $fpdf->Cell(40, 10, 'Particulate Matter 2.5', 1, 0, 'C');
        $fpdf->Cell(150, 10, 'These particles can include dust, pollen, mold spores, and other airborne pollutants.', 1, 1, 'L');
        $fpdf->Cell(2); // An Empty cell to push the table(row) to center
        // PM10
        $fpdf->Cell(40, 10, 'Particulate Matter 10', 1, 0, 'C');
        $fpdf->Cell(150, 10, 'These particles can penetrate deep into the lungs and even enter the bloodstream.', 1, 1, 'L');
        $fpdf->Cell(2); // An Empty cell to push the table(row) to center
        // CO
        $fpdf->Cell(40, 10, 'Carbon Monoxide', 1, 0, 'C');
        $fpdf->Cell(150, 10, 'A colorless, odorless, toxic gas produced by incomplete combustion of carbon-containing fuels.', 1, 1, 'L');
        $fpdf->Cell(2); // An Empty cell to push the table(row) to center
        // NO2
        $fpdf->Cell(40, 10, 'Nitrogen Dioxide', 1, 0, 'C');
        $fpdf->Cell(150, 10, 'Formed primarily from combustion processes, particularly from vehicles and industrial activities.', 1, 1, 'L');
        $fpdf->Cell(2); // An Empty cell to push the table(row) to center
        // O3
        $fpdf->Cell(40, 10, 'Ozone', 1, 0, 'C');
        $fpdf->Cell(150, 10, 'A pollutant that negatively impacting respiratory health and worsening lung conditions', 1, 1, 'L');

        // Pollutant Classification
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Ln(5);
        $fpdf->Cell(0, 10, 'Pollutant Classifications', 0, 0, 'C');

        // Table Header
        $fpdf->SetFont('Arial', 'B', 10);
        $fpdf->Ln(12);
        $fpdf->Cell(1); // An Empty cell to push the table(row) to center
        $fpdf->SetFillColor(197, 206, 209); // Light grey color
        $fpdf->Cell(29, 10, 'CATEGORY', 1, 0, 'C', true);
        $fpdf->Cell(27, 10, 'COLOR', 1, 0, 'C', true);
        $fpdf->Cell(27, 10, 'PM10 (ug/m3)', 1, 0, 'C', true);
        $fpdf->Cell(27, 10, 'PM2.5 (ug/m3)', 1, 0, 'C', true);
        $fpdf->Cell(27, 10, 'CO (ppm)', 1, 0, 'C', true);
        $fpdf->Cell(27, 10, 'NO2 (ppm)', 1, 0, 'C', true);
        $fpdf->Cell(27, 10, 'O3 (ppm)', 1, 1, 'C', true);

        // Table Body
        $fpdf->SetFont('Arial', '', 10);

        $fpdf->Cell(1); // An Empty cell to push the table(row) to center
        // Good
        $fpdf->Cell(29, 10, 'Good', 1, 0, 'C');
        $fpdf->SetFillColor(111, 241, 117); // Light green color
        $fpdf->Cell(27, 10, 'Green', 1, 0, 'C', true);
        $fpdf->Cell(27, 10, '0 - 54', 1, 0, 'C');
        $fpdf->Cell(27, 10, '0 - 25', 1, 0, 'C');
        $fpdf->Cell(27, 10, '0 - 25', 1, 0, 'C');
        $fpdf->Cell(27, 10, '0 - 0.05', 1, 0, 'C');
        $fpdf->Cell(27, 10, '0 - 0.064', 1, 1, 'C');

        $fpdf->Cell(1); // An Empty cell to push the table(row) to center
        // Fair
        $fpdf->Cell(29, 10, 'Moderate', 1, 0, 'C');
        $fpdf->SetFillColor(255, 255, 77); // Light yellow color
        $fpdf->Cell(27, 10, 'Yellow', 1, 0, 'C', true);
        $fpdf->Cell(27, 10, '55 - 154', 1, 0, 'C');
        $fpdf->Cell(27, 10, '25.1 - 35.0', 1, 0, 'C');
        $fpdf->Cell(27, 10, '25 - 50', 1, 0, 'C');
        $fpdf->Cell(27, 10, '0.06 - 0.10', 1, 0, 'C');
        $fpdf->Cell(27, 10, '0.065 - 0.084', 1, 1, 'C');


        $fpdf->Cell(1); // An Empty cell to push the table(row) to center
        // Orange
        $fpdf->CellFitScale(29, 10, 'Acutely Unhealthy', 1, 0, 'C');
        $fpdf->SetFillColor(250, 123, 91); // Light orange color
        $fpdf->Cell(27, 10, 'Orange', 1, 0, 'C', true);
        $fpdf->Cell(27, 10, '155 - 254', 1, 0, 'C');
        $fpdf->Cell(27, 10, '35.1 - 45.0', 1, 0, 'C');
        $fpdf->Cell(27, 10, '51 - 69', 1, 0, 'C');
        $fpdf->Cell(27, 10, '0.11 - 0.36', 1, 0, 'C');
        $fpdf->Cell(27, 10, '0.085 - 0.104', 1, 1, 'C');

        $fpdf->Cell(1); // An Empty cell to push the table(row) to center
        // Unhealthy
        $fpdf->Cell(29, 10, 'Unhealthy', 1, 0, 'C');
        $fpdf->SetFillColor(253, 93, 114); // Light red color
        $fpdf->Cell(27, 10, 'Red', 1, 0, 'C', true);
        $fpdf->Cell(27, 10, '255 - 354', 1, 0, 'C');
        $fpdf->Cell(27, 10, '45.1 - 55', 1, 0, 'C');
        $fpdf->Cell(27, 10, '70 - 150', 1, 0, 'C');
        $fpdf->Cell(27, 10, '0.37 - 0.65', 1, 0, 'C');
        $fpdf->Cell(27, 10, '0.105 - 0.124', 1, 1, 'C');

        $fpdf->Cell(1); // An Empty cell to push the table(row) to center
        // Very Unhealthy
        $fpdf->Cell(29, 10, 'Very Unhealthy', 1, 0, 'C');
        $fpdf->SetFillColor(127, 88, 151); // Light purple color
        $fpdf->Cell(27, 10, 'Purple', 1, 0, 'C', true);
        $fpdf->Cell(27, 10, '355 - 424', 1, 0, 'C');
        $fpdf->Cell(27, 10, '55.1 - 90', 1, 0, 'C');
        $fpdf->Cell(27, 10, '151 - 400', 1, 0, 'C');
        $fpdf->Cell(27, 10, '0.66 - 1.24', 1, 0, 'C');
        $fpdf->Cell(27, 10, '0.125 - 0.374', 1, 1, 'C');

        $fpdf->Cell(1); // An Empty cell to push the table(row) to center
        // Hazardous
        $fpdf->Cell(29, 10, 'Hazardous', 1, 0, 'C');
        $fpdf->SetTextColor(255, 255, 255); // Set text color to white
        $fpdf->SetFillColor(128, 0, 0); // maroon color
        $fpdf->Cell(27, 10, 'Maroon', 1, 0, 'C', true);
        $fpdf->SetTextColor(0, 0, 0); // Reset text color to black
        $fpdf->Cell(27, 10, 'Above 425', 1, 0, 'C');
        $fpdf->Cell(27, 10, 'Above 91', 1, 0, 'C');
        $fpdf->Cell(27, 10, 'Above 401', 1, 0, 'C');
        $fpdf->Cell(27, 10, 'Above 1.24', 1, 0, 'C');
        $fpdf->Cell(27, 10, 'Above 0.374', 1, 1, 'C');
        $fpdf->AddPage();

        // LastPage
        $fpdf->AddPage();
        //NAMES AND SIGNATURE
        $fpdf->ln(15); //margin top (new line)
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Cell(5);
        $fpdf->Cell(100, 10, 'Prepared by:', 0, 0, 'L');
        $fpdf->Cell(20, 10, 'Reviewed by:', 0, 1, 'L');
        $fpdf->ln(20);

        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Cell(5);
        $fpdf->Cell(100, 5, 'ENGR. JOHARA JANE G. PECSON', 0, 0, 'L');
        $fpdf->Cell(0, 5, 'JESSIE JAMES B. OSIN', 0, 1, 'L');

        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Cell(5);
        $fpdf->Cell(100, 5, 'Project Document Specialist', 0, 0, 'L');
        $fpdf->Cell(0, 5, 'Senior Environmental Management Specialist', 0, 1, 'L');

        $fpdf->ln(5);
        $fpdf->Cell(5);
        $fpdf->Cell(100, 10, 'Checked by:', 0, 0, 'L');
        $fpdf->Cell(0, 10, 'Recommended by:', 0, 1, 'L');
        $fpdf->ln(20);

        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Cell(5);
        $fpdf->Cell(100, 5, 'ENGR. ROSALINDA L. ILOGON', 0, 0, 'L');
        $fpdf->Cell(0, 5, 'ENGR. DOVEE CHERRY I. GEOLLEGUE', 0, 1, 'L');

        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Cell(5);
        $fpdf->Cell(100, 5, 'Chief, Ambient Monitoring and Forcasting Section', 0, 0, 'L');
        $fpdf->Cell(0, 5, 'Chief, Environmental Documentation Station', 0, 1, 'L');

        $fpdf->Cell(5);
        $fpdf->Cell(100, 5, 'Services Section', 0, 0, 'L');
        $fpdf->Cell(0, 5, 'Enforcement Division', 0, 1, 'L');

        // Output PDF with a unique filename
        $today = date('Y'); // Get current year only (YYYY format)
        $fpdf->Output('I', "AirSense $today Annual Assessment.pdf");
        exit;
    }

}



















