<?php
// Assume $csvData is available here
$htmlReport = '<html><body><h1>Report</h1><table border="1">';
foreach ($data as $row) {
    $htmlReport .= '<tr>';
    foreach ($row as $cell) {
        $htmlReport .= '<td>' . $cell . '</td>';
    }
    $htmlReport .= '</tr>';
}
$htmlReport .= '</table></body></html>';

require_once('tcpdf/tcpdf.php');
$pdf = new TCPDF();
$pdf->AddPage();
$pdf->writeHTML($htmlReport, true, false, true, false, '');
$pdf->Output('report.pdf', 'D');

?>