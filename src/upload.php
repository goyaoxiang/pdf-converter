<?php

if(isset($_FILES['fileToUpload'])){
    $file = $_FILES['fileToUpload'];
    $file_name = $file['fileToUpload']['name'];
    $location_to_upload = "uploads/";
    $location_to_output = "outputs/";

    $upload_file_name_without_space = preg_replace('/\s+/', '_', $file_name);
    if($upload_file_name_without_space != $file_name){
        rename($upload_file_name_without_space, $file_name);
    }

    $file_tmp_name = $file['fileToUpload']['tmp_name'];

    $upload_file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $upload_file_name_without_extension = substr($upload_file_name_without_space, 0, -4);

    if($upload_file_extension == "txt"){
        if(move_uploaded_file($file_tmp_name, $location_to_upload . $upload_file_name_without_space)){
            $converted_file_name = $upload_file_name_without_extension . ".pdf";
            $convert_path = $location_to_upload . $upload_file_name_without_space;
            $output_path = $location_to_output . $upload_file_name_without_extension . ".pdf";
            
            exec("java -jar TextToPDF.jar $convert_path $output_path");

            header("Location: success.php?converted_file=$converted_file_name");
        }
    }elseif($upload_file_extension == "pdf"){
        if(move_uploaded_file($file_tmp_name, $location_to_upload . $upload_file_name_without_space)){
            $converted_file_name = $upload_file_name_without_extension . ".txt";
            $convert_path = $location_to_upload . $upload_file_name_without_space;
            $output_path = $location_to_output . $upload_file_name_without_extension . ".txt";
            
            exec("java -jar PDFToText.jar $convert_path $output_path");

            header("Location: success.php?converted_file=$converted_file_name");
        }
    }else{
        header("Location: index.php?error=invalid_file_type");
    }
}
?>