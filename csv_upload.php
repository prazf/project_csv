<?php
// Upload and Parse CSV File

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if a file has been uploaded
    if (isset($_FILES['csv_file'])) {
        // Get the uploaded file
        $file = $_FILES['csv_file'];

        // Check if the file is a CSV
        if ($file['type'] == 'text/csv') {
            // Open the file for reading
            $handle = fopen($file['tmp_name'], 'r');

            // Initialize an array to store the data
            $data = [];

            // Read the CSV file line by line
            while (($row = fgetcsv($handle)) !== FALSE) {
                $data[] = $row;
            }

            // Close the file
            fclose($handle);

            // Display the extracted data
            //print_r($data);
            include 'datatable.php';
        } else {
            echo "Please upload a CSV file.";
        }
    } else {
        echo "No file uploaded.";
    }
}
?>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="csv_file">
    <button type="submit">Upload CSV File</button>
</form>