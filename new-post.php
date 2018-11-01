<?php
$myfile = fopen("index.html", "r") or die("Unable to open file!");
$tempindexhtml=fread($myfile,filesize("index.html"));
fclose($myfile);
$pos_end_a=strpos($tempindexhtml, "</a>");
$pos_to_insert=$pos_end_a+4;

$string_to_insert='<div class="card">'
                  .'<h4>'
                  .$_POST["title"]
                  .' by '
                  .$_POST["author"]
                  .'</h4>'
                  .$_POST["body"]
                  .'</div>'
;

$tempindexhtml=substr_replace($tempindexhtml, $string_to_insert, $pos_to_insert, 0);

$myfile = fopen("index.html", "w") or die("Unable to open file!");
fwrite($myfile,$tempindexhtml);
fclose($myfile);
header('Location: index.html');
?>