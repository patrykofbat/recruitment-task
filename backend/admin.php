<?php

session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include("models/User.php");
include("databaseAccess/DbManager.php");



if(!empty($_POST['login']) && !empty($_POST['password'])){
    $securePassword = sha1($_POST['password']);
    $dbManager = new DbManager();
    $result = $dbManager->selectAll('admin');
    if($_POST['login'] == $result[0]['login'] && $securePassword == $result[0]['password']){
        $users = $dbManager->selectAll('users');
        

        
    }
    else{
        echo "<h2>Wprowdziłeś niepoprawne dane logowania</h2>";
        exit;
    }

}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="admin.css">
<title>Strona Główna</title>
</head>

<body>
    <div id="container">

        <table>
            <tr>
            <th>Imię</th>
            <th>Nazwisko</th> 
            <th>Obraz</th>
        </tr>
            <?php foreach($users as $entry): ?>
            <tr>
                <td><?php echo $entry['name']; ?></td>
                <td><?php echo $entry['surrname']; ?></td>
                <td><?php echo '<a download='.$entry['image'].' href=./images/'.$entry['id'].'/'.$entry['image'].'>'.$entry['image'].'</a>'; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

    </div>
        
</body>

</html>




