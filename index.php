<?php
include('database.php');

if(empty($_POST['Subm'])){
    $Rus=$_POST['Rusword'];
    $Eng=$_POST['Engword'];
    $err="";
    if(!$Rus || !$Eng){
        $err="Ошибка";
    }else{
        $query = "INSERT INTO `word for bot` (`RussianWord`, `EnglishWord`) VALUES ('$Rus', '$Eng')";
        mysqli_query($link, $query);
        $err="Данные успешно внесены";
    }
}
else{
    echo 'Не пусто' ;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word for bot</title>
</head>
<body>
<form action="" method="POST" class="forma">
    <h1>Внесите данные</h1>
    <ul>
        <li><input type="text" placeholder="Введите русское слово" name="Rusword"></input></li>
        <li><input type="text" placeholder="Введите английское слово" name="Engword"></input></li>
        <li><button type="submit" name="Subm">Внести</button></li>
        <li><?=$err?></li>
    </ul>
</form>
<hr>
<?php
$sql = "SELECT * FROM `word for bot`";
$rowsCount = $result->num_rows;
if($result = $link->query($sql)){
    echo "<p>Получено объектов: $rowsCount</p>";
    echo "<table></th><th>Russian Word</th><th><th></th><th>English Word</th></tr>";
    foreach($result as $row){
        echo "<tr>";
        echo "<td>" . $row["RussianWord"] . "</td>";
        echo "<th><th></th><td>" . $row["EnglishWord"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Ошибка: " . $link->error;
}
$link->close();
?>

</body>
</html>
