<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sucess Page</title>
  </head>
  <link rel="stylesheet" href="base.css" />
  <link rel="stylesheet" href="index.css" />
  <link rel="stylesheet" href="success.css" />
  <body>
    <section class="header"><h1>Text File / PDF Converter</h1></section>

    <section class="prompt">
      <div class="top">
        <div class="left"><img src="./img/tick logo.png" alt="tick" /></div>
        <div class="right"><p>CONVERSION SUCCESSFUL</p></div>
      </div>
      <div class="bottom">
        <div class="btn download">Download your file(s)</div>
        <!-- '<a href = "download.php?converted_file='. $converted_file .'" download target = "_blank">
                    <button type="button" class="btn btn-primary">Download</button>
                    </a>'; -->
        <div class="btn home">
          <a href="index.html">Convert again</a></div>
      </div>
    </section>

    <section class="listFiles">
      <div class="frame">
        <div class="converted">
          <p>CONVERTED FILE(S)</p>
        </div>
        <div class="lists">
          <?php
            $converted_files = array();
            $converted_files = explode(",", $_GET['converted_file']);
            $total = is_array($converted_files) ? count($converted_files) : 1;
            
            for($i=0; $i<$total; $i++){
                echo 
                '<ul>
                    <li><a href = "download.php?converted_file='. $converted_files[$i] .'" download target = "_blank">'. $converted_files[$i] .'</a></li>';
            }
          ?>
        </div>
      </div>
    </section>
  </body>
</html>
