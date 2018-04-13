<?php


if (!empty($_POST)){
    $expression = test_input($_POST["expression"]);
}
function test_input($data) {
    $data = trim($data); // удаляем пробелы с конца и начала строки
    $data = stripslashes($data); // Удаляет экранирование символов
    $data = htmlspecialchars($data); //Преобразует специальные символы в HTML-сущности
    return $data;
}

function nicePrint($str){
    echo "<pre>";
    print_r($str);
    echo "</pre>";

}


function removeSpase($str){
    $arr = str_split($str);
    for ($i = 0; $i < count($arr); $i++){
        if ($arr[$i] == " "){
             array_splice($arr,$i,1);
             $i--;
        }


    }
    $arr = charDel($arr);
    return implode('', $arr);
}

function checkNumber($a){
    return (48<=$a && $a<=58) or (46 ==$a) ? true : false;
};

function checkOperation($a){
    return ($a == 47) or ($a == 45) or ($a == 43) or ($a == 42) ? true : false;
};

function checkSymbol($str){
    $arr = str_split($str);
    $count = count($arr);
    $countOperation = 0;
    for ($i=0; $i < $count ; $i++) {
        $number = checkNumber(ord($arr[$i]));
        $operation = checkOperation(ord($arr[$i]));
        
        if ($operation) {
            $countOperation++;
            
        }
        if ($number or $operation) {
            continue;
        } else {
            echo "Error invalid characters";
            return false;
        }

    }
    if ($countOperation ==0) {
        echo "Error invalid characters";
        return false;
    }

    return true;
}
function doubleCheck($str){
    $arr = str_split($str);
    $count = count($arr)-1;
    for ($i=0; $i < $count; $i++) { 
        // echo checkOperation(ord($arr[$i]));
        // echo checkOperation(ord($arr[$i+1]));
        if (checkOperation(ord($arr[$i]))) {
            if ( checkOperation(ord($arr[$i+1])) ) {
            echo "Error invalid characters";
            return false;
            }
        }
        
    }
    return true;
}
function charDel($arr){
        for ($i=0; $i < count($arr) ; $i++) { 
            if ( checkOperation(ord($arr[0])) ) {
                array_splice($arr,0,1);
            };
            $lastChar = count($arr)-1;
            if ( checkOperation(ord($arr[$lastChar])) ) {
                array_splice($arr,$lastChar,1);
            };
        }
        return $arr;

}

// function matOperation($str){
//     $arr = str_split($str);
//     $count = count($arr);
//     for ($i=0; $i < $count ; $i++) {
//         if (checkOperation(ord($arr[$i]))) {
//             $str_end = explode($arr[$i],$str);
//             $operation = $arr[$i];
//             // var_dump($str_end);
//             // var_dump($operation);

//             return [$str_end, $operation];
//         }
//     }
// }


// function endOperation($arr){
// switch ($arr[1][0]) {
//     case '*':
//         return (int)$arr[0][0]*(int)$arr[0][1];
//         break;
//     case '/':
//         return (int)$arr[0][0]/(int)$arr[0][1];
//         break;
//     case '-':
//         return (int)$arr[0][0]-(int)$arr[0][1];
//         break;
//     case '+':
//         return (int)$arr[0][0]+(int)$arr[0][1];
//         break;
// }
// }


$expression = removeSpase($expression);
if (checkSymbol($expression) and doubleCheck($expression) ) {
// $c = matOperation($expression);
// $b = endOperation($c);
eval('$result='.$expression.';');
echo $expression." = ".$result;
};


//if (!empty($_POST)){
//
//echo "Method POST <br> Имя: ".$user_name."<br>Пароль: ".$password."<br>";
//
//}



?>