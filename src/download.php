<?php

$converted_file = $_GET['converted_file'];

$converted_file_path = "../outputs/" . $converted_file;

if(file_exists($converted_file_path)){

    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename={$converted_file}");

    readfile($converted_file_path);
} else {
    // Handle file not found error
    header("Location: index.php?error=invalid_file_type");
}

?>
