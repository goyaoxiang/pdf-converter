<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Success</title>
    <link rel="stylesheet" href="base.css" />
    <link rel="stylesheet" href="success.css" />
  </head>
  <body>
    <section class="deco">
      <img src="./img/cubes1.png" alt="cubes1" id="cubes1" />
      <img src="./img/cubes2.png" alt="cubes2" id="cubes2" />
      <img src="./img/converted.png" alt="converted" id="converted" />
      <img src="./img/pdfimg.png" alt="pdfimg" id="pdfimg" />
      <a href="#nav"> <img src="./img/up.png" alt="up" id="up" /></a>
    </section>

    <section class="nav" id="nav">
      <div class="logo">
        <ul>
          <li>
            <img src="./img/file.png" alt="LOGO" />
            <span class="logo-name">DOCBLEND</span>
          </li>
          <li>
            <span class="about"><a href="#team">ABOUT US</a></span>
          </li>
        </ul>
      </div>
    </section>

    <section class="congrat wrapper">
      <div class="top">
        <div class="inner-top">
          <div class="tick"><img src="./img/pdfimg.png" alt="tick" /></div>
          <div class="title">CONVERSION SUCCESSFUL</div>
        </div>
        <div class="inner-bottom">
          <div class="download">Download your file(s)</div>
          <div class="again">
            <a href="index.html">Convert again</a>
          </div>
        </div>
      </div>

      <div class="bottom">
        <div class="subtitle">CONVERTED filE(S)</div>
        <div class="sub-desc">You have successfully converted your files.</div>
        <div class="lists">
          <ul id="list"><?php
            $converted_files = array();
            $converted_files = explode(",", $_GET['converted_file']);
            $total = is_array($converted_files) ? count($converted_files) : 1;
            
            for($i=0; $i<$total; $i++){
                echo 
                '<a href="download.php?converted_file='. $converted_files[$i] .'" download target = "_blank">'. $converted_files[$i] .'</a>';
            }
          ?></ul>
        </div>
      </div>
    </section>
  </body>
</html>
