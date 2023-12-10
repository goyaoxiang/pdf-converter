<?php
if (isset($_GET['converted_files'])) {
    $converted_files = explode(",", $_GET['converted_files']);

    // Create a unique zip file name
    $zip_file = 'converted_files_' . time() . '.zip';

    // Create a new ZipArchive instance
    $zip = new ZipArchive();
    if ($zip->open($zip_file, ZipArchive::CREATE) === true) {
        foreach ($converted_files as $file) {
            // Add each converted file to the zip archive
            $zip->addFile($file, basename($file));
        }

        $zip->close();

        // Set appropriate headers for zip file download
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename=' . $zip_file);
        header('Content-Length: ' . filesize($zip_file));

        // Output the zip file to the browser
        readfile($zip_file);

        // Delete the temporary zip file
        // unlink($zip_file);
        exit;
    } else {
        // Handle zip archive creation error
        header('Location: fail.html?error=error_creating_zip_file');
    }
} else {
    // Handle missing converted_files parameter
    header('Location: fail.html?error=invalid_zip_file');
}
?>
