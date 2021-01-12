<?php
$dir = "./zelje_db/";
$files = scandir($dir);
echo("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css\">
    <title>Sve želje</title>
</head>
<body>");
echo("<table class = \"table\"><thead><tr><th>Ime:</th><th>Prezime:</th><th>Grad:</th><th>Želja:</th></thead><tbody>");
for($i = 2; $i <= count($files)- 1; $i++){
    $path = "./zelje_db/".$files[$i];
    $h = fopen($path, 'r');
    $content = fread($h, filesize($path));
    $content = json_decode($content);
    fclose($h);
    echo("<tr><td>".($content->ime)."</td><td>".($content->prezime)."</td><td>".($content->grad)."</td><td>".($content->zelja)."</td></tr>");
}
echo("</tbody></body></html>");
?>