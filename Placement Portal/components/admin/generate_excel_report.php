<?php
require '../vendor/autoload.php'; // Include PHPExcel library

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Create new Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Add headers
$headers = ["ID", "Email", "UID", "Department", "Course", "Semester", "Phone"];
$sheet->fromArray($headers, NULL, 'A1');

// Fetch user data from the database
include 'db-connect.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user_info";
$result = $conn->query($sql);

$rowIndex = 2; // Start from row 2 (after headers)
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $rowData = [
            $row["id"],
            $row["email"],
            $row["uid"],
            $row["department"],
            $row["course"],
            $row["semester"],
            $row["phone"],
            // "../form/uploads/" . $row["cv"]
        ];
        $sheet->fromArray($rowData, NULL, 'A' . $rowIndex);
        $rowIndex++;
    }
} else {
    $sheet->setCellValue('A2', 'No user data available');
}

// Close database connection
$conn->close();

// Save Excel file
$writer = new Xlsx($spreadsheet);
$filename = 'applications_report.xlsx';
$writer->save($filename);

// Download the Excel file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'. $filename .'"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
