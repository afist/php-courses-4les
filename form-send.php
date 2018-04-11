<?php


if (!empty($_POST)){
    $expression = test_input($_POST["expression"]);
}
//elseif(!empty($_GET)){
//    $expression = test_input($_GET["expression"]);
//    }
function test_input($data) {
    $data = trim($data); // удаляем пробелы с конца и начала строки
    $data = stripslashes($data); // Удаляет экранирование символов
    $data = htmlspecialchars($data); //Преобразует специальные символы в HTML-сущности
    return $data;
}
function nice_print($str){
    echo "<pre>";
    print_r($str);
    echo "</pre>";

}


function remove_spase($str){
    $arr = str_split($str);
    for ($i = 0; $i < count($arr); $i++){
        if ($arr[$i] == " "){
            array_splice($arr,$i,1);
            $i--;
        }

    }
    return implode('', $arr);
}

//if (!empty($_GET)){
//    echo "Method GET  <br> Имя: ".$user_name."<br>Пароль: ".$password."<br>";
//}

echo remove_spase($expression);


//if (!empty($_POST)){
//
//echo "Method POST <br> Имя: ".$user_name."<br>Пароль: ".$password."<br>";
//
//}



?>