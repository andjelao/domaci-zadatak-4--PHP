<?php
if (isset($_POST['ime']) && isset($_POST['prezime']) && $_POST['zelja'] != "" && $_POST['grad'] != "" 
&& isset($_POST['odgovor']) && ctype_alpha($_POST['ime']) && ctype_alpha($_POST['prezime'])) {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $grad = $_POST['grad'];
    $zelja = $_POST['zelja'];
    $user_wish = ['ime' => $ime, 'prezime' => $prezime, 'grad' => $grad, 'zelja' => $zelja];
    $user_wish_json = json_encode($user_wish);
    $dir = './zelje_db';
    if (!file_exists($dir)) {
        mkdir($dir);
    }
    $h = fopen($dir.'/'.uniqid().'.txt', 'w');
    fwrite($h, $user_wish_json);
    fclose($h);
    header("location: ./zelja_poslata.html");
} else{
    header("location: ./index.html");
}
?>
