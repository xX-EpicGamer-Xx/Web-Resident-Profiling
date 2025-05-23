<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

// 1. Connect to database
$host = 'localhost';
$dbname = 'residents';
$username = 'root';
$password = ''; // Default XAMPP password is blank

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Fetch data from residents table
    $stmt = $pdo->query("SELECT * FROM residents");
    $data = $stmt->fetchAll(PDO::FETCH_NUM);

} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}

// 3. Create spreadsheet and active sheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// 4. Set headers (match your table columns)
$headers = [
    'ID', 'Last name', 'First name', 'Middle name', 'Suffix', 'Sex', 'Birth Date', 'Birth Place',
    'Age', 'Civil status', 'Nationality', 'Religion', 'Occupation', 'Contact Number',
    'Pwd', 'Pwd ID Number', 'Single Parent', 'House Number', 'Subdivision', 'Street',
    'Registered Voter', '4ps Member', 'Voter ID Number', 'Tin Number', 'National ID Number',
    'SSS Number', 'Philhealth Number', 'Pagibig Number', 'Vaccinated'
];

$sheet->fromArray($headers, null, 'A1');

// 5. Style header
$sheet->getStyle('A1:AC1')->applyFromArray([
    'font' => ['bold' => true, 'color' => ['argb' => Color::COLOR_WHITE]],
    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => '57977C']],
    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
]);

// 6. Insert data
$sheet->fromArray($data, null, 'A2');

// 7. Set column widths (adjust as needed)
$columnWidths = [
    'A' => 5,     // ID
    'B' => 20,    // Last Name
    'C' => 20,    // First Name
    'D' => 20,    // Middle Name
    'E' => 10,    // Suffix
    'F' => 8,     // Sex
    'G' => 15,    // Birth Date
    'H' => 20,    // Birth Place
    'I' => 5,     // Age
    'J' => 25,    // Civil Status
    'K' => 15,    // Nationality
    'L' => 15,    // Religion
    'M' => 20,    // Occupation
    'N' => 20,    // Contact Number
    'O' => 5,     // PWD
    'P' => 20,    // PWD ID Number
    'Q' => 12,    // Single Parent
    'R' => 8,     // Indigent
    'S' => 20,    // House Number
    'T' => 20,    // Purok Number
    'U' => 20,    // Street
    'V' => 25,    // Voter's ID
    'W' => 20,    // TIN Number
    'X' => 20,    // National ID
    'Y' => 20,    // SSS Number
    'Z' => 20,     // Philhealth
    'AA' => 20,    // Pagibig
    'AB' => 25,    // Vaccinated
];

foreach ($columnWidths as $col => $width) {
    $sheet->getColumnDimension($col)->setWidth($width);
}

// 8. Enable text wrap for all cells with data
$highestRow = $sheet->getHighestRow();
$sheet->getStyle("A1:Z{$highestRow}")->getAlignment()->setWrapText(true);

// 9. Set row height (fixed height, adjust as needed)
for ($row = 1; $row <= $highestRow; $row++) {
    $sheet->getRowDimension($row)->setRowHeight(30);
}

// 10. Center align all cells vertically
$sheet->getStyle("A1:Z{$highestRow}")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

// 11. Output Excel file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="residents.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;