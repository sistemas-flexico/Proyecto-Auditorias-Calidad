<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Add logo if you have one
        // $this->Image('logo.png',10,6,30);
        
        // Set font
        $this->SetFont('Arial','B',15);
        
        // Move to the right
        $this->Cell(80);
        
        // Title
        $this->Cell(30,10,' REPORT',0,0,'C');
        
        // Line break
        $this->Ln(20);
    }
    
    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    
    // Simple table
    function BasicTable($header, $data)
    {
        // Header
        foreach($header as $col) {
            $this->Cell(40,7,$col,1,0,'C');
        }
        $this->Ln();
        
        // Data
        foreach($data as $row) {
            foreach($row as $col) {
                $this->Cell(40,6,$col,1);
            }
            $this->Ln();
        }
    }
}

// ==============================================
// STEP 3: CREATE PDF OBJECT
// ==============================================
$pdf = new PDF();
$pdf->AliasNbPages(); // For page numbers
$pdf->AddPage();      // Add a page

// ==============================================
// STEP 4: GET FILTER PARAMETERS
// ==============================================
// $start_date = $_GET['start_date'] ?? date('Y-m-01');
// $end_date = $_GET['end_date'] ?? date('Y-m-d');
// $report_type = $_GET['report_type'] ?? 'sales';

$idcli = 0;
            $tipempaq = "";
            if ($_POST) {
                $idcli = (isset($_POST["id-cliente"])) ? $_POST["id-cliente"] : "";
                $mod   = (isset($_POST["modelo"])) ? $_POST["modelo"] : "";
            }

// ==============================================
// STEP 5: DATABASE CONNECTION (MODIFY THIS!)
// ==============================================
// Replace with your database credentials
// $host = "localhost";
// $user = "root";          // Your MySQL username
// $pass = "";              // Your MySQL password
// $dbname = "your_database_name";

// Create connection
// $conn = mysqli_connect($host, $user, $pass, $dbname);
include('config.php');

// Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// ==============================================
// STEP 6: FETCH DATA FROM DATABASE
// ==============================================
// CHANGE THIS QUERY TO MATCH YOUR DATABASE
// $query = "
//     SELECT 
//         id,
//         date,
//         amount,
//         customer_name,
//         product_name,
//         status
//     FROM sales 
//     WHERE date BETWEEN '$start_date' AND '$end_date'
//     ORDER BY date DESC
// ";

$sqlClientes = ("SELECT * FROM cm_mstr WHERE cm_addr ='" . ($idcli) . "' ");
            $queryData   = mysqli_query($con, $sqlClientes);
            $t_clientes = mysqli_num_rows($queryData);

// $result = mysqli_query($conn, $query);

// ==============================================
// STEP 7: ADD CONTENT TO PDF
// ==============================================

// Add report info
$pdf->SetFont('Arial','',12);
// $pdf->Cell(0,10,"Report Period: $start_date to $end_date",0,1);
// $pdf->Cell(0,10,"Report Type: " . ucfirst($report_type),0,1);
// $pdf->Ln(10); // Line break
 $pdf->Cell(0, 10, 'Search Criteria:', 0, 1);
$pdf->SetFont('Arial', '', 10);

// Check if we have data
// if (mysqli_num_rows($result) > 0) {
    // Prepare table data
    // $data = array();
    // $total = 0;

if ($t_clientes > 0):
    $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Search Results:', 0, 1);
        $pdf->Ln(5);


        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 8, 'Modelo', 1);
        $pdf->Cell(60, 8, 'Exigencia', 1);
        $pdf->Cell(60, 8, 'Revision', 1);
        $pdf->Cell(30, 8, 'Composicion', 1);
        $pdf->Cell(30, 8, 'Tipo Luz', 1);
        $pdf->Ln();
        
        $pdf->SetFont('Arial', '', 9);


    while ($row = mysqli_fetch_array($queryData)):
        $pdf->Cell(40, 8, $row['cm_sort'], 1);
        $pdf->Cell(60, 8, $row['nivel'], 1);
        $pdf->Cell(60, 8, $row['rev1'], 1);
        $pdf->Cell(30, 8, $row['compo'], 1);
        $pdf->Cell(30, 8, $row['atono1'], 1);
    endwhile;
endif;
    // while($row = mysqli_fetch_assoc($result)) {
        // $data[] = array(
        //     $row['id'],
        //     $row['date'],
        //     '$' . number_format($row['amount'], 2),
        //     $row['customer_name']
        // );
    //     $total += $row['amount'];
    // }
    
    // Table header
    // $header = array('Modelo', 'Exigencia', 'Revision', 'Composicion', 'Tipo Luz');
    
    // Set font for table
//     $pdf->SetFont('Arial','',12);
    
//     // Create table manually (simpler than BasicTable)
//     $pdf->SetFillColor(200, 220, 255);
    
//     // Header
//     foreach($header as $col) {
//         $pdf->Cell(45, 10, $col, 1, 0, 'C', true);
//     }
//     $pdf->Ln();
    
//     // Data
//     $pdf->SetFillColor(255, 255, 255);
//     $fill = false;
    
//     foreach($data as $row) {
//         foreach($row as $col) {
//             $pdf->Cell(45, 8, $col, 1, 0, 'L', $fill);
//         }
//         $pdf->Ln();
//         $fill = !$fill;
//     }
    
//     // Add total
//     $pdf->Ln(10);
//     $pdf->SetFont('Arial','B',12);
//     $pdf->Cell(0, 10, 'Total Sales: $' . number_format($total, 2), 0, 1);
    
// // } else {
//     // $pdf->SetFont('Arial','',12);
//     // $pdf->Cell(0,10,'No records found for the selected period.',0,1);
// // }

// // Add summary at the end
// $pdf->AddPage();
// $pdf->SetFont('Arial','B',14);
// $pdf->Cell(0,10,'Report Summary',0,1,'C');
// $pdf->Ln(5);

// $pdf->SetFont('Arial','',12);
// $pdf->MultiCell(0,8, 
//     "Report Generated: " . date('Y-m-d H:i:s') . "\n" .
//     "Report Period: $start_date to $end_date\n" .
//     "Report Type: $report_type\n" .
//     "Generated By: Your System Name"
// );

// ==============================================
// STEP 8: CLOSE CONNECTION AND OUTPUT PDF
// ==============================================
mysqli_close($con);

// Output the PDF
// $filename = 'report_' . date('Ymd_His') . '.pdf';
$pdf->Output('I', 'myreport.pdf'); // 'I' sends to browser
// Use 'D' instead of 'I' to force download
// $pdf->Output('D', $filename);
exit;
?>