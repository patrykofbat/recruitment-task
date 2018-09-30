<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include("models/User.php");
include("databaseAccess/DbManager.php");



$file = $_FILES['file'];

$phpFileUploadErrors = array(
    1 => 'Uploadowany plik przekroczył dyrektywe upload_max_filesize w php.ini',
    2 => 'Uploadowany plik przekroczył dyrektywe MAX_FILE_SIZE która była wyspecyfikowana w HTML form',
    3 => 'Plik został zapisany częściowo',
    4 => 'Brak pliku',
    6 => 'Brak tymczasowego folderu',
    7 => 'Błąd zapisu na dysk.',
    8 => 'Rozrzeszenie PHP zatrzymało upload pliku.',
);


if(!empty($_POST['name'])){
    $newUser = new User($_POST['name'], $_POST['surrname'], $file['name']);
    $dbManager = new DbManager();

    if($file['error'] == 0){
        if($dbManager->execute($newUser->parseInsertQuery('users')) && move_uploaded_file($file['tmp_name'], './images/'.$file['name'])){
            echo "Wpis dodany pomyślnie";
        }
        else {
            echo "Kod błędu: ".$_FILES['file']['error']."\n".$phpFileUploadErrors[$_FILES['file']['error']];
        }
    }
    else{
        echo "Kod błędu: ".$_FILES['file']['error']."\n".$phpFileUploadErrors[$_FILES['file']['error']];
    }
    
}


?>