<?php

if(isset($_FILES["fileToUpload"]) &&  (!empty($_FILES["fileToUpload"]))){

    $total = is_array($_FILES["fileToUpload"]["name"]) ? count($_FILES["fileToUpload"]["name"]) : 1;

    $location_to_upload = "../uploads/";
    $location_to_output = "../outputs/";
    $output_array = array();

    for($i=0; $i<$total; $i++) {
        $file_name = $_FILES['fileToUpload']['name'][$i];

        $upload_file_name_without_space = preg_replace('/\s+/', '_', $file_name);
        if($upload_file_name_without_space != $file_name){
            $file_name = $upload_file_name_without_space;
        }

        $file_tmp_name = $_FILES['fileToUpload']['tmp_name'][$i];

        $upload_file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $upload_file_name_without_extension = substr($upload_file_name_without_space, 0, -4);

        if($upload_file_extension == "txt"){
            if(move_uploaded_file($file_tmp_name, $location_to_upload . $upload_file_name_without_space)){
                $converted_file_name = $upload_file_name_without_extension . ".pdf";
                $convert_path = $location_to_upload . $upload_file_name_without_space;
                $output_path = $location_to_output . $upload_file_name_without_extension . ".pdf";
                
                exec("java -jar TextToPDF.jar $convert_path $output_path");

                array_push($output_array, $converted_file_name);
            } else {
                header("Location: fail.html?error=upload_failed");
                exit();
            }
        }elseif($upload_file_extension == "pdf"){
            if(move_uploaded_file($file_tmp_name, $location_to_upload . $upload_file_name_without_space)){
                $converted_file_name = $upload_file_name_without_extension . ".txt";
                $convert_path = $location_to_upload . $upload_file_name_without_space;
                $output_path = $location_to_output . $upload_file_name_without_extension . ".txt";

                exec("java -jar PDFToText.jar $convert_path $output_path");

                array_push($output_array, $converted_file_name);
            } else {
                header("Location: fail.html?error=upload_failed");
                exit();
            }
        }elseif($upload_file_extension == ""){
            header("Location: fail.html?error=invalid_file_extension");
            exit();
        }else{
            header("Location: fail.html?error=invalid_file_type");
            exit();
        }
    }

    $converted_files = implode(",", $output_array);
    header("Location: success.php?converted_file=$converted_files");


}else{
    header("Location: fail.html?error=invalid_upload");
}
?>