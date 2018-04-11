<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>



    <!-- Последняя компиляция и сжатый JavaScript -->
    <link rel='stylesheet' href='http://clonecss.com/wp-admin/load-styles.php?c=0&amp;dir=ltr&amp;load%5B%5D=dashicons,buttons,forms,l10n,login&amp;ver=4.9.5' type='text/css' media='all' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>


<body class="login wp-core-ui ">
<div id="login">
    <h1><a  title="Powered by WordPress" tabindex="-1">Powered by WordPress</a></h1>

    <form id="form">
        <p>
            <label for="user_login">Введите математическую операцию<br />
                <input type="text" name="expression" id="user_login" class="input" value="" size="30" /></label>
        </p>
<!--        <p>-->
<!--            <label for="user_pass">Password<br />-->
<!--                <input type="password" name="password" id="user_pass" class="input" value="" size="20" /></label>-->
<!--        </p>-->
<!--        <p class="forgetmenot">-->
<!--            <label for="rememberme">-->
<!--                <input name="rememberme" type="checkbox" id="rememberme" value="forever"  /> Remember Me</label>-->
<!--        </p>-->
        <p class="submit">
            <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Log In" />
        </p>
    </form>

    <p id="nav">
        <a href="">Lost your password?</a>
    </p>


</div>


<div class="clear"></div>
<script>

    $("#form").submit(function(event){
        event.preventDefault();
        var serializedData = $(this).serialize();// собирает все данные с формы

        request = $.ajax({
            url: "form-send.php",
            type: "post",
            data: serializedData,
            success(a){
                $('.hi').html(a);

            }
        });

    })
</script>
<?php
var_dump(ord("0"));




echo remove_spase("123a     32a 23 23 2 3");
//echo remove_spase("134 34 5345 34556 5");

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
?>


<h3 class="hi" style="text-align: center"></h3>
</body>
</html>