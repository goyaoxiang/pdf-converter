<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PDF to Text Converter</title>
</head>

<body>
    <div class="container">
        <h2>PDF to Text Converter</h2>
        <div class="div">
                <p>Click here to download converted file</p>
                <?php
                    $converted_file = $_GET['converted_file'];
                    echo 
                    '<a href = "download.php?converted_file='. $converted_file .'" download target = "_blank">
                    <button type="button" class="btn btn-primary">Download</button>
                    </a>';
                ?>
                
                <a href="index.html"><button type="button" class="btn btn-primary">Convert Again</button></a>
            </div>
    </div>
</body>

</html>